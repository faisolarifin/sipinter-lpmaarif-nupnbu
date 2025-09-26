@extends('template.layout', [
    'title' => 'Sipinter - Tab Permohonan OSS'
])

@section('navbar')
    @include('template.navadmin')
@endsection

@section('style')
<style>
    /* Modern Tab Styling */
    .modern-tabs {
        border: none;
        background: transparent;
        margin-bottom: 0;
        position: relative;
    }

    .modern-tabs::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(135deg, #e3f2fd 0%, #f5f5f5 100%);
        z-index: 1;
    }

    .modern-tabs .nav-item {
        margin-right: 4px;
        margin-bottom: 0;
    }

    .modern-tabs .nav-link {
        border: none;
        border-radius: 12px 12px 0 0;
        background: transparent;
        color: #64748b;
        font-weight: 600;
        font-size: 0.925rem;
        padding: 16px 24px;
        position: relative;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        z-index: 2;
        display: flex;
        align-items: center;
        gap: 8px;
        min-height: 60px;
    }

    .modern-tabs .nav-link:hover {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        color: #475569;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .modern-tabs .nav-link.active {
        background: linear-gradient(135deg, #ffc107 0%, #ffb300 100%);
        color: #212529;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(255, 193, 7, 0.3);
        border: 2px solid rgba(255, 193, 7, 0.2);
    }

    .modern-tabs .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #ffc107 0%, #ffb300 100%);
        border-radius: 2px 2px 0 0;
    }

    .tab-icon {
        font-size: 1.1rem;
        opacity: 0.8;
    }

    .modern-tabs .nav-link.active .tab-icon {
        opacity: 1;
    }

    /* Tab Content Styling */
    .modern-tab-content {
        background: #ffffff;
        border-radius: 0 16px 16px 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        border: 1px solid rgba(0,0,0,0.05);
        overflow: hidden;
    }

    .modern-tab-content .card {
        border: none;
        border-radius: 0;
        box-shadow: none;
        background: transparent;
    }

    .modern-tab-content .card-body {
        padding: 32px;
    }

    /* Modern Card Header */
    .modern-card-header {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-bottom: 1px solid rgba(0,0,0,0.06);
        padding: 24px 32px;
        margin: -32px -32px 32px -32px;
    }

    .modern-card-header h5 {
        color: #1e293b;
        font-weight: 700;
        font-size: 1.25rem;
        margin-bottom: 4px;
    }

    .modern-card-header small {
        color: #64748b;
        font-size: 0.875rem;
        font-weight: 500;
    }

    /* Table Enhancements */
    .modern-table {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(0,0,0,0.04);
        border: 1px solid rgba(0,0,0,0.05);
    }

    .modern-table thead th {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        color: #1e293b;
        font-weight: 600;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 16px 12px;
        border: none;
        border-bottom: 2px solid #e2e8f0;
    }

    .modern-table tbody tr {
        transition: all 0.2s ease;
        border-bottom: 1px solid rgba(0,0,0,0.04);
    }

    .modern-table tbody tr:hover {
        background: linear-gradient(135deg, #f8fafc 0%, #f9fafb 100%);
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    }

    .modern-table tbody td {
        padding: 16px 12px;
        vertical-align: middle;
        border: none;
        color: #475569;
        font-weight: 500;
    }

    /* Action Buttons */
    .action-btn {
        padding: 8px 12px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.2s ease;
        border: none;
        font-size: 0.875rem;
    }

    .action-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .action-btn-view {
        background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
        color: white;
    }

    .action-btn-approve {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
    }

    .action-btn-reject {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: white;
    }

    .action-btn-delete {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: white;
    }

    /* Status Badge */
    .status-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Responsive Improvements */
    @media (max-width: 768px) {
        .modern-tabs .nav-link {
            padding: 12px 16px;
            font-size: 0.8rem;
            min-height: 50px;
        }

        .modern-tab-content .card-body {
            padding: 20px;
        }

        .modern-card-header {
            padding: 20px;
            margin: -20px -20px 20px -20px;
        }

        .modern-table thead th,
        .modern-table tbody td {
            padding: 12px 8px;
            font-size: 0.875rem;
        }
    }

    @media (max-width: 576px) {
        .modern-tabs .nav-link {
            padding: 10px 12px;
            font-size: 0.75rem;
            min-height: 45px;
        }

        .tab-icon {
            font-size: 1rem;
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
                <li><a href="#"><span class=" fa fa-info-circle"> </span> OSS</a></li>
            </ul>
        </nav>

        @include('template.alert')

        <ul class="nav nav-tabs modern-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#verifikasi" type="button" role="tab" aria-controls="verifikasi" aria-selected="true">
                    <i class="ti ti-clipboard-check tab-icon"></i>
                    <span>VERIFIKASI</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="revisi-tab" data-bs-toggle="tab" data-bs-target="#revisi" type="button" role="tab" aria-controls="revisi" aria-selected="false">
                    <i class="ti ti-edit tab-icon"></i>
                    <span>REVISI</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="proses-tab" data-bs-toggle="tab" data-bs-target="#proses" type="button" role="tab" aria-controls="proses" aria-selected="false">
                    <i class="ti ti-clock tab-icon"></i>
                    <span>SEDANG DIPROSES</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="terbit-tab" data-bs-toggle="tab" data-bs-target="#terbit" type="button" role="tab" aria-controls="terbit" aria-selected="false">
                    <i class="ti ti-circle-check tab-icon"></i>
                    <span>IZIN TERBIT</span>
                </button>
            </li>
        </ul>

        <div class="tab-content modern-tab-content" id="myTabContent">
            <!-- Verifikasi -->
            <div class="tab-pane fade show active" id="verifikasi" role="tabpanel" aria-labelledby="home-tab">
                <div class="card w-100">
                    <div class="card-body pt-3">
                        <div class="modern-card-header">
                            <h5 class="mb-0">Permohonan OSS</h5>
                            <small>data permohonan oss baru</small>
                        </div>
                        <div class="table-responsive">
                            <table class="table modern-table" id="dtable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No Registrasi</th>
                                    <th>Nama Satpen</th>
                                    <th>Kabupaten</th>
                                    <th>Tanggal Permohonan</th>
                                    <th>Catatan</th>
                                    <th>Bukti Bayar</th>
                                    @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @php($no=0)
                                @foreach($ossVerifikasi as $row)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td><a href="{{ route('a.rekapsatpen.detail', $row->satpen->id_satpen) }}" class="text-decoration-underline">
                                                {{ $row->satpen->no_registrasi }}
                                            </a></td>
                                        <td>{{ $row->satpen->nm_satpen }}</td>
                                        <td>{{ $row->satpen->kabupaten->nama_kab }}</td>
                                        <td>{{ Date::tglReverseDash($row->tanggal) }}</td>
                                        <td>
                                            @include('admin.oss.field-catatan')
                                        </td>
                                        <td>
                                            <a href="{{ route('a.oss.file', $row->bukti_bayar) }}" class="btn btn-sm action-btn action-btn-view">
                                                <i class="ti ti-eye"></i> Lihat
                                            </a>
                                        </td>
                                    @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                        <td>
                                            <div class="d-flex gap-1 flex-wrap">
                                                <a class="btn btn-sm action-btn action-btn-view" href="{{ route('a.oss.detail', $row->id_oss) }}" title="Detail">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <button class="btn btn-sm action-btn action-btn-approve" data-bs-toggle="modal" data-bs-target="#modalVerifikasi" data-bs="{{ $row->id_oss }}" data-st="Terima" title="Terima">
                                                    <i class="ti ti-checks"></i>
                                                </button>
                                                <button class="btn btn-sm action-btn action-btn-reject" data-bs-toggle="modal" data-bs-target="#modalVerifikasi" data-bs="{{ $row->id_oss }}" data-st="Tolak" title="Tolak">
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
            <!-- Revisi -->
            <div class="tab-pane fade" id="revisi" role="tabpanel" aria-labelledby="revisi-tab">
                <div class="card w-100">
                    <div class="card-body pt-3">
                        <div class="modern-card-header">
                            <h5 class="mb-0">Revisi Permohonan OSS</h5>
                            <small>data permohonan oss perlu revisi</small>
                        </div>
                        <div class="table-responsive">
                            <table class="table modern-table" id="dtable4">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No Registrasi</th>
                                    <th>Nama Satpen</th>
                                    <th>Kabupaten</th>
                                    <th>Tanggal Permohonan</th>
                                    <th>Catatan</th>
                                    <th>Bukti Bayar</th>
                                    @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                        <th>Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @php($no=0)
                                @foreach($ossRevisi as $row)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td><a href="{{ route('a.rekapsatpen.detail', $row->satpen->id_satpen) }}" class="text-decoration-underline">
                                                {{ $row->satpen->no_registrasi }}
                                            </a></td>
                                        <td>{{ $row->satpen->nm_satpen }}</td>
                                        <td>{{ $row->satpen->kabupaten->nama_kab }}</td>
                                        <td>{{ Date::tglReverseDash($row->tanggal) }}</td>
                                        <td>
                                            @include('admin.oss.field-catatan')
                                        </td>
                                        <td>
                                            <a href="{{ route('a.oss.file', $row->bukti_bayar) }}" class="btn btn-sm action-btn action-btn-view">
                                                <i class="ti ti-eye"></i> Lihat
                                            </a>
                                        </td>
                                        @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                            <td>
                                                <div class="d-flex gap-1 flex-wrap">
                                                    <a class="btn btn-sm action-btn action-btn-view" href="{{ route('a.oss.detail', $row->id_oss) }}" title="Detail">
                                                        <i class="ti ti-eye"></i>
                                                    </a>
                                                    <button class="btn btn-sm action-btn action-btn-approve" data-bs-toggle="modal" data-bs-target="#modalVerifikasi" data-bs="{{ $row->id_oss }}" data-st="Terima" title="Terima">
                                                        <i class="ti ti-checks"></i>
                                                    </button>
                                                    <button class="btn btn-sm action-btn action-btn-reject" data-bs-toggle="modal" data-bs-target="#modalVerifikasi" data-bs="{{ $row->id_oss }}" data-st="Tolak" title="Tolak">
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
            <!-- End Revisi -->
            <!-- Proses -->
            <div class="tab-pane fade" id="proses" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card w-100">
                    <div class="card-body pt-3">
                        <div class="modern-card-header">
                            <h5 class="mb-0">Dokumen OSS Diproses</h5>
                            <small>data permohonan oss dalam proses pembuatan dokumen</small>
                        </div>
                        <div class="table-responsive">
                            <table class="table modern-table" id="dtable2">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nomor Registrasi</th>
                                    <th>Nama Satpen</th>
                                    <th>Kabupaten</th>
                                    <th>Tanggal Permohonan</th>
                                    <th width="250">Catatan</th>
                                    <th>Bukti Bayar</th>
                                    @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                    <th width="25">Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @php($no=0)
                                @foreach($ossProses as $row)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td><a href="{{ route('a.rekapsatpen.detail', $row->satpen->id_satpen) }}" class="text-decoration-underline">
                                                {{ $row->satpen->no_registrasi }}
                                            </a></td>
                                        <td>{{ $row->satpen->nm_satpen }}</td>
                                        <td>{{ $row->satpen->kabupaten->nama_kab }}</td>
                                        <td>{{ Date::tglReverseDash($row->tanggal) }}</td>
                                        <td>
                                            @include('admin.oss.field-catatan')
                                        </td>
                                        <td>
                                            <a href="{{ route('a.oss.file', $row->bukti_bayar) }}" class="btn btn-sm action-btn action-btn-view">
                                                <i class="ti ti-eye"></i> Lihat
                                            </a>
                                        </td>
                                        @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                        <td>
                                            <div class="d-flex gap-1 flex-wrap">
                                                <a class="btn btn-sm action-btn action-btn-view" href="{{ route('a.oss.detail', $row->id_oss) }}" title="Detail">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <button class="btn btn-sm action-btn action-btn-approve" data-bs-toggle="modal" data-bs-target="#modalIzin" data-bs="{{ $row->id_oss }}" title="Terbitkan Izin">
                                                    <i class="ti ti-checks"></i>
                                                </button>
                                                <button class="btn btn-sm action-btn action-btn-reject" data-bs-toggle="modal" data-bs-target="#modalVerifikasi" data-bs="{{ $row->id_oss }}" data-st="Tolak" title="Tolak">
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
            <!-- End Proses -->
            <!-- Terbit -->
            <div class="tab-pane fade" id="terbit" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card w-100">
                    <div class="card-body pt-3">
                        <div class="modern-card-header">
                            <h5 class="mb-0">Izin telah Terbit</h5>
                            <small>data oss dengan izin yang telah diterbitkan</small>
                        </div>
                        <div class="table-responsive">
                            <table class="table modern-table" id="dtable3">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Noreg Satpen</th>
                                    <th>Nama Satpen</th>
                                    <th>Kabupaten</th>
                                    <th>Permohonan</th>
                                    <th>Disetujui</th>
                                    <th>Expired Dokumen</th>
                                    <th width="200">Catatan</th>
                                    @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @php($no=0)
                                @foreach($ossTerbit as $row)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td><a href="{{ route('a.rekapsatpen.detail', $row->satpen->id_satpen) }}" class="text-decoration-underline">
                                                {{ $row->satpen->no_registrasi }}
                                            </a></td>
                                        <td>{{ $row->satpen->nm_satpen }}</td>
                                        <td>{{ $row->satpen->kabupaten->nama_kab }}</td>
                                        <td>{{ Date::tglReverseDash($row->tanggal) }}</td>
                                        <td>{{ Date::tglReverseDash($row->tgl_izin) }}</td>
                                        <td>{{ Date::tglReverseDash($row->tgl_expired) }}</td>
                                        <td>
                                           @include('admin.oss.field-catatan')
                                        </td>
                                        @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                        <td>
                                            <div class="d-flex gap-1 flex-wrap">
                                                <a class="btn btn-sm action-btn action-btn-view" href="{{ route('a.oss.detail', $row->id_oss) }}" title="Detail">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                @if(in_array(auth()->user()->role, ["super admin"]))
                                                <form action="{{ route('a.oss.destroy', $row->id_oss) }}" method="post" class="deleteBtn d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm action-btn action-btn-delete" title="Hapus">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </form>
                                                @endif
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
            <!-- End Revisi -->
        </div>
    </div>
</div>
@endsection

@include('admin.oss.ossModal')

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
        $('#dtable4').DataTable();

        // Get the hash value from the URL (e.g., #proses)
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
