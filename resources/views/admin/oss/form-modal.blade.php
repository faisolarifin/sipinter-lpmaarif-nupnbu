<div class="mb-2">
    <label for="catatan" class="form-label">Catatan</label>
    <input type="text" class="form-control form-control-sm @error('catatan') is-invalid @enderror" id="catatan" name="catatan" placeholder="Catatan" value="{{ old('catatan') }}">
    <div class="invalid-feedback">
        @error('catatan') {{ $message }} @enderror
    </div>
</div>
<div class="mb-2">
    <label for="link_pnbp" class="form-label">Link PNBP</label>
    <input type="text" class="form-control form-control-sm @error('link_pnbp') is-invalid @enderror" id="link_pnbp" name="link_pnbp" placeholder="Link PNBP" value="{{ old('link_pnbp') }}">
    <div class="invalid-feedback">
        @error('link_pnbp') {{ $message }} @enderror
    </div>
</div>
<div class="mb-2">
    <label for="link_catatan_pupr" class="form-label">Link Catatan PUPR</label>
    <input type="text" class="form-control form-control-sm @error('link_catatan_pupr') is-invalid @enderror" id="link_catatan_pupr" name="link_catatan_pupr" placeholder="Link Catatan PUPR" value="{{ old('link_catatan_pupr') }}">
    <div class="invalid-feedback">
        @error('link_catatan_pupr') {{ $message }} @enderror
    </div>
</div>
<div class="mb-2">
    <label for="link_gistaru" class="form-label">Link Gistaru</label>
    <input type="text" class="form-control form-control-sm @error('link_gistaru') is-invalid @enderror" id="link_gistaru" name="link_gistaru" placeholder="Link Gistaru" value="{{ old('link_gistaru') }}">
    <div class="invalid-feedback">
        @error('link_gistaru') {{ $message }} @enderror
    </div>
</div>
<div class="mb-2">
    <label for="link_izin_terbit" class="form-label">Link Izin Terbit</label>
    <input type="text" class="form-control form-control-sm @error('link_izin_terbit') is-invalid @enderror" id="link_izin_terbit" name="link_izin_terbit" placeholder="Link Izin Terbit" value="{{ old('link_izin_terbit') }}">
    <div class="invalid-feedback">
        @error('link_izin_terbit') {{ $message }} @enderror
    </div>
</div>
<div class="mb-2">
    <label for="nomor_ku" class="form-label">Nomor KU</label>
    <input type="text" class="form-control form-control-sm @error('nomor_ku') is-invalid @enderror" id="nomor_ku" name="nomor_ku" placeholder="Nomor KU" value="{{ old('nomor_ku') }}">
    <div class="invalid-feedback">
        @error('nomor_ku') {{ $message }} @enderror
    </div>
</div>
