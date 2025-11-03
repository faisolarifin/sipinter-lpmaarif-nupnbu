@extends('template.layout', [
    'title' => 'Sipinter - Data Tahun Pelajaran',
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
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> Tahun Pelajaran</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <div class="card w-100">
                <div class="card-body pt-3">

                    <div class="d-flex justify-content-between align-items-sm-center mt-2 mb-3">
                        <div>
                            <h5 class="mb-0">Tahun Pelajaran</h5>
                            <small>informasi daftar tahun pelajaran</small>
                        </div>
                        <div>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalFormBackdrop">
                                <i class="ti ti-plus"></i> Buat Baru</button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover" id="mytable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tahun Dapo</th>
                                    <th scope="col">Keterangan Tahun Pelajaran</th>
                                    <th scope="col" width="100">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($no = 0)
                                @foreach ($listTapel as $row)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $row->tapel_dapo }}</td>
                                        <td>{{ $row->nama_tapel }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#modalFormUpdateBackdrop" data-bs="{{ $row->id }}">
                                                <i class="ti ti-edit"></i></button>
                                            <form action="{{ route('tapel.destroy', $row->id) }}" method="post"
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


@section('modals')
    <!-- Modal Tambah -->
    <div class="modal fade" id="modalFormBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded-2">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title mb-0" id="exampleModalLabel">Tahun Pelajaran Baru</h5>
                        <small>tambahkan data tahun pelajaran baru</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tapel.store') }}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="row mb-2">
                            <div class="col-12 col-sm-4">
                                <label for="tapel_dapo" class="form-label">Tahun Dapo</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('tapel_dapo') is-invalid @enderror"
                                    id="tapel_dapo" name="tapel_dapo" value="{{ old('tapel_dapo') }}" required>
                                <div class="invalid-feedback">
                                    @error('tapel_dapo')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-8">
                                <label for="nama_tapel" class="form-label">Keterangan Tahun Pelajaran</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('nama_tapel') is-invalid @enderror"
                                    id="nama_tapel" name="nama_tapel" value="{{ old('nama_tapel') }}" required>
                                <div class="invalid-feedback">
                                    @error('nama_tapel')
                                        {{ $message }}
                                    @enderror
                                </div>
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
    <div class="modal fade" id="modalFormUpdateBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded-2">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title mb-0" id="exampleModalLabel">Ubah Tahun Pelajaran</h5>
                        <small>pebaharui data tahun pelajaran</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="row mb-2">
                            <div class="col-12 col-sm-4">
                                <label for="tapel_dapo" class="form-label">Tahun Dapo</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('tapel_dapo') is-invalid @enderror"
                                    id="tapel_dapo" name="tapel_dapo" value="{{ old('tapel_dapo') }}" required>
                                <div class="invalid-feedback">
                                    @error('tapel_dapo')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-8">
                                <label for="nama_tapel" class="form-label">Keterangan Tahun Pelajaran</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('nama_tapel') is-invalid @enderror"
                                    id="nama_tapel" name="nama_tapel" value="{{ old('nama_tapel') }}" required>
                                <div class="invalid-feedback">
                                    @error('nama_tapel')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm">Pebaharui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Edit -->
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
        })

        let modalFormUpdateBackdrop = document.getElementById('modalFormUpdateBackdrop')
        modalFormUpdateBackdrop.addEventListener('show.bs.modal', function(event) {

            let tapelId = event.relatedTarget.getAttribute('data-bs')

            $("#modalFormUpdateBackdrop form").attr("action", "{{ route('tapel.update', ':param') }}".replace(
                ':param', tapelId));
            $.ajax({
                url: "{{ route('tapel.show', ':param') }}".replace(':param', tapelId),
                type: "GET",
                dataType: 'json',
                success: function(res) {
                    $("input[name='tapel_dapo']").val(res.tapel_dapo);
                    $("input[name='nama_tapel']").val(res.nama_tapel);
                }
            });
        });
    </script>
@endsection
