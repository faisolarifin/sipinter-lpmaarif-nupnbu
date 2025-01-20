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
                        </div>

                        <div class="row justify-content-center">
                            <div class="col col-sm-11">
                                @if($oss->osstimeline && !in_array($oss->osstimeline[0]->status_verifikasi, ['mengisi persyaratan', 'verifikasi']))
                                    <div class="alert {{ $oss->osstimeline[0]->status_verifikasi=='perbaikan' ? 'alert-danger' : 'alert-success' }}">
                                        @if($oss->osstimeline[0]->tgl_verifikasi) <small>Tanggal : {{ \App\Helpers\Date::tglReverseDash($oss->osstimeline[0]->tgl_verifikasi) }}</small><br> @endif
                                        @if($oss->osstimeline[0]->catatan) <small>Catatan : {{ $oss->osstimeline[0]->catatan }}</small> @endif
                                        @if($oss->osstimeline[0]->link_pnbp)<br><small>Link PNBP : <a target="_blank" href="{{ $oss->osstimeline[0]->link_pnbp }}">{{ $oss->osstimeline[0]->link_pnbp }}</a></small> @endif
                                        @if($oss->osstimeline[0]->link_catatan_pupr)<br><small>Link Catatan PUPR : <a target="_blank" href="{{ $oss->osstimeline[0]->link_catatan_pupr }}">{{ $oss->osstimeline[0]->link_catatan_pupr }}</a></small> @endif
                                        @if($oss->osstimeline[0]->link_gistaru)<br><small>Link Gistaru : <a target="_blank" href="{{ $oss->osstimeline[0]->link_gistaru }}">{{ $oss->osstimeline[0]->link_gistaru }}</a></small> @endif
                                        @if($oss->osstimeline[0]->link_izin_terbit)<br><small>Link Izin Terbit : <a target="_blank" href="{{ $oss->osstimeline[0]->link_izin_terbit }}">{{ $oss->osstimeline[0]->link_izin_terbit }}</a></small> @endif
                                        @if($oss->osstimeline[0]->nomor_ku)<br><small>Nomor KU : <a target="_blank" href="{{ $oss->osstimeline[0]->nomor_ku }}">{{ $oss->osstimeline[0]->nomor_ku }}</a></small> @endif
                                @endif
                            </div>
                        </div>

                        @if($oss->status == 'mengisi persyaratan' || $oss->status == 'perbaikan')
                        <div class="row justify-content-center">
                            <div class="col col-sm-11 border px-2 py-2">
                                <form action="{{ route('oss.save', $oss->id_oss) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body pb-0">
                                        <h5 class="fw-medium mb-0">Quisioner OSS</h5>
                                        <small>lengkapi kolom quisioner untuk permohonan oss</small>
                                        <div class="mt-3">
                                            @include('template.alert')
                                        </div>
                                    </div>
                                    <div class="card-body pb-3 pt-3">

                                        @include('oss.form-split.tab1')
                                        @include('oss.form-split.tab2')
                                        @include('oss.form-split.tab3')
                                        @include('oss.form-split.tab4')
                                        @include('oss.form-split.tab5')

                                        <small>Keterangan : (<span class="required"></span>) wajib diisi</small>

                                    </div>
                                    <div class="card-footer text-end">
                                        <div class="d-flex">
                                            <button type="button" id="back_button" class="btn btn-green" onclick="back()">Sebelumnya</button>
                                            <button type="button" id="next_button" class="btn btn-green ms-auto" onclick="next()">Berikutnya</button>
                                            <button type="submit" id="submit_button" class="btn btn-primary ms-auto d-none">Ajukan Permohonan</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        @else
                        <div class="row justify-content-center">
                            <div class="col col-sm-11 border px-3 py-3">
                                <table class="table table-bordered mb-0">
                                    <tr>
                                        <td class="border-bottom-0 align-middle" width="300">
                                            <p class="mb-0">Nama Sekolah</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="mb-0">{{ $oss->satpen->nm_satpen }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-bottom-0 align-middle" width="300">
                                            <p class="mb-0">Nomor Registrasi</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="mb-0">{{ $oss->satpen->no_registrasi }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-bottom-0 align-middle">
                                            <p class="mb-0">Tanggal</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="mb-0">{{ \App\Helpers\Date::tglMasehi($oss->tanggal) }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-bottom-0 align-middle">
                                            <p class="mb-0">Bukti Pembayaran</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <a href="{{ route('oss.file', $oss->bukti_bayar) }}" class="btn btn-sm btn-secondary">Lihat Berkas <i class="ti ti-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-bottom-0 align-middle">
                                            <p class="mb-0">Detail Kuesioner OSS</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <a href="{{ route('oss.detail', $oss->id_oss) }}" class="btn btn-sm btn-info">Detail <i class="ti ti-eye"></i></a>
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


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        $('.row-milik-sendiri input').attr('required', true);
        @if(@$oss->status == 'perbaikan')
            $('.row-milik-sendiri input[type=file]').removeAttr('required');
        @endif
        $("#status_lahan").on('change', function(e) {
            if ($(this).val().toLowerCase() == "sewa") {
                $(".row-milik-sendiri").slideUp();
                $(".row-pinjam-pakai").slideUp();
                $(".row-sewa").slideDown();
                $('.row-milik-sendiri input').removeAttr('required');
                $('.row-pinjam-pakai input').removeAttr('required');
                $('.row-sewa input').attr('required', true);
                @if(@$oss->status == 'perbaikan')
                $('.row-sewa input[type=file]').removeAttr('required');
                @endif
            } else if ($(this).val().toLowerCase() == "pinjam pakai") {
                $(".row-milik-sendiri").slideUp();
                $(".row-sewa").slideUp();
                $(".row-pinjam-pakai").slideDown();
                $('.row-milik-sendiri input').removeAttr('required');
                $('.row-sewa input').removeAttr('required');
                $('.row-pinjam-pakai input').attr('required', true);
                @if(@$oss->status == 'perbaikan')
                $('.row-pinjam-pakai input[type=file]').removeAttr('required');
                @endif
            } else {
                $(".row-sewa").slideUp();
                $(".row-pinjam-pakai").slideUp();
                $(".row-milik-sendiri").slideDown();
                $('.row-pinjam-pakai input').removeAttr('required');
                $('.row-sewa input').removeAttr('required');
                $('.row-milik-sendiri input').attr('required', true);
                @if(@$oss->status == 'perbaikan')
                $('.row-milik-sendiri input[type=file]').removeAttr('required');
                @endif
            }
        });

        $("#apakah_memiliki_imb").on('change', function(e) {
            if ($(this).val().toLowerCase() == "iya") {
                $(".row-imb").slideDown();
            } else {
                $(".row-imb").slideUp();
            }
        });

        $("#apakah_memiliki_sertifikat_slf").on('change', function(e) {
            if ($(this).val().toLowerCase() == "iya") {
                $(".row-slf").slideDown();
            } else {
                $(".row-slf").slideUp();
            }
        });

        $("#kawasan_lokasi_usaha").on('change', function(e) {
            if ($(this).val().toLowerCase() == "didalam kawasan") {
                $(".row-kli").slideDown();
                $('.row-kli input').attr('required', true);
            } else {
                $('.row-kli input').removeAttr('required');
                $(".row-kli").slideUp();
            }
        });

        $("#apakah_memiliki_kkpr").on('change', function(e) {
            if ($(this).val().toLowerCase() == "iya") {
                $(".row-kkpr").slideDown();
            } else {
                $(".row-kkpr").slideUp();
            }
        });

        $("#apakah_memiliki_izin_amdal").on('change', function(e) {
            if ($(this).val().toLowerCase() == "iya") {
                $(".row-amdal").slideDown();
            } else {
                $(".row-amdal").slideUp();
            }
        });

        $("#apakah_memiliki_uklupl").on('change', function(e) {
            if ($(this).val().toLowerCase() == "iya") {
                $(".row-uklupl").slideDown();
            } else {
                $(".row-uklupl").slideUp();
            }
        });

        //Steap Form
        let current = 0;
        let tabs = $(".tab");
        let tabs_pill = $(".tab-pills");

        loadFormData(current);

        function loadFormData(n) {
            $(tabs_pill[n]).addClass("active");
            $(tabs[n]).removeClass("d-none");
            $("#back_button").attr("disabled", n == 0 ? true : false);
            if (n == tabs.length -1) {
                $("#next_button").hide();
                $("#submit_button").removeClass("d-none");
            } else {
                $("#next_button").show();
                $("#submit_button").addClass("d-none");
            }
        }

        function next() {
            inputsValid = validateInputs($(tabs[current]));

            if (inputsValid) {

                $(tabs[current]).addClass("d-none");
                $(tabs_pill[current]).removeClass("active");

                current++;
                loadFormData(current);
            }
        }

        function back() {
            $(tabs[current]).addClass("d-none");
            $(tabs_pill[current]).removeClass("active");

            current--;
            loadFormData(current);
        }

        tabs_pill.on('click', function() {
            inputsValid = validateInputs($(tabs[current]));

            if (inputsValid) {
                $(tabs[current]).addClass("d-none");
                $(tabs_pill[current]).removeClass("active");

                current = $(this).index();
                loadFormData(current);
            }
        })

        function validateInputs(ths) {
            let inputsValid = true;

            const inputs = ths.find("input");
            inputs.each(function(index, input) {
                const valid = input.checkValidity();
                if (!valid) {
                    inputsValid = false;
                    input.classList.add("is-invalid");
                } else {
                    input.classList.remove("is-invalid");
                }
            });
            return inputsValid;
        }

    </script>
@endsection
