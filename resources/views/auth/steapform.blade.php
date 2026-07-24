@extends('template.general', [
    'title' => 'Sipinter - Register Satpen',
])

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="{{ asset('assets/css/custom-selectpicker.css') }}" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,400;0,500;0,600;0,700;0,800;1,500&family=IBM+Plex+Mono:wght@500;600&display=swap" rel="stylesheet">
<style>
:root {--sip-bg:#F6FAF7;--sip-surface:#FFFFFF;--sip-ink:#12261C;--sip-ink-soft:#5A6B61;--sip-primary:#0B6B3A;--sip-primary-dark:#063D22;--sip-primary-tint:#E7F3EB;--sip-gold:#C08A22;--sip-gold-tint:#F7EDD9;--sip-line:#E1EBE5;}
*{box-sizing:border-box;}
body{font-family:'Inter',sans-serif;color:var(--sip-ink);background:var(--sip-bg);-webkit-font-smoothing:antialiased;}
a{text-decoration:none;}
.sip-wrap{max-width:800px;margin:0 auto;padding:0 24px;}
.sip-register-header{padding:40px 0 20px;text-align:center;}
.sip-register-header .sip-brand{display:inline-flex;align-items:center;gap:11px;margin-bottom:12px;text-decoration:none;}
.sip-register-header .sip-brand-mark{width:40px;height:40px;border-radius:11px;overflow:hidden;flex-shrink:0;background:linear-gradient(160deg,var(--sip-primary),var(--sip-primary-dark));}
.sip-register-header .sip-brand-mark img{width:100%;height:100%;object-fit:cover;}
.sip-register-header .sip-brand-text b{display:block;font-size:15px;font-weight:800;color:var(--sip-primary-dark);letter-spacing:0.01em;text-align:left;}
.sip-register-header .sip-brand-text span{display:block;font-size:11px;color:var(--sip-ink-soft);text-align:left;}
.sip-register-header h5{font-size:17px;font-weight:700;color:var(--sip-primary-dark);margin-top:12px;}

.sip-step-card{background:var(--sip-surface);border:1px solid var(--sip-line);border-radius:20px;box-shadow:0 12px 40px -16px rgba(6,61,34,0.08);overflow:hidden;margin-bottom:40px;}
.sip-step-nav{display:flex;flex-wrap:wrap;background:var(--sip-primary-tint);border-bottom:1px solid var(--sip-line);}
.sip-step-nav a{flex:1;text-align:center;font-size:11.5px;font-weight:700;color:var(--sip-ink-soft);padding:12px 8px;letter-spacing:0.03em;text-transform:uppercase;transition:all .18s ease;min-width:0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.sip-step-nav a.active{background:var(--sip-surface);color:var(--sip-primary);}
.sip-step-body{padding:28px 30px;}
.sip-step-body .sip-row{display:grid;grid-template-columns:1fr 1fr;gap:16px;}
.sip-step-body .sip-field label{display:block;font-size:12px;font-weight:700;color:var(--sip-ink);margin-bottom:5px;}
.sip-step-body .sip-field .form-control,.sip-step-body .sip-field .form-select{border:1.5px solid var(--sip-line);border-radius:10px;padding:10px 14px;font-family:'Inter',sans-serif;font-size:13.5px;}
.sip-step-body .sip-field .form-control:focus,.sip-step-body .sip-field .form-select:focus{border-color:var(--sip-primary);box-shadow:0 0 0 3px var(--sip-primary-tint);}
.sip-step-body .sip-field .bootstrap-select .dropdown-toggle{border:1.5px solid var(--sip-line)!important;border-radius:10px!important;padding:10px 14px!important;font-family:'Inter',sans-serif!important;font-size:13.5px!important;background:#fff!important;box-shadow:none!important;outline:none!important;}
.sip-step-body .sip-field .bootstrap-select .dropdown-toggle:focus{border-color:var(--sip-primary)!important;box-shadow:0 0 0 3px var(--sip-primary-tint)!important;}
.sip-step-footer{display:flex;justify-content:space-between;padding:18px 30px;border-top:1px solid var(--sip-line);background:var(--sip-bg);gap:12px;}
.sip-btn-outline{padding:10px 22px;border-radius:10px;border:1.5px solid var(--sip-primary);color:var(--sip-primary);background:transparent;font-weight:700;font-size:13.5px;cursor:pointer;font-family:'Inter',sans-serif;transition:all .18s ease;}
.sip-btn-outline:hover{background:var(--sip-primary-tint);}
.sip-btn-primary{padding:10px 22px;border-radius:10px;border:none;background:var(--sip-primary);color:#fff;font-weight:700;font-size:13.5px;cursor:pointer;font-family:'Inter',sans-serif;transition:all .18s ease;}
.sip-btn-primary:hover{background:var(--sip-primary-dark);}
.sip-btn-primary:disabled{opacity:0.5;cursor:not-allowed;}
.sip-footer-bar{text-align:center;padding:20px;font-size:12px;color:var(--sip-ink-soft);background:var(--sip-primary-dark);color:rgba(255,255,255,0.7);}
@media(max-width:640px){.sip-step-body .sip-row{grid-template-columns:1fr;}.sip-step-nav a{font-size:10px;padding:10px 4px;}}
</style>
@endsection

@section('container')
<div class="sip-landing" style="min-height:100vh;">
    <div class="sip-register-header">
        <a href="{{ route('home') }}" class="sip-brand">
            <div class="sip-register-header sip-brand-mark"><img src="{{ asset('assets/images/logos/Sipinter_New_Logo_Text.png') }}" alt="SIPINTER"></div>
            <div class="sip-register-header sip-brand-text"><b>SIPINTER</b><span>LP Ma'arif NU PBNU</span></div>
        </a>
        <h5>Registrasi Satuan Pendidikan</h5>
    </div>

    <div class="sip-wrap">
        <form class="sip-step-card" action="{{ route('register.proses') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="sip-step-nav">
                <a class="active" href="#">Identitas Sekolah</a>
                <a href="#">Alamat Detail</a>
                <a href="#">Kontak</a>
                <a href="#">Berkas Permohonan</a>
                <a href="#">Akun Portal</a>
            </div>
            @include('template.alert')
            <div class="sip-step-body">
                <div class="tab">
                    <div class="sip-row">
                        <div class="sip-field">
                            <label>NPSN</label>
                            <input type="text" class="form-control" name="npsn" value="{{ $cookieValue->npsn }}" readonly>
                        </div>
                        <div class="sip-field">
                            <label>Nama Satpen</label>
                            <input type="text" class="form-control" name="nm_satpen" value="{{ $cookieValue->nama }}" readonly>
                        </div>
                    </div>
                    <div class="sip-row">
                        <div class="sip-field">
                            <label>Yayasan</label>
                            <select class="form-select" name="yayasan" id="yayasan">
                                <option value="BHPNU">BHPNU</option>
                                <option value="non bhpnu">Non BHPNU</option>
                            </select>
                        </div>
                        <div class="sip-field">
                            <label>Jenjang Pendidikan</label>
                            <select class="selectpicker @error('jenjang') is-invalid @enderror" data-show-subtext="false" data-live-search="true" name="jenjang">
                                @foreach($jenjang as $row)
                                    <option value="{{ $row->id_jenjang }}" {{ strtolower($row->nm_jenjang) == strtolower($cookieValue->bentuk_pendidikan) ? 'selected' : '' }}>{{ $row->nm_jenjang }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="sip-row row-nm-yayasan" style="display:none;">
                        <div class="sip-field"><label>Nama Yayasan</label><input type="text" class="form-control" name="nm_yayasan" placeholder="Masukkan nama yayasan"></div>
                    </div>
                    <div class="sip-row">
                        <div class="sip-field"><label>Kepala Sekolah</label><input type="text" class="form-control" name="kepsek" value="{{ old('kepsek') }}" placeholder="Masukkan nama kepala sekolah"></div>
                        <div class="sip-field"><label>Tahun Berdiri</label><input type="text" class="form-control" name="thn_berdiri" value="{{ old('thn_berdiri') }}" placeholder="Masukkan tahun berdiri"></div>
                    </div>
                    <div class="sip-row">
                        <div class="sip-field">
                            <label>Aset Tanah</label>
                            <select class="form-select" name="aset_tanah"><option value="jamiyah">Jamiyah</option><option value="masyarakat nu">Masyarakat NU</option></select>
                        </div>
                        <div class="sip-field"><label>Nama Pemilik</label><input type="text" class="form-control" name="nm_pemilik" value="{{ old('nm_pemilik') }}" placeholder="Masukkan nama pemilik tanah"></div>
                    </div>
                </div>

                <div class="tab d-none">
                    <div class="sip-row">
                        <div class="sip-field">
                            <label>Propinsi</label>
                            <select class="selectpicker @error('propinsi') is-invalid @enderror" data-show-subtext="false" data-live-search="true" name="propinsi">
                                @foreach($propinsi as $row)
                                    <option value="{{ $row->id_prov }}" {{ strtolower($row->nm_prov) == Strings::removeFirstWord($cookieValue->propinsiluar_negeri_ln) ? 'selected' : '' }}>{{ $row->nm_prov }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="sip-field">
                            <label>Kabupaten</label>
                            <select class="selectpicker @error('kabupaten') is-invalid @enderror" data-show-subtext="false" data-live-search="true" name="kabupaten">
                                @foreach($kabupaten as $row)
                                    <option value="{{ $row->id_kab }}" {{ Strings::removeFirstWord($row->nama_kab) == Strings::removeFirstWord($cookieValue->kabkotanegara_ln) ? 'selected' : '' }}>{{ $row->nama_kab }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="sip-row">
                        <div class="sip-field">
                            <label>Cabang</label>
                            <select class="selectpicker @error('cabang') is-invalid @enderror" data-show-subtext="false" data-live-search="true" name="cabang">
                                @foreach($cabang as $row)
                                    <option value="{{ $row->id_pc }}" {{ Strings::removeFirstWord($row->nama_pc, 2) == Strings::removeFirstWord($cookieValue->kabkotanegara_ln) ? 'selected' : '' }}>{{ $row->nama_pc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="sip-field"><label>Kecamatan</label><input type="text" class="form-control" name="kecamatan" value="{{ $cookieValue->kecamatankota_ln }}" placeholder="Masukkan nama kecamatan"></div>
                    </div>
                    <div class="sip-row">
                        <div class="sip-field"><label>Kelurahan</label><input type="text" class="form-control" name="kelurahan" value="{{ $cookieValue->desakelurahan }}" placeholder="Masukkan nama kelurahan"></div>
                        <div class="sip-field"><label>Alamat</label><input type="text" class="form-control" name="alamat" value="{{ $cookieValue->alamat }}" placeholder="Masukkan alamat sekolah"></div>
                    </div>
                </div>

                <div class="tab d-none">
                    <div class="sip-row">
                        <div class="sip-field"><label>Email</label><input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Masukkan email aktif"></div>
                        <div class="sip-field"><label>No. HP/WA</label><input type="text" class="form-control" name="telp" value="{{ old('telp') }}" placeholder="Masukkan nomor telepon"></div>
                    </div>
                    <div class="sip-row">
                        <div class="sip-field"><label>Fax</label><input type="text" class="form-control" name="fax" value="{{ old('fax') }}" placeholder="Masukkan nomor FAX (jika ada)"></div>
                    </div>
                </div>

                <div class="tab d-none">
                    <h6 style="font-weight:700;margin-bottom:12px;color:var(--sip-primary-dark);">Surat Permohonan</h6>
                    <div class="sip-row">
                        <div class="sip-field"><label>Nomor Surat</label><input type="text" class="form-control" name="no_srt_permohonan" value="{{ old('no_srt_permohonan') }}" placeholder="Nomor surat permohonan"></div>
                        <div class="sip-field"><label>Tanggal Surat</label><input type="date" class="form-control" name="tgl_srt_permohonan" value="{{ old('tgl_srt_permohonan') }}"></div>
                    </div>
                    <div class="sip-field"><label>File Permohonan (PDF max 1MB)</label><input type="file" class="form-control" name="file_permohonan" accept="application/pdf"></div>

                    <h6 style="font-weight:700;margin:20px 0 12px;color:var(--sip-primary-dark);">Surat Keterangan Cabang</h6>
                    <div class="sip-row">
                        <div class="sip-field">
                            <label>Pemberi Keterangan</label>
                            <select class="form-select" name="nm_rekom_pc"><option value="LP Ma'arif NU PCNU">LP Ma'arif NU PCNU</option><option value="PCNU">PCNU</option></select>
                        </div>
                        <div class="sip-field">
                            <label>Nama Cabang</label>
                            <select class="selectpicker" data-show-subtext="false" data-live-search="true" name="cabang_rekom_pc">
                                @foreach($cabang as $row)
                                    <option value="{{ $row->nama_pc }}" {{ Strings::removeFirstWord($row->nama_pc, 2) == Strings::removeFirstWord($cookieValue->kabkotanegara_ln) ? 'selected' : '' }}>{{ $row->nama_pc }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="sip-row">
                        <div class="sip-field"><label>Nomor Surat</label><input type="text" class="form-control" name="no_srt_rekom_pc" value="{{ old('no_srt_rekom_pc') }}" placeholder="Nomor surat dari cabang"></div>
                        <div class="sip-field"><label>Tanggal Surat</label><input type="date" class="form-control" name="tgl_srt_rekom_pc" value="{{ old('tgl_srt_rekom_pc') }}"></div>
                    </div>
                    <div class="sip-field"><label>File Keterangan PC (PDF max 1MB)</label><input type="file" class="form-control" name="file_rekom_pc" accept="application/pdf"></div>

                    <h6 style="font-weight:700;margin:20px 0 12px;color:var(--sip-primary-dark);">Rekomendasi Wilayah</h6>
                    <div class="sip-row">
                        <div class="sip-field">
                            <label>Pemberi Rekomendasi</label>
                            <select class="form-select" name="nm_rekom_pw"><option value="LP Ma'arif NU PWNU">LP Ma'arif NU PWNU</option><option value="PWNU">PWNU</option></select>
                        </div>
                        <div class="sip-field">
                            <label>Nama Wilayah</label>
                            <select class="selectpicker" data-show-subtext="false" data-live-search="true" name="wilayah_rekom_pw">
                                @foreach($propinsi as $row)
                                    <option value="{{ $row->nm_prov }}" {{ strtolower($row->nm_prov) == Strings::removeFirstWord($cookieValue->propinsiluar_negeri_ln) ? 'selected' : '' }}>{{ $row->nm_prov }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="sip-row">
                        <div class="sip-field"><label>Nomor Surat</label><input type="text" class="form-control" name="no_srt_rekom_pw" value="{{ old('no_srt_rekom_pw') }}" placeholder="Nomor surat dari wilayah"></div>
                        <div class="sip-field"><label>Tanggal Surat</label><input type="date" class="form-control" name="tgl_srt_rekom_pw" value="{{ old('tgl_srt_rekom_pw') }}"></div>
                    </div>
                    <div class="sip-field"><label>File Rekomendasi PW (PDF max 1MB)</label><input type="file" class="form-control" name="file_rekom_pw" accept="application/pdf"></div>
                </div>

                <div class="tab d-none">
                    <div class="sip-row">
                        <div class="sip-field">
                            <label>Password Akun</label>
                            <div class="input-group form-password">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan password akun">
                                <span class="input-group-text password-toggle" style="cursor:pointer;"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>
                        <div class="sip-field">
                            <label>Konfirmasi Password</label>
                            <div class="input-group form-password">
                                <input type="password" class="form-control @error('passconfirm') is-invalid @enderror" name="passconfirm" placeholder="Konfirmasi password">
                                <span class="input-group-text password-toggle" style="cursor:pointer;"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sip-step-footer">
                <button type="button" id="back_button" class="sip-btn-outline">Sebelumnya</button>
                <button type="button" id="next_button" class="sip-btn-primary">Berikutnya</button>
                <button type="submit" id="submit_button" class="sip-btn-primary d-none">Daftar</button>
            </div>
        </form>
    </div>

    <div class="sip-footer-bar">&copy; {{ date('Y') }} Sistem Administrasi Pendidikan Terpadu &mdash; LP Ma'arif NU PBNU</div>
</div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        $('.selectpicker').selectpicker({container:'body'});
        $("#yayasan").on('change',function(e){if($(this).val().toLowerCase()!=="bhpnu")$(".row-nm-yayasan").slideDown();else $(".row-nm-yayasan").slideUp()});
        $(".password-toggle").click(function(){var p=$(this).parent().find("input");var i=$(this).find("i");if(p.attr("type")==="password"){p.attr("type","text");i.removeClass("ti-eye-off").addClass("ti-eye")}else{p.attr("type","password");i.removeClass("ti-eye").addClass("ti-eye-off")}});
        let current=0;let tabs=$(".tab");let tabs_pill=$(".sip-step-nav a");
        loadFormData(current);
        function loadFormData(n){$(tabs_pill[n]).addClass("active");$(tabs[n]).removeClass("d-none");$("#back_button").attr("disabled",n==0?true:false);if(n==tabs.length-1){$("#next_button").addClass("d-none");$("#submit_button").removeClass("d-none")}else{$("#next_button").removeClass("d-none");$("#submit_button").addClass("d-none")}}
        function next(){var v=validateInputs($(tabs[current]));if(v){$(tabs[current]).addClass("d-none");$(tabs_pill[current]).removeClass("active");current++;loadFormData(current)}}
        function back(){$(tabs[current]).addClass("d-none");$(tabs_pill[current]).removeClass("active");current--;loadFormData(current)}
        tabs_pill.on('click',function(){var v=validateInputs($(tabs[current]));if(v){$(tabs[current]).addClass("d-none");$(tabs_pill[current]).removeClass("active");current=$(this).index();loadFormData(current)}})
        function validateInputs(s){var ok=true;s.find("input").each(function(i,e){var v=e.checkValidity();if(!v){ok=false;e.classList.add("is-invalid")}else e.classList.remove("is-invalid")});return ok}
        $("select[name='propinsi']").on('change',function(){var pid=$(this).val();$.ajax({url:"{{ route('api.kabupatenbyprov',':param') }}".replace(':param',pid),type:"GET",dataType:'json',success:function(r){var s=$("select[name='kabupaten']");s.empty();$.each(r,function(k,v){s.append('<option value="'+v.id_kab+'">'+v.nama_kab+'</option>')});$('.selectpicker').selectpicker('refresh')}});$.ajax({url:"{{ route('api.pcbyprov',':param') }}".replace(':param',pid),type:"GET",dataType:'json',success:function(r){var sc=$("select[name='cabang']");var sp=$("select[name='cabang_rekom_pc']");sc.empty();sp.empty();$.each(r,function(k,v){sc.append('<option value="'+v.id_pc+'">'+v.nama_pc+'</option>');sp.append('<option value="'+v.id_pc+'">'+v.nama_pc+'</option>')});$('.selectpicker').selectpicker('refresh')}})});
    </script>
@endsection
