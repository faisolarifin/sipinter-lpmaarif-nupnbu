@extends('template.general', [
    'title' => 'Sipinter - Login'
])

@section('style')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');

        body {
            background: linear-gradient(135deg, rgba(5, 150, 105, 0.85) 0%, rgba(52, 211, 153, 0.85) 100%);
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow-x: hidden;
        }

        .login-container {
            min-height: 100vh;
            position: relative;
        }

        /* Animated Background Shapes */
        .bg-shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
            animation: float 20s infinite ease-in-out;
        }

        .bg-shape-1 {
            width: 300px;
            height: 300px;
            background: #fff;
            top: 10%;
            left: 5%;
            animation-delay: 0s;
        }

        .bg-shape-2 {
            width: 200px;
            height: 200px;
            background: #fff;
            bottom: 15%;
            right: 10%;
            animation-delay: 5s;
        }

        .bg-shape-3 {
            width: 150px;
            height: 150px;
            background: #fff;
            top: 60%;
            left: 15%;
            animation-delay: 10s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) translateX(0) scale(1); }
            25% { transform: translateY(-30px) translateX(20px) scale(1.1); }
            50% { transform: translateY(-50px) translateX(-20px) scale(0.9); }
            75% { transform: translateY(-20px) translateX(30px) scale(1.05); }
        }

        /* Left Side - Info Panel */
        .login-side-left {
            background: linear-gradient(135deg, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0.05) 100%);
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(255,255,255,0.2);
            color: #fff;
            padding: 3rem;
            position: relative;
            overflow: hidden;
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
            font-size: 1.9rem;
            font-weight: 800;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
            line-height: 1.2;
        }

        .welcome-subtitle {
            font-size: 1.1rem;
            font-weight: 400;
            opacity: 0.95;
            margin-bottom: 2.5rem;
            line-height: 1.6;
        }

        .feature-item {
            display: flex;
            align-items: start;
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: rgba(255,255,255,0.1);
            border-radius: 12px;
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            background: rgba(255,255,255,0.18);
            transform: translateX(10px);
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            flex-shrink: 0;
        }

        .feature-icon i {
            font-size: 1.3rem;
        }

        .feature-content h6 {
            font-weight: 600;
            margin-bottom: 0.3rem;
            font-size: 0.95rem;
        }

        .feature-content p {
            font-size: 0.85rem;
            opacity: 0.9;
            margin: 0;
        }

        /* Right Side - Login Card */
        .login-card-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.95);
            position: relative;
        }

        .login-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            border: 1px solid #e5e7eb;
            max-width: 420px;
            width: 100%;
            animation: slideInRight 0.6s ease-out;
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
            padding: 2rem 2.5rem;
        }

        .logo-wrapper {
            text-align: center;
            margin-bottom: 1rem;
        }

        .login-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2d3748;
            text-align: center;
            margin-bottom: 0.4rem;
        }

        .login-subtitle {
            text-align: center;
            color: #718096;
            font-size: 0.88rem;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }

        /* Form Styling */
        .form-label {
            font-weight: 600;
            color: #4a5568;
            font-size: 0.85rem;
            margin-bottom: 0.4rem;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.65rem 0.9rem;
            font-size: 0.9rem;
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
            border-radius: 0 10px 10px 0;
            cursor: pointer;
        }

        .input-group .form-control {
            border-right: none;
            border-radius: 10px 0 0 10px;
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
            border-radius: 10px;
            padding: 0.7rem 2rem;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(5, 150, 105, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(5, 150, 105, 0.5);
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
            border-radius: 16px;
            padding: 1.5rem;
            margin-top: 2rem;
            backdrop-filter: blur(5px);
        }

        .helpdesk-title {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }

        .helpdesk-title i {
            margin-right: 0.5rem;
        }

        .helpdesk-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.75rem;
            font-size: 0.9rem;
        }

        .helpdesk-item i {
            margin-right: 0.5rem;
            width: 20px;
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
        @media (max-width: 767px) {
            .login-side-left {
                display: none !important;
            }

            .login-card .card-body {
                padding: 1.5rem 1.25rem;
            }

            .welcome-text {
                font-size: 2rem;
            }

            .login-card {
                max-width: 100%;
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
        <div class="row" style="min-height: 100vh;">
            <!-- Left Side - Welcome & Features -->
            <div class="col-lg-6 login-side-left d-none d-lg-flex order-lg-1">
                <div class="info-content d-flex flex-column justify-content-between" style="width: 100%;">
                    <div>
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
                    <div class="helpdesk-section">
                        <div class="helpdesk-title">
                            <i class="ti ti-headset"></i>
                            Butuh Bantuan?
                        </div>
                        <div class="row">
                            <div class="col-6">
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
                            <div class="col-6">
                                <div class="helpdesk-item">
                                    <i class="ti ti-map-pin"></i>
                                    <span style="font-size: 0.85rem;">Gedung PBNU II Lt. 2, Menteng, Jakarta Pusat</span>
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
                                <img src="{{ asset('assets/images/logos/logo.png') }}" width="150" alt="Sipinter Logo">
                            </a>
                        </div>

                        <h2 class="login-title">Masuk ke Akun Anda</h2>
                        <p class="login-subtitle">Kelola pendidikan Ma'arif NU dengan lebih mudah dan efisien</p>

                        @include('template.alert')

                        <form action="{{ route('login.proses') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" placeholder="Masukkan username Anda" autofocus>
                                <div class="invalid-feedback">
                                    @error('username') {{ $message }} @enderror
                                </div>
                            </div>

                            <div class="mb-3">
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

                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                    <label class="form-check-label" for="flexCheckChecked" style="font-size: 0.9rem; color: #4a5568;">
                                        Ingat Saya
                                    </label>
                                </div>
                                <a class="text-primary" href="{{ route('forgot') }}" style="font-size: 0.9rem; font-weight: 600; text-decoration: none;">Lupa Password?</a>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mb-4">
                                Masuk Sekarang
                            </button>

                            <div class="text-center">
                                <span style="color: #718096; font-size: 0.95rem;">Belum punya akun?</span>
                                <a class="text-primary ms-1" href="{{ route('ceknpsn') }}" style="font-weight: 600; text-decoration: none;">Daftar Sekarang</a>
                            </div>
                        </form>

                        <div class="mt-4 pt-4 border-top text-center">
                            <p style="font-size: 0.85rem; color: #a0aec0; margin: 0;">
                                <i class="ti ti-shield-lock" style="font-size: 1rem;"></i>
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
