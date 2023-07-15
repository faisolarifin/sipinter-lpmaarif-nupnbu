@extends('template.layout', [
    'title' => 'Siapintar - Dashboard'
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

<div class="row">
    <div class="col-lg-8 d-flex align-items-strech">
        <div class="card w-100 shadow-none">
            <div class="card-body py-3">
                <p class="mb-2">Halo,</p>
                <h4>Operator {{ Session::get("satpen")->nm_satpen }}</h4>
            </div>
        </div>
    </div>
    <div class="col-lg-4 d-flex align-items-strech">
        <div class="card w-100 shadow-none">
            <div class="card-body py-3">
                <p class="mb-2">Tanggal Registrasi</p>
                <h4>{{ Date::tglMasehi(Session::get("satpen")->tgl_registrasi) }}</h4>
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
                        <h5>{{ Session::get("satpen")->no_registrasi }}</h5>
                    </div>
                    <div class="col-sm-4">
                        <i class="ti ti-building"></i>
                        <p class="mb-2">Nama Satpen</p>
                        <h5>{{ Session::get("satpen")->nm_satpen }}</h5>
                    </div>
                    <div class="col-sm-4">
                        <i class="ti ti-category"></i>
                        <p class="mb-2">Kategori</p>
                        <h5>{{ Session::get("satpen")->kategori->nm_kategori }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!--  Row 1 -->
<div class="row mb-sm-4">
    <div class="col-lg-4">
        <div class="card overflow-hidden">
            <div class="card-body p-4">
                <h5 class="card-title mb-9 fw-semibold">Piagam Registrasi</h5>
                <div class="row align-items-center">
                    <div class="col-12 d-flex py-3">
                        <h6>Piagam Nomor Registrasi Ma'arif - SMKN 1 PAMEKASAN.docx</h6>
                        <div class="ms-sm-2">
                            <button class="btn btn-primary"><i class="ti ti-download"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card overflow-hidden">
            <div class="card-body p-4">
                <h5 class="card-title mb-9 fw-semibold">SK Satuan Pendidikan</h5>
                <div class="row align-items-center">
                    <div class="col-12 d-flex py-3">
                        <h6>SK Satuan Pendidikan BHPNU - SMKN 1 PAMEKASAN.docx</h6>
                        <div class="ms-sm-2">
                            <button class="btn btn-primary"><i class="ti ti-download"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card overflow-hidden">
            <div class="card-body p-4">
                <h5 class="card-title mb-9 fw-semibold text-center">Status Registrasi</h5>
                <div class="row text-center">
                    <div class="col-12 py-3">
                        <h6 class="text-uppercase mb-1">Permohonan</h6>
                        <p class="mb-0">12 Juli 2023</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
