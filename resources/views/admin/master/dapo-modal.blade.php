<div class="modal fade" id="modalDapo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Dapo Pokok</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dapo.save') }}" method="post">
                <div class="modal-body pb-1">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <label for="npsn" class="form-label required">NPSN</label>
                            <input type="text" class="form-control @error('npsn') is-invalid @enderror" id="npsn" name="npsn" value="{{ old('npsn') }}" placeholder="NPSN" required>
                            <div class="invalid-feedback">
                                @error('npsn') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="nama_sekolah" class="form-label required">Nama Sekolah</label>
                            <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" id="nama_sekolah" name="nama_sekolah" value="{{ old('nama_sekolah') }}" placeholder="Nama Sekolah" required>
                            <div class="invalid-feedback">
                                @error('nama_sekolah') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <label for="nama_yayasan" class="form-label required">Nama Yayasan</label>
                            <input type="text" class="form-control @error('nama_yayasan') is-invalid @enderror" id="nama_yayasan" name="nama_yayasan" value="{{ old('nama_yayasan') }}" placeholder="Nama Yayasan" required>
                            <div class="invalid-feedback">
                                @error('nama_yayasan') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="tgl_expired" class="form-label required">Bentuk Pendidikan</label>
                            <select class="form-select @error('bentuk_pendidikan') is-invalid @enderror" id="bentuk_pendidikan" name="bentuk_pendidikan">
                                <option value="PAUD">PAUD</option>
                                <option value="KB">KB</option>
                                <option value="TPQ">TPQ</option>
                                <option value="RA">RA</option>
                                <option value="TK">TK</option>
                                <option value="SD">SD</option>
                                <option value="MI">MI</option>
                                <option value="SMP">SMP</option>
                                <option value="MTs">MTs</option>
                                <option value="MA">MA</option>
                                <option value="SMA">SMA</option>
                                <option value="SMK">SMK</option>
                                <option value="MD">MD</option>
                                <option value="SLB">SLB</option>
                                <option value="PT">PT</option>
                            </select>
                            <div class="invalid-feedback">
                                @error('bentuk_pendidikan') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <label for="propinsi" class="form-label required">Propinsi</label>
                            <input type="text" class="form-control @error('propinsi') is-invalid @enderror" id="propinsi" name="propinsi" value="{{ old('propinsi') }}" placeholder="Propinsi" required>
                            <div class="invalid-feedback">
                                @error('propinsi') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="kabupaten" class="form-label required">Kabupaten</label>
                            <input type="text" class="form-control @error('kabupaten') is-invalid @enderror" id="kabupaten" name="kabupaten" value="{{ old('kabupaten') }}" placeholder="Kabupaten" required>
                            <div class="invalid-feedback">
                                @error('kabupaten') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <label for="kecamatan" class="form-label required">Kecamatan</label>
                            <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" value="{{ old('kecamatan') }}" placeholder="Kecamatan" required>
                            <div class="invalid-feedback">
                                @error('kecamatan') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="kelurahan" class="form-label required">Keluarahan</label>
                            <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" id="kelurahan" name="kelurahan" value="{{ old('kelurahan') }}" placeholder="Kelurahan" required>
                            <div class="invalid-feedback">
                                @error('kelurahan') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <label for="alamat" class="form-label required">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') }}" placeholder="Alamat" required>
                            <div class="invalid-feedback">
                                @error('alamat') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
