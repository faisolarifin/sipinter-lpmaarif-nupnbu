@extends('template.general', [
    'title' => 'Sipinter - Ajukan NPSN Virtual'
])

@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-selectpicker.css') }}" />
    <style>

        body {
            background: linear-gradient(135deg, #059669 0%, #34d399 100%);
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow: hidden;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .virtual-container {
            height: 100vh;
            position: relative;
            overflow: hidden;
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
        .virtual-side-left {
            background: linear-gradient(135deg, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0.05) 100%);
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(255,255,255,0.2);
            color: #fff;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
            height: 100vh;
        }

        .virtual-side-left::before {
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
            font-size: 1.4rem;
            font-weight: 800;
            margin-bottom: 0.7rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
            line-height: 1.1;
        }

        .welcome-subtitle {
            font-size: 0.9rem;
            font-weight: 400;
            opacity: 0.95;
            margin-bottom: 1.5rem;
            line-height: 1.4;
        }

        .benefit-item {
            display: flex;
            align-items: start;
            margin-bottom: 0.7rem;
            padding: 0.6rem;
            background: rgba(255,255,255,0.1);
            border-radius: 12px;
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
        }

        .benefit-item:hover {
            background: rgba(255,255,255,0.18);
            transform: translateX(10px);
        }

        .benefit-icon {
            width: 32px;
            height: 32px;
            background: rgba(255,255,255,0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.7rem;
            flex-shrink: 0;
        }

        .benefit-icon i {
            font-size: 1rem;
        }

        .benefit-content h6 {
            font-weight: 600;
            margin-bottom: 0.3rem;
            font-size: .9rem;
        }

        .benefit-content p {
            font-size: 0.8rem;
            opacity: 0.9;
            margin: 0;
            line-height: 1.3;
        }

        /* Right Side - Form Card */
        .virtual-card-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 0.7rem;
            background: #ffffff;
            position: relative;
            height: 100vh;
            overflow: hidden;
        }

        .virtual-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            border: 1px solid #e5e7eb;
            max-width: 550px;
            width: 100%;
            animation: slideInRight 0.6s ease-out;
            margin: 0;
            height: 96vh;
            overflow: hidden;
            display: flex;
            flex-direction: column;
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

        .virtual-card .card-body {
            padding: 1.2rem 1.8rem;
            overflow-y: auto;
            flex: 1;
        }

        /* Custom Scrollbar */
        .virtual-card .card-body::-webkit-scrollbar {
            width: 6px;
        }

        .virtual-card .card-body::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .virtual-card .card-body::-webkit-scrollbar-thumb {
            background: #10b981;
            border-radius: 10px;
        }

        .virtual-card .card-body::-webkit-scrollbar-thumb:hover {
            background: #059669;
        }

        .logo-wrapper {
            text-align: center;
            margin-bottom: 0.7rem;
        }

        .logo-wrapper img {
            width: 120px !important;
        }

        .virtual-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2d3748;
            text-align: center;
            margin-bottom: 0.3rem;
        }

        .virtual-subtitle {
            text-align: center;
            color: #718096;
            font-size: 0.8rem;
            margin-bottom: 1rem;
            font-weight: 500;
            line-height: 1.4;
        }

        /* Info Box */
        .info-box {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            border-left: 4px solid #f59e0b;
            border-radius: 10px;
            padding: 0.7rem 1rem;
            margin-bottom: 1rem;
        }

        .info-box-title {
            font-weight: 700;
            color: #b45309;
            font-size: 0.8rem;
            margin-bottom: 0.3rem;
            display: flex;
            align-items: center;
        }

        .info-box-title i {
            margin-right: 0.4rem;
            font-size: 0.9rem;
        }

        .info-box-text {
            color: #92400e;
            font-size: 0.75rem;
            margin: 0;
            line-height: 1.4;
        }

        /* Form Styling */
        .form-label {
            font-weight: 600;
            color: #4a5568;
            font-size: 0.78rem;
            margin-bottom: 0.3rem;
        }

        .form-control, 
        .bootstrap-select .dropdown-toggle {
            font-size: 0.82rem !important;
            padding: 0.5rem 0.7rem !important;
            transition: all 0.3s ease !important;
        }

        .form-control:focus {
            border-color: #10b981 !important;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1) !important;
        }

        .bootstrap-select .dropdown-toggle:focus {
            outline: none !important;
            border-color: #10b981 !important;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1) !important;
        }

        .bootstrap-select .dropdown-menu li a {
            font-size: 0.82rem !important;
            padding: 0.4rem 0.8rem !important;
        }

        .bootstrap-select .dropdown-menu li a:hover {
            background: #f0fdf4 !important;
            color: #059669 !important;
        }

        .bootstrap-select .dropdown-menu li.selected a {
            background: #10b981 !important;
            color: #fff !important;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 60px;
        }

        .form-text-small {
            font-size: 0.7rem;
            color: #f59e0b;
            font-weight: 500;
            margin-top: 0.2rem;
            display: flex;
            align-items: start;
        }

        .form-text-small i {
            margin-right: 0.2rem;
            margin-top: 0.1rem;
            flex-shrink: 0;
        }

        .btn-primary {
            background: linear-gradient(135deg, #059669 0%, #10b981 100%);
            border: none;
            border-radius: 10px;
            padding: 0.65rem 1.5rem;
            font-weight: 600;
            font-size: 0.85rem;
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
            font-size: 0.75rem;
            font-weight: 500;
        }

        .action-links {
            background: #f7fafc;
            border-radius: 12px;
            padding: 0.7rem;
            text-align: center;
        }

        .action-links span {
            color: #4a5568;
            font-size: 0.8rem;
        }

        .action-links a {
            font-weight: 600;
            text-decoration: none;
            margin-left: 0.5rem;
        }

        /* Helpdesk Section */
        .helpdesk-section {
            background: rgba(255,255,255,0.1);
            border-radius: 16px;
            padding: 1rem;
            margin-top: 1rem;
            backdrop-filter: blur(5px);
        }

        .helpdesk-title {
            font-weight: 700;
            font-size: 0.9rem;
            margin-bottom: 0.7rem;
            display: flex;
            align-items: center;
        }

        .helpdesk-title i {
            margin-right: 0.4rem;
        }

        .helpdesk-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
            font-size: 0.75rem;
        }

        .helpdesk-item i {
            margin-right: 0.4rem;
            width: 16px;
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

        /* Form Spacing Optimization */
        .mb-3 {
            margin-bottom: 0.8rem !important;
        }

        .mb-4 {
            margin-bottom: 1rem !important;
        }

        .mt-4 {
            margin-top: 1rem !important;
        }

        .pt-4 {
            padding-top: 1rem !important;
        }

        .form-label i {
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .virtual-side-left {
                display: none !important;
            }

            .virtual-card .card-body {
                padding: 1rem 1.2rem;
            }

            .virtual-card {
                max-width: 100%;
                margin: 0.3rem 0;
            }

            .virtual-card-wrapper {
                padding: 0.5rem 0.5rem;
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
<div class="virtual-container">
    <!-- Animated Background Shapes -->
    <div class="bg-shape bg-shape-1"></div>
    <div class="bg-shape bg-shape-2"></div>
    <div class="bg-shape bg-shape-3"></div>

    <div class="container-fluid h-100">
        <div class="row h-100">
            <!-- Left Side - Welcome & Benefits -->
            <div class="col-lg-6 virtual-side-left d-none d-lg-flex order-lg-1">
                <div class="info-content d-flex flex-column justify-content-between" style="width: 100%;">
                    <div>
                        <h1 class="welcome-text mb-3">
                            NPSN Virtual untuk 
                            <span style="background: linear-gradient(120deg, #fff 0%, rgba(255,255,255,0.8) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Satuan Pendidikan Ma'arif</span>
                        </h1>

                        <p class="welcome-subtitle">
                            Solusi sementara bagi satuan pendidikan yang belum memiliki NPSN resmi dari Kemdikbud untuk tetap dapat mengakses layanan Sipinter
                        </p>

                        <div class="benefits-list">
                            <div class="benefit-item">
                                <div class="benefit-icon">
                                    <i class="ti ti-file-certificate"></i>
                                </div>
                                <div class="benefit-content">
                                    <h6>Identitas Sementara</h6>
                                    <p>Dapatkan nomor identifikasi virtual untuk satuan pendidikan Anda</p>
                                </div>
                            </div>

                            <div class="benefit-item">
                                <div class="benefit-icon">
                                    <i class="ti ti-clock"></i>
                                </div>
                                <div class="benefit-content">
                                    <h6>Proses Cepat</h6>
                                    <p>Verifikasi dilakukan dalam 1-3 hari kerja setelah pengajuan</p>
                                </div>
                            </div>

                            <div class="benefit-item">
                                <div class="benefit-icon">
                                    <i class="ti ti-apps"></i>
                                </div>
                                <div class="benefit-content">
                                    <h6>Akses Layanan</h6>
                                    <p>Manfaatkan berbagai fitur dan layanan Sipinter LP Ma'arif NU</p>
                                </div>
                            </div>

                            <div class="benefit-item">
                                <div class="benefit-icon">
                                    <i class="ti ti-shield-check"></i>
                                </div>
                                <div class="benefit-content">
                                    <h6>Data Tervalidasi</h6>
                                    <p>Informasi satuan pendidikan terverifikasi oleh tim LP Ma'arif NU</p>
                                </div>
                            </div>

                            <div class="benefit-item">
                                <div class="benefit-icon">
                                    <i class="ti ti-refresh"></i>
                                </div>
                                <div class="benefit-content">
                                    <h6>Upgrade ke NPSN Resmi</h6>
                                    <p>Dapat dikonversi ke NPSN resmi setelah terdaftar di Dapodik</p>
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

            <!-- Right Side - Registration Form -->
            <div class="col-lg-6 virtual-card-wrapper order-lg-2">
                <div class="virtual-card">
                    <div class="card-body">
                        <div class="logo-wrapper">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/images/logos/logo.png') }}" width="150" alt="Sipinter Logo">
                            </a>
                        </div>

                        <h2 class="virtual-title mb-3">Ajukan NPSN Virtual</h2>

                        <div class="info-box">
                            <div class="info-box-title">
                                <i class="ti ti-alert-circle"></i>
                                Perhatian Penting
                            </div>
                            <p class="info-box-text">
                                NPSN Virtual adalah identitas <strong>sementara</strong>. Kami sangat menyarankan untuk segera mendaftarkan satuan pendidikan Anda ke Dapodik Kemdikbud untuk mendapatkan NPSN resmi.
                            </p>
                        </div>

                        @include('template.alert')

                        <form action="{{ route('npsnvirtual.request') }}" method="post">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="nama_sekolah" class="form-label">
                                    <i class="ti ti-building-community me-1"></i>
                                    Nama Satuan Pendidikan
                                </label>
                                <input type="text" 
                                       class="form-control @error('nama_sekolah') is-invalid @enderror" 
                                       id="nama_sekolah" 
                                       name="nama_sekolah" 
                                       value="{{ old('nama_sekolah') }}" 
                                       placeholder="Contoh: MI Ma'arif NU Hidayatul Mubtadiin"
                                       autofocus>
                                <div class="invalid-feedback">
                                    @error('nama_sekolah') {{ $message }} @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    <i class="ti ti-mail me-1"></i>
                                    Email Aktif
                                </label>
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       placeholder="email@satpen.sch.id">
                                <small class="form-text-small">
                                    <i class="ti ti-info-circle"></i>
                                    <span>Pastikan email aktif untuk menerima notifikasi validasi pengajuan</span>
                                </small>
                                <div class="invalid-feedback">
                                    @error('email') {{ $message }} @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="nik_kepsek" class="form-label">
                                    <i class="ti ti-id me-1"></i>
                                    NIK Kepala Sekolah
                                </label>
                                <input type="text" 
                                       class="form-control @error('nik_kepsek') is-invalid @enderror" 
                                       id="nik_kepsek" 
                                       name="nik_kepsek" 
                                       value="{{ old('nik_kepsek') }}" 
                                       placeholder="16 digit NIK"
                                       maxlength="16">
                                <div class="invalid-feedback">
                                    @error('nik_kepsek') {{ $message }} @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="jenjang" class="form-label">
                                    <i class="ti ti-school me-1"></i>
                                    Jenjang Pendidikan
                                </label>
                                <select class="selectpicker @error('jenjang') is-invalid @enderror" 
                                        data-show-subtext="false" 
                                        data-live-search="true" 
                                        name="jenjang"
                                        title="Pilih jenjang pendidikan">
                                    @foreach($jenjang as $row)
                                        <option value="{{ $row->id_jenjang }}" {{ old('jenjang') == $row->id_jenjang ? 'selected' : '' }}>
                                            {{ $row->nm_jenjang }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    @error('jenjang') {{ $message }} @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="provinsi" class="form-label">
                                    <i class="ti ti-map-2 me-1"></i>
                                    Provinsi
                                </label>
                                <select class="selectpicker @error('provinsi') is-invalid @enderror" 
                                        data-show-subtext="false" 
                                        data-live-search="true" 
                                        name="provinsi"
                                        title="Pilih provinsi">
                                    @foreach($provinsi as $row)
                                        <option value="{{ $row->id_prov }}" {{ old('provinsi') == $row->id_prov ? 'selected' : '' }}>
                                            {{ $row->nm_prov }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    @error('provinsi') {{ $message }} @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="kabupaten" class="form-label">
                                    <i class="ti ti-map-pin me-1"></i>
                                    Kabupaten/Kota
                                </label>
                                <select class="selectpicker @error('kabupaten') is-invalid @enderror" 
                                        data-show-subtext="false" 
                                        data-live-search="true" 
                                        name="kabupaten"
                                        title="Pilih kabupaten/kota">
                                    @foreach($kabupaten as $row)
                                        <option value="{{ $row->id_kab }}" {{ old('kabupaten') == $row->id_kab ? 'selected' : '' }}>
                                            {{ $row->nama_kab }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    @error('kabupaten') {{ $message }} @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="alamat" class="form-label">
                                    <i class="ti ti-home me-1"></i>
                                    Alamat Lengkap
                                </label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                          id="alamat" 
                                          name="alamat" 
                                          rows="3" 
                                          placeholder="Masukkan alamat lengkap termasuk nama jalan, RT/RW, kelurahan, dan kecamatan">{{ old('alamat') }}</textarea>
                                <div class="invalid-feedback">
                                    @error('alamat') {{ $message }} @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mb-3">
                                <i class="ti ti-send me-2"></i>
                                Ajukan NPSN Virtual Sekarang
                            </button>
                        </form>

                        <div class="divider">
                            <span>Atau</span>
                        </div>

                        <div class="action-links">
                            <span>Sudah punya NPSN resmi?</span>
                            <a class="text-primary" href="{{ route('ceknpsn') }}">Verifikasi NPSN</a>
                        </div>

                        <div class="mt-3 pt-3 border-top text-center">
                            <p style="font-size: 0.75rem; color: #a0aec0; margin: 0;">
                                <i class="ti ti-lock-check" style="font-size: 0.9rem;"></i>
                                Data Anda aman dan akan diproses oleh tim LP Ma'arif NU PBNU
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        $("select[name='provinsi']").on("change", function() {
            $.ajax({
                url: "{{ route('api.kabupatenbyprov', ':param') }}".replace(':param', $(this).val()),
                type: "GET",
                dataType: 'json',
                success: function (res) {
                    let options = "";
                    $.each(res,function(key, value) {
                        options += `<option value="${value.id_kab}">${value.nama_kab}</option>`;
                    });
                    $("select[name='kabupaten']").html(options);
                    $('.selectpicker').selectpicker('refresh');
                }
            });
        });
    </script>
@endsection
