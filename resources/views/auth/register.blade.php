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
                        <form class="mt-3">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="mb-2">
                                        <label for="npsn" class="form-label">NPSN</label>
                                        <input type="text" class="form-control form-control-sm" id="npsn" name="npsn">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="mb-2">
                                        <label for="nm_satpen" class="form-label">Nama Satpen</label>
                                        <input type="text" class="form-control form-control-sm" id="nm_satpen" name="nm_satpen">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="mb-2">
                                        <label for="yayasan" class="form-label">Yayasan</label>
                                        <select class="form-select form-select-sm" name="yayasan">
                                            <option value="1">BHPNU</option>
                                            <option value="2">Non BHPNU</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="mb-2">
                                        <label for="jenjang" class="form-label">Jenjang Pendidikan</label>
                                        <select class="form-select form-select-sm" name="jenjang">
                                            <option value="1">PAUD</option>
                                            <option value="2">RA</option>
                                            <option value="2">TK</option>
                                            <option value="2">SD</option>
                                            <option value="2">MI</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="mb-2">
                                        <label for="propinsi" class="form-label">Propinsi</label>
                                        <select class="form-select form-select-sm" name="propinsi">
                                            <option value="1">Jawa Timur</option>
                                            <option value="2">Jawa Tengah</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="mb-2">
                                        <label for="kabupaten" class="form-label">Kabupaten</label>
                                        <select class="form-select form-select-sm" name="kabupaten">
                                            <option value="1">Sumenep</option>
                                            <option value="2">Pamekasan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="mb-2">
                                        <label for="kecamatan" class="form-label">Kecamatan</label>
                                        <input type="text" class="form-control form-control-sm" id="kecamatan" name="kecamatan">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="mb-2">
                                        <label for="keluarahan" class="form-label">Kelurahan</label>
                                        <input type="text" class="form-control form-control-sm" id="keluarahan" name="keluarahan">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="text" class="form-control form-control-sm" id="alamat" name="alamat">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="mb-2">
                                        <label for="kepsek" class="form-label">Kepala Sekolah</label>
                                        <input type="text" class="form-control form-control-sm" id="kepsek" name="kepsek">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="mb-2">
                                        <label for="thn_berdiri" class="form-label">Tahun Berdiri</label>
                                        <input type="text" class="form-control form-control-sm" id="thn_berdiri" name="thn_berdiri">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="mb-2">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control form-control-sm" id="email" name="email">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="mb-2">
                                        <label for="telp" class="form-label">Telpon</label>
                                        <input type="text" class="form-control form-control-sm" id="telp" name="telp">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="mb-2">
                                        <label for="aset_tanah" class="form-label">Aset Tanah</label>
                                        <select class="form-select form-select-sm" name="aset_tanah">
                                            <option value="1">Milik Sendiri</option>
                                            <option value="2">Masyarakat NU</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="mb-2">
                                        <label for="nm_pemilik" class="form-label">Nama Pemilik</label>
                                        <input type="text" class="form-control form-control-sm" id="nm_pemilik" name="nm_pemilik">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="mb-2">
                                        <label for="fax" class="form-label">Fax</label>
                                        <input type="text" class="form-control form-control-sm" id="fax" name="fax">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="mb-2">
                                        <label for="password" class="form-label">Password Akun</label>
                                        <input type="password" class="form-control form-control-sm" id="password" name="password">
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
