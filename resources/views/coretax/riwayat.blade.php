@extends('template.layout', [
    'title' => 'Sipinter - History Permohonan OSS'
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
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> Layanan Coretax</a></li>
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> Riwayat</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <div class="card" style="min-height:30rem;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title fw-semibold mb-1">Riwayat Layanan Coretax</h5>
                            <small>history permohonan oss yang pernah dilakukan</small>
                        </div>
                        <div>
                            <a href="{{ route('coretax') }}" class="btn btn-primary mx-1"><i class="ti ti-shield"></i> Layanan Coretax</a>
                            <a href="{{ route('coretax.history') }}" class="btn btn-green"><i class="ti ti-note"></i> Riwayat</a>
                        </div>
                    </div>

                    @if($coretax)
                        <div class="row justify-content-center mt-3">
                            <div class="col py-3">
                                <table class="table table-stripped" id="dtable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Permohonan</th>
                                        <th>Disetujui</th>
                                        <th>Kadaluarsa</th>
                                        <th>NITKU</th>
                                        <th>Nama PIC</th>
                                        <th>NIK PIC</th>
                                        <th>Whatsapp PIC</th>
                                        <th width="200">Catatan</th>
                                    </tr>
                                    <tbody>
                                    @foreach($coretax as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ Date::tglMasehi($row->tgl_submit) }}</td>
                                            <td>{{ Date::tglMasehi($row->tgl_acc) }}</td>
                                            <td>{{ Date::tglMasehi($row->tgl_expiry) }}</td>
                                            <td>{{ $row->nitku }}</td>
                                            <td>{{ $row->nama_pic }}</td>
                                            <td>{{ $row->nik_pic }}</td>
                                            <td>{{ $row->whatsapp_pic }}</td>
                                            <td>{{ $row->corestatus[count($row->corestatus)-1]->keterangan }}</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    @else
                        <div class="row align-items-center mt-4">
                            <div class="col text-center">
                                <div class="alert alert-danger">Riwayat pengajuan coretax belum ada</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables/dataTables.bootstrap5.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#dtable').DataTable();
        });
    </script>
@endsection
