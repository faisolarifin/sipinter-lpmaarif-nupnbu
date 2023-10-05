@extends('template.general', [
    'title' => 'Sipinter - Login'
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
                <div class="card w-50 mt-4 mt-sm-0">
                    <div class="card-body">
                        <a href="{{ route('home') }}" class="text-nowrap text-center logo-img d-block py-2 w-100">
                            <img src="{{ asset('assets/images/logos/logo.png') }}" width="210" alt="">
                        </a>
                        <p class="text-center fw-medium">Sistem Administrasi Pendidikan Terpadu <br> Lembaga Pendidikan Ma'arif NU PBNU</p>
                        @include('template.alert')
                        <form action="{{ route('login.proses') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" placeholder="Masukkan Username">
                                <div class="invalid-feedback">
                                    @error('username') {{ $message }} @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group form-password">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan Password">
                                    <span class="input-group-text password-toggle">
                                       <i class="ti ti-eye-off"></i>
                                    </span>
                                    <div class="invalid-feedback">
                                        @error('password') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                                    <label class="form-check-label text-dark" for="flexCheckChecked">
                                        Ingat Saya
                                    </label>
                                </div>
                                <a class="text-primary fw-bold" href="{{ route('forgot') }}">Lupa Password ?</a>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Masuk</button>
                            <div class="d-flex align-items-center justify-content-center">
                                <p class="fs-3 mb-0 fw-bold">Belum Punya Akun?</p>
                                <a class="text-primary fw-bold ms-2" href="{{ route('ceknpsn') }}">Buat akun baru</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 login-side-right px-5 py-4 order-sm-1">
                <div class="d-flex align-items-baseline flex-column bd-highlight" style="height:90vh;">
                    <div class="mb-auto bd-highlight">
                        <img src="{{ asset('assets/images/logos/green-nahdlatul-ulama-logo.png') }}" alt="Logo Nu" width="130">
                        <h5 class="mb-3">Sipinter LP Ma’arif NU PBNU <br>
                            Pelayanan Terintegrasi dan Terpadu
                        </h5>
                        <h6>
                            <ol class="ps-3" style="font-size:1.1em;">
                                <li class="mb-2">Menjadi Pusat Data Satuan Pendidikan Ma’arif NU</li>
                                <li class="mb-2">Layanan Izin Sistem OSS/NIB</li>
                                <li class="mb-2">Layanan Badan Hukum NU (BHPNU)</li>
                                <li class="mb-2">Layanan Bantuan Pendidikan Ma’arif</li>
                                <li class="mb-2">Layanan Beasiswa Pendidikan</li>
                            </ol>
                        </h6>
                    </div>
                    <div class="bd-highlight">
                        <h5>Helpdesk</h5>
                        <div class="row">
                            <div class="col-sm-6 pt-1">
                                <p class="mb-2 mt-3"><i class="ti ti-mail"></i>
                                    Email. bhp.maarifnu@gmail.com</p>
                                <p class="mb-2"><i class="ti ti-phone"></i>
                                    Telp. 021-3904115</p>
                                <p class="mb-2"><i class="ti ti-brand-telegram"></i>
                                    Fax. 021-31906679</p>
                                <a href="https://wa.me/628176536731" style="color:#5A6A85;">
                                    <p class="mb-1"><i class="ti ti-brand-whatsapp"></i>
                                        WA. +628176536731</p>
                                </a>
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

@section('scripts')
    <script>
        $(".password-toggle").click(function() {
            var passwordField = $(this).parent().find("input");
            var toggleIcon = $(this).find("i");

            if (passwordField.attr("type") === "password") {
                passwordField.attr("type", "text");
                toggleIcon.removeClass("ti-eye-off").addClass("ti-eye");
            } else {
                passwordField.attr("type", "password");
                toggleIcon.removeClass("ti-eye").addClass("ti-eye-off");
            }
        });
    </script>
@endsection
