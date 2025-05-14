@extends('template.layout', [
    'title' => 'Sipinter - Manajemen Coretax'
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
                <li><a href="#"><span class=" fa fa-info-circle"> </span> Coretax</a></li>
            </ul>
        </nav>

        @include('template.alert')

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#verifikasi" type="button" role="tab" aria-controls="verifikasi" aria-selected="true">VERIFIKASI</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="revisi-tab" data-bs-toggle="tab" data-bs-target="#revisi" type="button" role="tab" aria-controls="revisi" aria-selected="true">REVISI</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#proses" type="button" role="tab" aria-controls="proses" aria-selected="false">SEDANG DIPROSES</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#satpen" type="button" role="tab" aria-controls="satpen" aria-selected="false">APPROVED SATPEN</button>
            </li>
            @if(!in_array(auth()->user()->role, ["admin cabang"]))
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#cabang" type="button" role="tab" aria-controls="cabang" aria-selected="false">APPROVED CABANG</button>
            </li>
            @if(!in_array(auth()->user()->role, ["admin wilayah"]))
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#wilayah" type="button" role="tab" aria-controls="wilayah" aria-selected="false">APPROVED WILAYAH</button>
            </li>
            @endif
            @endif
        </ul>

        <div class="tab-content" id="myTabContent">
            <!-- Verifikasi -->
            <div class="tab-pane fade show active" id="verifikasi" role="tabpanel" aria-labelledby="home-tab">
                <div class="card w-100">
                    <div class="card-body pt-3">
                        <div class="d-flex justify-content-between mt-2 mb-3">
                            <div>
                                <h5 class="mb-0">Pengajuan Layanan Coretax</h5>
                                <small>daftar permohonan pengajuan coretax semua level pengguna</small>
                            </div>
                        </div>
                        <div class="table-responsive mt-4">
                            <table class="table table-stripped mt-4" id="dtable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No Registrasi</th>
                                    <th>Nama Entitas</th>
                                    <th>Provinsi</th>
                                    <th>Kabupaten</th>
                                    <th>Tanggal Permohonan</th>
                                    <th>NITKU</th>
                                    <th>Nama PIC</th>
                                    <th>NIK PIC</th>
                                    <th>Level</th>
                                    @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($coretaxVer as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @if ($row->satpen)
                                        <td><a class="text-decoration-none" href="{{ route('a.rekapsatpen.detail', $row->satpen->id_satpen) }}" class="text-decoration-underline">
                                                {{ $row->satpen->no_registrasi }}
                                            </a></td>
                                        <td>{{ $row->satpen->nm_satpen }}</td>
                                        <td>{{ $row->satpen->provinsi->nm_prov }}</td>
                                        <td>{{ $row->satpen->kabupaten->nama_kab }}</td>
                                        @elseif ($row->cabang)
                                        <td></td>
                                        <td><a class="text-decoration-none" href="{{ route('a.cabang.detail', $row->id_pc) }}" class="text-decoration-underline">
                                            {{ $row->cabang->nama_pc }}
                                        </a></td>
                                        <td>{{ $row->cabang->prov->nm_prov }}</td>
                                        <td>{{ $row->cabang->profile->kabupaten }}</td>
                                        @elseif ($row->wilayah)
                                        <td></td>
                                        <td><a class="text-decoration-none" href="{{ route('a.wilayah.detail', $row->id_pw) }}" class="text-decoration-underline">
                                            Wilayah {{ $row->wilayah->nm_prov }}
                                        </a></td>
                                        <td>{{ $row->wilayah->nm_prov }}</td>
                                        <td>{{ $row->wilayah->profile->kabupaten }}</td>
                                        @endif
                                        <td>{{ Date::tglReverseDash($row->tgl_submit) }}</td>
                                        <td>{{ $row->nitku }}</td>
                                        <td>{{ $row->nama_pic }}</td>
                                        <td>{{ $row->nik_pic }}</td>
                                        <td>
                                            @if ($row->satpen)
                                            <span class="badge bg-info rounded-3 fw-semibold">SATPEN</span>
                                            @elseif ($row->cabang)
                                            <span class="badge bg-info rounded-3 fw-semibold">CABANG</span>
                                            @elseif ($row->wilayah)
                                            <span class="badge bg-info rounded-3 fw-semibold">WILAYAH</span>
                                            @endif
                                        </td>
                                    @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                        <td>
                                            <button class="btn btn-sm btn-info me-1 my-sm-1" data-bs-toggle="modal" data-bs-target="#modalDetailBackdrop" data-bs="{{ $row->id }}"><i class="ti ti-eye"></i></button>
                                            <a href="{{ route('a.coretax.acc', $row->id) }}">
                                                <button class="btn btn-sm btn-success me-1">
                                                    <i class="ti ti-checks"></i>
                                                </button>
                                            </a>
                                            <button class="btn btn-sm btn-danger me-1" data-bs-toggle="modal" data-bs-target="#modalTolak" data-bs="{{ $row->id }}">
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
            <!-- Revisi -->
            <div class="tab-pane fade" id="revisi" role="tabpanel" aria-labelledby="revisi-tab">
                <div class="card w-100">
                    <div class="card-body pt-3">
                        <div class="d-flex justify-content-between mt-2 mb-3">
                            <div>
                                <h5 class="mb-0">Revisi Layanan Coretax</h5>
                                <small>daftar permohonan coretax perlu perbaikan</small>
                            </div>
                        </div>
                        <div class="table-responsive mt-4">
                            <table class="table table-stripped mt-4" id="dtable2">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No Registrasi</th>
                                    <th>Nama Entitas</th>
                                    <th>Provinsi</th>
                                    <th>Kabupaten</th>
                                    <th>Tanggal Permohonan</th>
                                    <th>NITKU</th>
                                    <th>Nama PIC</th>
                                    <th>NIK PIC</th>
                                    <th>Level</th>
                                    @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                        <th>Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($coretaxRev as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @if ($row->satpen)
                                        <td><a class="text-decoration-none" href="{{ route('a.rekapsatpen.detail', $row->satpen->id_satpen) }}" class="text-decoration-underline">
                                                {{ $row->satpen->no_registrasi }}
                                            </a></td>
                                        <td>{{ $row->satpen->nm_satpen }}</td>
                                        <td>{{ $row->satpen->provinsi->nm_prov }}</td>
                                        <td>{{ $row->satpen->kabupaten->nama_kab }}</td>
                                        @elseif ($row->cabang)
                                        <td></td>
                                        <td><a class="text-decoration-none" href="{{ route('a.cabang.detail', $row->id_pc) }}" class="text-decoration-underline">
                                            {{ $row->cabang->nama_pc }}
                                        </a></td>
                                        <td>{{ $row->cabang->prov->nm_prov }}</td>
                                        <td>{{ $row->cabang->profile->kabupaten }}</td>
                                        @elseif ($row->wilayah)
                                        <td></td>
                                        <td><a class="text-decoration-none" href="{{ route('a.wilayah.detail', $row->id_pw) }}" class="text-decoration-underline">
                                            Wilayah {{ $row->wilayah->nm_prov }}
                                        </a></td>
                                        <td>{{ $row->wilayah->nm_prov }}</td>
                                        <td>{{ $row->wilayah->profile->kabupaten }}</td>
                                        @endif
                                        <td>{{ Date::tglReverseDash($row->tgl_submit) }}</td>
                                        <td>{{ $row->nitku }}</td>
                                        <td>{{ $row->nama_pic }}</td>
                                        <td>{{ $row->nik_pic }}</td>
                                        <td>
                                            @if ($row->satpen)
                                            <span class="badge bg-info rounded-3 fw-semibold">SATPEN</span>
                                            @elseif ($row->cabang)
                                            <span class="badge bg-info rounded-3 fw-semibold">CABANG</span>
                                            @elseif ($row->wilayah)
                                            <span class="badge bg-info rounded-3 fw-semibold">WILAYAH</span>
                                            @endif
                                        </td>
                                        @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                            <td>
                                                <button class="btn btn-sm btn-info me-1 my-sm-1" data-bs-toggle="modal" data-bs-target="#modalDetailBackdrop" data-bs="{{ $row->id }}"><i class="ti ti-eye"></i></button>
                                                <button class="btn btn-sm btn-success me-1" data-bs-toggle="modal" data-bs-target="#modalAppear" data-bs="{{ $row->id }}">
                                                    <i class="ti ti-checks"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger me-1" data-bs-toggle="modal" data-bs-target="#modalTolak" data-bs="{{ $row->id }}">
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
            <!-- End Revisi -->
            <!-- Proses -->
            <div class="tab-pane fade" id="proses" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card w-100">
                    <div class="card-body pt-3">
                        <div class="d-flex mt-2 mb-3">
                            <div>
                                <h5 class="mb-0">Dokumen Coretax Diproses</h5>
                                <small>daftar layanan dalam proses pembuatan/pengecekan dokumen</small>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-stripped mt-4" id="dtable3">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No Registrasi</th>
                                    <th>Nama Entitas</th>
                                    <th>Provinsi</th>
                                    <th>Kabupaten</th>
                                    <th>Tanggal Permohonan</th>
                                    <th>NITKU</th>
                                    <th>Nama PIC</th>
                                    <th>NIK PIC</th>
                                    <th>Level</th>
                                    @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                    <th width="25">Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($coretaxPro as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @if ($row->satpen)
                                        <td><a class="text-decoration-none" href="{{ route('a.rekapsatpen.detail', $row->satpen->id_satpen) }}" class="text-decoration-underline">
                                                {{ $row->satpen->no_registrasi }}
                                            </a></td>
                                        <td>{{ $row->satpen->nm_satpen }}</td>
                                        <td>{{ $row->satpen->provinsi->nm_prov }}</td>
                                        <td>{{ $row->satpen->kabupaten->nama_kab }}</td>
                                        @elseif ($row->cabang)
                                        <td></td>
                                        <td><a class="text-decoration-none" href="{{ route('a.cabang.detail', $row->id_pc) }}" class="text-decoration-underline">
                                            {{ $row->cabang->nama_pc }}
                                        </a></td>
                                        <td>{{ $row->cabang->prov->nm_prov }}</td>
                                        <td>{{ $row->cabang->profile->kabupaten }}</td>
                                        @elseif ($row->wilayah)
                                        <td></td>
                                        <td><a class="text-decoration-none" href="{{ route('a.wilayah.detail', $row->id_pw) }}" class="text-decoration-underline">
                                            Wilayah {{ $row->wilayah->nm_prov }}
                                        </a></td>
                                        <td>{{ $row->wilayah->nm_prov }}</td>
                                        <td>{{ $row->wilayah->profile->kabupaten }}</td>
                                        @endif
                                        <td>{{ Date::tglReverseDash($row->tgl_submit) }}</td>
                                        <td>{{ $row->nitku }}</td>
                                        <td>{{ $row->nama_pic }}</td>
                                        <td>{{ $row->nik_pic }}</td>
                                        <td>
                                            @if ($row->satpen)
                                            <span class="badge bg-info rounded-3 fw-semibold">SATPEN</span>
                                            @elseif ($row->cabang)
                                            <span class="badge bg-info rounded-3 fw-semibold">CABANG</span>
                                            @elseif ($row->wilayah)
                                            <span class="badge bg-info rounded-3 fw-semibold">WILAYAH</span>
                                            @endif
                                        </td>
                                        @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                        <td>
                                            <button class="btn btn-sm btn-info me-1 my-sm-1" data-bs-toggle="modal" data-bs-target="#modalDetailBackdrop" data-bs="{{ $row->id }}"><i class="ti ti-eye"></i></button>
                                            <button class="btn btn-sm btn-success me-1 my-sm-1" data-bs-toggle="modal" data-bs-target="#modalAppear" data-bs="{{ $row->id }}">
                                                <i class="ti ti-checks"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger me-1 my-sm-1" data-bs-toggle="modal" data-bs-target="#modalTolak" data-bs="{{ $row->id }}">
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
            <!-- End Proses -->
            <!-- Satpen -->
            <div class="tab-pane fade" id="satpen" role="tabpanel" aria-labelledby="satpen-tab">
                <div class="card w-100">
                    <div class="card-body pt-3">
                        <div class="d-flex mt-2 mb-3">
                            <div>
                                <h5 class="mb-0">Final Aprove Coretax Satpen</h5>
                                <small>daftar layanan coretax yang telah disetujui untuk satuan pendidikan</small>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-stripped mt-4" id="dtable4">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No Registrasi</th>
                                    <th>Nama Satpen</th>
                                    <th>Provinsi</th>
                                    <th>Kabupaten</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Tanggal Expired</th>
                                    <th>NITKU</th>
                                    <th>Nama PIC</th>
                                    <th>NIK PIC</th>
                                    @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($coretaxSatpen as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a class="text-decoration-none" href="{{ route('a.rekapsatpen.detail', $row->satpen->id_satpen) }}" class="text-decoration-underline">
                                            {{ $row->satpen->no_registrasi }}
                                        </a></td>
                                        <td>{{ $row->satpen->nm_satpen }}</td>
                                        <td>{{ $row->satpen->provinsi->nm_prov }}</td>
                                        <td>{{ $row->satpen->kabupaten->nama_kab }}</td>
                                        <td>{{ Date::tglReverseDash($row->tgl_submit) }}</td>
                                        <td>{{ Date::tglReverseDash($row->tgl_expiry) }}</td>
                                        <td>{{ $row->nitku }}</td>
                                        <td>{{ $row->nama_pic }}</td>
                                        <td>{{ $row->nik_pic }}</td>
                                        @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                        <td>
                                            <button class="btn btn-sm btn-info me-1 my-sm-1" data-bs-toggle="modal" data-bs-target="#modalDetailBackdrop" data-bs="{{ $row->id }}"><i class="ti ti-eye"></i></button>
                                            @if(in_array(auth()->user()->role, ["super admin"]))
                                            <form action="{{ route('a.coretax.destroy', $row->id) }}" method="post" class="deleteBtn">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger me-1">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </form>
                                            @endif
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

            <div class="tab-pane fade" id="cabang" role="tabpanel" aria-labelledby="cabang-tab">
                <div class="card w-100">
                    <div class="card-body pt-3">
                        <div class="d-flex mt-2 mb-3">
                            <div>
                                <h5 class="mb-0">Final Aprove Cabang</h5>
                                <small>daftar layanan coretax yang telah disetujui untuk cabang</small>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-stripped mt-4" id="dtable5">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Cabang</th>
                                    <th>Provinsi</th>
                                    <th>Kabupaten</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Tanggal Expired</th>
                                    <th>NITKU</th>
                                    <th>Nama PIC</th>
                                    <th>NIK PIC</th>
                                    @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($coretaxCab as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a class="text-decoration-none" href="{{ route('a.cabang.detail', $row->id_pc) }}" class="text-decoration-underline">
                                            {{ $row->cabang->nama_pc }}
                                        </a></td>
                                        <td>{{ $row->cabang->prov->nm_prov }}</td>
                                        <td>{{ $row->cabang->profile->kabupaten }}</td>
                                        <td>{{ Date::tglReverseDash($row->tgl_submit) }}</td>
                                        <td>{{ Date::tglReverseDash($row->tgl_expiry) }}</td>
                                        <td>{{ $row->nitku }}</td>
                                        <td>{{ $row->nama_pic }}</td>
                                        <td>{{ $row->nik_pic }}</td>
                                        @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                        <td>
                                            <button class="btn btn-sm btn-info me-1 my-sm-1" data-bs-toggle="modal" data-bs-target="#modalDetailBackdrop" data-bs="{{ $row->id }}"><i class="ti ti-eye"></i></button>
                                            @if(in_array(auth()->user()->role, ["super admin"]))
                                            <form action="{{ route('a.coretax.destroy', $row->id) }}" method="post" class="deleteBtn">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger me-1">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </form>
                                            @endif
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

            <div class="tab-pane fade" id="wilayah" role="tabpanel" aria-labelledby="wilayah-tab">
                <div class="card w-100">
                    <div class="card-body pt-3">
                        <div class="d-flex mt-2 mb-3">
                            <div>
                                <h5 class="mb-0">Final Aprove Wilayah</h5>
                                <small>daftar layanan coretax yang telah disetujui untuk wilayah</small>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-stripped mt-4" id="dtable6">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Wilayah</th>
                                    <th>Provinsi</th>
                                    <th>Kabupaten</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Tanggal Expired</th>
                                    <th>NITKU</th>
                                    <th>Nama PIC</th>
                                    <th>NIK PIC</th>
                                    @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($coretaxWil as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a class="text-decoration-none" href="{{ route('a.wilayah.detail', $row->id_pw) }}" class="text-decoration-underline">
                                            Wilayah {{ $row->wilayah->nm_prov }}
                                        </a></td>
                                        <td>{{ $row->wilayah->nm_prov }}</td>
                                        <td>{{ $row->wilayah->profile->kabupaten }}</td>
                                        <td>{{ Date::tglReverseDash($row->tgl_submit) }}</td>
                                        <td>{{ Date::tglReverseDash($row->tgl_expiry) }}</td>
                                        <td>{{ $row->nitku }}</td>
                                        <td>{{ $row->nama_pic }}</td>
                                        <td>{{ $row->nik_pic }}</td>
                                        @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                        <td>
                                            <button class="btn btn-sm btn-info me-1 my-sm-1" data-bs-toggle="modal" data-bs-target="#modalDetailBackdrop" data-bs="{{ $row->id }}"><i class="ti ti-eye"></i></button>
                                            @if(in_array(auth()->user()->role, ["super admin"]))
                                            <form action="{{ route('a.coretax.destroy', $row->id) }}" method="post" class="deleteBtn">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger me-1">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </form>
                                            @endif
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

            

        </div>
    </div>
</div>
@endsection

@include('admin.coretax.coretax-modal')

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
        $('#dtable4').DataTable();
        $('#dtable5').DataTable();
        $('#dtable6').DataTable();

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
