@extends('template.layout', [
    'title' => 'Sipinter Admin - Detail Satuan Pendidikan',
])

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/timeline.css') }}" />
    <style>
        /* Modern Card Styling */
        .modern-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
            overflow: hidden;
            margin-bottom: 24px;
        }

        .modern-card-header {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 24px 32px;
            border-bottom: 2px solid #e5e7eb;
        }

        .modern-card-header h5 {
            color: #1e293b;
            font-weight: 700;
            font-size: 1.35rem;
            margin: 0 0 6px 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .modern-card-header h5::before {
            content: '';
            width: 4px;
            height: 28px;
            background: linear-gradient(180deg, #3b82f6 0%, #2563eb 100%);
            border-radius: 2px;
        }

        .modern-card-header small {
            color: #64748b;
            font-size: 0.875rem;
            font-weight: 500;
            margin-left: 14px;
        }

        /* Detail Table */
        .detail-table {
            background: #ffffff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .detail-table table {
            width: 100%;
            font-size: 0.9rem;
        }

        .detail-table table th {
            color: #64748b;
            font-weight: 600;
            padding: 10px 0;
            font-size: 0.875rem;
        }

        .detail-table table td {
            color: #1e293b;
            font-weight: 500;
            padding: 10px 0;
        }

        .detail-table table tr {
            border-bottom: 1px solid rgba(0, 0, 0, 0.03);
        }

        .detail-table table tr:last-child {
            border-bottom: none;
        }

        /* Section Header */
        .section-header {
            color: #1e293b;
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 16px;
            padding-bottom: 12px;
            border-bottom: 2px solid #e5e7eb;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-header::before {
            content: '';
            width: 4px;
            height: 24px;
            background: linear-gradient(180deg, #3b82f6 0%, #2563eb 100%);
            border-radius: 2px;
        }

        /* Card Box Detail */
        .card-box-detail {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border-radius: 12px;
            border: 1px solid rgba(0, 0, 0, 0.06);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .card-box-detail::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(180deg, #3b82f6 0%, #2563eb 100%);
        }

        .card-box-detail:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        }

        .card-box-detail h6 {
            color: #1e293b;
            font-weight: 700;
            font-size: 1rem;
            margin-bottom: 8px;
        }

        .card-box-detail p {
            color: #64748b;
            font-size: 0.875rem;
            margin-bottom: 4px;
        }

        .card-box-detail small {
            color: #94a3b8;
            font-size: 0.813rem;
        }

        .card-box-detail .badge {
            padding: 6px 14px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.75rem;
        }

        /* Timeline Enhancement */
        .timeline {
            background: #ffffff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        /* Modern Buttons */
        .btn-modern {
            border-radius: 10px;
            padding: 10px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-modern-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
        }

        .btn-modern-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
            color: white;
        }

        .btn-modern-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
        }

        .btn-modern-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(239, 68, 68, 0.3);
            color: white;
        }

        .btn-modern-info {
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            color: white;
        }

        .btn-modern-info:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(6, 182, 212, 0.3);
            color: white;
        }

        .btn-modern-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
        }

        .btn-modern-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
            color: white;
        }

        .btn-modern-warning {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white;
        }

        .btn-modern-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
            color: white;
        }

        /* File Download Box */
        .file-download-box {
            background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
            border-radius: 12px;
            padding: 20px;
            margin: 10px;
            border: 1px solid rgba(59, 130, 246, 0.2);
            box-shadow: 0 2px 8px rgba(59, 130, 246, 0.1);
            transition: all 0.3s ease;
            text-align: center;
        }

        .file-download-box:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.2);
        }

        .file-download-box p {
            color: #1e40af;
            font-weight: 700;
            font-size: 1rem;
            margin-bottom: 12px;
        }

        /* Status Table */
        .status-table {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            border-radius: 12px;
            overflow: hidden;
            border: 2px solid #10b981;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.2);
        }

        .status-table thead {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }

        .status-table thead th {
            color: white;
            font-weight: 700;
            padding: 16px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-table tbody td {
            color: #047857;
            font-weight: 700;
            font-size: 1.1rem;
            padding: 20px;
            text-transform: uppercase;
        }

        /* Action Section */
        .action-section {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-radius: 12px;
            padding: 20px;
            border-top: 2px solid #e5e7eb;
            margin-top: 24px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .modern-card-header {
                padding: 20px;
            }

            .detail-table {
                padding: 16px;
            }
        }
    </style>
@endsection

@section('navbar')
    @include('template.navadmin')
@endsection

@section('container')
    <!--  Row 1 -->
    <div class="row container-begin">
        <div class="col-sm-12">

            <nav class="mt-2 mb-4" aria-label="breadcrumb">
                <ul id="breadcrumb" class="mb-0">
                    <li><a href="#"><i class="ti ti-home"></i></a></li>
                    <li><a href="#"><span class=" fa fa-info-circle"> </span> Satpen</a></li>
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> Rekap Satpen</a></li>
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> Detail</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <div class="modern-card">
                <div class="modern-card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0">Detail Satuan Pendidikan</h5>
                            <small>Informasi lengkap profil dan dokumen satuan pendidikan</small>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('a.rekapsatpen') }}" class="btn btn-modern-info">
                                <i class="ti ti-arrow-back-up"></i> Kembali
                            </a>
                            <a href="{{ route('a.satpen.history', $satpenProfile->id_user) }}" class="btn btn-modern-success">
                                <i class="ti ti-history-toggle"></i> Riwayat Layanan
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4">
                    <div class="row mt-3">
                        <div class="col-sm-5" style="overflow-x:auto;">
                            <div class="detail-table">
                                <h5 class="section-header">Informasi Satuan Pendidikan</h5>
                                <table>
                                    <tbody>
                                        <tr>
                                            <th width="140">NPSN</th>
                                            <td width="30">:</td>
                                            <td><strong class="text-primary">{{ $satpenProfile->npsn }}</strong></td>
                                        </tr>
                                        <tr>
                                            <th>No. Registrasi</th>
                                            <td>:</td>
                                            <td><strong>{{ $satpenProfile->no_registrasi }}</strong></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Satpen</th>
                                            <td>:</td>
                                            <td><strong>{{ $satpenProfile->nm_satpen }}</strong></td>
                                        </tr>
                                        <tr>
                                            <th>Jenjang Pendidikan</th>
                                            <td>:</td>
                                            <td>{{ $satpenProfile->jenjang->nm_jenjang }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kategori Satpen</th>
                                            <td>:</td>
                                            <td>{{ $satpenProfile->kategori?->nm_kategori }}</td>
                                        </tr>
                                        <tr>
                                            <th>Yayasan</th>
                                            <td>:</td>
                                            <td>{{ $satpenProfile->yayasan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kepala Sekolah</th>
                                            <td>:</td>
                                            <td>{{ $satpenProfile->kepsek }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tahun Berdiri</th>
                                            <td>:</td>
                                            <td>{{ $satpenProfile->thn_berdiri }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>:</td>
                                            <td>{{ $satpenProfile->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Telpon</th>
                                            <td>:</td>
                                            <td>{{ $satpenProfile->telpon }}</td>
                                        </tr>
                                        <tr>
                                            <th>Fax</th>
                                            <td>:</td>
                                            <td>{{ $satpenProfile->fax }}</td>
                                        </tr>
                                        <tr>
                                            <th>Provinsi</th>
                                            <td>:</td>
                                            <td>{{ $satpenProfile->provinsi->nm_prov }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kabupaten</th>
                                            <td>:</td>
                                            <td>{{ $satpenProfile->kabupaten->nama_kab }}</td>
                                        </tr>
                                        <tr>
                                            <th>Cabang</th>
                                            <td>:</td>
                                            <td>{{ $satpenProfile->cabang->nama_pc }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kecamatan</th>
                                            <td>:</td>
                                            <td>{{ $satpenProfile->kecamatan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kelurahan/Desa</th>
                                            <td>:</td>
                                            <td>{{ $satpenProfile->kelurahan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>:</td>
                                            <td>{{ $satpenProfile->alamat }}</td>
                                        </tr>
                                        <tr>
                                            <th>Aset Tanah</th>
                                            <td>:</td>
                                            <td>{{ $satpenProfile->aset_tanah }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama Pemilik</th>
                                            <td>:</td>
                                            <td>{{ $satpenProfile->nm_pemilik }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-7 d-flex flex-column justify-content-between">
                            <div class="row">
                                <div class="col-sm-6 px-3">
                                    <h5 class="section-header">File Pendukung</h5>
                                    @foreach ($satpenProfile->filereg as $row)
                                        <div class="mb-3 px-3 py-2 card-box-detail">
                                            <h6 class="text-capitalize">{{ Strings::replaceMapFile($row->mapfile) }}</h6>
                                            <p class="mb-1"><strong>{{ $row->nm_lembaga }}</strong> {{ $row->daerah }}</p>
                                            <p class="mb-2">Nomor: <strong>{{ $row->nomor_surat }}</strong></p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small><i class="ti ti-calendar"></i> {{ \App\Helpers\Date::tglMasehi($row->tgl_surat) }}</small>
                                                <a href="{{ route('viewerpdf', $row->filesurat) }}" target="_blank">
                                                    <span class="badge bg-primary">
                                                        <i class="ti ti-eye"></i> Lihat PDF
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-sm-6 d-flex flex-column justify-content-between">
                                    <div>
                                        <h5 class="section-header">Riwayat Status</h5>
                                        <div style="max-height:35rem;overflow:auto;">
                                            <ul class="timeline">
                                                @foreach ($satpenProfile->timeline as $row)
                                                    <li>
                                                        <a href="#" class="text-capitalize fw-bold">{{ $row->status_verifikasi }}</a>
                                                        <p class="mb-0 text-muted"><i class="ti ti-calendar"></i> {{ $row->tgl_status }}</p>
                                                        <small class="text-muted">{{ $row->keterangan }}</small>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (!in_array(auth()->user()->role, ['admin wilayah', 'admin cabang']))
                                <div class="row mt-3">
                                    <div class="col ps-3 pe-5 py-3">
                                        <div class="action-section">
                                            <div class="d-flex justify-content-end gap-2 flex-wrap">
                                                <form class="d-inline extendBtn"
                                                    action="{{ route('a.satpen.changestatus', $satpenProfile->id_satpen) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status_verifikasi" value="perpanjangan">
                                                    <button type="submit" class="btn btn-modern-info">
                                                        <i class="ti ti-refresh"></i> Perpanjangan
                                                    </button>
                                                </form>

                                                <form class="d-inline usangBtn"
                                                    action="{{ route('a.satpen.changestatus', $satpenProfile->id_satpen) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status_verifikasi" value="expired">
                                                    <button type="submit" class="btn btn-modern-warning">
                                                        <i class="ti ti-alert-triangle"></i> Usangkan Dokumen
                                                    </button>
                                                </form>

                                                @if (in_array(auth()->user()->role, ['super admin']))
                                                    <form action="{{ route('a.rekapsatpen.destroy', $satpenProfile->id_satpen) }}"
                                                        method="post" class="d-inline deleteBtn">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-modern-danger">
                                                            <i class="ti ti-trash"></i> Hapus Satpen
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>
                    <div class="row border-2 border-top pt-4 mt-4 mx-sm-2">
                        <div class="col-sm-7 d-flex justify-content-center align-items-center">
                            <div class="file-download-box">
                                <p class="mb-3"><i class="ti ti-file-certificate"></i> Piagam LP Ma'arif</p>
                                <a href="{{ route('pdf.generated', ['type' => $satpenProfile->file[0]->typefile, 'fileName' => $satpenProfile->file[0]->nm_file]) }}"
                                    target="_blank" class="btn btn-modern-primary">
                                    <i class="ti ti-eye"></i> Tampilkan Dokumen
                                </a>
                            </div>
                            <div class="file-download-box">
                                <p class="mb-3"><i class="ti ti-file-text"></i> SK Satuan Pendidikan</p>
                                <a href="{{ route('pdf.generated', ['type' => $satpenProfile->file[1]->typefile, 'fileName' => $satpenProfile->file[1]->nm_file]) }}"
                                    target="_blank" class="btn btn-modern-primary">
                                    <i class="ti ti-eye"></i> Tampilkan Dokumen
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-5 d-flex justify-content-center align-items-center">
                            <table class="status-table w-100 text-center my-0">
                                <thead>
                                    <tr>
                                        <th><i class="ti ti-flag"></i> Status Registrasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-capitalize">
                                            {{ $satpenProfile->timeline[sizeof($satpenProfile->timeline) - 1]->status_verifikasi }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(".deleteBtn").on('click', function() {
            if (confirm("Apakah Anda yakin akan menghapus data satuan pendidikan ini? Data yang dihapus tidak dapat dikembalikan.")) {
                return true;
            }
            return false;
        });

        $(".usangBtn").on('click', function() {
            if (confirm("Apakah Anda yakin akan mengusangkan dokumen satuan pendidikan ini? Dokumen yang diusangkan perlu diperpanjang.")) {
                return true;
            }
            return false;
        });

        $(".extendBtn").on('click', function() {
            if (confirm("Apakah Anda yakin akan memproses perpanjangan dokumen satuan pendidikan ini?")) {
                return true;
            }
            return false;
        });
    </script>
@endsection
