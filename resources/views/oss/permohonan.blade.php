@extends('template.layout', [
    'title' => 'Sipinter - Permohonan OSS'
])

@section('navbar')
    @include('template.nav')
@endsection

@section('container')
    <!--  Row 1 -->
    <div class="row container-begin">
        <div class="col-sm-12">

            <nav class="mt-2 mb-4" aria-label="breadcrumb">
                <ul id="breadcrumb" class="mb-0">
                    <li><a href="#"><i class="ti ti-home"></i></a></li>
                    <li><a href="#"><span class=" fa fa-info-circle"> </span> Permohonan</a></li>
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> OSS</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <div class="card" style="min-height:30rem;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title fw-semibold mb-1">Permohonan OSS</h5>
                            <small>permohonan oss dengan mengisi kode unik dan bukti pembayaran</small>
                        </div>
                        <div>
                            @if(!$oss || @$oss->status == 'izin terbit')
                                <a href="{{ route('oss.new') }}" class="btn btn-sm btn-primary mx-1"><i class="ti ti-new-section"></i> Permohonan Baru</a>
                            @endif
                                <a href="{{ route('oss.history') }}" class="btn btn-sm btn-green"><i class="ti ti-note"></i> History Permohonan</a>
                        </div>
                    </div>

                    @if($oss)
                        <div class="row justify-content-center mt-5 mb-2">
                            <div class="col col-sm-10 py-3">
                                <ul class="d-flex justify-content-between text-center mb-0 step-status">
                                    @foreach($oss->ossstatus as $row)
                                    <li>
                                        <i class="ti {{ $row->icon }} {{ $row->status }}"></i>
                                        <p>{{ $row->textstatus }}</p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col col-sm-10">
                                <hr>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col col-sm-11">
                                @if(@$notice->keterangan)
                                    <div class="alert {{ $notice->status=='success' ? 'alert-success' : 'alert-danger' }}">
                                        {{ $notice->keterangan }}</div>
                                @endif
                            </div>
                        </div>

                        @if($oss->status == 'mengisi persyaratan' || $oss->status == 'perbaikan')

                        <div class="row justify-content-center">
                            <div class="col col-sm-11 border px-2 py-2">
                                {{-- <form action="{{ route('oss.save', $oss->id_oss) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <table class="table mb-0">
                                        <tr>
                                            <td colspan="2">
                                                <p class="mb-0">MENGISI FORMULIR DATA PADA LINK</p>
                                                <small><a target="_blank" href="{{ \App\Http\Controllers\Settings::get("oss_form") }}">Klik Disini</a></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-bottom-0" colspan="2">
                                                <small>*) Kode unik didapatkan dari email setelah mengisi formulir.</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-bottom-0" width="300">
                                                <label class="form-label" for="kode_unik">Kode Unik</label>
                                                <input type="text" name="kode_unik" id="kode_unik" placeholder="Masukkan kode unik" class="form-control form-control-sm @error('kode_unik') is-invalid @enderror" value="{{ $oss->kode_unik }}">
                                                <div class="invalid-feedback">
                                                    @error('kode_unik') {{ $message }} @enderror
                                                </div>
                                            </td>
                                            <td class="border-bottom-0">
                                                <label class="form-label" for="bukti_bayar">Bukti Pembayaran</label>
                                                <input type="file" name="bukti_bayar" id="bukti_bayar" class="form-control form-control-sm @error('bukti_bayar') is-invalid @enderror">
                                                <div class="invalid-feedback">
                                                    @error('bukti_bayar') {{ $message }} @enderror
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-bottom-0" colspan="2">
                                                <button type="submit" class="btn btn-primary btn-sm">Ajukan Permohonan</button>
                                            </td>
                                        </tr>
                                    </table>
                                </form> --}}



                                <form action="{{ route('register.proses') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body pb-0">
                                        <h5 class="fw-medium mb-0">Quisioner OSS</h5>
                                        <small>lengkapi kolom quisioner untuk permohonan oss</small>
                                        <div class="mt-3">
                                            @include('template.alert')
                                        </div>
                                    </div>
                                    <div class="card-body pb-3 pt-3">
                                        <div class="tab d-none">                                            
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="kepsek" class="form-label required">Nomor Registrasi Ma'arif NU Nasional</label>
                                                        <input type="text" class="form-control  @error('kepsek') is-invalid @enderror" id="kepsek" name="kepsek" value="{{ old('kepsek') }}" placeholder="Masukkan nama kepala sekolah" required>
                                                        <div class="invalid-feedback">
                                                            @error('kepsek') {{ $message }} @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="thn_berdiri" class="form-label required">Nama Sekolah/Madrasah</label>
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
                                                        <label for="aset_tanah" class="form-label required">Email Address</label>
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
                                                        <label for="nm_pemilik" class="form-label required">Nomor Whatshapp</label>
                                                        <input type="text" class="form-control  @error('nm_pemilik') is-invalid @enderror" id="nm_pemilik" name="nm_pemilik" value="{{ old('nm_pemilik') }}" placeholder="Masukkan nama pemilik tanah" required>
                                                        <div class="invalid-feedback">
                                                            @error('nm_pemilik') {{ $message }} @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="nm_pemilik" class="form-label required">NPWP Sekolah</label>
                                                        <input type="text" class="form-control  @error('nm_pemilik') is-invalid @enderror" id="nm_pemilik" name="nm_pemilik" value="{{ old('nm_pemilik') }}" placeholder="Masukkan nama pemilik tanah" required>
                                                        <div class="invalid-feedback">
                                                            @error('nm_pemilik') {{ $message }} @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="nm_pemilik" class="form-label required">Nama Instansi Penerbit Izin Operasional Lama</label>
                                                        <input type="text" class="form-control  @error('nm_pemilik') is-invalid @enderror" id="nm_pemilik" name="nm_pemilik" value="{{ old('nm_pemilik') }}" placeholder="Masukkan nama pemilik tanah" required>
                                                        <div class="invalid-feedback">
                                                            @error('nm_pemilik') {{ $message }} @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="nm_pemilik" class="form-label required">Nomor Izin Operasional Lama</label>
                                                        <input type="text" class="form-control  @error('nm_pemilik') is-invalid @enderror" id="nm_pemilik" name="nm_pemilik" value="{{ old('nm_pemilik') }}" placeholder="Masukkan nama pemilik tanah" required>
                                                        <div class="invalid-feedback">
                                                            @error('nm_pemilik') {{ $message }} @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="nm_pemilik" class="form-label required">Tanggal Terbit Izin Operasional Lama</label>
                                                        <input type="text" class="form-control  @error('nm_pemilik') is-invalid @enderror" id="nm_pemilik" name="nm_pemilik" value="{{ old('nm_pemilik') }}" placeholder="Masukkan nama pemilik tanah" required>
                                                        <div class="invalid-feedback">
                                                            @error('nm_pemilik') {{ $message }} @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="nm_pemilik" class="form-label required">Tanggal Expired Izin Operasional Lama</label>
                                                        <input type="text" class="form-control  @error('nm_pemilik') is-invalid @enderror" id="nm_pemilik" name="nm_pemilik" value="{{ old('nm_pemilik') }}" placeholder="Masukkan nama pemilik tanah" required>
                                                        <div class="invalid-feedback">
                                                            @error('nm_pemilik') {{ $message }} @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="nm_pemilik" class="form-label required">Lampiran File Izin Operasional Lama (Format PDF)</label>
                                                        <input type="file" class="form-control  @error('nm_pemilik') is-invalid @enderror" id="nm_pemilik" name="nm_pemilik" value="{{ old('nm_pemilik') }}" placeholder="Masukkan nama pemilik tanah" required>
                                                        <div class="invalid-feedback">
                                                            @error('nm_pemilik') {{ $message }} @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="bukti_bayar">Bukti Pembayaran</label>
                                                        <input type="file" name="bukti_bayar" id="bukti_bayar" class="form-control form-control-sm @error('bukti_bayar') is-invalid @enderror">
                                                        <div class="invalid-feedback">
                                                            @error('bukti_bayar') {{ $message }} @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                    
                                        <div class="tab d-none">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="aset_tanah" class="form-label required">Lokasi Kegiatan Usaha</label>
                                                        <select class="form-select  @error('aset_tanah') is-invalid @enderror" name="aset_tanah">
                                                            <option value="darat">Darat</option>
                                                            <option value="laut">Laut</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            @error('aset_tanah') {{ $message }} @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="nm_pemilik" class="form-label required">Luas lahan yang digunakan untuk kegiatan usaha (M2)</label>
                                                        <input type="text" class="form-control  @error('nm_pemilik') is-invalid @enderror" id="nm_pemilik" name="nm_pemilik" value="{{ old('nm_pemilik') }}" placeholder="Masukkan nama pemilik tanah" required>
                                                        <div class="invalid-feedback">
                                                            @error('nm_pemilik') {{ $message }} @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="aset_tanah" class="form-label required">Apakah Anda sudah menempati lahan tersebut?</label>
                                                        <select class="form-select  @error('aset_tanah') is-invalid @enderror" name="aset_tanah">
                                                            <option value="darat">Darat</option>
                                                            <option value="laut">Laut</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            @error('aset_tanah') {{ $message }} @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="nm_pemilik" class="form-label required">Status Lahan</label>
                                                        <select class="form-select  @error('aset_tanah') is-invalid @enderror" name="aset_tanah">
                                                            <option value="darat">Milik Sendiri</option>
                                                            <option value="laut">Sewa</option>
                                                            <option value="laut">Pinjam Pakai</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            @error('aset_tanah') {{ $message }} @enderror
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





                            </div>
                        </div>
                        @else
                        <div class="row justify-content-center">
                            <div class="col col-sm-11 border px-3 py-3">
                                <table class="table table-bordered mb-0 table-striped">
                                    <tr>
                                        <td class="border-bottom-0 align-middle" width="200">
                                            <p class="mb-0">KODE UNIK</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h5>{{ $oss->kode_unik }}</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-bottom-0 align-middle">
                                            <p class="mb-0">BUKTI PEMBAYARAN</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <a href="{{ route('oss.file', $oss->bukti_bayar) }}" class="btn btn-sm btn-secondary">Lihat Berkas</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        @endif
                    @else
                        <div class="row align-items-center mt-4">
                            <div class="col text-center">
                                <div class="alert alert-danger">Belum ada pengajuan OSS</div>
                            </div>
                        </div>
                    @endif
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

            // if (inputsValid) {

                $(tabs[current]).addClass("d-none");
                $(tabs_pill[current]).removeClass("active");

                current++;
                loadFormData(current);
            // }
        }

        function back() {
            $(tabs[current]).addClass("d-none");
            $(tabs_pill[current]).removeClass("active");

            current--;
            loadFormData(current);
        }

        tabs_pill.on('click', function() {
            inputsValid = validateInputs($(tabs[current]));

            // if (inputsValid) {
                $(tabs[current]).addClass("d-none");
                $(tabs_pill[current]).removeClass("active");

                current = $(this).index();
                loadFormData(current);
            // }
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

    </script>
@endsection
