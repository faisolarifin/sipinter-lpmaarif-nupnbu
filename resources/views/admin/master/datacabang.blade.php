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
                <li><a href="#"><span class="fa fa-snowflake-o"></span> Data Pengurus Cabang</a></li>
            </ul>
        </nav>

        @include('template.alert')

        <div class="card w-100">
            <div class="card-body pt-3">

                <div class="d-flex justify-content-between align-items-sm-center mt-2 mb-3">
                    <div>
                        <h5 class="mb-0">Data Pengurus Cabang</h5>
                        <small>list data pengurus cabang</small>
                    </div>
                    <div>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalFormBackdrop">
                            <i class="ti ti-plus"></i> Pengurus Cabang Baru</button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover" id="mytable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" width="180">Kode Kabupaten</th>
                            <th scope="col">Propinsi</th>
                            <th scope="col">Pengurus Cabang</th>
                            <th scope="col" width="100">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($no=0)
                        @foreach($listCabang as $row)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $row->kode_kab }}</td>
                                <td>{{ $row->prov->nm_prov }}</td>
                                <td>{{ $row->nama_pc }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalFormUpdateBackdrop" data-bs="{{ $row->id_pc }}">
                                        <i class="ti ti-edit"></i></button>
                                    <form action="{{ route('cabang.destroy', $row->id_pc) }}" method="post" class="d-inline deleteBtn">
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded-2">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title mb-0" id="exampleModalLabel">Pengurus Cabang Baru</h5>
                        <small>tambahkan list pengurus cabang baru</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('cabang.store') }}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <label for="kode_prov" class="form-label">Propinsi</label>
                                <select name="kode_prov" id="kode_prov" class="form-select form-select-sm @error('kode_prov') is-invalid @enderror">
                                    @foreach($listPropinsi as $row)
                                        <option value="{{ $row->id_prov }}">{{ $row->nm_prov }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="kode_kab" class="form-label">Kode Kabupaten</label>
                                <input type="text" class="form-control form-control-sm @error('kode_kab') is-invalid @enderror" id="kode_kab" name="kode_kab" value="{{ old('kode_kab') }}">
                                <div class="invalid-feedback">
                                    @error('kode_kab') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <label for="nama_pc" class="form-label">Nama Cabang</label>
                            <input type="text" class="form-control form-control-sm @error('nama_pc') is-invalid @enderror" id="nama_pc" name="nama_pc" value="{{ old('nama_pc') }}">
                            <div class="invalid-feedback">
                                @error('nama_pc') {{ $message }} @enderror
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
        <div class="modal-dialog modal-lg">
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
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <label for="kode_prov" class="form-label">Propinsi</label>
                                <select name="kode_prov" id="kode_prov" class="form-select form-select-sm @error('kode_prov') is-invalid @enderror">
                                    @foreach($listPropinsi as $row)
                                        <option value="{{ $row->id_prov }}">{{ $row->nm_prov }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="kode_kab" class="form-label">Kode Kabupaten</label>
                                <input type="text" class="form-control form-control-sm @error('kode_kab') is-invalid @enderror" id="kode_kab" name="kode_kab" value="{{ old('kode_kab') }}">
                                <div class="invalid-feedback">
                                    @error('kode_kab') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <label for="nama_pc" class="form-label">Nama Kabupaten</label>
                            <input type="text" class="form-control form-control-sm @error('nama_pc') is-invalid @enderror" id="nama_pc" name="nama_pc" value="{{ old('nama_pc') }}">
                            <div class="invalid-feedback">
                                @error('nama_pc') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm">Update Cabang</button>
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

        let pcId = event.relatedTarget.getAttribute('data-bs')

        $("#modalFormUpdateBackdrop form").attr("action", "{{ route('cabang.update', ':param') }}".replace(':param', pcId));
        $.ajax({
            url: "{{ route('cabang.show', ':param') }}".replace(':param', pcId),
            type: "GET",
            dataType: 'json',
            success: function (res) {
                $("select[name='kode_prov']").val(res.id_prov);
                $("input[name='kode_kab']").val(res.kode_kab);
                $("input[name='nama_pc']").val(res.nama_pc);
            }
        });
    });

</script>
@endsection
