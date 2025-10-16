@extends('template.layout', [
    'title' => 'Sipinter - Tab Registrasi Satuan Pendidikan'
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

    .card-icon-warning {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    }

    .card-icon-success {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }

    .card-icon-info {
        background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
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
        padding: 18px 24px;
        border: none;
        border-bottom: 3px solid transparent;
        transition: all 0.3s ease;
        position: relative;
        font-size: 0.9rem;
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
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%) !important;
    }

    .modern-table thead th {
        color: #1e293b !important;
        font-weight: 700;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 16px 20px !important;
        border: none;
        border-bottom: 2px solid #e5e7eb !important;
        background: transparent !important;
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
        padding: 16px 20px !important;
        color: #374151;
        font-weight: 500;
        vertical-align: middle;
        border: none;
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

    .btn-modern-primary {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: white;
    }

    .btn-modern-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
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

    .info-box-warning {
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        border-left-color: #f59e0b;
    }

    .info-box-warning i {
        color: #f59e0b;
    }

    .info-box-warning .info-box-content strong,
    .info-box-warning .info-box-content p {
        color: #92400e;
    }

    .info-box-success {
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
        border-left-color: #10b981;
    }

    .info-box-success i {
        color: #059669;
    }

    .info-box-success .info-box-content strong,
    .info-box-success .info-box-content p {
        color: #047857;
    }

    .info-box-cyan {
        background: linear-gradient(135deg, #cffafe 0%, #a5f3fc 100%);
        border-left-color: #06b6d4;
    }

    .info-box-cyan i {
        color: #0891b2;
    }

    .info-box-cyan .info-box-content strong,
    .info-box-cyan .info-box-content p {
        color: #164e63;
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

    .stats-icon-warning {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    }

    .stats-icon-success {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }

    .stats-icon-cyan {
        background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
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

        .modern-tabs .nav-link {
            padding: 14px 16px;
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
                <li><a href="#"><span class=" fa fa-info-circle"> </span> Satpen</a></li>
                <li><a href="#"><span class="fa fa-snowflake-o"></span> Registrasi Satpen</a></li>
            </ul>
        </nav>

        @include('template.alert')

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="stats-card">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon stats-icon-primary">
                            <i class="ti ti-inbox"></i>
                        </div>
                        <div class="ms-auto text-end">
                            <div class="stats-label">Permohonan</div>
                            <div class="stats-value">{{ count($permohonanSatpens) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="stats-card">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon stats-icon-warning">
                            <i class="ti ti-edit"></i>
                        </div>
                        <div class="ms-auto text-end">
                            <div class="stats-label">Revisi</div>
                            <div class="stats-value">{{ count($revisiSatpens) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="stats-card">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon stats-icon-success">
                            <i class="ti ti-file-check"></i>
                        </div>
                        <div class="ms-auto text-end">
                            <div class="stats-label">Proses Dokumen</div>
                            <div class="stats-value">{{ count($prosesDocuments) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="stats-card">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon stats-icon-cyan">
                            <i class="ti ti-refresh"></i>
                        </div>
                        <div class="ms-auto text-end">
                            <div class="stats-label">Perpanjangan</div>
                            <div class="stats-value">{{ count($perpanjanganDocuments) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <ul class="nav modern-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#permohonan" type="button" role="tab" aria-controls="permohonan" aria-selected="true">
                    <i class="ti ti-inbox me-2"></i>PERMOHONAN
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#revisi" type="button" role="tab" aria-controls="revisi" aria-selected="false">
                    <i class="ti ti-edit me-2"></i>REVISI
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="dokumen-tab" data-bs-toggle="tab" data-bs-target="#dokumen" type="button" role="tab" aria-controls="dokumen" aria-selected="false">
                    <i class="ti ti-file-check me-2"></i>PROSES DOKUMEN
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="perpanjang-tab" data-bs-toggle="tab" data-bs-target="#perpanjang" type="button" role="tab" aria-controls="perpanjang" aria-selected="false">
                    <i class="ti ti-refresh me-2"></i>PERPANJANGAN
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
                            Permohonan Satpen Baru
                        </h5>
                        <small>Data permohonan registrasi satuan pendidikan baru yang menunggu verifikasi dan persetujuan</small>
                    </div>

                    <div class="p-4">
                        <div class="info-box">
                            <i class="ti ti-info-circle"></i>
                            <div class="info-box-content">
                                <strong>Informasi</strong>
                                <p>Tabel di bawah ini menampilkan daftar permohonan registrasi satuan pendidikan baru. Silakan verifikasi data dan dokumen yang diajukan sebelum memberikan persetujuan.</p>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table modern-table" id="mytable">
                                <thead>
                                <tr>
                                    <th width="5%" class="text-center">#</th>
                                    <th width="12%">NPSN</th>
                                    <th width="15%">No. Registrasi</th>
                                    <th width="25%">Nama Satpen</th>
                                    <th width="15%">Provinsi</th>
                                    <th width="15%">Kabupaten</th>
                                    <th width="8%" class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no=0)
                                @foreach($permohonanSatpens as $row)
                                <tr>
                                    <td class="text-center">
                                        <span class="badge bg-light text-dark">{{ ++$no }}</span>
                                    </td>
                                    <td>
                                        <strong class="text-primary">{{ $row->npsn }}</strong>
                                    </td>
                                    <td>
                                        <small class="fw-bold">{{ $row->no_registrasi }}</small>
                                    </td>
                                    <td>
                                        <strong>{{ $row->nm_satpen }}</strong>
                                    </td>
                                    <td>
                                        <small>{{ $row->provinsi->nm_prov }}</small>
                                    </td>
                                    <td>
                                        <small>{{ $row->kabupaten->nama_kab }}</small>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-modern-primary btn-action" data-bs-toggle="modal" data-bs-target="#modalDetailBackdrop" data-bs="{{ $row->id_satpen }}" title="Lihat Detail">
                                            <i class="ti ti-eye"></i>
                                        </button>
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

            <!-- Revisi -->
            <div class="tab-pane fade" id="revisi" role="tabpanel" aria-labelledby="profile-tab">
                <div class="modern-card">
                    <div class="modern-card-header">
                        <h5>
                            <span class="card-icon card-icon-warning">
                                <i class="ti ti-edit"></i>
                            </span>
                            Satpen Dalam Revisi
                        </h5>
                        <small>Data satuan pendidikan yang sedang dalam proses perbaikan atau revisi dokumen</small>
                    </div>

                    <div class="p-4">
                        <div class="info-box info-box-warning">
                            <i class="ti ti-alert-triangle"></i>
                            <div class="info-box-content">
                                <strong>Perhatian</strong>
                                <p>Satuan pendidikan dalam daftar ini memerlukan perbaikan atau revisi dokumen. Pastikan untuk memverifikasi kembali setelah revisi dilakukan oleh pemohon.</p>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table modern-table" id="mytable1">
                                <thead>
                                <tr>
                                    <th width="5%" class="text-center">#</th>
                                    <th width="10%">NPSN</th>
                                    <th width="13%">No. Registrasi</th>
                                    <th width="22%">Nama Satpen</th>
                                    <th width="13%">Provinsi</th>
                                    <th width="13%">Kabupaten</th>
                                    <th width="13%">Kecamatan</th>
                                    <th width="8%" class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no=0)
                                @foreach($revisiSatpens as $row)
                                    <tr>
                                        <td class="text-center">
                                            <span class="badge bg-light text-dark">{{ ++$no }}</span>
                                        </td>
                                        <td>
                                            <strong class="text-warning">{{ $row->npsn }}</strong>
                                        </td>
                                        <td>
                                            <small class="fw-bold">{{ $row->no_registrasi }}</small>
                                        </td>
                                        <td>
                                            <strong>{{ $row->nm_satpen }}</strong>
                                        </td>
                                        <td>
                                            <small>{{ $row->provinsi->nm_prov }}</small>
                                        </td>
                                        <td>
                                            <small>{{ $row->kabupaten->nama_kab }}</small>
                                        </td>
                                        <td>
                                            <small class="text-muted">{{ $row->kecamatan }}</small>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-modern-primary btn-action" data-bs-toggle="modal" data-bs-target="#modalRevisiBackdrop" data-bs="{{ $row->id_satpen }}" title="Lihat Detail">
                                                <i class="ti ti-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Revisi -->

            <!-- Proses Document -->
            <div class="tab-pane fade" id="dokumen" role="tabpanel" aria-labelledby="dokumen-tab">
                <div class="modern-card">
                    <div class="modern-card-header">
                        <h5>
                            <span class="card-icon card-icon-success">
                                <i class="ti ti-file-check"></i>
                            </span>
                            Proses Dokumen Registrasi
                        </h5>
                        <small>Data satuan pendidikan yang sedang dalam tahap pemrosesan dokumen registrasi resmi</small>
                    </div>

                    <div class="p-4">
                        <div class="info-box info-box-success">
                            <i class="ti ti-check-circle"></i>
                            <div class="info-box-content">
                                <strong>Informasi</strong>
                                <p>Satuan pendidikan berikut telah lolos verifikasi dan sedang dalam proses pembuatan dokumen registrasi resmi. Proses ini memerlukan waktu untuk penerbitan nomor registrasi dan dokumen pendukung lainnya.</p>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table modern-table" id="mytable2">
                                <thead>
                                <tr>
                                    <th width="5%" class="text-center">#</th>
                                    <th width="15%">No. Registrasi</th>
                                    <th width="25%">Nama Satpen</th>
                                    <th width="15%">Provinsi</th>
                                    <th width="15%">Kabupaten</th>
                                    <th width="15%">Kecamatan</th>
                                    <th width="8%" class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no=0)
                                @foreach($prosesDocuments as $row)
                                    <tr>
                                        <td class="text-center">
                                            <span class="badge bg-light text-dark">{{ ++$no }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="me-2" style="width: 6px; height: 40px; background: linear-gradient(180deg, #10b981 0%, #059669 100%); border-radius: 3px;"></div>
                                                <strong class="text-success">{{ $row->no_registrasi }}</strong>
                                            </div>
                                        </td>
                                        <td>
                                            <strong>{{ $row->nm_satpen }}</strong>
                                        </td>
                                        <td>
                                            <small>{{ $row->provinsi->nm_prov }}</small>
                                        </td>
                                        <td>
                                            <small>{{ $row->kabupaten->nama_kab }}</small>
                                        </td>
                                        <td>
                                            <small class="text-muted">{{ $row->kecamatan }}</small>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-modern-primary btn-action" data-bs-toggle="modal" data-bs-target="#modalProsesDokumenBackdrop" data-bs="{{ $row->id_satpen }}" title="Lihat Detail">
                                                <i class="ti ti-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Proses Document -->

            <!-- Perpanjangan -->
            <div class="tab-pane fade" id="perpanjang" role="tabpanel" aria-labelledby="perpanjang-tab">
                <div class="modern-card">
                    <div class="modern-card-header">
                        <h5>
                            <span class="card-icon card-icon-info">
                                <i class="ti ti-refresh"></i>
                            </span>
                            Perpanjangan Registrasi
                        </h5>
                        <small>Data permohonan perpanjangan masa berlaku dokumen registrasi satuan pendidikan</small>
                    </div>

                    <div class="p-4">
                        <div class="info-box info-box-cyan">
                            <i class="ti ti-clock"></i>
                            <div class="info-box-content">
                                <strong>Informasi</strong>
                                <p>Tabel di bawah ini menampilkan daftar permohonan perpanjangan registrasi satuan pendidikan yang masa berlakunya akan habis atau sudah habis. Segera proses perpanjangan untuk memastikan keberlangsungan operasional satuan pendidikan.</p>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table modern-table" id="mytable3">
                                <thead>
                                <tr>
                                    <th width="5%" class="text-center">#</th>
                                    <th width="15%">No. Registrasi</th>
                                    <th width="25%">Nama Satpen</th>
                                    <th width="15%">Provinsi</th>
                                    <th width="15%">Kabupaten</th>
                                    <th width="15%">Kecamatan</th>
                                    <th width="8%" class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no=0)
                                @foreach($perpanjanganDocuments as $row)
                                    <tr>
                                        <td class="text-center">
                                            <span class="badge bg-light text-dark">{{ ++$no }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="me-2" style="width: 6px; height: 40px; background: linear-gradient(180deg, #06b6d4 0%, #0891b2 100%); border-radius: 3px;"></div>
                                                <strong class="text-info">{{ $row->no_registrasi }}</strong>
                                            </div>
                                        </td>
                                        <td>
                                            <strong>{{ $row->nm_satpen }}</strong>
                                        </td>
                                        <td>
                                            <small>{{ $row->provinsi->nm_prov }}</small>
                                        </td>
                                        <td>
                                            <small>{{ $row->kabupaten->nama_kab }}</small>
                                        </td>
                                        <td>
                                            <small class="text-muted">{{ $row->kecamatan }}</small>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-modern-primary btn-action" data-bs-toggle="modal" data-bs-target="#modalPerpanjangBackdrop" data-bs="{{ $row->id_satpen }}" title="Lihat Detail">
                                                <i class="ti ti-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Perpanjangan -->

        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="{{asset('assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/dataTables.bootstrap5.min.js')}}"></script>
<script>
    $(document).ready(function () {
        // Initialize DataTables with Indonesian language
        const dataTableConfig = {
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
        };

        $('#mytable').DataTable(dataTableConfig);
        $('#mytable1').DataTable(dataTableConfig);
        $('#mytable2').DataTable(dataTableConfig);
        $('#mytable3').DataTable(dataTableConfig);

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
