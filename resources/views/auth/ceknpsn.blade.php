@extends('template.general', [
    'title' => 'Siapin - Cek NPSN'
])

@section('container')
<div class="d-flex align-items-center" style="height: 100vh;">
    <div class="container-fluid">
        <div class="row" style="height: 100vh;">
            <div class="col-sm-7 d-flex align-items-center justify-content-center order-sm-2">
                <div class="card shadow-none w-60">
                    <div class="card-body">
                        <a href="./index.html" class="text-nowrap text-center logo-img d-block py-2 w-100">
                            <img src="{{ asset('assets/images/logos/logo.png') }}" width="210" alt="">
                        </a>
                        <p class="text-center fw-medium mb-4">Sistem Administrasi Pendidikan <br> LP Ma'arif Nahdlatul Ulama</p>
                        @include('template.alert')
                        <form class="pt-3" action="{{ route('ceknpsn.proses') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <label for="npsn" class="form-label">NPSN</label>
                                    <small>verifikasi npsn untuk melakukan registrasi</small>
                                </div>
                                <input type="text" class="form-control @error('npsn') is-invalid @enderror" id="npsn" name="npsn" value="{{ old('npsn') }}">
                                <div class="invalid-feedback">
                                    @error('npsn') {{ $message }} @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Verifikasi NPSN</button>
                            <div class="d-flex align-items-center justify-content-center">
                                <p class="fs-4 mb-0 fw-bold">Sudah Punya Akun?</p>
                                <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Masuk Portal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 d-flex align-items-end login-side-right px-5 py-4 order-sm-1">
                <div class="d-flex align-items-center flex-column justify-content-between bd-highlight" style="height:60vh;">
                    <div class="bd-highlight">
                        <img src="{{ asset('assets/images/logos/green-nahdlatul-ulama-logo.png') }}" alt="Logo Nu" width="230">
                    </div>
                    <div class="bd-highlight">
                        <h5>Helpdesk</h5>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="mb-1"><i class="ti ti-mail"></i>
                                    faisolofficial99@gmail.com</p>
                                <p><i class="ti ti-phone"></i>
                                    082335685138</p>
                            </div>
                            <div class="col-sm-6">
                                <p><i class="ti ti-map"></i>
                                    Jalan Asam Wulung Meddelan Tengah, Desa Meddelan, Kecematan Lenteng, Kabupaten Sumenep, Jawa Timur 69461</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
