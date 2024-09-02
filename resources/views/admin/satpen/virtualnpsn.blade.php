@extends('template.layout', [
    'title' => 'Sipinter - Tab Permohonan NPSN Virtual'
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
                <li><a href="#"><span class=" fa fa-info-circle"> </span> Virtual NPSN</a></li>
            </ul>
        </nav>

        @include('template.alert')

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#permohonan" type="button" role="tab" aria-controls="permohonan" aria-selected="true">PERMOHONAN</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#sedangaktif" type="button" role="tab" aria-controls="sedangaktif" aria-selected="false">VNPSN AKTIF</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <!-- Verifikasi -->
            <div class="tab-pane fade show active" id="permohonan" role="tabpanel" aria-labelledby="home-tab">
                <div class="card w-100">
                    <div class="card-body pt-3">
                        <div class="d-flex justify-content-between mt-2 mb-3">
                            <div>
                                <h5 class="mb-0">Permintaan VNPSN</h5>
                                <small>data permintaan pembuatan npsn virtual baru</small>
                            </div>
                        </div>
                        <div class="table-responsive mt-4">
                            <table class="table table-stripped mt-4" id="dtable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Sekolah</th>
                                    <th>Jenjang</th>
                                    <th>NIK Kepala Sekolah</th>
                                    <th>Email</th>
                                    <th>Provinsi</th>
                                    <th>Kabupaten</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no=0)
                                @foreach($VNpsnReqs as $row)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $row->nama_sekolah }}</td>
                                    <td>{{ $row->jenjang->nm_jenjang }}</td>
                                    <td>{{ $row->nik_kepsek }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->provinsi->nm_prov }}</td>
                                    <td>{{ $row->kabupaten->nama_kab }}</td>
                                    <td>{{ $row->alamat }}</td>
                                    <td>
                                        <form action="{{ route('a.vnpsn.accept', $row->id_npsn) }}" method="post" class="d-inline acceptBtn">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-sm btn-success"><i class="ti ti-checks"></i></button>
                                        </form>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalVNPSN" data-bs="{{ $row->id_npsn }}">
                                            <i class="ti ti-x"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Verifikasi -->
            <!-- Proses -->
            <div class="tab-pane fade" id="sedangaktif" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card w-100">
                    <div class="card-body pt-3">
                        <div class="d-flex mt-2 mb-3">
                            <div>
                                <h5 class="mb-0">VNPSN Aktif</h5>
                                <small>data npsn virtual yang masih aktif</small>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-stripped mt-4" id="dtable2">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>VNPSN</th>
                                    <th>Nama Sekolah</th>
                                    <th>Jenjang</th>
                                    <th>Provinsi</th>
                                    <th>Kabupaten</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no=0)
                                @foreach($VNpsnAccepts as $row)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $row->nomor_virtual }}</td>
                                        <td>{{ $row->nama_sekolah }}</td>
                                        <td>{{ $row->jenjang->nm_jenjang }}</td>
                                        <td>{{ $row->provinsi->nm_prov }}</td>
                                        <td>{{ $row->kabupaten->nama_kab }}</td>
                                        <td>{{ $row->alamat }}</td>
                                        <td>
                                            <form action="{{ route('a.vnpsn.destroy', $row->id_npsn ) }}" method="post" class="d-inline deleteBtn">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Proses -->
        </div>
    </div>
</div>

@include('admin.satpen.vnpsnModal')

@endsection

@include('admin.oss.ossModal')

@section('scripts')
<script src="{{asset('assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/dataTables.bootstrap5.min.js')}}"></script>
<script>

    $(".deleteBtn").on('click', function () {
        if (confirm("benar anda akan menghapus data?")) {
            return true;
        }
        return false;
    });

    $(".acceptBtn").on('click', function () {
        if (confirm("terima permintaan dan generate npsn virtual?")) {
            return true;
        }
        return false;
    });

    $(document).ready(function () {
        $('#dtable').DataTable();
        $('#dtable2').DataTable();

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
