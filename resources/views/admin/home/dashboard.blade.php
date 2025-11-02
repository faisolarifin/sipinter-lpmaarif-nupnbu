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

    @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
    <div class="col-lg-4">
        <div class="card overflow-hidden shadow-sm modern-chart-card" style="cursor: pointer; transition: all 0.3s ease; border: 1px solid #e3e3e3;" data-bs-toggle="modal" data-bs-target="#modalKabupatenChart">
            <div class="card-body p-4 position-relative">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="card-title mb-0 fw-semibold">Satpen Kabupaten</h5>
                    <div class="bg-info bg-opacity-10 rounded-circle p-2">
                        <i class="ti ti-chart-line text-info fs-5"></i>
                    </div>
                </div>
                <form class="form mb-3" style="width:50%;">
                    <select id="chartSelectProv" class="form-select form-select-sm">
                        @foreach($listProvinsi as $row)
                        <option value="{{ $row->id_prov }}">{{ $row->nm_prov }}</option>
                        @endforeach
                    </select>
                </form>
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
    @else
    <div class="col-lg-4">
        <div class="card overflow-hidden shadow-sm modern-chart-card" style="cursor: pointer; transition: all 0.3s ease; border: 1px solid #e3e3e3;" data-bs-toggle="modal" data-bs-target="#modalCabangChart">
            <div class="card-body p-4 position-relative">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="card-title mb-0 fw-semibold">Satpen Cabang</h5>
                    <div class="bg-info bg-opacity-10 rounded-circle p-2">
                        <i class="ti ti-chart-line text-info fs-5"></i>
                    </div>
                </div>
                <form class="form mb-3" style="width:50%;">
                    <select id="chartSelectProv" class="form-select form-select-sm">
                        @foreach($listProvinsi as $row)
                            <option value="{{ $row->id_prov }}">{{ $row->nm_prov }}</option>
                        @endforeach
                    </select>
                </form>
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
                    <div class="bg-primary bg-opacity-10 rounded-circle p-2">
                        <i class="ti ti-table text-primary"></i>
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
                                        <i class="ti ti-location text-primary fs-6"></i>
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
                    <div class="status-item cursor-pointer clickable-sigle-row mb-3 p-3 rounded-3 bg-light border-start border-primary border-4 status-row-hover"
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
                                <span class="badge bg-gradient-primary px-3 py-2 rounded-pill fw-bold fs-6">
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
                                <span class="badge bg-gradient-info px-3 py-2 rounded-pill fw-bold fs-6">
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
                                <span class="badge bg-gradient-warning px-3 py-2 rounded-pill fw-bold fs-6">
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
                                <span class="badge bg-gradient-danger px-3 py-2 rounded-pill fw-bold fs-6">
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
                                <span class="badge bg-gradient-success px-3 py-2 rounded-pill fw-bold fs-6">
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
                                <small class="text-muted">Distribusi satuan pendidikan berdasarkan tingkat pendidikan</small>
                            </div>
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
let provinsiModalChart, kabupatenModalChart, cabangModalChart, jenjangModalChart;
let currentProvinsiData = [];
let currentKabupatenData = [];
let currentCabangData = [];
let currentJenjangData = [];

// Track loading states to prevent duplicate calls
let isLoadingProvinsi = false;
let isLoadingKabupaten = false;
let isLoadingCabang = false;
let isLoadingJenjang = false;

$(document).ready(function () {

    // DataTable initialization
    $('#datatb').DataTable({
        searching: false,
        paging: true,
        lengthChange: false,
        pageLength: 5,
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
            loadJenjangModalChart();
        }, 300);
    });

    // Reset loading states when modals are hidden
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
});

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

    isLoadingJenjang = true;
    showChartLoading('jenjangModalChart');

    $.ajax({
        url: "/api/jenjangcount",
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
            colors: ['#5D87FF'],
            plotOptions: {
                bar: {
                    borderRadius: 8,
                    columnWidth: '60%',
                    horizontal: false
                }
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
            colors: ['#14A4C6'],
            plotOptions: {
                bar: {
                    borderRadius: 8,
                    columnWidth: '60%',
                    horizontal: false
                }
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
            colors: ['#14A4C6'],
            plotOptions: {
                bar: {
                    borderRadius: 8,
                    columnWidth: '60%',
                    horizontal: false
                }
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
            colors: ['#13DEB9'],
            plotOptions: {
                bar: {
                    borderRadius: 8,
                    columnWidth: '60%',
                    horizontal: false
                }
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
            colors: ['#13DEB9'],
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
    document.getElementById(chartId).innerHTML = `
        <div class="chart-loading">
            <div class="text-center text-muted">
                <i class="ti ti-chart-bar fs-1"></i>
                <p>${message}</p>
            </div>
        </div>
    `;
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
</script>
@endsection
