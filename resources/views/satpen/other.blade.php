@extends('template.layout', [
    'title' => 'Sipinter - Data Lainnya',
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
                    <li><a href="#"><span class=" fa fa-info-circle"> </span> Satpen</a></li>
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> Data Lainnya</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <div class="card" style="min-height:30rem;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title fw-semibold mb-1">Data Lainnya</h5>
                            <small>Harmonisasi data akreditasi dan surat keputusan satuan pendidikan</small>
                        </div>
                    </div>

                    @if ($other || $satpen)
                        @if ((($other?->status_sinkron == 0 || $other == null) && $satpen !== null) || request()->segment(3) == 'edit')
                            <div class="row justify-content-center mx-1 mt-3">
                                <div class="col border px-3 py-3">
                                    <form action="{{ route('other.save') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div>
                                                <h5 class="fw-medium mb-0">Data Lainnya</h5>
                                                <small>lengkapi isian agar dapat mengakses berbagai layanan</small>
                                            </div>
                                            <a href="{{ route('other.referensi', $satpen->npsn) }}" id="btnSync">
                                                <button class="btn btn-success"><i class="ti ti-reload"></i>
                                                    Sinkron</button>
                                            </a>
                                        </div>
                                        <div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="no_registrasi" class="form-label required">Nama
                                                            Satpen</label>
                                                        <input type="hidden" name="otherId" value="{{ $other?->id }}">
                                                        <input type="hidden" name="satpenId"
                                                            value="{{ $satpen->id_satpen }}">
                                                        <input type="text"
                                                            class="form-control  @error('whatsapp_pic') is-invalid @enderror"
                                                            id="no_registrasi" name="no_registrasi"
                                                            value="{{ $satpen->nm_satpen }}" placeholder="Nama Satpen"
                                                            readonly>
                                                        <div class="invalid-feedback">
                                                            @error('no_registrasi')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-3">
                                                    <div class="mb-3">
                                                        <label for="no_registrasi" class="form-label required">Nomor
                                                            Registrasi</label>
                                                        <input type="text"
                                                            class="form-control  @error('whatsapp_pic') is-invalid @enderror"
                                                            id="no_registrasi" name="no_registrasi"
                                                            value="{{ $satpen->no_registrasi }}"
                                                            placeholder="Nomor Registrasi" readonly>
                                                        <div class="invalid-feedback">
                                                            @error('no_registrasi')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-3">
                                                    <div class="mb-3">
                                                        <label for="jenjang" class="form-label required">Jenjang</label>
                                                        <input type="text"
                                                            class="form-control  @error('whatsapp_pic') is-invalid @enderror"
                                                            id="jenjang" name="jenjang"
                                                            value="{{ $satpen->jenjang->nm_jenjang }}" placeholder="Jenjang"
                                                            readonly>
                                                        <div class="invalid-feedback">
                                                            @error('jenjang')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="prov" class="form-label required">Provinsi</label>
                                                        <input type="text"
                                                            class="form-control  @error('prov') is-invalid @enderror"
                                                            id="prov" name="prov"
                                                            value="{{ $satpen->provinsi->nm_prov }}" placeholder="Provinsi"
                                                            readonly>
                                                        <div class="invalid-feedback">
                                                            @error('prov')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="kabupaten"
                                                            class="form-label required">Kabupaten/Kota</label>
                                                        <input type="text"
                                                            class="form-control  @error('kabupaten') is-invalid @enderror"
                                                            id="kabupaten" name="kabupaten"
                                                            value="{{ $satpen->kabupaten->nama_kab }}"
                                                            placeholder="Kabupaten" readonly>
                                                        <div class="invalid-feedback">
                                                            @error('kabupaten')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="npyp" class="form-label required">NPYP</label>
                                                        <input type="text"
                                                            class="form-control  @error('npyp') is-invalid @enderror"
                                                            id="npyp" name="npyp"
                                                            value="{{ old('npyp') ?? $other?->npyp }}" placeholder="NPYP">
                                                        <div class="invalid-feedback">
                                                            @error('npyp')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-3">
                                                    <div class="mb-3">
                                                        <label for="naungan" class="form-label required">Naungan</label>
                                                        <input type="text"
                                                            class="form-control  @error('naungan') is-invalid @enderror"
                                                            id="naungan" name="naungan"
                                                            value="{{ old('naungan') ?? $other?->naungan }}"
                                                            placeholder="Naungan">
                                                        <div class="invalid-feedback">
                                                            @error('naungan')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-3">
                                                    <div class="mb-3">
                                                        <label for="akreditasi"
                                                            class="form-label required">Akreditasi</label>
                                                        <input type="text"
                                                            class="form-control  @error('akreditasi') is-invalid @enderror"
                                                            id="akreditasi" name="akreditasi"
                                                            value="{{ old('akreditasi') ?? $other?->akreditasi }}"
                                                            placeholder="Akreditasi">
                                                        <div class="invalid-feedback">
                                                            @error('akreditasi')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="no_sk_pendirian" class="form-label required">No. SK
                                                            Pendirian</label>
                                                        <input type="text"
                                                            class="form-control  @error('no_sk_pendirian') is-invalid @enderror"
                                                            id="no_sk_pendirian" name="no_sk_pendirian"
                                                            value="{{ old('no_sk_pendirian') ?? $other?->no_sk_pendirian }}"
                                                            placeholder="No. SK Pendirian">
                                                        <div class="invalid-feedback">
                                                            @error('no_sk_pendirian')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="tgl_sk_pendirian" class="form-label required">Tgl. SK
                                                            Pendirian</label>
                                                        <input type="date"
                                                            class="form-control  @error('tgl_sk_pendirian') is-invalid @enderror"
                                                            id="tgl_sk_pendirian" name="tgl_sk_pendirian"
                                                            value="{{ old('tgl_sk_pendirian') ?? $other?->tgl_sk_pendirian }}"
                                                            placeholder="Tgl. SK Pendirian">
                                                        <div class="invalid-feedback">
                                                            @error('tgl_sk_pendirian')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="no_sk_operasional" class="form-label required">No. SK
                                                            Operasional</label>
                                                        <input type="text"
                                                            class="form-control  @error('no_sk_operasional') is-invalid @enderror"
                                                            id="no_sk_operasional" name="no_sk_operasional"
                                                            value="{{ old('no_sk_operasional') ?? $other?->no_sk_operasional }}"
                                                            placeholder="No. SK Operasional">
                                                        <div class="invalid-feedback">
                                                            @error('no_sk_operasional')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="tgl_sk_operasional" class="form-label required">Tgl.
                                                            SK
                                                            Operasional</label>
                                                        <input type="date"
                                                            class="form-control  @error('tgl_sk_operasional') is-invalid @enderror"
                                                            id="tgl_sk_operasional" name="tgl_sk_operasional"
                                                            value="{{ old('tgl_sk_operasional') ?? $other?->tgl_sk_operasional }}"
                                                            placeholder="Tgl. SK Operasional">
                                                        <div class="invalid-feedback">
                                                            @error('tgl_sk_operasional')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="website" class="form-label required">Website</label>
                                                        <input type="text"
                                                            class="form-control  @error('website') is-invalid @enderror"
                                                            id="website" name="website"
                                                            value="{{ old('website') ?? $other?->website }}"
                                                            placeholder="Website">
                                                        <div class="invalid-feedback">
                                                            @error('website')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="kabupaten" class="form-label required">Lingkungan
                                                            Satpen</label>
                                                        <select name="lingkungan_satpen" id="lingkungan_satpen"
                                                            class="form-select @error('lingkungan_satpen') is-invalid @enderror">
                                                            <option value="Sekolah berbasis Pondok Pesantren"
                                                                {{ $other?->lingkungan_satpen == 'Sekolah berbasis Pondok Pesantren' ? 'selected' : '' }}>
                                                                Sekolah berbasis Pondok Pesantren
                                                            </option>
                                                            <option value="Sekolah Boarding"
                                                                {{ $other?->lingkungan_satpen == 'Sekolah Boarding' ? 'selected' : '' }}>
                                                                Sekolah Boarding
                                                            </option>
                                                            <option value="Sekolah biasa"
                                                                {{ $other?->lingkungan_satpen == 'Sekolah biasa' ? 'selected' : '' }}>
                                                                Sekolah Biasa
                                                            </option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            @error('lingkungan_satpen')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="card-footer text-end">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="ti ti-device-floppy"></i> Simpan Data</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="row justify-content-center mx-1 mt-3">
                                <div class="col border px-3 py-3">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <h5 class="fw-medium mb-0">Data Lainnya</h5>
                                            <small>infomasi akreditasi dan data pendukung satuan pendidikan</small>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('other.sync', $other->id_satpen) }}">
                                                <button class="btn btn-success"><i class="ti ti-reload"></i>
                                                    Sinkron</button>
                                            </a>
                                            <a href="{{ route('other.edit') }}">
                                                <button class="btn btn-primary"><i class="ti ti-pencil"></i>
                                                    Perbaiki</button>
                                            </a>
                                        </div>
                                    </div>
                                    <table class="table table-bordered mb-0">
                                        <tr>
                                            <td colspan="3" class="border-bottom-0 align-middle" width="150">
                                                <p class="mb-0">Nomor Registrasi</p>
                                            </td>
                                            <td colspan="6" class="border-bottom-0">
                                                <h6 class="mb-0">{{ $other->satpen->no_registrasi }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="border-bottom-0 align-middle">
                                                <p class="mb-0">Nama Satpen</p>
                                            </td>
                                            <td colspan="6" class="border-bottom-0">
                                                <h6 class="mb-0">{{ $other->satpen->nm_satpen }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="border-bottom-0 align-middle">
                                                <p class="mb-0">Jenjang</p>
                                            </td>
                                            <td colspan="6" class="border-bottom-0">
                                                <h6 class="mb-0">{{ $other->satpen->jenjang->nm_jenjang }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="border-bottom-0 align-middle">
                                                <p class="mb-0">Provinsi</p>
                                            </td>
                                            <td colspan="6" class="border-bottom-0">
                                                <h6 class="mb-0">{{ $other->satpen->provinsi->nm_prov }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="border-bottom-0 align-middle">
                                                <p class="mb-0">Kabupaten/Kota</p>
                                            </td>
                                            <td colspan="6" class="border-bottom-0">
                                                <h6 class="mb-0">{{ $other->satpen->kabupaten->nama_kab }}</h6>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="3" class="border-bottom-0 align-middle">
                                                <p class="mb-0">NPYP</p>
                                            </td>
                                            <td colspan="6" class="border-bottom-0">
                                                <h6 class="mb-0">{{ $other->npyp }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="border-bottom-0 align-middle">
                                                <p class="mb-0">Naungan</p>
                                            </td>
                                            <td colspan="6" class="border-bottom-0">
                                                <h6 class="mb-0">{{ $other->naungan }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="border-bottom-0 align-middle">
                                                <p class="mb-0">No. SK Pendirian</p>
                                            </td>
                                            <td colspan="6" class="border-bottom-0">
                                                <h6 class="mb-0">{{ $other->no_sk_pendirian }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="border-bottom-0 align-middle">
                                                <p class="mb-0">Tgl. SK Pendirian</p>
                                            </td>
                                            <td colspan="6" class="border-bottom-0">
                                                <h6 class="mb-0">{{ $other->tgl_sk_pendirian }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="border-bottom-0 align-middle">
                                                <p class="mb-0">No. SK Operasional</p>
                                            </td>
                                            <td colspan="6" class="border-bottom-0">
                                                <h6 class="mb-0">{{ $other->no_sk_operasional }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="border-bottom-0 align-middle">
                                                <p class="mb-0">Tgl. SK Operasional</p>
                                            </td>
                                            <td colspan="6" class="border-bottom-0">
                                                <h6 class="mb-0">{{ $other->tgl_sk_operasional }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="border-bottom-0 align-middle">
                                                <p class="mb-0">Akreditasi</p>
                                            </td>
                                            <td colspan="6" class="border-bottom-0">
                                                <h6 class="mb-0">{{ $other->akreditasi }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="border-bottom-0 align-middle">
                                                <p class="mb-0">Website</p>
                                            </td>
                                            <td colspan="6" class="border-bottom-0">
                                                <h6 class="mb-0">{{ $other->website }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="border-bottom-0 align-middle">
                                                <p class="mb-0">Lingkungan Satpen</p>
                                            </td>
                                            <td colspan="6" class="border-bottom-0">
                                                <h6 class="mb-0">{{ $other->lingkungan_satpen }}</h6>
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            function getDapoData(url) {
                const $btn = $('#btnSync').find("button");
                const originalText = `<i class="ti ti-reload"></i>
                                                    Sinkron`;
                $btn.prop('disabled', true);
                $btn.text('Loading...');

                $.ajax({
                    url: url,
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        const data = response.data;

                        $('#npyp').val(data.npyp);
                        $('#naungan').val(data.naungan);
                        $('#no_sk_pendirian').val(data.no_sk_pendirian);
                        $('#tgl_sk_pendirian').val(data?.tanggal_sk_pendirian.split('-').reverse().join('-'));
                        $('#no_sk_operasional').val(data.nomor_sk_operasional);
                        $('#tgl_sk_operasional').val(data?.tanggal_sk_operasional.split('-').reverse().join('-'));
                        $('#akreditasi').val(data.akreditasi);
                        $('#website').val(data.website);

                    },
                    error: function(xhr, status, error) {
                        console.error("Failed get data:", error);
                        alert("Failed get data from server");
                    },
                    complete: function() {
                        $btn.prop('disabled', false);
                        $btn.html(originalText);
                    }
                });
            }

            $('#btnSync').on('click', function(e) {
                e.preventDefault();
                const url = $(this).attr('href');
                if (url) {
                    getDapoData(url);
                }
            });

        });
    </script>
@endsection
