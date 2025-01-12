<div class="tab d-none">
    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="lokasi_usaha" class="form-label">Lokasi Kegiatan Usaha</label>
                <select class="form-select  @error('lokasi_usaha') is-invalid @enderror" name="lokasi_usaha" required>
                    <option value="Darat" {{ $oss->lokasi_usaha=='Darat' ? 'selected' : '' }}>Darat</option>
                    <option value="Laut" {{ $oss->lokasi_usaha=='Laut' ? 'selected' : '' }}>Laut</option>
                </select>
                <div class="invalid-feedback">
                    @error('lokasi_usaha') {{ $message }} @enderror
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="luas_lahan_usaha" class="form-label">Luas lahan yang digunakan untuk kegiatan usaha (M2)</label>
                <input type="text" class="form-control  @error('luas_lahan_usaha') is-invalid @enderror" id="luas_lahan_usaha" name="luas_lahan_usaha" value="{{ $oss->luas_lahan_usaha ? $oss->luas_lahan_usaha : old('luas_lahan_usaha') }}" placeholder="Luas lahan yang digunakan untuk kegiatan usaha (M2)" required>
                <small>~ pastikan luas yang anda input dengan luas shape file peta polygon yang anda unggah sudah sesuai agar tidak ditolah oleh sistem OSS</small>
                <div class="invalid-feedback">
                    @error('luas_lahan_usaha') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="apakah_sudah_menempati_lahan" class="form-label">Apakah Anda sudah menempati lahan tersebut?</label>
                <select class="form-select  @error('apakah_sudah_menempati_lahan') is-invalid @enderror" name="apakah_sudah_menempati_lahan" required>
                    <option value="Sudah" {{ $oss->apakah_sudah_menempati_lahan=='Sudah' ? 'selected' : '' }}>Sudah</option>
                    <option value="Belum" {{ $oss->apakah_sudah_menempati_lahan=='Belum' ? 'selected' : '' }}>Belum</option>
                </select>
                <div class="invalid-feedback">
                    @error('apakah_sudah_menempati_lahan') {{ $message }} @enderror
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="status_lahan" class="form-label">Status Lahan</label>
                <select class="form-select  @error('status_lahan') is-invalid @enderror" name="status_lahan" id="status_lahan" required>
                    <option value="Milik Sendiri" {{ $oss->status_lahan=='Milik Sendiri' ? 'selected' : '' }}>Milik Sendiri</option>
                    <option value="Sewa" {{ $oss->status_lahan=='Sewa' ? 'selected' : '' }}>Sewa</option>
                    <option value="Pinjam Pakai" {{ $oss->status_lahan=='Pinjam Pakai' ? 'selected' : '' }}>Pinjam Pakai</option>
                </select>
                <div class="invalid-feedback">
                    @error('status_lahan') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row-milik-sendiri">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="ms_instansi_izin" class="form-label">Nama Instansi Penerbit Izin</label>
                    <input type="text" class="form-control  @error('ms_instansi_izin') is-invalid @enderror" id="ms_instansi_izin" name="ms_instansi_izin" value="{{ $oss->ms_instansi_izin ? $oss->ms_instansi_izin : old('ms_instansi_izin') }}" placeholder="Nama Instansi Penerbit Izin">
                    <div class="invalid-feedback">
                        @error('ms_instansi_izin') {{ $message }} @enderror
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="ms_nomor_izin" class="form-label">Nomor Izin yang tertera pada surat</label>
                    <input type="text" class="form-control  @error('ms_nomor_izin') is-invalid @enderror" id="ms_nomor_izin" name="ms_nomor_izin" value="{{ $oss->ms_nomor_izin ? $oss->ms_nomor_izin : old('ms_nomor_izin') }}" placeholder="Nomor Izin yang tertera pada surat">
                    <div class="invalid-feedback">
                        @error('ms_nomor_izin') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="ms_tgl_terbit" class="form-label">Tanggal Terbit</label>
                    <input type="date" class="form-control  @error('ms_tgl_terbit') is-invalid @enderror" id="ms_tgl_terbit" name="ms_tgl_terbit" value="{{ $oss->ms_tgl_terbit ? $oss->ms_tgl_terbit : old('ms_tgl_terbit') }}" placeholder="Tanggal Terbit">
                    <div class="invalid-feedback">
                        @error('ms_tgl_terbit') {{ $message }} @enderror
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="ms_tgl_expired" class="form-label">Tanggal habis masa berlaku</label>
                    <input type="date" class="form-control  @error('ms_tgl_expired') is-invalid @enderror" id="ms_tgl_expired" name="ms_tgl_expired" value="{{ $oss->ms_tgl_expired ? $oss->ms_tgl_expired : old('ms_tgl_expired') }}" placeholder="Tanggal habis masa berlaku">
                    <div class="invalid-feedback">
                        @error('ms_tgl_expired') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="ms_file_lampiran" class="form-label">Lampiran File HGU/HGB/SHM/Lainnya</label>
                    <input type="file" class="form-control  @error('ms_file_lampiran') is-invalid @enderror" id="ms_file_lampiran" name="ms_file_lampiran" value="{{ old('ms_file_lampiran') }}">
                    <small>~ bukti penguasaan lahan. dapat berupa HGU, HGB, Sertifikat, atau bukti lain yang Anda miliki</small>
                    <div class="invalid-feedback">
                        @error('ms_file_lampiran') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row-sewa" style="display:none;">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="sw_pemilik_lahan" class="form-label">Nama Pemilik Lahan</label>
                    <input type="text" class="form-control  @error('sw_pemilik_lahan') is-invalid @enderror" id="sw_pemilik_lahan" name="sw_pemilik_lahan" value="{{ $oss->sw_pemilik_lahan ? $oss->sw_pemilik_lahan : old('sw_pemilik_lahan') }}" placeholder="Nama Pemilik Lahan">
                    <div class="invalid-feedback">
                        @error('sw_pemilik_lahan') {{ $message }} @enderror
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="sw_nomor_perjanjian" class="form-label">Nomor Perjanjian</label>
                    <input type="text" class="form-control  @error('sw_nomor_perjanjian') is-invalid @enderror" id="sw_nomor_perjanjian" name="sw_nomor_perjanjian" value="{{ $oss->sw_nomor_perjanjian ? $oss->sw_nomor_perjanjian : old('sw_nomor_perjanjian') }}" placeholder="Nomor Perjanjian">
                    <div class="invalid-feedback">
                        @error('sw_nomor_perjanjian') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="sw_tgl_perjanjian" class="form-label">Tanggal Perjanjian</label>
                    <input type="date" class="form-control  @error('sw_tgl_perjanjian') is-invalid @enderror" id="sw_tgl_perjanjian" name="sw_tgl_perjanjian" value="{{ $oss->sw_tgl_perjanjian ? $oss->sw_tgl_perjanjian : old('sw_tgl_perjanjian') }}" placeholder="Tanggal Perjanjian">
                    <div class="invalid-feedback">
                        @error('sw_tgl_perjanjian') {{ $message }} @enderror
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="sw_tgl_expired" class="form-label">Tanggal Habis Masa Berlaku</label>
                    <input type="date" class="form-control  @error('sw_tgl_expired') is-invalid @enderror" id="sw_tgl_expired" name="sw_tgl_expired" value="{{ $oss->sw_tgl_expired ? $oss->sw_tgl_expired : old('sw_tgl_expired') }}" placeholder="Tanggal Habis Masa Berlaku">
                    <div class="invalid-feedback">
                        @error('sw_tgl_expired') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="sw_file_lampiran" class="form-label">Lampiran File Perjanjian Sewa Lahan</label>
                    <input type="file" class="form-control  @error('sw_file_lampiran') is-invalid @enderror" id="sw_file_lampiran" name="sw_file_lampiran" value="{{ old('sw_file_lampiran') }}">
                    <small>~ Berupa Bukti Perjanjian Sewa Menyewa Lahan </small>
                    <div class="invalid-feedback">
                        @error('sw_file_lampiran') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row-pinjam-pakai" style="display:none;">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="pp_pemilik_lahan" class="form-label">Nama Pemilik Lahan</label>
                    <input type="text" class="form-control  @error('pp_pemilik_lahan') is-invalid @enderror" id="pp_pemilik_lahan" name="pp_pemilik_lahan" value="{{ $oss->pp_pemilik_lahan ? $oss->pp_pemilik_lahan : old('pp_pemilik_lahan') }}" placeholder="Nama Pemilik Lahan">
                    <div class="invalid-feedback">
                        @error('pp_pemilik_lahan') {{ $message }} @enderror
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="pp_nomor_perjanjian" class="form-label">Nomor Perjanjian</label>
                    <input type="text" class="form-control  @error('pp_nomor_perjanjian') is-invalid @enderror" id="pp_nomor_perjanjian" name="pp_nomor_perjanjian" value="{{ $oss->pp_nomor_perjanjian ? $oss->pp_nomor_perjanjian : old('pp_nomor_perjanjian') }}" placeholder="Nomor Perjanjian">
                    <div class="invalid-feedback">
                        @error('pp_nomor_perjanjian') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="pp_tgl_perjanjian" class="form-label">Tanggal Perjanjian</label>
                    <input type="date" class="form-control  @error('pp_tgl_perjanjian') is-invalid @enderror" id="pp_tgl_perjanjian" name="pp_tgl_perjanjian" value="{{ $oss->pp_tgl_perjanjian ? $oss->pp_tgl_perjanjian : old('pp_tgl_perjanjian') }}" placeholder="Tanggal Perjanjian">
                    <div class="invalid-feedback">
                        @error('pp_tgl_perjanjian') {{ $message }} @enderror
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="pp_tgl_expired" class="form-label">Tanggal Habis Masa Berlaku</label>
                    <input type="date" class="form-control  @error('pp_tgl_expired') is-invalid @enderror" id="pp_tgl_expired" name="pp_tgl_expired" value="{{ $oss->pp_tgl_expired ? $oss->pp_tgl_expired : old('pp_tgl_expired') }}" placeholder="Tanggal Habis Masa Berlaku">
                    <div class="invalid-feedback">
                        @error('pp_tgl_expired') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="pp_file_lampiran" class="form-label">Lampiran File Perjanjian Pinjam Pakai Lahan</label>
                    <input type="file" class="form-control  @error('pp_file_lampiran') is-invalid @enderror" id="pp_file_lampiran" name="pp_file_lampiran" value="{{ old('pp_file_lampiran') }}">
                    <small>~ Berupa Bukti Perjanjian Pinjam Pakai Lahan </small>
                    <div class="invalid-feedback">
                        @error('pp_file_lampiran') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
