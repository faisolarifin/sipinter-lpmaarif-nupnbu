<div class="tab d-none">
    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="apakah_memerlukan_bangunan_baru" class="form-label">Apakah memerlukan bangunan baru untuk kegiatan usaha ini ?</label>
                <select class="form-select  @error('apakah_memerlukan_bangunan_baru') is-invalid @enderror" name="apakah_memerlukan_bangunan_baru" required>
                    <option value="Iya" {{ $oss->apakah_memerlukan_bangunan_baru=='Iya' ? 'selected' : '' }}>Iya</option>
                    <option value="Tidak" {{ $oss->apakah_memerlukan_bangunan_baru=='Tidak' ? 'selected' : '' }}>Tidak</option>
                </select>
                <div class="invalid-feedback">
                    @error('apakah_memerlukan_bangunan_baru') {{ $message }} @enderror
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="sudah_ada_bangunan" class="form-label">Apakah Sudah Ada Bangunan ?</label>
                <select class="form-select  @error('sudah_ada_bangunan') is-invalid @enderror" name="sudah_ada_bangunan" required>
                    <option value="Sudah" {{ $oss->sudah_ada_bangunan=='Sudah' ? 'selected' : '' }}>Sudah</option>
                    <option value="Belum" {{ $oss->sudah_ada_bangunan=='Belum' ? 'selected' : '' }}>Belum</option>
                </select>
                <div class="invalid-feedback">
                    @error('sudah_ada_bangunan') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="status_bangunan_usaha" class="form-label">Status Bangunan Usaha</label>
                <select class="form-select  @error('status_bangunan_usaha') is-invalid @enderror" name="status_bangunan_usaha" required>
                    <option value="Milik Sendiri" {{ $oss->status_bangunan_usaha=='Milik Sendiri' ? 'selected' : '' }}>Milik Sendiri</option>
                    <option value="Sewa" {{ $oss->status_bangunan_usaha=='Sewa' ? 'selected' : '' }}>Sewa</option>
                    <option value="Pinjam Pakai" {{ $oss->status_bangunan_usaha=='Pinjam Pakai' ? 'selected' : '' }}>>Pinjam Pakai</option>
                </select>
                <div class="invalid-feedback">
                    @error('status_bangunan_usaha') {{ $message }} @enderror
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <div class="mb-3">
                    <label for="jumlah_bangunan" class="form-label">Jumlah Bangunan Anda? (Unit)</label>
                    <input type="text" class="form-control  @error('jumlah_bangunan') is-invalid @enderror" id="jumlah_bangunan" name="jumlah_bangunan" value="{{ $oss->jumlah_bangunan ? $oss->jumlah_bangunan : old('jumlah_bangunan') }}" placeholder="Jumlah Bangunan Anda? (Unit)" required>
                    <small>Masukkan jumlah bangunan, bukan jumlah ruang kelas</small>
                    <div class="invalid-feedback">
                        @error('jumlah_bangunan') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label for="apakah_memiliki_imb" class="form-label">Apakah sudah memiliki IMB?</label>
                <select class="form-select  @error('apakah_memiliki_imb') is-invalid @enderror" name="apakah_memiliki_imb" id="apakah_memiliki_imb">
                    <option value="Iya" {{ $oss->apakah_memiliki_imb=='Iya' ? 'selected' : '' }}>Iya</option>
                    <option value="Tidak"  {{ $oss->apakah_memiliki_imb=='Tidak' || $oss->apakah_memiliki_imb == '' ? 'selected' : '' }}>Tidak</option>
                </select>
                <div class="invalid-feedback">
                    @error('apakah_memiliki_imb') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <!-- IMB -->
    <div class="row-imb" style="display:none;">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="imb_jml_bangunan" class="form-label">Jumlah bangunan yang sudah memiliki IMB? (unit)</label>
                    <input type="text" class="form-control  @error('imb_jml_bangunan') is-invalid @enderror" id="imb_jml_bangunan" name="imb_jml_bangunan" value="{{ $oss->imb_jml_bangunan ? $oss->imb_jml_bangunan : old('imb_jml_bangunan') }}" placeholder="Jumlah bangunan yang sudah memiliki IMB? (unit)">
                    <small>Jika jumlah bangunan yang sudah mendapatkan IMB lebih dari 1, maka IMB harus di upload semuanya masing masing File, bila tidak ada kosongkan</small>
                    <div class="invalid-feedback">
                        @error('imb_jml_bangunan') {{ $message }} @enderror
                    </div>
                </div>

            </div>
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="imb_pejabat_penerbit_izin" class="form-label">Nama Pejabat Penerbitan Izin IMB</label>
                    <input type="text" class="form-control  @error('imb_pejabat_penerbit_izin') is-invalid @enderror" id="imb_pejabat_penerbit_izin" name="imb_pejabat_penerbit_izin" value="{{ $oss->imb_pejabat_penerbit_izin ? $oss->imb_pejabat_penerbit_izin : old('imb_pejabat_penerbit_izin') }}" placeholder="Nama Pejabat Penerbitan Izin IMB">
                    <div class="invalid-feedback">
                        @error('imb_pejabat_penerbit_izin') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="imb_nomor" class="form-label">Nomor IMB</label>
                    <input type="text" class="form-control  @error('imb_nomor') is-invalid @enderror" id="imb_nomor" name="imb_nomor" value="{{ $oss->imb_nomor ? $oss->imb_nomor : old('imb_nomor') }}" placeholder="Nomor IMB">
                    <div class="invalid-feedback">
                        @error('imb_nomor') {{ $message }} @enderror
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="imb_tgl_terbit" class="form-label">Tanggal Terbit IMB</label>
                    <input type="date" class="form-control  @error('imb_tgl_terbit') is-invalid @enderror" id="imb_tgl_terbit" name="imb_tgl_terbit" value="{{ $oss->imb_tgl_terbit ? $oss->imb_tgl_terbit : old('imb_tgl_terbit') }}" placeholder="Tanggal Terbit IMB">
                    <div class="invalid-feedback">
                        @error('imb_tgl_terbit') {{ $message }} @enderror
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="imb_tgl_expired" class="form-label">Tanggal Expired IMB</label>
                    <input type="date" class="form-control  @error('imb_tgl_expired') is-invalid @enderror" id="imb_tgl_expired" name="imb_tgl_expired" value="{{ $oss->imb_tgl_expired ? $oss->imb_tgl_expired : old('imb_tgl_expired') }}" placeholder="Tanggal Expired IMB">
                    <div class="invalid-feedback">
                        @error('imb_tgl_expired') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="imb_file_lampiran" class="form-label">Lampiran File IMB</label>
                    <input type="file" class="form-control  @error('imb_file_lampiran') is-invalid @enderror" id="imb_file_lampiran" name="imb_file_lampiran" accept=".pdf" value="{{ old('imb_file_lampiran') }}">
                    <small>~ bukti penguasaan lahan. dapat berupa HGU, HGB, Sertifikat, atau bukti lain yang Anda miliki</small>
                    <div class="invalid-feedback">
                        @error('imb_file_lampiran') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END IMB -->

    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label for="apakah_memiliki_sertifikat_slf" class="form-label">Apakah sudah memiliki sertifikat SLF?</label>
                <select class="form-select  @error('apakah_memiliki_sertifikat_slf') is-invalid @enderror" name="apakah_memiliki_sertifikat_slf" id="apakah_memiliki_sertifikat_slf">
                    <option value="Iya" {{ $oss->apakah_memiliki_sertifikat_slf=='Iya' ? 'selected' : '' }}>Iya</option>
                    <option value="Tidak" {{ $oss->apakah_memiliki_sertifikat_slf=='Tidak' || $oss->apakah_memiliki_sertifikat_slf=='' ? 'selected' : '' }}>Tidak</option>
                </select>
                <div class="invalid-feedback">
                    @error('apakah_memiliki_sertifikat_slf') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <!-- SLF -->
    <div class="row-slf" style="display: none;">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="slf_pejabat_penerbit" class="form-label">Nama Pejabat Penerbit Sertifikat SLF</label>
                    <input type="text" class="form-control  @error('slf_pejabat_penerbit') is-invalid @enderror" id="slf_pejabat_penerbit" name="slf_pejabat_penerbit" value="{{ $oss->slf_pejabat_penerbit ? $oss->slf_pejabat_penerbit : old('slf_pejabat_penerbit') }}" placeholder="Nama Pejabat Penerbit Sertifikat SLF">
                    <div class="invalid-feedback">
                        @error('slf_pejabat_penerbit') {{ $message }} @enderror
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="slf_nomor" class="form-label">Nomor Sertifikat SLF</label>
                    <input type="text" class="form-control  @error('slf_nomor') is-invalid @enderror" id="slf_nomor" name="slf_nomor" value="{{ $oss->slf_nomor ? $oss->slf_nomor : old('slf_nomor') }}" placeholder="Nomor Sertifikat SLF">
                    <div class="invalid-feedback">
                        @error('slf_nomor') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="slf_tgl_terbit" class="form-label">Tanggal Terbit SLF</label>
                    <input type="date" class="form-control  @error('slf_tgl_terbit') is-invalid @enderror" id="slf_tgl_terbit" name="slf_tgl_terbit" value="{{ $oss->slf_tgl_terbit ? $oss->slf_tgl_terbit : old('slf_tgl_terbit') }}" placeholder="Tanggal Terbit SLF">
                    <div class="invalid-feedback">
                        @error('slf_tgl_terbit') {{ $message }} @enderror
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="slf_tgl_expired" class="form-label">Tanggal Expired SLF</label>
                    <input type="date" class="form-control  @error('slf_tgl_expired') is-invalid @enderror" id="slf_tgl_expired" name="slf_tgl_expired" value="{{ $oss->slf_tgl_expired ? $oss->slf_tgl_expired : old('slf_tgl_expired') }}" placeholder="Tanggal Expired SLF">
                    <div class="invalid-feedback">
                        @error('slf_tgl_expired') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="slf_file_lampiran" class="form-label">Lampiran File Sertifikat SLF</label>
                    <input type="file" class="form-control  @error('slf_file_lampiran') is-invalid @enderror" id="slf_file_lampiran" name="slf_file_lampiran" accept=".pdf" value="{{ old('slf_file_lampiran') }}">
                    <small>~ Jika jumlah bangunan yang mendapat sertifikat SLF lebih dari 1, maka harus di upload semuanya dalam satu file, bila tidak ada kosongkan </small>
                    <div class="invalid-feedback">
                        @error('slf_file_lampiran') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End SLF -->

</div>
