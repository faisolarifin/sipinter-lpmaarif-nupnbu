@extends('template.layout', [
    'title' => 'Sipinter - Dashboard Operator'
])

@section('navbar')
    @include('template.nav')
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

@if($usingVNPSN > 0)

    <!-- Modal -->
    <div class="modal fade" id="toggleMyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger mb-0">
                        <div class="d-flex align-items-center">
                            <i class="ti ti-alert-circle fs-6"></i>
                            <div class=" ms-2">
                                <p class="mb-0">Satuan pendidikan anda masih menggunakan NPSN Virtual. Silahkan perbaharui NPSN satuan pendidikan anda menggunakan nomor nasional !</p>
                                <p class="mb-0">Untuk pembaharuan NPSN satuan pendidikan dapat dilakukan <a href="{{ route('mysatpen')."#changenpsn" }}"><span class="badge bg-primary">disini</span></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            let myModal = new bootstrap.Modal(document.getElementById('toggleMyModal'), {})
            myModal.toggle()
        </script>
    @endsection
@endif

<div class="row">
    <div class="col-lg-8 d-flex align-items-strech">
        <div class="card w-100 shadow-none">
            <div class="card-body py-3">
                <p class="mb-2">Halo,</p>
                <h4>Operator {{ $mySatpen->nm_satpen }}</h4>
            </div>
        </div>
    </div>
    <div class="col-lg-4 d-flex align-items-strech">
        <div class="card w-100 shadow-none">
            <div class="card-body py-3">
                <p class="mb-2">Tanggal Registrasi</p>
                <h4>{{ Date::tglMasehi($mySatpen->tgl_registrasi) }}</h4>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
        <div class="card w-100 shadow-none">
            <div class="card-body py-4 text-center">
                <div class="row short-profile">
                    <div class="col-sm-4">
                        <i class="ti ti-number"></i>
                        <p class="mb-2">Nomor Registrasi</p>
                        <h5>{{ $mySatpen->no_registrasi }}</h5>
                    </div>
                    <div class="col-sm-4">
                        <i class="ti ti-building"></i>
                        <p class="mb-2">Nama Satpen</p>
                        <h5>{{ $mySatpen->nm_satpen }}</h5>
                    </div>
                    <div class="col-sm-4">
                        <i class="ti ti-category"></i>
                        <p class="mb-2">Kategori</p>
                        <h5>{{ $mySatpen->kategori?->nm_kategori }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!--  Modern Chart Section -->
<div class="row mb-4">
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
                        <h2 class="fw-bold mb-2 text-primary count-ptk">{{ ($pdptk->jml_guru + $pdptk->jml_tendik) ?? 0 }}</h2>
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
                        <i class="ti ti-chart-bar fs-1 mb-2"></i>
                        <p class="mb-0">Lihat Grafik Detail</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                        <h2 class="fw-bold mb-2 text-info count-pd">{{ $pdptk->jml_pd ?? 0 }}</h2>
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

    <div class="col-lg-4">
        <div class="card overflow-hidden shadow-sm modern-chart-card" style="cursor: pointer; transition: all 0.3s ease; border: 1px solid #e3e3e3;" data-bs-toggle="modal" data-bs-target="#modalStatusChart">
            <div class="card-body p-4 position-relative">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title mb-0 fw-semibold">Status Registrasi</h5>
                    <div class="bg-success bg-opacity-10 rounded-circle p-2">
                        <i class="ti ti-check-circle text-success fs-5"></i>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-8">
                        <h6 class="fw-bold mb-2 text-success text-uppercase">{{ $mySatpen->timeline[sizeof($mySatpen->timeline) - 1]->status_verifikasi }}</h6>
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-light-success text-success px-2 py-1">
                                <i class="ti ti-calendar me-1"></i>
                                {{ Date::tglMasehi($mySatpen->timeline[sizeof($mySatpen->timeline) - 1]->tgl_status) }}
                            </span>
                        </div>
                        <small class="text-muted">Klik untuk riwayat lengkap</small>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-center">
                            <div id="status-preview" style="height: 60px; width: 60px;"></div>
                        </div>
                    </div>
                </div>
                <div class="chart-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(19, 222, 185, 0.95); opacity: 0; transition: opacity 0.3s ease;">
                    <div class="text-white text-center">
                        <i class="ti ti-timeline fs-1 mb-2"></i>
                        <p class="mb-0">Lihat Timeline Detail</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--  File Downloads Section -->
<div class="row mb-sm-4">
    <div class="col-lg-6">
        <div class="card overflow-hidden modern-table-card">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title mb-0 fw-semibold">Piagam Registrasi</h5>
                    <div class="bg-primary bg-opacity-10 rounded-circle p-2">
                        <i class="ti ti-certificate text-primary fs-5"></i>
                    </div>
                </div>
                <div class="d-flex py-3 px-2 col-file-dash">
                    @if($mySatpen->status == "setujui")
                    <div class="flex-grow-1">
                        <h6 class="mb-1">{{ $mySatpen->file[0]->nm_file }}</h6>
                        <small class="text-muted">File tersedia untuk diunduh</small>
                    </div>
                    <div class="ms-sm-2">
                        <a href="{{ route('download', 'piagam') }}" class="btn btn-primary">
                            <i class="ti ti-download me-1"></i>
                            Download
                        </a>
                    </div>
                    @else
                        <div class="text-center w-100 py-3">
                            <i class="ti ti-file-x fs-1 text-muted mb-2"></i>
                            <h6 class="mb-0 text-muted">File not found!</h6>
                            <small class="text-muted">Menunggu persetujuan registrasi</small>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card overflow-hidden modern-table-card">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title mb-0 fw-semibold">SK Satuan Pendidikan</h5>
                    <div class="bg-info bg-opacity-10 rounded-circle p-2">
                        <i class="ti ti-file-text text-info fs-5"></i>
                    </div>
                </div>
                <div class="d-flex py-3 px-2 col-file-dash">
                    @if($mySatpen->status == "setujui")
                    <div class="flex-grow-1">
                        <h6 class="mb-1">{{ $mySatpen->file[1]->nm_file }}</h6>
                        <small class="text-muted">File tersedia untuk diunduh</small>
                    </div>
                    <div class="ms-sm-2">
                        <a href="{{ route('download', 'sk') }}" class="btn btn-primary">
                            <i class="ti ti-download me-1"></i>
                            Download
                        </a>
                    </div>
                    @else
                        <div class="text-center w-100 py-3">
                            <i class="ti ti-file-x fs-1 text-muted mb-2"></i>
                            <h6 class="mb-0 text-muted">File not found!</h6>
                            <small class="text-muted">Menunggu persetujuan registrasi</small>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modals')
    <!-- Modal PTK Chart -->
    <div class="modal fade" id="modalDataPTKChart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content rounded-2">
                <div class="modal-header bg-primary text-white">
                    <div>
                        <h5 class="modal-title mb-0">Data Pendidik & Tenaga Kependidikan</h5>
                        <small>Grafik distribusi PTK di satuan pendidikan</small>
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
                        <div class="btn-group mb-4" role="group">
                            <button type="button" class="btn btn-outline-primary chart-type-btn active" data-chart="bar" data-target="ptk">
                                <i class="ti ti-chart-bar me-2"></i>Bar Chart
                            </button>
                            <button type="button" class="btn btn-outline-primary chart-type-btn" data-chart="pie" data-target="ptk">
                                <i class="ti ti-chart-pie me-2"></i>Pie Chart
                            </button>
                            <button type="button" class="btn btn-outline-primary chart-type-btn" data-chart="line" data-target="ptk">
                                <i class="ti ti-chart-line me-2"></i>Line Chart
                            </button>
                        </div>
                        <div id="chart-ptk" style="height: 400px;"></div>
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
            </div>
        </div>
    </div>

    <!-- Modal PD Chart -->
    <div class="modal fade" id="modalDataPDChart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content rounded-2">
                <div class="modal-header bg-info text-white">
                    <div>
                        <h5 class="modal-title mb-0">Data Peserta Didik</h5>
                        <small>Grafik distribusi peserta didik per tingkat kelas</small>
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
                        <div class="btn-group mb-4" role="group">
                            <button type="button" class="btn btn-outline-info chart-type-btn active" data-chart="bar" data-target="pd">
                                <i class="ti ti-chart-bar me-2"></i>Bar Chart
                            </button>
                            <button type="button" class="btn btn-outline-info chart-type-btn" data-chart="pie" data-target="pd">
                                <i class="ti ti-chart-pie me-2"></i>Pie Chart
                            </button>
                            <button type="button" class="btn btn-outline-info chart-type-btn" data-chart="line" data-target="pd">
                                <i class="ti ti-chart-line me-2"></i>Line Chart
                            </button>
                        </div>
                        <div id="chart-pd" style="height: 400px;"></div>
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
            </div>
        </div>
    </div>

    <!-- Modal Status Chart -->
    <div class="modal fade" id="modalStatusChart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content rounded-2">
                <div class="modal-header bg-success text-white">
                    <div>
                        <h5 class="modal-title mb-0">Timeline Registrasi</h5>
                        <small>Riwayat status verifikasi satuan pendidikan</small>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="timeline-container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="timeline">
                                    @foreach($mySatpen->timeline as $index => $item)
                                    <div class="timeline-item {{ $index == sizeof($mySatpen->timeline) - 1 ? 'active' : '' }}">
                                        <div class="timeline-marker">
                                            @if($item->status_verifikasi == 'setujui')
                                                <i class="ti ti-check-circle text-success"></i>
                                            @elseif($item->status_verifikasi == 'tolak')
                                                <i class="ti ti-x-circle text-danger"></i>
                                            @else
                                                <i class="ti ti-clock text-warning"></i>
                                            @endif
                                        </div>
                                        <div class="timeline-content">
                                            <h6 class="mb-1 text-uppercase">{{ $item->status_verifikasi }}</h6>
                                            <p class="text-muted mb-1">{{ Date::tglMasehi($item->tgl_status) }}</p>
                                            @if($item->keterangan)
                                                <small class="text-secondary">{{ $item->keterangan }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <h6 class="card-title">Status Saat Ini</h6>
                                        <div class="status-badge mb-3">
                                            @if($mySatpen->timeline[sizeof($mySatpen->timeline) - 1]->status_verifikasi == 'setujui')
                                                <div class="badge bg-success p-3 rounded-circle mb-2">
                                                    <i class="ti ti-check fs-3"></i>
                                                </div>
                                                <h5 class="text-success">DISETUJUI</h5>
                                            @elseif($mySatpen->timeline[sizeof($mySatpen->timeline) - 1]->status_verifikasi == 'tolak')
                                                <div class="badge bg-danger p-3 rounded-circle mb-2">
                                                    <i class="ti ti-x fs-3"></i>
                                                </div>
                                                <h5 class="text-danger">DITOLAK</h5>
                                            @else
                                                <div class="badge bg-warning p-3 rounded-circle mb-2">
                                                    <i class="ti ti-clock fs-3"></i>
                                                </div>
                                                <h5 class="text-warning">PROSES</h5>
                                            @endif
                                        </div>
                                        <p class="text-muted">{{ Date::tglMasehi($mySatpen->timeline[sizeof($mySatpen->timeline) - 1]->tgl_status) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-modern.css') }}" />
    <style>
        .timeline {
            position: relative;
            padding: 0;
            list-style: none;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 2rem;
            padding-left: 3rem;
        }

        .timeline-item:before {
            content: '';
            position: absolute;
            left: 1rem;
            top: 2rem;
            height: 100%;
            width: 2px;
            background: #dee2e6;
        }

        .timeline-item:last-child:before {
            display: none;
        }

        .timeline-marker {
            position: absolute;
            left: 0.5rem;
            top: 0;
            width: 2rem;
            height: 2rem;
            background: white;
            border: 2px solid #dee2e6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        .timeline-item.active .timeline-marker {
            border-color: #28a745;
            background: #28a745;
            color: white;
        }

        .timeline-content {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 8px;
            border-left: 4px solid #dee2e6;
        }

        .timeline-item.active .timeline-content {
            border-left-color: #28a745;
            background: #d4edda;
        }
    </style>
@endsection

@section('scripts')
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script>
        $(function () {
            // Preview Charts
            createPreviewChart('ptk-preview', [
                @if($mySatpen->ptk && $mySatpen->ptk->count() > 0)
                    @foreach($mySatpen->ptk->groupBy('jabatan') as $jabatan => $items)
                        {{ $items->count() }},
                    @endforeach
                @else
                    1
                @endif
            ], [
                @if($mySatpen->ptk && $mySatpen->ptk->count() > 0)
                    @foreach($mySatpen->ptk->groupBy('jabatan') as $jabatan => $items)
                        '{{ $jabatan }}',
                    @endforeach
                @else
                    'Tidak ada data'
                @endif
            ], '#5D87FF');

            createPreviewChart('pd-preview', [
                @if($mySatpen->pdptk && $mySatpen->pdptk->count() > 0)
                    @php
                        $totalLK = $mySatpen->pdptk->sum('pd_lk');
                        $totalPR = $mySatpen->pdptk->sum('pd_pr');
                    @endphp
                    {{ $totalLK }},
                    {{ $totalPR }},
                @else
                    1
                @endif
            ], [
                @if($mySatpen->pdptk && $mySatpen->pdptk->count() > 0)
                    'Laki-laki',
                    'Perempuan',
                @else
                    'Tidak ada data'
                @endif
            ], '#14A4C6');

            createPreviewChart('status-preview', [{{ sizeof($mySatpen->timeline) }}], ['Timeline'], '#13DEB9');

            // Modal Chart Event Listeners
            $('#modalDataPTKChart').on('shown.bs.modal', function () {
                loadModalChart('ptk', 'bar');
            });

            $('#modalDataPDChart').on('shown.bs.modal', function () {
                loadModalChart('pd', 'bar');
            });

            // Chart Type Buttons
            $('.chart-type-btn').on('click', function() {
                const target = $(this).data('target');
                const chartType = $(this).data('chart');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                loadModalChart(target, chartType);
            });

            // Retry buttons
            $('.retry-chart').on('click', function() {
                const target = $(this).data('target');
                const activeBtn = $(`.chart-type-btn.active[data-target="${target}"]`);
                const chartType = activeBtn.data('chart');
                loadModalChart(target, chartType);
            });
        });

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

        function loadModalChart(target, chartType) {
            const chartContainer = $(`#chart-${target}`);
            const loadingDiv = chartContainer.closest('.modal-body').find('.chart-loading');
            const errorDiv = chartContainer.closest('.modal-body').find('.chart-error');
            const chartDiv = chartContainer.closest('.modal-body').find('.chart-container');

            // Show loading
            loadingDiv.show();
            errorDiv.hide();
            chartDiv.show();

            // Clear existing chart
            chartContainer.html('');

            setTimeout(() => {
                try {
                    let chartData, chartConfig;

                    if (target === 'ptk') {
                        chartData = {
                            series: [
                                @if($pdptk && $pdptk->jml_tendik > 0 && $pdptk->jml_guru > 0)
                                    @php
                                        $totalGuruLK = $pdptk->guru_lk;
                                        $totalGuruPR = $pdptk->guru_pr;
                                        $totalTendikPR = $pdptk->tendik_pr;
                                        $totalTendikLK = $pdptk->tendik_lk;
                                    @endphp
                                    {{ $totalGuruLK }},
                                    {{ $totalGuruPR }},
                                    {{ $totalTendikLK }},
                                    {{ $totalTendikPR }},
                                @else
                                    1
                                @endif
                            ],
                            labels: [
                                @if($pdptk && $pdptk->jml_tendik > 0 && $pdptk->jml_guru > 0)
                                    'Guru Laki-laki',
                                    'Guru Perempuan',
                                    'Tendik Laki-laki',
                                    'Tendik Perempuan',
                                @else
                                    'Tidak ada data'
                                @endif
                            ]
                        };
                    } else if (target === 'pd') {
                        chartData = {
                            series: [
                                @if($pdptk && $pdptk->jml_pd > 0)
                                    @php
                                        $totalLK = $pdptk->pd_lk;
                                        $totalPR = $pdptk->pd_pr;
                                    @endphp
                                    {{ $totalLK }},
                                    {{ $totalPR }},
                                @else
                                    1
                                @endif
                            ],
                            labels: [
                                @if($pdptk && $pdptk->jml_pd > 0)
                                    'Laki-laki',
                                    'Perempuan',
                                @else
                                    'Tidak ada data'
                                @endif
                            ]
                        };
                    }

                    chartConfig = getChartConfig(chartType, chartData, target);
                    const chart = new ApexCharts(document.querySelector(`#chart-${target}`), chartConfig);
                    chart.render();

                    loadingDiv.hide();
                } catch (error) {
                    console.error('Chart loading error:', error);
                    loadingDiv.hide();
                    chartDiv.hide();
                    errorDiv.show();
                }
            }, 500);
        }

        function getChartConfig(type, data, target) {
            const colors = target === 'ptk'
                ? ["#5D87FF", "#49BEFF", "#13DEB9", "#FA896B", "#FFAE1F"]
                : ["#14A4C6", "#49BEFF", "#13DEB9", "#FA896B", "#FFAE1F"];

            const baseConfig = {
                chart: {
                    fontFamily: "Plus Jakarta Sans', sans-serif",
                    foreColor: "#adb0bb",
                    height: 400,
                },
                colors: colors,
                dataLabels: {
                    enabled: true,
                },
                legend: {
                    show: true,
                    position: 'bottom',
                },
            };

            switch (type) {
                case 'bar':
                    return {
                        ...baseConfig,
                        chart: {
                            ...baseConfig.chart,
                            type: 'bar',
                        },
                        series: [{
                            data: data.series
                        }],
                        xaxis: {
                            categories: data.labels,
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4,
                                horizontal: false,
                            }
                        }
                    };

                case 'pie':
                    return {
                        ...baseConfig,
                        chart: {
                            ...baseConfig.chart,
                            type: 'pie',
                        },
                        series: data.series,
                        labels: data.labels,
                    };

                case 'line':
                    return {
                        ...baseConfig,
                        chart: {
                            ...baseConfig.chart,
                            type: 'line',
                        },
                        series: [{
                            data: data.series
                        }],
                        xaxis: {
                            categories: data.labels,
                        },
                        stroke: {
                            curve: 'smooth',
                            width: 3
                        }
                    };

                default:
                    return baseConfig;
            }
        }
    </script>
@endsection
