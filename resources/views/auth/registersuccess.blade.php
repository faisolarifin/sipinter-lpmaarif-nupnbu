@extends('template.general', [
    'title' => 'Sipinter - Register'
])
@section('container')
<div class="d-flex flex-column align-items-center">
    <div class="container-fluid login-side-right">
        <div class="row justify-content-sm-center align-items-center" style="height:25vh;">
            <div class="col-sm-10">
                <a href="./index.html" class="text-nowrap logo-img d-block py-2 w-100">
                    <img src="{{ asset('assets/images/logos/logo.png') }}" width="210" alt="">
                    <h6 class="fw-bold">Sistem Administrasi Pendidikan Terpadu Lembaga Pendidikan Ma'arif NU PBNU</h6>
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mx-auto w-75" style="margin-top:-2rem;">
                    <div class="card-body">
                        <h5 class="fw-medium mb-0">Registrasi Berhasil</h5>
                        <p className="mb-3">Berikut nomor registrasi satpen anda:</p>
                        <h3 class="text-center mb-3">{{ Session::get('regNumber') }}</h3>
                        <p>Untuk dapat masuk pada portal, anda harus login menggunakan nomor registrasi tersebut. Simpan nomor registrasi diatas. Nomor registrasi juga dikirimkan pada email anda.</p>

                        <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Halaman Login</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid login-side-right mt-4">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="py-6 px-6">
                    <p class="mb-0 fs-4 py-3"> Copyright &copy; {{ date('Y') }} Siapin LP Ma'arif NU </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
