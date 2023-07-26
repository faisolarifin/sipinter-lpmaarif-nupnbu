@extends('template.general', [
    'title' => "Reset Password - Sistem Administrasi Pendidikan Terpadu LP Ma'arif NU PBNU"
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
                            <h4 class="text-center mb-4">Lupa Password Anda?</h4>
                            @include('template.alert')
                            <form action="{{ route('forget.send') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan email anda" id="email" name="email" value="{{ old('email') }}">
                                    <div class="invalid-feedback">
                                        @error('email') {{ $message }} @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mb-4 rounded-2 w-100">Kirim Link Reset Password</button>
                            </form>
                            <div class="d-flex align-items-center justify-content-between">
                                <a class="text-primary" href="{{ route('ceknpsn') }}">Buat akun baru?</a>
                                <a class="text-primary" href="{{ route('login') }}">Login ke portal</a>
                            </div>
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
                                        Email. sekretariat@maarifnu.org</p>
                                    <p class="mb-2"><i class="ti ti-phone"></i>
                                        Telp. 021-3904115</p>
                                    <p><i class="ti ti-brand-telegram"></i>
                                        Fax. 021-31906679</p>
                                </div>
                                <div class="col-sm-6 text-center">
                                    <i class="ti ti-map-pin fs-5"></i>
                                    <p>Lembaga Pendidikan Ma’arif Nahdlatul Ulama Pengurus Besar Nahdlatul Ulama Gedung PBNU II Lt. 2 Jl. Taman Amir Hamzah No. 5 Jakarta Pusat 10320.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
