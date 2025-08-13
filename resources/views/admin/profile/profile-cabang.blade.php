@extends('template.layout', [
    'title' => 'Sipinter - Data Pengurus Cabang',
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
                    <li><a href="#"><span class=" fa fa-info-circle"> </span> Profile</a></li>
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> Pengurus Cabang</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <div class="card w-100">
                <div class="card-body pt-3">

                    <div class="d-flex justify-content-between align-items-sm-center mt-2 mb-3">
                        <div>
                            <h5 class="mb-0">Profile Cabang</h5>
                            <small>daftar profile pengurus cabang</small>
                        </div>
                        <div class="d-flex">
                            <div class="select-picker">
                                @include('component.selectpicker', [
                                    'name' => 'wilayah',
                                    'prefix' => 'Wilayah ',
                                    'current' => request('wilayah'),
                                    'default' => 'WILAYAH',
                                    'val' => 'id_prov',
                                    'label' => 'nm_prov',
                                    'data' => $prov,
                                ])
                            </div>
                            <a href="#" class="btn btn-success btn-sm ms-2 py-2" id="export-btn"><i
                                    class="ti ti-file-spreadsheet"></i> Export to Excel</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover" id="mytable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Cabang</th>
                                    <th scope="col">Provinsi</th>
                                    <th scope="col">Ketua</th>
                                    <th scope="col">Telepon Ketua</th>
                                    <th scope="col">Sekretaris</th>
                                    <th scope="col">Telepon Sekretaris</th>
                                    <th scope="col" width="100">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cabang as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->nama_pc }}</td>
                                        <td>{{ $row->prov->nm_prov }}</td>
                                        <td>{{ $row->profile->ketua }}</td>
                                        <td>{{ $row->profile->telp_ketua }}</td>
                                        <td>{{ $row->profile->sekretaris }}</td>
                                        <td>{{ $row->profile->telp_sekretaris }}</td>
                                        <td>
                                            <a href="{{ route('a.cabang.detail', $row->id_pc) }}">
                                                <button class="btn btn-sm btn-secondary me-1">
                                                    <i class="ti ti-eye"></i>
                                                </button>
                                            </a>
                                            <form action="{{ route('a.cabang.destroy', $row->profile->id) }}" method="post"
                                                class="d-inline deleteBtn">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="ti ti-trash"></i></button>
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
    </div>
@endsection

@section('extendscripts')
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

        $("#export-btn").attr("href", "{{ route('cabang.excel') }}" + location.search);
    </script>
@endsection
