@extends('template.layout', [
    'title' => 'Siapinter - Permohonan OSS'
])

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/timeline.css') }}" />
@endsection

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
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> OSS</a></li>
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> History</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <div class="card" style="min-height:30rem;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title fw-semibold mb-1">History OSS</h5>
                            <small>history permohonan oss yang pernah dilakukan</small>
                        </div>
                        <div>
                            <a href="{{ route('oss') }}" class="btn btn-sm btn-primary mx-1">Permohonan OSS</a>
                            <a href="{{ route('oss.history') }}" class="btn btn-sm btn-green"><i class="ti ti-note"></i> History Permohonan</a>
                        </div>
                    </div>

                    @if($ossHistory)
                        <div class="row justify-content-center mt-3">
                            <div class="col py-3">
                                <table class="table table-stripped" id="dtable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Unik</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Permohonan</th>
                                        <th>Disetujui</th>
                                        <th>Expired Dokumen</th>
                                        <th>Status</th>
                                    </tr>
                                    <tbody>
                                    @foreach($ossHistory as $row)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $row->kode_unik }}</td>
                                            <td>
                                                <a href="{{ route('oss.file', $row->bukti_bayar) }}" class="btn btn-sm btn-secondary">Lihat Berkas</a>
                                            </td>
                                            <td>{{ Date::tglMasehi($row->tanggal) }}</td>
                                            <td>{{ Date::tglMasehi($row->tgl_izin) }}</td>
                                            <td>{{ Date::tglMasehi($row->tgl_expired) }}</td>
                                            <td><span class="badge bg-light-secondary text-secondary">{{ $row->status }}</span></td>
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
                                <div class="alert alert-danger">History belum ada</div>
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
