@extends('template.layout', [
    'title' => 'Sipinter - Tab Permohonan BHPNU'
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
                <li><a href="#"><span class=" fa fa-info-circle"> </span> BHPNU</a></li>
            </ul>
        </nav>

        @include('template.alert')

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#verifikasi" type="button" role="tab" aria-controls="verifikasi" aria-selected="true">VERIFIKASI</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#proses" type="button" role="tab" aria-controls="proses" aria-selected="false">SEDANG DIPROSES</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#terbit" type="button" role="tab" aria-controls="terbit" aria-selected="false">DOKUMEN DIKIRIM</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <!-- Verifikasi -->
            <div class="tab-pane fade show active" id="verifikasi" role="tabpanel" aria-labelledby="home-tab">
                <div class="card w-100">
                    <div class="card-body pt-3">
                        <div class="d-flex justify-content-between mt-2 mb-3">
                            <div>
                                <h5 class="mb-0">Permohonan BHPNU</h5>
                                <small>data permohonan bhpnu baru</small>
                            </div>
                        </div>
                        <div class="table-responsive mt-4">
                            <table class="table table-stripped mt-4" id="dtable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nomor Registrasi</th>
                                    <th>Nama Satpen</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Tanggal</th>
                                    @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @php($no=0)
                                @foreach($bhpnuVerifikasi as $row)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td><a href="{{ route('a.rekapsatpen.detail', $row->satpen->id_satpen) }}" class="text-decoration-underline">
                                                {{ $row->satpen->no_registrasi }}
                                            </a></td>
                                        <td>{{ $row->satpen->nm_satpen }}</td>
                                        <td>
                                            <a href="{{ route('a.bhpnu.file', $row->bukti_bayar) }}" class="btn btn-sm btn-secondary">Lihat Berkas</a>
                                        </td>
                                        <td>{{ Date::tglMasehi($row->tanggal) }}</td>
                                        @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                        <td>
                                            <a href="{{ route('a.bhpnu.acc', $row->id_bhpnu) }}" class="btn btn-sm btn-success me-1">
                                                <i class="ti ti-checks"></i>
                                            </a>
                                            <button class="btn btn-sm btn-danger me-1" data-bs-toggle="modal" data-bs-target="#modalTolak" data-bs="{{ $row->id_bhpnu }}">
                                                <i class="ti ti-x"></i>
                                            </button>
                                        </td>
                                        @endif
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
            <div class="tab-pane fade" id="proses" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card w-100">
                    <div class="card-body pt-3">
                        <div class="d-flex mt-2 mb-3">
                            <div>
                                <h5 class="mb-0">Dokumen BHPNU Diproses</h5>
                                <small>data permohonan bhpnu dalam proses pembuatan dokumen</small>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-stripped mt-4" id="dtable2">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nomor Registrasi</th>
                                    <th>Nama Satpen</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Tanggal</th>
                                    @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @php($no=0)
                                @foreach($bhpnuProses as $row)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td><a href="{{ route('a.rekapsatpen.detail', $row->satpen->id_satpen) }}" class="text-decoration-underline">
                                                {{ $row->satpen->no_registrasi }}
                                            </a></td>
                                        <td>{{ $row->satpen->nm_satpen }}</td>
                                        <td>
                                            <a href="{{ route('a.bhpnu.file', $row->bukti_bayar) }}" class="btn btn-sm btn-secondary">Lihat Berkas</a>
                                        </td>
                                        <td>{{ Date::tglMasehi($row->tanggal) }}</td>
                                        @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                        <td>
                                            <button class="btn btn-sm btn-success me-1" data-bs-toggle="modal" data-bs-target="#modalDikirim" data-bs="{{ $row->id_bhpnu }}">
                                                <i class="ti ti-checks"></i>
                                            </button>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Proses -->
            <!-- Terbit -->
            <div class="tab-pane fade" id="terbit" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card w-100">
                    <div class="card-body pt-3">
                        <div class="d-flex mt-2 mb-3">
                            <div>
                                <h5 class="mb-0">Dokumen Telah Dikirim</h5>
                                <small>data permohonan bhpnu dengan dokumen telah dikirim</small>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-stripped mt-4" id="dtable3">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nomor Registrasi</th>
                                    <th>Nama Satpen</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Nomor Resi</th>
                                    <th>Permohonan</th>
                                    <th>Dikirim</th>
                                    <th>Expired Dokumen</th>
                                    @if(in_array(auth()->user()->role, ["super admin"]))
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @php($no=0)
                                @foreach($bhpnuDikirim as $row)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td><a href="{{ route('a.rekapsatpen.detail', $row->satpen->id_satpen) }}" class="text-decoration-underline">
                                                {{ $row->satpen->no_registrasi }}
                                            </a></td>
                                        <td>{{ $row->satpen->nm_satpen }}</td>
                                        <td>
                                            <a href="{{ route('a.bhpnu.file', $row->bukti_bayar) }}" class="btn btn-sm btn-secondary">Lihat Berkas</a>
                                        </td>
                                        <td>{{ $row->no_resi }}</td>
                                        <td>{{ Date::tglMasehi($row->tanggal) }}</td>
                                        <td>{{ Date::tglMasehi($row->tgl_dikirim) }}</td>
                                        <td>{{ Date::tglMasehi($row->tgl_expired) }}</td>
                                        @if(in_array(auth()->user()->role, ["super admin"]))
                                        <td>
                                            <form action="{{ route('a.bhpnu.destroy', $row->id_bhpnu) }}" method="post" class="deleteBtn">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger me-1">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Revisi -->
        </div>
    </div>
</div>
@endsection

@include('admin.bhpnu.bhpnuModal')

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

    $(document).ready(function () {
        $('#dtable').DataTable();
        $('#dtable2').DataTable();
        $('#dtable3').DataTable();

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
