@extends('template.general', [
    'title' => 'Sipinter - Cek NPSN'
])

@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-selectpicker.css') }}" />
    <style>
        body {background: #fafafa;}
    </style>
@endsection

@section('container')
<div class="d-flex align-items-center" style="height: 100vh;">
    <div class="container-fluid">
        <div class="row" style="height: 100vh;">
            <div class="col-sm-7 d-flex align-items-center justify-content-center order-sm-2">
                <div class="card w-50 mt-4 mt-sm-0 mb-0">
                    <div class="card-body">
                        <a href="{{ route('home') }}" class="text-nowrap text-center logo-img d-block w-100">
                            <img src="{{ asset('assets/images/logos/logo.png') }}" width="210" alt="">
                        </a>
                        <p class="text-center fw-medium">Sistem Administrasi Pendidikan Terpadu <br> Lembaga Pendidikan Ma'arif NU PBNU</p>
                        @include('template.alert')
                        <form action="{{ route('npsnvirtual.request') }}" method="post">
                            @csrf
                            <div class="mb-2">
                                <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
                                <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" id="nama_sekolah" name="nama_sekolah" value="{{ old('nama_sekolah') }}" placeholder="Masukkan nama sekolah">
                                <div class="invalid-feedback">
                                    @error('nama_sekolah') {{ $message }} @enderror
                                </div>
                            </div>
                            <small>*) pastikan anda menerima email validasi setelah mengajukan permohonan, untuk memastikan email anda masih aktif.</small>
                            <div class="mt-1 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email anda">
                                <div class="invalid-feedback">
                                    @error('email') {{ $message }} @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="jenjang" class="form-label">Jenjang Pendidikan</label>
                                <select class="selectpicker @error('jenjang') is-invalid @enderror" data-show-subtext="false" data-live-search="true" name="jenjang">
                                    @foreach($jenjang as $row)
                                        <option value="{{ $row->id_jenjang }}">{{ $row->nm_jenjang }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    @error('jenjang') {{ $message }} @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="provinsi" class="form-label">Provinsi</label>
                                <select class="selectpicker @error('provinsi') is-invalid @enderror" data-show-subtext="false" data-live-search="true" name="provinsi">
                                    @foreach($provinsi as $row)
                                        <option value="{{ $row->id_prov }}">{{ $row->nm_prov }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    @error('provinsi') {{ $message }} @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="kabupaten" class="form-label">Kabupaten</label>
                                <select class="selectpicker @error('kabupaten') is-invalid @enderror" data-show-subtext="false" data-live-search="true" name="kabupaten">
                                    @foreach($kabupaten as $row)
                                        <option value="{{ $row->id_kab }}">{{ $row->nama_kab }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    @error('kabupaten') {{ $message }} @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="2" placeholder="Masukkan alamat lengkap dengan kelurahan dan kecamatan"></textarea>
                                <div class="invalid-feedback">
                                    @error('alamat') {{ $message }} @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2 fs-3 mb-3 rounded-2">Ajukan NPSN Virtual</button>
                            <div class="d-flex align-items-center justify-content-center">
                                <p class="fs-3 mb-0 fw-bold">Sudah Punya NPSN?</p>
                                <a class="text-primary fw-bold ms-2" href="{{ route('ceknpsn') }}">Daftar Sekarang</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 d-flex align-items-end login-side-right px-5 py-4 order-sm-1">
                <div class="d-flex align-items-center flex-column justify-content-between bd-highlight" style="height:60vh;">
                    <div class="bd-highlight">
                        <img src="{{ asset('assets/images/logos/green-nahdlatul-ulama-logo.png') }}" alt="Logo Nu" width="230">
                    </div>
                    <div class="bd-highlight">
                        <h5>Helpdesk</h5>
                        <div class="row">
                            <div class="col-sm-6 pt-1">
                                <p class="mb-2 mt-3"><i class="ti ti-mail"></i>
                                    Email. sekretariat@maarifnu.org</p>
                                <p class="mb-2"><i class="ti ti-phone"></i>
                                    Telp. 021-3904115</p>
                                <p><i class="ti ti-brand-telegram"></i>
                                    Fax. 021-31906679</p>
                            </div>
                            <div class="col-sm-6 text-center">
                                <i class="ti ti-map-pin fs-5"></i>
                                <p>Lembaga Pendidikan Ma’arif Nahdlatul Ulama Pengurus Besar Nahdlatul Ulama Gedung PBNU II Lt. 2 Jl. Taman Amir Hamzah No. 5 Jakarta Pusat 10320.</p>
                            </div>
                        </div>
                    </div>
                </div>
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
        $("select[name='provinsi']").on("change", function() {
            $.ajax({
                url: "{{ route('api.kabupatenbyprov', ':param') }}".replace(':param', $(this).val()),
                type: "GET",
                dataType: 'json',
                success: function (res) {
                    let options = "";
                    $.each(res,function(key, value) {
                        options += `<option value="${value.id_kab}">${value.nama_kab}</option>`;
                    });
                    $("select[name='kabupaten']").html(options);
                    $('.selectpicker').selectpicker('refresh');
                }
            });
        });
    </script>
@endsection
