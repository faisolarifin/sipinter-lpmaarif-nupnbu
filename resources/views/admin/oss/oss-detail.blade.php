@extends('template.layout', [
    'title' => 'Sipinter - Tab Permohonan OSS',
])

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/timeline.css') }}" />
    <style>
        .floating-buttons {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            display: flex;
            flex-direction: row;
            gap: 10px;
        }

        .floating-btn {
            border-radius: 50px;
            padding: 12px 20px;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border: none;
            transition: all 0.3s ease;
            min-width: 140px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .floating-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        .floating-btn i {
            font-size: 16px;
        }

        @media (max-width: 768px) {
            .floating-buttons {
                bottom: 15px;
                right: 15px;
                flex-direction: column;
                gap: 8px;
            }

            .floating-btn {
                min-width: 120px;
                padding: 10px 16px;
                font-size: 14px;
            }
        }
        
        /* Status Badge Styling */
        .badge {
            font-size: 0.875rem;
            border-radius: 8px;
            font-weight: 500;
        }
        
        .badge i {
            font-size: 1rem;
        }
    </style>
@endsection

@section('navbar')
    @include('template.navadmin')
@endsection

@section('container')
    <!--  Row 1 -->
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

            <div class="card w-100">
                <div class="card-body pt-3">
                    <div class="d-flex justify-content-between mt-2 mb-3">
                        <div>
                            <h5 class="mb-0">Quesioner OSS</h5>
                            <small>detail quesioner oss</small>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <!-- Status OSS -->
                            <div>
                                @php
                                    $statusClass = '';
                                    $statusIcon = '';
                                    $statusText = ucfirst($oss->status ?? 'Tidak Diketahui');
                                    
                                    switch(strtolower($oss->status ?? '')) {
                                        case 'verifikasi':
                                            $statusClass = 'bg-warning text-dark';
                                            $statusIcon = 'ti ti-clock';
                                            break;
                                        case 'perbaikan':
                                        case 'revisi':
                                            $statusClass = 'bg-info text-white';
                                            $statusIcon = 'ti ti-edit';
                                            break;
                                        case 'dokumen diproses':
                                        case 'proses':
                                            $statusClass = 'bg-primary text-white';
                                            $statusIcon = 'ti ti-file-text';
                                            break;
                                        case 'izin terbit':
                                        case 'terbit':
                                        case 'selesai':
                                            $statusClass = 'bg-success text-white';
                                            $statusIcon = 'ti ti-check-circle';
                                            break;
                                        case 'ditolak':
                                        case 'tolak':
                                            $statusClass = 'bg-danger text-white';
                                            $statusIcon = 'ti ti-x-circle';
                                            break;
                                        default:
                                            $statusClass = 'bg-secondary text-white';
                                            $statusIcon = 'ti ti-help-circle';
                                    }
                                @endphp
                                
                                <span class="badge {{ $statusClass }} px-3 py-2">
                                    <i class="{{ $statusIcon }} me-1"></i>
                                    Status: {{ $statusText }}
                                </span>
                            </div>
                            <div>
                                <a href="{{ route('a.oss') }}" class="btn btn-success btn-sm">
                                    Layanan OSS
                                    <i class="ti ti-arrow-back-up"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col col-sm-8" style="overflow-x:auto;">
                            <div class="table-responsive mt-4">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td><strong>Nama Sekolah/Madrasah</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->satpen->nm_satpen }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor Registrasi Ma'arif NU Nasional</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->satpen->no_registrasi }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Bukti Bayar</strong></td>
                                            <td>:</td>
                                            <td>
                                                @if ($oss->bukti_bayar)
                                                    <a href="{{ route('a.oss.file', $oss->bukti_bayar) }}"
                                                        class="btn btn-sm btn-secondary">Lihat File <i
                                                            class="ti ti-eye"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Alamat Email</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->email }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor Whatshapp</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->no_whatsapp }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>NPWP Sekolah</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->npwp }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama Instansi Penerbit Izin Operasional Lama</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->intansi_izin_lama }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor Izin Operasional Lama</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->nomor_izin_lama }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Terbit Izin Operasional Lama</strong></td>
                                            <td>:</td>
                                            <td>{{ \App\Helpers\Date::tglReverse($oss->tgl_terbit_izin_lama) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Expired Izin Operasional Lama</strong></td>
                                            <td>:</td>
                                            <td>{{ \App\Helpers\Date::tglReverse($oss->tgl_expired_izin_lama) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Lampiran File Izin Operasional Lama</strong></td>
                                            <td>:</td>
                                            <td>
                                                @if ($oss->file_izin_lama)
                                                    <a href="{{ route('a.oss.file', $oss->file_izin_lama) }}"
                                                        class="btn btn-sm btn-secondary">Lihat File <i
                                                            class="ti ti-eye"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Lokasi Kegiatan Usaha</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->lokasi_usaha }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Luas lahan yang digunakan untuk kegiatan usaha (M2)</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->luas_lahan_usaha }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Apakah Anda sudah menempati lahan tersebut?</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->apakah_sudah_menempati_lahan }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Status Lahan</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->status_lahan }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama Instansi Penerbit Izin</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->ms_instansi_izin }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor Izin yang tertera pada surat</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->ms_nomor_izin }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Terbit</strong></td>
                                            <td>:</td>
                                            <td>{{ \App\Helpers\Date::tglReverse($oss->ms_tgl_terbit) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal habis masa berlaku</strong></td>
                                            <td>:</td>
                                            <td>{{ \App\Helpers\Date::tglReverse($oss->ms_tgl_expired) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Lampiran File HGU/HGB/SHM/Lainnya</strong></td>
                                            <td>:</td>
                                            <td>
                                                @if ($oss->ms_file_lampiran)
                                                    <a href="{{ route('a.oss.file', $oss->ms_file_lampiran) }}"
                                                        class="btn btn-sm btn-secondary">Lihat File <i
                                                            class="ti ti-eye"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama Pemilik Lahan</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->sw_pemilik_lahan }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor Perjanjian</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->sw_nomor_perjanjian }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Perjanjian</strong></td>
                                            <td>:</td>
                                            <td>{{ \App\Helpers\Date::tglReverse($oss->sw_tgl_perjanjian) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Habis Masa Berlaku</strong></td>
                                            <td>:</td>
                                            <td>{{ \App\Helpers\Date::tglReverse($oss->sw_tgl_expired) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Lampiran File Perjanjian Sewa Lahan</strong></td>
                                            <td>:</td>
                                            <td>
                                                @if ($oss->sw_file_lampiran)
                                                    <a href="{{ route('a.oss.file', $oss->sw_file_lampiran) }}"
                                                        class="btn btn-sm btn-secondary">Lihat File <i
                                                            class="ti ti-eye"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama Pemiliki Lahan</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->pp_pemilik_lahan }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor Perjanjian</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->pp_nomor_perjanjian }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Perjanjian</strong></td>
                                            <td>:</td>
                                            <td>{{ \App\Helpers\Date::tglReverse($oss->pp_tgl_perjanjian) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Habis Masa Berlaku</strong></td>
                                            <td>:</td>
                                            <td>{{ \App\Helpers\Date::tglReverse($oss->pp_tgl_expired) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Lampiran File Pernjanian Pinjam Pakai Lahan</strong></td>
                                            <td>:</td>
                                            <td>
                                                @if ($oss->pp_file_lampiran)
                                                    <a href="{{ route('a.oss.file', $oss->pp_file_lampiran) }}"
                                                        class="btn btn-sm btn-secondary">Lihat File <i
                                                            class="ti ti-eye"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Apakah memerlukan bangunan baru untuk kegiatan usaha ini ?</strong>
                                            </td>
                                            <td>:</td>
                                            <td>{{ $oss->apakah_memerlukan_bangunan_baru }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Apakah Sudah Ada Bangunan ?</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->sudah_ada_bangunan }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Status Bangunan Usaha</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->status_bangunan_usaha }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Jumlah Bangunan Anda? (Unit)</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->jumlah_bangunan }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Apakah sudah memiliki IMB?</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->apakah_memiliki_imb }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Jumlah bangunan yang sudah memiliki IMB? (unit)</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->imb_jml_bangunan }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama Pejabat Penerbitan Izin IMB</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->imb_pejabat_penerbit_izin }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor IMB</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->imb_nomor }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Terbit IMB</strong></td>
                                            <td>:</td>
                                            <td>{{ \App\Helpers\Date::tglReverse($oss->imb_tgl_terbit) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Expired IMB</strong></td>
                                            <td>:</td>
                                            <td>{{ \App\Helpers\Date::tglReverse($oss->imb_tgl_expired) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Lampiran File IMB</strong></td>
                                            <td>:</td>
                                            <td>
                                                @if ($oss->imb_file_lampiran)
                                                    <a href="{{ route('a.oss.file', $oss->imb_file_lampiran) }}"
                                                        class="btn btn-sm btn-secondary">Lihat File <i
                                                            class="ti ti-eye"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Apakah sudah memiliki sertifikat SLF?</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->apakah_memiliki_sertifikat_slf }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama Pejabat Penerbit Sertifikat SLF</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->slf_pejabat_penerbit }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor Sertifikat SLF</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->slf_nomor }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Terbit SLF</strong></td>
                                            <td>:</td>
                                            <td>{{ \App\Helpers\Date::tglReverse($oss->slf_tgl_terbit) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Expired SLF</strong></td>
                                            <td>:</td>
                                            <td>{{ \App\Helpers\Date::tglReverse($oss->slf_tgl_expired) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Lampiran File Sertifikat SLF</strong></td>
                                            <td>:</td>
                                            <td>
                                                @if ($oss->slf_file_lampiran)
                                                    <a href="{{ route('a.oss.file', $oss->slf_file_lampiran) }}"
                                                        class="btn btn-sm btn-secondary">Lihat File <i
                                                            class="ti ti-eye"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Apakah Lokasi Sekolah berada <br>dalam lintas
                                                    provinsi/kabupaten/kota (Perbatasan)</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->apakah_lokasi_sekolah_lintas_perbatasan }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Alamat Sekolah (Jalan/RT-RW)</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->alamat_sekolah }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Propinsi</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->propinsi }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kabupaten</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->kabupaten }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kecamatan</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->kecamatan }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kelurahan</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->kelurahan }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kode Pos</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->kode_pos }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Lampiran File Peta Polygon</strong></td>
                                            <td>:</td>
                                            <td>
                                                @if ($oss->file_peta_polygon)
                                                    <a href="{{ route('a.oss.file', $oss->file_peta_polygon) }}"
                                                        class="btn btn-sm btn-secondary">Lihat File <i
                                                            class="ti ti-eye"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Apakah merupakan proyek Strategis Nasional?</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->apakah_proyek_strategi_nasional }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Rencana teknis bangunan/rencana induk kawasan</strong></td>
                                            <td>:</td>
                                            <td>
                                                @if ($oss->rencana_teknis_bangunan)
                                                    <a href="{{ route('a.oss.file', $oss->rencana_teknis_bangunan) }}"
                                                        class="btn btn-sm btn-secondary">Lihat File <i
                                                            class="ti ti-eye"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kawasan Lokasi Usaha</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->kawasan_lokasi_usaha }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama Kawasan Industri</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->klu_nama_kawasan_industri }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Apakah sudah memiliki KKPR Non Berusaha?</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->apakah_memiliki_kkpr }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama Pejabat Penerbit KKPR Non Berusaha</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->pejabat_penerbit_kkpr }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor Izin KKPR Non Berusaha</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->nomor_kkpr }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Terbit KKPR Non Berusaha</strong></td>
                                            <td>:</td>
                                            <td>{{ \App\Helpers\Date::tglReverse($oss->tgl_terbit_kkpr) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Expired KKPR Non Berusaha</strong></td>
                                            <td>:</td>
                                            <td>{{ \App\Helpers\Date::tglReverse($oss->tgl_expired_kkpr) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Lampiran File KKPR Non Berusaha</strong></td>
                                            <td>:</td>
                                            <td>
                                                @if ($oss->file_lampiran_kkpr)
                                                    <a href="{{ route('a.oss.file', $oss->file_lampiran_kkpr) }}"
                                                        class="btn btn-sm btn-secondary">Lihat File <i
                                                            class="ti ti-eye"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Data Rencana Investasi : Pembelian dan Pematangan Tanah
                                                    (Rp)?</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->dri_pembelian_tanah }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Data Rencana Investasi : Bangunan / Gedung (Rp)?</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->dri_bangunan }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Data Rencana Investasi : Mesin Peralatan Dalam Negeri (Rp)?</strong>
                                            </td>
                                            <td>:</td>
                                            <td>{{ $oss->dri_mesin_dalam_negeri }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Data Rencana Investasi : Mesin Peralatan Impor (Rp)?</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->dri_mesin_impor }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Data Rencana Investasi : Investasi Lain - Lain (Rp)?</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->dri_investasi }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Data Rencana Investasi : Modal Kerja 3 Bulanan (Rp)?</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->dri_modal_kerja_3_bulan }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal, Bulan dan Tahun mulai Beroperasi</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->tgl_mulai_beroperasi }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>JJumlah Tenaga Kerja/Pegawai/PTK laki laki</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->jml_pegawai_pria }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Jumlah Tenaga Kerja/Pegawai/PTK Perempuan</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->jml_pegawai_wanita }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Jumlah Tenaga Kerja/Pegawai/PTK Asing</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->jml_pegawai_asing }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Apakah Memiliki Izin Lingkungan AMDAL?</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->apakah_memiliki_izin_amdal }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama Pejabat Penerbitan Izin Lingkungan AMDAL</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->amdal_pejabat_penerbit }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor Izin Lingkungan AMDAL</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->amdal_nomor_izin }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Terbit Izin Lingkungan AMDAL</strong></td>
                                            <td>:</td>
                                            <td>{{ \App\Helpers\Date::tglReverse($oss->amdal_tgl_terbit) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Expired Izin Lingkungan AMDAL</strong></td>
                                            <td>:</td>
                                            <td>{{ \App\Helpers\Date::tglReverse($oss->amdal_tgl_expired) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Lampiran File Izin Lingkungan AMDAL</strong></td>
                                            <td>:</td>
                                            <td>
                                                @if ($oss->amdal_file_lampiran)
                                                    <a href="{{ route('a.oss.file', $oss->amdal_file_lampiran) }}"
                                                        class="btn btn-sm btn-secondary">Lihat File <i
                                                            class="ti ti-eye"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Apakah Memiliki Izin Lingkungan UKL-UPL?</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->apakah_memiliki_uklupl }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama Pejabat Penerbitan Izin Lingkungan UKL-UPL</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->uklupl_pejabat_penerbit }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor Izin Lingkungan UKL-UPL</strong></td>
                                            <td>:</td>
                                            <td>{{ $oss->uklupl_nomor_izin }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Terbit Izin Lingkungan UKL-UPL</strong></td>
                                            <td>:</td>
                                            <td>{{ \App\Helpers\Date::tglReverse($oss->uklupl_tgl_terbit) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Expired Izin Lingkungan UKL-UPL</strong></td>
                                            <td>:</td>
                                            <td>{{ \App\Helpers\Date::tglReverse($oss->uklupl_tgl_expired) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Lampiran File Izin Lingkungan UKL-UPL</strong></td>
                                            <td>:</td>
                                            <td>
                                                @if ($oss->uklupl_file_lampiran)
                                                    <a href="{{ route('a.oss.file', $oss->uklupl_file_lampiran) }}"
                                                        class="btn btn-sm btn-secondary">Lihat File <i
                                                            class="ti ti-eye"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col col-sm-4">
                            <div style="max-height:55rem;overflow:auto;">
                                <ul class="timeline">
                                    @foreach ($oss->osstimeline as $row)
                                        <li>
                                            <a href="#" class="text-capitalize">{{ $row->status_verifikasi }}</a>
                                            <p class="mb-0">{{ \App\Helpers\Date::tglReverseDash($row->tgl_verifikasi) }}
                                            </p>
                                            <small>{{ $row->catatan }}</small>
                                            @if ($row->link_pnbp)
                                                <br><small>Link PNBP : <a target="_blank"
                                                        href="{{ $row->link_pnbp }}">{{ $row->link_pnbp }}</a></small>
                                            @endif
                                            @if ($row->link_catatan_pupr)
                                                <br><small>Link Catatan PUPR : <a target="_blank"
                                                        href="{{ $row->link_catatan_pupr }}">{{ $row->link_catatan_pupr }}</a></small>
                                            @endif
                                            @if ($row->link_gistaru)
                                                <br><small>Link Gistaru : <a target="_blank"
                                                        href="{{ $row->link_gistaru }}">{{ $row->link_gistaru }}</a></small>
                                            @endif
                                            @if ($row->link_izin_terbit)
                                                <br><small>Link Izin Terbit : <a target="_blank"
                                                        href="{{ $row->link_izin_terbit }}">{{ $row->link_izin_terbit }}</a></small>
                                            @endif
                                            @if ($row->nomor_ku)
                                                <br><small>Nomor KU : <a target="_blank"
                                                        href="{{ $row->nomor_ku }}">{{ $row->nomor_ku }}</a></small>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

        @if (in_array($oss->status, ['verifikasi', 'perbaikan']))
        <!-- Tombol untuk status verifikasi dan perbaikan -->
        <div class="floating-buttons">
            <button type="button" class="btn btn-success floating-btn" data-bs-toggle="modal" data-bs-target="#modalVerifikasi" data-bs="{{ $oss->id_oss }}" data-st="Terima" title="Terima">
                <i class="ti ti-check"></i>
                Terima
            </button>
            <button type="button" class="btn btn-danger floating-btn" data-bs-toggle="modal" data-bs-target="#modalVerifikasi" data-bs="{{ $oss->id_oss }}" data-st="Tolak" title="Tolak">
                <i class="ti ti-x"></i>
                Tolak
            </button>
        </div>
    @elseif($oss->status == 'dokumen diproses')
        <!-- Tombol untuk status dokumen diproses -->
        <div class="floating-buttons">
            <button type="button" class="btn btn-primary floating-btn" data-bs-toggle="modal" data-bs-target="#modalIzin" data-bs="{{ $oss->id_oss }}" title="Terbitkan Izin">
                <i class="ti ti-file-certificate"></i>
                Terbitkan Izin
            </button>
            <button type="button" class="btn btn-danger floating-btn" data-bs-toggle="modal" data-bs-target="#modalVerifikasi" data-bs="{{ $oss->id_oss }}" data-st="Tolak" title="Tolak">
                <i class="ti ti-x"></i>
                Tolak
            </button>
        </div>
    @endif

@endsection

@section('scripts')
    <!-- Script modal handling sudah ada di ossModal.blade.php -->
@endsection

@include('admin.oss.ossModal')