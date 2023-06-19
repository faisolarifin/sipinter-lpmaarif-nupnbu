@extends('template.general', [
    'title' => 'Siapin - Register'
])
@section('container')
<div class="d-flex flex-column align-items-center">
    <div class="container-fluid login-side-right">
        <div class="row justify-content-sm-center align-items-center" style="height:25vh;">
            <div class="col-sm-10">
                <a href="./index.html" class="text-nowrap logo-img d-block py-2 w-100">
                    <img src="{{ asset('assets/images/logos/logo.png') }}" width="210" alt="">
                    <h6 class="fw-bold">Sistem Administrasi Pendidikan LP Ma'arif Nahdlatul Ulama</h6>
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mx-auto w-75" style="margin-top:-2rem;">
                    <div class="card-body">
                        <h5 class="fw-medium mb-0">Registrasi Satpen</h5>
                        <small>lengkapi kolom untuk registrasi satpen anda</small>
                        <div class="mt-3">
                            @include('template.alert')
                        </div>
                        <form class="mt-3" action="{{ route('register.proses') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="mb-2">
                                        <label for="npsn" class="form-label">NPSN</label>
                                        <input type="text" class="form-control form-control-sm @error('npsn') is-invalid @enderror" id="npsn" name="npsn" value="{{ $cookieValue->npsn }}" readonly>
                                        <div class="invalid-feedback">
                                            @error('npsn') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="mb-2">
                                        <label for="nm_satpen" class="form-label">Nama Satpen</label>
                                        <input type="text" class="form-control form-control-sm @error('nm_satpen') is-invalid @enderror" id="nm_satpen" name="nm_satpen" value="{{ $cookieValue->nama_sekolah }}">
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
                                            <option value="1">BHPNU</option>
                                            <option value="2">Non BHPNU</option>
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
                                                <option value="{{ $row->id_jenjang }}">{{ $row->nm_jenjang }}</option>
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
                                                <option value="{{ $row->kode_prov_kd }}" {{ $row->kode_prov_kd == $cookieValue->kode_prop ? 'selected' : '' }}>{{ $row->nm_prov }}</option>
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
                                                <option value="{{ $row->kode_kab_kd }}">{{ $row->nama_kab }}</option>
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
                                        <label for="kecamatan" class="form-label">Kecamatan</label>
                                        <input type="text" class="form-control form-control-sm @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" value="{{ $cookieValue->kecamatan }}">
                                        <div class="invalid-feedback">
                                            @error('kecamatan') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="mb-2">
                                        <label for="kelurahan" class="form-label">Kelurahan</label>
                                        <input type="text" class="form-control form-control-sm @error('kelurahan') is-invalid @enderror" id="kelurahan" name="kelurahan" value="{{ old('kelurahan') }}">
                                        <div class="invalid-feedback">
                                            @error('kelurahan') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="text" class="form-control form-control-sm @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ $cookieValue->alamat_jalan }}">
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
                                        <input type="text" class="form-control form-control-sm @error('kepsek') is-invalid @enderror" id="kepsek" name="kepsek" value="{{ old('kepsek') }}">
                                        <div class="invalid-feedback">
                                            @error('kepsek') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="mb-2">
                                        <label for="thn_berdiri" class="form-label">Tahun Berdiri</label>
                                        <input type="text" class="form-control form-control-sm @error('thn_berdiri') is-invalid @enderror" id="thn_berdiri" name="thn_berdiri" value="{{ old('thn_berdiri') }}">
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
                                        <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                        <div class="invalid-feedback">
                                            @error('email') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="mb-2">
                                        <label for="telp" class="form-label">Telpon</label>
                                        <input type="text" class="form-control form-control-sm @error('telp') is-invalid @enderror" id="telp" name="telp" value="{{ old('telp') }}">
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
                                        <input type="text" class="form-control form-control-sm @error('nm_pemilik') is-invalid @enderror" id="nm_pemilik" name="nm_pemilik" value="{{ old('aset_tanah') }}">
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
                                        <input type="text" class="form-control form-control-sm @error('fax') is-invalid @enderror" id="fax" name="fax" value="{{ old('fax') }}">
                                        <div class="invalid-feedback">
                                            @error('fax') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="mb-2">
                                        <label for="password" class="form-label">Password Akun</label>
                                        <input type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" id="password" name="password">
                                        <div class="invalid-feedback">
                                            @error('password') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary fs-4 rounded-2">Daftar</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid login-side-right mt-4">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="py-6 px-6">
                    <p class="mb-0 fs-4 py-3"> Copyright &copy; {{ date('Y') }} Siapin LP Ma'arif NU </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
