@extends('template.layout', [
    'title' => 'Sipinter - Permohonan BHPNU'
])

@section('navbar')
    @include('template.navadmin')
@endsection

@section('style')
<style>
    /* Hero Banner Section - Simplified */
    .hero-banner {
        background: #fff;
        border-radius: 10px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        border: 1px solid #e5e7eb;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    .hero-content {
        color: #374151;
    }

    .hero-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: #16a34a;
    }

    .hero-subtitle {
        font-size: 0.875rem;
        color: #6b7280;
        line-height: 1.5;
    }

    .hero-badge {
        display: inline-block;
        background: #f3f4f6;
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 600;
        margin-top: 0.75rem;
        color: #374151;
        border: 1px solid #e5e7eb;
    }

    /* Stats Cards - Simplified */
    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .stat-card {
        background: white;
        border-radius: 8px;
        padding: 1rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        transition: all 0.2s ease;
        border: 1px solid #e5e7eb;
    }

    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.08);
    }

    .stat-icon {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        margin-bottom: 0.75rem;
        background: #f3f4f6;
        color: #374151;
    }

    .stat-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: #111827;
        line-height: 1;
    }

    .stat-label {
        font-size: 0.75rem;
        color: #6b7280;
        margin-top: 0.25rem;
        font-weight: 500;
    }

    /* Simplified Tab Styling */
    .nav-tabs-modern {
        border-bottom: 2px solid #e5e7eb;
        gap: 0.5rem;
        display: flex;
        background: #fff;
        padding: 0.5rem 1rem 0;
    }

    .nav-tabs-modern .nav-item {
        flex: 0 0 auto;
    }

    .nav-tabs-modern .nav-link {
        border: none;
        background: transparent;
        color: #6b7280;
        border-radius: 6px 6px 0 0;
        padding: 0.625rem 1rem;
        font-weight: 600;
        font-size: 0.875rem;
        transition: all 0.2s ease;
        text-align: center;
        border-bottom: 2px solid transparent;
        margin-bottom: -2px;
    }

    .nav-tabs-modern .nav-link i {
        font-size: 1rem;
        margin-right: 0.375rem;
    }

    .nav-tabs-modern .nav-link:hover {
        background: #f9fafb;
        color: #111827;
    }

    .nav-tabs-modern .nav-link.active {
        background: #f9fafb;
        color: #111827;
        border-bottom-color: #111827;
    }

    .tab-text {
        display: inline;
    }

    /* Simplified Card */
    .card-modern {
        border: 1px solid #e5e7eb;
        border-radius: 0 0 8px 8px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        background: #fff;
        overflow: hidden;
    }

    .card-modern .card-body {
        padding: 1.5rem;
    }

    /* Simplified Table Header */
    .table-header-modern {
        background: #f9fafb;
        padding: 1rem;
        border-radius: 6px;
        margin-bottom: 1rem;
        border-left: 3px solid #111827;
    }

    .table-header-modern h5 {
        color: #16a34a;
        font-weight: 700;
        margin-bottom: 0.25rem;
        font-size: 1rem;
    }

    .table-header-modern small {
        color: #6b7280;
        font-size: 0.75rem;
    }

    /* Simplified Table */
    .table-modern {
        border-collapse: collapse;
    }

    .table-modern thead th {
        background: transparent;
        color: #6b7280;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
        padding: 0.75rem;
        border-top: 1px solid #e5e7eb;
        border-bottom: 1px solid #e5e7eb;
        border-left: none;
        border-right: none;
        white-space: nowrap;
    }

    .table-modern tbody tr {
        transition: all 0.2s ease;
        background: #fff;
    }

    .table-modern tbody tr:hover {
        background: #f9fafb;
    }

    .table-modern tbody td {
        padding: 0.75rem;
        vertical-align: middle;
        border-top: 1px solid #e5e7eb;
        border-bottom: 1px solid #e5e7eb;
        border-left: none;
        border-right: none;
        color: #374151;
        font-size: 0.875rem;
    }

    /* Simplified Button */
    .btn-modern {
        border-radius: 6px;
        padding: 0.375rem 0.75rem;
        font-weight: 500;
        transition: all 0.2s ease;
        font-size: 0.875rem;
    }

    .btn-modern:hover {
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .btn-modern.btn-sm {
        padding: 0.25rem 0.625rem;
        font-size: 0.8125rem;
    }

    /* DataTables Styling */
    .dataTables_wrapper .dataTables_length select,
    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        padding: 0.375rem 0.625rem;
        font-size: 0.875rem;
    }

    .dataTables_wrapper .dataTables_filter input:focus {
        border-color: #9ca3af;
        outline: none;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        border-radius: 6px;
        margin: 0 2px;
        padding: 0.375rem 0.625rem;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #111827 !important;
        border-color: #111827 !important;
        color: #fff !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: #374151 !important;
        border-color: #374151 !important;
        color: #fff !important;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 1.25rem;
        }

        .hero-subtitle {
            font-size: 0.8125rem;
        }

        .nav-tabs-modern .nav-link {
            padding: 0.5rem 0.75rem;
            font-size: 0.8125rem;
        }

        .stat-card {
            padding: 0.875rem;
        }
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
                <li><a href="#"><span class=" fa fa-info-circle"> </span> BHPNU</a></li>
            </ul>
        </nav>

        @include('template.alert')

        <!-- Hero Banner Section -->
        <div class="hero-banner">
            <div class="hero-content">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h1 class="hero-title">
                            <i class="ti ti-shield-check me-2"></i>
                            Manajemen BHPNU
                        </h1>
                        <p class="hero-subtitle">
                            Kelola seluruh permohonan Badan Hukum Penyelenggara NU dengan mudah dan efisien.
                            Pantau status verifikasi, proses dokumen, hingga pengiriman dalam satu dashboard terintegrasi.
                        </p>
                        <div class="hero-badge">
                            <i class="ti ti-clock-hour-4 me-2"></i>
                            Pemrosesan Real-time
                        </div>
                    </div>
                    <div class="col-lg-4 text-end d-none d-lg-block">
                        <i class="ti ti-certificate" style="font-size: 8rem; opacity: 0.2;"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Container -->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-icon purple">
                    <i class="ti ti-file-check"></i>
                </div>
                <div class="stat-value">{{ count($bhpnuVerifikasi) }}</div>
                <div class="stat-label">Menunggu Verifikasi</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon orange">
                    <i class="ti ti-clock"></i>
                </div>
                <div class="stat-value">{{ count($bhpnuProses) }}</div>
                <div class="stat-label">Sedang Diproses</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green">
                    <i class="ti ti-send"></i>
                </div>
                <div class="stat-value">{{ count($bhpnuDikirim) }}</div>
                <div class="stat-label">Dokumen Dikirim</div>
            </div>
        </div>

        <ul class="nav nav-tabs nav-tabs-modern" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#verifikasi" type="button" role="tab" aria-controls="verifikasi" aria-selected="true">
                    <i class="ti ti-file-check"></i><span class="tab-text">Verifikasi</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#proses" type="button" role="tab" aria-controls="proses" aria-selected="false">
                    <i class="ti ti-clock"></i><span class="tab-text">Sedang Diproses</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#terbit" type="button" role="tab" aria-controls="terbit" aria-selected="false">
                    <i class="ti ti-send"></i><span class="tab-text">Dokumen Dikirim</span>
                </button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <!-- Verifikasi -->
            <div class="tab-pane fade show active" id="verifikasi" role="tabpanel" aria-labelledby="home-tab">
                <div class="card w-100 card-modern">
                    <div class="card-body pt-3">
                        <div class="table-header-modern">
                            <h5 class="mb-0"><i class="ti ti-clipboard-check me-2"></i>Permohonan BHPNU</h5>
                            <small>Data permohonan BHPNU baru yang menunggu verifikasi</small>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-modern table-hover" id="dtable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nomor Registrasi</th>
                                    <th>Nama Satpen</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Tanggal</th>
                                    @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @php($no=0)
                                @foreach($bhpnuVerifikasi as $row)
                                    <tr>
                                        <td><strong>{{ ++$no }}</strong></td>
                                        <td>
                                            <a href="{{ route('a.rekapsatpen.detail', $row->satpen->id_satpen) }}" class="text-primary fw-bold text-decoration-none">
                                                <i class="ti ti-link me-1"></i>{{ $row->satpen->no_registrasi }}
                                            </a>
                                        </td>
                                        <td>{{ $row->satpen->nm_satpen }}</td>
                                        <td>
                                            <a href="{{ route('a.bhpnu.file', $row->bukti_bayar) }}" class="btn btn-sm btn-modern btn-secondary">
                                                <i class="ti ti-file-text me-1"></i>Lihat Berkas
                                            </a>
                                        </td>
                                        <td><i class="ti ti-calendar me-1"></i>{{ Date::tglMasehi($row->tanggal) }}</td>
                                        @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('a.bhpnu.acc', $row->id_bhpnu) }}" class="btn btn-sm btn-modern btn-success" title="Setujui">
                                                    <i class="ti ti-checks"></i>
                                                </a>
                                                <button class="btn btn-sm btn-modern btn-danger" data-bs-toggle="modal" data-bs-target="#modalTolak" data-bs="{{ $row->id_bhpnu }}" title="Tolak">
                                                    <i class="ti ti-x"></i>
                                                </button>
                                            </div>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Verifikasi -->
            <!-- Proses -->
            <div class="tab-pane fade" id="proses" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card w-100 card-modern">
                    <div class="card-body pt-3">
                        <div class="table-header-modern">
                            <h5 class="mb-0"><i class="ti ti-hourglass-empty me-2"></i>Dokumen BHPNU Diproses</h5>
                            <small>Data permohonan BHPNU dalam proses pembuatan dokumen</small>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-modern table-hover" id="dtable2">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nomor Registrasi</th>
                                    <th>Nama Satpen</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Tanggal</th>
                                    @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @php($no=0)
                                @foreach($bhpnuProses as $row)
                                    <tr>
                                        <td><strong>{{ ++$no }}</strong></td>
                                        <td>
                                            <a href="{{ route('a.rekapsatpen.detail', $row->satpen->id_satpen) }}" class="text-primary fw-bold text-decoration-none">
                                                <i class="ti ti-link me-1"></i>{{ $row->satpen->no_registrasi }}
                                            </a>
                                        </td>
                                        <td>{{ $row->satpen->nm_satpen }}</td>
                                        <td>
                                            <a href="{{ route('a.bhpnu.file', $row->bukti_bayar) }}" class="btn btn-sm btn-modern btn-secondary">
                                                <i class="ti ti-file-text me-1"></i>Lihat Berkas
                                            </a>
                                        </td>
                                        <td><i class="ti ti-calendar me-1"></i>{{ Date::tglMasehi($row->tanggal) }}</td>
                                        @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                        <td>
                                            <button class="btn btn-sm btn-modern btn-success" data-bs-toggle="modal" data-bs-target="#modalDikirim" data-bs="{{ $row->id_bhpnu }}" title="Kirim Dokumen">
                                                <i class="ti ti-checks me-1"></i>Kirim
                                            </button>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Proses -->
            <!-- Terbit -->
            <div class="tab-pane fade" id="terbit" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card w-100 card-modern">
                    <div class="card-body pt-3">
                        <div class="table-header-modern">
                            <h5 class="mb-0"><i class="ti ti-circle-check me-2"></i>Dokumen Telah Dikirim</h5>
                            <small>Data permohonan BHPNU dengan dokumen telah dikirim ke satpen</small>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-modern table-hover" id="dtable3">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nomor Registrasi</th>
                                    <th>Nama Satpen</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Nomor Resi</th>
                                    <th>Permohonan</th>
                                    <th>Dikirim</th>
                                    <th>Expired Dokumen</th>
                                    @if(in_array(auth()->user()->role, ["super admin"]))
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @php($no=0)
                                @foreach($bhpnuDikirim as $row)
                                    <tr>
                                        <td><strong>{{ ++$no }}</strong></td>
                                        <td>
                                            <a href="{{ route('a.rekapsatpen.detail', $row->satpen->id_satpen) }}" class="text-primary fw-bold text-decoration-none">
                                                <i class="ti ti-link me-1"></i>{{ $row->satpen->no_registrasi }}
                                            </a>
                                        </td>
                                        <td>{{ $row->satpen->nm_satpen }}</td>
                                        <td>
                                            <a href="{{ route('a.bhpnu.file', $row->bukti_bayar) }}" class="btn btn-sm btn-modern btn-secondary">
                                                <i class="ti ti-file-text me-1"></i>Lihat Berkas
                                            </a>
                                        </td>
                                        <td><span class="badge bg-info">{{ $row->no_resi }}</span></td>
                                        <td><i class="ti ti-calendar me-1"></i>{{ Date::tglMasehi($row->tanggal) }}</td>
                                        <td><i class="ti ti-truck me-1"></i>{{ Date::tglMasehi($row->tgl_dikirim) }}</td>
                                        <td><i class="ti ti-clock-exclamation me-1"></i>{{ Date::tglMasehi($row->tgl_expired) }}</td>
                                        @if(in_array(auth()->user()->role, ["super admin"]))
                                        <td>
                                            <form action="{{ route('a.bhpnu.destroy', $row->id_bhpnu) }}" method="post" class="deleteBtn">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-modern btn-danger" title="Hapus">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Terbit -->
        </div>
    </div>
</div>
@endsection

@include('admin.bhpnu.bhpnuModal')

@section('scripts')
<script src="{{asset('assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/dataTables.bootstrap5.min.js')}}"></script>
<script>

    $(".deleteBtn").on('click', function () {
        if (confirm("benar anda akan menghapus data?")) {
            return true;
        }
        return false;
    });

    $(document).ready(function () {
        $('#dtable').DataTable();
        $('#dtable2').DataTable();
        $('#dtable3').DataTable();

        // Get the hash value from the URL (e.g., #profile)
        let hash = window.location.hash;
        // If a hash is present and corresponds to a tab, activate that tab
        if (hash) {
            $('.nav-link[data-bs-toggle="tab"][data-bs-target="' + hash + '"]').tab('show');
        }
        // Update the URL hash when a tab is clicked
        $('.nav-link[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
            let target = $(e.target).attr('data-bs-target');
            window.location.hash = target;
        });
    });

</script>
@endsection

@include('admin.satpen.detailSatpenPermohonan')
