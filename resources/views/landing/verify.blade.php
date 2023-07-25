@extends('template.general', [
    'title' => "Validasi - Sistem Administrasi Pendidikan Terpadu LP Ma'arif NU PBNU"
])

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}" />
@endsection

@section('container')
    @include('template.navhome')

    <div class="container">
        <div class="row-slide-map h-row py-4 px-5 pb-5 mt-3 mt-sm-5">
            <div class="row">
                <div class="col d-flex align-items-center">
                    <img src="{{ asset('assets/images/logos/green-nahdlatul-ulama-logo.png') }}" width="80" alt="...">
                    <div class="ms-2">
                        <h5 class="mb-0">Sistem Administrasi Pendidikan Terpadu</h5>
                        <h6 class="mb-0">Lembaga Pendidikan Ma'arif NU PBNU</h6>
                    </div>
                </div>
            </div>

            <div class="row mt-3 justify-content-center">
                <div class="col-12">
                    <div class="card shadow-none py-2 px-2 mb-0">
                        <div class="card-body py-0 px-1">
                            <div class="card-verify d-flex flex-column align-items-center py-5 px-3 text-center">
                                <h5 class="mb-4">VALIDASI DOKUMEN SATUAN PENDIDIKAN ANDA</h5>
                                <button class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#scannerBackdrop"><i class="ti ti-camera"></i> BUKA SCANNER</button>
                                <small>Tekan tombol BUKA SCANNER untuk memvalidasi keotentikan dari dokumen stauan pendidikan anda.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="scannerBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Scanner Barcode</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <video width="100%" id="preview"></video>
                </div>
            </div>
        </div>
    </div>

    @include('template.footer')

@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset("assets/libs/instascan/instascan.min.js") }}"></script>
    <script type="text/javascript">

        let scannerModal = document.getElementById('scannerBackdrop')
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
        scannerModal.addEventListener('show.bs.modal', function (event) {

            scanner.addListener('scan', function (content) {
                //redirect
                window.location = content;
            });
            Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function (e) {
                console.error(e);
            });
        });
        scannerModal.addEventListener('hidden.bs.modal', function (event) {
            scanner.stop();
        });
    </script>
@endsection
