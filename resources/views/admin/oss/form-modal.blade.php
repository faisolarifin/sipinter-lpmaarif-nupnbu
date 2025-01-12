<div class="mb-2">
    <label for="catatan" class="form-label">Catatan</label>
    <input type="text" class="form-control form-control-sm @error('catatan') is-invalid @enderror" id="catatan" name="catatan" placeholder="Catatan" value="{{ old('catatan') }}">
    <div class="invalid-feedback">
        @error('catatan') {{ $message }} @enderror
    </div>
</div>
<div class="mb-2">
    <label for="link_pnbr" class="form-label">Link PNBR</label>
    <input type="text" class="form-control form-control-sm @error('link_pnbr') is-invalid @enderror" id="link_pnbr" name="link_pnbr" placeholder="Link PNBR" value="{{ old('link_pnbr') }}">
    <div class="invalid-feedback">
        @error('link_pnbr') {{ $message }} @enderror
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
    <label for="link_kode_ajuan" class="form-label">Link Kode Ajuan</label>
    <input type="text" class="form-control form-control-sm @error('link_kode_ajuan') is-invalid @enderror" id="link_kode_ajuan" name="link_kode_ajuan" placeholder="Link Kode Ajuan" value="{{ old('link_kode_ajuan') }}">
    <div class="invalid-feedback">
        @error('link_kode_ajuan') {{ $message }} @enderror
    </div>
</div>
<div class="mb-2">
    <label for="nomor_ku" class="form-label">Nomor KU</label>
    <input type="text" class="form-control form-control-sm @error('nomor_ku') is-invalid @enderror" id="nomor_ku" name="nomor_ku" placeholder="Nomor KU" value="{{ old('nomor_ku') }}">
    <div class="invalid-feedback">
        @error('nomor_ku') {{ $message }} @enderror
    </div>
</div>
