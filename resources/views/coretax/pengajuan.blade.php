@extends('template.layout', [
    'title' => 'Sipinter - Layanan Coretax',
])

@section('navbar')
    @if (in_array(auth()->user()->role, ['admin wilayah', 'admin cabang']))
        @include('template.navadmin')
    @else
        @include('template.nav')
    @endif
@endsection

@section('container')
    <!--  Row 1 -->
    <div class="row container-begin">
        <div class="col-sm-12">

            <nav class="mt-2 mb-4" aria-label="breadcrumb">
                <ul id="breadcrumb" class="mb-0">
                    <li><a href="#"><i class="ti ti-home"></i></a></li>
                    <li><a href="#"><span class=" fa fa-info-circle"> </span> Layanan</a></li>
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> Coretax</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <div class="card" style="min-height:30rem;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title fw-semibold mb-1">Layanan Coretax</h5>
                            <small>pengajuaan permohonan untuk layanan coretax</small>
                        </div>
                        <div>
                            @if (!$coretax || @$coretax->status == 'final aprove')
                                <a href="{{ route('coretax.new') }}" class="btn btn-primary mx-1"><i
                                        class="ti ti-new-section"></i> Pengajuan Baru</a>
                            @endif
                            <a href="{{ route('coretax.history') }}" class="btn btn-green"><i class="ti ti-note"></i>
                                Riwayat</a>
                        </div>
                    </div>

                    @if ($coretax)
                        <div class="row justify-content-center mt-5 mb-2">
                            <div class="col col-sm-10 py-3">
                                <ul class="d-flex justify-content-between text-center mb-0 step-status">
                                    @foreach ($coretax->corestatus as $row)
                                        <li>
                                            <i class="ti {{ $row->icon }} {{ $row->status }}"></i>
                                            <p>{{ $row->textstatus }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col col-sm-11">
                                @php
                                    $expiryDate = \Carbon\Carbon::parse($coretax->tgl_expiry);
                                @endphp

                                @if (($expiryDate->isToday() || $expiryDate->isPast()) 
                                        && $coretax->new_request != null)
                                    <div class="alert alert-warning">Anda sudah bisa mengajukan permohonan coretax baru.
                                        Permohonan sebelumnya telah sampai pada tanggal kadaluarsa.</div>
                                @elseif ($coretax->new_request == 1)
                                    <div class="alert alert-primary">Buka expiry permohonan Coretax sebelumnya dalam
                                        verifikasi admin!</div>
                                @elseif (@$notice->keterangan)
                                    <div
                                        class="alert {{ $notice->status == 'success' ? 'alert-success' : 'alert-danger' }}">
                                        {{ $notice->keterangan }}</div>
                                @endif
                            </div>
                        </div>

                        @if ($coretax->status == 'mengisi persyaratan' || $coretax->status == 'perbaikan')
                            <div class="row justify-content-center">
                                <div class="col col-sm-11 border px-2 py-2">
                                    <form action="{{ route('coretax.save', $coretax->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="card-body pb-0">
                                            <h5 class="fw-medium mb-0">Permohonan Coretax</h5>
                                            <small>lengkapi kolom quisioner untuk pengajuan layanan coretax</small>
                                        </div>
                                        <div class="card-body pb-3 pt-3">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    @if ($coretax->wilayah)
                                                        <div class="mb-3">
                                                            <label for="wilayah" class="form-label">Nama Wilayah</label>
                                                            <input type="text" class="form-control" id="wilayah"
                                                                name="wilayah" value="{{ $coretax->wilayah->nm_prov }}"
                                                                placeholder="Nama Wilayah" readonly>
                                                        </div>
                                                    @elseif($coretax->cabang)
                                                        <div class="mb-3">
                                                            <label for="cabang" class="form-label">Nama Cabang</label>
                                                            <input type="text" class="form-control" id="cabang"
                                                                name="cabang" value="{{ $coretax->cabang->nama_pc }}"
                                                                placeholder="Nama Cabang" readonly>
                                                        </div>
                                                    @else
                                                        <div class="mb-3">
                                                            <label for="nm_sekolah" class="form-label">Nama Sekolah</label>
                                                            <input type="text" class="form-control" id="nm_sekolah"
                                                                name="nm_sekolah" value="{{ $coretax->satpen->nm_satpen }}"
                                                                placeholder="Nama Sekolah" readonly>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="nitku" class="form-label">NITKU/NPWP Lembaga
                                                            (Optional)</label>
                                                        <input type="text"
                                                            class="form-control  @error('nitku') is-invalid @enderror"
                                                            id="nitku" name="nitku" value="{{ $coretax->nitku }}"
                                                            placeholder="NITKU/NPWP Lembaga (Optional)">
                                                        <div class="invalid-feedback">
                                                            @error('nitku')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="nm_pic" class="form-label required">Nama PIC</label>
                                                        <input type="text"
                                                            class="form-control  @error('nm_pic') is-invalid @enderror"
                                                            id="nm_pic" name="nm_pic" value="{{ $coretax->nama_pic }}"
                                                            placeholder="Nama PIC">
                                                        <div class="invalid-feedback">
                                                            @error('nm_pic')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="whatsapp_pic" class="form-label required">Nomor Whatsapp
                                                            PIC</label>
                                                        <input type="text"
                                                            class="form-control  @error('whatsapp_pic') is-invalid @enderror"
                                                            id="whatsapp_pic" name="whatsapp_pic"
                                                            value="{{ $coretax->whatsapp_pic }}"
                                                            placeholder="Nomor Whatsapp PIC">
                                                        <div class="invalid-feedback">
                                                            @error('whatsapp_pic')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="nik_pic" class="form-label required">Akun Coretax/NIK
                                                            PIC</label>
                                                        <input type="text"
                                                            class="form-control  @error('nik_pic') is-invalid @enderror"
                                                            id="nik_pic" name="nik_pic"
                                                            value="{{ $coretax->nik_pic }}"
                                                            placeholder="Akun Coretax/NIK PIC">
                                                        <div class="invalid-feedback">
                                                            @error('nik_pic')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <small>Keterangan : (<span class="required"></span>) wajib diisi</small>
                                        </div>
                                        <div class="card-footer text-end">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="ti ti-send"></i> Kirim Permohonan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="row justify-content-center">
                                <div class="col col-sm-11 border px-3 py-3">
                                    <table class="table table-bordered mb-0">
                                        @if ($coretax->wilayah)
                                            <tr>
                                                <td class="border-bottom-0 align-middle" width="300">
                                                    <p class="mb-0">Nama Wilayah</p>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="mb-0">Pengurus Wilayah {{ $coretax->wilayah->nm_prov }}
                                                    </h6>
                                                </td>
                                            </tr>
                                        @elseif($coretax->cabang)
                                            <tr>
                                                <td class="border-bottom-0 align-middle" width="300">
                                                    <p class="mb-0">Nama Cabang</p>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="mb-0">{{ $coretax->cabang->nama_pc }}</h6>
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td class="border-bottom-0 align-middle" width="300">
                                                    <p class="mb-0">Nama Sekolah</p>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="mb-0">{{ $coretax->satpen->nm_satpen }}</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border-bottom-0 align-middle" width="300">
                                                    <p class="mb-0">Nomor Registrasi</p>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="mb-0">{{ $coretax->satpen->no_registrasi }}</h6>
                                                </td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td class="border-bottom-0 align-middle" width="300">
                                                <p class="mb-0">NITKU/NPWP Lembaga</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="mb-0">{{ $coretax->nitku }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-bottom-0 align-middle" width="300">
                                                <p class="mb-0">Nama PIC</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="mb-0">{{ $coretax->nama_pic }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-bottom-0 align-middle" width="300">
                                                <p class="mb-0">NIK PIC</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="mb-0">{{ $coretax->nik_pic }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-bottom-0 align-middle" width="300">
                                                <p class="mb-0">Nomor Whatsapp PIC</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="mb-0">{{ $coretax->whatsapp_pic }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-bottom-0 align-middle">
                                                <p class="mb-0">Tanggal Pengajuan</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="mb-0">
                                                    {{ \App\Helpers\Date::tglMasehi($coretax->tgl_submit) }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-bottom-0 align-middle">
                                                <p class="mb-0">Tanggal Disetujui</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="mb-0">
                                                    @if ($coretax->tgl_acc)
                                                        {{ \App\Helpers\Date::tglMasehi($coretax->tgl_acc) }}
                                                    @endif
                                                </h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-bottom-0 align-middle">
                                                <p class="mb-0">Tanggal Kadaluarsa</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="mb-0">
                                                    @if ($coretax->tgl_expiry)
                                                        {{ \App\Helpers\Date::tglMasehi($coretax->tgl_expiry) }}
                                                    @endif
                                                </h6>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="row align-items-center mt-4">
                            <div class="col text-center">
                                <div class="alert alert-danger">Belum ada Permohonan Layanan Coretax</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
