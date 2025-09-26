<div class="form-group">
    <label for="catatan" class="form-label">
        <i class="ti ti-notes"></i>
        Catatan
    </label>
    <input type="text" class="form-control @error('catatan') is-invalid @enderror" id="catatan" name="catatan" placeholder="Masukkan catatan verifikasi..." value="{{ old('catatan') }}">
    <div class="invalid-feedback">
        @error('catatan') {{ $message }} @enderror
    </div>
</div>

<div class="form-group">
    <label for="link_pnbp" class="form-label">
        <i class="ti ti-link"></i>
        Link PNBP
    </label>
    <input type="url" class="form-control @error('link_pnbp') is-invalid @enderror" id="link_pnbp" name="link_pnbp" placeholder="https://pnbp.example.com" value="{{ old('link_pnbp') }}">
    <div class="invalid-feedback">
        @error('link_pnbp') {{ $message }} @enderror
    </div>
</div>

<div class="form-group">
    <label for="link_catatan_pupr" class="form-label">
        <i class="ti ti-link"></i>
        Link Catatan PUPR
    </label>
    <input type="url" class="form-control @error('link_catatan_pupr') is-invalid @enderror" id="link_catatan_pupr" name="link_catatan_pupr" placeholder="https://pupr.example.com" value="{{ old('link_catatan_pupr') }}">
    <div class="invalid-feedback">
        @error('link_catatan_pupr') {{ $message }} @enderror
    </div>
</div>

<div class="form-group">
    <label for="link_gistaru" class="form-label">
        <i class="ti ti-link"></i>
        Link Gistaru
    </label>
    <input type="url" class="form-control @error('link_gistaru') is-invalid @enderror" id="link_gistaru" name="link_gistaru" placeholder="https://gistaru.example.com" value="{{ old('link_gistaru') }}">
    <div class="invalid-feedback">
        @error('link_gistaru') {{ $message }} @enderror
    </div>
</div>

<div class="form-group">
    <label for="link_izin_terbit" class="form-label">
        <i class="ti ti-link"></i>
        Link Izin Terbit
    </label>
    <input type="url" class="form-control @error('link_izin_terbit') is-invalid @enderror" id="link_izin_terbit" name="link_izin_terbit" placeholder="https://izin.example.com" value="{{ old('link_izin_terbit') }}">
    <div class="invalid-feedback">
        @error('link_izin_terbit') {{ $message }} @enderror
    </div>
</div>

<div class="form-group">
    <label for="nomor_ku" class="form-label">
        <i class="ti ti-hash"></i>
        Nomor KU
    </label>
    <input type="text" class="form-control @error('nomor_ku') is-invalid @enderror" id="nomor_ku" name="nomor_ku" placeholder="Masukkan nomor KU..." value="{{ old('nomor_ku') }}">
    <div class="invalid-feedback">
        @error('nomor_ku') {{ $message }} @enderror
    </div>
</div>
