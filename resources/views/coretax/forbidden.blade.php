@extends('template.layout', [
    'title' => 'Sipinter - Permohonan BHPNU'
])

@section('navbar')
    @if(in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
        @include('template.navadmin')
    @else
        @include('template.nav')
    @endif
@endsection

@section('container')
    <!--  Row 1 -->
    <div class="row container-begin">
        <div class="col-sm-12">

            <nav class="mt-2 mb-4" aria-label="breadcrumb">
                <ul id="breadcrumb" class="mb-0">
                    <li><a href="#"><i class="ti ti-home"></i></a></li>
                    <li><a href="#"><span class=" fa fa-info-circle"> </span> Layanan</a></li>
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> Coretax</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <div class="card" style="min-height:30rem;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title fw-semibold mb-1">Layanan Coretax</h5>
                            <small>pengajuaan permohonan untuk layanan coretax</small>
                        </div>
                    </div>

                    <div class="row align-items-center mt-4">
                        <div class="col text-center">
                            @if(in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                            <div class="alert alert-danger"><p>Anda tidak bisa melakukan pengajuan layanan Cooretax, anda belum melengkapi profile.</p>
                                <a href="{{ route('profile') }}" class="btn btn-sm btn-primary">Lengkapi Profile Disini</a>
                            </div>
                            @else
                            <div class="alert alert-danger">Anda tidak bisa melakukan pengajuan layanan Cooretax, status satuan pendidikan anda tidak aktif.</div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
