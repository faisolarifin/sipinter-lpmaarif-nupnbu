@extends('template.layout', [
    'title' => 'Sipinter - Tab Registrasi Satuan Pendidikan'
])

@section('navbar')
    @include('template.navadmin')
@endsection

@section('container')
<!--  Row 1 -->
<div class="row container-begin">
    <div class="col-sm-12">

        <nav class="mt-2 mb-4" aria-label="breadcrumb">
            <ul id="breadcrumb" class="mb-0">
                <li><a href="#"><i class="ti ti-home"></i></a></li>
                <li><a href="#"><span class=" fa fa-info-circle"> </span> Satpen</a></li>
                <li><a href="#"><span class="fa fa-snowflake-o"></span> Registrasi Satpen</a></li>
            </ul>
        </nav>

        @include('template.alert')

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#permohonan" type="button" role="tab" aria-controls="permohonan" aria-selected="true">PERMOHONAN</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#revisi" type="button" role="tab" aria-controls="revisi" aria-selected="false">REVISI</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#dokumen" type="button" role="tab" aria-controls="dokumen" aria-selected="false">PROSES DOKUMEN</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#perpanjang" type="button" role="tab" aria-controls="perpanjang" aria-selected="false">PERPANJANGAN</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <!-- Permohonan -->
            <div class="tab-pane fade show active" id="permohonan" role="tabpanel" aria-labelledby="home-tab">
                <div class="card w-100">
                    <div class="card-body pt-3">
                        <div class="d-flex mt-2 mb-3">
                            <div>
                                <h5 class="mb-0">Permohonan Satpen</h5>
                                <small>data permohonan satpen baru</small>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover" id="mytable">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NPSN</th>
                                    <th scope="col">No. Registrasi</th>
                                    <th scope="col">Nama Satpen</th>
                                    <th scope="col">Provinsi</th>
                                    <th scope="col">Kabupaten</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no=0)
                                @foreach($permohonanSatpens as $row)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $row->npsn }}</td>
                                    <td>{{ $row->no_registrasi }}</td>
                                    <td>{{ $row->nm_satpen }}</td>
                                    <td>{{ $row->provinsi->nm_prov }}</td>
                                    <td>{{ $row->kabupaten->nama_kab }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-green" data-bs-toggle="modal" data-bs-target="#modalDetailBackdrop" data-bs="{{ $row->id_satpen }}"><i class="ti ti-eye"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Permohonan -->
            <!-- Revisi -->
            <div class="tab-pane fade" id="revisi" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card w-100">
                    <div class="card-body pt-3">
                        <div class="d-flex mt-2 mb-3">
                            <div>
                                <h5 class="mb-0">Satpen Revisi</h5>
                                <small>data satpen yang dalam masa perbaikan</small>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover" id="mytable1">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NPSN</th>
                                    <th scope="col">No. Registrasi</th>
                                    <th scope="col">Nama Satpen</th>
                                    <th scope="col">Provinsi</th>
                                    <th scope="col">Kabupaten</th>
                                    <th scope="col">Kecamatan</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no=0)
                                @foreach($revisiSatpens as $row)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $row->npsn }}</td>
                                        <td>{{ $row->no_registrasi }}</td>
                                        <td>{{ $row->nm_satpen }}</td>
                                        <td>{{ $row->provinsi->nm_prov }}</td>
                                        <td>{{ $row->kabupaten->nama_kab }}</td>
                                        <td>{{ $row->kecamatan }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Revisi -->
            <!-- Proses Document -->
            <div class="tab-pane fade" id="dokumen" role="tabpanel" aria-labelledby="contact-tab">
                <div class="card w-100">
                    <div class="card-body pt-3">
                        <div class="d-flex mt-2 mb-3">
                            <div>
                                <h5 class="mb-0">Proses Dokumen</h5>
                                <small>buatkan </small>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover" id="mytable2">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">No. Registrasi</th>
                                    <th scope="col">Nama Satpen</th>
                                    <th scope="col">Provinsi</th>
                                    <th scope="col">Kabupaten</th>
                                    <th scope="col">Kecamatan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no=0)
                                @foreach($prosesDocuments as $row)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $row->no_registrasi }}</td>
                                        <td>{{ $row->nm_satpen }}</td>
                                        <td>{{ $row->provinsi->nm_prov }}</td>
                                        <td>{{ $row->kabupaten->nama_kab }}</td>
                                        <td>{{ $row->kecamatan }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-green" data-bs-toggle="modal" data-bs-target="#modalProsesDokumenBackdrop" data-bs="{{ $row->id_satpen }}"><i class="ti ti-eye"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Proses Document -->
            <!-- Perpanjangan -->
            <div class="tab-pane fade" id="perpanjang" role="tabpanel" aria-labelledby="contact-tab">
                <div class="card w-100">
                    <div class="card-body pt-3">
                        <div class="d-flex mt-2 mb-3">
                            <div>
                                <h5 class="mb-0">Perpanjangan</h5>
                                <small>permohonan perpanjangan dokumen </small>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover" id="mytable3">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">No. Registrasi</th>
                                    <th scope="col">Nama Satpen</th>
                                    <th scope="col">Provinsi</th>
                                    <th scope="col">Kabupaten</th>
                                    <th scope="col">Kecamatan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no=0)
                                @foreach($perpanjanganDocuments as $row)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $row->no_registrasi }}</td>
                                        <td>{{ $row->nm_satpen }}</td>
                                        <td>{{ $row->provinsi->nm_prov }}</td>
                                        <td>{{ $row->kabupaten->nama_kab }}</td>
                                        <td>{{ $row->kecamatan }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-green" data-bs-toggle="modal" data-bs-target="#modalPerpanjangBackdrop" data-bs="{{ $row->id_satpen }}"><i class="ti ti-eye"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Perpanjangan -->

        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="{{asset('assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/dataTables.bootstrap5.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#mytable').DataTable();
        $('#mytable1').DataTable();
        $('#mytable2').DataTable();
        $('#mytable3').DataTable();

        // Get the hash value from the URL (e.g., #profile)
        let hash = window.location.hash;
        // If a hash is present and corresponds to a tab, activate that tab
        if (hash) {
            $('.nav-link[data-bs-toggle="tab"][data-bs-target="' + hash + '"]').tab('show');
        }
        // Update the URL hash when a tab is clicked
        $('.nav-link[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
            let target = $(e.target).attr('data-bs-target');
            window.location.hash = target;
        });
    });

</script>
@endsection

@include('admin.satpen.detailSatpenPermohonan')
