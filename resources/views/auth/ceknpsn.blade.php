@extends('template.general', [
    'title' => 'Sipinter - Cek NPSN',
])

@section('style')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,400;0,500;0,600;0,700;0,800;1,500&family=IBM+Plex+Mono:wght@500;600&display=swap" rel="stylesheet">
<style>
:root {
    --sip-bg:#F6FAF7; --sip-surface:#FFFFFF; --sip-ink:#12261C; --sip-ink-soft:#5A6B61;
    --sip-primary:#0B6B3A; --sip-primary-dark:#063D22; --sip-primary-tint:#E7F3EB;
    --sip-gold:#C08A22; --sip-gold-tint:#F7EDD9; --sip-line:#E1EBE5;
}
*{box-sizing:border-box;}
html,body{height:100%; margin:0; overflow:hidden;}
body{font-family:'Inter', sans-serif; color:var(--sip-ink); background:linear-gradient(160deg, #FFFFFF 0%, #DCEEE2 100%);-webkit-font-smoothing:antialiased;}
#main-wrapper { height:100vh; }
#main-wrapper > .page-wrapper { height:100%; }
a{text-decoration:none;}
.sip-shell{display:flex; height:100vh; width:100vw;}
.sip-left{order:2;flex:1.2;display:flex;align-items:center;justify-content:center;padding:32px;position:relative;background:linear-gradient(160deg, #FFFFFF 0%, #DCEEE2 100%);}
.sip-left::before{content:"";position:absolute;top:0;left:0;right:0;height:4px;background:linear-gradient(90deg, var(--sip-primary), var(--sip-gold));}
.sip-card{width:100%;max-width:400px;background:#FFFFFF;border:1px solid var(--sip-line);border-radius:24px;padding:40px 38px;box-shadow:0 34px 64px -30px rgba(11,66,38,0.28);}
.sip-back-home{display:inline-flex;align-items:center;gap:6px;font-size:12px;font-weight:600;color:var(--sip-ink-soft);margin-bottom:14px;transition:color .15s ease;}
.sip-back-home:hover{color:var(--sip-primary);}
.sip-brand{display:flex;align-items:center;gap:11px;margin-bottom:28px;text-decoration:none;}
.sip-brand-mark{width:40px;height:40px;border-radius:11px;overflow:hidden;flex-shrink:0;background:linear-gradient(160deg, var(--sip-primary), var(--sip-primary-dark));}
.sip-brand-mark img{width:100%;height:100%;object-fit:cover;}
.sip-brand-text b{display:block;font-size:15px;font-weight:800;color:var(--sip-primary-dark);letter-spacing:0.01em;}
.sip-brand-text span{display:block;font-size:11px;color:var(--sip-ink-soft);}
.sip-card h1{font-size:24px;font-weight:700;letter-spacing:-0.01em;margin:0 0 6px;color:var(--sip-ink);}
.sip-card .sip-sub{font-size:13.5px;color:var(--sip-ink-soft);margin-bottom:26px;line-height:1.5;}
.sip-field{margin-bottom:16px;}
.sip-field label{display:block;font-size:12.5px;font-weight:700;color:var(--sip-ink);margin-bottom:6px;}
.sip-input-wrap{position:relative;display:flex;align-items:center;}
.sip-input-wrap svg{position:absolute;left:14px;color:var(--sip-ink-soft);pointer-events:none;z-index:1;}
.sip-input-wrap input{width:100%;padding:12px 14px 12px 42px;border:1.5px solid var(--sip-line);border-radius:11px;font-size:14px;font-family:'Inter',sans-serif;color:var(--sip-ink);outline:none;transition:border-color .15s ease, box-shadow .15s ease;background:#fff;}
.sip-input-wrap input:focus{border-color:var(--sip-primary);box-shadow:0 0 0 3px var(--sip-primary-tint);}
.sip-btn-submit{width:100%;padding:13px;border:none;border-radius:11px;background:linear-gradient(135deg, var(--sip-primary), var(--sip-primary-dark));color:#fff;font-size:14.5px;font-weight:700;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:8px;transition:filter .15s ease, transform .15s ease;box-shadow:0 14px 28px -12px rgba(11,66,38,0.55);font-family:'Inter', sans-serif;}
.sip-btn-submit:hover{filter:brightness(1.07);transform:translateY(-1px);}
.sip-foot-note{text-align:center;margin-top:22px;font-size:13.5px;color:var(--sip-ink-soft);}
.sip-foot-note a{color:var(--sip-gold);font-weight:700;}
.sip-foot-note a:hover{text-decoration:underline;}
.sip-right{order:1;flex:1;position:relative;overflow:hidden;color:#fff;background:linear-gradient(165deg, var(--sip-primary) 0%, var(--sip-primary-dark) 85%);display:flex;flex-direction:column;justify-content:space-between;padding:clamp(24px,4vh,44px) clamp(28px,3.5vw,48px);}
.sip-lattice{position:absolute;inset:0;opacity:.5;pointer-events:none;background-image:repeating-linear-gradient(45deg, rgba(192,138,34,0.16) 0px, rgba(192,138,34,0.16) 1.5px, transparent 1.5px, transparent 24px),repeating-linear-gradient(-45deg, rgba(192,138,34,0.16) 0px, rgba(192,138,34,0.16) 1.5px, transparent 1.5px, transparent 24px);}
.sip-right-inner{position:relative;z-index:1;display:flex;flex-direction:column;height:100%;}
.sip-emblem{width:52px;height:52px;border-radius:50%;flex-shrink:0;background:radial-gradient(circle at 35% 30%, #F4D999, var(--sip-gold));display:flex;align-items:center;justify-content:center;box-shadow:0 10px 26px -8px rgba(0,0,0,0.4);}
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
@media(max-width:860px){.sip-shell{flex-direction:column;height:100vh;}.sip-right{display:none;}.sip-left{flex:1;}}
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

            <h1>Verifikasi NPSN</h1>
            <p class="sip-sub">Masukkan NPSN Anda untuk memverifikasi dan melanjutkan proses registrasi satuan pendidikan.</p>

            @include('template.alert')

            <form action="{{ route('ceknpsn.proses') }}" method="post">
                @csrf
                <div class="sip-field">
                    <label for="npsn">NPSN</label>
                    <div class="sip-input-wrap">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="16" rx="2.4" stroke="currentColor" stroke-width="1.8"/><path d="M7 9h10M7 13h10M7 17h6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                        <input id="npsn" name="npsn" type="text" value="{{ old('npsn') }}" placeholder="Contoh: 20539871" inputmode="numeric" class="@error('npsn') is-invalid @enderror">
                    </div>
                    @error('npsn')<small style="color:#c0392b;">{{ $message }}</small>@enderror
                </div>
                <p style="font-size:12.5px;color:var(--sip-ink-soft);margin:-6px 0 22px;line-height:1.5;">Verifikasi NPSN untuk melakukan registrasi satuan pendidikan Anda.</p>

                <button type="submit" class="sip-btn-submit">
                    Verifikasi NPSN
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
            </form>

            <div class="sip-foot-note">Sudah Punya Akun? <a href="{{ route('login') }}">Masuk Portal</a></div>
            <div class="sip-foot-note" style="margin-top:8px;">Belum Punya NPSN? <a href="{{ route('npsnvirtual') }}">Ajukan NPSN Virtual</a></div>
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
