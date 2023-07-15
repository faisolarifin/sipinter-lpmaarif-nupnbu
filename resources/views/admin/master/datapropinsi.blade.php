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

        @include('template.alert')

        <div class="card w-100">
            <div class="card-body pt-3">

                <div class="d-flex justify-content-between align-items-sm-center mt-2 mb-3">
                    <div>
                        <h5 class="mb-0">Data Provinsi</h5>
                        <small>list data provinsi</small>
                    </div>
                    <div>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalFormBackdrop">
                            <i class="ti ti-plus"></i> Propinsi Baru</button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover" id="mytable">
                        <thead>
                        <tr>
                            <th scope="col" width="40">#</th>
                            <th scope="col">Kode Propinsi</th>
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
                                <td>{{ $row->nm_prov }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalFormUpdateBackdrop" data-bs="{{ $row->id_prov }}">
                                        <i class="ti ti-edit"></i></button>
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


@section('modals')

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalFormBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-2">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title mb-0" id="exampleModalLabel">Propinsi Baru</h5>
                        <small>tambahkan list propinsi baru</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('propinsi.store') }}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-2">
                            <label for="kode_prov" class="form-label">Kode Propinsi</label>
                            <input type="text" class="form-control form-control-sm @error('kode_prov') is-invalid @enderror" id="kode_prov" name="kode_prov" value="{{ old('kode_prov') }}">
                            <div class="invalid-feedback">
                                @error('kode_prov') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="nama_prov" class="form-label">Nama Propinsi</label>
                            <input type="text" class="form-control form-control-sm @error('nama_prov') is-invalid @enderror" id="nama_prov" name="nama_prov" value="{{ old('nama_prov') }}">
                            <div class="invalid-feedback">
                                @error('nama_prov') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Tambah -->

    <!-- Modal Edit -->
    <div class="modal fade" id="modalFormUpdateBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-2">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title mb-0" id="exampleModalLabel">Ubah Propinsi</h5>
                        <small>koreksi kesalahan propinsi</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="kode_prov" class="form-label">Kode Propinsi</label>
                            <input type="text" class="form-control form-control-sm @error('kode_prov') is-invalid @enderror" id="kode_prov" name="kode_prov" value="{{ old('kode_prov') }}">
                            <div class="invalid-feedback">
                                @error('kode_prov') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="nama_prov" class="form-label">Nama Propinsi</label>
                            <input type="text" class="form-control form-control-sm @error('nama_prov') is-invalid @enderror" id="nama_prov" name="nama_prov" value="{{ old('nama_prov') }}">
                            <div class="invalid-feedback">
                                @error('nama_prov') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm">Update Propinsi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Edit -->

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

    let modalFormUpdateBackdrop = document.getElementById('modalFormUpdateBackdrop')
    modalFormUpdateBackdrop.addEventListener('show.bs.modal', function (event) {

        let provId = event.relatedTarget.getAttribute('data-bs')

        $("#modalFormUpdateBackdrop form").attr("action", "{{ route('propinsi.update', ':param') }}".replace(':param', provId));
        $.ajax({
            url: "{{ route('propinsi.show', ':param') }}".replace(':param', provId),
            type: "GET",
            dataType: 'json',
            success: function (res) {
                $("input[name='kode_prov']").val(res.kode_prov);
                $("input[name='nama_prov']").val(res.nm_prov);
            }
        });
    });

</script>
@endsection
