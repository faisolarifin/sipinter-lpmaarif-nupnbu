@extends('template.layout', [
    'title' => 'Siapin Admin - Dashboard'
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
    <div class="col-lg-6 d-flex align-items-strech">
        <div class="card w-100 shadow-none">
            <div class="card-body py-3">
                <p class="mb-2">Halo,</p>
                <h4>Operator {{ \Illuminate\Support\Facades\Session::get("satpen")->nm_satpen }}</h4>
            </div>
        </div>
    </div>
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
    <div class="col-lg-2">
        <div class="card w-100 shadow-none">
            <div class="card-body p-3 text-center">
                <p class="mb-2">TOTAL SATPEN</p>
                <h4>{{ $countOfRecordSatpen }}</h4>
            </div>
        </div>
    </div>

</div>

<!--  Row 1 -->
<div class="row">
    <div class="col-lg-4">
        <div class="card overflow-hidden">
            <div class="card-body p-4">
                <h5 class="card-title mb-9 fw-semibold">Satpen Propinsi</h5>
                <div class="row align-items-center">
                    <div class="col-8">
                        <h4 class="fw-semibold mb-3 count-prop">0</h4>
                        <div class="d-flex align-items-center mb-3">
                          <span
                              class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-up-left text-success"></i>
                          </span>
                            <p class="fs-3 mb-0">propinsi</p>
                        </div>

                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-center">
                            <div id="propinsi"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card overflow-hidden">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="card-title mb-0 fw-semibold">Satpen Kabupaten</h5>
                    <form class="form">
                        <select id="chartSelectProv" class="form-select form-select-sm">
                            @foreach($listProvinsi as $row)
                            <option value="{{ $row->id_prov }}">{{ $row->nm_prov }}</option>
                            @endforeach
                        </select>
                    </form>

                </div>
                <div class="row align-items-center">
                    <div class="col-8">
                        <h4 class="fw-semibold mb-3 count-kab">0</h4>
                        <div class="d-flex align-items-center mb-3">
                          <span
                              class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-up-left text-success"></i>
                          </span>
                            <p class="fs-3 mb-0">kabupaten</p>
                        </div>

                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-center">
                            <div id="kabupaten"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card overflow-hidden">
            <div class="card-body p-4">
                <h5 class="card-title mb-9 fw-semibold">Satpen Jenjang</h5>
                <div class="row align-items-center">
                    <div class="col-8">
                        <h4 class="fw-semibold mb-3 count-jp">0</h4>
                        <div class="d-flex align-items-center mb-3">
                          <span
                              class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-up-left text-success"></i>
                          </span>
                            <p class="fs-3 mb-0">jenjang pendidikan</p>
                        </div>

                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-center">
                            <div id="jenjang-pendidikan"></div>
                        </div>
                    </div>
                </div>
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
                        <h5>{{ \Illuminate\Support\Facades\Session::get("satpen")->no_registrasi }}</h5>
                    </div>
                    <div class="col-sm-4">
                        <i class="ti ti-building"></i>
                        <p class="mb-2">Nama Satpen</p>
                        <h5>{{ \Illuminate\Support\Facades\Session::get("satpen")->nm_satpen }}</h5>
                    </div>
                    <div class="col-sm-4">
                        <i class="ti ti-category"></i>
                        <p class="mb-2">Kategori</p>
                        <h5>{{ \Illuminate\Support\Facades\Session::get("satpen")->kategori->nm_kategori }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection

@section('scripts')
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
@endsection
