@extends('template.layout', [
    'title' => 'Sipinter - Data Pengurus Cabang'
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
                <li><a href="#"><span class="fa fa-snowflake-o"></span> Pengurus Wilayah</a></li>
            </ul>
        </nav>

        @include('template.alert')

        <div class="card w-100">
            <div class="card-body pt-3">

                <div class="d-flex justify-content-between align-items-sm-center mt-2 mb-3">
                    <div>
                        <h5 class="mb-0">Profile Wilayah</h5>
                        <small>daftar profile pengurus wilayah</small>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover" id="mytable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Wilayah</th>
                            <th scope="col">Kabupaten</th>
                            <th scope="col">Kecamatan</th>
                            <th scope="col">Ketua</th>
                            <th scope="col">Wakil Ketua</th>
                            <th scope="col">Sekretaris</th>
                            <th scope="col">Bendahara</th>
                            <th scope="col" width="100">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($wilayah as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>Wilayah {{ $row->nm_prov }}</td>
                                <td>{{ $row->profile->kabupaten }}</td>
                                <td>{{ $row->profile->kecamatan }}</td>
                                <td>{{ $row->profile->ketua }}</td>
                                <td>{{ $row->profile->wakil_ketua }}</td>
                                <td>{{ $row->profile->sekretaris }}</td>
                                <td>{{ $row->profile->bendahara }}</td>
                                <td>
                                    <a href="{{ route('a.wilayah.detail', $row->id_prov) }}">
                                        <button class="btn btn-sm btn-secondary me-1">
                                            <i class="ti ti-eye"></i>
                                        </button>
                                    </a>
                                    <form action="{{ route('a.wilayah.destroy', $row->profile->id) }}" method="post" class="d-inline deleteBtn">
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
