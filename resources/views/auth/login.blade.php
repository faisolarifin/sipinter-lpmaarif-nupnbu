@extends('template.general', [
    'title' => 'Sipinter - Login'
])

@section('style')
    <style>
        body {
            background: linear-gradient(135deg, rgba(5, 150, 105, 0.85) 0%, rgba(52, 211, 153, 0.85) 100%);
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow: hidden;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .login-container {
            height: 100vh;
            max-height: 100vh;
            position: relative;
            overflow: hidden;
        }

        /* Animated Background Shapes */
        .bg-shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.08;
            animation: float 25s infinite ease-in-out;
        }

        .bg-shape-1 {
            width: 250px;
            height: 250px;
            background: #fff;
            top: 8%;
            left: 3%;
            animation-delay: 0s;
        }

        .bg-shape-2 {
            width: 180px;
            height: 180px;
            background: #fff;
            bottom: 12%;
            right: 8%;
            animation-delay: 5s;
        }

        .bg-shape-3 {
            width: 120px;
            height: 120px;
            background: #fff;
            top: 55%;
            left: 12%;
            animation-delay: 10s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) translateX(0) scale(1); }
            25% { transform: translateY(-25px) translateX(15px) scale(1.05); }
            50% { transform: translateY(-40px) translateX(-15px) scale(0.95); }
            75% { transform: translateY(-15px) translateX(25px) scale(1.02); }
        }

        /* Left Side - Info Panel */
        .login-side-left {
            background: linear-gradient(135deg, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0.05) 100%);
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(255,255,255,0.2);
            color: #fff;
            padding: 2rem 2.5rem;
            position: relative;
            overflow: hidden;
            height: 100vh;
        }

        .login-side-left::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: pulse 15s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.2); opacity: 0.3; }
        }

        .info-content {
            position: relative;
            z-index: 2;
        }

        .welcome-text {
            font-size: 1.6rem;
            font-weight: 800;
            margin-bottom: 0.7rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
            line-height: 1.15;
        }

        .welcome-subtitle {
            font-size: 0.95rem;
            font-weight: 400;
            opacity: 0.95;
            margin-bottom: 1.5rem;
            line-height: 1.4;
        }

        .feature-item {
            display: flex;
            align-items: start;
            margin-bottom: 1rem;
            padding: 0.75rem;
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            background: rgba(255,255,255,0.16);
            transform: translateX(8px);
        }

        .feature-icon {
            width: 35px;
            height: 35px;
            background: rgba(255,255,255,0.2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.8rem;
            flex-shrink: 0;
        }

        .feature-icon i {
            font-size: 1.1rem;
        }

        .feature-content h6 {
            font-weight: 600;
            margin-bottom: 0.2rem;
            font-size: 0.85rem;
        }

        .feature-content p {
            font-size: 0.75rem;
            opacity: 0.9;
            margin: 0;
            line-height: 1.3;
        }

        /* Right Side - Login Card */
        .login-card-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            background: rgba(255, 255, 255, 0.95);
            position: relative;
            height: 100vh;
        }

        .login-card {
            background: #ffffff;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.08);
            border: 1px solid #e5e7eb;
            max-width: 400px;
            width: 100%;
            animation: slideInRight 0.6s ease-out;
            max-height: 95vh;
            overflow-y: auto;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .login-card .card-body {
            padding: 1.5rem 2rem;
        }

        .logo-wrapper {
            text-align: center;
            margin-bottom: 0.8rem;
        }

        .login-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2d3748;
            text-align: center;
            margin-bottom: 0.3rem;
        }

        .login-subtitle {
            text-align: center;
            color: #718096;
            font-size: 0.82rem;
            margin-bottom: 1.2rem;
            font-weight: 500;
        }

        /* Form Styling */
        .form-label {
            font-weight: 600;
            color: #4a5568;
            font-size: 0.8rem;
            margin-bottom: 0.3rem;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            padding: 0.55rem 0.8rem;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        .input-group-text {
            background: transparent;
            border: 2px solid #e2e8f0;
            border-left: none;
            border-radius: 0 8px 8px 0;
            cursor: pointer;
        }

        .input-group .form-control {
            border-right: none;
            border-radius: 8px 0 0 8px;
        }

        .password-toggle {
            transition: all 0.3s ease;
        }

        .password-toggle:hover {
            background: #f7fafc;
        }

        .btn-primary {
            background: linear-gradient(135deg, #059669 0%, #10b981 100%);
            border: none;
            border-radius: 8px;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            box-shadow: 0 3px 12px rgba(5, 150, 105, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 16px rgba(5, 150, 105, 0.5);
            background: linear-gradient(135deg, #047857 0%, #059669 100%);
        }

        .form-check-input:checked {
            background-color: #10b981;
            border-color: #10b981;
        }

        .text-primary {
            color: #059669 !important;
        }

        .text-primary:hover {
            color: #047857 !important;
        }

        /* Helpdesk Section */
        .helpdesk-section {
            background: rgba(255,255,255,0.1);
            border-radius: 12px;
            padding: 1rem;
            margin-top: 1.2rem;
            backdrop-filter: blur(5px);
        }

        .helpdesk-title {
            font-weight: 700;
            font-size: 0.95rem;
            margin-bottom: 0.7rem;
            display: flex;
            align-items: center;
        }

        .helpdesk-title i {
            margin-right: 0.4rem;
            font-size: 1rem;
        }

        .helpdesk-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
            font-size: 0.8rem;
        }

        .helpdesk-item i {
            margin-right: 0.4rem;
            width: 16px;
            font-size: 0.85rem;
        }

        .helpdesk-item a {
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .helpdesk-item a:hover {
            opacity: 0.8;
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .login-side-left {
                display: none !important;
            }
            
            .login-card-wrapper {
                height: 100vh;
                padding: 1rem;
            }

            .login-card {
                max-width: 100%;
                max-height: 100vh;
            }

            .login-card .card-body {
                padding: 1.2rem 1.5rem;
            }
        }

        @media (max-width: 767px) {
            .login-card .card-body {
                padding: 1rem 1.2rem;
            }

            .login-title {
                font-size: 1.2rem;
            }

            .login-subtitle {
                font-size: 0.8rem;
            }
        }

        @media (min-height: 900px) {
            .login-side-left {
                padding: 3rem 2.5rem;
            }
            
            .welcome-text {
                font-size: 1.8rem;
                margin-bottom: 1rem;
            }
            
            .welcome-subtitle {
                font-size: 1rem;
                margin-bottom: 2rem;
            }
            
            .feature-item {
                margin-bottom: 1.2rem;
                padding: 0.9rem;
            }
        }

        /* Logo Animation */
        .logo-wrapper img {
            animation: fadeInDown 0.8s ease-out;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endsection

@section('container')
<div class="login-container">
    <!-- Animated Background Shapes -->
    <div class="bg-shape bg-shape-1"></div>
    <div class="bg-shape bg-shape-2"></div>
    <div class="bg-shape bg-shape-3"></div>

    <div class="container-fluid">
        <div class="row" style="height: 100vh;">
            <!-- Left Side - Welcome & Features -->
            <div class="col-lg-6 login-side-left d-none d-lg-flex order-lg-1">
                <div class="info-content d-flex flex-column justify-content-between" style="width: 100%; height: 100%;">
                    <div style="flex: 1; display: flex; flex-direction: column; justify-content: center;">
                        <h1 class="welcome-text">
                            Selamat Datang di<br>
                            <span style="background: linear-gradient(120deg, #fff 0%, rgba(255,255,255,0.8) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Sipinter LP Ma'arif NU</span>
                        </h1>

                        <p class="welcome-subtitle">
                            Transformasi Digital Pendidikan Ma'arif NU untuk Indonesia yang Lebih Maju dan Berakhlakul Karimah
                        </p>

                        <div class="features-list">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="ti ti-database"></i>
                                </div>
                                <div class="feature-content">
                                    <h6>Pusat Data Terpadu</h6>
                                    <p>Akses dan kelola data satuan pendidikan Ma'arif NU secara terintegrasi</p>
                                </div>
                            </div>

                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="ti ti-certificate"></i>
                                </div>
                                <div class="feature-content">
                                    <h6>Layanan OSS/NIB</h6>
                                    <p>Proses perizinan usaha yang lebih cepat dan efisien</p>
                                </div>
                            </div>

                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="ti ti-shield-check"></i>
                                </div>
                                <div class="feature-content">
                                    <h6>Badan Hukum NU</h6>
                                    <p>Pengelolaan legalitas dan administrasi BHPNU yang mudah</p>
                                </div>
                            </div>

                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="ti ti-gift"></i>
                                </div>
                                <div class="feature-content">
                                    <h6>Bantuan & Beasiswa</h6>
                                    <p>Akses informasi bantuan pendidikan dan beasiswa untuk pelajar Ma'arif</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Helpdesk Section -->
                    <div class="helpdesk-section" style="flex-shrink: 0;">
                        <div class="helpdesk-title">
                            <i class="ti ti-headset"></i>
                            Butuh Bantuan?
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <div class="helpdesk-item">
                                    <i class="ti ti-mail"></i>
                                    <a href="mailto:bhp.maarifnu@gmail.com">bhp.maarifnu@gmail.com</a>
                                </div>
                                <div class="helpdesk-item">
                                    <i class="ti ti-phone"></i>
                                    <span>021-3904115</span>
                                </div>
                                <div class="helpdesk-item">
                                    <i class="ti ti-brand-whatsapp"></i>
                                    <a href="https://wa.me/628176536731">+62 817-6536-731</a>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="helpdesk-item">
                                    <i class="ti ti-map-pin"></i>
                                    <span style="font-size: 0.75rem;">Gedung PBNU II Lt. 2, Menteng, Jakarta Pusat</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="col-lg-6 login-card-wrapper order-lg-2">
                <div class="login-card">
                    <div class="card-body">
                        <div class="logo-wrapper">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/images/logos/logo.png') }}" width="130" alt="Sipinter Logo">
                            </a>
                        </div>

                        <h2 class="login-title">Masuk ke Akun Anda</h2>
                        <p class="login-subtitle">Kelola pendidikan Ma'arif NU dengan lebih mudah dan efisien</p>

                        @include('template.alert')

                        <form action="{{ route('login.proses') }}" method="post">
                            @csrf
                            <div class="mb-2">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" placeholder="Masukkan username Anda" autofocus>
                                <div class="invalid-feedback">
                                    @error('username') {{ $message }} @enderror
                                </div>
                            </div>

                            <div class="mb-2">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group form-password">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan password Anda">
                                    <span class="input-group-text password-toggle">
                                        <i class="ti ti-eye-off"></i>
                                    </span>
                                    <div class="invalid-feedback">
                                        @error('password') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                    <label class="form-check-label" for="flexCheckChecked" style="font-size: 0.85rem; color: #4a5568;">
                                        Ingat Saya
                                    </label>
                                </div>
                                <a class="text-primary" href="{{ route('forgot') }}" style="font-size: 0.85rem; font-weight: 600; text-decoration: none;">Lupa Password?</a>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mb-3">
                                Masuk Sekarang
                            </button>

                            <div class="text-center">
                                <span style="color: #718096; font-size: 0.9rem;">Belum punya akun?</span>
                                <a class="text-primary ms-1" href="{{ route('ceknpsn') }}" style="font-weight: 600; text-decoration: none; font-size: 0.9rem;">Daftar Sekarang</a>
                            </div>
                        </form>

                        <div class="mt-3 pt-3 border-top text-center">
                            <p style="font-size: 0.8rem; color: #a0aec0; margin: 0;">
                                <i class="ti ti-shield-lock" style="font-size: 0.9rem;"></i>
                                Data Anda dilindungi dengan enkripsi tingkat tinggi
                            </p>
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
