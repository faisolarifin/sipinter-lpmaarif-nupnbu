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
                <li><a href="#"><span class=" fa fa-info-circle"> </span> Artikel</a></li>
                <li><a href="#"><span class="fa fa-snowflake-o"></span> Kelola Informasi</a></li>
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
                        <a href="{{ route('informasi.create') }}" class="btn btn-primary btn-sm">
                            <i class="ti ti-plus"></i> Postingan Baru</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="mytable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Type</th>
                            <th scope="col">Tanggal Upload</th>
                            <th scope="col">Headline</th>
                            <th scope="col">Content</th>
                            <th scope="col">Tag</th>
                            <th scope="col" width="100">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($no=0)
                        @foreach($listInformasi as $row)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td><img src="{{ \Illuminate\Support\Facades\Storage::url($row->image) }}" alt="..." width="100"></td>
                                <td>{{ $row->type }}</td>
                                <td>{{ \App\Helpers\Date::tglIndo($row->tgl_upload) }}</td>
                                <td>{{ $row->headline }}</td>
                                <td>{!! $row->content !!}</td>
                                <td><small>{{ $row->tag }}</small></td>
                                <td>
                                    <a>
                                        <button class="btn btn-sm btn-info"><i class="ti ti-eye"></i></button>
                                    </a>
                                    <a href="{{ route('informasi.edit', $row->id_info) }}">
                                        <button class="btn btn-sm btn-warning"><i class="ti ti-edit"></i></button>
                                    </a>
                                    <form action="{{ route('informasi.destroy', $row->id_info) }}" method="post" class="d-inline deleteBtn">
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
