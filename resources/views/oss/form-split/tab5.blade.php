<div class="tab d-none">
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label for="apakah_memiliki_kkpr" class="form-label">Apakah sudah memiliki KKPR Non Berusaha?</label>
                <select class="form-select  @error('apakah_memiliki_kkpr') is-invalid @enderror" name="apakah_memiliki_kkpr" id="apakah_memiliki_kkpr">
                    <option value="Iya" {{ $oss->apakah_memiliki_kkpr=='Iya' ? 'selected' : '' }}>Iya</option>
                    <option value="Tidak"  {{ $oss->apakah_memiliki_kkpr=='Tidak' || $oss->apakah_memiliki_kkpr=='' ? 'selected' : '' }}>Tidak</option>
                </select>
                <small>~ KKPR Non Berusaha Adalah KKPR yang diterbitkan untuk sektor Pendidikan, surat tersebut diurus di DPMPTSP/PUPR</small>
                <div class="invalid-feedback">
                    @error('apakah_memiliki_kkpr') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row-kkpr" style="display: none;">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="pejabat_penerbit_kkpr" class="form-label">Nama Pejabat Penerbit KKPR Non Berusaha</label>
                    <input type="text" class="form-control  @error('pejabat_penerbit_kkpr') is-invalid @enderror" id="pejabat_penerbit_kkpr" name="pejabat_penerbit_kkpr" value="{{ $oss->pejabat_penerbit_kkpr ? $oss->pejabat_penerbit_kkpr : old('pejabat_penerbit_kkpr') }}" placeholder="Nama Pejabat Penerbit KKPR Non Berusaha">
                    <div class="invalid-feedback">
                        @error('pejabat_penerbit_kkpr') {{ $message }} @enderror
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="nomor_kkpr" class="form-label">Nomor Izin KKPR Non Berusaha</label>
                    <input type="text" class="form-control  @error('nomor_kkpr') is-invalid @enderror" id="nomor_kkpr" name="nomor_kkpr" value="{{ $oss->nomor_kkpr ? $oss->nomor_kkpr : old('nomor_kkpr') }}" placeholder="Nomor Izin KKPR Non Berusaha">
                    <div class="invalid-feedback">
                        @error('nomor_kkpr') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="tgl_terbit_kkpr" class="form-label">Tanggal Terbit KKPR Non Berusaha</label>
                    <input type="date" class="form-control  @error('tgl_terbit_kkpr') is-invalid @enderror" id="tgl_terbit_kkpr" name="tgl_terbit_kkpr" value="{{ $oss->tgl_terbit_kkpr ? $oss->tgl_terbit_kkpr : old('tgl_terbit_kkpr') }}" placeholder="Tanggal Terbit KKPR Non Berusaha">
                    <div class="invalid-feedback">
                        @error('tgl_terbit_kkpr') {{ $message }} @enderror
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="tgl_expired_kkpr" class="form-label">Tanggal Expired KKPR Non Berusaha</label>
                    <input type="date" class="form-control  @error('tgl_expired_kkpr') is-invalid @enderror" id="tgl_expired_kkpr" name="tgl_expired_kkpr" value="{{ $oss->tgl_expired_kkpr ? $oss->tgl_expired_kkpr : old('tgl_expired_kkpr') }}" placeholder="Tanggal Expired KKPR Non Berusaha">
                    <div class="invalid-feedback">
                        @error('tgl_expired_kkpr') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="file_lampiran_kkpr" class="form-label">Lampiran File KKPR Non Berusaha (Format PDF)</label>
                    <input type="file" class="form-control  @error('file_lampiran_kkpr') is-invalid @enderror" id="file_lampiran_kkpr" name="file_lampiran_kkpr" value="{{ old('file_lampiran_kkpr') }}">
                    <div class="invalid-feedback">
                        @error('file_lampiran_kkpr') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="dri_pembelian_tanah" class="form-label">Data Rencana Investasi : Pembelian dan Pematangan Tanah (Rp)?</label>
                <input type="number" class="form-control  @error('dri_pembelian_tanah') is-invalid @enderror" id="dri_pembelian_tanah" name="dri_pembelian_tanah" value="{{ $oss->dri_pembelian_tanah ? $oss->dri_pembelian_tanah : old('dri_pembelian_tanah') }}" placeholder="Data Rencana Investasi : Pembelian dan Pematangan Tanah (Rp)?" required>
                <div class="invalid-feedback">
                    @error('dri_pembelian_tanah') {{ $message }} @enderror
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="dri_bangunan" class="form-label">Data Rencana Investasi : Bangunan / Gedung (Rp)?</label>
                <input type="number" class="form-control  @error('dri_bangunan') is-invalid @enderror" id="dri_bangunan" name="dri_bangunan" value="{{ $oss->dri_bangunan ? $oss->dri_bangunan : old('dri_bangunan') }}" placeholder="Data Rencana Investasi : Bangunan / Gedung (Rp)?" required>
                <div class="invalid-feedback">
                    @error('dri_bangunan') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="dri_mesin_dalam_negeri" class="form-label">Data Rencana Investasi : Mesin Peralatan Dalam Negeri (Rp)?</label>
                <input type="number" class="form-control  @error('dri_mesin_dalam_negeri') is-invalid @enderror" id="dri_mesin_dalam_negeri" name="dri_mesin_dalam_negeri" value="{{ $oss->dri_mesin_dalam_negeri ? $oss->dri_mesin_dalam_negeri : old('dri_mesin_dalam_negeri') }}" placeholder="Data Rencana Investasi : Mesin Peralatan Dalam Negeri (Rp)?" required>
                <div class="invalid-feedback">
                    @error('dri_mesin_dalam_negeri') {{ $message }} @enderror
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="dri_mesin_impor" class="form-label">Data Rencana Investasi : Mesin Peralatan Impor (Rp)?</label>
                <input type="number" class="form-control  @error('dri_mesin_impor') is-invalid @enderror" id="dri_mesin_impor" name="dri_mesin_impor" value="{{ $oss->dri_mesin_impor ? $oss->dri_mesin_impor : old('dri_mesin_impor') }}" placeholder="Data Rencana Investasi : Mesin Peralatan Impor (Rp)?" required>
                <div class="invalid-feedback">
                    @error('dri_mesin_impor') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="dri_investasi" class="form-label">Data Rencana Investasi : Investasi Lain - Lain (Rp)?</label>
                <input type="number" class="form-control  @error('dri_investasi') is-invalid @enderror" id="dri_investasi" name="dri_investasi" value="{{ $oss->dri_investasi ? $oss->dri_investasi : old('dri_investasi') }}" placeholder="Data Rencana Investasi : Investasi Lain - Lain (Rp)?" required>
                <div class="invalid-feedback">
                    @error('dri_investasi') {{ $message }} @enderror
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="dri_modal_kerja_3_bulan" class="form-label">Data Rencana Investasi : Modal Kerja 3 Bulanan (Rp)?</label>
                <input type="number" class="form-control  @error('dri_modal_kerja_3_bulan') is-invalid @enderror" id="dri_modal_kerja_3_bulan" name="dri_modal_kerja_3_bulan" value="{{ $oss->dri_modal_kerja_3_bulan ? $oss->dri_modal_kerja_3_bulan : old('dri_modal_kerja_3_bulan') }}" placeholder="Data Rencana Investasi : Modal Kerja 3 Bulanan (Rp)?" required>
                <div class="invalid-feedback">
                    @error('dri_modal_kerja_3_bulan') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="tgl_mulai_beroperasi" class="form-label">Tanggal, Bulan dan Tahun mulai Beroperasi</label>
                <input type="text" class="form-control  @error('tgl_mulai_beroperasi') is-invalid @enderror" id="tgl_mulai_beroperasi" name="tgl_mulai_beroperasi" value="{{ $oss->tgl_mulai_beroperasi ? $oss->tgl_mulai_beroperasi : old('tgl_mulai_beroperasi') }}" placeholder="Tanggal, Bulan dan Tahun mulai Beroperasi" required>
                <div class="invalid-feedback">
                    @error('tgl_mulai_beroperasi') {{ $message }} @enderror
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="jml_pegawai_pria" class="form-label">Jumlah Tenaga Kerja/Pegawai/PTK laki laki</label>
                <input type="number" class="form-control  @error('jml_pegawai_pria') is-invalid @enderror" id="jml_pegawai_pria" name="jml_pegawai_pria" value="{{ $oss->jml_pegawai_pria ? $oss->jml_pegawai_pria : old('jml_pegawai_pria') }}" placeholder="Jumlah Tenaga Kerja/Pegawai/PTK laki laki" required>
                <div class="invalid-feedback">
                    @error('jml_pegawai_pria') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="jml_pegawai_wanita" class="form-label">Jumlah Tenaga Kerja/Pegawai/PTK Perempuan</label>
                <input type="number" class="form-control  @error('jml_pegawai_wanita') is-invalid @enderror" id="jml_pegawai_wanita" name="jml_pegawai_wanita" value="{{ $oss->jml_pegawai_wanita ? $oss->jml_pegawai_wanita : old('jml_pegawai_wanita') }}" placeholder="Jumlah Tenaga Kerja/Pegawai/PTK Perempuan" required>
                <div class="invalid-feedback">
                    @error('jml_pegawai_wanita') {{ $message }} @enderror
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="jml_pegawai_asing" class="form-label">Jumlah Tenaga Kerja/Pegawai/PTK Asing</label>
                <input type="number" class="form-control  @error('jml_pegawai_asing') is-invalid @enderror" id="jml_pegawai_asing" name="jml_pegawai_asing" value="{{ $oss->jml_pegawai_asing ? $oss->jml_pegawai_asing : old('jml_pegawai_asing') }}" placeholder="Jumlah Tenaga Kerja/Pegawai/PTK Asing" required>
                <div class="invalid-feedback">
                    @error('jml_pegawai_asing') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <!-- AMDAL -->
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label for="apakah_memiliki_izin_amdal" class="form-label">Apakah Memiliki Izin Lingkungan AMDAL?</label>
                <select class="form-select  @error('apakah_memiliki_izin_amdal') is-invalid @enderror" name="apakah_memiliki_izin_amdal" id="apakah_memiliki_izin_amdal">
                    <option value="Iya" {{ $oss->apakah_memiliki_izin_amdal=='Iya' ? 'selected' : '' }}>Iya</option>
                    <option value="Tidak"  {{ $oss->apakah_memiliki_izin_amdal=='Tidak' || $oss->apakah_memiliki_izin_amdal=='' ? 'selected' : '' }}>Tidak</option>
                </select>
                <div class="invalid-feedback">
                    @error('apakah_memiliki_izin_amdal') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row-amdal" style="display: none;">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="amdal_pejabat_penerbit" class="form-label">Nama Pejabat Penerbitan Izin Lingkungan AMDAL</label>
                    <input type="text" class="form-control  @error('amdal_pejabat_penerbit') is-invalid @enderror" id="amdal_pejabat_penerbit" name="amdal_pejabat_penerbit" value="{{ $oss->amdal_pejabat_penerbit ? $oss->amdal_pejabat_penerbit : old('amdal_pejabat_penerbit') }}" placeholder="Nama Pejabat Penerbitan Izin Lingkungan AMDAL">
                    <div class="invalid-feedback">
                        @error('amdal_pejabat_penerbit') {{ $message }} @enderror
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="amdal_nomor_izin" class="form-label">Nomor Izin Lingkungan AMDAL</label>
                    <input type="text" class="form-control  @error('amdal_nomor_izin') is-invalid @enderror" id="amdal_nomor_izin" name="amdal_nomor_izin" value="{{ $oss->amdal_nomor_izin ? $oss->amdal_nomor_izin : old('amdal_nomor_izin') }}" placeholder="Nomor Izin Lingkungan AMDAL">
                    <div class="invalid-feedback">
                        @error('amdal_nomor_izin') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="amdal_tgl_terbit" class="form-label">Tanggal Terbit Izin Lingkungan AMDAL</label>
                    <input type="date" class="form-control  @error('amdal_tgl_terbit') is-invalid @enderror" id="amdal_tgl_terbit" name="amdal_tgl_terbit" value="{{ $oss->amdal_tgl_terbit ? $oss->amdal_tgl_terbit : old('amdal_tgl_terbit') }}" placeholder="Tanggal Terbit Izin Lingkungan AMDAL">
                    <div class="invalid-feedback">
                        @error('amdal_tgl_terbit') {{ $message }} @enderror
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="amdal_tgl_expired" class="form-label">Tanggal Expired Izin Lingkungan AMDAL</label>
                    <input type="date" class="form-control  @error('amdal_tgl_expired') is-invalid @enderror" id="amdal_tgl_expired" name="amdal_tgl_expired" value="{{ $oss->amdal_tgl_expired ? $oss->amdal_tgl_expired : old('amdal_tgl_expired') }}" placeholder="Tanggal Expired Izin Lingkungan AMDAL">
                    <div class="invalid-feedback">
                        @error('amdal_tgl_expired') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="amdal_file_lampiran" class="form-label">Lampiran File Izin Lingkungan AMDAL</label>
                    <input type="file" class="form-control  @error('amdal_file_lampiran') is-invalid @enderror" id="amdal_file_lampiran" name="amdal_file_lampiran" value="{{ old('amdal_file_lampiran') }}">
                    <div class="invalid-feedback">
                        @error('amdal_file_lampiran') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END AMDAL -->

    <!-- UKL-UPL -->
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label for="apakah_memiliki_uklupl" class="form-label">Apakah Memiliki Izin Lingkungan UKL-UPL?</label>
                <select class="form-select  @error('apakah_memiliki_uklupl') is-invalid @enderror" name="apakah_memiliki_uklupl" id="apakah_memiliki_uklupl">
                    <option value="Iya" {{ $oss->apakah_memiliki_uklupl=='Iya' ? 'selected' : '' }}>Iya</option>
                    <option value="Tidak" {{ $oss->apakah_memiliki_uklupl=='Tidak' || $oss->apakah_memiliki_uklupl=='' ? 'selected' : '' }}>Tidak</option>
                </select>
                <div class="invalid-feedback">
                    @error('apakah_memiliki_uklupl') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row-uklupl" style="display: none">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="uklupl_pejabat_penerbit" class="form-label">Nama Pejabat Penerbitan Izin Lingkungan UKL-UPL</label>
                    <input type="text" class="form-control  @error('uklupl_pejabat_penerbit') is-invalid @enderror" id="uklupl_pejabat_penerbit" name="uklupl_pejabat_penerbit" value="{{ $oss->uklupl_pejabat_penerbit ? $oss->uklupl_pejabat_penerbit : old('uklupl_pejabat_penerbit') }}" placeholder="Nama Pejabat Penerbitan Izin Lingkungan UKL-UPL">
                    <div class="invalid-feedback">
                        @error('uklupl_pejabat_penerbit') {{ $message }} @enderror
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="uklupl_nomor_izin" class="form-label">Nomor Izin Lingkungan UKL-UPL</label>
                    <input type="text" class="form-control  @error('uklupl_nomor_izin') is-invalid @enderror" id="uklupl_nomor_izin" name="uklupl_nomor_izin" value="{{ $oss->uklupl_nomor_izin ? $oss->uklupl_nomor_izin : old('uklupl_nomor_izin') }}" placeholder="Nomor Izin Lingkungan UKL-UPL">
                    <div class="invalid-feedback">
                        @error('uklupl_nomor_izin') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="uklupl_tgl_terbit" class="form-label">Tanggal Terbit Izin Lingkungan UKL-UPL</label>
                    <input type="date" class="form-control  @error('uklupl_tgl_terbit') is-invalid @enderror" id="uklupl_tgl_terbit" name="uklupl_tgl_terbit" value="{{ $oss->uklupl_tgl_terbit ? $oss->uklupl_tgl_terbit : old('uklupl_tgl_terbit') }}" placeholder="Tanggal Terbit Izin Lingkungan UKL-UPL">
                    <div class="invalid-feedback">
                        @error('uklupl_tgl_terbit') {{ $message }} @enderror
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="mb-3">
                    <label for="uklupl_tgl_expired" class="form-label">Tanggal Expired Izin Lingkungan UKL-UPL</label>
                    <input type="date" class="form-control  @error('uklupl_tgl_expired') is-invalid @enderror" id="uklupl_tgl_expired" name="uklupl_tgl_expired" value="{{ $oss->uklupl_tgl_expired ? $oss->uklupl_tgl_expired : old('uklupl_tgl_expired') }}" placeholder="Tanggal Expired Izin Lingkungan UKL-UPL">
                    <div class="invalid-feedback">
                        @error('uklupl_tgl_expired') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="uklupl_file_lampiran" class="form-label">Lampiran File Izin Lingkungan UKL-UPL</label>
                    <input type="file" class="form-control  @error('uklupl_file_lampiran') is-invalid @enderror" id="uklupl_file_lampiran" name="uklupl_file_lampiran" value="{{ old('uklupl_file_lampiran') }}">
                    <div class="invalid-feedback">
                        @error('uklupl_file_lampiran') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END UKL-UPL -->


</div>
