@extends('template.general', [
    'title' => 'Sipinter - Registrasi Berhasil'
])

@section('style')
    <style>

        body {
            background: linear-gradient(135deg, #059669 0%, #34d399 100%);
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            padding: 0;
        }

        .success-container {
            height: 100vh;
            position: relative;
        }

        /* Animated Background Shapes */
        .bg-shape {
            position: fixed;
            border-radius: 50%;
            opacity: 0.08;
            animation: float 25s infinite ease-in-out;
            z-index: 1;
        }

        .bg-shape-1 {
            width: 300px;
            height: 300px;
            background: #fff;
            top: 8%;
            left: 5%;
            animation-delay: 0s;
        }

        .bg-shape-2 {
            width: 200px;
            height: 200px;
            background: #fff;
            bottom: 12%;
            right: 8%;
            animation-delay: 8s;
        }

        .bg-shape-3 {
            width: 150px;
            height: 150px;
            background: #fff;
            top: 60%;
            left: 10%;
            animation-delay: 16s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) translateX(0) scale(1); }
            25% { transform: translateY(-40px) translateX(30px) scale(1.1); }
            50% { transform: translateY(-60px) translateX(-30px) scale(0.9); }
            75% { transform: translateY(-30px) translateX(40px) scale(1.05); }
        }

        /* Header Section */
        .success-header {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            z-index: 2;
            animation: slideInDown 0.8s ease-out;
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .success-header .logo-wrapper {
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1.5rem;
            flex-direction: column;
        }

        .success-header .logo-wrapper img {
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 15px;
            padding: 1rem;
            animation: logoFloat 3s ease-in-out infinite;
        }

        @keyframes logoFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .success-header h6 {
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
            margin: 0;
            font-weight: 700;
            font-size: 1.1rem;
            line-height: 1.4;
            text-align: center;
            max-width: 600px;
        }

        /* Success Card */
        .success-card {
            background: #fff;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
            position: relative;
            z-index: 2;
            border: none;
            animation: slideInUp 1s ease-out 0.3s both;
            max-width: 600px;
            margin: 0 auto;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .success-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #059669, #10b981, #34d399, #6ee7b7);
            animation: gradientShift 3s ease-in-out infinite;
        }

        @keyframes gradientShift {
            0%, 100% { transform: translateX(-100%); }
            50% { transform: translateX(100%); }
        }

        .success-card .card-body {
            padding: 3rem 2.5rem;
            text-align: center;
            position: relative;
        }

        /* Success Icon */
        .success-icon {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem auto;
            position: relative;
            animation: successPulse 2s ease-in-out infinite;
        }

        @keyframes successPulse {
            0%, 100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
            50% { transform: scale(1.05); box-shadow: 0 0 0 20px rgba(16, 185, 129, 0); }
        }

        .success-icon::before {
            content: '';
            position: absolute;
            width: 140px;
            height: 140px;
            border: 3px solid rgba(16, 185, 129, 0.3);
            border-radius: 50%;
            animation: rotate 10s linear infinite;
        }

        .success-icon::after {
            content: '';
            position: absolute;
            width: 160px;
            height: 160px;
            border: 2px solid rgba(16, 185, 129, 0.2);
            border-radius: 50%;
            animation: rotate 15s linear infinite reverse;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .success-icon i {
            font-size: 3.5rem;
            color: #fff;
            z-index: 3;
            position: relative;
            animation: checkmark 1s ease-in-out 0.5s both;
        }

        @keyframes checkmark {
            0% { transform: scale(0) rotate(45deg); }
            50% { transform: scale(1.2) rotate(45deg); }
            100% { transform: scale(1) rotate(0deg); }
        }

        /* Typography */
        .success-title {
            font-size: 2.2rem;
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 1rem;
            animation: fadeInUp 1s ease-out 0.6s both;
        }

        .success-subtitle {
            font-size: 1.1rem;
            color: #6b7280;
            margin-bottom: 2rem;
            font-weight: 500;
            animation: fadeInUp 1s ease-out 0.8s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Registration Number Display */
        .reg-number-container {
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            border: 2px solid #10b981;
            border-radius: 16px;
            padding: 2rem;
            margin: 2rem 0;
            position: relative;
            animation: fadeInUp 1s ease-out 1s both;
            overflow: hidden;
        }

        .reg-number-container::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #10b981, #059669, #34d399, #6ee7b7);
            border-radius: 18px;
            z-index: -1;
            animation: borderGlow 3s ease-in-out infinite;
        }

        @keyframes borderGlow {
            0%, 100% { opacity: 0.7; }
            50% { opacity: 1; }
        }

        .reg-number-label {
            font-size: 0.95rem;
            color: #059669;
            font-weight: 600;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .reg-number {
            font-size: 2.8rem;
            font-weight: 800;
            color: #059669;
            font-family: 'Courier New', monospace;
            letter-spacing: 3px;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(5, 150, 105, 0.2);
        }

        /* Instructions */
        .instructions {
            background: #f8fafc;
            border-radius: 16px;
            padding: 1.5rem;
            margin: 2rem 0;
            text-align: left;
            animation: fadeInUp 1s ease-out 1.2s both;
        }

        .instructions-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #374151;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }

        .instructions-title i {
            margin-right: 0.5rem;
            color: #10b981;
        }

        .instruction-item {
            display: flex;
            align-items: start;
            margin-bottom: 0.8rem;
            font-size: 0.9rem;
            color: #4b5563;
            line-height: 1.6;
        }

        .instruction-item i {
            color: #10b981;
            margin-right: 0.7rem;
            margin-top: 0.2rem;
            flex-shrink: 0;
        }

        /* Action Buttons */
        .action-buttons {
            margin-top: 2rem;
            animation: fadeInUp 1s ease-out 1.4s both;
        }

        .btn-primary {
            background: linear-gradient(135deg, #059669 0%, #10b981 100%);
            border: none;
            border-radius: 12px;
            padding: 1rem 2.5rem;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(5, 150, 105, 0.4);
            margin-right: 1rem;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(5, 150, 105, 0.5);
            background: linear-gradient(135deg, #047857 0%, #059669 100%);
        }

        .btn-outline-primary {
            color: #059669;
            border: 2px solid #059669;
            border-radius: 12px;
            padding: 1rem 2.5rem;
            font-weight: 600;
            font-size: 1rem;
            background: transparent;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background: #059669;
            border-color: #059669;
            color: #fff;
            transform: translateY(-3px);
        }

        /* Footer */
        .success-footer {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1rem 2rem;
            margin-top: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            z-index: 2;
            animation: fadeInUp 1s ease-out 1.6s both;
        }

        .success-footer p {
            color: #fff;
            margin: 0;
            text-align: center;
            font-weight: 500;
            font-size: 0.9rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }

        /* Floating Elements */
        .floating-element {
            position: absolute;
            animation: floatingElement 6s ease-in-out infinite;
        }

        .floating-element-1 {
            top: 20%;
            right: 10%;
            animation-delay: 0s;
        }

        .floating-element-2 {
            bottom: 30%;
            left: 5%;
            animation-delay: 2s;
        }

        .floating-element-3 {
            top: 70%;
            right: 15%;
            animation-delay: 4s;
        }

        @keyframes floatingElement {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .floating-element i {
            font-size: 2rem;
            color: rgba(255, 255, 255, 0.1);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .success-header {
                padding: 1rem;
                margin-bottom: 1.5rem;
            }

            .success-header h6 {
                font-size: 0.9rem;
            }

            .success-card .card-body {
                padding: 2rem 1.5rem;
            }

            .success-title {
                font-size: 1.8rem;
            }

            .success-subtitle {
                font-size: 1rem;
            }

            .reg-number {
                font-size: 2.2rem;
                letter-spacing: 2px;
            }

            .btn-primary,
            .btn-outline-primary {
                padding: 0.8rem 1.8rem;
                font-size: 0.9rem;
                margin-bottom: 0.5rem;
                margin-right: 0.5rem;
            }
        }

        /* Copy animation */
        .copy-feedback {
            position: absolute;
            top: -40px;
            left: 50%;
            transform: translateX(-50%);
            background: #059669;
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.8rem;
            opacity: 0;
            animation: copyFeedback 2s ease-in-out;
        }

        @keyframes copyFeedback {
            0% { opacity: 0; transform: translateX(-50%) translateY(10px); }
            20%, 80% { opacity: 1; transform: translateX(-50%) translateY(0); }
            100% { opacity: 0; transform: translateX(-50%) translateY(-10px); }
        }
    </style>
@endsection

@section('container')
<!-- Animated Background Shapes -->
<div class="bg-shape bg-shape-1"></div>
<div class="bg-shape bg-shape-2"></div>
<div class="bg-shape bg-shape-3"></div>

<!-- Floating Elements -->
<div class="floating-element floating-element-1">
    <i class="ti ti-certificate"></i>
</div>
<div class="floating-element floating-element-2">
    <i class="ti ti-shield-check"></i>
</div>
<div class="floating-element floating-element-3">
    <i class="ti ti-mail"></i>
</div>

<div class="success-container">
    <div class="container">
        <!-- Header Section -->
        <div class="row justify-content-center pt-4">
            <div class="col-lg-8">
                <div class="success-header">
                    <a href="{{ route('home') }}" class="logo-wrapper">
                        <img src="{{ asset('assets/images/logos/logo.png') }}" width="180" alt="Sipinter Logo">
                        <h6>Sistem Administrasi Pendidikan Terpadu<br>Lembaga Pendidikan Ma'arif NU PBNU</h6>
                    </a>
                </div>
            </div>
        </div>

        <!-- Success Card -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="success-card">
                    <div class="card-body">
                        <!-- Success Icon -->
                        <div class="success-icon">
                            <i class="ti ti-check"></i>
                        </div>

                        <!-- Success Message -->
                        <h1 class="success-title">🎉 Registrasi Berhasil!</h1>
                        <p class="success-subtitle">
                            Selamat! Pendaftaran satuan pendidikan Anda telah berhasil diproses.<br>
                            Simpan nomor registrasi berikut dengan baik untuk akses ke portal Sipinter.
                        </p>

                        <!-- Registration Number Display -->
                        <div class="reg-number-container" onclick="copyRegNumber()">
                            <div class="reg-number-label">
                                <i class="ti ti-id-badge-2"></i>
                                Nomor Registrasi Anda
                            </div>
                            <h2 class="reg-number" id="regNumber">{{ Session::get('regNumber') }}</h2>
                            <small style="color: #059669; font-weight: 600;">
                                <i class="ti ti-copy"></i> Klik untuk menyalin nomor
                            </small>
                        </div>

                        <!-- Instructions -->
                        <div class="instructions">
                            <div class="instructions-title">
                                <i class="ti ti-list-check"></i>
                                Langkah Selanjutnya
                            </div>
                            <div class="instruction-item">
                                <i class="ti ti-number-1"></i>
                                <span><strong>Simpan Nomor Registrasi</strong> - Catat dan simpan nomor registrasi di tempat yang aman. Nomor ini akan menjadi username untuk login ke portal.</span>
                            </div>
                            <div class="instruction-item">
                                <i class="ti ti-number-2"></i>
                                <span><strong>Cek Email Anda</strong> - Konfirmasi registrasi dan nomor registrasi telah dikirim ke alamat email yang Anda daftarkan.</span>
                            </div>
                            <div class="instruction-item">
                                <i class="ti ti-number-3"></i>
                                <span><strong>Menunggu Verifikasi</strong> - Tim LP Ma'arif NU akan memverifikasi data Anda dalam 1-3 hari kerja.</span>
                            </div>
                            <div class="instruction-item">
                                <i class="ti ti-number-4"></i>
                                <span><strong>Login ke Portal</strong> - Setelah verifikasi selesai, gunakan nomor registrasi dan password yang Anda buat untuk mengakses portal.</span>
                            </div>
                        </div>

                        <!-- Important Notice -->
                        <div style="background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%); border-left: 4px solid #f59e0b; border-radius: 12px; padding: 1rem; margin: 1.5rem 0; text-align: left;">
                            <div style="font-weight: 700; color: #b45309; font-size: 0.9rem; margin-bottom: 0.5rem; display: flex; align-items: center;">
                                <i class="ti ti-alert-triangle" style="margin-right: 0.5rem;"></i>
                                Penting untuk Diingat
                            </div>
                            <p style="color: #92400e; font-size: 0.85rem; margin: 0; line-height: 1.5;">
                                Jangan berikan nomor registrasi kepada orang lain. Nomor ini bersifat rahasia dan menjadi kunci akses ke akun Anda. Jika lupa, hubungi tim support kami untuk bantuan pemulihan akun.
                            </p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="action-buttons">
                            <a href="{{ route('login') }}" class="btn btn-primary">
                                <i class="ti ti-login me-2"></i>
                                Login Sekarang
                            </a>
                            <a href="{{ route('home') }}" class="btn btn-outline-primary">
                                <i class="ti ti-home me-2"></i>
                                Beranda
                            </a>
                        </div>

                        <!-- Contact Support -->
                        <div style="margin-top: 2rem; padding-top: 2rem; border-top: 2px solid #e5e7eb; text-align: center;">
                            <p style="font-size: 0.9rem; color: #6b7280; margin-bottom: 0.5rem;">
                                <i class="ti ti-headset" style="font-size: 1.1rem; color: #10b981;"></i>
                                <strong>Butuh Bantuan?</strong>
                            </p>
                            <p style="font-size: 0.85rem; color: #9ca3af; margin: 0;">
                                Hubungi tim support kami di <strong style="color: #059669;">bhp.maarifnu@gmail.com</strong> 
                                atau <strong style="color: #059669;">021-3904115</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="success-footer">
                    <p>Copyright &copy; {{ date('Y') }} Sistem Administrasi Pendidikan Terpadu LP Ma'arif NU PBNU</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Copy registration number to clipboard
    function copyRegNumber() {
        const regNumber = document.getElementById('regNumber').textContent;
        const regNumberContainer = document.querySelector('.reg-number-container');
        
        navigator.clipboard.writeText(regNumber).then(function() {
            // Show copy feedback
            const feedback = document.createElement('div');
            feedback.className = 'copy-feedback';
            feedback.textContent = 'Nomor berhasil disalin!';
            regNumberContainer.style.position = 'relative';
            regNumberContainer.appendChild(feedback);
            
            // Remove feedback after animation
            setTimeout(() => {
                if (feedback.parentNode) {
                    feedback.parentNode.removeChild(feedback);
                }
            }, 2000);
            
            // Add success animation to container
            regNumberContainer.style.transform = 'scale(1.02)';
            regNumberContainer.style.boxShadow = '0 8px 30px rgba(16, 185, 129, 0.3)';
            
            setTimeout(() => {
                regNumberContainer.style.transform = 'scale(1)';
                regNumberContainer.style.boxShadow = '';
            }, 200);
        }).catch(function(err) {
            console.error('Gagal menyalin nomor: ', err);
        });
    }

    // Add hover effect to registration number container
    document.addEventListener('DOMContentLoaded', function() {
        const regContainer = document.querySelector('.reg-number-container');
        
        regContainer.addEventListener('mouseenter', function() {
            this.style.cursor = 'pointer';
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 12px 35px rgba(16, 185, 129, 0.2)';
        });
        
        regContainer.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '';
        });

        // Add celebration effect on page load
        setTimeout(() => {
            createConfetti();
        }, 1000);
    });

    // Simple confetti effect
    function createConfetti() {
        const colors = ['#10b981', '#34d399', '#6ee7b7', '#a7f3d0'];
        const confettiCount = 50;
        
        for (let i = 0; i < confettiCount; i++) {
            const confetti = document.createElement('div');
            confetti.style.position = 'fixed';
            confetti.style.width = '8px';
            confetti.style.height = '8px';
            confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
            confetti.style.left = Math.random() * 100 + 'vw';
            confetti.style.top = '-10px';
            confetti.style.borderRadius = '50%';
            confetti.style.pointerEvents = 'none';
            confetti.style.zIndex = '9999';
            confetti.style.animation = `confettiFall ${Math.random() * 3 + 2}s linear forwards`;
            
            document.body.appendChild(confetti);
            
            // Remove confetti after animation
            setTimeout(() => {
                if (confetti.parentNode) {
                    confetti.parentNode.removeChild(confetti);
                }
            }, 5000);
        }
    }

    // Add confetti animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes confettiFall {
            0% {
                transform: translateY(-10px) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(720deg);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);

    // Auto-scroll to success card
    setTimeout(() => {
        document.querySelector('.success-card').scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });
    }, 500);
</script>
@endsection
