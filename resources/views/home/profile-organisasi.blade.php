@extends('template.layout', [
    'title' => 'Sipinter - Profile Organisasi'
])

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
                    <li><a href="#"><span class=" fa fa-info-circle"> </span> Dashboard</a></li>
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> Profile Organisasi</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <div class="card" style="min-height:30rem;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title fw-semibold mb-1">Profile Organisasi</h5>
                            <small>lengkapi data profile organisasi</small>
                        </div>
                    </div>
                        
                    <div class="row mt-3">
                        <div class="col-12">
                            <form action="{{ route('profile.save') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="mb-3">
                                            <label for="nm_wilayah" class="form-label">Nama Wilayah</label>
                                            <input type="hidden" name="id_pw" value="{{ $data->id_prov }}">
                                            <input type="text" class="form-control  @error('nm_wilayah') is-invalid @enderror" id="nm_wilayah" name="nm_wilayah" value="{{ $data->nm_prov }}" placeholder="Nama Wilayah" readonly>
                                            <div class="invalid-feedback">
                                                @error('nm_wilayah') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="mb-3">
                                            <label for="kabupaten" class="form-label required">Kabupaten</label>
                                            <input type="text" class="form-control  @error('kabupaten') is-invalid @enderror" id="kabupaten" name="kabupaten" value="{{ $data->profile?->kabupaten }}" placeholder="Kabupaten">
                                            <div class="invalid-feedback">
                                                @error('kabupaten') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="mb-3">
                                            <label for="kecamatan" class="form-label required">Kecamatan</label>
                                            <input type="text" class="form-control  @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" value="{{ $data->profile?->kecamatan }}" placeholder="Kecamatan">
                                            <div class="invalid-feedback">
                                                @error('kecamatan') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="mb-3">
                                            <label for="kelurahan" class="form-label required">Kelurahan</label>
                                            <input type="text" class="form-control  @error('kelurahan') is-invalid @enderror" id="kelurahan" name="kelurahan" value="{{ $data->profile?->kelurahan }}" placeholder="Kelurahan">
                                            <div class="invalid-feedback">
                                                @error('kelurahan') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label required">Alamat</label>
                                            <input type="text" class="form-control  @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ $data->profile?->alamat }}" placeholder="Alamat">
                                            <div class="invalid-feedback">
                                                @error('alamat') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="mb-3">
                                            <label for="bujur" class="form-label">Longitude</label>
                                            <input type="text" class="form-control  @error('bujur') is-invalid @enderror" id="bujur" name="bujur" value="{{ $data->profile?->bujur }}" placeholder="Bujur">
                                            <div class="invalid-feedback">
                                                @error('bujur') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="mb-3">
                                            <label for="lintang" class="form-label">Latitude</label>
                                            <input type="text" class="form-control  @error('lintang') is-invalid @enderror" id="lintang" name="lintang" value="{{ $data->profile?->lintang }}" placeholder="Lintang">
                                            <div class="invalid-feedback">
                                                @error('lintang') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="website" class="form-label">Website</label>
                                            <input type="text" class="form-control  @error('website') is-invalid @enderror" id="website" name="website" value="{{ $data->profile?->website }}" placeholder="Website">
                                            <div class="invalid-feedback">
                                                @error('website') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="mb-3">
                                            <label for="ketua" class="form-label required">Nama Ketua</label>
                                            <input type="text" class="form-control  @error('ketua') is-invalid @enderror" id="ketua" name="ketua" value="{{ $data->profile?->ketua }}" placeholder="Nama Ketua">
                                            <div class="invalid-feedback">
                                                @error('ketua') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="mb-3">
                                            <label for="telp_ketua" class="form-label required">Nomor Telpon Ketua</label>
                                            <input type="text" class="form-control  @error('telp_ketua') is-invalid @enderror" id="telp_ketua" name="telp_ketua" value="{{ $data->profile?->telp_ketua }}" placeholder="Nomor Telpon Ketua">
                                            <div class="invalid-feedback">
                                                @error('telp_ketua') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="mb-3">
                                            <label for="wakil_ketua" class="form-label required">Wakil Ketua</label>
                                            <input type="text" class="form-control  @error('wakil_ketua') is-invalid @enderror" id="wakil_ketua" name="wakil_ketua" value="{{ $data->profile?->wakil_ketua }}" placeholder="Wakil Ketua">
                                            <div class="invalid-feedback">
                                                @error('wakil_ketua') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="mb-3">
                                            <label for="telp_wakil" class="form-label required">Nomor Telpon Wakil</label>
                                            <input type="text" class="form-control  @error('telp_wakil') is-invalid @enderror" id="telp_wakil" name="telp_wakil" value="{{ $data->profile?->telp_wakil }}" placeholder="Nomor Telpon Wakil">
                                            <div class="invalid-feedback">
                                                @error('telp_wakil') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="mb-3">
                                            <label for="sekretaris" class="form-label required">Sekretaris</label>
                                            <input type="text" class="form-control  @error('sekretaris') is-invalid @enderror" id="sekretaris" name="sekretaris" value="{{ $data->profile?->sekretaris }}" placeholder="Sekretaris">
                                            <div class="invalid-feedback">
                                                @error('sekretaris') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="mb-3">
                                            <label for="telp_sekretaris" class="form-label required">Nomor Telpon Sekretaris</label>
                                            <input type="text" class="form-control  @error('telp_sekretaris') is-invalid @enderror" id="telp_sekretaris" name="telp_sekretaris" value="{{ $data->profile?->telp_sekretaris }}" placeholder="Nomor Telpon Sekretaris">
                                            <div class="invalid-feedback">
                                                @error('telp_sekretaris') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="mb-3">
                                            <label for="bendahara" class="form-label required">Bendahara</label>
                                            <input type="text" class="form-control  @error('bendahara') is-invalid @enderror" id="bendahara" name="bendahara" value="{{ $data->profile?->bendahara }}" placeholder="Bedahara">
                                            <div class="invalid-feedback">
                                                @error('bendahara') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="mb-3">
                                            <label for="telp_bendahara" class="form-label required">Nomor Telpon Bendahara</label>
                                            <input type="text" class="form-control  @error('telp_bendahara') is-invalid @enderror" id="telp_bendahara" name="telp_bendahara" value="{{ $data->profile?->telp_bendahara }}" placeholder="Nomor Telpon Bendahara">
                                            <div class="invalid-feedback">
                                                @error('telp_bendahara') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="ti ti-device-floppy"></i> Simpan Profile</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                       
                </div>
            </div>

        </div>
    </div>
@endsection
