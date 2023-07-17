@extends('template.general', [
    'title' => 'Siapin - Login'
])

@section('container')
<div class="d-flex align-items-center" style="height: 100vh;">
    <div class="container-fluid">
        <div class="row" style="height: 100vh;">
            <div class="col-sm-7 d-flex align-items-center justify-content-center order-sm-2">
                <div class="card shadow-none w-50">
                    <div class="card-body">
                        <a href="./index.html" class="text-nowrap text-center logo-img d-block py-2 w-100">
                            <img src="{{ asset('assets/images/logos/logo.png') }}" width="210" alt="">
                        </a>
                        <p class="text-center fw-medium">Sistem Administrasi Pendidikan Terpadu <br> Lembaga Pendidikan Ma'arif NU PBNU</p>
                        @include('template.alert')
                        <form action="{{ route('login.proses') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}">
                                <div class="invalid-feedback">
                                    @error('username') {{ $message }} @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group form-password">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
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
                                <a class="text-primary fw-bold" href="./index.html">Lupa Password ?</a>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Masuk</button>
                            <div class="d-flex align-items-center justify-content-center">
                                <p class="fs-4 mb-0 fw-bold">Belum Punya Akun?</p>
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
                        <h5>Pelayanan Terpadu</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci animi deleniti enim illo impedit laudantium pariatur quisquam repudiandae ut vitae.</p>
                        <h5>Akses Sederhana</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus earum laborum omnis reprehenderit sunt voluptas.</p>
                        <h5>Validasi Akurat</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta doloribus eum fugiat harum repudiandae voluptatem voluptatibus!</p>
                    </div>
                    <div class="bd-highlight">
                        <h5>Helpdesk</h5>
                        <div class="row">
                            <div class="col-sm-6">
                                <p><i class="ti ti-mail"></i>
                                    Email. sekretariat@maarifnu.org</p>
                                <p><i class="ti ti-phone"></i>
                                    Telp. 021-3904115</p>
                                <p><i class="ti ti-number"></i>
                                    Fax. 021-31906679</p>
                            </div>
                            <div class="col-sm-6">
                                <p><i class="ti ti-map"></i>
                                    Lembaga Pendidikan Ma’arif Nahdlatul Ulama Pengurus Besar Nahdlatul Ulama Gedung PBNU II Lt. 2 Jl. Taman Amir Hamzah No. 5 Jakarta Pusat 10320.</p>
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
