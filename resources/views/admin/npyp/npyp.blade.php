@extends('template.layout', [
    'title' => 'Sipinter - Manajemen NPYP',
])

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
                    <li><a href="#"><span class=" fa fa-info-circle"> </span> Manajemen NPYP</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <!-- Header Information -->
            <div class="card w-100 mb-4">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="card-title fw-bold text-warning mb-2">
                                <i class="ti ti-shield-star me-2"></i>MANAJEMEN DATA NPYP
                            </h4>
                            <p class="text-muted mb-0">
                                Halaman ini digunakan untuk mengelola data Nomor Pokok Yayasan Penyelenggara (NPYP) tingkat. 
                                NPYP merupakan identitas unik yang diberikan kepada yayasan penyelenggara pendidikan yang telah memenuhi 
                                persyaratan dan terdaftar secara resmi di sistem.
                            </p>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="bg-light-warning p-3 rounded">
                                <h6 class="text-warning mb-1">Status Data</h6>
                                <h4 class="text-warning mb-0">
                                    @if($npyp)
                                        <i class="ti ti-check-circle"></i> Tersedia
                                    @else
                                        <i class="ti ti-alert-circle"></i> Belum Ada
                                    @endif
                                </h4>
                                <small class="text-muted">NPYP</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <div class="card w-100 mb-4">
                <div class="card-body pt-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title fw-bold mb-0">
                            <i class="ti ti-forms me-2"></i>
                            @if($npyp)
                                Edit Data NPYP
                            @else
                                Tambah Data NPYP Baru
                            @endif
                        </h5>
                        <span class="badge bg-light-warning text-warning">
                            @if($npyp)
                                Mode Edit
                            @else
                                Mode Tambah
                            @endif
                        </span>
                    </div>

                    <div class="alert alert-warning d-flex align-items-center mb-3" role="alert">
                        <i class="ti ti-info-circle me-2"></i>
                        <div>
                            <strong>Petunjuk:</strong> 
                            @if($npyp)
                                Anda dapat mengubah informasi NPYP melalui form di bawah ini. Pastikan semua data terisi dengan benar sebelum menyimpan.
                            @else
                                Lengkapi semua informasi yang diperlukan untuk mendaftarkan NPYP baru. Semua field wajib diisi.
                            @endif
                        </div>
                    </div>

                    <form method="POST" action="{{ $npyp ? route('a.npyp.update', $npyp->id_npyp) : route('a.npyp.store') }}">
                        @csrf
                        @if($npyp)
                            @method('PUT')
                        @endif
                        <fieldset class="border p-3 pb-0 rounded mt-2 mb-3">
                            <legend class="fw-bold fs-6 mb-3">
                                <i class="ti ti-file-certificate me-2"></i>Form Data NPYP
                            </legend>
                            <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td class="fw-bold" style="width: 200px;">Nomor NPYP</td>
                                    <td style="width: 10px;">:</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm @error('nomor_npyp') is-invalid @enderror"
                                            id="nomor_npyp" name="nomor_npyp"
                                            value="{{ old('nomor_npyp', $npyp->nomor_npyp ?? '') }}">
                                        <div class="invalid-feedback">
                                            @error('nomor_npyp')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Nama NPYP</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm @error('nama_npyp') is-invalid @enderror"
                                            id="nama_npyp" name="nama_npyp"
                                            value="{{ old('nama_npyp', $npyp->nama_npyp ?? '') }}">
                                        <div class="invalid-feedback">
                                            @error('nama_npyp')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Nama Operator</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm @error('nama_operator') is-invalid @enderror"
                                            id="nama_operator" name="nama_operator"
                                            value="{{ old('nama_operator', $npyp->nama_operator ?? '') }}">
                                        <div class="invalid-feedback">
                                            @error('nama_operator')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Nomor Operator</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm @error('nomor_operator') is-invalid @enderror"
                                            id="nomor_operator" name="nomor_operator"
                                            value="{{ old('nomor_operator', $npyp->nomor_operator ?? '') }}">
                                        <div class="invalid-feedback">
                                            @error('nomor_operator')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button type="submit" class="btn btn-warning">
                                                <i class="ti ti-device-floppy"></i> 
                                                @if($npyp)
                                                    Update Data NPYP
                                                @else
                                                    Simpan Data NPYP
                                                @endif
                                            </button>
                                            @if($npyp)
                                                <span class="badge bg-success align-self-center">
                                                    <i class="ti ti-check me-1"></i>Data Tersimpan
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    </form>
                </div>
            </div>

            <!-- Sekolah Naungan Section -->
            <div class="card w-100">
                <div class="card-body pt-3">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold mb-0">
                            <i class="ti ti-school me-2"></i>Daftar Sekolah Naungan NPYP
                        </h5>
                        <div class="d-flex gap-2">
                            @if($npyp)
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sekolahNaunganModal"> 
                                    <i class="ti ti-plus"></i> Tambah Sekolah Naungan
                                </button>
                            @else
                                <div class="alert alert-warning p-2 m-0" role="alert">
                                    <small><i class="ti ti-alert-triangle me-1"></i>Simpan data NPYP terlebih dahulu</small>
                                </div>
                            @endif
                        </div>
                    </div>

                    @if($npyp)
                        <div class="alert alert-info d-flex align-items-center mb-3" role="alert">
                            <i class="ti ti-info-circle me-2"></i>
                            <div>
                                <strong>Informasi:</strong> Tabel di bawah ini menampilkan daftar sekolah/satuan pendidikan yang berada dalam naungan NPYP. 
                                Gunakan tombol "Tambah Sekolah Naungan" untuk menambahkan sekolah baru atau fitur pencarian untuk menemukan data tertentu.
                            </div>
                        </div>
                    @else
                        <div class="alert alert-warning d-flex align-items-center mb-3" role="alert">
                            <i class="ti ti-alert-triangle me-2"></i>
                            <div>
                                <strong>Perhatian:</strong> Untuk dapat mengelola sekolah naungan, silakan lengkapi dan simpan data NPYP terlebih dahulu 
                                menggunakan form di atas. Setelah data NPYP tersimpan, Anda dapat menambahkan sekolah-sekolah yang berada dalam naungan NPYP tersebut.
                            </div>
                        </div>
                    @endif
                        
                        <!-- Filter Section -->
                        @if (!in_array(auth()->user()->role, ['admin cabang']))
                        <div class="row mb-3">
                            @if (!in_array(auth()->user()->role, ['admin wilayah']))
                            <div class="col-md-4">
                                <label for="filterProvinsi" class="form-label">Filter Provinsi</label>
                                @include('component.selectpicker', [
                                    'id' => 'filterProvinsi',
                                    'name' => 'provinsi',
                                    'prefix' => 'Wilayah ',
                                    'current' => request('provinsi_id'),
                                    'default' => 'Semua Provinsi',
                                    'val' => 'id_prov',
                                    'label' => 'nm_prov',
                                    'data' => $provinsi,
                                ])
                            </div>
                            @endif
                            <div class="col-md-4">
                                <label for="filterKabupaten" class="form-label">Filter Kabupaten</label>
                                @include('component.selectpicker', [
                                    'id' => 'filterKabupaten',
                                    'name' => 'kabupaten',
                                    'prefix' => '',
                                    'current' => request('filterKabupaten'),
                                    'default' => 'Kabupaten',
                                    'val' => 'id_kab',
                                    'label' => 'nama_kab',
                                    'data' => [],
                                ])
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">&nbsp;</label>
                                <div>
                                    <button type="button" class="btn btn-secondary" id="resetFilter">Reset Filter</button>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="card border">
                            <div class="card-header bg-light">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">
                                        <i class="ti ti-database me-2"></i>Data Sekolah Naungan
                                    </h6>
                                    <div class="d-flex align-items-center">
                                        <small class="text-muted me-3">
                                            <i class="ti ti-clock me-1"></i>
                                            Update realtime
                                        </small>
                                        <span class="badge bg-warning text-dark" id="totalSekolahBadge">
                                            <i class="ti ti-school me-1"></i>0 Sekolah
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0" id="sekolahNaunganTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th width="5%" class="text-center">
                                                    <i class="ti ti-hash text-muted"></i>
                                                </th>
                                                <th width="10%">
                                                    <i class="ti ti-id text-primary me-1"></i>NPSN
                                                </th>
                                                <th width="12%">
                                                    <i class="ti ti-file-text text-success me-1"></i>No Registrasi
                                                </th>
                                                <th width="22%">
                                                    <i class="ti ti-school text-warning me-1"></i>Nama Sekolah
                                                </th>
                                                <th width="12%">
                                                    <i class="ti ti-map-pin text-info me-1"></i>Kelurahan
                                                </th>
                                                <th width="12%">
                                                    <i class="ti ti-map text-purple me-1"></i>Kecamatan
                                                </th>
                                                <th width="12%">
                                                    <i class="ti ti-map-2 text-orange me-1"></i>Kabupaten
                                                </th>
                                                <th width="10%">
                                                    <i class="ti ti-world text-cyan me-1"></i>Provinsi
                                                </th>
                                                <th width="5%" class="text-center">
                                                    <i class="ti ti-settings text-muted"></i>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="sekolahNaunganTableBody">
                                            <!-- Data will be populated via DataTables -->
                                            <tr>
                                                <td colspan="9" class="text-center py-5">
                                                    <div class="d-flex flex-column align-items-center">
                                                        <div class="spinner-border text-warning mb-3" role="status">
                                                            <span class="visually-hidden">Loading...</span>
                                                        </div>
                                                        <h6 class="text-muted mb-1">Memuat Data Sekolah Naungan</h6>
                                                        <small class="text-muted">Sedang mengambil daftar sekolah dari database...</small>
                                                    </div>
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

        </div>
    </div>
@endsection

@include('admin.npyp.sekolahNaunganModal')

@section('extendscripts')
    <script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(".deleteBtn").on('click', function() {
            if (confirm("benar anda akan menghapus data?")) {
                return true;
            }
            return false;
        });

        // Make sekolahNaunganTable global so it can be accessed from modal
        let sekolahNaunganTable;

        $(document).ready(function() {
            // Initialize Sekolah Naungan DataTable
            sekolahNaunganTable = $('#sekolahNaunganTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("a.npyp.sekolah-naungan-data") }}',
                    data: function(d) {
                        d.provinsi = $('#filterProvinsi').val();
                        d.kabupaten = $('#filterKabupaten').val();
                    },
                    dataSrc: function(json) {
                        // Update total school count
                        $('#totalSekolahBadge').html(`<i class="ti ti-school me-1"></i>${json.recordsTotal || 0} Sekolah`);
                        return json.data;
                    }
                },
                columns: [
                    { data: 'no', name: 'no', orderable: false, searchable: false },
                    { data: 'npsn', name: 'npsn' },
                    { data: 'no_registrasi', name: 'no_registrasi' },
                    { data: 'nama_satpen', name: 'nama_satpen' },
                    { data: 'kelurahan', name: 'kelurahan' },
                    { data: 'kecamatan', name: 'kecamatan' },
                    { data: 'kabupaten', name: 'kabupaten' },
                    { data: 'provinsi', name: 'provinsi' },
                    { data: 'aksi', name: 'aksi', orderable: false, searchable: false }
                ],
                order: [[1, 'asc']],
                pageLength: 10,
                language: {
                    processing: "Memuat data...",
                    search: "Pencarian:",
                    lengthMenu: "Tampilkan _MENU_ data per halaman",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                    infoFiltered: "(difilter dari _MAX_ total data)",
                    loadingRecords: "Memuat...",
                    zeroRecords: "Tidak ada data yang ditemukan",
                    emptyTable: "Tidak ada data di tabel",
                    paginate: {
                        first: "Pertama",
                        previous: "Sebelumnya", 
                        next: "Selanjutnya",
                        last: "Terakhir"
                    }
                }
            });

            // Filter events
            $('#filterProvinsi').on('change', function() {
                sekolahNaunganTable.draw();
            });

            $('#filterKabupaten').on('change', function() {
                sekolahNaunganTable.draw();
            });

            $('#resetFilter').on('click', function() {
                $('#filterProvinsi').val('');
                $('#filterKabupaten').html('<option value="">Semua Kabupaten</option>');
                sekolahNaunganTable.draw();
            });

            // Delete functionality
            $(document).on('click', '.delete-btn', function() {
                let id = $(this).data('id');
                if (confirm('Apakah Anda yakin ingin menghapus sekolah naungan ini?')) {
                    deleteSekolahNaungan(id);
                }
            });

            function deleteSekolahNaungan(id) {
                $.ajax({
                    url: '{{ route("a.npyp.delete-sekolah-naungan", ":id") }}'.replace(':id', id),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Sekolah naungan berhasil dihapus');
                            sekolahNaunganTable.draw();
                        } else {
                            alert('Gagal menghapus sekolah naungan: ' + response.message);
                        }
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan saat menghapus data');
                    }
                });
            }
           
            // Sekolah Naungan Modal functionality
            initSekolahNaunganModal();
        });
    </script>
@endsection

@include('admin.satpen.detailSatpenPermohonan')
