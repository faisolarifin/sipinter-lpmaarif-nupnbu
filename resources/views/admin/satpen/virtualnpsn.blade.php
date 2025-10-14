@extends('template.layout', [
    'title' => 'Sipinter - Tab Permohonan NPSN Virtual'
])

@section('navbar')
    @include('template.navadmin')
@endsection

@section('style')
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
        border-bottom: 1px solid rgba(0, 0, 0, 0.06);
    }

    .modern-card-header h5 {
        color: #1e293b;
        font-weight: 700;
        font-size: 1.25rem;
        margin: 0 0 6px 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .modern-card-header small {
        color: #64748b;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .card-icon {
        width: 32px;
        height: 32px;
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        color: white;
    }

    /* Modern Tabs */
    .modern-tabs {
        background: #ffffff;
        border-radius: 16px 16px 0 0;
        padding: 0 24px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        border-bottom: 2px solid #e5e7eb;
        margin-bottom: 0;
    }

    .modern-tabs .nav-link {
        color: #64748b;
        font-weight: 600;
        padding: 18px 28px;
        border: none;
        border-bottom: 3px solid transparent;
        transition: all 0.3s ease;
        position: relative;
    }

    .modern-tabs .nav-link:hover {
        color: #3b82f6;
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
        border-radius: 12px 12px 0 0;
    }

    .modern-tabs .nav-link.active {
        color: #3b82f6;
        border-bottom-color: #3b82f6;
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
        border-radius: 12px 12px 0 0;
    }

    .modern-tabs .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #3b82f6 0%, #2563eb 100%);
    }

    /* Modern Tab Content */
    .modern-tab-content {
        background: #ffffff;
        border-radius: 0 0 16px 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(0, 0, 0, 0.05);
        border-top: none;
        padding: 32px;
    }

    /* Modern Table */
    .modern-table {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    .modern-table thead {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    }

    .modern-table thead th {
        color: #1e293b;
        font-weight: 700;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 16px 20px;
        border: none;
        border-bottom: 2px solid #e5e7eb;
    }

    .modern-table tbody tr {
        transition: all 0.2s ease;
        border-bottom: 1px solid rgba(0, 0, 0, 0.04);
    }

    .modern-table tbody tr:hover {
        background: linear-gradient(135deg, #f8fafc 0%, #f9fafb 100%);
        transform: scale(1.01);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    .modern-table tbody td {
        padding: 16px 20px;
        color: #374151;
        font-weight: 500;
        vertical-align: middle;
        border: none;
    }

    /* Modern Badges */
    .badge-modern {
        padding: 6px 14px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .badge-jenjang-ra {
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        color: #dc2626;
    }

    .badge-jenjang-mi {
        background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        color: #2563eb;
    }

    .badge-jenjang-mts {
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        color: #d97706;
    }

    .badge-jenjang-ma {
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
        color: #059669;
    }

    /* Modern Buttons */
    .btn-modern {
        border-radius: 10px;
        padding: 10px 20px;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
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

    .btn-action {
        padding: 8px 14px;
        font-size: 0.875rem;
    }

    /* Info Box */
    .info-box {
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
        border-left: 4px solid #3b82f6;
        border-radius: 12px;
        padding: 16px 20px;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .info-box i {
        color: #3b82f6;
        font-size: 1.5rem;
    }

    .info-box-content {
        flex: 1;
    }

    .info-box-content strong {
        color: #1e40af;
        font-weight: 700;
    }

    .info-box-content p {
        margin: 0;
        color: #1e40af;
        font-size: 0.875rem;
    }

    /* Statistics Cards */
    .stats-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        border-radius: 12px;
        padding: 20px;
        border: 1px solid rgba(0, 0, 0, 0.05);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        transition: all 0.3s ease;
    }

    .stats-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .stats-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: white;
        margin-bottom: 12px;
    }

    .stats-icon-primary {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    }

    .stats-icon-success {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }

    .stats-label {
        color: #64748b;
        font-size: 0.875rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
    }

    .stats-value {
        color: #1e293b;
        font-size: 2rem;
        font-weight: 700;
        line-height: 1;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .modern-card-header {
            padding: 20px;
        }

        .modern-tab-content {
            padding: 20px;
        }

        .modern-table thead th,
        .modern-table tbody td {
            padding: 12px 16px;
            font-size: 0.813rem;
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
                <li><a href="#"><span class="fa fa-info-circle"></span> Virtual NPSN</a></li>
            </ul>
        </nav>

        @include('template.alert')

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="stats-card">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon stats-icon-primary">
                            <i class="ti ti-inbox"></i>
                        </div>
                        <div class="ms-auto text-end">
                            <div class="stats-label">Permohonan Baru</div>
                            <div class="stats-value">{{ count($VNpsnReqs) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="stats-card">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon stats-icon-success">
                            <i class="ti ti-check-circle"></i>
                        </div>
                        <div class="ms-auto text-end">
                            <div class="stats-label">VNPSN Aktif</div>
                            <div class="stats-value">{{ count($VNpsnAccepts) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <ul class="nav modern-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#permohonan" type="button" role="tab" aria-controls="permohonan" aria-selected="true">
                    <i class="ti ti-inbox me-2"></i>PERMOHONAN BARU
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#sedangaktif" type="button" role="tab" aria-controls="sedangaktif" aria-selected="false">
                    <i class="ti ti-check-circle me-2"></i>VNPSN AKTIF
                </button>
            </li>
        </ul>

        <div class="tab-content modern-tab-content" id="myTabContent">
            <!-- Permohonan -->
            <div class="tab-pane fade show active" id="permohonan" role="tabpanel" aria-labelledby="home-tab">
                <div class="modern-card">
                    <div class="modern-card-header">
                        <h5>
                            <span class="card-icon">
                                <i class="ti ti-inbox"></i>
                            </span>
                            Permintaan VNPSN
                        </h5>
                        <small>Data permintaan pembuatan NPSN virtual baru yang menunggu persetujuan</small>
                    </div>

                    <div class="p-4">
                        <div class="info-box">
                            <i class="ti ti-info-circle"></i>
                            <div class="info-box-content">
                                <strong>Informasi</strong>
                                <p>Tabel di bawah ini menampilkan daftar permintaan NPSN Virtual dari sekolah yang belum memiliki NPSN. Silakan review dan setujui permohonan yang memenuhi syarat.</p>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table modern-table" id="dtable">
                                <thead>
                                <tr>
                                    <th width="5%" class="text-center">#</th>
                                    <th width="20%">Nama Sekolah</th>
                                    <th width="8%">Jenjang</th>
                                    <th width="12%">NIK Kepala Sekolah</th>
                                    <th width="15%">Email</th>
                                    <th width="12%">Provinsi</th>
                                    <th width="12%">Kabupaten</th>
                                    <th width="10%" class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no=0)
                                @foreach($VNpsnReqs as $row)
                                <tr>
                                    <td class="text-center">
                                        <span class="badge bg-light text-dark">{{ ++$no }}</span>
                                    </td>
                                    <td>
                                        <strong>{{ $row->nama_sekolah }}</strong>
                                        <br>
                                        <small class="text-muted">{{ $row->alamat }}</small>
                                    </td>
                                    <td>
                                            @php($jenjang = $row->jenjang->nm_jenjang)
                                            @php($badgeClass = 'badge-jenjang-ra')
                                            @if (in_array($jenjang, ['MI', 'SD']))
                                                @php($badgeClass = 'badge-jenjang-mi')
                                            @elseif (in_array($jenjang, ['MTs', 'SMP']))
                                                @php($badgeClass = 'badge-jenjang-mts')
                                            @elseif (in_array($jenjang, ['MA', 'SMA', 'SMK']))
                                                @php($badgeClass = 'badge-jenjang-ma')
                                            @endif
                                        <span class="badge-modern {{ $badgeClass }}">{{ $jenjang }}</span>
                                    </td>
                                    <td>
                                        <small class="fw-bold">{{ $row->nik_kepsek }}</small>
                                    </td>
                                    <td>
                                        <small>{{ $row->email }}</small>
                                    </td>
                                    <td>
                                        <small>{{ $row->provinsi->nm_prov }}</small>
                                    </td>
                                    <td>
                                        <small>{{ $row->kabupaten->nama_kab }}</small>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-1">
                                            <form action="{{ route('a.vnpsn.accept', $row->id_npsn) }}" method="post" class="d-inline acceptBtn">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-modern-success btn-action" type="submit" title="Setujui Permohonan">
                                                    <i class="ti ti-check"></i>
                                                </button>
                                            </form>
                                            <button class="btn btn-modern-danger btn-action" data-bs-toggle="modal" data-bs-target="#modalVNPSN" data-bs="{{ $row->id_npsn }}" title="Tolak Permohonan">
                                                <i class="ti ti-x"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Permohonan -->

            <!-- VNPSN Aktif -->
            <div class="tab-pane fade" id="sedangaktif" role="tabpanel" aria-labelledby="profile-tab">
                <div class="modern-card">
                    <div class="modern-card-header">
                        <h5>
                            <span class="card-icon">
                                <i class="ti ti-check-circle"></i>
                            </span>
                            VNPSN Aktif
                        </h5>
                        <small>Data NPSN virtual yang telah disetujui dan masih aktif</small>
                    </div>

                    <div class="p-4">
                        <div class="info-box" style="background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%); border-left-color: #10b981;">
                            <i class="ti ti-info-circle" style="color: #059669;"></i>
                            <div class="info-box-content">
                                <strong style="color: #047857;">Informasi</strong>
                                <p style="color: #047857;">Tabel di bawah ini menampilkan daftar NPSN Virtual yang sudah disetujui dan masih aktif. Data ini dapat digunakan sebagai referensi NPSN sementara.</p>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table modern-table" id="dtable2">
                                <thead>
                                <tr>
                                    <th width="5%" class="text-center">#</th>
                                    <th width="15%">VNPSN</th>
                                    <th width="22%">Nama Sekolah</th>
                                    <th width="10%">Jenjang</th>
                                    <th width="15%">Provinsi</th>
                                    <th width="15%">Kabupaten</th>
                                    <th width="13%">Alamat</th>
                                    @if(in_array(auth()->user()->role, ["super admin"]))
                                    <th width="5%" class="text-center">Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @php($no=0)
                                @foreach($VNpsnAccepts as $row)
                                    <tr>
                                        <td class="text-center">
                                            <span class="badge bg-light text-dark">{{ ++$no }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="me-2" style="width: 6px; height: 40px; background: linear-gradient(180deg, #10b981 0%, #059669 100%); border-radius: 3px;"></div>
                                                <strong class="text-success">{{ $row->nomor_virtual }}</strong>
                                            </div>
                                        </td>
                                        <td>
                                            <strong>{{ $row->nama_sekolah }}</strong>
                                        </td>
                                        <td>
                                            @php($jenjang = $row->jenjang->nm_jenjang)
                                            @php($badgeClass = 'badge-jenjang-ra')
                                            @if (in_array($jenjang, ['MI', 'SD']))
                                                @php($badgeClass = 'badge-jenjang-mi')
                                            @elseif (in_array($jenjang, ['MTs', 'SMP']))
                                                @php($badgeClass = 'badge-jenjang-mts')
                                            @elseif (in_array($jenjang, ['MA', 'SMA', 'SMK']))
                                                @php($badgeClass = 'badge-jenjang-ma')
                                            @endif
                                            <span class="badge-modern {{ $badgeClass }}">{{ $jenjang }}</span>
                                        </td>
                                        <td>
                                            <small>{{ $row->provinsi->nm_prov }}</small>
                                        </td>
                                        <td>
                                            <small>{{ $row->kabupaten->nama_kab }}</small>
                                        </td>
                                        <td>
                                            <small class="text-muted">{{ $row->alamat }}</small>
                                        </td>
                                        @if(in_array(auth()->user()->role, ["super admin"]))
                                        <td class="text-center">
                                            <form action="{{ route('a.vnpsn.destroy', $row->id_npsn ) }}" method="post" class="d-inline deleteBtn">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-modern-danger btn-action" title="Hapus VNPSN">
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
            <!-- End VNPSN Aktif -->
        </div>
    </div>
</div>

@include('admin.satpen.vnpsnModal')

@endsection

@section('scripts')
<script src="{{asset('assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/dataTables.bootstrap5.min.js')}}"></script>
<script>

    $(".deleteBtn").on('click', function () {
        if (confirm("Apakah Anda yakin akan menghapus VNPSN ini? Data yang dihapus tidak dapat dikembalikan.")) {
            return true;
        }
        return false;
    });

    $(".acceptBtn").on('click', function () {
        if (confirm("Setujui permintaan dan generate NPSN virtual untuk sekolah ini?")) {
            return true;
        }
        return false;
    });

    $(document).ready(function () {
        $('#dtable').DataTable({
            language: {
                processing: "Memuat data...",
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                infoEmpty: "Tidak ada data",
                infoFiltered: "(difilter dari _MAX_ total data)",
                zeroRecords: "Tidak ada data yang ditemukan",
                emptyTable: "Tidak ada data di tabel",
                paginate: {
                    first: "Pertama",
                    previous: "Sebelumnya",
                    next: "Selanjutnya",
                    last: "Terakhir"
                }
            },
            pageLength: 10,
            order: [[0, 'asc']]
        });

        $('#dtable2').DataTable({
            language: {
                processing: "Memuat data...",
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                infoEmpty: "Tidak ada data",
                infoFiltered: "(difilter dari _MAX_ total data)",
                zeroRecords: "Tidak ada data yang ditemukan",
                emptyTable: "Tidak ada data di tabel",
                paginate: {
                    first: "Pertama",
                    previous: "Sebelumnya",
                    next: "Selanjutnya",
                    last: "Terakhir"
                }
            },
            pageLength: 10,
            order: [[1, 'asc']]
        });

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
