@extends('template.layout', [
    'title' => 'Sipinter - Data NPYP'
])

@section('navbar')
    @include('template.nav')
@endsection

@section('container')

<nav class="mt-2 mb-4" aria-label="breadcrumb">
    <ul id="breadcrumb" class="mb-0">
        <li><a href="#"><i class="ti ti-home"></i></a></li>
        <li><a href="#"><span class="fa fa-info-circle"></span> NPYP</a></li>
        <li><a href="#"><span class="fa fa-file-certificate"></span> Data NPYP</a></li>
    </ul>
</nav>

@include('template.alert')

<div class="card w-100 mb-4">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="card-title fw-bold text-primary mb-2">
                    <i class="ti ti-file-certificate me-2"></i>DATA NPYP SATUAN PENDIDIKAN
                </h4>
                <p class="text-muted mb-0">
                    Halaman ini menampilkan informasi Nomor Pokok Yayasan Penyelenggara (NPYP) 
                    yang terkait dengan satuan pendidikan Anda. Data ini menunjukkan status 
                    registrasi dan keterkaitan dengan yayasan penyelenggara.
                </p>
            </div>
            <div class="col-md-4 text-end">
                <div class="bg-light-primary p-3 rounded">
                    <h6 class="text-primary mb-1">Status NPYP</h6>
                    <h4 class="text-primary mb-0" id="statusNPYP">
                        @if($npypSatpen)
                            <span class="badge bg-success">Terdaftar</span>
                        @else
                            <span class="badge bg-warning">Belum Terdaftar</span>
                        @endif
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>

@if($npypSatpen)
    <!-- NPYP Information Card -->
    <div class="card w-100 mb-4">
        <div class="card-header bg-primary">
            <h5 class="card-title text-white mb-0">
                <i class="ti ti-info-circle me-2"></i>Informasi NPYP
            </h5>
        </div>
        <div class="card-body">
            <div class="row" id="npypInfo">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-muted">Nomor NPYP</label>
                    <div class="form-control bg-light" id="nomorNPYP">{{ $npypSatpen->npyp->nomor_npyp ?? '-' }}</div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-muted">Nama NPYP</label>
                    <div class="form-control bg-light" id="namaNPYP">{{ $npypSatpen->npyp->nama_npyp ?? '-' }}</div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-muted">Nama Operator</label>
                    <div class="form-control bg-light" id="namaOperator">{{ $npypSatpen->npyp->nama_operator ?? '-' }}</div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-muted">Nomor Operator</label>
                    <div class="form-control bg-light" id="nomorOperator">{{ $npypSatpen->npyp->nomor_operator ?? '-' }}</div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-muted">Tanggal Terdaftar</label>
                    <div class="form-control bg-light" id="tanggalDaftar">
                        {{ $npypSatpen->assign_date ? date('d F Y', strtotime($npypSatpen->assign_date)) : '-' }}
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-muted">Tingkat</label>
                    <div class="form-control bg-light" id="tingkat">
                        @if($npypSatpen->npyp->id_pw && !$npypSatpen->npyp->id_pc)
                            Wilayah
                        @elseif($npypSatpen->npyp->id_pc)
                            Cabang
                        @else
                            Pusat
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="card w-100">
        <div class="card-body text-center">
            <button type="button" class="btn btn-outline-primary me-2" onclick="refreshData()">
                <i class="ti ti-refresh me-1"></i>Refresh Data
            </button>
            <a href="{{ route('ptk.index') }}" class="btn btn-outline-info">
                <i class="ti ti-users me-1"></i>Ajuan Verval PTK
            </a>
        </div>
    </div>

@else
    <!-- No NPYP Registration Card -->
    <div class="card w-100">
        <div class="card-body text-center">
            <div class="empty-state">
                <div class="mb-4">
                    <i class="ti ti-file-certificate display-1 text-muted"></i>
                </div>
                <h4 class="text-muted mb-3">Belum Terdaftar dalam NPYP</h4>
                <p class="text-muted mb-4">
                    Satuan pendidikan Anda belum terdaftar dalam Nomor Pokok Yayasan Penyelenggara (NPYP) manapun. 
                    Silakan hubungi administrator untuk proses registrasi.
                </p>
                <div class="alert alert-info">
                    <div class="d-flex align-items-center">
                        <i class="ti ti-info-circle me-2"></i>
                        <div>
                            <strong>Informasi:</strong> Untuk mendaftarkan satuan pendidikan ke dalam NPYP, 
                            silakan menghubungi administrator sistem atau pengurus wilayah/cabang terkait.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@endsection

@section('scripts')
<script>
function refreshData() {
    // Show loading message in button
    const btn = event.target;
    const originalText = btn.innerHTML;
    btn.innerHTML = '<i class="spinner-border spinner-border-sm me-1"></i>Loading...';
    btn.disabled = true;
    
    // Refresh the page
    setTimeout(() => {
        location.reload();
    }, 1000);
}
</script>
@endsection