@extends('template.layout', [
    'title' => 'Siapintar - Kelola Informasi'
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
                <li><a href="#"><span class=" fa fa-info-circle"> </span> Master Data</a></li>
                <li><a href="#"><span class="fa fa-snowflake-o"></span> Data Propinsi</a></li>
            </ul>
        </nav>

        <div class="card w-100">
            <div class="card-body pt-3">

                <div class="d-flex justify-content-between align-items-sm-center mt-2 mb-3">
                    <div>
                        <h5 class="mb-0">Data Informasi</h5>
                        <small>list artikel informasi</small>
                    </div>
                    <div>
                        <a href="{{ route('propinsi.create') }}" class="btn btn-primary btn-sm">
                            <i class="ti ti-plus"></i> Propinsi Baru</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="mytable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Propinsi</th>
                            <th scope="col">Kode Propinsi Dapo</th>
                            <th scope="col">Nama Propinsi</th>
                            <th scope="col" width="100">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($no=0)
                        @foreach($listPropinsi as $row)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $row->kode_prov }}</td>
                                <td>{{ $row->kode_prov_kd }}</td>
                                <td>{{ $row->nm_prov }}</td>
                                <td>
                                    <a href="{{ route('propinsi.edit', $row->id_prov) }}">
                                        <button class="btn btn-sm btn-warning"><i class="ti ti-edit"></i></button>
                                    </a>
                                    <form action="{{ route('propinsi.destroy', $row->id_prov) }}" method="post" class="d-inline deleteBtn">
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
</div>
@endsection

@section('scripts')
<script src="{{asset('assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/dataTables.bootstrap5.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#mytable').DataTable();
    });

    $(".deleteBtn").on('click', function () {
        if (confirm("benar anda akan menghapus data?")) {
            return true;
        }
        return false;
    })
</script>
@endsection
