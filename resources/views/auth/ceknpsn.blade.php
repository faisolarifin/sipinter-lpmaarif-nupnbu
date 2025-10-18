@extends('template.general', [
    'title' => 'Sipinter - Cek NPSN'
])

@section('style')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');

        body {
            background: linear-gradient(135deg, #059669 0%, #34d399 100%);
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow-x: hidden;
        }

        .npsn-container {
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
        .npsn-side-left {
            background: linear-gradient(135deg, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0.05) 100%);
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(255,255,255,0.2);
            color: #fff;
            padding: 3rem;
            position: relative;
            overflow: hidden;
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

        .step-item {
            display: flex;
            align-items: start;
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: rgba(255,255,255,0.1);
            border-radius: 12px;
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
        }

        .step-item:hover {
            background: rgba(255,255,255,0.18);
            transform: translateX(10px);
        }

        .step-number {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.25);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            flex-shrink: 0;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .step-content h6 {
            font-weight: 600;
            margin-bottom: 0.3rem;
            font-size: 0.95rem;
        }

        .step-content p {
            font-size: 0.85rem;
            opacity: 0.9;
            margin: 0;
        }

        /* Right Side - NPSN Card */
        .npsn-card-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background: #ffffff;
            position: relative;
        }

        .npsn-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            border: 1px solid #e5e7eb;
            max-width: 450px;
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

        .npsn-card .card-body {
            padding: 2rem 2.5rem;
        }

        .logo-wrapper {
            text-align: center;
            margin-bottom: 1rem;
        }

        .npsn-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2d3748;
            text-align: center;
            margin-bottom: 0.4rem;
        }

        .npsn-subtitle {
            text-align: center;
            color: #718096;
            font-size: 0.88rem;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }

        /* Info Box */
        .info-box {
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            border-left: 4px solid #10b981;
            border-radius: 10px;
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
        }

        .info-box-title {
            font-weight: 700;
            color: #047857;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }

        .info-box-title i {
            margin-right: 0.5rem;
            font-size: 1.1rem;
        }

        .info-box-text {
            color: #065f46;
            font-size: 0.85rem;
            margin: 0;
            line-height: 1.5;
        }

        /* Form Styling */
        .form-label {
            font-weight: 600;
            color: #4a5568;
            font-size: 0.85rem;
            margin-bottom: 0.4rem;
        }

        .form-helper {
            font-size: 0.8rem;
            color: #718096;
            font-style: italic;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
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
            border-radius: 10px;
            padding: 0.8rem 2rem;
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
            margin: 1.5rem 0;
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
            font-size: 0.85rem;
            font-weight: 500;
        }

        .action-links {
            background: #f7fafc;
            border-radius: 12px;
            padding: 1rem;
        }

        .action-link-item {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .action-link-item:last-child {
            margin-bottom: 0;
        }

        .action-link-item span {
            color: #4a5568;
            font-size: 0.9rem;
        }

        .action-link-item a {
            font-weight: 600;
            text-decoration: none;
            margin-left: 0.5rem;
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
            .npsn-side-left {
                display: none !important;
            }

            .npsn-card .card-body {
                padding: 1.5rem 1.25rem;
            }

            .welcome-text {
                font-size: 2rem;
            }

            .npsn-card {
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

                        <h2 class="npsn-title">Verifikasi NPSN</h2>
                        <p class="npsn-subtitle">Sistem Administrasi Pendidikan Terpadu - Lembaga Pendidikan Ma'arif NU PBNU</p>

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
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
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

                            <button type="submit" class="btn btn-primary w-100 mb-3">
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

                        <div class="mt-4 pt-4 border-top text-center">
                            <p style="font-size: 0.85rem; color: #a0aec0; margin: 0;">
                                <i class="ti ti-shield-check" style="font-size: 1rem;"></i>
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
