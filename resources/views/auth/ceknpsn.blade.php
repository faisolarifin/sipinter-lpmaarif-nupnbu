@extends('template.general', [
    'title' => 'Sipinter - Cek NPSN'
])

@section('style')
    <style>
        body {
            background: linear-gradient(135deg, #059669 0%, #34d399 100%);
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow: hidden;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .npsn-container {
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
        .npsn-side-left {
            background: linear-gradient(135deg, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0.05) 100%);
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(255,255,255,0.2);
            color: #fff;
            padding: 2rem 2.5rem;
            position: relative;
            overflow: hidden;
            height: 100vh;
        }

        .npsn-side-left::before {
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

        .step-item {
            display: flex;
            align-items: start;
            margin-bottom: 1rem;
            padding: 0.75rem;
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
        }

        .step-item:hover {
            background: rgba(255,255,255,0.16);
            transform: translateX(8px);
        }

        .step-number {
            width: 35px;
            height: 35px;
            background: rgba(255,255,255,0.25);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.8rem;
            flex-shrink: 0;
            font-weight: 700;
            font-size: 0.95rem;
        }

        .step-content h6 {
            font-weight: 600;
            margin-bottom: 0.2rem;
            font-size: 0.85rem;
        }

        .step-content p {
            font-size: 0.75rem;
            opacity: 0.9;
            margin: 0;
            line-height: 1.3;
        }

        /* Right Side - NPSN Card */
        .npsn-card-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            background: #ffffff;
            position: relative;
            height: 100vh;
        }

        .npsn-card {
            background: #ffffff;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.08);
            border: 1px solid #e5e7eb;
            max-width: 420px;
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

        .npsn-card .card-body {
            padding: 1.5rem 2rem;
        }

        .logo-wrapper {
            text-align: center;
            margin-bottom: 0.8rem;
        }

        .npsn-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2d3748;
            text-align: center;
            margin-bottom: 0.3rem;
        }

        .npsn-subtitle {
            text-align: center;
            color: #718096;
            font-size: 0.8rem;
            margin-bottom: 1rem;
            font-weight: 500;
            line-height: 1.3;
        }

        /* Info Box */
        .info-box {
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            border-left: 4px solid #10b981;
            border-radius: 8px;
            padding: 0.8rem 1rem;
            margin-bottom: 1.2rem;
        }

        .info-box-title {
            font-weight: 700;
            color: #047857;
            font-size: 0.82rem;
            margin-bottom: 0.3rem;
            display: flex;
            align-items: center;
        }

        .info-box-title i {
            margin-right: 0.4rem;
            font-size: 0.95rem;
        }

        .info-box-text {
            color: #065f46;
            font-size: 0.78rem;
            margin: 0;
            line-height: 1.4;
        }

        /* Form Styling */
        .form-label {
            font-weight: 600;
            color: #4a5568;
            font-size: 0.8rem;
            margin-bottom: 0.3rem;
        }

        .form-helper {
            font-size: 0.75rem;
            color: #718096;
            font-style: italic;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            padding: 0.6rem 0.8rem;
            font-size: 0.88rem;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .form-control:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        .btn-primary {
            background: linear-gradient(135deg, #059669 0%, #10b981 100%);
            border: none;
            border-radius: 8px;
            padding: 0.65rem 1.5rem;
            font-weight: 600;
            font-size: 0.88rem;
            transition: all 0.3s ease;
            box-shadow: 0 3px 12px rgba(5, 150, 105, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 16px rgba(5, 150, 105, 0.5);
            background: linear-gradient(135deg, #047857 0%, #059669 100%);
        }

        .text-primary {
            color: #059669 !important;
        }

        .text-primary:hover {
            color: #047857 !important;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 1rem 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
        }

        .divider span {
            padding: 0 1rem;
            color: #a0aec0;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .action-links {
            background: #f7fafc;
            border-radius: 10px;
            padding: 0.8rem;
        }

        .action-link-item {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.3rem;
            margin-bottom: 0.3rem;
        }

        .action-link-item:last-child {
            margin-bottom: 0;
        }

        .action-link-item span {
            color: #4a5568;
            font-size: 0.82rem;
        }

        .action-link-item a {
            font-weight: 600;
            text-decoration: none;
            margin-left: 0.5rem;
            font-size: 0.82rem;
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
            .npsn-side-left {
                display: none !important;
            }
            
            .npsn-card-wrapper {
                height: 100vh;
                padding: 1rem;
            }

            .npsn-card {
                max-width: 100%;
                max-height: 100vh;
            }

            .npsn-card .card-body {
                padding: 1.2rem 1.5rem;
            }
        }

        @media (max-width: 767px) {
            .npsn-card .card-body {
                padding: 1rem 1.2rem;
            }

            .npsn-title {
                font-size: 1.2rem;
            }

            .npsn-subtitle {
                font-size: 0.78rem;
            }
        }

        @media (min-height: 900px) {
            .npsn-side-left {
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
            
            .step-item {
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
<div class="npsn-container">
    <!-- Animated Background Shapes -->
    <div class="bg-shape bg-shape-1"></div>
    <div class="bg-shape bg-shape-2"></div>
    <div class="bg-shape bg-shape-3"></div>

    <div class="container-fluid">
        <div class="row" style="min-height: 100vh;">
            <!-- Left Side - Welcome & Steps -->
            <div class="col-lg-6 npsn-side-left d-none d-lg-flex order-lg-1">
                <div class="info-content d-flex flex-column justify-content-between" style="width: 100%;">
                    <div>
                        <h1 class="welcome-text">
                            Verifikasi NPSN untuk<br>
                            <span style="background: linear-gradient(120deg, #fff 0%, rgba(255,255,255,0.8) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Bergabung Bersama Kami</span>
                        </h1>

                        <p class="welcome-subtitle">
                            Pastikan satuan pendidikan Anda terdaftar dan terverifikasi untuk mengakses seluruh layanan Sipinter LP Ma'arif NU
                        </p>

                        <div class="steps-list">
                            <div class="step-item">
                                <div class="step-number">
                                    1
                                </div>
                                <div class="step-content">
                                    <h6>Masukkan NPSN</h6>
                                    <p>Nomor Pokok Sekolah Nasional dari satuan pendidikan Anda</p>
                                </div>
                            </div>

                            <div class="step-item">
                                <div class="step-number">
                                    2
                                </div>
                                <div class="step-content">
                                    <h6>Verifikasi Data</h6>
                                    <p>Sistem akan memvalidasi NPSN dengan database Kemdikbud</p>
                                </div>
                            </div>

                            <div class="step-item">
                                <div class="step-number">
                                    3
                                </div>
                                <div class="step-content">
                                    <h6>Lengkapi Registrasi</h6>
                                    <p>Isi formulir pendaftaran dengan data yang valid dan akurat</p>
                                </div>
                            </div>

                            <div class="step-item">
                                <div class="step-number">
                                    4
                                </div>
                                <div class="step-content">
                                    <h6>Akses Portal</h6>
                                    <p>Nikmati berbagai layanan digital pendidikan Ma'arif NU</p>
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

            <!-- Right Side - NPSN Verification Form -->
            <div class="col-lg-6 npsn-card-wrapper order-lg-2">
                <div class="npsn-card">
                    <div class="card-body">
                        <div class="logo-wrapper">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/images/logos/logo.png') }}" width="150" alt="Sipinter Logo">
                            </a>
                        </div>

                        <h2 class="npsn-title mb-3">Verifikasi NPSN</h2>

                        <div class="info-box">
                            <div class="info-box-title">
                                <i class="ti ti-info-circle"></i>
                                Apa itu NPSN?
                            </div>
                            <p class="info-box-text">
                                NPSN (Nomor Pokok Sekolah Nasional) adalah kode pengenal unik yang diberikan oleh Kemdikbud untuk setiap satuan pendidikan di Indonesia. Pastikan NPSN Anda sudah terdaftar di Dapodik.
                            </p>
                        </div>

                        @include('template.alert')

                        <form action="{{ route('ceknpsn.proses') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label for="npsn" class="form-label mb-0">Nomor Pokok Sekolah Nasional (NPSN)</label>
                                    <small class="form-helper">8 digit angka</small>
                                </div>
                                <input type="text" 
                                       class="form-control @error('npsn') is-invalid @enderror" 
                                       id="npsn" 
                                       name="npsn" 
                                       value="{{ old('npsn') }}" 
                                       placeholder="Contoh: 12345678"
                                       maxlength="8"
                                       autofocus>
                                <div class="invalid-feedback">
                                    @error('npsn') {{ $message }} @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mb-2">
                                <i class="ti ti-search me-2"></i>
                                Verifikasi NPSN Sekarang
                            </button>
                        </form>

                        <div class="divider">
                            <span>Atau</span>
                        </div>

                        <div class="action-links">
                            <div class="action-link-item">
                                <span>Sudah punya akun?</span>
                                <a class="text-primary" href="{{ route('login') }}">Masuk Portal</a>
                            </div>
                            <div class="action-link-item">
                                <span>Belum punya NPSN?</span>
                                <a class="text-primary" href="{{ route('npsnvirtual') }}">Ajukan NPSN Virtual</a>
                            </div>
                        </div>

                        <div class="mt-3 pt-3 border-top text-center">
                            <p style="font-size: 0.8rem; color: #a0aec0; margin: 0;">
                                <i class="ti ti-shield-check" style="font-size: 0.9rem;"></i>
                                Verifikasi terintegrasi dengan database Dapodik Kemdikbud
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
