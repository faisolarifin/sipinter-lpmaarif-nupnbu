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
                            <h4 class="text-center mb-4">Reset Password</h4>
                            @include('template.alert')
                            <form action="{{ route('reset.send') }}" method="post">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan alamat email anda" id="email" name="email" value="{{ old('email') }}">
                                    <div class="invalid-feedback">
                                        @error('email') {{ $message }} @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="new_password" class="form-label">Password Baru</label>
                                    <div class="input-group form-password">
                                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" placeholder="Masukkan password baru" id="new_password" name="new_password">
                                        <span class="input-group-text password-toggle">
                                               <i class="ti ti-eye-off"></i>
                                            </span>
                                        <div class="invalid-feedback">
                                            @error('new_password') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirm" class="form-label">Konfirmasi Password</label>
                                    <div class="input-group form-password">
                                        <input type="password" class="form-control @error('password_confirm') is-invalid @enderror" placeholder="Konfirmasi password anda" id="password_confirm" name="password_confirm">
                                        <span class="input-group-text password-toggle">
                                           <i class="ti ti-eye-off"></i>
                                        </span>
                                        <div class="invalid-feedback">
                                            @error('password_confirm') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mb-4 w-100 rounded-2">Reset Password</button>
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
                                        Email. sekretariat@maarifnu.org</p>
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

