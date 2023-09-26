@extends('template.layout', [
    'title' => 'Sipinter - Permohonan OSS'
])

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
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> OSS</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <div class="card" style="min-height:30rem;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title fw-semibold mb-1">Permohonan OSS</h5>
                            <small>permohonan oss dengan mengisi kode unik dan bukti pembayaran</small>
                        </div>
                        <div>
                            @if(!$oss || @$oss->status == 'izin terbit')
                                <a href="{{ route('oss.new') }}" class="btn btn-sm btn-primary mx-1"><i class="ti ti-new-section"></i> Permohonan Baru</a>
                            @endif
                                <a href="{{ route('oss.history') }}" class="btn btn-sm btn-green"><i class="ti ti-note"></i> History Permohonan</a>
                        </div>
                    </div>

                    @if($oss)
                        <div class="row justify-content-center mt-5 mb-2">
                            <div class="col col-sm-10 py-3">
                                <ul class="d-flex justify-content-between text-center mb-0 step-status">
                                    @foreach($oss->ossstatus as $row)
                                    <li>
                                        <i class="ti {{ $row->icon }} {{ $row->status }}"></i>
                                        <p>{{ $row->textstatus }}</p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col col-sm-10">
                                <hr>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col col-sm-11">
                                @if(@$notice->keterangan)
                                    <div class="alert {{ $notice->status=='success' ? 'alert-success' : 'alert-danger' }}">
                                        {{ $notice->keterangan }}</div>
                                @endif
                            </div>
                        </div>

                        @if($oss->status == 'mengisi persyaratan' || $oss->status == 'perbaikan')

                        <div class="row justify-content-center">
                            <div class="col col-sm-11 border px-2 py-2">
                                <form action="{{ route('oss.save', $oss->id_oss) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <table class="table mb-0">
                                        <tr>
                                            <td colspan="2">
                                                <p class="mb-0">MENGISI FORMULIR DATA PADA LINK</p>
                                                <small><a href="#">https://www.hackerearth.com/challenges/hackathon/intel-oneapi-hackathon-for-open-innovation/</a></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-bottom-0" colspan="2">
                                                <small>*) Kode unik didapatkan dari email setelah mengisi formulir.</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-bottom-0" width="300">
                                                <label class="form-label" for="kode_unik">Kode Unik</label>
                                                <input type="text" name="kode_unik" id="kode_unik" placeholder="Masukkan kode unik" class="form-control form-control-sm @error('kode_unik') is-invalid @enderror" value="{{ $oss->kode_unik }}">
                                                <div class="invalid-feedback">
                                                    @error('kode_unik') {{ $message }} @enderror
                                                </div>
                                            </td>
                                            <td class="border-bottom-0">
                                                <label class="form-label" for="bukti_bayar">Bukti Pembayaran</label>
                                                <input type="file" name="bukti_bayar" id="bukti_bayar" class="form-control form-control-sm @error('bukti_bayar') is-invalid @enderror">
                                                <div class="invalid-feedback">
                                                    @error('bukti_bayar') {{ $message }} @enderror
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-bottom-0" colspan="2">
                                                <button type="submit" class="btn btn-primary btn-sm">Ajukan Permohonan</button>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                        @else
                        <div class="row justify-content-center">
                            <div class="col col-sm-11 border px-3 py-3">
                                <table class="table table-bordered mb-0 table-striped">
                                    <tr>
                                        <td class="border-bottom-0 align-middle" width="200">
                                            <p class="mb-0">KODE UNIK</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h5>{{ $oss->kode_unik }}</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-bottom-0 align-middle">
                                            <p class="mb-0">BUKTI PEMBAYARAN</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <a href="{{ route('oss.file', $oss->bukti_bayar) }}" class="btn btn-sm btn-secondary">Lihat Berkas</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        @endif
                    @else
                        <div class="row align-items-center mt-4">
                            <div class="col text-center">
                                <div class="alert alert-danger">Belum ada pengajuan OSS</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
