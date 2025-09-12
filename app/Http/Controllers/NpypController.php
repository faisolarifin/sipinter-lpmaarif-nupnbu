<?php

namespace App\Http\Controllers;

use App\Models\Satpen;
use App\Models\NPYP;
use App\Models\NPYPSatpen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NpypController extends Controller
{
    public function indexNpyp() {
        // Get NPYP data for super admin (id_pw and id_pc are null)
        $npyp = NPYP::whereNull('id_pw')->whereNull('id_pc')->first();
        
        return view('admin.npyp.npyp', compact('npyp'));
    }

    public function getSatpenList()
    {
        try {
            // Get page parameter from request
            $page = request()->get('page', 1);
            $perPage = 15;

            // Fetch satpen data from database with relationships
            $satpenPaginated = Satpen::with(['jenjang', 'provinsi', 'kabupaten'])
                ->select('id_satpen', 'no_registrasi', 'nm_satpen', 'id_jenjang', 'id_prov', 'id_kab', 'status', 'npsn')
                ->paginate($perPage, ['*'], 'page', $page);

            $satpenList = $satpenPaginated->map(function($satpen) {
                return [
                    'id' => $satpen->id_satpen,
                    'no_registrasi' => $satpen->no_registrasi, 
                    'nama_satpen' => $satpen->nm_satpen, 
                    'provinsi' => $satpen->provinsi ? $satpen->provinsi->nm_prov : 'Tidak Diketahui',
                    'kabupaten' => $satpen->kabupaten ? $satpen->kabupaten->nama_kab : 'Tidak Diketahui',
                    'jenjang' => $satpen->jenjang ? $satpen->jenjang->nm_jenjang : 'Tidak Diketahui',
                    'npsn' => $satpen->npsn,
                    'status' => ucfirst($satpen->status)
                ];
            });

            return response()->json([
                'success' => true,
                'data' => $satpenList,
                'pagination' => [
                    'current_page' => $satpenPaginated->currentPage(),
                    'last_page' => $satpenPaginated->lastPage(),
                    'per_page' => $satpenPaginated->perPage(),
                    'total' => $satpenPaginated->total(),
                    'from' => $satpenPaginated->firstItem(),
                    'to' => $satpenPaginated->lastItem()
                ],
                'message' => 'Data satpen berhasil diambil'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'data' => [],
                'pagination' => null,
                'message' => 'Gagal mengambil data satpen: ' . $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            // Validation
            $validator = Validator::make($request->all(), [
                'nomor_npyp' => 'required|string|max:50',
                'nama_npyp' => 'required|string|max:255',
                'nama_operator' => 'required|string|max:255',
                'nomor_operator' => 'required|string|max:20',
            ], [
                'nomor_npyp.required' => 'Nomor NPYP harus diisi',
                'nama_npyp.required' => 'Nama NPYP harus diisi',
                'nama_operator.required' => 'Nama Operator harus diisi',
                'nomor_operator.required' => 'Nomor Operator harus diisi',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // Check if NPYP data already exists for super admin
            $existingNpyp = NPYP::whereNull('id_pw')->whereNull('id_pc')->first();

            if ($existingNpyp) {
                // Update existing data
                $existingNpyp->update([
                    'nomor_npyp' => $request->nomor_npyp,
                    'nama_npyp' => $request->nama_npyp,
                    'nama_operator' => $request->nama_operator,
                    'nomor_operator' => $request->nomor_operator,
                ]);

                return redirect()->route('a.npyp')
                    ->with('success', 'Data NPYP berhasil diperbarui');
            } else {
                // Create new data
                NPYP::create([
                    'id_pw' => null,
                    'id_pc' => null,
                    'nomor_npyp' => $request->nomor_npyp,
                    'nama_npyp' => $request->nama_npyp,
                    'nama_operator' => $request->nama_operator,
                    'nomor_operator' => $request->nomor_operator,
                ]);

                return redirect()->route('a.npyp')
                    ->with('success', 'Data NPYP berhasil disimpan');
            }

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Validation
            $validator = Validator::make($request->all(), [
                'nomor_npyp' => 'required|string|max:50',
                'nama_npyp' => 'required|string|max:255',
                'nama_operator' => 'required|string|max:255',
                'nomor_operator' => 'required|string|max:20',
            ], [
                'nomor_npyp.required' => 'Nomor NPYP harus diisi',
                'nama_npyp.required' => 'Nama NPYP harus diisi',
                'nama_operator.required' => 'Nama Operator harus diisi',
                'nomor_operator.required' => 'Nomor Operator harus diisi',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // Find and update NPYP data
            $npyp = NPYP::findOrFail($id);
            $npyp->update([
                'nomor_npyp' => $request->nomor_npyp,
                'nama_npyp' => $request->nama_npyp,
                'nama_operator' => $request->nama_operator,
                'nomor_operator' => $request->nomor_operator,
            ]);

            return redirect()->route('a.npyp')
                ->with('success', 'Data NPYP berhasil diperbarui');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function getSekolahNaunganData(Request $request)
    {
        try {
            // Get NPYP data for super admin
            $npyp = NPYP::whereNull('id_pw')->whereNull('id_pc')->first();
            
            if (!$npyp) {
                return response()->json([
                    'draw' => intval($request->draw),
                    'recordsTotal' => 0,
                    'recordsFiltered' => 0,
                    'data' => [],
                    'message' => 'Data NPYP belum ada'
                ]);
            }

            // Base query
            $query = NPYPSatpen::with(['satpen.provinsi', 'satpen.kabupaten', 'satpen.jenjang'])
                ->where('id_npyp', $npyp->id_npyp);

            // Search functionality
            if ($request->has('search') && !empty($request->search['value'])) {
                $search = $request->search['value'];
                $query->whereHas('satpen', function($q) use ($search) {
                    $q->where('nm_satpen', 'LIKE', "%{$search}%")
                      ->orWhere('npsn', 'LIKE', "%{$search}%")
                      ->orWhere('no_registrasi', 'LIKE', "%{$search}%")
                      ->orWhere('kelurahan', 'LIKE', "%{$search}%")
                      ->orWhere('kecamatan', 'LIKE', "%{$search}%");
                });
            }

            // Filter by Provinsi
            if ($request->has('provinsi') && !empty($request->provinsi)) {
                $query->whereHas('satpen', function($q) use ($request) {
                    $q->where('id_prov', $request->provinsi);
                });
            }

            // Filter by Kabupaten
            if ($request->has('kabupaten') && !empty($request->kabupaten)) {
                $query->whereHas('satpen', function($q) use ($request) {
                    $q->where('id_kab', $request->kabupaten);
                });
            }

            // Get total records before pagination
            $totalRecords = NPYPSatpen::where('id_npyp', $npyp->id_npyp)->count();
            $filteredRecords = $query->count();

            // Pagination
            $start = $request->start ?? 0;
            $length = $request->length ?? 10;
            $query->offset($start)->limit($length);

            // Order
            if ($request->has('order')) {
                $columns = ['id', 'npsn', 'no_registrasi', 'nm_satpen', 'kelurahan', 'kecamatan', 'kabupaten', 'provinsi'];
                $orderColumn = $columns[$request->order[0]['column']] ?? 'id';
                $orderDir = $request->order[0]['dir'] ?? 'asc';
                
                if (in_array($orderColumn, ['npsn', 'no_registrasi', 'nm_satpen', 'kelurahan', 'kecamatan'])) {
                    $query->join('satpen', 'npyp_satpen.id_satpen', '=', 'satpen.id_satpen')
                          ->orderBy('satpen.' . $orderColumn, $orderDir)
                          ->select('npyp_satpen.*');
                } else {
                    $query->orderBy('npyp_satpen.id', $orderDir);
                }
            }

            $data = $query->get();

            $result = [];
            foreach ($data as $index => $item) {
                $satpen = $item->satpen;

                $result[] = [
                    'no' => '<span class="badge bg-light text-dark">' . ($start + $index + 1) . '</span>',
                    'npsn' => $satpen->npsn ? 
                        '<span class="fw-bold">' . $satpen->npsn . '</span>' : 
                        '<span class="text-muted">Belum ada</span>',
                    'no_registrasi' => $satpen->no_registrasi ? 
                        '<small>' . $satpen->no_registrasi . '</small>' : 
                        '<span class="text-muted">-</span>',
                    'nama_satpen' => '<div><h6 class="mb-1">' . ($satpen->nm_satpen ?? 'Nama tidak tersedia') . '</h6>' .
                        '<small class="text-muted"><i class="ti ti-calendar me-1"></i>Terdaftar: ' . 
                        ($item->assign_date ? date('d M Y', strtotime($item->assign_date)) : 'Tidak diketahui') . '</small></div>',
                    'kelurahan' => '<small>' . ($satpen->kelurahan ?? 'Tidak ada') . '</small>',
                    'kecamatan' => '<small>' . ($satpen->kecamatan ?? 'Tidak ada') . '</small>',
                    'kabupaten' => '<small>' . ($satpen->kabupaten->nama_kab ?? 'Tidak ada') . '</small>',
                    'provinsi' => '<small>' . ($satpen->provinsi->nm_prov ?? 'Tidak ada') . '</small>',
                    'aksi' => '<button class="btn btn-outline-danger btn-sm delete-btn" data-id="' . $item->id . '" title="Hapus dari naungan">
                        <i class="ti ti-trash"></i>
                    </button>'
                ];
            }

            return response()->json([
                'draw' => intval($request->draw),
                'recordsTotal' => $totalRecords,
                'recordsFiltered' => $filteredRecords,
                'data' => $result
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'draw' => intval($request->draw),
                'recordsTotal' => 0,
                'recordsFiltered' => 0,
                'data' => [],
                'error' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }

    public function deleteSekolahNaungan($id)
    {
        try {
            $npypSatpen = NPYPSatpen::findOrFail($id);
            $npypSatpen->delete();

            return response()->json([
                'success' => true,
                'message' => 'Sekolah naungan berhasil dihapus'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus sekolah naungan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function addSekolahNaungan(Request $request)
    {
        try {
            // Get NPYP data for super admin
            $npyp = NPYP::whereNull('id_pw')->whereNull('id_pc')->first();
            
            if (!$npyp) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data NPYP belum ada. Silakan lengkapi data NPYP terlebih dahulu.'
                ], 400);
            }

            // Validate request
            $validator = Validator::make($request->all(), [
                'selected_satpen' => 'required|array|min:1',
                'selected_satpen.*' => 'required|integer|exists:satpen,id_satpen'
            ], [
                'selected_satpen.required' => 'Silakan pilih minimal satu sekolah',
                'selected_satpen.array' => 'Data sekolah tidak valid',
                'selected_satpen.min' => 'Silakan pilih minimal satu sekolah',
                'selected_satpen.*.exists' => 'Sekolah yang dipilih tidak valid'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->first()
                ], 400);
            }

            $selectedSatpen = $request->selected_satpen;
            $addedCount = 0;
            $skippedCount = 0;
            $skippedSchools = [];

            foreach ($selectedSatpen as $idSatpen) {
                // Check if this satpen is already added to this NPYP
                $exists = NPYPSatpen::where('id_npyp', $npyp->id_npyp)
                                   ->where('id_satpen', $idSatpen)
                                   ->exists();

                if (!$exists) {
                    NPYPSatpen::create([
                        'id_npyp' => $npyp->id_npyp,
                        'id_satpen' => $idSatpen,
                        'assign_date' => now()->format('Y-m-d')
                    ]);
                    $addedCount++;
                } else {
                    // Get school name for skipped message
                    $satpen = Satpen::find($idSatpen);
                    if ($satpen) {
                        $skippedSchools[] = $satpen->nm_satpen;
                    }
                    $skippedCount++;
                }
            }

            $message = "{$addedCount} sekolah berhasil ditambahkan";
            if ($skippedCount > 0) {
                $message .= ", {$skippedCount} sekolah sudah ada sebelumnya";
                if (count($skippedSchools) > 0) {
                    $message .= " (" . implode(', ', array_slice($skippedSchools, 0, 3));
                    if (count($skippedSchools) > 3) {
                        $message .= " dan " . (count($skippedSchools) - 3) . " lainnya";
                    }
                    $message .= ")";
                }
            }

            return response()->json([
                'success' => true,
                'message' => $message,
                'added' => $addedCount,
                'skipped' => $skippedCount
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function indexNpypWilayah() 
    {
        return view('admin.npyp.wilayah');
    }

    public function getNpypWilayahData(Request $request)
    {
        try {
            // Base query for NPYP with id_pw not null (wilayah data)
            $query = NPYP::with('pengurusWilayah')
                ->whereNotNull('id_pw');

            // Search functionality
            if ($request->has('search') && !empty($request->search['value'])) {
                $search = $request->search['value'];
                $query->where(function($q) use ($search) {
                    $q->where('nomor_npyp', 'LIKE', "%{$search}%")
                      ->orWhere('nama_npyp', 'LIKE', "%{$search}%")
                      ->orWhere('nama_operator', 'LIKE', "%{$search}%")
                      ->orWhere('nomor_operator', 'LIKE', "%{$search}%")
                      ->orWhereHas('pengurusWilayah', function($pw) use ($search) {
                          $pw->where('nm_prov', 'LIKE', "%{$search}%");
                      });
                });
            }

            // Get total records before pagination
            $totalRecords = NPYP::whereNotNull('id_pw')->count();
            $filteredRecords = $query->count();

            // Pagination
            $start = $request->start ?? 0;
            $length = $request->length ?? 10;
            
            // Handle export all data
            if ($length == -1) {
                // Don't limit for export
            } else {
                $query->offset($start)->limit($length);
            }

            // Order
            if ($request->has('order')) {
                $columns = ['id_npyp', 'nomor_npyp', 'nama_npyp', 'nama_operator', 'nomor_operator', 'wilayah'];
                $orderColumn = $columns[$request->order[0]['column']] ?? 'nomor_npyp';
                $orderDir = $request->order[0]['dir'] ?? 'asc';
                
                if ($orderColumn === 'wilayah') {
                    $query->join('provinsi', 'npyp.id_pw', '=', 'provinsi.id_prov')
                          ->orderBy('provinsi.nm_prov', $orderDir)
                          ->select('npyp.*');
                } else {
                    $query->orderBy($orderColumn, $orderDir);
                }
            } else {
                $query->orderBy('nomor_npyp', 'asc');
            }

            $data = $query->get();

            $result = [];
            foreach ($data as $index => $item) {
                $result[] = [
                    'no' => '<div class="text-center fw-bold">' . ($length == -1 ? ($index + 1) : ($start + $index + 1)) . '</div>',
                    'nomor_npyp' => '<div class="fw-bold">' . ($item->nomor_npyp ?? '<span class="text-muted">-</span>') . '</div>',
                    'nama_npyp' => '<div>' . ($item->nama_npyp ?? '<span class="text-muted">-</span>') . '</div>',
                    'nama_operator' => '<div>' . ($item->nama_operator ?? '<span class="text-muted">-</span>') . '</div>',
                    'nomor_operator' => '<div>' . ($item->nomor_operator ?? '<span class="text-muted">-</span>') . '</div>',
                    'wilayah' => '<div>' . ($item->pengurusWilayah->nm_prov ?? 'Provinsi tidak ditemukan') . '</div>'
                ];
            }

            return response()->json([
                'draw' => intval($request->draw),
                'recordsTotal' => $totalRecords,
                'recordsFiltered' => $filteredRecords,
                'data' => $result
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'draw' => intval($request->draw),
                'recordsTotal' => 0,
                'recordsFiltered' => 0,
                'data' => [],
                'error' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }

    public function indexNpypCabang() 
    {
        return view('admin.npyp.cabang');
    }

    public function getNpypCabangData(Request $request)
    {
        try {
            // Base query for NPYP with id_pc not null (cabang data)
            $query = NPYP::with(['pengurusCabang.prov'])
                ->whereNotNull('id_pc');

            // Search functionality
            if ($request->has('search') && !empty($request->search['value'])) {
                $search = $request->search['value'];
                $query->where(function($q) use ($search) {
                    $q->where('nomor_npyp', 'LIKE', "%{$search}%")
                      ->orWhere('nama_npyp', 'LIKE', "%{$search}%")
                      ->orWhere('nama_operator', 'LIKE', "%{$search}%")
                      ->orWhere('nomor_operator', 'LIKE', "%{$search}%")
                      ->orWhereHas('pengurusCabang', function($pc) use ($search) {
                          $pc->where('nama_pc', 'LIKE', "%{$search}%");
                      })
                      ->orWhereHas('pengurusCabang.prov', function($prov) use ($search) {
                          $prov->where('nm_prov', 'LIKE', "%{$search}%");
                      });
                });
            }

            // Get total records before pagination
            $totalRecords = NPYP::whereNotNull('id_pc')->count();
            $filteredRecords = $query->count();

            // Pagination
            $start = $request->start ?? 0;
            $length = $request->length ?? 10;
            
            // Handle export all data
            if ($length == -1) {
                // Don't limit for export
            } else {
                $query->offset($start)->limit($length);
            }

            // Order
            if ($request->has('order')) {
                $columns = ['id_npyp', 'nomor_npyp', 'nama_npyp', 'nama_operator', 'nomor_operator', 'cabang', 'wilayah'];
                $orderColumn = $columns[$request->order[0]['column']] ?? 'nomor_npyp';
                $orderDir = $request->order[0]['dir'] ?? 'asc';
                
                if ($orderColumn === 'cabang') {
                    $query->join('pengurus_cabang', 'npyp.id_pc', '=', 'pengurus_cabang.id_pc')
                          ->orderBy('pengurus_cabang.nama_pc', $orderDir)
                          ->select('npyp.*');
                } elseif ($orderColumn === 'wilayah') {
                    $query->join('pengurus_cabang', 'npyp.id_pc', '=', 'pengurus_cabang.id_pc')
                          ->join('provinsi', 'pengurus_cabang.id_prov', '=', 'provinsi.id_prov')
                          ->orderBy('provinsi.nm_prov', $orderDir)
                          ->select('npyp.*');
                } else {
                    $query->orderBy($orderColumn, $orderDir);
                }
            } else {
                $query->orderBy('nomor_npyp', 'asc');
            }

            $data = $query->get();

            $result = [];
            foreach ($data as $index => $item) {
                $cabangName = $item->pengurusCabang ? $item->pengurusCabang->nama_pc : 'Cabang tidak ditemukan';
                $wilayahName = ($item->pengurusCabang && $item->pengurusCabang->prov) 
                    ? $item->pengurusCabang->prov->nm_prov 
                    : 'Provinsi tidak ditemukan';

                $result[] = [
                    'no' => '<div class="text-center fw-bold">' . ($length == -1 ? ($index + 1) : ($start + $index + 1)) . '</div>',
                    'nomor_npyp' => '<div class="fw-bold">' . ($item->nomor_npyp ?? '<span class="text-muted">-</span>') . '</div>',
                    'nama_npyp' => '<div>' . ($item->nama_npyp ?? '<span class="text-muted">-</span>') . '</div>',
                    'nama_operator' => '<div>' . ($item->nama_operator ?? '<span class="text-muted">-</span>') . '</div>',
                    'nomor_operator' => '<div>' . ($item->nomor_operator ?? '<span class="text-muted">-</span>') . '</div>',
                    'cabang' => '<div>' . $cabangName . '</div>',
                    'wilayah' => '<div>' . $wilayahName . '</div>'
                ];
            }

            return response()->json([
                'draw' => intval($request->draw),
                'recordsTotal' => $totalRecords,
                'recordsFiltered' => $filteredRecords,
                'data' => $result
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'draw' => intval($request->draw),
                'recordsTotal' => 0,
                'recordsFiltered' => 0,
                'data' => [],
                'error' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }

    public function other() {
        return view('admin.npyp.formPtk');
    }

}
