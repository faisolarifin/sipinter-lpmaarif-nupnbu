@extends('template.layout', [
    'title' => "Sipinter - Dapo LP Ma'arif NU"
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
                <li><a href="#"><span class="fa fa-snowflake-o"></span> Dapo Satpen</a></li>
            </ul>
        </nav>

        @include('template.alert')

        <div class="card w-100">
            <div class="card-body pt-3" style="min-height:30rem;">

                <div class="d-flex justify-content-between align-items-sm-center mt-2 mb-3">
                    <div>
                        <h5 class="mb-0">Data Pokok</h5>
                        <small>data pokok satuan pendidikan</small>
                    </div>

                </div>

                <div class="row justify-content-center">
                    <div class="col col-sm-10 px-2 py-2">
                        <form method="get" enctype="multipart/form-data">
                            <div class="mb-2">
                                <label for="npsn" class="form-label required">Nomor Pokok Sekolah Nasional</label>
                                <input type="text" class="form-control  @error('npsn') is-invalid @enderror" id="npsn" name="npsn" value="{{ old('npsn') }}" placeholder="Nomor Pokok Sekolah Nasional" required>
                                <small>~ masukkan npsn dan temukan data sekolah dari database data pokok</small>
                                <div class="invalid-feedback">
                                    @error('npsn') {{ $message }} @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-start gap-3">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDapo">
                                    <i class="ti ti-plus"></i> Data Baru</button>
                                <button type="submit" class="btn btn-info">Temukan <i class="ti ti-search"></i></button>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="row justify-content-center mt-3">
                    <div class="col col-sm-10 text-center">

                        @if($dapo)
                            @if(@$dapo['code'])
                                <h4 class="text-dark-light">{{ $dapo['message'] }}</h4>
                            @else
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td colspan="3">
                                        <div class="d-flex justify-content-end">
{{--                                            <a class="btn btn-sm btn-success me-1" data-bs-toggle="modal" data-bs-target="#modalDapo">--}}
{{--                                                <i class="ti ti-pencil"></i>--}}
{{--                                            </a>--}}
                                            <form action="{{ route('dapo.delete', $dapo['npsn']) }}" method="post" class="deleteBtn">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger me-1">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th width="200" class="text-start">NPSN</th>
                                    <td width="10">:</td>
                                    <td class="text-start">{{ $dapo["npsn"] }}</td>
                                </tr>
                                <tr>
                                    <th width="200" class="text-start">Nama Sekolah</th>
                                    <td width="10">:</td>
                                    <td class="text-start">{{ $dapo["nama"] }}</td>
                                </tr>
                                <tr>
                                    <th width="200" class="text-start">Bentuk Pendidikan</th>
                                    <td width="10">:</td>
                                    <td class="text-start">{{ $dapo["bentuk_pendidikan"] }}</td>
                                </tr>
                                <tr>
                                    <th width="200" class="text-start">Propinsi</th>
                                    <td width="10">:</td>
                                    <td class="text-start">{{ $dapo["propinsiluar_negeri_ln"] }}</td>
                                </tr>
                                <tr>
                                    <th width="200" class="text-start">Kabupaten</th>
                                    <td width="10">:</td>
                                    <td class="text-start">{{ $dapo["kabkotanegara_ln"] }}</td>
                                </tr>
                                <tr>
                                    <th width="200" class="text-start">Kecamatan</th>
                                    <td width="10">:</td>
                                    <td class="text-start">{{ $dapo["kecamatankota_ln"] }}</td>
                                </tr>
                                <tr>
                                    <th width="200" class="text-start">Kelurahan</th>
                                    <td width="10">:</td>
                                    <td class="text-start">{{ $dapo["desakelurahan"] }}</td>
                                </tr>
                                <tr>
                                    <th width="200" class="text-start">Alamat</th>
                                    <td width="10">:</td>
                                    <td class="text-start">{{ $dapo["alamat"] }}</td>
                                </tr>

                                </tbody>
                            </table>
                            @endif
                        @endif
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@include('admin.master.dapo-modal')
@endsection

@section('scripts')
    <script>
        $(".deleteBtn").on('click', function () {
            if (confirm("benar anda akan menghapus data?")) {
                return true;
            }
            return false;
        });
    </script>
@endsection
