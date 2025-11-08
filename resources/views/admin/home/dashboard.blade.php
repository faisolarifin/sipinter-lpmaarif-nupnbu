@extends('template.layout', [
    'title' => 'Sipinter Admin - Dashboard'
])

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard-modern.css') }}" />

<style>
/* Modern Card Hover Effects */
.modern-chart-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
    border-color: var(--bs-primary) !important;
}

.modern-chart-card:hover .chart-overlay {
    opacity: 1 !important;
}

/* Custom styles for chart cards */
.modern-chart-card .card-body {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
}

/* Loading animation for charts */
.chart-loading {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 60px;
}

.spinner-border-sm {
    width: 2rem;
    height: 2rem;
}

/* Modal improvements */
.modal-xl .modal-body {
    background: #f8f9fa;
}

.modal-header {
    border-bottom: none;
    padding: 2rem 2rem 0 2rem;
}

.modal-footer {
    border-top: none;
    padding: 0 2rem 2rem 2rem;
}
</style>
@endsection

@section('navbar')
    @include('template.navadmin')
@endsection

@section('container')

<nav class="mt-2 mb-4" aria-label="breadcrumb">
    <ul id="breadcrumb" class="mb-0">
        <li><a href="#"><i class="ti ti-home"></i></a></li>
        <li><a href="#"><span class=" fa fa-info-circle"> </span> Home</a></li>
        <li><a href="#"><span class="fa fa-snowflake-o"></span> Dashboard</a></li>
    </ul>
</nav>

@include('template.alert')

<div class="row">
    <div class="{{ !in_array(auth()->user()->role, ["admin wilayah"]) ? in_array(auth()->user()->role, ["admin cabang"]) ? 'col-lg-10' : 'col-lg-6' : 'col-lg-8' }} d-flex align-items-strech">
        <div class="card w-100 shadow-none">
            <div class="card-body py-3">
                <p class="mb-2">Halo,</p>
                <h4>{{ auth()->user()->name ? auth()->user()->name : 'Administrator' }}</h4>
            </div>
        </div>
    </div>
    @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
    <div class="col-lg-2">
        <div class="card w-100 shadow-none">
            <div class="card-body p-3 text-center">
                <p class="mb-2">TOTAL PROPINSI</p>
                <h4>{{ $countOfPropinsi }}</h4>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="card w-100 shadow-none">
            <div class="card-body p-3 text-center">
                <p class="mb-2">TOTAL KABUPATEN</p>
                <h4>{{ $countOfKabupaten }}</h4>
            </div>
        </div>
    </div>
    @endif
    @if(in_array(auth()->user()->role, ["admin wilayah"]))
    <div class="col-lg-2">
        <div class="card w-100 shadow-none">
            <div class="card-body p-3 text-center">
                <p class="mb-2">TOTAL CABANG</p>
                <h4>{{ $countOfKabupaten }}</h4>
            </div>
        </div>
    </div>
    @endif
    <div class="col-lg-2">
        <div class="card w-100 shadow-none">
            <div class="card-body p-3 text-center">
                <p class="mb-2">TOTAL SATPEN</p>
                <h4>{{ $countOfRecordSatpen }}</h4>
            </div>
        </div>
    </div>

</div>

<!--  Row 1 - Modern Chart Cards -->
<div class="row">
    @if(in_array(auth()->user()->role, ["admin cabang"]))
    <div class="col-lg-4">
        <div class="card overflow-hidden shadow-sm modern-chart-card" style="cursor: pointer; transition: all 0.3s ease; border: 1px solid #e3e3e3;" data-bs-toggle="modal" data-bs-target="#modalDataPTKChart">
            <div class="card-body p-4 position-relative">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title mb-0 fw-semibold">Data PTK</h5>
                    <div class="bg-primary bg-opacity-10 rounded-circle p-2">
                        <i class="ti ti-users text-primary fs-5"></i>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-8">
                        <h2 class="fw-bold mb-2 count-ptk text-primary">0</h2>
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-light-primary text-primary px-2 py-1">
                                <i class="ti ti-user me-1"></i>
                                PENDIDIK & TENAGA KEPENDIDIKAN
                            </span>
                        </div>
                        <small class="text-muted">Klik untuk detail grafik</small>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-center">
                            <div id="ptk-preview" style="height: 60px; width: 60px;"></div>
                        </div>
                    </div>
                </div>
                <div class="chart-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(93, 135, 255, 0.95); opacity: 0; transition: opacity 0.3s ease;">
                    <div class="text-white text-center">
                        <i class="ti ti-chart-bar-filled fs-1 mb-2"></i>
                        <p class="mb-0">Lihat Grafik Detail</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="col-lg-4">
        <div class="card overflow-hidden shadow-sm modern-chart-card" style="cursor: pointer; transition: all 0.3s ease; border: 1px solid #e3e3e3;" data-bs-toggle="modal" data-bs-target="#modalProvinsiChart">
            <div class="card-body p-4 position-relative">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title mb-0 fw-semibold">Satpen Provinsi</h5>
                    <div class="bg-primary bg-opacity-10 rounded-circle p-2">
                        <i class="ti ti-chart-bar text-primary fs-5"></i>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-8">
                        <h2 class="fw-bold mb-2 count-prop text-primary">0</h2>
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-light-primary text-primary px-2 py-1">
                                <i class="ti ti-trending-up me-1"></i>
                                PROVINSI
                            </span>
                        </div>
                        <small class="text-muted">Klik untuk detail grafik</small>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-center">
                            <div id="propinsi-preview" style="height: 60px; width: 60px;"></div>
                        </div>
                    </div>
                </div>
                <div class="chart-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(93, 135, 255, 0.95); opacity: 0; transition: opacity 0.3s ease;">
                    <div class="text-white text-center">
                        <i class="ti ti-chart-bar-filled fs-1 mb-2"></i>
                        <p class="mb-0">Lihat Grafik Detail</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
    <div class="col-lg-4">
        <div class="card overflow-hidden shadow-sm modern-chart-card" style="cursor: pointer; transition: all 0.3s ease; border: 1px solid #e3e3e3;" data-bs-toggle="modal" data-bs-target="#modalKabupatenChart">
            <div class="card-body p-4 position-relative">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title mb-0 fw-semibold">Satpen Kabupaten</h5>
                    <div class="bg-info bg-opacity-10 rounded-circle p-2">
                        <i class="ti ti-chart-line text-info fs-5"></i>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-8">
                        <h2 class="fw-bold mb-2 count-kab text-info">0</h2>
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-light-info text-info px-2 py-1">
                                <i class="ti ti-building-community me-1"></i>
                                KABUPATEN
                            </span>
                        </div>
                        <small class="text-muted">Klik untuk detail grafik</small>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-center">
                            <div id="kabupaten-preview" style="height: 60px; width: 60px;"></div>
                        </div>
                    </div>
                </div>
                <div class="chart-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(20, 164, 198, 0.95); opacity: 0; transition: opacity 0.3s ease;">
                    <div class="text-white text-center">
                        <i class="ti ti-chart-line fs-1 mb-2"></i>
                        <p class="mb-0">Lihat Grafik Detail</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elseif(in_array(auth()->user()->role, ["admin wilayah"]))
    <div class="col-lg-4">
        <div class="card overflow-hidden shadow-sm modern-chart-card" style="cursor: pointer; transition: all 0.3s ease; border: 1px solid #e3e3e3;" data-bs-toggle="modal" data-bs-target="#modalCabangChart">
            <div class="card-body p-4 position-relative">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title mb-0 fw-semibold">Satpen Cabang</h5>
                    <div class="bg-info bg-opacity-10 rounded-circle p-2">
                        <i class="ti ti-chart-line text-info fs-5"></i>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-8">
                        <h2 class="fw-bold mb-2 count-pc text-info">0</h2>
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-light-info text-info px-2 py-1">
                                <i class="ti ti-users me-1"></i>
                                PENGURUS CABANG
                            </span>
                        </div>
                        <small class="text-muted">Klik untuk detail grafik</small>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-center">
                            <div id="pc-preview" style="height: 60px; width: 60px;"></div>
                        </div>
                    </div>
                </div>
                <div class="chart-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(20, 164, 198, 0.95); opacity: 0; transition: opacity 0.3s ease;">
                    <div class="text-white text-center">
                        <i class="ti ti-chart-line fs-1 mb-2"></i>
                        <p class="mb-0">Lihat Grafik Detail</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="col-lg-4">
        <div class="card overflow-hidden shadow-sm modern-chart-card" style="cursor: pointer; transition: all 0.3s ease; border: 1px solid #e3e3e3;" data-bs-toggle="modal" data-bs-target="#modalDataPDChart">
            <div class="card-body p-4 position-relative">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title mb-0 fw-semibold">Data Peserta Didik</h5>
                    <div class="bg-info bg-opacity-10 rounded-circle p-2">
                        <i class="ti ti-school text-info fs-5"></i>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-8">
                        <h2 class="fw-bold mb-2 count-pd text-info">0</h2>
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-light-info text-info px-2 py-1">
                                <i class="ti ti-users me-1"></i>
                                PESERTA DIDIK
                            </span>
                        </div>
                        <small class="text-muted">Klik untuk detail grafik</small>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-center">
                            <div id="pd-preview" style="height: 60px; width: 60px;"></div>
                        </div>
                    </div>
                </div>
                <div class="chart-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(20, 164, 198, 0.95); opacity: 0; transition: opacity 0.3s ease;">
                    <div class="text-white text-center">
                        <i class="ti ti-chart-line fs-1 mb-2"></i>
                        <p class="mb-0">Lihat Grafik Detail</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="col-lg-4">
        <div class="card overflow-hidden shadow-sm modern-chart-card" style="cursor: pointer; transition: all 0.3s ease; border: 1px solid #e3e3e3;" data-bs-toggle="modal" data-bs-target="#modalJenjangChart">
            <div class="card-body p-4 position-relative">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title mb-0 fw-semibold">Satpen Jenjang</h5>
                    <div class="bg-success bg-opacity-10 rounded-circle p-2">
                        <i class="ti ti-chart-pie text-success fs-5"></i>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-8">
                        <h2 class="fw-bold mb-2 count-jp text-success">0</h2>
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-light-success text-success px-2 py-1">
                                <i class="ti ti-school me-1"></i>
                                JENJANG PENDIDIKAN
                            </span>
                        </div>
                        <small class="text-muted">Klik untuk detail grafik</small>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-center">
                            <div id="jenjang-preview" style="height: 60px; width: 60px;"></div>
                        </div>
                    </div>
                </div>
                <div class="chart-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(19, 122, 99, 0.95); opacity: 0; transition: opacity 0.3s ease;">
                    <div class="text-white text-center">
                        <i class="ti ti-chart-pie-filled fs-1 mb-2"></i>
                        <p class="mb-0">Lihat Grafik Detail</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(in_array(auth()->user()->role, ["super admin", "admin pusat"]))
<div class="row">
    <div class="col-lg-6 d-flex align-items-stretch">
        <div class="card w-100 shadow-sm modern-table-card" style="border: 1px solid rgba(0,0,0,0.08); border-radius: 16px;">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h5 class="card-title fw-bold mb-1 text-primary">
                            <i class="ti ti-map-pin me-2"></i>Record Per Provinsi
                        </h5>
                        <small class="text-muted">Klik baris untuk melihat detail</small>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="input-group" style="width: 240px;">
                            <span class="input-group-text">
                                <i class="ti ti-search"></i>
                            </span>
                            <input type="text" id="provinsiSearch" class="form-control" placeholder="Cari provinsi...">
                        </div>
                    </div>
                </div>
                <div class="table-responsive modern-table-wrapper">
                    <table class="table table-hover text-nowrap mb-0 align-middle table-container modern-data-table" id="datatb">
                        <thead>
                        <tr>
                            <th class="border-0 bg-light-primary text-primary fw-bold py-3 ps-3">
                                <div class="d-flex align-items-center">
                                    <i class="ti ti-map me-2"></i>
                                    Provinsi
                                </div>
                            </th>
                            <th class="border-0 bg-light-primary text-primary fw-bold py-3 text-center">
                                <div class="d-flex align-items-center justify-content-center">
                                    <i class="ti ti-chart-bar me-2"></i>
                                    Jumlah Record
                                </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($recordPerPropinsi as $row)
                        <tr class="cursor-pointer clickable-row table-row-hover" data-href="{{ route('a.rekapsatpen', ["provinsi" => $row->id_prov]) }}">
                            <td class="py-3 ps-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                        <i class="ti ti-location text-primary fs-3"></i>
                                    </div>
                                    <div>
                                        <span class="fw-semibold">{{ $row->nm_prov }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center py-3">
                                <span class="badge bg-gradient-primary px-3 py-2 rounded-pill fw-semibold">
                                    {{ number_format($row->record_count) }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 d-flex align-items-stretch">
        <div class="card w-100 shadow-sm modern-table-card" style="border: 1px solid rgba(0,0,0,0.08); border-radius: 16px;">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h5 class="card-title fw-bold mb-1 text-info">
                            <i class="ti ti-chart-donut me-2"></i>Pemetaan Status
                        </h5>
                        <small class="text-muted">Klik untuk filter berdasarkan status</small>
                    </div>
                    <div class="bg-info bg-opacity-10 rounded-circle p-2">
                        <i class="ti ti-list text-info"></i>
                    </div>
                </div>
                <div class="modern-status-table">
                    <div class="status-item cursor-pointer clickable-sigle-row mb-2 p-3 rounded-3 bg-light border-start border-primary border-4 status-row-hover"
                         data-link="{{ route('a.satpen'). "#permohonan" }}" style="transition: all 0.3s ease;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                    <i class="ti ti-file-text text-primary"></i>
                                </div>
                                <div>
                                    <span class="fw-semibold text-dark">Permohonan</span>
                                    <small class="d-block text-muted">Status permohonan baru</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-gradient-primary px-3 py-2 rounded-pill fw-bold fs-3">
                                    {{ number_format($countPerStatus[0]->permohonan) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="status-item cursor-pointer clickable-sigle-row mb-3 p-3 rounded-3 bg-light border-start border-info border-4 status-row-hover"
                         data-link="{{ route('a.satpen'). "#dokumen" }}" style="transition: all 0.3s ease;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="bg-info bg-opacity-10 rounded-circle p-2 me-3">
                                    <i class="ti ti-file-search text-info"></i>
                                </div>
                                <div>
                                    <span class="fw-semibold text-dark">Proses Dokumen</span>
                                    <small class="d-block text-muted">Sedang diproses</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-gradient-info px-3 py-2 rounded-pill fw-bold fs-3">
                                    {{ number_format($countPerStatus[0]->proses_dokumen) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="status-item cursor-pointer clickable-sigle-row mb-3 p-3 rounded-3 bg-light border-start border-warning border-4 status-row-hover"
                         data-link="{{ route('a.satpen'). "#revisi" }}" style="transition: all 0.3s ease;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="bg-warning bg-opacity-10 rounded-circle p-2 me-3">
                                    <i class="ti ti-edit text-warning"></i>
                                </div>
                                <div>
                                    <span class="fw-semibold text-dark">Revisi</span>
                                    <small class="d-block text-muted">Perlu perbaikan</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-gradient-warning px-3 py-2 rounded-pill fw-bold fs-3">
                                    {{ number_format($countPerStatus[0]->revisi) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="status-item cursor-pointer clickable-sigle-row mb-3 p-3 rounded-3 bg-light border-start border-danger border-4 status-row-hover"
                         data-link="{{ route('a.rekapsatpen', ["status" => "expired"]) }}" style="transition: all 0.3s ease;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="bg-danger bg-opacity-10 rounded-circle p-2 me-3">
                                    <i class="ti ti-clock-x text-danger"></i>
                                </div>
                                <div>
                                    <span class="fw-semibold text-dark">Expired</span>
                                    <small class="d-block text-muted">Telah kedaluwarsa</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-gradient-danger px-3 py-2 rounded-pill fw-bold fs-3">
                                    {{ number_format($countPerStatus[0]->expired) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="status-item cursor-pointer clickable-sigle-row p-3 rounded-3 bg-light border-start border-success border-4 status-row-hover"
                         data-link="{{ route('a.satpen'). "#perpanjang" }}" style="transition: all 0.3s ease;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="bg-success bg-opacity-10 rounded-circle p-2 me-3">
                                    <i class="ti ti-refresh text-success"></i>
                                </div>
                                <div>
                                    <span class="fw-semibold text-dark">Perpanjangan</span>
                                    <small class="d-block text-muted">Permohonan perpanjangan</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-gradient-success px-3 py-2 rounded-pill fw-bold fs-3">
                                    {{ number_format($countPerStatus[0]->perpanjangan) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection

@section('modals')
<!-- Modal PTK Chart -->
<div class="modal fade" id="modalDataPTKChart" tabindex="-1" aria-labelledby="modalDataPTKChartLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <div>
                    <h5 class="modal-title mb-0" id="modalDataPTKChartLabel">
                        <i class="ti ti-users me-2"></i>Data Pendidik & Tenaga Kependidikan
                    </h5>
                    <small class="opacity-75">Grafik distribusi PTK di wilayah cabang</small>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="chart-loading text-center py-5" style="display: none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-3 text-muted">Memuat data grafik...</p>
                </div>
                <div class="chart-container">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="mb-0">Total PTK: <span class="text-primary fw-bold count-ptk-modal">0</span></h6>
                            <small class="text-muted">Data PTK dinamis dari cabang Anda</small>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-outline-primary btn-sm chart-type-btn active" data-chart="bar" data-target="ptk">
                                    <i class="ti ti-chart-bar me-1"></i>Bar Chart
                                </button>
                                <button type="button" class="btn btn-outline-primary btn-sm chart-type-btn" data-chart="pie" data-target="ptk">
                                    <i class="ti ti-chart-pie me-1"></i>Pie Chart
                                </button>
                                <button type="button" class="btn btn-outline-primary btn-sm chart-type-btn" data-chart="line" data-target="ptk">
                                    <i class="ti ti-chart-line me-1"></i>Line Chart
                                </button>
                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="refreshPTKData()">
                                    <i class="ti ti-refresh me-1"></i>Refresh
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card border-0 bg-light">
                        <div class="card-body">
                            <div id="chart-ptk" style="height: 400px;"></div>
                        </div>
                    </div>
                </div>
                <div class="chart-error text-center py-5" style="display: none;">
                    <div class="text-danger">
                        <i class="ti ti-alert-circle fs-1 mb-3"></i>
                        <h5>Gagal memuat data</h5>
                        <p class="text-muted">Terjadi kesalahan saat memuat data grafik.</p>
                        <button class="btn btn-primary retry-chart" data-target="ptk">
                            <i class="ti ti-refresh me-2"></i>Coba Lagi
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="ti ti-x me-1"></i>Tutup
                </button>
                <button type="button" class="btn btn-primary" onclick="exportChart('chart-ptk')">
                    <i class="ti ti-download me-1"></i>Export Chart
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal PD Chart -->
<div class="modal fade" id="modalDataPDChart" tabindex="-1" aria-labelledby="modalDataPDChartLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <div>
                    <h5 class="modal-title mb-0" id="modalDataPDChartLabel">
                        <i class="ti ti-school me-2"></i>Data Peserta Didik
                    </h5>
                    <small class="opacity-75">Grafik distribusi peserta didik di wilayah cabang</small>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="chart-loading text-center py-5" style="display: none;">
                    <div class="spinner-border text-info" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-3 text-muted">Memuat data grafik...</p>
                </div>
                <div class="chart-container">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="mb-0">Total Peserta Didik: <span class="text-info fw-bold count-pd-modal">0</span></h6>
                            <small class="text-muted">Data peserta didik dinamis dari cabang Anda</small>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-outline-info btn-sm chart-type-btn active" data-chart="bar" data-target="pd">
                                    <i class="ti ti-chart-bar me-1"></i>Bar Chart
                                </button>
                                <button type="button" class="btn btn-outline-info btn-sm chart-type-btn" data-chart="pie" data-target="pd">
                                    <i class="ti ti-chart-pie me-1"></i>Pie Chart
                                </button>
                                <button type="button" class="btn btn-outline-info btn-sm chart-type-btn" data-chart="line" data-target="pd">
                                    <i class="ti ti-chart-line me-1"></i>Line Chart
                                </button>
                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="refreshPDData()">
                                    <i class="ti ti-refresh me-1"></i>Refresh
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card border-0 bg-light">
                        <div class="card-body">
                            <div id="chart-pd" style="height: 400px;"></div>
                        </div>
                    </div>
                </div>
                <div class="chart-error text-center py-5" style="display: none;">
                    <div class="text-danger">
                        <i class="ti ti-alert-circle fs-1 mb-3"></i>
                        <h5>Gagal memuat data</h5>
                        <p class="text-muted">Terjadi kesalahan saat memuat data grafik.</p>
                        <button class="btn btn-info retry-chart" data-target="pd">
                            <i class="ti ti-refresh me-2"></i>Coba Lagi
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="ti ti-x me-1"></i>Tutup
                </button>
                <button type="button" class="btn btn-info" onclick="exportChart('chart-pd')">
                    <i class="ti ti-download me-1"></i>Export Chart
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Provinsi Chart -->
<div class="modal fade" id="modalProvinsiChart" tabindex="-1" aria-labelledby="modalProvinsiChartLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <div>
                    <h5 class="modal-title mb-0" id="modalProvinsiChartLabel">
                        <i class="ti ti-chart-bar me-2"></i>Grafik Satpen per Provinsi
                    </h5>
                    <small class="opacity-75">Visualisasi data satuan pendidikan berdasarkan provinsi</small>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0">Total Provinsi: <span class="text-primary fw-bold count-prop-modal">0</span></h6>
                                <small class="text-muted">Klik pada bar untuk detail lebih lanjut</small>
                            </div>
                            <div class="btn-group" role="group">
                                <input type="radio" class="btn-check" name="chartTypeProvinsi" id="barTypeProvinsi" autocomplete="off" checked>
                                <label class="btn btn-outline-primary btn-sm" for="barTypeProvinsi">
                                    <i class="ti ti-chart-bar me-1"></i>Bar Chart
                                </label>
                                <input type="radio" class="btn-check" name="chartTypeProvinsi" id="lineTypeProvinsi" autocomplete="off">
                                <label class="btn btn-outline-primary btn-sm" for="lineTypeProvinsi">
                                    <i class="ti ti-chart-line me-1"></i>Line Chart
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <div id="provinsiModalChart" style="height: 400px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="ti ti-x me-1"></i>Tutup
                </button>
                <button type="button" class="btn btn-primary" onclick="exportChart('provinsiModalChart')">
                    <i class="ti ti-download me-1"></i>Export Chart
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Kabupaten Chart -->
<div class="modal fade" id="modalKabupatenChart" tabindex="-1" aria-labelledby="modalKabupatenChartLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <div>
                    <h5 class="modal-title mb-0" id="modalKabupatenChartLabel">
                        <i class="ti ti-chart-line me-2"></i>Grafik Satpen per Kabupaten
                    </h5>
                    <small class="opacity-75">Visualisasi data satuan pendidikan berdasarkan kabupaten</small>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0">Total Kabupaten: <span class="text-info fw-bold count-kab-modal">0</span></h6>
                                <small class="text-muted">Pilih provinsi untuk melihat data kabupaten</small>
                            </div>
                            <div class="d-flex gap-2">
                                <select id="modalChartSelectProv" class="form-select form-select-sm" style="width: 200px;">
                                    @foreach($listProvinsi as $row)
                                    <option value="{{ $row->id_prov }}">{{ $row->nm_prov }}</option>
                                    @endforeach
                                </select>
                                <div class="btn-group" role="group">
                                    <input type="radio" class="btn-check" name="chartTypeKabupaten" id="barTypeKabupaten" autocomplete="off" checked>
                                    <label class="btn btn-outline-info btn-sm" for="barTypeKabupaten">
                                        <i class="ti ti-chart-bar me-1"></i>Bar
                                    </label>
                                    <input type="radio" class="btn-check" name="chartTypeKabupaten" id="lineTypeKabupaten" autocomplete="off">
                                    <label class="btn btn-outline-info btn-sm" for="lineTypeKabupaten">
                                        <i class="ti ti-chart-line me-1"></i>Line
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <div id="kabupatenModalChart" style="height: 400px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="ti ti-x me-1"></i>Tutup
                </button>
                <button type="button" class="btn btn-info" onclick="exportChart('kabupatenModalChart')">
                    <i class="ti ti-download me-1"></i>Export Chart
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Cabang Chart -->
<div class="modal fade" id="modalCabangChart" tabindex="-1" aria-labelledby="modalCabangChartLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <div>
                    <h5 class="modal-title mb-0" id="modalCabangChartLabel">
                        <i class="ti ti-chart-line me-2"></i>Grafik Satpen per Cabang
                    </h5>
                    <small class="opacity-75">Visualisasi data satuan pendidikan berdasarkan cabang</small>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0">Total Pengurus Cabang: <span class="text-info fw-bold count-pc-modal">0</span></h6>
                                <small class="text-muted">Pilih provinsi untuk melihat data cabang</small>
                            </div>
                            <div class="d-flex gap-2">
                                <select id="modalChartSelectProvCabang" class="form-select form-select-sm" style="width: 200px;">
                                    @foreach($listProvinsi as $row)
                                        <option value="{{ $row->id_prov }}">{{ $row->nm_prov }}</option>
                                    @endforeach
                                </select>
                                <div class="btn-group" role="group">
                                    <input type="radio" class="btn-check" name="chartTypeCabang" id="barTypeCabang" autocomplete="off" checked>
                                    <label class="btn btn-outline-info btn-sm" for="barTypeCabang">
                                        <i class="ti ti-chart-bar me-1"></i>Bar
                                    </label>
                                    <input type="radio" class="btn-check" name="chartTypeCabang" id="lineTypeCabang" autocomplete="off">
                                    <label class="btn btn-outline-info btn-sm" for="lineTypeCabang">
                                        <i class="ti ti-chart-line me-1"></i>Line
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <div id="cabangModalChart" style="height: 400px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="ti ti-x me-1"></i>Tutup
                </button>
                <button type="button" class="btn btn-info" onclick="exportChart('cabangModalChart')">
                    <i class="ti ti-download me-1"></i>Export Chart
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Jenjang Chart -->
<div class="modal fade" id="modalJenjangChart" tabindex="-1" aria-labelledby="modalJenjangChartLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <div>
                    <h5 class="modal-title mb-0" id="modalJenjangChartLabel">
                        <i class="ti ti-chart-pie me-2"></i>Grafik Satpen per Jenjang Pendidikan
                    </h5>
                    <small class="opacity-75">Visualisasi data satuan pendidikan berdasarkan jenjang pendidikan</small>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0">Total Jenjang: <span class="text-success fw-bold count-jp-modal">0</span></h6>
                                <small class="text-muted">Pilih provinsi dan cabang untuk melihat data jenjang pendidikan</small>
                            </div>
                            <div class="d-flex gap-2">
                                <select id="modalChartSelectProvJenjang" class="form-select form-select-sm" style="width: 200px;">
                                    <option value="">Semua Provinsi</option>
                                    @foreach($listProvinsi as $row)
                                        <option value="{{ $row->id_prov }}">{{ $row->nm_prov }}</option>
                                    @endforeach
                                </select>
                                <select id="modalChartSelectCabangJenjang" class="form-select form-select-sm" style="width: 200px;">
                                    <option value="">Semua Cabang</option>
                                </select>
                                <div class="btn-group" role="group">
                                    <input type="radio" class="btn-check" name="chartTypeJenjang" id="barTypeJenjang" autocomplete="off" checked>
                                    <label class="btn btn-outline-success btn-sm" for="barTypeJenjang">
                                        <i class="ti ti-chart-bar me-1"></i>Bar Chart
                                    </label>
                                    <input type="radio" class="btn-check" name="chartTypeJenjang" id="lineTypeJenjang" autocomplete="off">
                                    <label class="btn btn-outline-success btn-sm" for="lineTypeJenjang">
                                        <i class="ti ti-chart-line me-1"></i>Line Chart
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <div id="jenjangModalChart" style="height: 400px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="ti ti-x me-1"></i>Tutup
                </button>
                <button type="button" class="btn btn-success" onclick="exportChart('jenjangModalChart')">
                    <i class="ti ti-download me-1"></i>Export Chart
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
<script src="{{asset('assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/dataTables.bootstrap5.min.js')}}"></script>

<script>
let provinsiModalChart, kabupatenModalChart, cabangModalChart, jenjangModalChart, ptkModalChart, pdModalChart;
let currentProvinsiData = [];
let currentKabupatenData = [];
let currentCabangData = [];
let currentJenjangData = [];
let currentPTKData = [];
let currentPDData = [];

// Track loading states to prevent duplicate calls
let isLoadingProvinsi = false;
let isLoadingKabupaten = false;
let isLoadingCabang = false;
let isLoadingJenjang = false;
let isLoadingPTK = false;
let isLoadingPD = false;

$(document).ready(function () {

    // Initialize preview charts for admin cabang
    @if(in_array(auth()->user()->role, ["admin cabang"]))
    // Load initial PTK and PD data for preview and counts
    loadInitialPTKData();
    loadInitialPDData();
    @endif

    // DataTable initialization
    let provinceDT = $('#datatb').DataTable({
        searching: true,
        paging: true,
        lengthChange: false,
        pageLength: 5,
        dom: 'rt<"d-flex justify-content-between align-items-center mt-3"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>'
    });

    // Custom search for provinces
    $('#provinsiSearch').on('keyup', function() {
        provinceDT.search(this.value).draw();
    });

    // Clickable row handlers
    $(".table-container").on("click", ".clickable-row", function() {
        let url = $(this).attr("data-href");
        window.location.href = url;
    });
    $(".clickable-sigle-row").on("click", function () {
        let url = $(this).attr("data-link");
        window.location.href = url;
    });

    // Modal event handlers
    $('#modalDataPTKChart').on('show.bs.modal', function () {
        isLoadingPTK = false;
    });

    $('#modalDataPTKChart').on('shown.bs.modal', function () {
        setTimeout(() => {
            loadPTKModalChart();
        }, 300);
    });

    $('#modalDataPDChart').on('show.bs.modal', function () {
        isLoadingPD = false;
    });

    $('#modalDataPDChart').on('shown.bs.modal', function () {
        setTimeout(() => {
            loadPDModalChart();
        }, 300);
    });

    $('#modalProvinsiChart').on('show.bs.modal', function () {
        // Reset loading state when modal starts to show
        isLoadingProvinsi = false;
    });

    $('#modalProvinsiChart').on('shown.bs.modal', function () {
        // Add delay to ensure everything is ready
        setTimeout(() => {
            loadProvinsiModalChart();
        }, 300);
    });

    $('#modalKabupatenChart').on('show.bs.modal', function () {
        isLoadingKabupaten = false;
    });

    $('#modalKabupatenChart').on('shown.bs.modal', function () {
        setTimeout(() => {
            loadKabupatenModalChart();
        }, 300);
    });

    $('#modalCabangChart').on('show.bs.modal', function () {
        isLoadingCabang = false;
    });

    $('#modalCabangChart').on('shown.bs.modal', function () {
        setTimeout(() => {
            loadCabangModalChart();
        }, 300);
    });

    $('#modalJenjangChart').on('show.bs.modal', function () {
        isLoadingJenjang = false;
    });

    $('#modalJenjangChart').on('shown.bs.modal', function () {
        setTimeout(() => {
            // Reset filters
            $('#modalChartSelectProvJenjang').val('');
            $('#modalChartSelectCabangJenjang').html('<option value="">Semua Cabang</option>');
            loadJenjangModalChart();
        }, 300);
    });

    // Reset loading states when modals are hidden
    $('#modalDataPTKChart').on('hidden.bs.modal', function () {
        isLoadingPTK = false;
        if (ptkModalChart) {
            ptkModalChart.destroy();
            ptkModalChart = null;
        }
    });

    $('#modalDataPDChart').on('hidden.bs.modal', function () {
        isLoadingPD = false;
        if (pdModalChart) {
            pdModalChart.destroy();
            pdModalChart = null;
        }
    });

    $('#modalProvinsiChart').on('hidden.bs.modal', function () {
        isLoadingProvinsi = false;
    });

    $('#modalKabupatenChart').on('hidden.bs.modal', function () {
        isLoadingKabupaten = false;
    });

    $('#modalCabangChart').on('hidden.bs.modal', function () {
        isLoadingCabang = false;
    });

    $('#modalJenjangChart').on('hidden.bs.modal', function () {
        isLoadingJenjang = false;
    });

    // Chart type change handlers
    $('input[name="chartTypeProvinsi"]').change(function() {
        if (currentProvinsiData.length > 0) {
            renderProvinsiChart(this.id === 'barTypeProvinsi' ? 'bar' : 'line');
        }
    });

    $('.chart-type-btn').on('click', function() {
        const target = $(this).data('target');
        const chartType = $(this).data('chart');

        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        if (target === 'ptk' && currentPTKData.length > 0) {
            renderPTKChart(chartType);
        } else if (target === 'pd' && currentPDData.length > 0) {
            renderPDChart(chartType);
        }
    });

    $('.retry-chart').on('click', function() {
        const target = $(this).data('target');
        if (target === 'ptk') {
            isLoadingPTK = false;
            loadPTKModalChart();
        } else if (target === 'pd') {
            isLoadingPD = false;
            loadPDModalChart();
        }
    });

    $('input[name="chartTypeKabupaten"]').change(function() {
        if (currentKabupatenData.length > 0) {
            renderKabupatenChart(this.id === 'barTypeKabupaten' ? 'bar' : 'line');
        }
    });

    $('input[name="chartTypeCabang"]').change(function() {
        if (currentCabangData.length > 0) {
            renderCabangChart(this.id === 'barTypeCabang' ? 'bar' : 'line');
        }
    });

    $('input[name="chartTypeJenjang"]').change(function() {
        if (currentJenjangData.length > 0) {
            renderJenjangChart(this.id === 'barTypeJenjang' ? 'bar' : 'line');
        }
    });

    // Province selector for modal charts
    $('#modalChartSelectProv').change(function() {
        isLoadingKabupaten = false; // Reset loading state
        loadKabupatenModalChart();
    });

    $('#modalChartSelectProvCabang').change(function() {
        isLoadingCabang = false; // Reset loading state
        loadCabangModalChart();
    });

    $('#modalChartSelectProvJenjang').change(function() {
        isLoadingJenjang = false; // Reset loading state
        loadCabangOptionsForJenjang();
        loadJenjangModalChart();
    });

    $('#modalChartSelectCabangJenjang').change(function() {
        isLoadingJenjang = false; // Reset loading state
        loadJenjangModalChart();
    });
});

// Load and render PTK modal chart
function loadPTKModalChart() {
    if (isLoadingPTK) return;

    isLoadingPTK = true;
    showChartLoading('chart-ptk');

    $.ajax({
        url: "/api/ptkcount",
        type: "GET",
        dataType: 'json',
        timeout: 15000,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (res) {
            if (res && res.success && res.data) {
                currentPTKData = [
                    {jabatan: 'Guru Laki-laki', count: parseInt(res.data.guru_lk || 0)},
                    {jabatan: 'Guru Perempuan', count: parseInt(res.data.guru_pr || 0)},
                    {jabatan: 'Tendik Laki-laki', count: parseInt(res.data.tendik_lk || 0)},
                    {jabatan: 'Tendik Perempuan', count: parseInt(res.data.tendik_pr || 0)}
                ];
                
                let total = parseInt(res.data.total_ptk || 0);
                $('.count-ptk-modal').text(total);
                $('.count-ptk').text(total);
                renderPTKChart('bar');
            } else {
                showChartEmpty('chart-ptk', 'Data PTK tidak tersedia untuk cabang ini');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error loading PTK data:', error);
            if (xhr.status === 404) {
                showChartEmpty('chart-ptk', 'Data PTK tidak ditemukan');
            } else if (xhr.status === 403) {
                showChartEmpty('chart-ptk', 'Akses ditolak. Hanya admin cabang yang dapat mengakses data ini');
            } else {
                showChartError('chart-ptk');
            }
        },
        complete: function() {
            isLoadingPTK = false;
        }
    });
}

// Load and render PD modal chart
function loadPDModalChart() {
    if (isLoadingPD) return;

    isLoadingPD = true;
    showChartLoading('chart-pd');

    $.ajax({
        url: "/api/pdcount",
        type: "GET",
        dataType: 'json',
        timeout: 15000,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (res) {
            if (res && res.success && res.data) {
                currentPDData = [
                    {jenjang: 'Laki-laki', count: parseInt(res.data.pd_lk || 0)},
                    {jenjang: 'Perempuan', count: parseInt(res.data.pd_pr || 0)}
                ];
                
                let total = parseInt(res.data.total_pd || 0);
                $('.count-pd-modal').text(total);
                $('.count-pd').text(total);
                renderPDChart('bar');
            } else {
                showChartEmpty('chart-pd', 'Data peserta didik tidak tersedia untuk cabang ini');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error loading PD data:', error);
            if (xhr.status === 404) {
                showChartEmpty('chart-pd', 'Data peserta didik tidak ditemukan');
            } else if (xhr.status === 403) {
                showChartEmpty('chart-pd', 'Akses ditolak. Hanya admin cabang yang dapat mengakses data ini');
            } else {
                showChartError('chart-pd');
            }
        },
        complete: function() {
            isLoadingPD = false;
        }
    });
}

// Create preview chart function
function createPreviewChart(elementId, series, labels, color) {
    const chart = new ApexCharts(document.querySelector(`#${elementId}`), {
        color: "#adb5bd",
        series: series,
        labels: labels,
        chart: {
            width: 60,
            height: 60,
            type: "donut",
            fontFamily: "Plus Jakarta Sans', sans-serif",
            foreColor: "#adb0bb",
        },
        plotOptions: {
            pie: {
                startAngle: 0,
                endAngle: 360,
                donut: {
                    size: '70%',
                },
            },
        },
        stroke: {
            show: false,
        },
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: false,
        },
        colors: [color, "#49BEFF", "#13DEB9", "#FA896B", "#FFAE1F"],
        tooltip: {
            enabled: false,
        },
    });
    chart.render();
}

// Load initial PTK data for preview and counts
function loadInitialPTKData() {
    $.ajax({
        url: "/api/ptkcount",
        type: "GET",
        dataType: 'json',
        timeout: 10000,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (res) {
            let ptkData = [];
            let total = 0;
            
            if (res && res.success && res.data) {
                ptkData = [
                    parseInt(res.data.guru_lk || 0),
                    parseInt(res.data.guru_pr || 0),
                    parseInt(res.data.tendik_lk || 0),
                    parseInt(res.data.tendik_pr || 0)
                ];
                let labels = ['Guru L', 'Guru P', 'Tendik L', 'Tendik P'];
                total = parseInt(res.data.total_ptk || 0);
                
                createPreviewChart('ptk-preview', ptkData, labels, '#5D87FF');
            } else {
                createPreviewChart('ptk-preview', [1], ['Tidak ada data'], '#5D87FF');
                total = 0;
            }
            
            $('.count-ptk').text(total);
        },
        error: function(xhr, status, error) {
            console.error('Error loading initial PTK data:', error);
            createPreviewChart('ptk-preview', [1], ['Tidak ada data'], '#5D87FF');
            $('.count-ptk').text('0');
        }
    });
}

// Load initial PD data for preview and counts
function loadInitialPDData() {
    $.ajax({
        url: "/api/pdcount",
        type: "GET",
        dataType: 'json',
        timeout: 10000,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (res) {
            let pdData = [];
            let total = 0;
            
            if (res && res.success && res.data) {
                pdData = [
                    parseInt(res.data.pd_lk || 0),
                    parseInt(res.data.pd_pr || 0)
                ];
                let labels = ['Laki-laki', 'Perempuan'];
                total = parseInt(res.data.total_pd || 0);
                
                createPreviewChart('pd-preview', pdData, labels, '#14A4C6');
            } else {
                createPreviewChart('pd-preview', [1], ['Tidak ada data'], '#14A4C6');
                total = 0;
            }
            
            $('.count-pd').text(total);
        },
        error: function(xhr, status, error) {
            console.error('Error loading initial PD data:', error);
            createPreviewChart('pd-preview', [1], ['Tidak ada data'], '#14A4C6');
            $('.count-pd').text('0');
        }
    });
}

// Load and render Provinsi modal chart
function loadProvinsiModalChart() {
    // Check if we already have data and use it
    if (currentProvinsiData.length > 0) {
        $('.count-prop-modal').text(currentProvinsiData.length);
        renderProvinsiChart('bar');
        return;
    }

    // Prevent duplicate loading
    if (isLoadingProvinsi) {
        return;
    }

    isLoadingProvinsi = true;

    // Ensure the chart container exists before showing loading
    const chartContainer = document.getElementById('provinsiModalChart');
    if (!chartContainer) {
        isLoadingProvinsi = false;
        return;
    }

    showChartLoading('provinsiModalChart');

    // Make AJAX request
    $.ajax({
        url: "/api/provcount",
        type: "GET",
        dataType: 'json',
        timeout: 15000,
        cache: false,
        success: function (res) {
            if (res && res.length > 0) {
                currentProvinsiData = res;
                $('.count-prop-modal').text(res.length);
                renderProvinsiChart('bar');
            } else {
                showChartEmpty('provinsiModalChart', 'Tidak ada data provinsi');
            }
        },
        error: function(xhr, status, error) {
            showChartError('provinsiModalChart');
        },
        complete: function() {
            isLoadingProvinsi = false;
        }
    });
}

// Load and render Kabupaten modal chart
function loadKabupatenModalChart() {
    // Prevent duplicate loading
    if (isLoadingKabupaten) return;

    const selectedProv = $('#modalChartSelectProv').val();
    const url = selectedProv ? `/api/kabcount/${selectedProv}` : "/api/kabcount";

    isLoadingKabupaten = true;
    showChartLoading('kabupatenModalChart');

    $.ajax({
        url: url,
        type: "GET",
        dataType: 'json',
        timeout: 15000, // 15 second timeout
        success: function (res) {
            if (res && res.length > 0) {
                currentKabupatenData = res;
                $('.count-kab-modal').text(res.length);
                renderKabupatenChart('bar');
            } else {
                showChartEmpty('kabupatenModalChart', 'Tidak ada data kabupaten');
            }
        },
        error: function(xhr, status, error) {
            showChartError('kabupatenModalChart');
        },
        complete: function() {
            isLoadingKabupaten = false;
        }
    });
}

// Load and render Cabang modal chart
function loadCabangModalChart() {
    // Prevent duplicate loading
    if (isLoadingCabang) return;

    const selectedProv = $('#modalChartSelectProvCabang').val();
    const url = "/api/pccount";

    isLoadingCabang = true;
    showChartLoading('cabangModalChart');

    $.ajax({
        url: url,
        type: "GET",
        dataType: 'json',
        timeout: 15000, // 15 second timeout
        success: function (res) {
            if (res && res.length > 0) {
                currentCabangData = res;
                $('.count-pc-modal').text(res.length);
                renderCabangChart('bar');
            } else {
                showChartEmpty('cabangModalChart', 'Tidak ada data cabang');
            }
        },
        error: function(xhr, status, error) {
            showChartError('cabangModalChart');
        },
        complete: function() {
            isLoadingCabang = false;
        }
    });
}

// Load and render Jenjang modal chart
function loadJenjangModalChart() {
    // Prevent duplicate loading
    if (isLoadingJenjang) return;

    const selectedProv = $('#modalChartSelectProvJenjang').val();
    const selectedCabang = $('#modalChartSelectCabangJenjang').val();
    
    let url = "/api/jenjangcount";
    if (selectedProv && selectedCabang) {
        url = `/api/jenjangcount/${selectedProv}/${selectedCabang}`;
    } else if (selectedProv) {
        url = `/api/jenjangcount/${selectedProv}`;
    }
    
    isLoadingJenjang = true;
    showChartLoading('jenjangModalChart');

    $.ajax({
        url: url,
        type: "GET",
        dataType: 'json',
        timeout: 15000, // 15 second timeout
        success: function (res) {
            if (res && res.length > 0) {
                currentJenjangData = res;
                $('.count-jp-modal').text(res.length);
                renderJenjangChart('bar');
            } else {
                showChartEmpty('jenjangModalChart', 'Tidak ada data jenjang pendidikan');
            }
        },
        error: function(xhr, status, error) {
            showChartError('jenjangModalChart');
        },
        complete: function() {
            isLoadingJenjang = false;
        }
    });
}

// Load cabang options for jenjang chart based on selected province
function loadCabangOptionsForJenjang() {
    const selectedProv = $('#modalChartSelectProvJenjang').val();
    const cabangSelect = $('#modalChartSelectCabangJenjang');
    
    // Reset cabang dropdown
    cabangSelect.html('<option value="">Semua Cabang</option>');
    
    if (!selectedProv) {
        return;
    }
    
    // Load cabang list for selected province
    $.ajax({
        url: `/api/pc/${selectedProv}`,
        type: "GET",
        dataType: 'json',
        success: function (res) {
            if (res && res.length > 0) {
                res.forEach(function(cabang) {
                    cabangSelect.append(`<option value="${cabang.id_pc}">${cabang.nama_pc}</option>`);
                });
            }
        },
        error: function(xhr, status, error) {
            console.log('Error loading cabang options:', error);
        }
    });
}

// Render Provinsi chart
function renderProvinsiChart(type) {
    if (provinsiModalChart) provinsiModalChart.destroy();

    if (!currentProvinsiData || currentProvinsiData.length === 0) {
        showChartEmpty('provinsiModalChart', 'Data provinsi tidak tersedia');
        return;
    }

    let chartConfig = {};

    if (type === 'bar') {
        chartConfig = {
            chart: {
                type: 'bar',
                height: 400,
                fontFamily: "Plus Jakarta Sans, sans-serif",
                toolbar: { show: true }
            },
            series: [{
                name: 'Jumlah Satpen',
                data: currentProvinsiData.map(item => item.record_count)
            }],
            xaxis: {
                categories: currentProvinsiData.map(item => item.nm_prov),
                labels: {
                    rotate: -45,
                    style: { fontSize: '12px' }
                }
            },
            colors: ['#5D87FF', '#49BEFF', '#13DEB9', '#FFAE1F', '#FA896B', '#539BFF', '#FF9F43', '#7367F0', '#28C76F', '#EA5455', '#00CFE8', '#FFC107', '#6F42C1', '#E91E63', '#FF5722', '#795548', '#607D8B', '#9C27B0', '#673AB7', '#3F51B5', '#2196F3', '#03A9F4', '#00BCD4', '#009688', '#4CAF50', '#8BC34A', '#CDDC39', '#FFC107', '#FF9800', '#FF5722', '#795548', '#9E9E9E', '#607D8B'],
            plotOptions: {
                bar: {
                    borderRadius: 8,
                    columnWidth: '60%',
                    horizontal: false,
                    distributed: true
                }
            },
            dataLabels: {
                enabled: true,
                style: { fontSize: '10px' }
            },
            legend: {
                show: false
            },
            title: {
                text: `Data Satpen per Provinsi`,
                align: 'center',
                style: { fontSize: '18px', fontWeight: 'bold' }
            },
            grid: {
                borderColor: '#e7e7e7',
                row: { colors: ['#f3f3f3', 'transparent'], opacity: 0.5 }
            }
        };
    } else {
        chartConfig = {
            chart: {
                type: 'line',
                height: 400,
                fontFamily: "Plus Jakarta Sans, sans-serif",
                toolbar: { show: true }
            },
            series: [{
                name: 'Jumlah Satpen',
                data: currentProvinsiData.map(item => item.record_count)
            }],
            xaxis: {
                categories: currentProvinsiData.map(item => item.nm_prov),
                labels: {
                    rotate: -45,
                    style: { fontSize: '12px' }
                }
            },
            colors: ['#5D87FF', '#49BEFF', '#13DEB9', '#FFAE1F', '#FA896B', '#539BFF', '#FF9F43', '#7367F0', '#28C76F', '#EA5455', '#00CFE8', '#FFC107', '#6F42C1', '#E91E63', '#FF5722', '#795548', '#607D8B', '#9C27B0', '#673AB7', '#3F51B5', '#2196F3', '#03A9F4', '#00BCD4', '#009688', '#4CAF50', '#8BC34A', '#CDDC39', '#FFC107', '#FF9800', '#FF5722', '#795548', '#9E9E9E', '#607D8B'],
            stroke: {
                width: 4,
                curve: 'smooth'
            },
            markers: {
                size: 6,
                hover: { size: 8 }
            },
            dataLabels: {
                enabled: true,
                style: { fontSize: '10px' }
            },
            title: {
                text: `Data Satpen per Provinsi`,
                align: 'center',
                style: { fontSize: '18px', fontWeight: 'bold' }
            },
            grid: {
                borderColor: '#e7e7e7',
                row: { colors: ['#f3f3f3', 'transparent'], opacity: 0.5 }
            }
        };
    }
    provinsiModalChart = new ApexCharts(document.querySelector("#provinsiModalChart"), chartConfig);
    provinsiModalChart.render();
    $('.chart-loading').remove();
}

// Render Kabupaten chart
function renderKabupatenChart(type) {
    if (kabupatenModalChart) kabupatenModalChart.destroy();

    if (!currentKabupatenData || currentKabupatenData.length === 0) {
        showChartEmpty('kabupatenModalChart', 'Data kabupaten tidak tersedia');
        return;
    }

    let chartConfig = {};

    if (type === 'bar') {
        chartConfig = {
            chart: {
                type: 'bar',
                height: 400,
                fontFamily: "Plus Jakarta Sans, sans-serif",
                toolbar: { show: true }
            },
            series: [{
                name: 'Jumlah Satpen',
                data: currentKabupatenData.map(item => item.record_count)
            }],
            xaxis: {
                categories: currentKabupatenData.map(item => item.nama_kab),
                labels: {
                    rotate: -45,
                    style: { fontSize: '12px' }
                }
            },
            colors: ['#14A4C6', '#49BEFF', '#13DEB9', '#FFAE1F', '#FA896B', '#539BFF', '#FF9F43', '#7367F0', '#28C76F', '#EA5455', '#00CFE8', '#FFC107', '#6F42C1', '#E91E63', '#FF5722', '#795548', '#607D8B', '#9C27B0', '#673AB7', '#3F51B5', '#2196F3', '#03A9F4', '#00BCD4', '#009688', '#4CAF50', '#8BC34A', '#CDDC39', '#FFC107', '#FF9800', '#FF5722', '#795548', '#9E9E9E', '#607D8B'],
            plotOptions: {
                bar: {
                    borderRadius: 8,
                    columnWidth: '60%',
                    horizontal: false,
                    distributed: true
                }
            },
            dataLabels: {
                enabled: true,
                style: { fontSize: '10px' }
            },
            legend: {
                show: false
            },
            title: {
                text: `Data Satpen per Kabupaten`,
                align: 'center',
                style: { fontSize: '18px', fontWeight: 'bold' }
            },
            grid: {
                borderColor: '#e7e7e7',
                row: { colors: ['#f3f3f3', 'transparent'], opacity: 0.5 }
            }
        };
    } else {
        chartConfig = {
            chart: {
                type: 'line',
                height: 400,
                fontFamily: "Plus Jakarta Sans, sans-serif",
                toolbar: { show: true }
            },
            series: [{
                name: 'Jumlah Satpen',
                data: currentKabupatenData.map(item => item.record_count)
            }],
            xaxis: {
                categories: currentKabupatenData.map(item => item.nama_kab),
                labels: {
                    rotate: -45,
                    style: { fontSize: '12px' }
                }
            },
            colors: ['#14A4C6', '#49BEFF', '#13DEB9', '#FFAE1F', '#FA896B', '#539BFF', '#FF9F43', '#7367F0', '#28C76F', '#EA5455', '#00CFE8', '#FFC107', '#6F42C1', '#E91E63', '#FF5722', '#795548', '#607D8B', '#9C27B0', '#673AB7', '#3F51B5', '#2196F3', '#03A9F4', '#00BCD4', '#009688', '#4CAF50', '#8BC34A', '#CDDC39', '#FFC107', '#FF9800', '#FF5722', '#795548', '#9E9E9E', '#607D8B'],
            stroke: {
                width: 4,
                curve: 'smooth'
            },
            markers: {
                size: 6,
                hover: { size: 8 }
            },
            dataLabels: {
                enabled: true,
                style: { fontSize: '10px' }
            },
            title: {
                text: `Data Satpen per Kabupaten`,
                align: 'center',
                style: { fontSize: '18px', fontWeight: 'bold' }
            },
            grid: {
                borderColor: '#e7e7e7',
                row: { colors: ['#f3f3f3', 'transparent'], opacity: 0.5 }
            }
        };
    }

    kabupatenModalChart = new ApexCharts(document.querySelector("#kabupatenModalChart"), chartConfig);
    kabupatenModalChart.render();
    $('.chart-loading').remove();
}

// Render Cabang chart
function renderCabangChart(type) {
    if (cabangModalChart) cabangModalChart.destroy();

    if (!currentCabangData || currentCabangData.length === 0) {
        showChartEmpty('cabangModalChart', 'Data cabang tidak tersedia');
        return;
    }

    let chartConfig = {};

    if (type === 'bar') {
        chartConfig = {
            chart: {
                type: 'bar',
                height: 400,
                fontFamily: "Plus Jakarta Sans, sans-serif",
                toolbar: { show: true }
            },
            series: [{
                name: 'Jumlah Satpen',
                data: currentCabangData.map(item => item.record_count)
            }],
            xaxis: {
                categories: currentCabangData.map(item => item.nama_pc),
                labels: {
                    rotate: -45,
                    style: { fontSize: '12px' }
                }
            },
            colors: ['#14A4C6', '#49BEFF', '#13DEB9', '#FFAE1F', '#FA896B', '#539BFF', '#FF9F43', '#7367F0', '#28C76F', '#EA5455', '#00CFE8', '#FFC107', '#6F42C1', '#E91E63', '#FF5722', '#795548', '#607D8B', '#9C27B0', '#673AB7', '#3F51B5', '#2196F3', '#03A9F4', '#00BCD4', '#009688', '#4CAF50', '#8BC34A', '#CDDC39', '#FFC107', '#FF9800', '#FF5722', '#795548', '#9E9E9E', '#607D8B'],
            plotOptions: {
                bar: {
                    borderRadius: 8,
                    columnWidth: '60%',
                    horizontal: false,
                    distributed: true
                }
            },
            dataLabels: {
                enabled: true,
                style: { fontSize: '10px' }
            },
            legend: {
                show: false
            },
            title: {
                text: `Data Satpen per Pengurus Cabang`,
                align: 'center',
                style: { fontSize: '18px', fontWeight: 'bold' }
            },
            grid: {
                borderColor: '#e7e7e7',
                row: { colors: ['#f3f3f3', 'transparent'], opacity: 0.5 }
            }
        };
    } else {
        chartConfig = {
            chart: {
                type: 'line',
                height: 400,
                fontFamily: "Plus Jakarta Sans, sans-serif",
                toolbar: { show: true }
            },
            series: [{
                name: 'Jumlah Satpen',
                data: currentCabangData.map(item => item.record_count)
            }],
            xaxis: {
                categories: currentCabangData.map(item => item.nama_pc),
                labels: {
                    rotate: -45,
                    style: { fontSize: '12px' }
                }
            },
            colors: ['#14A4C6', '#49BEFF', '#13DEB9', '#FFAE1F', '#FA896B', '#539BFF', '#FF9F43', '#7367F0', '#28C76F', '#EA5455', '#00CFE8', '#FFC107', '#6F42C1', '#E91E63', '#FF5722', '#795548', '#607D8B', '#9C27B0', '#673AB7', '#3F51B5', '#2196F3', '#03A9F4', '#00BCD4', '#009688', '#4CAF50', '#8BC34A', '#CDDC39', '#FFC107', '#FF9800', '#FF5722', '#795548', '#9E9E9E', '#607D8B'],
            stroke: {
                width: 4,
                curve: 'smooth'
            },
            markers: {
                size: 6,
                hover: { size: 8 }
            },
            dataLabels: {
                enabled: true,
                style: { fontSize: '10px' }
            },
            title: {
                text: `Data Satpen per Pengurus Cabang`,
                align: 'center',
                style: { fontSize: '18px', fontWeight: 'bold' }
            },
            grid: {
                borderColor: '#e7e7e7',
                row: { colors: ['#f3f3f3', 'transparent'], opacity: 0.5 }
            }
        };
    }

    cabangModalChart = new ApexCharts(document.querySelector("#cabangModalChart"), chartConfig);
    cabangModalChart.render();
    $('.chart-loading').remove();
}

// Render Jenjang chart
function renderJenjangChart(type) {
    if (jenjangModalChart) jenjangModalChart.destroy();

    if (!currentJenjangData || currentJenjangData.length === 0) {
        showChartEmpty('jenjangModalChart', 'Data jenjang pendidikan tidak tersedia');
        return;
    }

    let chartConfig = {};

    if (type === 'bar') {
        chartConfig = {
            chart: {
                type: 'bar',
                height: 400,
                fontFamily: "Plus Jakarta Sans, sans-serif",
                toolbar: { show: true }
            },
            series: [{
                name: 'Jumlah Satpen',
                data: currentJenjangData.map(item => item.record_count)
            }],
            xaxis: {
                categories: currentJenjangData.map(item => item.nm_jenjang),
                labels: {
                    rotate: -45,
                    style: { fontSize: '12px' }
                }
            },
            colors: ['#13DEB9', '#49BEFF', '#5D87FF', '#FFAE1F', '#FA896B', '#539BFF', '#FF9F43', '#7367F0', '#28C76F', '#EA5455', '#00CFE8', '#FFC107', '#6F42C1', '#E91E63', '#FF5722', '#795548', '#607D8B', '#9C27B0', '#673AB7', '#3F51B5', '#2196F3', '#03A9F4', '#00BCD4', '#009688', '#4CAF50', '#8BC34A', '#CDDC39', '#FFC107', '#FF9800', '#FF5722', '#795548', '#9E9E9E', '#607D8B'],
            plotOptions: {
                bar: {
                    borderRadius: 8,
                    columnWidth: '60%',
                    horizontal: false,
                    distributed: true
                }
            },
            dataLabels: {
                enabled: true,
                style: { fontSize: '10px' }
            },
            legend: {
                show: false
            },
            title: {
                text: `Data Satpen per Jenjang Pendidikan`,
                align: 'center',
                style: { fontSize: '18px', fontWeight: 'bold' }
            },
            grid: {
                borderColor: '#e7e7e7',
                row: { colors: ['#f3f3f3', 'transparent'], opacity: 0.5 }
            }
        };
    } else {
        chartConfig = {
            chart: {
                type: 'line',
                height: 400,
                fontFamily: "Plus Jakarta Sans, sans-serif",
                toolbar: { show: true }
            },
            series: [{
                name: 'Jumlah Satpen',
                data: currentJenjangData.map(item => item.record_count)
            }],
            xaxis: {
                categories: currentJenjangData.map(item => item.nm_jenjang),
                labels: {
                    rotate: -45,
                    style: { fontSize: '12px' }
                }
            },
            colors: ['#13DEB9', '#49BEFF', '#5D87FF', '#FFAE1F', '#FA896B', '#539BFF', '#FF9F43', '#7367F0', '#28C76F', '#EA5455', '#00CFE8', '#FFC107', '#6F42C1', '#E91E63', '#FF5722', '#795548', '#607D8B', '#9C27B0', '#673AB7', '#3F51B5', '#2196F3', '#03A9F4', '#00BCD4', '#009688', '#4CAF50', '#8BC34A', '#CDDC39', '#FFC107', '#FF9800', '#FF5722', '#795548', '#9E9E9E', '#607D8B'],
            stroke: {
                width: 4,
                curve: 'smooth'
            },
            markers: {
                size: 6,
                hover: { size: 8 }
            },
            dataLabels: {
                enabled: true,
                style: { fontSize: '10px' }
            },
            title: {
                text: `Data Satpen per Jenjang Pendidikan`,
                align: 'center',
                style: { fontSize: '18px', fontWeight: 'bold' }
            },
            grid: {
                borderColor: '#e7e7e7',
                row: { colors: ['#f3f3f3', 'transparent'], opacity: 0.5 }
            }
        };
    }

    jenjangModalChart = new ApexCharts(document.querySelector("#jenjangModalChart"), chartConfig);
    jenjangModalChart.render();
    $('.chart-loading').remove();
}

// Render PTK chart
function renderPTKChart(type) {
    if (ptkModalChart) ptkModalChart.destroy();

    if (!currentPTKData || currentPTKData.length === 0) {
        showChartEmpty('chart-ptk', 'Data PTK tidak tersedia');
        return;
    }

    let chartConfig = {};

    if (type === 'bar') {
        chartConfig = {
            chart: {
                type: 'bar',
                height: 400,
                fontFamily: "Plus Jakarta Sans, sans-serif",
                toolbar: { show: true }
            },
            series: [{
                name: 'Jumlah PTK',
                data: currentPTKData.map(item => item.count)
            }],
            xaxis: {
                categories: currentPTKData.map(item => item.jabatan),
                labels: {
                    rotate: -45,
                    style: { fontSize: '12px' }
                }
            },
            colors: ['#5D87FF', '#49BEFF', '#13DEB9', '#FFAE1F'],
            plotOptions: {
                bar: {
                    borderRadius: 8,
                    columnWidth: '60%',
                    horizontal: false,
                    distributed: true
                }
            },
            dataLabels: {
                enabled: true,
                style: { fontSize: '10px' }
            },
            legend: {
                show: false
            },
            title: {
                text: `Data Pendidik & Tenaga Kependidikan`,
                align: 'center',
                style: { fontSize: '18px', fontWeight: 'bold' }
            },
            grid: {
                borderColor: '#e7e7e7',
                row: { colors: ['#f3f3f3', 'transparent'], opacity: 0.5 }
            }
        };
    } else if (type === 'pie') {
        chartConfig = {
            chart: {
                type: 'pie',
                height: 400,
                fontFamily: "Plus Jakarta Sans, sans-serif",
                toolbar: { show: true }
            },
            series: currentPTKData.map(item => item.count),
            labels: currentPTKData.map(item => item.jabatan),
            colors: ['#5D87FF', '#49BEFF', '#13DEB9', '#FFAE1F'],
            dataLabels: {
                enabled: true,
                style: { fontSize: '12px' }
            },
            legend: {
                show: true,
                position: 'bottom'
            },
            title: {
                text: `Data Pendidik & Tenaga Kependidikan`,
                align: 'center',
                style: { fontSize: '18px', fontWeight: 'bold' }
            }
        };
    } else {
        chartConfig = {
            chart: {
                type: 'line',
                height: 400,
                fontFamily: "Plus Jakarta Sans, sans-serif",
                toolbar: { show: true }
            },
            series: [{
                name: 'Jumlah PTK',
                data: currentPTKData.map(item => item.count)
            }],
            xaxis: {
                categories: currentPTKData.map(item => item.jabatan),
                labels: {
                    rotate: -45,
                    style: { fontSize: '12px' }
                }
            },
            colors: ['#5D87FF'],
            stroke: {
                width: 4,
                curve: 'smooth'
            },
            markers: {
                size: 6,
                hover: { size: 8 }
            },
            dataLabels: {
                enabled: true,
                style: { fontSize: '10px' }
            },
            title: {
                text: `Data Pendidik & Tenaga Kependidikan`,
                align: 'center',
                style: { fontSize: '18px', fontWeight: 'bold' }
            },
            grid: {
                borderColor: '#e7e7e7',
                row: { colors: ['#f3f3f3', 'transparent'], opacity: 0.5 }
            }
        };
    }

    ptkModalChart = new ApexCharts(document.querySelector("#chart-ptk"), chartConfig);
    ptkModalChart.render();
    $('.chart-loading').remove();
}

// Render PD chart
function renderPDChart(type) {
    if (pdModalChart) pdModalChart.destroy();

    if (!currentPDData || currentPDData.length === 0) {
        showChartEmpty('chart-pd', 'Data peserta didik tidak tersedia');
        return;
    }

    let chartConfig = {};

    if (type === 'bar') {
        chartConfig = {
            chart: {
                type: 'bar',
                height: 400,
                fontFamily: "Plus Jakarta Sans, sans-serif",
                toolbar: { show: true }
            },
            series: [{
                name: 'Jumlah Peserta Didik',
                data: currentPDData.map(item => item.count)
            }],
            xaxis: {
                categories: currentPDData.map(item => item.jenjang),
                labels: {
                    style: { fontSize: '12px' }
                }
            },
            colors: ['#14A4C6', '#49BEFF', '#13DEB9', '#FA896B', '#FFAE1F'],
            plotOptions: {
                bar: {
                    borderRadius: 8,
                    columnWidth: '60%',
                    horizontal: false,
                    distributed: true
                }
            },
            dataLabels: {
                enabled: true,
                style: { fontSize: '12px' }
            },
            legend: {
                show: false
            },
            title: {
                text: `Data Peserta Didik per Jenis Kelamin`,
                align: 'center',
                style: { fontSize: '18px', fontWeight: 'bold' }
            },
            grid: {
                borderColor: '#e7e7e7',
                row: { colors: ['#f3f3f3', 'transparent'], opacity: 0.5 }
            }
        };
    } else if (type === 'pie') {
        chartConfig = {
            chart: {
                type: 'pie',
                height: 400,
                fontFamily: "Plus Jakarta Sans, sans-serif",
                toolbar: { show: true }
            },
            series: currentPDData.map(item => item.count),
            labels: currentPDData.map(item => item.jenjang),
            colors: ['#14A4C6', '#49BEFF', '#13DEB9', '#FA896B', '#FFAE1F'],
            dataLabels: {
                enabled: true,
                style: { fontSize: '12px' }
            },
            legend: {
                show: true,
                position: 'bottom'
            },
            title: {
                text: `Data Peserta Didik per Jenis Kelamin`,
                align: 'center',
                style: { fontSize: '18px', fontWeight: 'bold' }
            }
        };
    } else {
        chartConfig = {
            chart: {
                type: 'line',
                height: 400,
                fontFamily: "Plus Jakarta Sans, sans-serif",
                toolbar: { show: true }
            },
            series: [{
                name: 'Jumlah Peserta Didik',
                data: currentPDData.map(item => item.count)
            }],
            xaxis: {
                categories: currentPDData.map(item => item.jenjang), // Updated to use jenjang
                labels: {
                    style: { fontSize: '12px' }
                }
            },
            colors: ['#14A4C6'],
            stroke: {
                width: 4,
                curve: 'smooth'
            },
            markers: {
                size: 6,
                hover: { size: 8 }
            },
            dataLabels: {
                enabled: true,
                style: { fontSize: '12px' }
            },
            title: {
                text: `Data Peserta Didik per Jenis Kelamin`,
                align: 'center',
                style: { fontSize: '18px', fontWeight: 'bold' }
            },
            grid: {
                borderColor: '#e7e7e7',
                row: { colors: ['#f3f3f3', 'transparent'], opacity: 0.5 }
            }
        };
    }

    pdModalChart = new ApexCharts(document.querySelector("#chart-pd"), chartConfig);
    pdModalChart.render();
    $('.chart-loading').remove();
}

// Utility functions
function showChartLoading(chartId) {
    const element = document.getElementById(chartId);
    if (element) {
        element.innerHTML = `
            <div class="chart-loading">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-2">Memuat data...</p>
            </div>
        `;

        // Fallback: Clear loading after 30 seconds if nothing happens
        setTimeout(() => {
            if (element.innerHTML.includes('Memuat data...')) {
                showChartError(chartId);
            }
        }, 30000);
    }
}

function showChartError(chartId) {
    const element = document.getElementById(chartId);
    if (element) {
        element.innerHTML = `
            <div class="chart-loading">
                <div class="text-center text-danger">
                    <i class="ti ti-alert-circle fs-1"></i>
                    <p>Error memuat data grafik</p>
                    <div class="mt-3">
                        <button class="btn btn-sm btn-outline-primary me-2" onclick="retryLoadChart('${chartId}')">
                            <i class="ti ti-refresh me-1"></i>Coba Lagi
                        </button>
                    </div>
                </div>
            </div>
        `;
    }
}

function showChartEmpty(chartId, message) {
    const element = document.getElementById(chartId);
    if (element) {
        element.innerHTML = `
            <div class="chart-loading">
                <div class="text-center text-muted">
                    <i class="ti ti-chart-bar fs-1"></i>
                    <p>${message}</p>
                    <small class="text-muted">Tidak ada data untuk ditampilkan</small>
                </div>
            </div>
        `;
    }
}

// Retry loading chart function
function retryLoadChart(chartId) {
    switch(chartId) {
        case 'provinsiModalChart':
            isLoadingProvinsi = false;
            loadProvinsiModalChart();
            break;
        case 'kabupatenModalChart':
            isLoadingKabupaten = false;
            loadKabupatenModalChart();
            break;
        case 'cabangModalChart':
            isLoadingCabang = false;
            loadCabangModalChart();
            break;
        case 'jenjangModalChart':
            isLoadingJenjang = false;
            loadJenjangModalChart();
            break;
        case 'chart-ptk':
            isLoadingPTK = false;
            loadPTKModalChart();
            break;
        case 'chart-pd':
            isLoadingPD = false;
            loadPDModalChart();
            break;
    }
}

// Export chart function
function exportChart(chartId) {
    let chart;

    switch(chartId) {
        case 'provinsiModalChart':
            chart = provinsiModalChart;
            break;
        case 'kabupatenModalChart':
            chart = kabupatenModalChart;
            break;
        case 'cabangModalChart':
            chart = cabangModalChart;
            break;
        case 'jenjangModalChart':
            chart = jenjangModalChart;
            break;
        case 'chart-ptk':
            chart = ptkModalChart;
            break;
        case 'chart-pd':
            chart = pdModalChart;
            break;
        default:
            return;
    }

    if (chart) {
        chart.dataURI().then(({ imgURI, blob }) => {
            const link = document.createElement('a');
            link.href = imgURI;
            link.download = `${chartId}.png`;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }).catch((error) => {
            alert('Export gagal. Silakan coba lagi.');
        });
    } else {
        alert('Chart belum dimuat. Silakan tunggu sebentar dan coba lagi.');
    }
}

// Refresh PTK data
function refreshPTKData() {
    isLoadingPTK = false;
    currentPTKData = [];
    loadPTKModalChart();
    
    // Also refresh preview and count
    loadInitialPTKData();
}

// Refresh PD data  
function refreshPDData() {
    isLoadingPD = false;
    currentPDData = [];
    loadPDModalChart();
    
    // Also refresh preview and count
    loadInitialPDData();
}
</script>
@endsection
