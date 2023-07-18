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
                    <div class="card shadow-none border py-2 px-2 mb-0">
                        <div class="card-body d-flex justify-content-between align-items-center py-0 px-1">
                            <h5 class="mb-0">HASIL VALIDASI DOKUMEN ANDA</h5>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#scannerBackdrop"><i class="ti ti-camera"></i> BUKA SCANNER</button>
                        </div>
                    </div>
                </div>
            </div>

            @if($verifyData)
            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="card shadow-none mb-0" style="height:100%">
                        <div class="card-body py-0 px-1">
                            <div class="bg-file-image d-flex flex-column align-items-center justify-content-center">
                                <i class="ti ti-file-description"></i>
                                <h5 class="mt-1">{{ strtoupper($verifyData->typefile) }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-8">
                    <div class="card mb-0 shadow-none">
                        <div class="card-body py-0 px-1">
                            <table class="table table-striped mb-0">
                                <tr>
                                    <td width="190">Status Dokumen</td>
                                    <td width="30">:</td>
                                    <td>
                                        @if($satpenData->status == 'setujui')
                                            <span class="badge bg-success text-uppercase">Active</span>
                                        @elseif($satpenData->status == 'expired')
                                            <span class="badge bg-danger text-uppercase">{{ $satpenData->status }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                <td>Nomor Seri</td>
                                    <td>:</td>
                                    <td>{{ last(explode('/', $verifyData->qrcode)) }}</td>
                                </tr>
                                <tr>
                                    <td>Nama File</td>
                                    <td>:</td>
                                    <td>{{ $verifyData->nm_file }}</td>
                                </tr>
                                <tr>
                                    <td>Tipe</td>
                                    <td>:</td>
                                    <td>{{ strtoupper($verifyData->typefile) }}</td>
                                </tr>
                                <tr>
                                    <td>No. Registrasi</td>
                                    <td>:</td>
                                    <td>{{ $satpenData->no_registrasi }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Sekolah</td>
                                    <td>:</td>
                                    <td>{{ $satpenData->nm_satpen }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Registrasi</td>
                                    <td>:</td>
                                    <td>{{ Date::tglMasehi($satpenData->tgl_registrasi) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="row mt-3">
                <div class="col text-center">
                    <div class="alert alert-danger">
                        <h5 class="mb-0">Dokumen tidak ditemukan! </h5>
                    </div>
                </div>
            </div>
            @endif
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
