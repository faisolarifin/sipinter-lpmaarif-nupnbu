@extends('template.layout', [
    'title' => 'Siapinter - Revisi Satuan Pendidikan'
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
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> My Satpen</a></li>
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> Revisi</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title fw-semibold mb-1">REVISI SATPEN</h5>
                            <small>perbaiki kesalahan profile satuan pendidikan anda</small>
                        </div>
                        <div>
                            <a href="{{ route('mysatpen') }}" class="btn btn-sm btn-info">My Satpen
                                <i class="ti ti-arrow-autofit-right"></i></a>
                        </div>
                    </div>
                    <form class="mt-3" action="{{ route('mysatpen.revisi') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-2">
                                    <label for="npsn" class="form-label">NPSN</label>
                                    <input type="text" class="form-control form-control-sm @error('npsn') is-invalid @enderror" id="npsn" name="npsn" value="{{ old('npsn') ?? $satpenProfile->npsn }}" readonly>
                                    <div class="invalid-feedback">
                                        @error('npsn') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-2">
                                    <label for="nm_satpen" class="form-label">Nama Satpen</label>
                                    <input type="text" class="form-control form-control-sm @error('nm_satpen') is-invalid @enderror" id="nm_satpen" name="nm_satpen" value="{{ old('nm_satpen') ?? $satpenProfile->nm_satpen }}">
                                    <div class="invalid-feedback">
                                        @error('nm_satpen') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-2">
                                    <label for="yayasan" class="form-label">Yayasan</label>
                                    <select class="form-select form-select-sm @error('yayasan') is-invalid @enderror" name="yayasan">
                                        <option value="BHPNU" {{$satpenProfile->yayasan == 'BHPNU' ? 'selected' : ''}}>BHPNU</option>
                                        <option value="non bhpnu" {{$satpenProfile->yayasan != 'BHPNU' ? 'selected' : ''}}>Non BHPNU</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('yayasan') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-2">
                                    <label for="jenjang" class="form-label">Jenjang Pendidikan</label>
                                    <select class="form-select form-select-sm @error('jenjang') is-invalid @enderror" name="jenjang">
                                        @foreach($jenjang as $row)
                                            <option value="{{ $row->id_jenjang }}" {{$satpenProfile->id_jenjang == $row->id_jenjang ? 'selected' : ''}}>{{ $row->nm_jenjang }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('jenjang') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-2">
                                    <label for="propinsi" class="form-label">Propinsi</label>
                                    <select class="form-select form-select-sm @error('propinsi') is-invalid @enderror" name="propinsi">
                                        @foreach($propinsi as $row)
                                            <option value="{{ $row->id_prov }}" {{$satpenProfile->id_prov == $row->id_prov ? 'selected' : ''}}>{{ $row->nm_prov }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('propinsi') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-2">
                                    <label for="kabupaten" class="form-label">Kabupaten</label>
                                    <select class="form-select form-select-sm @error('kabupaten') is-invalid @enderror" name="kabupaten">
                                        @foreach($kabupaten as $row)
                                            <option value="{{ $row->id_kab }}" {{$satpenProfile->id_kab == $row->id_kab ? 'selected' : ''}}>{{ $row->nama_kab }}</option>
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
                                <div class="mb-2">
                                    <label for="cabang" class="form-label">Cabang</label>
                                    <select class="form-select form-select-sm @error('cabang') is-invalid @enderror" name="cabang">
                                        @foreach($cabang as $row)
                                            <option value="{{ $row->id_pc }}" {{$satpenProfile->id_pc == $row->id_pc ? 'selected' : ''}}>{{ $row->nama_pc }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('cabang') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-2">
                                    <label for="kecamatan" class="form-label">Kecamatan</label>
                                    <input type="text" class="form-control form-control-sm @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" value="{{ old('kecamatan') ?? $satpenProfile->kecamatan }}">
                                    <div class="invalid-feedback">
                                        @error('kecamatan') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-2">
                                    <label for="kelurahan" class="form-label">Kelurahan</label>
                                    <input type="text" class="form-control form-control-sm @error('kelurahan') is-invalid @enderror" id="kelurahan" name="kelurahan" value="{{ old('kelurahan') ?? $satpenProfile->kelurahan }}">
                                    <div class="invalid-feedback">
                                        @error('kelurahan') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-2">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control form-control-sm @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') ?? $satpenProfile->alamat }}">
                                    <div class="invalid-feedback">
                                        @error('alamat') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-2">
                                    <label for="kepsek" class="form-label">Kepala Sekolah</label>
                                    <input type="text" class="form-control form-control-sm @error('kepsek') is-invalid @enderror" id="kepsek" name="kepsek" value="{{ old('kepsek') ?? $satpenProfile->kepsek }}">
                                    <div class="invalid-feedback">
                                        @error('kepsek') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-2">
                                    <label for="thn_berdiri" class="form-label">Tahun Berdiri</label>
                                    <input type="text" class="form-control form-control-sm @error('thn_berdiri') is-invalid @enderror" id="thn_berdiri" name="thn_berdiri" value="{{ old('thn_berdiri') ?? $satpenProfile->thn_berdiri }}">
                                    <div class="invalid-feedback">
                                        @error('thn_berdiri') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-2">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') ?? $satpenProfile->email }}">
                                    <div class="invalid-feedback">
                                        @error('email') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-2">
                                    <label for="telp" class="form-label">Telpon</label>
                                    <input type="text" class="form-control form-control-sm @error('telp') is-invalid @enderror" id="telp" name="telp" value="{{ old('telp') ?? $satpenProfile->telpon }}">
                                    <div class="invalid-feedback">
                                        @error('telp') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-2">
                                    <label for="aset_tanah" class="form-label">Aset Tanah</label>
                                    <select class="form-select form-select-sm @error('aset_tanah') is-invalid @enderror" name="aset_tanah">
                                        <option value="jamiyah">Jamiyah</option>
                                        <option value="masyarakat nu">Masyarakat NU</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('aset_tanah') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-2">
                                    <label for="nm_pemilik" class="form-label">Nama Pemilik</label>
                                    <input type="text" class="form-control form-control-sm @error('nm_pemilik') is-invalid @enderror" id="nm_pemilik" name="nm_pemilik" value="{{ old('nm_pemilik') ?? $satpenProfile->nm_pemilik  }}">
                                    <div class="invalid-feedback">
                                        @error('nm_pemilik') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-2">
                                    <label for="fax" class="form-label">Fax</label>
                                    <input type="text" class="form-control form-control-sm @error('fax') is-invalid @enderror" id="fax" name="fax" value="{{ old('fax') ?? $satpenProfile->fax }}">
                                    <div class="invalid-feedback">
                                        @error('fax') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h5 class="my-3">Surat Permohonan</h5>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-2">
                                    <label for="no_srt_permohonan" class="form-label">Nomor Surat</label>
                                    <input type="text" class="form-control form-control-sm @error('no_srt_permohonan') is-invalid @enderror" id="no_srt_permohonan" name="no_srt_permohonan" value="{{ old('no_srt_permohonan') ?? $satpenProfile->filereg[0]->nomor_surat }}">
                                    <div class="invalid-feedback">
                                        @error('no_srt_permohonan') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-2">
                                    <label for="tgl_srt_permohonan" class="form-label">Tanggal Surat</label>
                                    <input type="date" class="form-control form-control-sm @error('tgl_srt_permohonan') is-invalid @enderror" id="tgl_srt_permohonan" name="tgl_srt_permohonan" value="{{ old('tgl_srt_permohonan') ?? $satpenProfile->filereg[0]->tgl_surat }}">
                                    <div class="invalid-feedback">
                                        @error('tgl_srt_permohonan') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-2">
                                    <label for="file_permohonan" class="form-label">File Permohonan</label>
                                    <input type="file" class="form-control form-control-sm @error('file_permohonan') is-invalid @enderror" id="file_permohonan" name="file_permohonan">
                                    <div class="invalid-feedback">
                                        @error('file_permohonan') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5 class="my-3">Rekomendasi Cabang</h5>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-2">
                                    <label for="nm_rekom_pc" class="form-label">Pemberi Rekomendasi</label>
                                    <select class="form-select form-select-sm @error('nm_rekom_pc') is-invalid @enderror" id="nm_rekom_pc" name="nm_rekom_pc">
                                        <option value="PCNU" {{$satpenProfile->filereg[1]->nm_lembaga == 'PCNU' ? 'selected' : ''}}>PCNU</option>
                                        <option value="LP Ma'arif PCNU" {{$satpenProfile->filereg[1]->nm_lembaga == "LP Ma'arif PCNU" ? 'selected' : ''}}>LP Ma'arif PCNU</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('nm_rekom_pc') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="cabang_rekom_pc" class="form-label">Nama Cabang</label>
                                <select class="form-select form-select-sm @error('cabang_rekom_pc') is-invalid @enderror" name="cabang_rekom_pc">
                                    @foreach($cabang as $row)
                                        <option value="{{ $row->nama_pc }}" {{$satpenProfile->filereg[1]->daerah == $row->nama_pc ? 'selected' : ''}}>{{ $row->nama_pc }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    @error('cabang_rekom_pc') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-2">
                                    <label for="no_srt_rekom_pc" class="form-label">Nomor Surat</label>
                                    <input type="text" class="form-control form-control-sm @error('no_srt_rekom_pc') is-invalid @enderror" id="no_srt_rekom_pc" name="no_srt_rekom_pc" value="{{ old('no_srt_rekom_pc') ?? $satpenProfile->filereg[1]->nomor_surat }}">
                                    <div class="invalid-feedback">
                                        @error('no_srt_rekom_pc') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-2">
                                    <label for="tgl_srt_rekom_pc" class="form-label">Tanggal Surat</label>
                                    <input type="date" class="form-control form-control-sm @error('tgl_srt_rekom_pc') is-invalid @enderror" id="tgl_srt_rekom_pc" name="tgl_srt_rekom_pc" value="{{ old('no_srt_rekom_pc') ?? $satpenProfile->filereg[1]->tgl_surat }}">
                                    <div class="invalid-feedback">
                                        @error('tgl_srt_rekom_pc') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-2">
                                    <label for="file_rekom_pc" class="form-label">File Rekomendasi PC</label>
                                    <input type="file" class="form-control form-control-sm @error('file_rekom_pc') is-invalid @enderror" id="file_rekom_pc" name="file_rekom_pc">
                                    <div class="invalid-feedback">
                                        @error('file_rekom_pc') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5 class="my-3">Rekomendasi Wilayah</h5>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-2">
                                    <label for="nm_rekom_pw" class="form-label">Pemberi Rekomendasi</label>
                                    <select class="form-select form-select-sm @error('nm_rekom_pw') is-invalid @enderror" id="nm_rekom_pw" name="nm_rekom_pw">
                                        <option value="PWNU" {{$satpenProfile->filereg[1]->nm_lembaga == 'PWNU' ? 'selected' : ''}}>PWNU</option>
                                        <option value="LP Ma'arif PWNU" {{$satpenProfile->filereg[1]->nm_lembaga == "LP Ma'arif PWNU" ? 'selected' : ''}}>LP Ma'arif PWNU</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('nm_rekom_pw') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="wilayah_rekom_pw" class="form-label">Nama Wilayah</label>
                                <select class="form-select form-select-sm @error('wilayah_rekom_pw') is-invalid @enderror" name="wilayah_rekom_pw">
                                    @foreach($propinsi as $row)
                                        <option value="{{ $row->nm_prov }}" {{$satpenProfile->filereg[2]->daerah == $row->nm_prov ? 'selected' : ''}}>{{ $row->nm_prov }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    @error('wilayah_rekom_pw') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="mb-2">
                                    <label for="no_srt_rekom_pw" class="form-label">Nomor Surat</label>
                                    <input type="text" class="form-control form-control-sm @error('no_srt_rekom_pw') is-invalid @enderror" id="no_srt_rekom_pw" name="no_srt_rekom_pw" value="{{ old('no_srt_rekom_pw') ?? $satpenProfile->filereg[2]->nomor_surat }}">
                                    <div class="invalid-feedback">
                                        @error('no_srt_rekom_pw') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="mb-2">
                                    <label for="tgl_srt_rekom_pw" class="form-label">Tanggal Surat</label>
                                    <input type="date" class="form-control form-control-sm @error('tgl_srt_rekom_pw') is-invalid @enderror" id="tgl_srt_rekom_pw" name="tgl_srt_rekom_pw" value="{{ old('tgl_srt_rekom_pw') ?? $satpenProfile->filereg[2]->tgl_surat }}">
                                    <div class="invalid-feedback">
                                        @error('tgl_srt_rekom_pw') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-2">
                                    <label for="file_rekom_pw" class="form-label">File Rekomendasi PW</label>
                                    <input type="file" class="form-control form-control-sm @error('file_rekom_pw') is-invalid @enderror" id="file_rekom_pw" name="file_rekom_pw">
                                    <div class="invalid-feedback">
                                        @error('file_rekom_pw') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-sm fs-3 rounded-2 mt-2">Simpan Perubahan</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
