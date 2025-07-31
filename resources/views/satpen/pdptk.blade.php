@extends('template.layout', [
    'title' => 'Sipinter - Data PD & PTK',
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
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> PD & PTK</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <div class="card" style="min-height:30rem;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title fw-semibold mb-1">Data PD & PTK</h5>
                            <small>Harmonisasi data Peserta didik dan Pendidik dan Tenaga Kependidikan</small>
                        </div>
                    </div>

                    @if ($pdptk || $satpen)
                        @if ((($pdptk?->status_sinkron == 0 || $pdptk == null) && $satpen !== null) || request()->segment(3) == 'edit')
                            <div class="row justify-content-center mx-1 mt-3">
                                <div class="col border px-3 py-3">
                                    <form action="{{ route('pdptk.save') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div>
                                                <h5 class="fw-medium mb-0">PD & PTK</h5>
                                                <small>lengkapi isian agar dapat mengakses berbagai layanan</small>
                                            </div>
                                            <a href="{{ route('pdptk.dapo', $satpen->npsn) }}" id="btnSync">
                                                <button class="btn btn-success"><i class="ti ti-reload"></i>
                                                    Sinkron</button>
                                            </a>
                                        </div>
                                        <div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="tapel" class="form-label required">Tahun
                                                            Pelajaran</label>
                                                        <input type="hidden" name="pdptkId" value="{{ $pdptk?->id }}">
                                                        <input type="hidden" name="satpenId"
                                                            value="{{ $satpen->id_satpen }}">
                                                        <input type="text"
                                                            class="form-control  @error('tapel') is-invalid @enderror"
                                                            id="tapel" name="tapel" value="{{ $tapel }}"
                                                            placeholder="Tahun Pelajaran" readonly>
                                                        <div class="invalid-feedback">
                                                            @error('tapel')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
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
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="no_registrasi" class="form-label required">Nama
                                                            Satpen</label>
                                                        <input type="text"
                                                            class="form-control  @error('whatsapp_pic') is-invalid @enderror"
                                                            id="no_registrasi" name="no_registrasi"
                                                            value="{{ $satpen->no_registrasi }}" placeholder="Nama Satpen" readonly>
                                                        <div class="invalid-feedback">
                                                            @error('no_registrasi')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="jenjang" class="form-label required">Jenjang</label>
                                                        <input type="text"
                                                            class="form-control  @error('whatsapp_pic') is-invalid @enderror"
                                                            id="jenjang" name="jenjang"
                                                            value="{{ $satpen->jenjang->nm_jenjang }}"
                                                            placeholder="Jenjang" readonly>
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
                                                            value="{{ $satpen->provinsi->nm_prov }}"
                                                            placeholder="Provinsi" readonly>
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
                                                <div class="col-12 col-sm-3">
                                                    <div class="mb-3">
                                                        <label for="pd_lk" class="form-label required">PD LK</label>
                                                        <input type="text"
                                                            class="form-control  @error('pd_lk') is-invalid @enderror"
                                                            id="pd_lk" name="pd_lk"
                                                            value="{{ old('pd_lk') ?? $pdptk?->pd_lk }}"
                                                            placeholder="PD LK">
                                                        <div class="invalid-feedback">
                                                            @error('pd_lk')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-3">
                                                    <div class="mb-3">
                                                        <label for="pd_pr" class="form-label required">PD PR</label>
                                                        <input type="text"
                                                            class="form-control  @error('pd_pr') is-invalid @enderror"
                                                            id="pd_pr" name="pd_pr"
                                                            value="{{ old('pd_pr') ?? $pdptk?->pd_pr }}"
                                                            placeholder="PD PR">
                                                        <div class="invalid-feedback">
                                                            @error('pd_pr')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="jml_pd" class="form-label required">Jumlah
                                                            PD</label>
                                                        <input type="text"
                                                            class="form-control  @error('jml_pd') is-invalid @enderror"
                                                            id="jml_pd" name="jml_pd"
                                                            value="{{ old('jml_pd') ?? $pdptk?->jml_pd }}"
                                                            placeholder="Jumlah PD" readonly>
                                                        <div class="invalid-feedback">
                                                            @error('jml_pd')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-3">
                                                    <div class="mb-3">
                                                        <label for="guru_lk" class="form-label required">Guru LK</label>
                                                        <input type="text"
                                                            class="form-control  @error('prov') is-invalid @enderror"
                                                            id="guru_lk" name="guru_lk"
                                                            value="{{ old('guru_lk') ?? $pdptk?->guru_lk }}"
                                                            placeholder="Guru LK">
                                                        <div class="invalid-feedback">
                                                            @error('guru_lk')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-3">
                                                    <div class="mb-3">
                                                        <label for="guru_pr" class="form-label required">Guru PR</label>
                                                        <input type="text"
                                                            class="form-control  @error('guru_pr') is-invalid @enderror"
                                                            id="guru_pr" name="guru_pr"
                                                            value="{{ old('guru_pr') ?? $pdptk?->guru_pr }}"
                                                            placeholder="Guru PR">
                                                        <div class="invalid-feedback">
                                                            @error('guru_pr')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="jml_guru" class="form-label required">Jumlah
                                                            Guru</label>
                                                        <input type="text"
                                                            class="form-control  @error('jml_guru') is-invalid @enderror"
                                                            id="jml_guru" name="jml_guru"
                                                            value="{{ old('jml_guru') ?? $pdptk?->jml_guru }}"
                                                            placeholder="Jumlah Guru" readonly>
                                                        <div class="invalid-feedback">
                                                            @error('jml_guru')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-3">
                                                    <div class="mb-3">
                                                        <label for="tendik_lk" class="form-label required">Tendik
                                                            LK</label>
                                                        <input type="text"
                                                            class="form-control  @error('tendik_lk') is-invalid @enderror"
                                                            id="tendik_lk" name="tendik_lk"
                                                            value="{{ old('tendik_lk') ?? $pdptk?->tendik_lk }}"
                                                            placeholder="Tendik LK">
                                                        <div class="invalid-feedback">
                                                            @error('tendik_lk')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-3">
                                                    <div class="mb-3">
                                                        <label for="tendik_pr" class="form-label required">Tendik
                                                            PR</label>
                                                        <input type="text"
                                                            class="form-control  @error('tendik_pr') is-invalid @enderror"
                                                            id="tendik_pr" name="tendik_pr"
                                                            value="{{ old('tendik_pr') ?? $pdptk?->tendik_pr }}"
                                                            placeholder="Tendik PR">
                                                        <div class="invalid-feedback">
                                                            @error('tendik_pr')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="jml_tendik" class="form-label required">Jumlah
                                                            Tendik</label>
                                                        <input type="text"
                                                            class="form-control  @error('jml_tendik') is-invalid @enderror"
                                                            id="jml_tendik" name="jml_tendik"
                                                            value="{{ old('jml_tendik') ?? $pdptk?->jml_tendik }}"
                                                            placeholder="Jumlah Tendik" readonly>
                                                        <div class="invalid-feedback">
                                                            @error('jml_tendik')
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
                                            <h5 class="fw-medium mb-0">PD & PTK</h5>
                                            <small>infomasi data rekapitulasi peserta didik dan tenaga pengajar</small>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('pdptk.sync', $pdptk->id_satpen) }}">
                                                <button class="btn btn-success"><i class="ti ti-reload"></i>
                                                    Sinkron</button>
                                            </a>
                                            <a href="{{ route('pdptk.edit') }}">
                                                <button class="btn btn-primary"><i class="ti ti-pencil"></i>
                                                    Perbaiki</button>
                                            </a>
                                        </div>
                                    </div>
                                    <table class="table table-bordered mb-0">
                                        <tr>
                                            <td colspan="3" class="border-bottom-0 align-middle">
                                                <p class="mb-0">Tahun Pelajaran</p>
                                            </td>
                                            <td colspan="6" class="border-bottom-0">
                                                <h6 class="mb-0">{{ $pdptk->tapel }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="border-bottom-0 align-middle" width="300">
                                                <p class="mb-0">Nomor Registrasi</p>
                                            </td>
                                            <td colspan="6" class="border-bottom-0">
                                                <h6 class="mb-0">{{ $pdptk->satpen->no_registrasi }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="border-bottom-0 align-middle" width="300">
                                                <p class="mb-0">Nama Satpen</p>
                                            </td>
                                            <td colspan="6" class="border-bottom-0">
                                                <h6 class="mb-0">{{ $pdptk->satpen->nm_satpen }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="border-bottom-0 align-middle" width="300">
                                                <p class="mb-0">Jenjang</p>
                                            </td>
                                            <td colspan="6" class="border-bottom-0">
                                                <h6 class="mb-0">{{ $pdptk->satpen->jenjang->nm_jenjang }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="border-bottom-0 align-middle" width="300">
                                                <p class="mb-0">Provinsi</p>
                                            </td>
                                            <td colspan="6" class="border-bottom-0">
                                                <h6 class="mb-0">{{ $pdptk->satpen->provinsi->nm_prov }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="border-bottom-0 align-middle" width="300">
                                                <p class="mb-0">Kabupaten/Kota</p>
                                            </td>
                                            <td colspan="6" class="border-bottom-0">
                                                <h6 class="mb-0">{{ $pdptk->satpen->kabupaten->nama_kab }}</h6>
                                            </td>
                                        </tr>

                                        <tr class="text-center">
                                            <th colspan="2"></th>
                                            <th>Jumlah PD</th>
                                            <th colspan="2"></th>
                                            <th>Jumlah Guru</th>
                                            <th colspan="2"></th>
                                            <th>Jumlah Tendik</th>
                                        </tr>
                                        <tr class="text-center">
                                            <th>PD LK</th>
                                            <td>{{ $pdptk->pd_lk }}</td>
                                            <td rowspan="2" class="align-middle">{{ $pdptk->jml_pd }}</td>
                                            <th>Guru LK</th>
                                            <td>{{ $pdptk->guru_lk }}</td>
                                            <td rowspan="2" class="align-middle">{{ $pdptk->jml_guru }}</td>
                                            <th>Tendik LK</th>
                                            <td>{{ $pdptk->tendik_lk }}</td>
                                            <td rowspan="2" class="align-middle">{{ $pdptk->jml_tendik }}</td>
                                        </tr>
                                        <tr class="text-center">
                                            <th>PD PR</th>
                                            <td>{{ $pdptk->pd_pr }}</td>
                                            <th>Guru PR</th>
                                            <td>{{ $pdptk->guru_pr }}</td>
                                            <th>Tendik PR</th>
                                            <td>{{ $pdptk->tendik_pr }}</td>
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
            function updateJumlahPD() {
                let pd_lk = parseInt($('#pd_lk').val()) || 0;
                let pd_pr = parseInt($('#pd_pr').val()) || 0;
                $('#jml_pd').val(pd_lk + pd_pr);
            }

            function updateJumlahGuru() {
                let guru_lk = parseInt($('#guru_lk').val()) || 0;
                let guru_pr = parseInt($('#guru_pr').val()) || 0;
                $('#jml_guru').val(guru_lk + guru_pr);
            }

            function updateJumlahTendik() {
                let tendik_lk = parseInt($('#tendik_lk').val()) || 0;
                let tendik_pr = parseInt($('#tendik_pr').val()) || 0;
                $('#jml_tendik').val(tendik_lk + tendik_pr);
            }

            $('#pd_lk, #pd_pr').on('input', updateJumlahPD);
            $('#guru_lk, #guru_pr').on('input', updateJumlahGuru);
            $('#tendik_lk, #tendik_pr').on('input', updateJumlahTendik);

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
                        const detail = response.data.detail;

                        $('#pd_lk').val(detail.pd_laki);
                        $('#pd_pr').val(detail.pd_perempuan);
                        $('#jml_pd').val(detail.pd);
                        $('#guru_lk').val(detail.ptk_laki);
                        $('#guru_pr').val(detail.ptk_perempuan);
                        $('#jml_guru').val(detail.ptk);
                        $('#tendik_lk').val(detail.pegawai_laki);
                        $('#tendik_pr').val(detail.pegawai_perempuan);
                        $('#jml_tendik').val(detail.pegawai);
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
