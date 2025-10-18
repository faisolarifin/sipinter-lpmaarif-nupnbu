@extends('template.general', [
    'title' => 'Sipinter - Register'
])

@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-selectpicker.css') }}" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');

        body {
            background: linear-gradient(135deg, #059669 0%, #34d399 100%);
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow-x: hidden;
            min-height: 100vh;
        }

        .register-container {
            min-height: 100vh;
            position: relative;
            padding: 2rem 0;
        }

        /* Animated Background Shapes */
        .bg-shape {
            position: fixed;
            border-radius: 50%;
            opacity: 0.1;
            animation: float 20s infinite ease-in-out;
            z-index: 1;
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

        .bg-shape-4 {
            width: 180px;
            height: 180px;
            background: #fff;
            top: 40%;
            right: 20%;
            animation-delay: 15s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) translateX(0) scale(1); }
            25% { transform: translateY(-30px) translateX(20px) scale(1.1); }
            50% { transform: translateY(-50px) translateX(-20px) scale(0.9); }
            75% { transform: translateY(-20px) translateX(30px) scale(1.05); }
        }

        /* Header Section */
        .register-header {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            z-index: 2;
        }

        .register-header .logo-img {
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .register-header .logo-img img {
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 12px;
        }

        .register-header h6 {
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
            margin: 0;
            font-weight: 700;
            font-size: 1.1rem;
            line-height: 1.4;
        }

        /* Main Card */
        .register-card {
            background: #fff;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
            overflow: hidden;
            position: relative;
            z-index: 2;
            border: none;
        }

        .register-card .card-body {
            padding: 2.5rem;
        }

        .register-card h5 {
            color: #059669;
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .register-card > .card-body > small {
            color: #6b7280;
            font-size: 0.95rem;
        }

        /* Progress Navigation */
        .card-header-navs {
            background: linear-gradient(135deg, #059669 0%, #10b981 100%);
            border: none;
            padding: 1rem 2.5rem;
        }

        .nav-pills {
            gap: 0.5rem;
        }

        .tab-pills {
            color: rgba(255, 255, 255, 0.7);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            padding: 0.75rem 1rem;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            cursor: pointer;
            text-align: center;
        }

        .tab-pills:hover {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            transform: translateY(-2px);
        }

        .tab-pills.active {
            background: #fff;
            color: #059669;
            border-color: #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        /* Form Styling */
        .form-label {
            color: #374151;
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .form-label.required::after {
            content: " *";
            color: #ef4444;
            font-weight: 700;
        }

        .form-control, .form-select {
            border: 2px solid #e5e7eb;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #f9fafb;
        }

        .form-control:focus, .form-select:focus {
            border-color: #059669;
            box-shadow: 0 0 0 4px rgba(5, 150, 105, 0.1);
            background: #fff;
        }

        .form-control.is-invalid {
            border-color: #ef4444;
        }

        .form-control:read-only {
            background: #f3f4f6;
            cursor: not-allowed;
        }

        /* Bootstrap Select Override */
        .bootstrap-select .btn {
            background: #f9fafb;
            color: #374151;
            font-size: 0.95rem;
        }

        .bootstrap-select .btn:focus {
            border-color: #059669 !important;
            box-shadow: 0 0 0 4px rgba(5, 150, 105, 0.1) !important;
            background: #fff !important;
            outline: none !important;
        }

        .bootstrap-select.show .btn {
            border-color: #059669 !important;
        }

        .bootstrap-select .dropdown-menu {
            border-radius: 12px;
            border: 2px solid #e5e7eb;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            margin-top: 0.5rem;
        }

        .bootstrap-select .dropdown-item {
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .bootstrap-select .dropdown-item:hover {
            background: #f0fdf4;
            color: #059669;
        }

        .bootstrap-select .dropdown-item.active {
            background: #059669;
            color: #fff;
        }

        /* Input Group (Password) */
        .input-group .form-control {
            border-right: none;
            background: #f9fafb;
        }

        .input-group .input-group-text {
            background: #f9fafb;
            border: 2px solid #e5e7eb;
            border-left: none;
            border-radius: 0 12px 12px 0;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .input-group .form-control:focus + .input-group-text {
            border-color: #059669;
            background: #fff;
        }

        .input-group .input-group-text:hover {
            color: #059669;
        }

        /* Section Headers */
        .card-body h5 {
            color: #059669;
            font-weight: 700;
            font-size: 1.3rem;
            margin-top: 1rem;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 3px solid #e5e7eb;
            position: relative;
        }

        .card-body h5::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #059669, #34d399);
            border-radius: 2px;
        }

        /* File Input */
        input[type="file"].form-control {
            padding: 0.6rem 1rem;
            cursor: pointer;
        }

        input[type="file"].form-control::file-selector-button {
            background: linear-gradient(135deg, #059669 0%, #10b981 100%);
            color: #fff;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            margin-right: 1rem;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        input[type="file"].form-control::file-selector-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(5, 150, 105, 0.3);
        }

        .text-primary {
            color: #059669 !important;
            font-weight: 500;
        }

        /* Footer Buttons */
        .card-footer {
            background: #f9fafb;
            border-top: 2px solid #e5e7eb;
            padding: 1.5rem 2.5rem;
        }

        .btn-green {
            background: linear-gradient(135deg, #059669 0%, #10b981 100%);
            color: #fff;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(5, 150, 105, 0.2);
        }

        .btn-green:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(5, 150, 105, 0.3);
            color: #fff;
        }

        .btn-green:active {
            transform: translateY(0);
        }

        .btn-green:disabled {
            background: #d1d5db;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        /* Alert Styling */
        .alert {
            border-radius: 12px;
            border: none;
            padding: 1rem 1.5rem;
            font-weight: 500;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
        }

        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        .alert-warning {
            background: #fef3c7;
            color: #92400e;
        }

        .alert-info {
            background: #dbeafe;
            color: #1e40af;
        }

        /* Invalid Feedback */
        .invalid-feedback {
            color: #ef4444;
            font-size: 0.85rem;
            margin-top: 0.5rem;
            font-weight: 500;
        }

        /* Footer Copyright */
        .register-footer {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1.5rem 2rem;
            margin-top: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            z-index: 2;
        }

        .register-footer p {
            color: #fff;
            margin: 0;
            text-align: center;
            font-weight: 500;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }

        /* Responsive Design */
        @media (max-width: 991px) {
            .register-header {
                padding: 1.5rem;
            }

            .register-header .logo-img {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }

            .register-header h6 {
                font-size: 0.95rem;
            }

            .register-card .card-body {
                padding: 1.5rem;
            }

            .card-header-navs {
                padding: 1rem 1.5rem;
            }

            .tab-pills {
                font-size: 0.75rem;
                padding: 0.6rem 0.75rem;
            }

            .card-footer {
                padding: 1rem 1.5rem;
            }

            .btn-green {
                padding: 0.65rem 1.5rem;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 576px) {
            .register-header .logo-img img {
                width: 150px;
            }

            .register-header h6 {
                font-size: 0.85rem;
            }

            .register-card h5 {
                font-size: 1.2rem;
            }

            .tab-pills {
                font-size: 0.7rem;
                padding: 0.5rem 0.5rem;
            }

            .card-body h5 {
                font-size: 1.1rem;
            }
        }

        /* Tab Animation */
        .tab {
            animation: slideInRight 0.4s ease;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
@endsection

@section('container')
    <!-- Animated Background Shapes -->
    <div class="bg-shape bg-shape-1"></div>
    <div class="bg-shape bg-shape-2"></div>
    <div class="bg-shape bg-shape-3"></div>
    <div class="bg-shape bg-shape-4"></div>

    <div class="register-container">
        <div class="container">
            <!-- Header Section -->
            <div class="register-header">
                <a href="{{ route('home') }}" class="logo-img">
                    <img src="{{ asset('assets/images/logos/logo.png') }}" width="210" alt="Logo">
                    <h6>Sistem Administrasi Pendidikan Terpadu<br>Lembaga Pendidikan Ma'arif NU PBNU</h6>
                </a>
            </div>

            <!-- Registration Form Card -->
            <form class="card register-card" action="{{ route('register.proses') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body pb-0">
                    <h5 class="fw-medium mb-0">Registrasi Satpen</h5>
                    <small>lengkapi kolom untuk registrasi satpen anda</small>
                    <div class="mt-3">
                        @include('template.alert')
                    </div>
                </div>
                <div class="card-header card-header-navs py-2">
                    <nav class="nav nav-pills nav-fill">
                        <a class="nav-link tab-pills" href="#">IDENTITAS SEKOLAH</a>
                        <a class="nav-link tab-pills" href="#">ALAMAT DETAIL</a>
                        <a class="nav-link tab-pills" href="#">KONTAK</a>
                        <a class="nav-link tab-pills" href="#">BERKAS PERMOHONAN</a>
                        <a class="nav-link tab-pills" href="#">AKUN PORTAL</a>
                    </nav>
                </div>
                <div class="card-body pb-3">
                    <div class="tab d-none">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label for="npsn" class="form-label required">NPSN</label>
                                    <input type="text" class="form-control  @error('npsn') is-invalid @enderror" id="npsn" name="npsn" value="{{ $cookieValue->npsn }}" readonly placeholder="Masukkan nama kecamatan" required readonly>
                                    <div class="invalid-feedback">
                                        @error('npsn') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label for="nm_satpen" class="form-label required">Nama Satpen</label>
                                    <input type="text" class="form-control  @error('nm_satpen') is-invalid @enderror" id="nm_satpen" name="nm_satpen" value="{{ $cookieValue->nama }}" placeholder="Masukkan nama satpen" required readonly>
                                    <div class="invalid-feedback">
                                        @error('nm_satpen') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label for="yayasan" class="form-label required">Yayasan</label>
                                    <select class="form-select  @error('yayasan') is-invalid @enderror" id="yayasan" name="yayasan">
                                        <option value="BHPNU">BHPNU</option>
                                        <option value="non bhpnu">Non BHPNU</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('yayasan') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label for="jenjang" class="form-label required">Jenjang Pendidikan</label>
                                    <select class="selectpicker @error('jenjang') is-invalid @enderror" data-show-subtext="false" data-live-search="true" name="jenjang">
                                        @foreach($jenjang as $row)
                                            <option value="{{ $row->id_jenjang }}"  {{ strtolower($row->nm_jenjang) == strtolower($cookieValue->bentuk_pendidikan) ? 'selected' : '' }}>{{ $row->nm_jenjang }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('jenjang') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-nm-yayasan" style="display:none;">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="nm_yayasan" class="form-label required">Nama Yayasan</label>
                                    <input type="text" class="form-control  @error('nm_yayasan') is-invalid @enderror" id="nm_yayasan" name="nm_yayasan" placeholder="Masukkan nama yayasan">
                                    <div class="invalid-feedback">
                                        @error('nm_yayasan') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label for="kepsek" class="form-label required">Kepala Sekolah</label>
                                    <input type="text" class="form-control  @error('kepsek') is-invalid @enderror" id="kepsek" name="kepsek" value="{{ old('kepsek') }}" placeholder="Masukkan nama kepala sekolah" required>
                                    <div class="invalid-feedback">
                                        @error('kepsek') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label for="thn_berdiri" class="form-label required">Tahun Berdiri</label>
                                    <input type="text" class="form-control  @error('thn_berdiri') is-invalid @enderror" id="thn_berdiri" name="thn_berdiri" value="{{ old('thn_berdiri') }}" placeholder="Masukkan tahun berdiri sekolah" required>
                                    <div class="invalid-feedback">
                                        @error('thn_berdiri') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label for="aset_tanah" class="form-label required">Aset Tanah</label>
                                    <select class="form-select  @error('aset_tanah') is-invalid @enderror" name="aset_tanah">
                                        <option value="jamiyah">Jamiyah</option>
                                        <option value="masyarakat nu">Masyarakat NU</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('aset_tanah') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label for="nm_pemilik" class="form-label required">Nama Pemilik</label>
                                    <input type="text" class="form-control  @error('nm_pemilik') is-invalid @enderror" id="nm_pemilik" name="nm_pemilik" value="{{ old('nm_pemilik') }}" placeholder="Masukkan nama pemilik tanah" required>
                                    <div class="invalid-feedback">
                                        @error('nm_pemilik') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab d-none">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-3 d-flex flex-column">
                                    <label for="propinsi" class="form-label required">Propinsi</label>
                                    <select class="selectpicker @error('propinsi') is-invalid @enderror" data-show-subtext="false" data-live-search="true" name="propinsi">
                                        @foreach($propinsi as $row)
                                            <option value="{{ $row->id_prov }}" {{ strtolower($row->nm_prov) == Strings::removeFirstWord($cookieValue->propinsiluar_negeri_ln) ? 'selected' : '' }}>{{ $row->nm_prov }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('propinsi') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label for="kabupaten" class="form-label required">Kabupaten</label>
                                    <select class="selectpicker @error('kabupaten') is-invalid @enderror" data-show-subtext="false" data-live-search="true" name="kabupaten" required>
                                        @foreach($kabupaten as $row)
                                            <option value="{{ $row->id_kab }}" {{ Strings::removeFirstWord($row->nama_kab) == Strings::removeFirstWord($cookieValue->kabkotanegara_ln) ? 'selected' : '' }}>{{ $row->nama_kab }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('kabupaten') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label for="cabang" class="form-label required">Cabang</label>
                                    <select class="selectpicker @error('cabang') is-invalid @enderror" data-show-subtext="false" data-live-search="true" name="cabang" required>
                                        @foreach($cabang as $row)
                                            <option value="{{ $row->id_pc }}" {{ Strings::removeFirstWord($row->nama_pc, 2) == Strings::removeFirstWord($cookieValue->kabkotanegara_ln) ? 'selected' : '' }}>{{ $row->nama_pc }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('cabang') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label for="kecamatan" class="form-label required">Kecamatan</label>
                                    <input type="text" class="form-control  @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" value="{{ $cookieValue->kecamatankota_ln }}" placeholder="Masukkan nama kecamatan" required>
                                    <div class="invalid-feedback">
                                        @error('kecamatan') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label for="kelurahan" class="form-label required">Kelurahan</label>
                                    <input type="text" class="form-control  @error('kelurahan') is-invalid @enderror" id="kelurahan" name="kelurahan" value="{{ $cookieValue->desakelurahan }}" placeholder="Masukkan nama kelurahan" required>
                                    <div class="invalid-feedback">
                                        @error('kelurahan') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label for="alamat" class="form-label required">Alamat</label>
                                    <input type="text" class="form-control  @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ $cookieValue->alamat }}" placeholder="Masukkan alamat sekolah" required>
                                    <div class="invalid-feedback">
                                        @error('alamat') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab d-none">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label required">Email</label>
                                    <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email masih aktif" required>
                                    <div class="invalid-feedback">
                                        @error('email') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label for="telp" class="form-label required">No. HP/WA</label>
                                    <input type="text" class="form-control  @error('telp') is-invalid @enderror" id="telp" name="telp" value="{{ old('telp') }}" placeholder="Masukkan nomor telepon sekolah" required>
                                    <div class="invalid-feedback">
                                        @error('telp') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="fax" class="form-label">Fax</label>
                                    <input type="text" class="form-control  @error('fax') is-invalid @enderror" id="fax" name="fax" value="{{ old('fax') }}" placeholder="Masukkan nomor FAX (jika ada)">
                                    <div class="invalid-feedback">
                                        @error('fax') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab d-none">
                        <h5 class="mb-3">Surat Permohonan</h5>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label for="no_srt_permohonan" class="form-label required">Nomor Surat</label>
                                    <input type="text" class="form-control  @error('no_srt_permohonan') is-invalid @enderror" id="no_srt_permohonan" name="no_srt_permohonan" value="{{ old('no_srt_permohonan') }}" placeholder="Masukkan nomor dari surat permohonan" required>
                                    <div class="invalid-feedback">
                                        @error('no_srt_permohonan') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label for="tgl_srt_permohonan" class="form-label required">Tanggal Surat</label>
                                    <input type="date" class="form-control  @error('tgl_srt_permohonan') is-invalid @enderror" id="tgl_srt_permohonan" name="tgl_srt_permohonan" value="{{ old('tgl_srt_permohonan') }}" required>
                                    <div class="invalid-feedback">
                                        @error('tgl_srt_permohonan') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="file_permohonan" class="form-label required">File Permohonan</label>
                                    <input type="file" class="form-control mb-1 @error('file_permohonan') is-invalid @enderror" id="file_permohonan" name="file_permohonan" value="{{ old('file_permohonan') }}" accept="application/pdf" required>
                                    <small class="text-primary">ukuran maksimum untuk dokumen pdf 1MB</small>
                                    <div class="invalid-feedback">
                                        @error('file_permohonan') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5 class="mt-2 mb-3">Surat Keterangan Cabang</h5>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label for="nm_rekom_pc" class="form-label required">Pemberi Keterangan</label>
                                    <select class="form-select  @error('nm_rekom_pc') is-invalid @enderror" id="nm_rekom_pc" name="nm_rekom_pc">
                                        <option value="LP Ma'arif NU PCNU">LP Ma'arif NU PCNU</option>
                                        <option value="PCNU">PCNU</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('nm_rekom_pc') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="cabang_rekom_pc" class="form-label required">Nama Cabang</label>
                                <select class="selectpicker @error('cabang_rekom_pc') is-invalid @enderror" data-show-subtext="false" data-live-search="true" name="cabang_rekom_pc" required>
                                    @foreach($cabang as $row)
                                        <option value="{{ $row->nama_pc }}" {{ Strings::removeFirstWord($row->nama_pc, 2) == Strings::removeFirstWord($cookieValue->kabkotanegara_ln) ? 'selected' : '' }}>{{ $row->nama_pc }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    @error('cabang_rekom_pc') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label for="no_srt_rekom_pc" class="form-label required">Nomor Surat</label>
                                    <input type="text" class="form-control  @error('no_srt_rekom_pc') is-invalid @enderror" id="no_srt_rekom_pc" name="no_srt_rekom_pc" value="{{ old('no_srt_rekom_pc') }}" placeholder="Masukkan nomor surat dari pengurus cabang" required>
                                    <div class="invalid-feedback">
                                        @error('no_srt_rekom_pc') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label for="tgl_srt_rekom_pc" class="form-label required">Tanggal Surat</label>
                                    <input type="date" class="form-control  @error('tgl_srt_rekom_pc') is-invalid @enderror" id="tgl_srt_rekom_pc" name="tgl_srt_rekom_pc" value="{{ old('tgl_srt_rekom_pc') }}" required>
                                    <div class="invalid-feedback">
                                        @error('tgl_srt_rekom_pc') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="file_rekom_pc" class="form-label required">File Keterangan PC</label>
                                    <input type="file" class="form-control mb-1 @error('file_rekom_pc') is-invalid @enderror" id="file_rekom_pc" name="file_rekom_pc" value="{{ old('file_rekom_pc') }}" accept="application/pdf" required>
                                    <small class="text-primary">ukuran maksimum untuk dokumen pdf 1MB</small>
                                    <div class="invalid-feedback">
                                        @error('file_rekom_pc') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5 class="mt-2 mb-3">Rekomendasi Wilayah</h5>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label for="nm_rekom_pw" class="form-label required">Pemberi Rekomendasi</label>
                                    <select class="form-select  @error('nm_rekom_pw') is-invalid @enderror" id="nm_rekom_pw" name="nm_rekom_pw">
                                        <option value="LP Ma'arif NU PWNU">LP Ma'arif NU PWNU</option>
                                        <option value="PWNU">PWNU</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('nm_rekom_pw') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="wilayah_rekom_pw" class="form-label required">Nama Wilayah</label>
                                <select class="selectpicker @error('wilayah_rekom_pw') is-invalid @enderror" data-show-subtext="false" data-live-search="true" name="wilayah_rekom_pw" required>
                                    @foreach($propinsi as $row)
                                        <option value="{{ $row->nm_prov }}" {{ strtolower($row->nm_prov) == Strings::removeFirstWord($cookieValue->propinsiluar_negeri_ln) ? 'selected' : '' }}>{{ $row->nm_prov }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    @error('wilayah_rekom_pw') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label for="no_srt_rekom_pw" class="form-label required">Nomor Surat</label>
                                    <input type="text" class="form-control  @error('no_srt_rekom_pw') is-invalid @enderror" id="no_srt_rekom_pw" name="no_srt_rekom_pw" value="{{ old('no_srt_rekom_pw') }}" placeholder="Masukkan nomor surat dari pengurus wilayah" required>
                                    <div class="invalid-feedback">
                                        @error('no_srt_rekom_pw') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label for="tgl_srt_rekom_pw" class="form-label required">Tanggal Surat</label>
                                    <input type="date" class="form-control  @error('tgl_srt_rekom_pw') is-invalid @enderror" id="tgl_srt_rekom_pw" name="tgl_srt_rekom_pw" value="{{ old('tgl_srt_rekom_pw') }}" required>
                                    <div class="invalid-feedback">
                                        @error('tgl_srt_rekom_pw') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="file_rekom_pw" class="form-label required">File Rekomendasi PW</label>
                                    <input type="file" class="form-control mb-1  @error('file_rekom_pw') is-invalid @enderror" id="file_rekom_pw" name="file_rekom_pw" value="{{ old('file_rekom_pw') }}" accept="application/pdf" required>
                                    <small class="text-primary">ukuran maksimum untuk dokumen pdf 1MB</small>
                                    <div class="invalid-feedback">
                                        @error('file_rekom_pw') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab d-none">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label required">Password Akun</label>
                                    <div class="input-group form-password">
                                        <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan password akun" required>
                                        <span class="input-group-text password-toggle">
                                       <i class="ti ti-eye-off"></i>
                                    </span>
                                        <div class="invalid-feedback">
                                            @error('password') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-3">
                                    <label for="passconfirm" class="form-label required">Konfirmasi Password</label>
                                    <div class="input-group form-password">
                                        <input type="password" class="form-control  @error('passconfirm') is-invalid @enderror" id="passconfirm" name="passconfirm" placeholder="Konfirmasi password akun" required>
                                        <span class="input-group-text password-toggle">
                                       <i class="ti ti-eye-off"></i>
                                    </span>
                                        <div class="invalid-feedback">
                                            @error('passconfirm') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <small>Keterangan : (<span class="required"></span>) wajib diisi</small>

                </div>
                <div class="card-footer text-end">
                    <div class="d-flex">
                        <button type="button" id="back_button" class="btn btn-green" onclick="back()">Sebelumnya</button>
                        <button type="button" id="next_button" class="btn btn-green ms-auto" onclick="next()">Berikutnya</button>
                        <button type="submit" id="submit_button" class="btn btn-green ms-auto d-none">Daftar</button>
                    </div>
                </div>
            </form>

            <!-- Footer Copyright -->
            <div class="register-footer">
                <p>Copyright &copy; {{ date('Y') }} Sistem Administrasi Pendidikan Terpadu LP Ma'arif NU PBNU</p>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        $("#yayasan").on('change', function(e) {
            if ($(this).val().toLowerCase() !== "bhpnu") {
                $(".row-nm-yayasan").slideDown()
            } else {
                $(".row-nm-yayasan").slideUp();
            }
        });

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

        //Steap Form
        let current = 0;
        let tabs = $(".tab");
        let tabs_pill = $(".tab-pills");

        loadFormData(current);

        function loadFormData(n) {
            $(tabs_pill[n]).addClass("active");
            $(tabs[n]).removeClass("d-none");
            $("#back_button").attr("disabled", n == 0 ? true : false);
            if (n == tabs.length -1) {
                $("#next_button").hide();
                $("#submit_button").removeClass("d-none");
            } else {
                $("#next_button").show();
                $("#submit_button").addClass("d-none");
            }
        }

        function next() {
            inputsValid = validateInputs($(tabs[current]));

            if (inputsValid) {

                $(tabs[current]).addClass("d-none");
                $(tabs_pill[current]).removeClass("active");

                current++;
                loadFormData(current);
            }
        }

        function back() {
            $(tabs[current]).addClass("d-none");
            $(tabs_pill[current]).removeClass("active");

            current--;
            loadFormData(current);
        }

        tabs_pill.on('click', function() {
            inputsValid = validateInputs($(tabs[current]));

            if (inputsValid) {
                $(tabs[current]).addClass("d-none");
                $(tabs_pill[current]).removeClass("active");

                current = $(this).index();
                loadFormData(current);
            }
        })

        function validateInputs(ths) {
            let inputsValid = true;

            const inputs = ths.find("input");
            inputs.each(function(index, input) {
                const valid = input.checkValidity();
                if (!valid) {
                    inputsValid = false;
                    input.classList.add("is-invalid");
                } else {
                    input.classList.remove("is-invalid");
                }
            });
            return inputsValid;
        }

        $("select[name='propinsi']").on('change', function() {

            const provId = $(this).val();

            $.ajax({
                url: "{{ route('api.kabupatenbyprov', ['provId' => ':param']) }}".replace(':param', provId),
                type: "GET",
                dataType: 'json',
                success: function(res) {

                    let $select = $("select[name='kabupaten']");
                    $select.empty();
                    $.each(res,function(key, value) {
                        $select.append('<option value=' + value.id_kab + '>' + value.nama_kab + '</option>');
                    });

                    $('.selectpicker').selectpicker('refresh');
                }
            })

            $.ajax({
                url: "{{ route('api.pcbyprov', ['provId' => ':param']) }}".replace(':param', provId),
                type: "GET",
                dataType: 'json',
                success: function(res) {

                    let $select = $("select[name='cabang']");
                    let $selectPc = $("select[name='cabang_rekom_pc']");
                    $select.empty();
                    $selectPc.empty();
                    $.each(res,function(key, value) {
                        $select.append('<option value=' + value.id_pc + '>' + value.nama_pc + '</option>');
                        $selectPc.append('<option value=' + value.id_pc + '>' + value.nama_pc + '</option>');
                    });

                    $('.selectpicker').selectpicker('refresh');
                }
            });

        });

    </script>
@endsection
