@extends('template.layout', [
    'title' => 'Sipinter - Manajemen Coretax',
])

@section('navbar')
    @include('template.navadmin')
@endsection

@section('style')
<!-- Custom CSS for enhanced styling -->
    <style>
        /* Enhanced card styling */
        .card {
            box-shadow: none;
            border: none;
            transition: all 0.3s ease;
        }

        /* Statistics cards hover effects */
        .col-md-2 .card:hover {
            transform: translateY(-2px);
        }

        /* Enhanced tab styling */
        .nav-pills .nav-link {
            background: transparent;
            border: 1px solid #e9ecef;
            color: #6c757d;
            transition: all 0.3s ease;
            margin: 0 2px;
            border-radius: 8px;
        }

        .nav-pills .nav-link:hover {
            background: rgba(var(--bs-primary-rgb), 0.1);
            border-color: var(--bs-primary);
            color: var(--bs-primary);
            transform: translateY(-1px);
        }

        .nav-pills .nav-link.active {
            background: linear-gradient(45deg, var(--bs-primary), var(--bs-primary-dark));
            border-color: var(--bs-primary);
            box-shadow: 0 4px 12px rgba(var(--bs-primary-rgb), 0.3);
        }

        /* Table enhancements */
        .table-hover tbody tr:hover {
            background-color: rgba(var(--bs-primary-rgb), 0.05);
        }

        /* Badge styling */
        .badge {
            font-size: 0.75em;
            padding: 0.35em 0.65em;
        }

        /* Button hover effects */
        .btn {
            transition: all 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        /* Alert styling */
        .alert {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        /* Loading animation */
        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.5; }
            100% { opacity: 1; }
        }

        .loading {
            animation: pulse 2s infinite;
        }

        /* Responsive improvements */
        @media (max-width: 768px) {
            .nav-pills .nav-link {
                font-size: 0.875rem;
                padding: 0.5rem 0.75rem;
            }

            .statistics-card h5 {
                font-size: 1rem;
            }
        }

        /* Custom background gradients */
        .bg-light-primary {
            background: linear-gradient(135deg, rgba(var(--bs-primary-rgb), 0.1), rgba(var(--bs-primary-rgb), 0.2)) !important;
        }
    </style>
@endsection

@section('container')
    <!--  Row 1 -->
    <div class="row container-begin">
        <div class="col-sm-12">

            <nav class="mt-2 mb-4" aria-label="breadcrumb">
                <ul id="breadcrumb" class="mb-0">
                    <li><a href="#"><i class="ti ti-home"></i></a></li>
                    <li><a href="#"><span class=" fa fa-info-circle"> </span> Coretax</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <!-- Header Information -->
            <div class="card w-100 mb-4">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="card-title fw-bold text-primary mb-2">
                                <i class="ti ti-receipt-tax me-2"></i>MANAJEMEN CORETAX
                            </h4>
                            <p class="text-muted mb-0">
                                Sistem pengelolaan layanan Coretax untuk semua level pengguna.
                                Monitor dan kelola pengajuan layanan perpajakan dari Satuan Pendidikan, Cabang, hingga Wilayah.
                            </p>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="bg-light-primary p-3 rounded">
                                <h6 class="text-primary mb-1">Total Pengajuan</h6>
                                <h4 class="text-primary mb-0">
                                    <i class="ti ti-files"></i>
                                    <span>{{ count($coretaxVer) + count($coretaxExp) + count($coretaxRev) + count($coretaxPro) + count($coretaxSatpen) + count($coretaxCab ?? []) + count($coretaxWil ?? []) }}</span>
                                </h4>
                                <small class="text-muted">Semua Status</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content with Enhanced Tabs -->
            <div class="card w-100">
                <div class="card-body">
                    <!-- Enhanced Tab Navigation -->
                    <ul class="nav nav-pills nav-fill mb-4" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="verifikasi-tab" data-bs-toggle="pill" data-bs-target="#verifikasi"
                                type="button" role="tab" aria-controls="verifikasi" aria-selected="true">
                                <i class="ti ti-clock-hour-9 me-2"></i>Verifikasi
                                <span class="badge bg-warning text-dark ms-1">{{ count($coretaxVer) }}</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="buka-expiry-tab" data-bs-toggle="pill" data-bs-target="#buka-expiry"
                                type="button" role="tab" aria-controls="buka-expiry" aria-selected="false">
                                <i class="ti ti-calendar-time me-2"></i>Buka Expiry
                                <span class="badge bg-info ms-1">{{ count($coretaxExp) }}</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="revisi-tab" data-bs-toggle="pill" data-bs-target="#revisi" type="button"
                                role="tab" aria-controls="revisi" aria-selected="false">
                                <i class="ti ti-edit me-2"></i>Revisi
                                <span class="badge bg-danger ms-1">{{ count($coretaxRev) }}</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="proses-tab" data-bs-toggle="pill" data-bs-target="#proses" type="button"
                                role="tab" aria-controls="proses" aria-selected="false">
                                <i class="ti ti-settings me-2"></i>Sedang Diproses
                                <span class="badge bg-primary ms-1">{{ count($coretaxPro) }}</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="satpen-tab" data-bs-toggle="pill" data-bs-target="#satpen" type="button"
                                role="tab" aria-controls="satpen" aria-selected="false">
                                <i class="ti ti-school me-2"></i>Satpen
                                <span class="badge bg-success ms-1">{{ count($coretaxSatpen) }}</span>
                            </button>
                        </li>
                        @if (!in_array(auth()->user()->role, ['admin cabang']))
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="cabang-tab" data-bs-toggle="pill" data-bs-target="#cabang"
                                    type="button" role="tab" aria-controls="cabang" aria-selected="false">
                                    <i class="ti ti-building me-2"></i>Cabang
                                    <span class="badge bg-success ms-1">{{ count($coretaxCab ?? []) }}</span>
                                </button>
                            </li>
                            @if (!in_array(auth()->user()->role, ['admin wilayah']))
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="wilayah-tab" data-bs-toggle="pill" data-bs-target="#wilayah"
                                        type="button" role="tab" aria-controls="wilayah" aria-selected="false">
                                        <i class="ti ti-map me-2"></i>Wilayah
                                        <span class="badge bg-success ms-1">{{ count($coretaxWil ?? []) }}</span>
                                    </button>
                                </li>
                            @endif
                        @endif
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content" id="myTabContent">
                        <!-- Verifikasi Tab -->
                        <div class="tab-pane fade show active" id="verifikasi" role="tabpanel" aria-labelledby="verifikasi-tab">
                            <div class="alert alert-warning d-flex align-items-center mb-3" role="alert">
                                <i class="ti ti-info-circle me-2"></i>
                                <div>
                                    <strong>Informasi:</strong> Data Coretax pada tab ini menunggu verifikasi dari admin.
                                    Anda dapat menerima atau menolak pengajuan berdasarkan kelengkapan dokumen.
                                </div>
                            </div>
                            <div class="card border-0">
                                <div class="card-header bg-light">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0">
                                            <i class="ti ti-clock-hour-9 me-2"></i>Pengajuan Layanan Coretax - Verifikasi
                                        </h6>
                                        <small class="text-muted">
                                            <i class="ti ti-clock me-1"></i>Update realtime
                                        </small>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="dtable">
                                            <thead class="table-light">
                                                <tr>
                                                    <th width="5%" class="text-center">
                                                        <i class="ti ti-hash text-muted"></i>
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-file-text text-primary me-1"></i>No. Registrasi
                                                    </th>
                                                    <th width="15%">
                                                        <i class="ti ti-building text-warning me-1"></i>Nama Entitas
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-map text-info me-1"></i>Provinsi
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-map-pin text-cyan me-1"></i>Kabupaten
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-calendar text-success me-1"></i>Tgl Permohonan
                                                    </th>
                                                    <th width="8%">
                                                        <i class="ti ti-receipt-tax text-purple me-1"></i>NITKU
                                                    </th>
                                                    <th width="12%">
                                                        <i class="ti ti-user text-orange me-1"></i>Nama PIC
                                                    </th>
                                                    <th width="8%">
                                                        <i class="ti ti-id text-indigo me-1"></i>NIK PIC
                                                    </th>
                                                    <th width="7%">
                                                        <i class="ti ti-flag text-teal me-1"></i>Level
                                                    </th>
                                                    <th width="10%" class="text-center">
                                                        <i class="ti ti-settings text-muted"></i>Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($coretaxVer) > 0)
                                                    @foreach ($coretaxVer as $row)
                                                        <tr>
                                                            <td class="text-center">
                                                                <span class="badge bg-light text-dark">{{ $loop->iteration }}</span>
                                                            </td>
                                                @if ($row->satpen)
                                                    <td><a class="text-decoration-none"
                                                            href="{{ route('a.rekapsatpen.detail', $row->satpen->id_satpen) }}"
                                                            class="text-decoration-underline">
                                                            {{ $row->satpen->no_registrasi }}
                                                        </a></td>
                                                    <td>{{ $row->satpen->nm_satpen }}</td>
                                                    <td>{{ $row->satpen->provinsi->nm_prov }}</td>
                                                    <td>{{ $row->satpen->kabupaten->nama_kab }}</td>
                                                @elseif ($row->cabang)
                                                    <td></td>
                                                    <td><a class="text-decoration-none"
                                                            href="{{ route('a.cabang.detail', $row->id_pc) }}"
                                                            class="text-decoration-underline">
                                                            {{ $row->cabang->nama_pc }}
                                                        </a></td>
                                                    <td>{{ $row->cabang->prov->nm_prov }}</td>
                                                    <td>{{ $row->cabang->profile->kabupaten }}</td>
                                                @elseif ($row->wilayah)
                                                    <td></td>
                                                    <td><a class="text-decoration-none"
                                                            href="{{ route('a.wilayah.detail', $row->id_pw) }}"
                                                            class="text-decoration-underline">
                                                            Wilayah {{ $row->wilayah->nm_prov }}
                                                        </a></td>
                                                    <td>{{ $row->wilayah->nm_prov }}</td>
                                                    <td>{{ $row->wilayah->profile->kabupaten }}</td>
                                                @endif
                                                <td>{{ Date::tglReverseDash($row->tgl_submit) }}</td>
                                                <td>{{ $row->nitku }}</td>
                                                <td>{{ $row->nama_pic }}</td>
                                                <td>{{ $row->nik_pic }}</td>
                                                <td>
                                                    @if ($row->satpen)
                                                        <span class="badge bg-info rounded-3 fw-semibold">SATPEN</span>
                                                    @elseif ($row->cabang)
                                                        <span class="badge bg-info rounded-3 fw-semibold">CABANG</span>
                                                    @elseif ($row->wilayah)
                                                        <span class="badge bg-info rounded-3 fw-semibold">WILAYAH</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-info me-1 my-sm-1"
                                                        data-bs-toggle="modal" data-bs-target="#modalDetailBackdrop"
                                                        data-bs="{{ $row->id }}"><i class="ti ti-eye"></i></button>
                                                    @if (!in_array(auth()->user()->role, ['admin wilayah', 'admin cabang']))
                                                        <a href="{{ route('a.coretax.acc', $row->id) }}">
                                                            <button class="btn btn-sm btn-success me-1">
                                                                <i class="ti ti-checks"></i>
                                                            </button>
                                                        </a>
                                                        <button class="btn btn-sm btn-danger me-1" data-bs-toggle="modal"
                                                            data-bs-target="#modalTolak" data-bs="{{ $row->id }}">
                                                            <i class="ti ti-x"></i>
                                                        </button>
                                                    @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="11" class="text-center py-5">
                                                            <div class="d-flex flex-column align-items-center">
                                                                <i class="ti ti-inbox fs-1 text-muted mb-3"></i>
                                                                <h6 class="text-muted mb-1">Tidak Ada Data Verifikasi</h6>
                                                                <small class="text-muted">Belum ada pengajuan yang perlu diverifikasi</small>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Verifikasi -->
                        <!-- Buka Expiry Tab -->
                        <div class="tab-pane fade" id="buka-expiry" role="tabpanel" aria-labelledby="buka-expiry-tab">
                            <div class="alert alert-info d-flex align-items-center mb-3" role="alert">
                                <i class="ti ti-calendar-time me-2"></i>
                                <div>
                                    <strong>Informasi:</strong> Data Coretax pada tab ini memerlukan perpanjangan masa berlaku.
                                    Kelola permintaan perpanjangan tanggal expiry dengan bijak.
                                </div>
                            </div>
                            <div class="card border-0">
                                <div class="card-header bg-light">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0">
                                            <i class="ti ti-calendar-time me-2"></i>Pengajuan Buka Expiry Coretax
                                        </h6>
                                        <small class="text-muted">
                                            <i class="ti ti-clock me-1"></i>Update realtime
                                        </small>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="dtable7">
                                            <thead class="table-light">
                                                <tr>
                                                    <th width="5%" class="text-center">
                                                        <i class="ti ti-hash text-muted"></i>
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-file-text text-primary me-1"></i>No. Registrasi
                                                    </th>
                                                    <th width="15%">
                                                        <i class="ti ti-building text-warning me-1"></i>Nama Entitas
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-map text-info me-1"></i>Provinsi
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-map-pin text-cyan me-1"></i>Kabupaten
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-calendar text-success me-1"></i>Tgl Permohonan
                                                    </th>
                                                    <th width="8%">
                                                        <i class="ti ti-receipt-tax text-purple me-1"></i>NITKU
                                                    </th>
                                                    <th width="12%">
                                                        <i class="ti ti-user text-orange me-1"></i>Nama PIC
                                                    </th>
                                                    <th width="8%">
                                                        <i class="ti ti-id text-indigo me-1"></i>NIK PIC
                                                    </th>
                                                    <th width="7%">
                                                        <i class="ti ti-flag text-teal me-1"></i>Level
                                                    </th>
                                                    <th width="10%" class="text-center">
                                                        <i class="ti ti-settings text-muted"></i>Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($coretaxExp) > 0)
                                                    @foreach ($coretaxExp as $row)
                                                        <tr>
                                                            <td class="text-center">
                                                                <span class="badge bg-light text-dark">{{ $loop->iteration }}</span>
                                                            </td>
                                                @if ($row->satpen)
                                                    <td><a class="text-decoration-none"
                                                            href="{{ route('a.rekapsatpen.detail', $row->satpen->id_satpen) }}"
                                                            class="text-decoration-underline">
                                                            {{ $row->satpen->no_registrasi }}
                                                        </a></td>
                                                    <td>{{ $row->satpen->nm_satpen }}</td>
                                                    <td>{{ $row->satpen->provinsi->nm_prov }}</td>
                                                    <td>{{ $row->satpen->kabupaten->nama_kab }}</td>
                                                @elseif ($row->cabang)
                                                    <td></td>
                                                    <td><a class="text-decoration-none"
                                                            href="{{ route('a.cabang.detail', $row->id_pc) }}"
                                                            class="text-decoration-underline">
                                                            {{ $row->cabang->nama_pc }}
                                                        </a></td>
                                                    <td>{{ $row->cabang->prov->nm_prov }}</td>
                                                    <td>{{ $row->cabang->profile->kabupaten }}</td>
                                                @elseif ($row->wilayah)
                                                    <td></td>
                                                    <td><a class="text-decoration-none"
                                                            href="{{ route('a.wilayah.detail', $row->id_pw) }}"
                                                            class="text-decoration-underline">
                                                            Wilayah {{ $row->wilayah->nm_prov }}
                                                        </a></td>
                                                    <td>{{ $row->wilayah->nm_prov }}</td>
                                                    <td>{{ $row->wilayah->profile->kabupaten }}</td>
                                                @endif
                                                <td>{{ Date::tglReverseDash($row->tgl_submit) }}</td>
                                                <td>{{ $row->nitku }}</td>
                                                <td>{{ $row->nama_pic }}</td>
                                                <td>{{ $row->nik_pic }}</td>
                                                <td>
                                                    @if ($row->satpen)
                                                        <span class="badge bg-info rounded-3 fw-semibold">SATPEN</span>
                                                    @elseif ($row->cabang)
                                                        <span class="badge bg-info rounded-3 fw-semibold">CABANG</span>
                                                    @elseif ($row->wilayah)
                                                        <span class="badge bg-info rounded-3 fw-semibold">WILAYAH</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-info me-1 my-sm-1"
                                                        data-bs-toggle="modal" data-bs-target="#modalDetailBackdrop"
                                                        data-bs="{{ $row->id }}"><i class="ti ti-eye"></i></button>
                                                    @if (!in_array(auth()->user()->role, ['admin wilayah', 'admin cabang']))
                                                        <a href="{{ route('a.coretax.open-expiry', $row->id) }}">
                                                            <button class="btn btn-sm btn-success me-1">
                                                                <i class="ti ti-checks"></i>
                                                            </button>
                                                        </a>
                                                    @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="11" class="text-center py-5">
                                                            <div class="d-flex flex-column align-items-center">
                                                                <i class="ti ti-calendar-time fs-1 text-muted mb-3"></i>
                                                                <h6 class="text-muted mb-1">Tidak Ada Permintaan Buka Expiry</h6>
                                                                <small class="text-muted">Belum ada permintaan perpanjangan masa berlaku</small>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Buka Expiry -->
                        <!-- Revisi Tab -->
                        <div class="tab-pane fade" id="revisi" role="tabpanel" aria-labelledby="revisi-tab">
                            <div class="alert alert-danger d-flex align-items-center mb-3" role="alert">
                                <i class="ti ti-edit me-2"></i>
                                <div>
                                    <strong>Perhatian:</strong> Data Coretax pada tab ini memerlukan perbaikan atau revisi.
                                    Proses pengajuan yang dikembalikan untuk diperbaiki oleh pemohon.
                                </div>
                            </div>
                            <div class="card border-0">
                                <div class="card-header bg-light">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0">
                                            <i class="ti ti-edit me-2"></i>Revisi Layanan Coretax
                                        </h6>
                                        <small class="text-muted">
                                            <i class="ti ti-clock me-1"></i>Update realtime
                                        </small>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="dtable2">
                                            <thead class="table-light">
                                                <tr>
                                                    <th width="5%" class="text-center">
                                                        <i class="ti ti-hash text-muted"></i>
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-file-text text-primary me-1"></i>No. Registrasi
                                                    </th>
                                                    <th width="15%">
                                                        <i class="ti ti-building text-warning me-1"></i>Nama Entitas
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-map text-info me-1"></i>Provinsi
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-map-pin text-cyan me-1"></i>Kabupaten
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-calendar text-success me-1"></i>Tgl Permohonan
                                                    </th>
                                                    <th width="8%">
                                                        <i class="ti ti-receipt-tax text-purple me-1"></i>NITKU
                                                    </th>
                                                    <th width="12%">
                                                        <i class="ti ti-user text-orange me-1"></i>Nama PIC
                                                    </th>
                                                    <th width="8%">
                                                        <i class="ti ti-id text-indigo me-1"></i>NIK PIC
                                                    </th>
                                                    <th width="7%">
                                                        <i class="ti ti-flag text-teal me-1"></i>Level
                                                    </th>
                                                    <th width="10%" class="text-center">
                                                        <i class="ti ti-settings text-muted"></i>Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($coretaxRev) > 0)
                                                    @foreach ($coretaxRev as $row)
                                                        <tr>
                                                            <td class="text-center">
                                                                <span class="badge bg-light text-dark">{{ $loop->iteration }}</span>
                                                            </td>
                                                @if ($row->satpen)
                                                    <td><a class="text-decoration-none"
                                                            href="{{ route('a.rekapsatpen.detail', $row->satpen->id_satpen) }}"
                                                            class="text-decoration-underline">
                                                            {{ $row->satpen->no_registrasi }}
                                                        </a></td>
                                                    <td>{{ $row->satpen->nm_satpen }}</td>
                                                    <td>{{ $row->satpen->provinsi->nm_prov }}</td>
                                                    <td>{{ $row->satpen->kabupaten->nama_kab }}</td>
                                                @elseif ($row->cabang)
                                                    <td></td>
                                                    <td><a class="text-decoration-none"
                                                            href="{{ route('a.cabang.detail', $row->id_pc) }}"
                                                            class="text-decoration-underline">
                                                            {{ $row->cabang->nama_pc }}
                                                        </a></td>
                                                    <td>{{ $row->cabang->prov->nm_prov }}</td>
                                                    <td>{{ $row->cabang->profile->kabupaten }}</td>
                                                @elseif ($row->wilayah)
                                                    <td></td>
                                                    <td><a class="text-decoration-none"
                                                            href="{{ route('a.wilayah.detail', $row->id_pw) }}"
                                                            class="text-decoration-underline">
                                                            Wilayah {{ $row->wilayah->nm_prov }}
                                                        </a></td>
                                                    <td>{{ $row->wilayah->nm_prov }}</td>
                                                    <td>{{ $row->wilayah->profile->kabupaten }}</td>
                                                @endif
                                                <td>{{ Date::tglReverseDash($row->tgl_submit) }}</td>
                                                <td>{{ $row->nitku }}</td>
                                                <td>{{ $row->nama_pic }}</td>
                                                <td>{{ $row->nik_pic }}</td>
                                                <td>
                                                    @if ($row->satpen)
                                                        <span class="badge bg-info rounded-3 fw-semibold">SATPEN</span>
                                                    @elseif ($row->cabang)
                                                        <span class="badge bg-info rounded-3 fw-semibold">CABANG</span>
                                                    @elseif ($row->wilayah)
                                                        <span class="badge bg-info rounded-3 fw-semibold">WILAYAH</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-info me-1 my-sm-1"
                                                        data-bs-toggle="modal" data-bs-target="#modalDetailBackdrop"
                                                        data-bs="{{ $row->id }}"><i class="ti ti-eye"></i></button>
                                                    @if (!in_array(auth()->user()->role, ['admin wilayah', 'admin cabang']))
                                                        <button class="btn btn-sm btn-success me-1" data-bs-toggle="modal"
                                                            data-bs-target="#modalAppear" data-bs="{{ $row->id }}">
                                                            <i class="ti ti-checks"></i>
                                                        </button>
                                                        <button class="btn btn-sm btn-danger me-1" data-bs-toggle="modal"
                                                            data-bs-target="#modalTolak" data-bs="{{ $row->id }}">
                                                            <i class="ti ti-x"></i>
                                                        </button>
                                                    @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="11" class="text-center py-5">
                                                            <div class="d-flex flex-column align-items-center">
                                                                <i class="ti ti-edit fs-1 text-muted mb-3"></i>
                                                                <h6 class="text-muted mb-1">Tidak Ada Data Revisi</h6>
                                                                <small class="text-muted">Belum ada pengajuan yang perlu direvisi</small>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Revisi -->
                        <!-- Proses Tab -->
                        <div class="tab-pane fade" id="proses" role="tabpanel" aria-labelledby="proses-tab">
                            <div class="alert alert-primary d-flex align-items-center mb-3" role="alert">
                                <i class="ti ti-settings me-2"></i>
                                <div>
                                    <strong>Status:</strong> Data Coretax pada tab ini sedang dalam tahap proses lebih lanjut.
                                    Dokumen sedang dalam pembuatan atau pengecekan oleh tim admin.
                                </div>
                            </div>
                            <div class="card border-0">
                                <div class="card-header bg-light">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0">
                                            <i class="ti ti-settings me-2"></i>Dokumen Coretax Diproses
                                        </h6>
                                        <small class="text-muted">
                                            <i class="ti ti-clock me-1"></i>Update realtime
                                        </small>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="dtable3">
                                            <thead class="table-light">
                                                <tr>
                                                    <th width="5%" class="text-center">
                                                        <i class="ti ti-hash text-muted"></i>
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-file-text text-primary me-1"></i>No. Registrasi
                                                    </th>
                                                    <th width="15%">
                                                        <i class="ti ti-building text-warning me-1"></i>Nama Entitas
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-map text-info me-1"></i>Provinsi
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-map-pin text-cyan me-1"></i>Kabupaten
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-calendar text-success me-1"></i>Tgl Permohonan
                                                    </th>
                                                    <th width="8%">
                                                        <i class="ti ti-receipt-tax text-purple me-1"></i>NITKU
                                                    </th>
                                                    <th width="12%">
                                                        <i class="ti ti-user text-orange me-1"></i>Nama PIC
                                                    </th>
                                                    <th width="8%">
                                                        <i class="ti ti-id text-indigo me-1"></i>NIK PIC
                                                    </th>
                                                    <th width="7%">
                                                        <i class="ti ti-flag text-teal me-1"></i>Level
                                                    </th>
                                                    <th width="10%" class="text-center">
                                                        <i class="ti ti-settings text-muted"></i>Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($coretaxPro) > 0)
                                                    @foreach ($coretaxPro as $row)
                                                        <tr>
                                                            <td class="text-center">
                                                                <span class="badge bg-light text-dark">{{ $loop->iteration }}</span>
                                                            </td>
                                                @if ($row->satpen)
                                                    <td><a class="text-decoration-none"
                                                            href="{{ route('a.rekapsatpen.detail', $row->satpen->id_satpen) }}"
                                                            class="text-decoration-underline">
                                                            {{ $row->satpen->no_registrasi }}
                                                        </a></td>
                                                    <td>{{ $row->satpen->nm_satpen }}</td>
                                                    <td>{{ $row->satpen->provinsi->nm_prov }}</td>
                                                    <td>{{ $row->satpen->kabupaten->nama_kab }}</td>
                                                @elseif ($row->cabang)
                                                    <td></td>
                                                    <td><a class="text-decoration-none"
                                                            href="{{ route('a.cabang.detail', $row->id_pc) }}"
                                                            class="text-decoration-underline">
                                                            {{ $row->cabang->nama_pc }}
                                                        </a></td>
                                                    <td>{{ $row->cabang->prov->nm_prov }}</td>
                                                    <td>{{ $row->cabang->profile->kabupaten }}</td>
                                                @elseif ($row->wilayah)
                                                    <td></td>
                                                    <td><a class="text-decoration-none"
                                                            href="{{ route('a.wilayah.detail', $row->id_pw) }}"
                                                            class="text-decoration-underline">
                                                            Wilayah {{ $row->wilayah->nm_prov }}
                                                        </a></td>
                                                    <td>{{ $row->wilayah->nm_prov }}</td>
                                                    <td>{{ $row->wilayah->profile->kabupaten }}</td>
                                                @endif
                                                <td>{{ Date::tglReverseDash($row->tgl_submit) }}</td>
                                                <td>{{ $row->nitku }}</td>
                                                <td>{{ $row->nama_pic }}</td>
                                                <td>{{ $row->nik_pic }}</td>
                                                <td>
                                                    @if ($row->satpen)
                                                        <span class="badge bg-info rounded-3 fw-semibold">SATPEN</span>
                                                    @elseif ($row->cabang)
                                                        <span class="badge bg-info rounded-3 fw-semibold">CABANG</span>
                                                    @elseif ($row->wilayah)
                                                        <span class="badge bg-info rounded-3 fw-semibold">WILAYAH</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-info me-1 my-sm-1"
                                                        data-bs-toggle="modal" data-bs-target="#modalDetailBackdrop"
                                                        data-bs="{{ $row->id }}"><i class="ti ti-eye"></i></button>
                                                    @if (!in_array(auth()->user()->role, ['admin wilayah', 'admin cabang']))
                                                        <button class="btn btn-sm btn-success me-1 my-sm-1"
                                                            data-bs-toggle="modal" data-bs-target="#modalAppear"
                                                            data-bs="{{ $row->id }}">
                                                            <i class="ti ti-checks"></i>
                                                        </button>
                                                        <button class="btn btn-sm btn-danger me-1 my-sm-1"
                                                            data-bs-toggle="modal" data-bs-target="#modalTolak"
                                                            data-bs="{{ $row->id }}">
                                                            <i class="ti ti-x"></i>
                                                        </button>
                                                    @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="11" class="text-center py-5">
                                                            <div class="d-flex flex-column align-items-center">
                                                                <i class="ti ti-settings fs-1 text-muted mb-3"></i>
                                                                <h6 class="text-muted mb-1">Tidak Ada Data Proses</h6>
                                                                <small class="text-muted">Belum ada dokumen yang sedang diproses</small>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Proses -->
                        <!-- Satpen Tab -->
                        <div class="tab-pane fade" id="satpen" role="tabpanel" aria-labelledby="satpen-tab">
                            <div class="alert alert-success d-flex align-items-center mb-3" role="alert">
                                <i class="ti ti-school me-2"></i>
                                <div>
                                    <strong>Sukses:</strong> Data Coretax pada tab ini telah disetujui untuk Satuan Pendidikan.
                                    Dokumen siap digunakan dan telah final approve.
                                </div>
                            </div>
                            <div class="card border-0">
                                <div class="card-header bg-light">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0">
                                            <i class="ti ti-school me-2"></i>Final Approve Coretax Satpen
                                        </h6>
                                        <small class="text-muted">
                                            <i class="ti ti-clock me-1"></i>Update realtime
                                        </small>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="dtable4">
                                            <thead class="table-light">
                                                <tr>
                                                    <th width="5%" class="text-center">
                                                        <i class="ti ti-hash text-muted"></i>
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-file-text text-primary me-1"></i>No. Registrasi
                                                    </th>
                                                    <th width="15%">
                                                        <i class="ti ti-school text-warning me-1"></i>Nama Satpen
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-map text-info me-1"></i>Provinsi
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-map-pin text-cyan me-1"></i>Kabupaten
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-calendar text-success me-1"></i>Tgl Pengajuan
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-calendar-time text-danger me-1"></i>Tgl Expired
                                                    </th>
                                                    <th width="8%">
                                                        <i class="ti ti-receipt-tax text-purple me-1"></i>NITKU
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-user text-orange me-1"></i>Nama PIC
                                                    </th>
                                                    <th width="8%">
                                                        <i class="ti ti-id text-indigo me-1"></i>NIK PIC
                                                    </th>
                                                    <th width="9%" class="text-center">
                                                        <i class="ti ti-settings text-muted"></i>Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($coretaxSatpen) > 0)
                                                    @foreach ($coretaxSatpen as $row)
                                                        <tr>
                                                            <td class="text-center">
                                                                <span class="badge bg-light text-dark">{{ $loop->iteration }}</span>
                                                            </td>
                                                <td><a class="text-decoration-none"
                                                        href="{{ route('a.rekapsatpen.detail', $row->satpen->id_satpen) }}"
                                                        class="text-decoration-underline">
                                                        {{ $row->satpen->no_registrasi }}
                                                    </a></td>
                                                <td>{{ $row->satpen->nm_satpen }}</td>
                                                <td>{{ $row->satpen->provinsi->nm_prov }}</td>
                                                <td>{{ $row->satpen->kabupaten->nama_kab }}</td>
                                                <td>{{ Date::tglReverseDash($row->tgl_submit) }}</td>
                                                <td>{{ Date::tglReverseDash($row->tgl_expiry) }}</td>
                                                <td>{{ $row->nitku }}</td>
                                                <td>{{ $row->nama_pic }}</td>
                                                <td>{{ $row->nik_pic }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-info me-1 my-sm-1"
                                                        data-bs-toggle="modal" data-bs-target="#modalDetailBackdrop"
                                                        data-bs="{{ $row->id }}"><i class="ti ti-eye"></i></button>
                                                    @if (in_array(auth()->user()->role, ['super admin']))
                                                        <form action="{{ route('a.coretax.destroy', $row->id) }}"
                                                            method="post" class="deleteBtn">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger me-1">
                                                                <i class="ti ti-trash"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="11" class="text-center py-5">
                                                            <div class="d-flex flex-column align-items-center">
                                                                <i class="ti ti-school fs-1 text-muted mb-3"></i>
                                                                <h6 class="text-muted mb-1">Tidak Ada Data Satpen</h6>
                                                                <small class="text-muted">Belum ada data Coretax yang disetujui untuk Satpen</small>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Satpen -->

                        <!-- Cabang Tab -->
                        <div class="tab-pane fade" id="cabang" role="tabpanel" aria-labelledby="cabang-tab">
                            <div class="alert alert-success d-flex align-items-center mb-3" role="alert">
                                <i class="ti ti-building me-2"></i>
                                <div>
                                    <strong>Sukses:</strong> Data Coretax pada tab ini telah disetujui untuk tingkat Cabang.
                                    Dokumen siap digunakan dan telah final approve.
                                </div>
                            </div>
                            <div class="card border-0">
                                <div class="card-header bg-light">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0">
                                            <i class="ti ti-building me-2"></i>Final Approve Coretax Cabang
                                        </h6>
                                        <small class="text-muted">
                                            <i class="ti ti-clock me-1"></i>Update realtime
                                        </small>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="dtable5">
                                            <thead class="table-light">
                                                <tr>
                                                    <th width="5%" class="text-center">
                                                        <i class="ti ti-hash text-muted"></i>
                                                    </th>
                                                    <th width="18%">
                                                        <i class="ti ti-building text-warning me-1"></i>Nama Cabang
                                                    </th>
                                                    <th width="12%">
                                                        <i class="ti ti-map text-info me-1"></i>Provinsi
                                                    </th>
                                                    <th width="12%">
                                                        <i class="ti ti-map-pin text-cyan me-1"></i>Kabupaten
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-calendar text-success me-1"></i>Tgl Pengajuan
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-calendar-time text-danger me-1"></i>Tgl Expired
                                                    </th>
                                                    <th width="8%">
                                                        <i class="ti ti-receipt-tax text-purple me-1"></i>NITKU
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-user text-orange me-1"></i>Nama PIC
                                                    </th>
                                                    <th width="8%">
                                                        <i class="ti ti-id text-indigo me-1"></i>NIK PIC
                                                    </th>
                                                    <th width="7%" class="text-center">
                                                        <i class="ti ti-settings text-muted"></i>Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($coretaxCab ?? []) > 0)
                                                    @foreach ($coretaxCab as $row)
                                                        <tr>
                                                            <td class="text-center">
                                                                <span class="badge bg-light text-dark">{{ $loop->iteration }}</span>
                                                            </td>
                                                <td><a class="text-decoration-none"
                                                        href="{{ route('a.cabang.detail', $row->id_pc) }}"
                                                        class="text-decoration-underline">
                                                        {{ $row->cabang->nama_pc }}
                                                    </a></td>
                                                <td>{{ $row->cabang->prov->nm_prov }}</td>
                                                <td>{{ $row->cabang->profile->kabupaten }}</td>
                                                <td>{{ Date::tglReverseDash($row->tgl_submit) }}</td>
                                                <td>{{ Date::tglReverseDash($row->tgl_expiry) }}</td>
                                                <td>{{ $row->nitku }}</td>
                                                <td>{{ $row->nama_pic }}</td>
                                                <td>{{ $row->nik_pic }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-info me-1 my-sm-1"
                                                        data-bs-toggle="modal" data-bs-target="#modalDetailBackdrop"
                                                        data-bs="{{ $row->id }}"><i class="ti ti-eye"></i></button>
                                                    @if (in_array(auth()->user()->role, ['super admin']))
                                                        <form action="{{ route('a.coretax.destroy', $row->id) }}"
                                                            method="post" class="deleteBtn">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger me-1">
                                                                <i class="ti ti-trash"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="10" class="text-center py-5">
                                                            <div class="d-flex flex-column align-items-center">
                                                                <i class="ti ti-building fs-1 text-muted mb-3"></i>
                                                                <h6 class="text-muted mb-1">Tidak Ada Data Cabang</h6>
                                                                <small class="text-muted">Belum ada data Coretax yang disetujui untuk Cabang</small>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Cabang -->

                        <!-- Wilayah Tab -->
                                <div class="tab-pane fade" id="wilayah" role="tabpanel" aria-labelledby="wilayah-tab">
                            <div class="alert alert-success d-flex align-items-center mb-3" role="alert">
                                <i class="ti ti-map me-2"></i>
                                <div>
                                    <strong>Sukses:</strong> Data Coretax pada tab ini telah disetujui untuk tingkat Wilayah.
                                    Dokumen siap digunakan dan telah final approve.
                                </div>
                            </div>
                            <div class="card border-0">
                                <div class="card-header bg-light">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0">
                                            <i class="ti ti-map me-2"></i>Final Approve Coretax Wilayah
                                        </h6>
                                        <small class="text-muted">
                                            <i class="ti ti-clock me-1"></i>Update realtime
                                        </small>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="dtable6">
                                            <thead class="table-light">
                                                <tr>
                                                    <th width="5%" class="text-center">
                                                        <i class="ti ti-hash text-muted"></i>
                                                    </th>
                                                    <th width="18%">
                                                        <i class="ti ti-map text-warning me-1"></i>Nama Wilayah
                                                    </th>
                                                    <th width="12%">
                                                        <i class="ti ti-map text-info me-1"></i>Provinsi
                                                    </th>
                                                    <th width="12%">
                                                        <i class="ti ti-map-pin text-cyan me-1"></i>Kabupaten
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-calendar text-success me-1"></i>Tgl Pengajuan
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-calendar-time text-danger me-1"></i>Tgl Expired
                                                    </th>
                                                    <th width="8%">
                                                        <i class="ti ti-receipt-tax text-purple me-1"></i>NITKU
                                                    </th>
                                                    <th width="10%">
                                                        <i class="ti ti-user text-orange me-1"></i>Nama PIC
                                                    </th>
                                                    <th width="8%">
                                                        <i class="ti ti-id text-indigo me-1"></i>NIK PIC
                                                    </th>
                                                    <th width="7%" class="text-center">
                                                        <i class="ti ti-settings text-muted"></i>Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($coretaxWil ?? []) > 0)
                                                    @foreach ($coretaxWil as $row)
                                                        <tr>
                                                            <td class="text-center">
                                                                <span class="badge bg-light text-dark">{{ $loop->iteration }}</span>
                                                            </td>
                                                <td><a class="text-decoration-none"
                                                        href="{{ route('a.wilayah.detail', $row->id_pw) }}"
                                                        class="text-decoration-underline">
                                                        Wilayah {{ $row->wilayah->nm_prov }}
                                                    </a></td>
                                                <td>{{ $row->wilayah->nm_prov }}</td>
                                                <td>{{ $row->wilayah->profile->kabupaten }}</td>
                                                <td>{{ Date::tglReverseDash($row->tgl_submit) }}</td>
                                                <td>{{ Date::tglReverseDash($row->tgl_expiry) }}</td>
                                                <td>{{ $row->nitku }}</td>
                                                <td>{{ $row->nama_pic }}</td>
                                                <td>{{ $row->nik_pic }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-info me-1 my-sm-1"
                                                        data-bs-toggle="modal" data-bs-target="#modalDetailBackdrop"
                                                        data-bs="{{ $row->id }}"><i class="ti ti-eye"></i></button>
                                                    @if (in_array(auth()->user()->role, ['super admin']))
                                                        <form action="{{ route('a.coretax.destroy', $row->id) }}"
                                                            method="post" class="deleteBtn">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger me-1">
                                                                <i class="ti ti-trash"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="10" class="text-center py-5">
                                                            <div class="d-flex flex-column align-items-center">
                                                                <i class="ti ti-map fs-1 text-muted mb-3"></i>
                                                                <h6 class="text-muted mb-1">Tidak Ada Data Wilayah</h6>
                                                                <small class="text-muted">Belum ada data Coretax yang disetujui untuk Wilayah</small>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Wilayah -->
                    </div>
                    <!-- End Tab Content -->
                </div>
            </div>

        </div>
    </div>
@endsection

@include('admin.coretax.coretax-modal')

@section('scripts')
    <script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap5.min.js') }}"></script>

    <!-- DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

    <!-- JSZip (required for Excel export) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script>
        $(".deleteBtn").on('click', function() {
            if (confirm("benar anda akan menghapus data?")) {
                return true;
            }
            return false;
        });

        $(document).ready(function() {
            $('#dtable').DataTable();
            $('#dtable2').DataTable();
            $('#dtable3').DataTable();
            $('#dtable4').DataTable({
                dom: '<"row mb-3"<"col-md-4"l><"col-md-8 d-flex justify-content-end align-items-center" Bf>>rt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                buttons: [{
                    extend: 'excelHtml5',
                    title: 'Coretax Approved Satpen',
                    text: 'Export ke Excel',
                    className: 'btn btn-success me-2',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                }]
            });
            $('#dtable5').DataTable({
                dom: '<"row mb-3"<"col-md-4"l><"col-md-8 d-flex justify-content-end align-items-center" Bf>>rt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                buttons: [{
                    extend: 'excelHtml5',
                    title: 'Coretax Approved Cabang',
                    text: 'Export ke Excel',
                    className: 'btn btn-success me-2',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                }]
            });
            $('#dtable6').DataTable({
                dom: '<"row mb-3"<"col-md-4"l><"col-md-8 d-flex justify-content-end align-items-center" Bf>>rt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                buttons: [{
                    extend: 'excelHtml5',
                    title: 'Coretax Approved Wilayah',
                    text: 'Export ke Excel',
                    className: 'btn btn-success me-2',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                }]
            });
            $('#dtable7').DataTable();

            // Get the hash value from the URL (e.g., #profile)
            let hash = window.location.hash;
            // If a hash is present and corresponds to a tab, activate that tab
            if (hash) {
                $('.nav-link[data-bs-toggle="pill"][data-bs-target="' + hash + '"]').tab('show');
            }
            // Update the URL hash when a tab is clicked
            $('.nav-link[data-bs-toggle="pill"]').on('shown.bs.tab', function(e) {
                let target = $(e.target).attr('data-bs-target');
                window.location.hash = target;
            });

        });
    </script>
@endsection
