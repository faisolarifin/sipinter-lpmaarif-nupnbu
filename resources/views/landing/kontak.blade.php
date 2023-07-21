@extends('template.general', [
    'title' => "Dashboard - Sistem Administrasi Pendidikan Terpadu LP Ma'arif NU PBNU"
])

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}" />
@endsection

@section('container')
    @include('template.navhome')

    <div class="container container-body">

        <div class="row mt-3 mt-sm-5">
            <div class="col px-0">
                <nav aria-label="breadcrumb">
                    <ul id="breadcrumb" class="m-0">
                        <li><a href="#"><i class="ti ti-home"></i></a></li>
                        <li><a href="#"><span class="fa fa-snowflake-o"></span> Kontak </a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="row justify-content-center align-items-center row-slide-map mt-3 row-swipe-up rounded">
            <div class="col-sm-8 d-flex flex-column text-center">
                <div class="card shadow-none mb-0">
                    <div class="card-body">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.459573165216!2d106.84845077501024!3d-6.202945360764275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f46efff360a1%3A0x9da530ed51e1ccbd!2sSekretariat%20LP%20Ma&#39;arif%20NU%20Pusat!5e0!3m2!1sen!2sid!4v1689946195011!5m2!1sen!2sid" class="w-100" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-11 col-sm-4">
                <div class="card mb-3 shadow-none mb-0">
                    <div class="card-body text-center">
                        <i class="ti ti-phone-call fs-5"></i>
                        <p>Telp. 021-3904115</p>

                        <i class="ti ti-mail fs-5"></i>
                        <p>Email sekretariat@maarifnu.org</p>

                        <i class="ti ti-map-pin fs-5"></i>
                        <p>Lembaga Pendidikan Ma’arif Nahdlatul Ulama Pengurus Besar Nahdlatul Ulama Gedung PBNU II Lt. 2 Jl. Taman Amir Hamzah No. 5 Jakarta Pusat 10320</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('template.footer')

@endsection
