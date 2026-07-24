@extends('template.general', [
    'title' => 'Sipinter - Registrasi Berhasil',
])

@section('style')
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
.sip-shell{display:flex;height:100vh;width:100vw;align-items:center;justify-content:center;}
.sip-card{width:100%;max-width:440px;background:#FFFFFF;border:1px solid var(--sip-line);border-radius:24px;padding:40px 38px;box-shadow:0 34px 64px -30px rgba(11,66,38,0.28);text-align:center;}
.sip-brand{display:inline-flex;align-items:center;gap:11px;margin-bottom:32px;text-decoration:none;}
.sip-brand-mark{width:40px;height:40px;border-radius:11px;overflow:hidden;flex-shrink:0;background:linear-gradient(160deg,var(--sip-primary),var(--sip-primary-dark));}
.sip-brand-mark img{width:100%;height:100%;object-fit:cover;}
.sip-brand-text b{display:block;font-size:15px;font-weight:800;color:var(--sip-primary-dark);letter-spacing:0.01em;text-align:left;}
.sip-brand-text span{display:block;font-size:11px;color:var(--sip-ink-soft);text-align:left;}
.sip-success-icon{width:64px;height:64px;border-radius:50%;background:var(--sip-primary-tint);display:inline-flex;align-items:center;justify-content:center;margin-bottom:20px;}
.sip-card h1{font-size:22px;font-weight:700;color:var(--sip-primary-dark);margin:0 0 8px;}
.sip-card p{font-size:13.5px;color:var(--sip-ink-soft);line-height:1.6;margin:0 0 20px;}
.sip-reg-number{font-family:'IBM Plex Mono',monospace;font-size:24px;font-weight:700;color:var(--sip-primary);letter-spacing:0.04em;padding:12px 24px;background:var(--sip-primary-tint);border-radius:12px;display:inline-block;margin-bottom:20px;}
.sip-btn{display:inline-flex;align-items:center;gap:8px;padding:12px 24px;border-radius:11px;font-size:14px;font-weight:700;font-family:'Inter',sans-serif;cursor:pointer;transition:all .18s ease;border:none;background:linear-gradient(135deg,var(--sip-primary),var(--sip-primary-dark));color:#fff;box-shadow:0 14px 28px -12px rgba(11,66,38,0.55);}
.sip-btn:hover{filter:brightness(1.07);transform:translateY(-1px);}
@media(max-width:640px){.sip-card{padding:28px 20px;}.sip-reg-number{font-size:20px;}}
</style>
@endsection

@section('container')
<div class="sip-shell">
    <div class="sip-card">
        <a href="{{ route('home') }}" class="sip-brand">
            <div class="sip-brand-mark"><img src="{{ asset('assets/images/logos/Sipinter_New_Logo_Text.png') }}" alt="SIPINTER"></div>
            <div class="sip-brand-text"><b>SIPINTER</b><span>LP Ma'arif NU PBNU</span></div>
        </a>

        <div class="sip-success-icon">
            <svg width="30" height="30" viewBox="0 0 24 24" fill="none"><path d="M4 12l5 5L20 6" stroke="#0B6B3A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <h1>Registrasi Berhasil</h1>
        <p>Berikut nomor registrasi satuan pendidikan Anda. Simpan nomor ini dengan baik.</p>

        <div class="sip-reg-number">{{ Session::get('regNumber') }}</div>

        <p style="font-size:12px;">Untuk masuk ke portal, gunakan nomor registrasi di atas sebagai username. Nomor registrasi juga dikirimkan ke email Anda.</p>

        <a href="{{ route('login') }}" class="sip-btn">
            Halaman Login
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
    </div>
</div>
@endsection
