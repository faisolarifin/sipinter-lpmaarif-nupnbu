@extends('template.general', [
    'title' => 'Sipinter - Cek NPSN'
])

@section('style')
    <style>
        body {background: #fafafa;}
    </style>
@endsection

@section('container')
<div class="d-flex align-items-center" style="height: 100vh;">
    <div class="container-fluid">
        <div class="row" style="height: 100vh;">
            <div class="col-sm-7 d-flex align-items-center justify-content-center order-sm-2">
                <div class="card w-60 mt-4 mt-sm-0">
                    <div class="card-body">
                        <a href="{{ route('home') }}" class="text-nowrap text-center logo-img d-block py-2 w-100">
                            <img src="{{ asset('assets/images/logos/logo.png') }}" width="210" alt="">
                        </a>
                        <p class="text-center fw-medium mb-4">Sistem Administrasi Pendidikan Terpadu <br> Lembaga Pendidikan Ma'arif NU PBNU</p>
                        @include('template.alert')
                        <form class="pt-3" action="{{ route('ceknpsn.proses') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <label for="npsn" class="form-label">NPSN</label>
                                    <small>verifikasi npsn untuk melakukan registrasi</small>
                                </div>
                                <input type="text" class="form-control @error('npsn') is-invalid @enderror" id="npsn" name="npsn" value="{{ old('npsn') }}" placeholder="Masukkan Nomor NPSN">
                                <div class="invalid-feedback">
                                    @error('npsn') {{ $message }} @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Verifikasi NPSN</button>
                            <div class="d-flex align-items-center justify-content-center mb-3">
                                <p class="fs-3 mb-0 fw-bold">Sudah Punya Akun?</p>
                                <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Masuk Portal</a>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <p class="fs-3 mb-0 fw-bold">Belum Punya NPSN?</p>
                                <a class="text-primary fw-bold ms-2" href="{{ route('npsnvirtual') }}">Ajukan NPSN Virtual</a>
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
                            <div class="col-sm-6 pt-1">
                                <p class="mb-2 mt-3"><i class="ti ti-mail"></i>
                                    Email. bhp.maarifnu@gmail.com</p>
                                <p class="mb-2"><i class="ti ti-phone"></i>
                                    Telp. 021-3904115</p>
                                <p><i class="ti ti-brand-telegram"></i>
                                    Fax. 021-31906679</p>
                            </div>
                            <div class="col-sm-6 text-center">
                                <i class="ti ti-map-pin fs-5"></i>
                                <p>Gedung PBNU II, Lantai 2 <br> Jl. Taman Amir Hamzah No. 5, Pegangsaan, Menteng <br> Jakarta Pusat 10320</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
