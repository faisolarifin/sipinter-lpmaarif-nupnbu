@extends('template.layout', [
    'title' => 'Siapinter - Permohonan BHPNU'
])

@section('navbar')
    @include('template.nav')
@endsection

@section('container')
    <!--  Row 1 -->
    <div class="row container-begin">
        <div class="col-sm-12">

            <nav class="mt-2 mb-4" aria-label="breadcrumb">
                <ul id="breadcrumb" class="mb-0">
                    <li><a href="#"><i class="ti ti-home"></i></a></li>
                    <li><a href="#"><span class=" fa fa-info-circle"> </span> Permohonan</a></li>
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> BHPNU</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <div class="card" style="min-height:30rem;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title fw-semibold mb-1">Permohonan BHPNU</h5>
                            <small>permohonan bhpnu dengan mengunggah bukti pembayaran</small>
                        </div>
                    </div>

                    <div class="row align-items-center mt-4">
                        <div class="col text-center">
                            <div class="alert alert-danger">Anda tidak bisa melakukan pengajuan permohonan BHPNU, status satuan pendidikan anda tidak aktif.</div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection