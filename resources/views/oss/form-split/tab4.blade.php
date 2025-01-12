<div class="tab d-none">
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label for="apakah_lokasi_sekolah_lintas_perbatasan" class="form-label">Apakah Lokasi Sekolah berada dalam lintas provinsi/kabupaten/kota (Perbatasan)</label>
                <select class="form-select  @error('apakah_lokasi_sekolah_lintas_perbatasan') is-invalid @enderror" name="apakah_lokasi_sekolah_lintas_perbatasan" required>
                    <option value="Iya" {{ $oss->apakah_lokasi_sekolah_lintas_perbatasan=='Iya' ? 'selected' : '' }}>Iya</option>
                    <option value="Tidak" {{ $oss->apakah_lokasi_sekolah_lintas_perbatasan=='Tidak' ? 'selected' : '' }}>Tidak</option>
                </select>
                <div class="invalid-feedback">
                    @error('apakah_lokasi_sekolah_lintas_perbatasan') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="alamat_sekolah" class="form-label">Alamat Sekolah (Jalan/RT-RW)</label>
                <input type="text" class="form-control  @error('alamat_sekolah') is-invalid @enderror" id="alamat_sekolah" name="alamat_sekolah" value="{{ $oss->alamat_sekolah ? $oss->alamat_sekolah : old('alamat_sekolah') }}" placeholder="Alamat Sekolah (Jalan/RT-RW)" required>
                <div class="invalid-feedback">
                    @error('alamat_sekolah') {{ $message }} @enderror
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="propinsi" class="form-label">Propinsi</label>
                <input type="text" class="form-control  @error('propinsi') is-invalid @enderror" id="propinsi" name="propinsi" value="{{ $oss->propinsi ? $oss->propinsi : old('propinsi') }}" placeholder="Propinsi" required>
                <div class="invalid-feedback">
                    @error('propinsi') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="kabupaten" class="form-label">Kabupaten/Kota</label>
                <input type="text" class="form-control  @error('kabupaten') is-invalid @enderror" id="kabupaten" name="kabupaten" value="{{ $oss->kabupaten ? $oss->kabupaten : old('kabupaten') }}" placeholder="Kabupaten/Kota" required>
                <div class="invalid-feedback">
                    @error('kabupaten') {{ $message }} @enderror
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="kecamatan" class="form-label">Kecamatan</label>
                <input type="text" class="form-control  @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" value="{{ $oss->kecamatan ? $oss->kecamatan : old('kecamatan') }}" placeholder="Kecamatan" required>
                <div class="invalid-feedback">
                    @error('kecamatan') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="kelurahan" class="form-label">Desa/Kelurahan</label>
                <input type="text" class="form-control  @error('kelurahan') is-invalid @enderror" id="kelurahan" name="kelurahan" value="{{ $oss->kelurahan ? $oss->kelurahan : old('kelurahan') }}" placeholder="Desa/Kelurahan" required>
                <div class="invalid-feedback">
                    @error('kelurahan') {{ $message }} @enderror
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="kode_pos" class="form-label">Kode Pos</label>
                <input type="text" class="form-control  @error('kode_pos') is-invalid @enderror" id="kode_pos" name="kode_pos" value="{{ $oss->kode_pos ? $oss->kode_pos : old('kode_pos') }}" placeholder="Kode Pos" required>
                <div class="invalid-feedback">
                    @error('kode_pos') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label for="file_peta_polygon" class="form-label">Lampiran File Peta Polygon</label>
                <input type="file" class="form-control  @error('file_peta_polygon') is-invalid @enderror" id="file_peta_polygon" name="file_peta_polygon" {{ !$oss->file_peta_polygon ? 'required' : '' }}>
                <small>~ Unggah file koordinat Polygon dalam bentuk "shp complete" lalu dikompres dalam bentuk zip (bukan rar).</small>
                <div class="invalid-feedback">
                    @error('file_peta_polygon') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label for="apakah_proyek_strategi_nasional" class="form-label">Apakah merupakan proyek Strategis Nasional?</label>
                <select class="form-select  @error('apakah_proyek_strategi_nasional') is-invalid @enderror" name="apakah_proyek_strategi_nasional" required>
                    <option value="Iya" {{ $oss->apakah_proyek_strategi_nasional=='Iya' ? 'selected' : '' }}>Iya</option>
                    <option value="Tidak" {{ $oss->apakah_proyek_strategi_nasional=='Tidak' ? 'selected' : '' }}>Tidak</option>
                </select>
                <div class="invalid-feedback">
                    @error('apakah_proyek_strategi_nasional') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label for="rencana_teknis_bangunan" class="form-label">Rencana teknis bangunan/rencana induk kawasan</label>
                <input type="file" class="form-control  @error('rencana_teknis_bangunan') is-invalid @enderror" id="rencana_teknis_bangunan" name="rencana_teknis_bangunan" accept=".pdf" {{ !$oss->rencana_teknis_bangunan ? 'required' : '' }}>
                <div class="invalid-feedback">
                    @error('rencana_teknis_bangunan') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label for="kawasan_lokasi_usaha" class="form-label">Kawasan Lokasi Usaha</label>
                <select class="form-select  @error('kawasan_lokasi_usaha') is-invalid @enderror" name="kawasan_lokasi_usaha" id="kawasan_lokasi_usaha" required>
                    <option value="Diluar Kawasan" {{ $oss->kawasan_lokasi_usaha=='Diluar Kawasan' ? 'selected' : '' }}>Diluar Kawasan</option>
                    <option value="Didalam Kawasan" {{ $oss->kawasan_lokasi_usaha=='Didalam Kawasan' ? 'selected' : '' }}>Didalam Kawasan</option>
                </select>
                <div class="invalid-feedback">
                    @error('kawasan_lokasi_usaha') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row row-kli" style="display: none;">
        <div class="col-12">
            <div class="mb-3">
                <label for="klu_nama_kawasan_industri" class="form-label">Nama Kawasan Industri</label>
                <input type="text" class="form-control  @error('klu_nama_kawasan_industri') is-invalid @enderror" id="klu_nama_kawasan_industri" name="klu_nama_kawasan_industri" value="{{ $oss->klu_nama_kawasan_industri ? $oss->klu_nama_kawasan_industri : old('klu_nama_kawasan_industri') }}" placeholder="Nama Kawasan Industri">
                <div class="invalid-feedback">
                    @error('klu_nama_kawasan_industri') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

</div>
