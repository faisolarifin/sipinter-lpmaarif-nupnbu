@extends('template.layout', [
    'title' => 'Sipinter - Rekapitulasi Satuan Pendidikan',
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
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> Rekap Satpen</a></li>
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> Riwayat Layanan</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <div class="card w-100">
                <div class="card-body pt-3">

                    <div class="d-flex justify-content-between align-items-sm-center mt-2 mb-4">
                        <div>
                            <h5 class="mb-0">Riwayat Layanan</h5>
                            <small>riwayat pengajuan semua layanan bhpnu, coretax, dan oss</small>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover" id="mytable">
                            <thead>
                                <tr>
                                    <th>Layanan</th>
                                    <th>Bukti Bayar</th>
                                    <th>Tanggal</th>
                                    <th>Tgl Accept/ Tgl Dikirim</th>
                                    <th>Tanggal Expiry</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($history as $item)
                                    <tr>
                                        <td>{{ $item->layanan }}</td>
                                        <td>
                                            @if ($item->layanan == 'BHPNU')
                                                <a href="{{ route('a.bhpnu.file', $item->bukti_bayar) }}"
                                                    class="btn btn-sm btn-secondary">Lihat Berkas <i class="ti ti-eye"></i></a>
                                            @elseif ($item->layanan == 'OSS')
                                                <a href="{{ route('a.oss.file', $item->bukti_bayar) }}"
                                                    class="btn btn-sm btn-secondary">Lihat Berkas <i class="ti ti-eye"></i></a>
                                            @endif
                                        </td>
                                        <td>{{ Date::tglMasehi($item->tanggal) ?? '-' }}</td>
                                        <td>{{ Date::tglMasehi($item->acc) ?? '-' }}</td>
                                        <td>{{ Date::tglMasehi($item->expiry) ?? '-' }}</td>
                                        <td>{{ $item->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable();
        });

        $(".deleteBtn").on('click', function() {
            if (confirm("benar anda akan menghapus data?")) {
                return true;
            }
            return false;
        });
    </script>
@endsection
