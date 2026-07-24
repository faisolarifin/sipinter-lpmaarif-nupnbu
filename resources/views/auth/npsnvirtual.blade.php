@extends('template.general', [
    'title' => 'Sipinter - Ajukan NPSN Virtual',
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
html,body{height:100%;margin:0;overflow:hidden;}
body{font-family:'Inter',sans-serif;color:var(--sip-ink);background:linear-gradient(160deg,#FFFFFF 0%,#DCEEE2 100%);-webkit-font-smoothing:antialiased;}
#main-wrapper{height:100vh;}
#main-wrapper>.page-wrapper{height:100%;}
a{text-decoration:none;}
.sip-shell{display:flex;height:100vh;width:100vw;}
.sip-left{order:2;flex:1.5;display:flex;align-items:center;justify-content:center;padding:24px;position:relative;background:linear-gradient(160deg,#FFFFFF 0%,#DCEEE2 100%);overflow-y:auto;}
.sip-left::before{content:"";position:absolute;top:0;left:0;right:0;height:4px;background:linear-gradient(90deg,var(--sip-primary),var(--sip-gold));}
.sip-card{width:100%;max-width:560px;background:#FFFFFF;border:1px solid var(--sip-line);border-radius:24px;padding:28px 32px;box-shadow:0 34px 64px -30px rgba(11,66,38,0.28);}
.sip-back-home{display:inline-flex;align-items:center;gap:6px;font-size:12px;font-weight:600;color:var(--sip-ink-soft);margin-bottom:10px;transition:color .15s ease;}
.sip-back-home:hover{color:var(--sip-primary);}
.sip-brand{display:flex;align-items:center;gap:11px;margin-bottom:20px;text-decoration:none;}
.sip-brand-mark{width:40px;height:40px;border-radius:11px;overflow:hidden;flex-shrink:0;background:linear-gradient(160deg,var(--sip-primary),var(--sip-primary-dark));}
.sip-brand-mark img{width:100%;height:100%;object-fit:cover;}
.sip-brand-text b{display:block;font-size:15px;font-weight:800;color:var(--sip-primary-dark);letter-spacing:0.01em;}
.sip-brand-text span{display:block;font-size:11px;color:var(--sip-ink-soft);}
.sip-card h1{font-size:22px;font-weight:700;letter-spacing:-0.01em;margin:0 0 5px;color:var(--sip-ink);}
.sip-card .sip-sub{font-size:12.5px;color:var(--sip-ink-soft);margin-bottom:16px;line-height:1.45;}
.sip-field-grid{display:grid;grid-template-columns:1fr 1fr;gap:10px;}
.sip-field{margin-bottom:12px;}
.sip-field label{display:block;font-size:11.5px;font-weight:700;color:var(--sip-ink);margin-bottom:5px;}
.sip-input-wrap{position:relative;display:flex;align-items:center;}
.sip-input-wrap svg{position:absolute;left:14px;color:var(--sip-ink-soft);pointer-events:none;z-index:1;}
.sip-input-wrap input,.sip-input-wrap textarea{width:100%;padding:10px 14px 10px 42px;border:1.5px solid var(--sip-line);border-radius:11px;font-size:13.5px;font-family:'Inter',sans-serif;color:var(--sip-ink);outline:none;transition:border-color .15s ease,box-shadow .15s ease;background:#fff;}
.sip-input-wrap input:focus,.sip-input-wrap textarea:focus{border-color:var(--sip-primary);box-shadow:0 0 0 3px var(--sip-primary-tint);}
.sip-input-wrap textarea{resize:none;}
.sip-field .bootstrap-select{width:100%!important;}
.sip-field .bootstrap-select .dropdown-toggle{border:1.5px solid var(--sip-line)!important;border-radius:11px!important;padding:10px 14px 10px 42px!important;font-size:13.5px!important;font-family:'Inter',sans-serif!important;background:#fff!important;box-shadow:none!important;outline:none!important;height:auto;}
.sip-field .bootstrap-select .dropdown-toggle:focus,.sip-field .bootstrap-select.show .dropdown-toggle{border-color:var(--sip-primary)!important;box-shadow:0 0 0 3px var(--sip-primary-tint)!important;}
.sip-btn-submit{width:100%;padding:12px;border:none;border-radius:11px;margin-top:4px;background:linear-gradient(135deg,var(--sip-primary),var(--sip-primary-dark));color:#fff;font-size:14px;font-weight:700;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:8px;transition:filter .15s ease,transform .15s ease;box-shadow:0 14px 28px -12px rgba(11,66,38,0.55);font-family:'Inter',sans-serif;}
.sip-btn-submit:hover{filter:brightness(1.07);transform:translateY(-1px);}
.sip-foot-note{text-align:center;margin-top:16px;font-size:12.5px;color:var(--sip-ink-soft);}
.sip-foot-note a{color:var(--sip-gold);font-weight:700;}
.sip-foot-note a:hover{text-decoration:underline;}
.sip-right{order:1;flex:1;position:relative;overflow:hidden;color:#fff;background:linear-gradient(165deg,var(--sip-primary) 0%,var(--sip-primary-dark) 85%);display:flex;flex-direction:column;justify-content:space-between;padding:clamp(24px,4vh,44px) clamp(28px,3.5vw,48px);}
.sip-lattice{position:absolute;inset:0;opacity:.5;pointer-events:none;background-image:repeating-linear-gradient(45deg,rgba(192,138,34,0.16) 0px,rgba(192,138,34,0.16) 1.5px,transparent 1.5px,transparent 24px),repeating-linear-gradient(-45deg,rgba(192,138,34,0.16) 0px,rgba(192,138,34,0.16) 1.5px,transparent 1.5px,transparent 24px);}
.sip-right-inner{position:relative;z-index:1;display:flex;flex-direction:column;height:100%;}
.sip-emblem{width:52px;height:52px;border-radius:50%;flex-shrink:0;background:radial-gradient(circle at 35% 30%,#F4D999,var(--sip-gold));display:flex;align-items:center;justify-content:center;box-shadow:0 10px 26px -8px rgba(0,0,0,0.4);}
.sip-emblem svg{width:26px;height:26px;}
.sip-brand-block{display:flex;align-items:center;gap:14px;margin-bottom:24px;}
.sip-brand-block h2{font-size:18px;font-weight:700;margin:0 0 3px;line-height:1.3;color:#fff;}
.sip-brand-block span{font-size:12.5px;color:rgba(255,255,255,0.75);}
.sip-feature-list{list-style:none;margin:0;padding:0;display:flex;flex-direction:column;gap:12px;flex:1;}
.sip-feature-list li{display:flex;align-items:flex-start;gap:11px;font-size:13.5px;line-height:1.4;color:rgba(255,255,255,0.92);}
.sip-feature-list .sip-ic{width:22px;height:22px;border-radius:50%;background:rgba(255,255,255,0.16);display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:1px;}
.sip-help-card{background:rgba(255,255,255,0.09);border:1px solid rgba(255,255,255,0.2);border-radius:16px;padding:16px;backdrop-filter:blur(6px);margin-top:16px;}
.sip-help-card h4{font-size:12.5px;text-transform:uppercase;letter-spacing:0.06em;font-weight:700;margin:0 0 10px;color:rgba(255,255,255,0.85);}
.sip-help-row{display:flex;align-items:center;gap:9px;font-size:12.5px;color:rgba(255,255,255,0.9);margin-bottom:7px;}
.sip-help-row:last-child{margin-bottom:0;}
.sip-help-row svg{flex-shrink:0;color:var(--sip-gold);}
.sip-wa-row{display:flex;gap:8px;margin-top:9px;}
.sip-wa-pill{flex:1;text-align:center;font-size:11.5px;font-weight:700;color:#fff;background:rgba(255,255,255,0.14);border:1px solid rgba(255,255,255,0.25);padding:7px 8px;border-radius:99px;}
.sip-address{font-size:11.5px;color:rgba(255,255,255,0.65);line-height:1.5;margin-top:12px;}
@media(max-width:860px){.sip-shell{flex-direction:column;height:100vh;}.sip-right{display:none;}.sip-left{flex:1;overflow-y:auto;}.sip-field-grid{grid-template-columns:1fr;}}
</style>
@endsection

@section('container')
<div class="sip-shell">
    <div class="sip-left">
        <div class="sip-card">
            <a href="{{ route('home') }}" class="sip-back-home">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none"><path d="M19 12H5M11 6l-6 6 6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Kembali ke Beranda
            </a>
            <a href="{{ route('home') }}" class="sip-brand">
                <div class="sip-brand-mark"><img src="{{ asset('assets/images/logos/Sipinter_New_Logo_Text.png') }}" alt="SIPINTER"></div>
                <div class="sip-brand-text"><b>SIPINTER</b><span>LP Ma'arif NU PBNU</span></div>
            </a>

            <h1>Ajukan NPSN Virtual</h1>
            <p class="sip-sub">Lengkapi data berikut untuk mengajukan NPSN Virtual bagi satuan pendidikan Anda.</p>

            @include('template.alert')

            <form action="{{ route('npsnvirtual.request') }}" method="post">
                @csrf
                <div class="sip-field">
                    <label for="nama_sekolah">Nama Sekolah</label>
                    <div class="sip-input-wrap">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none"><path d="M3 10l9-5 9 5-9 5-9-5Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M7 12v5c0 1.2 2.2 2.5 5 2.5s5-1.3 5-2.5v-5" stroke="currentColor" stroke-width="1.8"/></svg>
                        <input id="nama_sekolah" name="nama_sekolah" type="text" value="{{ old('nama_sekolah') }}" placeholder="Nama lengkap satuan pendidikan" class="@error('nama_sekolah') is-invalid @enderror">
                    </div>
                    @error('nama_sekolah')<small style="color:#c0392b;">{{ $message }}</small>@enderror
                </div>

                <p style="font-size:11px;color:var(--sip-ink-soft);margin:-6px 0 10px;">*) pastikan email aktif &mdash; konfirmasi permohonan akan dikirim ke alamat ini.</p>

                <div class="sip-field-grid">
                    <div class="sip-field">
                        <label for="email">Email</label>
                        <div class="sip-input-wrap">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M3 6l9 7 9-7" stroke="currentColor" stroke-width="1.8"/></svg>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="email@sekolah.sch.id" class="@error('email') is-invalid @enderror">
                        </div>
                        @error('email')<small style="color:#c0392b;">{{ $message }}</small>@enderror
                    </div>
                    <div class="sip-field">
                        <label for="nik_kepsek">NIK Kepala Sekolah</label>
                        <div class="sip-input-wrap">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.8"/><circle cx="8.5" cy="11" r="2" stroke="currentColor" stroke-width="1.6"/><path d="M13 10h5M13 14h5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                            <input id="nik_kepsek" name="nik_kepsek" type="text" value="{{ old('nik_kepsek') }}" placeholder="16 digit NIK" inputmode="numeric" class="@error('nik_kepsek') is-invalid @enderror">
                        </div>
                        @error('nik_kepsek')<small style="color:#c0392b;">{{ $message }}</small>@enderror
                    </div>
                </div>

                <div class="sip-field-grid">
                    <div class="sip-field">
                        <label for="jenjang">Jenjang Pendidikan</label>
                        <select class="selectpicker @error('jenjang') is-invalid @enderror" data-show-subtext="false" data-live-search="true" name="jenjang" data-container="body">
                            @foreach($jenjang as $row)
                                <option value="{{ $row->id_jenjang }}">{{ $row->nm_jenjang }}</option>
                            @endforeach
                        </select>
                        @error('jenjang')<small style="color:#c0392b;">{{ $message }}</small>@enderror
                    </div>
                    <div class="sip-field">
                        <label for="provinsi">Provinsi</label>
                        <select class="selectpicker @error('provinsi') is-invalid @enderror" data-show-subtext="false" data-live-search="true" name="provinsi" data-container="body">
                            @foreach($provinsi as $row)
                                <option value="{{ $row->id_prov }}">{{ $row->nm_prov }}</option>
                            @endforeach
                        </select>
                        @error('provinsi')<small style="color:#c0392b;">{{ $message }}</small>@enderror
                    </div>
                </div>

                <div class="sip-field-grid">
                    <div class="sip-field">
                        <label for="kabupaten">Kabupaten/Kota</label>
                        <select class="selectpicker @error('kabupaten') is-invalid @enderror" data-show-subtext="false" data-live-search="true" name="kabupaten" data-container="body">
                            @foreach($kabupaten as $row)
                                <option value="{{ $row->id_kab }}">{{ $row->nama_kab }}</option>
                            @endforeach
                        </select>
                        @error('kabupaten')<small style="color:#c0392b;">{{ $message }}</small>@enderror
                    </div>
                    <div class="sip-field">
                        <label for="alamat">Alamat</label>
                        <div class="sip-input-wrap">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" style="top:12px;"><path d="M12 21s7-6.2 7-11.5A7 7 0 0 0 5 9.5C5 14.8 12 21 12 21Z" stroke="currentColor" stroke-width="1.8"/></svg>
                            <textarea id="alamat" name="alamat" rows="1" placeholder="Alamat lengkap satuan pendidikan" class="@error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                        </div>
                        @error('alamat')<small style="color:#c0392b;">{{ $message }}</small>@enderror
                    </div>
                </div>

                <button type="submit" class="sip-btn-submit">
                    Ajukan NPSN Virtual
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
            </form>

            <div class="sip-foot-note">Sudah Punya NPSN? <a href="{{ route('ceknpsn') }}">Daftar Sekarang</a></div>
        </div>
    </div>

    <div class="sip-right">
        <div class="sip-lattice"></div>
        <div class="sip-right-inner">
            <div class="sip-brand-block">
                <div class="sip-emblem"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2 L14.2 8.6 L21 9.3 L15.8 13.6 L17.5 20.2 L12 16.4 L6.5 20.2 L8.2 13.6 L3 9.3 L9.8 8.6 Z" fill="#063D22"/></svg></div>
                <div><h2>Sipinter LP Ma'arif NU PBNU</h2><span>Pelayanan Terintegrasi dan Terpadu</span></div>
            </div>
            <ul class="sip-feature-list">
                <li><span class="sip-ic"><svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M4 12l5 5L20 6" stroke="white" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Menjadi Pusat Data Satuan Pendidikan Ma'arif NU</li>
                <li><span class="sip-ic"><svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M4 12l5 5L20 6" stroke="white" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Layanan Izin Sistem OSS/NIB</li>
                <li><span class="sip-ic"><svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M4 12l5 5L20 6" stroke="white" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Layanan Badan Hukum NU (BHPNU)</li>
                <li><span class="sip-ic"><svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M4 12l5 5L20 6" stroke="white" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Layanan Bantuan Pendidikan Ma'arif</li>
                <li><span class="sip-ic"><svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M4 12l5 5L20 6" stroke="white" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Layanan Beasiswa Pendidikan</li>
            </ul>
            <div class="sip-help-card">
                <h4>Helpdesk</h4>
                <div class="sip-help-row"><svg width="14" height="14" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M3 6l9 7 9-7" stroke="currentColor" stroke-width="1.8"/></svg>bhp.maarifnu@gmail.com</div>
                <div class="sip-help-row"><svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M4 4h4l2 5-2.5 1.5a12 12 0 0 0 6 6L15 14l5 2v4a2 2 0 0 1-2 2C9.6 22 2 14.4 2 6a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="1.6"/></svg>021-3904115 &nbsp;&bull;&nbsp; Fax 021-31906679</div>
                <div class="sip-wa-row"><a class="sip-wa-pill" href="https://wa.me/6285883858897">WA 1 &middot; 0858-8385-8897</a><a class="sip-wa-pill" href="https://wa.me/6281319868302">WA 2 &middot; 0813-1986-8302</a></div>
                <div class="sip-address">Gedung PBNU II, Lt. 2, Jl. Taman Amir Hamzah No. 5, Pegangsaan, Menteng, Jakarta Pusat 10320</div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        $('.selectpicker').selectpicker({container:'body'});
        $("select[name='provinsi']").on("change",function(){$.ajax({url:"{{ route('api.kabupatenbyprov',':param') }}".replace(':param',$(this).val()),type:"GET",dataType:'json',success:function(r){var o="";$.each(r,function(k,v){o+='<option value="'+v.id_kab+'">'+v.nama_kab+'</option>'});$("select[name='kabupaten']").html(o);$('.selectpicker').selectpicker('refresh')}})});
    </script>
@endsection
