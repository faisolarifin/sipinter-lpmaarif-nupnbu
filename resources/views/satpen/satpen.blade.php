@extends('template.layout', [
    'title' => 'SIAPIN - Satpen'
])

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/timeline.css') }}" />
@endsection

@section('navbar')
    @include('template.nav')
@endsection

@section('container')
    <!--  Row 1 -->
    <div class="row container-begin">
        <div class="col-sm-12">

            <nav class="mt-2 mb-4" aria-label="breadcrumb">
                <ul id="breadcrumb" class="mb-0">
                    <li><a href="#"><i class="ti ti-home"></i></a></li>
                    <li><a href="#"><span class=" fa fa-info-circle"> </span> Permohonan</a></li>
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> MySatpen</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title fw-semibold mb-1">My SATPEN</h5>
                            <small>detail profile satuan pendidikan anda</small>
                        </div>
                        <div>
                            <a href="{{ route('mysatpen.revisi') }}" class="btn btn-sm btn-info"><i class="ti ti-edit"></i>
                                Revisi</a>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-4">
                            <table>

                                <tbody>
                                <tr>
                                    <td width="140">NPSN</td>
                                    <td width="30">:</td>
                                    <td>{{ $satpenProfile->npsn }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Satpen</td>
                                    <td>:</td>
                                    <td>{{ $satpenProfile->nm_satpen }}</td>
                                </tr>
                                <tr>
                                    <td>No. Registrasi</td>
                                    <td>:</td>
                                    <td>{{ $satpenProfile->no_registrasi }}</td>
                                </tr>
                                <tr>
                                    <td>Kategori Satpen</td>
                                    <td>:</td>
                                    <td>{{ $satpenProfile->kategori->nm_kategori }}</td>
                                </tr>
                                <tr>
                                    <td>Yayasan</td>
                                    <td>:</td>
                                    <td>{{ $satpenProfile->yayasan }}</td>
                                </tr>
                                <tr>
                                    <td>Kepala Sekolah</td>
                                    <td>:</td>
                                    <td>{{ $satpenProfile->kepsek }}</td>
                                </tr>
                                <tr>
                                    <td>Tahun Berdiri</td>
                                    <td>:</td>
                                    <td>{{ $satpenProfile->thn_berdiri }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ $satpenProfile->email }}</td>
                                </tr>
                                <tr>
                                    <td>Telpon</td>
                                    <td>:</td>
                                    <td>{{ $satpenProfile->telpon }}</td>
                                </tr>
                                <tr>
                                    <td>Fax</td>
                                    <td>:</td>
                                    <td>{{ $satpenProfile->fax }}</td>
                                </tr>
                                <tr>
                                    <td>Provinsi</td>
                                    <td>:</td>
                                    <td>{{ $satpenProfile->provinsi->nm_prov }}</td>
                                </tr>
                                <tr>
                                    <td>Kabupaten</td>
                                    <td>:</td>
                                    <td>{{ $satpenProfile->kabupaten->nama_kab }}</td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td>:</td>
                                    <td>{{ $satpenProfile->kecamatan }}</td>
                                </tr>
                                <tr>
                                    <td>Kelurahan/Desa</td>
                                    <td>:</td>
                                    <td>{{ $satpenProfile->kelurahan }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>{{ $satpenProfile->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>Aset Tanah</td>
                                    <td>:</td>
                                    <td>{{ $satpenProfile->aset_tanah }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Pemilik</td>
                                    <td>:</td>
                                    <td>{{ $satpenProfile->nm_pemilik }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-4 px-3">
                            <h5 class="mb-2 fs-4">File Pendukung</h5>
                            @foreach($satpenProfile->filereg as $row)
                                <div class="mb-3 px-3 py-2 card-box-detail">
                                    <h6 class="text-capitalize">{{$row->mapfile}}</h6>
                                    <p class="mb-1">{{$row->nm_lembaga}} {{$row->daerah}}</p>
                                    <p>Nomor : {{$row->nomor_surat}}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small>Tanggal {{\App\Helpers\Date::tglMasehi($row->tgl_surat)}}</small>
                                        <a href="{{route('viewerpdf', $row->filesurat)}}" target="_blank"><span class="badge fs-2 bg-primary">Lihat PDF</span></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-sm-4">
                            <ul class="timeline">
                                @foreach($satpenProfile->timeline as $row)
                                <li>
                                    <a href="#" class="text-capitalize">{{ $row->status_verifikasi}}</a>
                                    <small class="float-end">{{ $row->keterangan }}</small>
                                    <p>{{ $row->tgl_status }}</p>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="row border-2 border-top pt-3 mt-2 mx-sm-2">
                        <div class="col d-flex justify-content-center align-items-md-center text-center">
                            @if($satpenProfile->status == "setujui")
                            <div class="file-download-box">
                                <p class="mb-3">Piagam Ma'arif</p>
                                <a href="{{ route('download', 'piagam') }}" class="btn btn-sm btn-primary"><i class="ti ti-download"></i>
                                    unduh</a>
                            </div>
                            <div class="file-download-box">
                                <p class="mb-3">SK Satpen</p>
                                <a href="{{ route('download', 'sk') }}" class="btn btn-sm btn-primary"><i class="ti ti-download"></i>
                                    unduh</a>
                            </div>
                            @endif
                        </div>
                        <div class="col">
                            <table class="table table-bordered w-75 text-center mx-auto">
                                <thead>
                                <tr>
                                    <th>Status Registrasi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-capitalize">{{ $satpenProfile->timeline[sizeof($satpenProfile->timeline) - 1]->status_verifikasi }}</td>
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
