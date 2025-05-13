@extends('template.layout', [
    'title' => 'Sipinter Admin - Detail Satuan Pendidikan'
])

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/timeline.css') }}" />
@endsection

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
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> Organisasi</a></li>
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> Detail</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title fw-semibold mb-1">Detail Profile</h5>
                            <small>detail profile organisasi</small>
                        </div>
                        <div>
                            <a href="{{ url()->previous() }}" class="btn btn-sm btn-info">back
                                <i class="ti ti-chevrons-right"></i></a>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-5" style="overflow-x:auto;">
                            <table>
                                <tbody>
                                @if ($data->nama_pc)
                                <tr>
                                    <th width="140">Nama Cabang</th>
                                    <td width="30">:</td>
                                    <td>{{ $data->nama_pc }}</td>
                                </tr>
                                <tr>
                                    <th>Provinsi</th>
                                    <td>:</td>
                                    <td>{{ $data->prov->nm_prov }}</td>
                                </tr>
                                @elseif ($data->nm_prov)
                                <tr>
                                    <th>Nama Wilayah</th>
                                    <td>:</td>
                                    <td>Pengurus Wilayah {{ $data->nm_prov }}</td>
                                </tr>
                                <tr>
                                    <th>Provinsi</th>
                                    <td>:</td>
                                    <td>{{ $data->nm_prov }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Kabupaten</th>
                                    <td>:</td>
                                    <td>{{ $data->profile->kabupaten }}</td>
                                </tr>
                                <tr>
                                    <th>Kecamatan</th>
                                    <td>:</td>
                                    <td>{{ $data->profile->kecamatan }}</td>
                                </tr>
                                <tr>
                                    <th>Kelurahan</th>
                                    <td>:</td>
                                    <td>{{ $data->profile->kelurahan }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>:</td>
                                    <td>{{ $data->profile->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>Longitude</th>
                                    <td>:</td>
                                    <td>{{ $data->profile->bujur }}</td>
                                </tr>
                                <tr>
                                    <th>Latitude</th>
                                    <td>:</td>
                                    <td>{{ $data->profile->lintang }}</td>
                                </tr>
                                <tr>
                                    <th>Website</th>
                                    <td>:</td>
                                    <td>{{ $data->profile->kabupaten }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-5" style="overflow-x:auto;">
                            <table>
                                <tbody>
                                <tr>
                                    <th width="170">Ketua</th>
                                    <td width="30">:</td>
                                    <td>{{ $data->profile->ketua }}</td>
                                </tr>
                                <tr>
                                    <th>Telepon Ketua</th>
                                    <td>:</td>
                                    <td>{{ $data->profile->telp_ketua }}</td>
                                </tr>
                                <tr>
                                    <th>Wakil Ketua</th>
                                    <td>:</td>
                                    <td>{{ $data->profile->wakil_ketua }}</td>
                                </tr>
                                <tr>
                                    <th>Telepon Wakil</th>
                                    <td>:</td>
                                    <td>{{ $data->profile->telp_wakil }}</td>
                                </tr>
                                <tr>
                                    <th>Sekretaris</th>
                                    <td>:</td>
                                    <td>{{ $data->profile->sekretaris }}</td>
                                </tr>
                                <tr>
                                    <th>Telepon Sekretaris</th>
                                    <td>:</td>
                                    <td>{{ $data->profile->telp_sekretaris }}</td>
                                </tr>
                                <tr>
                                    <th>Bendahara</th>
                                    <td>:</td>
                                    <td>{{ $data->profile->bendahara }}</td>
                                </tr>
                                <tr>
                                    <th>Telepon Bendahara</th>
                                    <td>:</td>
                                    <td>{{ $data->profile->telp_bendahara }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
