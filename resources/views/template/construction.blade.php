@extends('template.layout', [
    'title' => 'SIAPIN - Under Construction'
])

@section('navbar')
    @include('template.nav')
@endsection

@section('container')
<!--  Row 1 -->
<div class="row container-begin">
    <div class="col-sm-12">

        <nav class="mt-2 mb-4" aria-label="breadcrumb">
            <ol class="breadcrumb fw-bold">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Satpen</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Page Under Construction</h5>
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets/images/backgrounds/undraw_maintenance_re_59vn.svg') }}" class="w-50" alt="Under Construction">
                    <div>
                        <h5>Feature is under development phase</h5>
                        <p>Please come back in next time</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
