@extends('template.general', [
    'title' => 'Sipinter - Register Satpen',
])

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="{{ asset('assets/css/custom-selectpicker.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}" />
<style>html,body{overflow:auto!important; height:auto!important;} #main-wrapper,#main-wrapper>.page-wrapper{height:auto!important;}</style>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,400;0,500;0,600;0,700;0,800;1,500&amp;family=IBM+Plex+Mono:wght@500;600&amp;display=swap" rel="stylesheet">
@endsection

@section('container')
<div class="sip-landing" style="min-height:100vh;">
    <div class="sip-register-header">
        <a href="{{ route('home') }}" class="sip-brand">
            <img src="{{ asset('assets/images/logos/Sipinter_New_Logo_Text.png') }}" alt="SIPINTER">
        </a>
        <h5>Registrasi Satuan Pendidikan</h5>
    </div>

    <div class="sip-wrap">
        <form class="sip-step-card" action="{{ route('register.proses') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="sip-step-nav">
                <a class="active" href="#">Identitas Sekolah</a>
                <a href="#">Alamat Detail</a>
                <a href="#">Kontak</a>
                <a href="#">Berkas Permohonan</a>
                <a href="#">Akun Portal</a>
            </div>
            @include('template.alert')
            <div class="sip-step-body">
                <div class="tab">
                    <div class="sip-row">
                        <div class="sip-field">
                            <label>NPSN</label>
                            <input type="text" class="form-control" name="npsn" value="{{ $cookieValue->npsn }}" readonly>
                        </div>
                        <div class="sip-field">
                            <label>Nama Satpen</label>
                            <input type="text" class="form-control" name="nm_satpen" value="{{ $cookieValue->nama }}" readonly>
                        </div>
                    </div>
                    <div class="sip-row">
                        <div class="sip-field">
                            <label>Yayasan</label>
                            <select class="form-select" name="yayasan" id="yayasan">
                                <option value="BHPNU">BHPNU</option>
                                <option value="non bhpnu">Non BHPNU</option>
                            </select>
                        </div>
                        <div class="sip-field">
                            <label>Jenjang Pendidikan</label>
                            <select class="selectpicker @error('jenjang') is-invalid @enderror" data-show-subtext="false" data-live-search="true" name="jenjang">
                                @foreach($jenjang as $row)
                                    <option value="{{ $row->id_jenjang }}" {{ strtolower($row->nm_jenjang) == strtolower($cookieValue->bentuk_pendidikan) ? 'selected' : '' }}>{{ $row->nm_jenjang }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="sip-row row-nm-yayasan" style="display:none;">
                        <div class="sip-field"><label>Nama Yayasan</label><input type="text" class="form-control @error('nm_yayasan') is-invalid @enderror" name="nm_yayasan" placeholder="Masukkan nama yayasan" required></div>
                    </div>
                    <div class="sip-row">
                        <div class="sip-field"><label>Kepala Sekolah</label><input type="text" class="form-control @error('kepsek') is-invalid @enderror" name="kepsek" value="{{ old('kepsek') }}" placeholder="Masukkan nama kepala sekolah" required></div>
                        <div class="sip-field"><label>Tahun Berdiri</label><input type="text" class="form-control @error('thn_berdiri') is-invalid @enderror" name="thn_berdiri" value="{{ old('thn_berdiri') }}" placeholder="Masukkan tahun berdiri" required></div>
                    </div>
                    <div class="sip-row">
                        <div class="sip-field">
                            <label>Aset Tanah</label>
                            <select class="form-select" name="aset_tanah"><option value="jamiyah">Jamiyah</option><option value="masyarakat nu">Masyarakat NU</option></select>
                        </div>
                        <div class="sip-field"><label>Nama Pemilik</label><input type="text" class="form-control @error('nm_pemilik') is-invalid @enderror" name="nm_pemilik" value="{{ old('nm_pemilik') }}" placeholder="Masukkan nama pemilik tanah" required></div>
                    </div>
                </div>

                <div class="tab d-none">
                    <div class="sip-row">
                        <div class="sip-field">
                            <label>Propinsi</label>
                            <select class="selectpicker @error('propinsi') is-invalid @enderror" data-show-subtext="false" data-live-search="true" name="propinsi">
                                @foreach($propinsi as $row)
                                    <option value="{{ $row->id_prov }}" {{ strtolower($row->nm_prov) == Strings::removeFirstWord($cookieValue->propinsiluar_negeri_ln) ? 'selected' : '' }}>{{ $row->nm_prov }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="sip-field">
                            <label>Kabupaten</label>
                            <select class="selectpicker @error('kabupaten') is-invalid @enderror" data-show-subtext="false" data-live-search="true" name="kabupaten">
                                @foreach($kabupaten as $row)
                                    <option value="{{ $row->id_kab }}" {{ Strings::removeFirstWord($row->nama_kab) == Strings::removeFirstWord($cookieValue->kabkotanegara_ln) ? 'selected' : '' }}>{{ $row->nama_kab }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="sip-row">
                        <div class="sip-field">
                            <label>Cabang</label>
                            <select class="selectpicker @error('cabang') is-invalid @enderror" data-show-subtext="false" data-live-search="true" name="cabang">
                                @foreach($cabang as $row)
                                    <option value="{{ $row->id_pc }}" {{ Strings::removeFirstWord($row->nama_pc, 2) == Strings::removeFirstWord($cookieValue->kabkotanegara_ln) ? 'selected' : '' }}>{{ $row->nama_pc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="sip-field"><label>Kecamatan</label><input type="text" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan" value="{{ $cookieValue->kecamatankota_ln }}" placeholder="Masukkan nama kecamatan" required></div>
                    </div>
                    <div class="sip-row">
                        <div class="sip-field"><label>Kelurahan</label><input type="text" class="form-control @error('kelurahan') is-invalid @enderror" name="kelurahan" value="{{ $cookieValue->desakelurahan }}" placeholder="Masukkan nama kelurahan" required></div>
                        <div class="sip-field"><label>Alamat</label><input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ $cookieValue->alamat }}" placeholder="Masukkan alamat sekolah" required></div>
                    </div>
                </div>

                <div class="tab d-none">
                    <div class="sip-row">
                        <div class="sip-field"><label>Email</label><input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan email aktif" required></div>
                        <div class="sip-field"><label>No. HP/WA</label><input type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" value="{{ old('telp') }}" placeholder="Masukkan nomor telepon" required></div>
                    </div>
                    <div class="sip-row">
                        <div class="sip-field"><label>Fax</label><input type="text" class="form-control" name="fax" value="{{ old('fax') }}" placeholder="Masukkan nomor FAX (jika ada)"></div>
                    </div>
                </div>

                <div class="tab d-none">
                    <h6 style="font-weight:700;margin-bottom:12px;color:var(--sip-primary-dark);">Surat Permohonan</h6>
                    <div class="sip-row">
                        <div class="sip-field"><label>Nomor Surat</label><input type="text" class="form-control @error('no_srt_permohonan') is-invalid @enderror" name="no_srt_permohonan" value="{{ old('no_srt_permohonan') }}" placeholder="Nomor surat permohonan" required></div>
                        <div class="sip-field"><label>Tanggal Surat</label><input type="date" class="form-control @error('tgl_srt_permohonan') is-invalid @enderror" name="tgl_srt_permohonan" value="{{ old('tgl_srt_permohonan') }}" required></div>
                    </div>
                    <div class="sip-field"><label>File Permohonan (PDF max 1MB)</label><input type="file" class="form-control @error('file_permohonan') is-invalid @enderror" name="file_permohonan" accept="application/pdf" required></div>

                    <h6 style="font-weight:700;margin:20px 0 12px;color:var(--sip-primary-dark);">Surat Keterangan Cabang</h6>
                    <div class="sip-row">
                        <div class="sip-field">
                            <label>Pemberi Keterangan</label>
                            <select class="form-select" name="nm_rekom_pc"><option value="LP Ma'arif NU PCNU">LP Ma'arif NU PCNU</option><option value="PCNU">PCNU</option></select>
                        </div>
                        <div class="sip-field">
                            <label>Nama Cabang</label>
                            <select class="selectpicker" data-show-subtext="false" data-live-search="true" name="cabang_rekom_pc">
                                @foreach($cabang as $row)
                                    <option value="{{ $row->nama_pc }}" {{ Strings::removeFirstWord($row->nama_pc, 2) == Strings::removeFirstWord($cookieValue->kabkotanegara_ln) ? 'selected' : '' }}>{{ $row->nama_pc }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="sip-row">
                        <div class="sip-field"><label>Nomor Surat</label><input type="text" class="form-control @error('no_srt_rekom_pc') is-invalid @enderror" name="no_srt_rekom_pc" value="{{ old('no_srt_rekom_pc') }}" placeholder="Nomor surat dari cabang" required></div>
                        <div class="sip-field"><label>Tanggal Surat</label><input type="date" class="form-control @error('tgl_srt_rekom_pc') is-invalid @enderror" name="tgl_srt_rekom_pc" value="{{ old('tgl_srt_rekom_pc') }}" required></div>
                    </div>
                    <div class="sip-field"><label>File Keterangan PC (PDF max 1MB)</label><input type="file" class="form-control @error('file_rekom_pc') is-invalid @enderror" name="file_rekom_pc" accept="application/pdf" required></div>

                    <h6 style="font-weight:700;margin:20px 0 12px;color:var(--sip-primary-dark);">Rekomendasi Wilayah</h6>
                    <div class="sip-row">
                        <div class="sip-field">
                            <label>Pemberi Rekomendasi</label>
                            <select class="form-select" name="nm_rekom_pw"><option value="LP Ma'arif NU PWNU">LP Ma'arif NU PWNU</option><option value="PWNU">PWNU</option></select>
                        </div>
                        <div class="sip-field">
                            <label>Nama Wilayah</label>
                            <select class="selectpicker" data-show-subtext="false" data-live-search="true" name="wilayah_rekom_pw">
                                @foreach($propinsi as $row)
                                    <option value="{{ $row->nm_prov }}" {{ strtolower($row->nm_prov) == Strings::removeFirstWord($cookieValue->propinsiluar_negeri_ln) ? 'selected' : '' }}>{{ $row->nm_prov }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="sip-row">
                        <div class="sip-field"><label>Nomor Surat</label><input type="text" class="form-control @error('no_srt_rekom_pw') is-invalid @enderror" name="no_srt_rekom_pw" value="{{ old('no_srt_rekom_pw') }}" placeholder="Nomor surat dari wilayah" required></div>
                        <div class="sip-field"><label>Tanggal Surat</label><input type="date" class="form-control @error('tgl_srt_rekom_pw') is-invalid @enderror" name="tgl_srt_rekom_pw" value="{{ old('tgl_srt_rekom_pw') }}" required></div>
                    </div>
                    <div class="sip-field"><label>File Rekomendasi PW (PDF max 1MB)</label><input type="file" class="form-control @error('file_rekom_pw') is-invalid @enderror" name="file_rekom_pw" accept="application/pdf" required></div>
                </div>

                <div class="tab d-none">
                    <div class="sip-row">
                        <div class="sip-field">
                            <label>Password Akun</label>
                            <div class="input-group form-password">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan password akun" required>
                                <span class="input-group-text password-toggle" style="cursor:pointer;"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>
                        <div class="sip-field">
                            <label>Konfirmasi Password</label>
                            <div class="input-group form-password">
                                <input type="password" class="form-control @error('passconfirm') is-invalid @enderror" name="passconfirm" placeholder="Konfirmasi password" required>
                                <span class="input-group-text password-toggle" style="cursor:pointer;"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sip-step-footer">
                <button type="button" id="back_button" class="sip-btn-outline">Sebelumnya</button>
                <button type="button" id="next_button" class="sip-btn-primary">Berikutnya</button>
                <button type="submit" id="submit_button" class="sip-btn-primary d-none">Daftar</button>
            </div>
        </form>
    </div>

    <div class="sip-footer-bar">&copy; {{ date('Y') }} Sistem Administrasi Pendidikan Terpadu &mdash; LP Ma'arif NU PBNU</div>
</div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        $('.selectpicker').selectpicker({container:'body'});
        $("#yayasan").on('change',function(e){if($(this).val().toLowerCase()!=="bhpnu")$(".row-nm-yayasan").slideDown();else $(".row-nm-yayasan").slideUp()});
        $(".password-toggle").click(function(){var p=$(this).parent().find("input");var i=$(this).find("i");if(p.attr("type")==="password"){p.attr("type","text");i.removeClass("ti-eye-off").addClass("ti-eye")}else{p.attr("type","password");i.removeClass("ti-eye").addClass("ti-eye-off")}});
        let current=0;let tabs=$(".tab");let tabs_pill=$(".sip-step-nav a");
        loadFormData(current);
        function loadFormData(n){$(tabs_pill[n]).addClass("active");$(tabs[n]).removeClass("d-none");$("#back_button").attr("disabled",n==0?true:false);if(n==tabs.length-1){$("#next_button").addClass("d-none");$("#submit_button").removeClass("d-none")}else{$("#next_button").removeClass("d-none");$("#submit_button").addClass("d-none")}}
        function next(){var v=validateInputs($(tabs[current]));if(v){$(tabs[current]).addClass("d-none");$(tabs_pill[current]).removeClass("active");current++;loadFormData(current)}}
        function back(){$(tabs[current]).addClass("d-none");$(tabs_pill[current]).removeClass("active");current--;loadFormData(current)}
        tabs_pill.on('click',function(){var v=validateInputs($(tabs[current]));if(v){$(tabs[current]).addClass("d-none");$(tabs_pill[current]).removeClass("active");current=$(this).index();loadFormData(current)}})
        function validateInputs(s){var ok=true;s.find("input").each(function(i,e){var v=e.checkValidity();if(!v){ok=false;e.classList.add("is-invalid")}else e.classList.remove("is-invalid")});return ok}
        $("select[name='propinsi']").on('change',function(){var pid=$(this).val();$.ajax({url:"{{ route('api.kabupatenbyprov',':param') }}".replace(':param',pid),type:"GET",dataType:'json',success:function(r){var s=$("select[name='kabupaten']");s.empty();$.each(r,function(k,v){s.append('<option value="'+v.id_kab+'">'+v.nama_kab+'</option>')});$('.selectpicker').selectpicker('refresh')}});$.ajax({url:"{{ route('api.pcbyprov',':param') }}".replace(':param',pid),type:"GET",dataType:'json',success:function(r){var sc=$("select[name='cabang']");var sp=$("select[name='cabang_rekom_pc']");sc.empty();sp.empty();$.each(r,function(k,v){sc.append('<option value="'+v.id_pc+'">'+v.nama_pc+'</option>');sp.append('<option value="'+v.id_pc+'">'+v.nama_pc+'</option>')});$('.selectpicker').selectpicker('refresh')}})});
    </script>
@endsection
