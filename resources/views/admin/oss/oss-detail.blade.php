@extends('template.layout', [
    'title' => 'Sipinter - Detail Permohonan OSS',
])

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/timeline.css') }}" />
    <style>
        /* Modern Detail View Styling */
        .detail-header {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
            margin-bottom: 24px;
            overflow: hidden;
        }

        .detail-header-content {
            padding: 32px;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-bottom: 1px solid rgba(0, 0, 0, 0.06);
        }

        .detail-header h5 {
            color: #1e293b;
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 8px;
        }

        .detail-header small {
            color: #64748b;
            font-size: 1rem;
            font-weight: 500;
        }

        .detail-back-btn {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .detail-back-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
            color: white;
        }

        /* Modern Data Section */
        .data-section {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
            overflow: hidden;
            margin-bottom: 24px;
        }

        .section-header {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 20px 32px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.06);
        }

        .section-header h6 {
            color: #1e293b;
            font-weight: 700;
            font-size: 1.1rem;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-icon {
            width: 24px;
            height: 24px;
            background: linear-gradient(135deg, #ffc107 0%, #ffb300 100%);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            color: #212529;
        }

        .data-table {
            margin: 0;
            width: 100%;
        }

        .data-table tbody tr {
            border-bottom: 1px solid rgba(0, 0, 0, 0.04);
            transition: all 0.2s ease;
        }

        .data-table tbody tr:hover {
            background: linear-gradient(135deg, #f8fafc 0%, #f9fafb 100%);
        }

        .data-table tbody td {
            padding: 16px 32px;
            border: none;
            vertical-align: top;
        }

        .data-table tbody td:first-child {
            font-weight: 600;
            color: #374151;
            width: 40%;
        }

        .data-table tbody td:nth-child(2) {
            width: 20px;
            text-align: center;
            color: #6b7280;
        }

        .data-table tbody td:last-child {
            color: #111827;
            font-weight: 500;
        }

        /* File Button Styling */
        .file-btn {
            background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 8px 16px;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .file-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(107, 114, 128, 0.3);
            color: white;
        }

        /* Timeline Modern Styling */
        .timeline-section {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
            height: fit-content;
            position: sticky;
            top: 20px;
        }

        .timeline-header {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 20px 24px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.06);
            border-radius: 16px 16px 0 0;
        }

        .timeline-header h6 {
            color: #1e293b;
            font-weight: 700;
            font-size: 1.1rem;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .timeline-content {
            padding: 24px;
            max-height: 600px;
            overflow-y: auto;
        }

        .modern-timeline {
            list-style: none;
            padding: 0;
            margin: 0;
            position: relative;
        }

        .modern-timeline::before {
            content: '';
            position: absolute;
            left: 10px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(180deg, #ffc107 0%, #ffb300 100%);
        }

        .modern-timeline li {
            position: relative;
            padding-left: 40px;
            margin-bottom: 24px;
        }

        .modern-timeline li::before {
            content: '';
            position: absolute;
            left: 6px;
            top: 4px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ffc107 0%, #ffb300 100%);
            border: 2px solid #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .timeline-item {
            background: linear-gradient(135deg, #f8fafc 0%, #f9fafb 100%);
            border-radius: 12px;
            padding: 16px;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .timeline-status {
            font-weight: 700;
            color: #1e293b;
            font-size: 0.95rem;
            text-transform: capitalize;
            margin-bottom: 4px;
        }

        .timeline-date {
            color: #6b7280;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .timeline-note {
            color: #374151;
            font-size: 0.875rem;
            line-height: 1.5;
            margin-bottom: 8px;
        }

        .timeline-links {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .timeline-link {
            color: #3b82f6;
            font-size: 0.75rem;
            text-decoration: none;
            font-weight: 500;
        }

        .timeline-link:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .detail-header-content {
                padding: 20px;
            }

            .data-table tbody td {
                padding: 12px 20px;
            }

            .data-table tbody td:first-child {
                width: 35%;
                font-size: 0.875rem;
            }

            .timeline-content {
                padding: 16px;
                max-height: 400px;
            }

            .timeline-section {
                position: static;
                margin-top: 24px;
            }
        }

        /* Data Categories */
        .category-basic {
            border-left: 4px solid #3b82f6;
        }

        .category-land {
            border-left: 4px solid #10b981;
        }

        .category-building {
            border-left: 4px solid #f59e0b;
        }

        .category-investment {
            border-left: 4px solid #8b5cf6;
        }

        .category-environment {
            border-left: 4px solid #06b6d4;
        }

        .category-location {
            border-left: 4px solid #ef4444;
        }

        /* Action Buttons Section */
        .action-buttons-section {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
            margin-top: 24px;
            overflow: hidden;
            position: static;
            /* Not sticky like timeline */
        }

        .action-buttons-header {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 20px 24px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.06);
        }

        .action-buttons-header h6 {
            color: #1e293b;
            font-weight: 700;
            font-size: 1.1rem;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .action-buttons-content {
            padding: 24px;
            padding-top: 5px;
        }

        .action-btn-large {
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            min-width: 130px;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .action-btn-approve {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            box-shadow: 0 3px 12px rgba(16, 185, 129, 0.25);
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .action-btn-approve::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
            transition: left 0.5s;
        }

        .action-btn-approve:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.35);
            color: white;
        }

        .action-btn-approve:hover::before {
            left: 100%;
        }

        .action-btn-issue {
            background: linear-gradient(135deg, #ffc107 0%, #ffb300 100%);
            color: #212529;
            box-shadow: 0 3px 12px rgba(255, 193, 7, 0.25);
            border: 1px solid rgba(255, 193, 7, 0.2);
        }

        .action-btn-issue::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .action-btn-issue:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 193, 7, 0.35);
            color: #212529;
        }

        .action-btn-issue:hover::before {
            left: 100%;
        }

        .action-btn-reject {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            box-shadow: 0 3px 12px rgba(239, 68, 68, 0.25);
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .action-btn-reject::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
            transition: left 0.5s;
        }

        .action-btn-reject:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.35);
            color: white;
        }

        .action-btn-reject:hover::before {
            left: 100%;
        }

        .action-buttons-wrapper {
            display: flex;
            gap: 12px;
            justify-content: center;
        }

        .action-description {
            text-align: center;
            color: #6b7280;
            font-size: 0.875rem;
            margin-bottom: 20px;
            line-height: 1.5;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        @media (max-width: 576px) {
            .action-buttons-wrapper {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }

            .action-btn-large {
                width: 100%;
                max-width: 240px;
                padding: 10px 20px;
                font-size: 0.85rem;
            }

            .action-buttons-content {
                padding: 20px 16px;
            }

            .action-description {
                font-size: 0.8rem;
                margin-bottom: 16px;
            }
        }
    </style>
@endsection

@section('navbar')
    @include('template.navadmin')
@endsection

@section('container')
    <div class="detail-container">
        <div class="row container-begin">
            <div class="col-sm-12">

                <nav class="mt-2 mb-4" aria-label="breadcrumb">
                    <ul id="breadcrumb" class="mb-0">
                        <li><a href="#"><i class="ti ti-home"></i></a></li>
                        <li><a href="#"><span class=" fa fa-info-circle"> </span> OSS</a></li>
                        <li><a href="#"><span class=" fa fa-info-circle"> </span> Detail Quesioner</a></li>
                    </ul>
                </nav>

                @include('template.alert')

                <!-- Modern Header -->
                <div class="detail-header">
                    <div class="detail-header-content">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-0">Detail Quesioner OSS</h5>
                                <small>{{ $oss->satpen->nm_satpen }} - {{ $oss->satpen->no_registrasi }}</small>
                            </div>
                            <div>
                                <a href="{{ route('a.oss') }}" class="detail-back-btn">
                                    <i class="ti ti-arrow-left"></i>
                                    Kembali ke Layanan OSS
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <!-- Basic Information -->
                        <div class="data-section category-basic">
                            <div class="section-header">
                                <h6>
                                    <span class="section-icon">
                                        <i class="ti ti-info-circle"></i>
                                    </span>
                                    Informasi Dasar Sekolah
                                </h6>
                            </div>
                            <table class="data-table">
                                <tbody>
                                    <tr>
                                        <td>Nama Sekolah/Madrasah</td>
                                        <td>:</td>
                                        <td>{{ $oss->satpen->nm_satpen }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Registrasi Ma'arif NU</td>
                                        <td>:</td>
                                        <td>{{ $oss->satpen->no_registrasi }}</td>
                                    </tr>
                                    <tr>
                                        <td>Bukti Bayar</td>
                                        <td>:</td>
                                        <td>
                                            @if ($oss->bukti_bayar)
                                                <a href="{{ route('a.oss.file', $oss->bukti_bayar) }}" class="file-btn">
                                                    <i class="ti ti-eye"></i> Lihat File
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Email</td>
                                        <td>:</td>
                                        <td>{{ $oss->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor WhatsApp</td>
                                        <td>:</td>
                                        <td>{{ $oss->no_whatsapp }}</td>
                                    </tr>
                                    <tr>
                                        <td>NPWP Sekolah</td>
                                        <td>:</td>
                                        <td>{{ $oss->npwp }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Previous Permit Information -->
                        <div class="data-section category-basic">
                            <div class="section-header">
                                <h6>
                                    <span class="section-icon">
                                        <i class="ti ti-file-certificate"></i>
                                    </span>
                                    Izin Operasional Lama
                                </h6>
                            </div>
                            <table class="data-table">
                                <tbody>
                                    <tr>
                                        <td>Nama Instansi Penerbit</td>
                                        <td>:</td>
                                        <td>{{ $oss->intansi_izin_lama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Izin Operasional Lama</td>
                                        <td>:</td>
                                        <td>{{ $oss->nomor_izin_lama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Terbit</td>
                                        <td>:</td>
                                        <td>{{ \App\Helpers\Date::tglReverse($oss->tgl_terbit_izin_lama) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Expired</td>
                                        <td>:</td>
                                        <td>{{ \App\Helpers\Date::tglReverse($oss->tgl_expired_izin_lama) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Lampiran File Izin Lama</td>
                                        <td>:</td>
                                        <td>
                                            @if ($oss->file_izin_lama)
                                                <a href="{{ route('a.oss.file', $oss->file_izin_lama) }}" class="file-btn">
                                                    <i class="ti ti-eye"></i> Lihat File
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Land Information -->
                        <div class="data-section category-land">
                            <div class="section-header">
                                <h6>
                                    <span class="section-icon">
                                        <i class="ti ti-map"></i>
                                    </span>
                                    Informasi Lahan & Status Kepemilikan
                                </h6>
                            </div>
                            <table class="data-table">
                                <tbody>
                                    <tr>
                                        <td>Lokasi Kegiatan Usaha</td>
                                        <td>:</td>
                                        <td>{{ $oss->lokasi_usaha }}</td>
                                    </tr>
                                    <tr>
                                        <td>Luas Lahan (M²)</td>
                                        <td>:</td>
                                        <td>{{ $oss->luas_lahan_usaha }}</td>
                                    </tr>
                                    <tr>
                                        <td>Sudah Menempati Lahan?</td>
                                        <td>:</td>
                                        <td>{{ $oss->apakah_sudah_menempati_lahan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status Lahan</td>
                                        <td>:</td>
                                        <td>{{ $oss->status_lahan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Instansi Penerbit Izin</td>
                                        <td>:</td>
                                        <td>{{ $oss->ms_instansi_izin }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Izin</td>
                                        <td>:</td>
                                        <td>{{ $oss->ms_nomor_izin }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Terbit</td>
                                        <td>:</td>
                                        <td>{{ \App\Helpers\Date::tglReverse($oss->ms_tgl_terbit) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Expired</td>
                                        <td>:</td>
                                        <td>{{ \App\Helpers\Date::tglReverse($oss->ms_tgl_expired) }}</td>
                                    </tr>
                                    <tr>
                                        <td>File HGU/HGB/SHM</td>
                                        <td>:</td>
                                        <td>
                                            @if ($oss->ms_file_lampiran)
                                                <a href="{{ route('a.oss.file', $oss->ms_file_lampiran) }}"
                                                    class="file-btn">
                                                    <i class="ti ti-eye"></i> Lihat File
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Lease Agreement Information (Sewa Lahan) -->
                        <div class="data-section category-land">
                            <div class="section-header">
                                <h6>
                                    <span class="section-icon">
                                        <i class="ti ti-file-text"></i>
                                    </span>
                                    Perjanjian Sewa Lahan
                                </h6>
                            </div>
                            <table class="data-table">
                                <tbody>
                                    <tr>
                                        <td>Nama Pemilik Lahan</td>
                                        <td>:</td>
                                        <td>{{ $oss->sw_pemilik_lahan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Perjanjian</td>
                                        <td>:</td>
                                        <td>{{ $oss->sw_nomor_perjanjian }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Perjanjian</td>
                                        <td>:</td>
                                        <td>{{ \App\Helpers\Date::tglReverse($oss->sw_tgl_perjanjian) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Habis Masa Berlaku</td>
                                        <td>:</td>
                                        <td>{{ \App\Helpers\Date::tglReverse($oss->sw_tgl_expired) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Lampiran File Perjanjian Sewa Lahan</td>
                                        <td>:</td>
                                        <td>
                                            @if ($oss->sw_file_lampiran)
                                                <a href="{{ route('a.oss.file', $oss->sw_file_lampiran) }}"
                                                    class="file-btn">
                                                    <i class="ti ti-eye"></i> Lihat File
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Lease Agreement Information (Pinjam Pakai) -->
                        <div class="data-section category-land">
                            <div class="section-header">
                                <h6>
                                    <span class="section-icon">
                                        <i class="ti ti-file-description"></i>
                                    </span>
                                    Perjanjian Pinjam Pakai Lahan
                                </h6>
                            </div>
                            <table class="data-table">
                                <tbody>
                                    <tr>
                                        <td>Nama Pemilik Lahan</td>
                                        <td>:</td>
                                        <td>{{ $oss->pp_pemilik_lahan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Perjanjian</td>
                                        <td>:</td>
                                        <td>{{ $oss->pp_nomor_perjanjian }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Perjanjian</td>
                                        <td>:</td>
                                        <td>{{ \App\Helpers\Date::tglReverse($oss->pp_tgl_perjanjian) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Habis Masa Berlaku</td>
                                        <td>:</td>
                                        <td>{{ \App\Helpers\Date::tglReverse($oss->pp_tgl_expired) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Lampiran File Perjanjian Pinjam Pakai Lahan</td>
                                        <td>:</td>
                                        <td>
                                            @if ($oss->pp_file_lampiran)
                                                <a href="{{ route('a.oss.file', $oss->pp_file_lampiran) }}"
                                                    class="file-btn">
                                                    <i class="ti ti-eye"></i> Lihat File
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Building Information -->
                        <div class="data-section category-building">
                            <div class="section-header">
                                <h6>
                                    <span class="section-icon">
                                        <i class="ti ti-building"></i>
                                    </span>
                                    Informasi Bangunan
                                </h6>
                            </div>
                            <table class="data-table">
                                <tbody>
                                    <tr>
                                        <td>Apakah memerlukan bangunan baru untuk kegiatan usaha ini?</td>
                                        <td>:</td>
                                        <td>{{ $oss->apakah_memerlukan_bangunan_baru }}</td>
                                    </tr>
                                    <tr>
                                        <td>Apakah Sudah Ada Bangunan?</td>
                                        <td>:</td>
                                        <td>{{ $oss->sudah_ada_bangunan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status Bangunan Usaha</td>
                                        <td>:</td>
                                        <td>{{ $oss->status_bangunan_usaha }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Bangunan (Unit)</td>
                                        <td>:</td>
                                        <td>{{ $oss->jumlah_bangunan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Rencana Teknis Bangunan/Rencana Induk Kawasan</td>
                                        <td>:</td>
                                        <td>
                                            @if ($oss->rencana_teknis_bangunan)
                                                <a href="{{ route('a.oss.file', $oss->rencana_teknis_bangunan) }}"
                                                    class="file-btn">
                                                    <i class="ti ti-eye"></i> Lihat File
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- IMB Information -->
                        <div class="data-section category-building">
                            <div class="section-header">
                                <h6>
                                    <span class="section-icon">
                                        <i class="ti ti-certificate"></i>
                                    </span>
                                    Izin Mendirikan Bangunan (IMB)
                                </h6>
                            </div>
                            <table class="data-table">
                                <tbody>
                                    <tr>
                                        <td>Apakah sudah memiliki IMB?</td>
                                        <td>:</td>
                                        <td>{{ $oss->apakah_memiliki_imb }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Bangunan yang sudah memiliki IMB (unit)</td>
                                        <td>:</td>
                                        <td>{{ $oss->imb_jml_bangunan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pejabat Penerbitan Izin IMB</td>
                                        <td>:</td>
                                        <td>{{ $oss->imb_pejabat_penerbit_izin }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor IMB</td>
                                        <td>:</td>
                                        <td>{{ $oss->imb_nomor }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Terbit IMB</td>
                                        <td>:</td>
                                        <td>{{ \App\Helpers\Date::tglReverse($oss->imb_tgl_terbit) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Expired IMB</td>
                                        <td>:</td>
                                        <td>{{ \App\Helpers\Date::tglReverse($oss->imb_tgl_expired) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Lampiran File IMB</td>
                                        <td>:</td>
                                        <td>
                                            @if ($oss->imb_file_lampiran)
                                                <a href="{{ route('a.oss.file', $oss->imb_file_lampiran) }}"
                                                    class="file-btn">
                                                    <i class="ti ti-eye"></i> Lihat File
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- SLF Information -->
                        <div class="data-section category-building">
                            <div class="section-header">
                                <h6>
                                    <span class="section-icon">
                                        <i class="ti ti-certificate-2"></i>
                                    </span>
                                    Sertifikat Laik Fungsi (SLF)
                                </h6>
                            </div>
                            <table class="data-table">
                                <tbody>
                                    <tr>
                                        <td>Apakah sudah memiliki sertifikat SLF?</td>
                                        <td>:</td>
                                        <td>{{ $oss->apakah_memiliki_sertifikat_slf }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pejabat Penerbit Sertifikat SLF</td>
                                        <td>:</td>
                                        <td>{{ $oss->slf_pejabat_penerbit }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Sertifikat SLF</td>
                                        <td>:</td>
                                        <td>{{ $oss->slf_nomor }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Terbit SLF</td>
                                        <td>:</td>
                                        <td>{{ \App\Helpers\Date::tglReverse($oss->slf_tgl_terbit) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Expired SLF</td>
                                        <td>:</td>
                                        <td>{{ \App\Helpers\Date::tglReverse($oss->slf_tgl_expired) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Lampiran File Sertifikat SLF</td>
                                        <td>:</td>
                                        <td>
                                            @if ($oss->slf_file_lampiran)
                                                <a href="{{ route('a.oss.file', $oss->slf_file_lampiran) }}"
                                                    class="file-btn">
                                                    <i class="ti ti-eye"></i> Lihat File
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Location Information -->
                        <div class="data-section category-location">
                            <div class="section-header">
                                <h6>
                                    <span class="section-icon">
                                        <i class="ti ti-map-pin"></i>
                                    </span>
                                    Informasi Lokasi Sekolah
                                </h6>
                            </div>
                            <table class="data-table">
                                <tbody>
                                    <tr>
                                        <td>Apakah Lokasi Sekolah berada dalam lintas provinsi/kabupaten/kota
                                            (Perbatasan)?</td>
                                        <td>:</td>
                                        <td>{{ $oss->apakah_lokasi_sekolah_lintas_perbatasan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Sekolah (Jalan/RT-RW)</td>
                                        <td>:</td>
                                        <td>{{ $oss->alamat_sekolah }}</td>
                                    </tr>
                                    <tr>
                                        <td>Provinsi</td>
                                        <td>:</td>
                                        <td>{{ $oss->propinsi }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kabupaten</td>
                                        <td>:</td>
                                        <td>{{ $oss->kabupaten }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kecamatan</td>
                                        <td>:</td>
                                        <td>{{ $oss->kecamatan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kelurahan</td>
                                        <td>:</td>
                                        <td>{{ $oss->kelurahan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kode Pos</td>
                                        <td>:</td>
                                        <td>{{ $oss->kode_pos }}</td>
                                    </tr>
                                    <tr>
                                        <td>Lampiran File Peta Polygon</td>
                                        <td>:</td>
                                        <td>
                                            @if ($oss->file_peta_polygon)
                                                <a href="{{ route('a.oss.file', $oss->file_peta_polygon) }}"
                                                    class="file-btn">
                                                    <i class="ti ti-eye"></i> Lihat File
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Apakah merupakan proyek Strategis Nasional?</td>
                                        <td>:</td>
                                        <td>{{ $oss->apakah_proyek_strategi_nasional }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kawasan Lokasi Usaha</td>
                                        <td>:</td>
                                        <td>{{ $oss->kawasan_lokasi_usaha }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Kawasan Industri</td>
                                        <td>:</td>
                                        <td>{{ $oss->klu_nama_kawasan_industri }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- KKPR Information -->
                        <div class="data-section category-environment">
                            <div class="section-header">
                                <h6>
                                    <span class="section-icon">
                                        <i class="ti ti-clipboard-check"></i>
                                    </span>
                                    Kesesuaian Kegiatan Pemanfaatan Ruang (KKPR) Non Berusaha
                                </h6>
                            </div>
                            <table class="data-table">
                                <tbody>
                                    <tr>
                                        <td>Apakah sudah memiliki KKPR Non Berusaha?</td>
                                        <td>:</td>
                                        <td>{{ $oss->apakah_memiliki_kkpr }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pejabat Penerbit KKPR Non Berusaha</td>
                                        <td>:</td>
                                        <td>{{ $oss->pejabat_penerbit_kkpr }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Izin KKPR Non Berusaha</td>
                                        <td>:</td>
                                        <td>{{ $oss->nomor_kkpr }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Terbit KKPR Non Berusaha</td>
                                        <td>:</td>
                                        <td>{{ \App\Helpers\Date::tglReverse($oss->tgl_terbit_kkpr) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Expired KKPR Non Berusaha</td>
                                        <td>:</td>
                                        <td>{{ \App\Helpers\Date::tglReverse($oss->tgl_expired_kkpr) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Lampiran File KKPR Non Berusaha</td>
                                        <td>:</td>
                                        <td>
                                            @if ($oss->file_lampiran_kkpr)
                                                <a href="{{ route('a.oss.file', $oss->file_lampiran_kkpr) }}"
                                                    class="file-btn">
                                                    <i class="ti ti-eye"></i> Lihat File
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Investment Information -->
                        <div class="data-section category-investment">
                            <div class="section-header">
                                <h6>
                                    <span class="section-icon">
                                        <i class="ti ti-coin"></i>
                                    </span>
                                    Data Rencana Investasi
                                </h6>
                            </div>
                            <table class="data-table">
                                <tbody>
                                    <tr>
                                        <td>Pembelian dan Pematangan Tanah (Rp)</td>
                                        <td>:</td>
                                        <td>{{ $oss->dri_pembelian_tanah }}</td>
                                    </tr>
                                    <tr>
                                        <td>Bangunan / Gedung (Rp)</td>
                                        <td>:</td>
                                        <td>{{ $oss->dri_bangunan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Mesin Peralatan Dalam Negeri (Rp)</td>
                                        <td>:</td>
                                        <td>{{ $oss->dri_mesin_dalam_negeri }}</td>
                                    </tr>
                                    <tr>
                                        <td>Mesin Peralatan Impor (Rp)</td>
                                        <td>:</td>
                                        <td>{{ $oss->dri_mesin_impor }}</td>
                                    </tr>
                                    <tr>
                                        <td>Investasi Lain - Lain (Rp)</td>
                                        <td>:</td>
                                        <td>{{ $oss->dri_investasi }}</td>
                                    </tr>
                                    <tr>
                                        <td>Modal Kerja 3 Bulanan (Rp)</td>
                                        <td>:</td>
                                        <td>{{ $oss->dri_modal_kerja_3_bulan }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Operational Information -->
                        <div class="data-section category-investment">
                            <div class="section-header">
                                <h6>
                                    <span class="section-icon">
                                        <i class="ti ti-users"></i>
                                    </span>
                                    Informasi Operasional & Tenaga Kerja
                                </h6>
                            </div>
                            <table class="data-table">
                                <tbody>
                                    <tr>
                                        <td>Tanggal, Bulan dan Tahun Mulai Beroperasi</td>
                                        <td>:</td>
                                        <td>{{ $oss->tgl_mulai_beroperasi }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Tenaga Kerja/Pegawai/PTK Laki-Laki</td>
                                        <td>:</td>
                                        <td>{{ $oss->jml_pegawai_pria }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Tenaga Kerja/Pegawai/PTK Perempuan</td>
                                        <td>:</td>
                                        <td>{{ $oss->jml_pegawai_wanita }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Tenaga Kerja/Pegawai/PTK Asing</td>
                                        <td>:</td>
                                        <td>{{ $oss->jml_pegawai_asing }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- AMDAL Information -->
                        <div class="data-section category-environment">
                            <div class="section-header">
                                <h6>
                                    <span class="section-icon">
                                        <i class="ti ti-leaf"></i>
                                    </span>
                                    Analisis Mengenai Dampak Lingkungan (AMDAL)
                                </h6>
                            </div>
                            <table class="data-table">
                                <tbody>
                                    <tr>
                                        <td>Apakah Memiliki Izin Lingkungan AMDAL?</td>
                                        <td>:</td>
                                        <td>{{ $oss->apakah_memiliki_izin_amdal }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pejabat Penerbitan Izin Lingkungan AMDAL</td>
                                        <td>:</td>
                                        <td>{{ $oss->amdal_pejabat_penerbit }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Izin Lingkungan AMDAL</td>
                                        <td>:</td>
                                        <td>{{ $oss->amdal_nomor_izin }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Terbit Izin Lingkungan AMDAL</td>
                                        <td>:</td>
                                        <td>{{ \App\Helpers\Date::tglReverse($oss->amdal_tgl_terbit) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Expired Izin Lingkungan AMDAL</td>
                                        <td>:</td>
                                        <td>{{ \App\Helpers\Date::tglReverse($oss->amdal_tgl_expired) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Lampiran File Izin Lingkungan AMDAL</td>
                                        <td>:</td>
                                        <td>
                                            @if ($oss->amdal_file_lampiran)
                                                <a href="{{ route('a.oss.file', $oss->amdal_file_lampiran) }}"
                                                    class="file-btn">
                                                    <i class="ti ti-eye"></i> Lihat File
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- UKL-UPL Information -->
                        <div class="data-section category-environment">
                            <div class="section-header">
                                <h6>
                                    <span class="section-icon">
                                        <i class="ti ti-plant"></i>
                                    </span>
                                    Upaya Pengelolaan Lingkungan & Upaya Pemantauan Lingkungan (UKL-UPL)
                                </h6>
                            </div>
                            <table class="data-table">
                                <tbody>
                                    <tr>
                                        <td>Apakah Memiliki Izin Lingkungan UKL-UPL?</td>
                                        <td>:</td>
                                        <td>{{ $oss->apakah_memiliki_uklupl }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pejabat Penerbitan Izin Lingkungan UKL-UPL</td>
                                        <td>:</td>
                                        <td>{{ $oss->uklupl_pejabat_penerbit }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Izin Lingkungan UKL-UPL</td>
                                        <td>:</td>
                                        <td>{{ $oss->uklupl_nomor_izin }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Terbit Izin Lingkungan UKL-UPL</td>
                                        <td>:</td>
                                        <td>{{ \App\Helpers\Date::tglReverse($oss->uklupl_tgl_terbit) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Expired Izin Lingkungan UKL-UPL</td>
                                        <td>:</td>
                                        <td>{{ \App\Helpers\Date::tglReverse($oss->uklupl_tgl_expired) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Lampiran File Izin Lingkungan UKL-UPL</td>
                                        <td>:</td>
                                        <td>
                                            @if ($oss->uklupl_file_lampiran)
                                                <a href="{{ route('a.oss.file', $oss->uklupl_file_lampiran) }}"
                                                    class="file-btn">
                                                    <i class="ti ti-eye"></i> Lihat File
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Modern Timeline Section -->
                        <div class="timeline-section">
                            <div class="timeline-header">
                                <h6>
                                    <span class="section-icon">
                                        <i class="ti ti-clock"></i>
                                    </span>
                                    Riwayat Verifikasi
                                </h6>
                            </div>
                            <div class="timeline-content">
                                <ul class="modern-timeline">
                                    @foreach ($oss->osstimeline as $row)
                                        <li>
                                            <div class="timeline-item">
                                                <div class="timeline-status">{{ $row->status_verifikasi }}</div>
                                                <div class="timeline-date">
                                                    {{ \App\Helpers\Date::tglReverseDash($row->tgl_verifikasi) }}</div>
                                                @if ($row->catatan)
                                                    <div class="timeline-note">{{ $row->catatan }}</div>
                                                @endif
                                                <div class="timeline-links">
                                                    @if ($row->link_pnbp)
                                                        <a href="{{ $row->link_pnbp }}" target="_blank"
                                                            class="timeline-link">
                                                            <i class="ti ti-external-link"></i> Link PNBP
                                                        </a>
                                                    @endif
                                                    @if ($row->link_catatan_pupr)
                                                        <a href="{{ $row->link_catatan_pupr }}" target="_blank"
                                                            class="timeline-link">
                                                            <i class="ti ti-external-link"></i> Link Catatan PUPR
                                                        </a>
                                                    @endif
                                                    @if ($row->link_gistaru)
                                                        <a href="{{ $row->link_gistaru }}" target="_blank"
                                                            class="timeline-link">
                                                            <i class="ti ti-external-link"></i> Link Gistaru
                                                        </a>
                                                    @endif
                                                    @if ($row->link_izin_terbit)
                                                        <a href="{{ $row->link_izin_terbit }}" target="_blank"
                                                            class="timeline-link">
                                                            <i class="ti ti-external-link"></i> Link Izin Terbit
                                                        </a>
                                                    @endif
                                                    @if ($row->nomor_ku)
                                                        <span class="timeline-link">Nomor KU: {{ $row->nomor_ku }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Action Buttons Section -->
                            @if (!in_array(auth()->user()->role, ['admin wilayah', 'admin cabang']))
                                <div class="action-buttons-content">
                                    <div class="action-buttons-wrapper">
                                        @if ($oss->status == 'dokumen diproses')
                                            <!-- Actions for "Sedang Diproses" status -->
                                            <button class="action-btn-large action-btn-issue" data-bs-toggle="modal"
                                                data-bs-target="#modalIzin" data-bs="{{ $oss->id_oss }}"
                                                title="Terbitkan izin untuk permohonan OSS ini">
                                                <i class="ti ti-certificate"></i>
                                                <span>Terbitkan Izin</span>
                                            </button>
                                            <button class="action-btn-large action-btn-reject" data-bs-toggle="modal"
                                                data-bs-target="#modalVerifikasi" data-bs="{{ $oss->id_oss }}"
                                                data-st="Tolak" title="Tolak permohonan OSS ini">
                                                <i class="ti ti-x-circle"></i>
                                                <span>Tolak</span>
                                            </button>
                                        @else
                                            <!-- Actions for "Verifikasi" and "Revisi" status -->
                                            <button class="action-btn-large action-btn-approve" data-bs-toggle="modal"
                                                data-bs-target="#modalVerifikasi" data-bs="{{ $oss->id_oss }}"
                                                data-st="Terima" title="Setujui permohonan OSS ini">
                                                <i class="ti ti-check-circle"></i>
                                                <span>Setujui</span>
                                            </button>
                                            <button class="action-btn-large action-btn-reject" data-bs-toggle="modal"
                                                data-bs-target="#modalVerifikasi" data-bs="{{ $oss->id_oss }}"
                                                data-st="Tolak" title="Tolak permohonan OSS ini">
                                                <i class="ti ti-x-circle"></i>
                                                <span>Tolak</span>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            @endif

                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@include('admin.oss.ossModal')
