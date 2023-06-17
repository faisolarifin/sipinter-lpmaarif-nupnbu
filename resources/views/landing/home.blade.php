@extends('template.general', [
    'title' => 'Siapin - Home'
])

@section('container')
    @include('template.navhome')

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-sm-9 d-flex flex-column text-center">
                <div class="mb-4 text-start">
                    <h5 class="fw-medium mb-0">Pemetaan Satpen</h5>
                    <small>pemetaan jumlah satuan pendidikan tiap kabupaten</small>
                </div>
                <img src="{{ asset('assets/images/backgrounds/colorful-indonesia-map-symbol-vector 1.png') }}" alt="Map Indonesia">
            </div>
            <div class="col-sm-3">
                Informasi
            </div>
        </div>
    </div>
@endsection
