<div class="tab d-none">
    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="no_reg" class="form-label">Nomor Registrasi Ma'arif NU Nasional</label>
                <input type="text" class="form-control  @error('no_reg') is-invalid @enderror" id="no_reg" name="no_reg" value="{{ $oss->satpen->no_registrasi }}" placeholder="Nomor Registrasi Ma'arif NU Nasional" readonly>
                <div class="invalid-feedback">
                    @error('no_reg') {{ $message }} @enderror
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="nm_sekolah" class="form-label">Nama Sekolah/Madrasah</label>
                <input type="text" class="form-control  @error('nm_sekolah') is-invalid @enderror" id="nm_sekolah" name="nm_sekolah" value="{{ $oss->satpen->nm_satpen }}" placeholder="Nama Sekolah/Madrasah" readonly>
                <div class="invalid-feedback">
                    @error('nm_sekolah') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" value="{{ $oss->email ? $oss->email : old('email') }}" placeholder="Email Address" required>
                <div class="invalid-feedback">
                    @error('email') {{ $message }} @enderror
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="no_whatsapp" class="form-label">Nomor Whatshapp</label>
                <input type="text" class="form-control  @error('no_whatsapp') is-invalid @enderror" id="no_whatsapp" name="no_whatsapp" value="{{ $oss->no_whatsapp ? $oss->no_whatsapp : old('no_whatsapp') }}" placeholder="Nomor Whatshapp" required>
                <div class="invalid-feedback">
                    @error('no_whatsapp') {{ $message }} @enderror
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label for="npwp" class="form-label">NPWP Sekolah</label>
                <input type="text" class="form-control  @error('npwp') is-invalid @enderror" id="npwp" name="npwp" value="{{ $oss->npwp ? $oss->npwp : old('npwp') }}" placeholder="NPWP Sekolah" required>
                <div class="invalid-feedback">
                    @error('npwp') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="intansi_izin_lama" class="form-label">Nama Instansi Penerbit Izin Operasional Lama </label>
                <input type="text" class="form-control  @error('intansi_izin_lama') is-invalid @enderror" id="intansi_izin_lama" name="intansi_izin_lama" value="{{ $oss->intansi_izin_lama ? $oss->intansi_izin_lama : old('intansi_izin_lama') }}" placeholder="Nama Instansi Penerbit Izin Operasional Lama">
                <div class="invalid-feedback">
                    @error('intansi_izin_lama') {{ $message }} @enderror
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="nomor_izin_lama" class="form-label">Nomor Izin Operasional Lama</label>
                <input type="text" class="form-control  @error('nomor_izin_lama') is-invalid @enderror" id="nomor_izin_lama" name="nomor_izin_lama" value="{{ $oss->nomor_izin_lama ? $oss->nomor_izin_lama : old('nomor_izin_lama') }}" placeholder="Nomor Izin Operasional Lama">
                <div class="invalid-feedback">
                    @error('nomor_izin_lama') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="tgl_terbit_izin_lama" class="form-label">Tanggal Terbit Izin Operasional Lama</label>
                <input type="date" class="form-control  @error('tgl_terbit_izin_lama') is-invalid @enderror" id="tgl_terbit_izin_lama" name="tgl_terbit_izin_lama" value="{{ $oss->tgl_terbit_izin_lama ? $oss->tgl_terbit_izin_lama : old('tgl_terbit_izin_lama') }}" placeholder="Tanggal Terbit Izin Operasional Lama">
                <div class="invalid-feedback">
                    @error('tgl_terbit_izin_lama') {{ $message }} @enderror
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="mb-3">
                <label for="tgl_expired_izin_lama" class="form-label">Tanggal Expired Izin Operasional Lama</label>
                <input type="date" class="form-control  @error('tgl_expired_izin_lama') is-invalid @enderror" id="tgl_expired_izin_lama" name="tgl_expired_izin_lama" value="{{ $oss->tgl_expired_izin_lama ? $oss->tgl_expired_izin_lama : old('tgl_expired_izin_lama') }}" placeholder="Tanggal Expired Izin Operasional Lama">
                <div class="invalid-feedback">
                    @error('tgl_expired_izin_lama') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label for="file_izin_lama" class="form-label">Lampiran File Izin Operasional Lama (Format PDF)</label>
                <input type="file" class="form-control  @error('file_izin_lama') is-invalid @enderror" id="file_izin_lama" name="file_izin_lama" accept=".pdf" value="{{ old('file_izin_lama') }}">
                <small>~ Izin operasional Lama yang di Upload adalah Izin operasional sebelumnya yang masa berlakunya sudah habis/atau hampir berakhir. bukan izin pendirian.</small>
                <div class="invalid-feedback">
                    @error('file_izin_lama') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="bukti_bayar">Bukti Pembayaran</label>
                <input type="file" name="bukti_bayar" id="bukti_bayar" class="form-control @error('bukti_bayar') is-invalid @enderror" accept=".pdf" {{ !$oss->bukti_bayar ? 'required' : '' }} >
                <div class="invalid-feedback">
                    @error('bukti_bayar') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>

</div>
