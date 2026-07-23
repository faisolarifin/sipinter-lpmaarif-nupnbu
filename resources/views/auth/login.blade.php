@extends('template.general', [
    'title' => 'Sipinter - Login',
])

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,400;0,500;0,600;0,700;0,800;1,500&family=IBM+Plex+Mono:wght@500;600&display=swap" rel="stylesheet">
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
                <img src="{{ asset('assets/images/logos/Sipinter_New_Logo_Text.png') }}" alt="SIPINTER">
            </a>

            <h1>Masuk ke akun Anda</h1>
            <p class="sip-sub">Kelola data satuan pendidikan Ma'arif NU Anda dalam satu portal terpadu.</p>

            @include('template.alert')

            <form action="{{ route('login.proses') }}" method="post">
                @csrf
                <div class="sip-field">
                    <label for="username">Username</label>
                    <div class="sip-input-wrap">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="8" r="3.6" stroke="currentColor" stroke-width="1.8"/><path d="M4.5 20c1.4-4 5-5.6 7.5-5.6s6.1 1.6 7.5 5.6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                        <input id="username" name="username" type="text" value="{{ old('username') }}" placeholder="Masukkan username" class="@error('username') is-invalid @enderror">
                    </div>
                    @error('username')<small style="color:#c0392b;">{{ $message }}</small>@enderror
                </div>
                <div class="sip-field">
                    <label for="password">Password</label>
                    <div class="sip-input-wrap has-toggle">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><rect x="5" y="10.5" width="14" height="9" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M8 10.5V7.5a4 4 0 0 1 8 0v3" stroke="currentColor" stroke-width="1.8"/></svg>
                        <input id="password" name="password" type="password" placeholder="Masukkan password" class="@error('password') is-invalid @enderror">
                        <button type="button" class="sip-toggle-eye" aria-label="Tampilkan password" onclick="var p=document.getElementById('password');var s=this.querySelector('svg');if(p.type==='password'){p.type='text';s.innerHTML='<path d=\"M3 3l18 18M10.5 9a3 3 0 0 1 4 4M6.5 6.5c-2 2-4 5.5-4 5.5s3.6 7 10 7c2 0 3.8-.6 5.3-1.6M21.5 17.5l-3-6\" stroke=\"currentColor\" stroke-width=\"1.8\" stroke-linecap=\"round\"/>'}else{p.type='password';s.innerHTML='<path d=\"M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7Z\" stroke=\"currentColor\" stroke-width=\"1.8\"/><circle cx=\"12\" cy=\"12\" r=\"3\" stroke=\"currentColor\" stroke-width=\"1.8\"/>'}">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7Z" stroke="currentColor" stroke-width="1.8"/><circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.8"/></svg>
                        </button>
                    </div>
                    @error('password')<small style="color:#c0392b;">{{ $message }}</small>@enderror
                </div>

                <div class="sip-row-between">
                    <label class="sip-checkbox"><input type="checkbox" name="remember"> Ingat Saya</label>
                    <a href="{{ route('forgot') }}">Lupa Password?</a>
                </div>

                <button type="submit" class="sip-btn-submit">
                    Masuk
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
            </form>

            <div class="sip-foot-note">
                Belum Punya Akun? <a href="{{ route('ceknpsn') }}">Buat akun baru</a>
            </div>
        </div>
    </div>

    <div class="sip-right">
        <div class="sip-lattice"></div>
        <div class="sip-right-inner">
            <div class="sip-brand-block">
                <div class="sip-emblem">
                    <svg viewBox="0 0 24 24" fill="none"><path d="M12 2 L14.2 8.6 L21 9.3 L15.8 13.6 L17.5 20.2 L12 16.4 L6.5 20.2 L8.2 13.6 L3 9.3 L9.8 8.6 Z" fill="#063D22"/></svg>
                </div>
                <div>
                    <h2>Sipinter LP Ma'arif NU PBNU</h2>
                    <span>Pelayanan Terintegrasi dan Terpadu</span>
                </div>
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
                <div class="sip-help-row">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M3 6l9 7 9-7" stroke="currentColor" stroke-width="1.8"/></svg>
                    bhp.maarifnu@gmail.com
                </div>
                <div class="sip-help-row">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M4 4h4l2 5-2.5 1.5a12 12 0 0 0 6 6L15 14l5 2v4a2 2 0 0 1-2 2C9.6 22 2 14.4 2 6a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="1.6"/></svg>
                    021-3904115 &nbsp;&bull;&nbsp; Fax 021-31906679
                </div>
                <div class="sip-wa-row">
                    <a class="sip-wa-pill" href="https://wa.me/6285883858897">WA 1 &middot; 0858-8385-8897</a>
                    <a class="sip-wa-pill" href="https://wa.me/6281319868302">WA 2 &middot; 0813-1986-8302</a>
                </div>
                <div class="sip-address">Gedung PBNU II, Lt. 2, Jl. Taman Amir Hamzah No. 5, Pegangsaan, Menteng, Jakarta Pusat 10320</div>
            </div>
        </div>
    </div>
</div>
@endsection
