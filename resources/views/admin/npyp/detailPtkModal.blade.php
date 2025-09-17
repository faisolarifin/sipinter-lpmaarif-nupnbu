@section('modals')
<!-- Detail PTK Modal -->
<div class="modal fade" id="detailPtkModal" tabindex="-1" aria-labelledby="detailPtkModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary text-white">
                <h5 class="modal-title text-white" id="detailPtkModalLabel">
                    <i class="ti ti-user-circle me-2"></i>Detail Informasi PTK
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Header Info -->
                <div class="row mb-1">
                    <div class="col-md-12">
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-2 text-center">
                                        <div class="bg-primary rounded-circle p-4 d-inline-block">
                                            <i class="ti ti-user-circle text-white" style="font-size: 3rem;"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <h4 class="text-primary fw-bold mb-1" id="modalNamaPtkHeader">-</h4>
                                        <p class="text-muted mb-1">
                                            <i class="ti ti-id-badge me-2"></i>
                                            NIK: <span class="fw-semibold" id="modalNikHeader">-</span>
                                        </p>
                                        <div class="d-flex flex-wrap gap-2">
                                            <span class="badge bg-primary" id="modalJenisPtkBadge">
                                                -
                                            </span>
                                            <span class="badge bg-info" id="modalStatusKepegawaianBadge">
                                                -
                                            </span>
                                            <span class="badge bg-success" id="modalStatusPengajuanBadge">
                                                -
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Group 1: Identitas PTK -->
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h6 class="card-title mb-0">
                            <i class="ti ti-id me-2 text-primary"></i>1. Identitas PTK
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-id-badge me-2"></i>NIK
                                </label>
                                <p class="mb-0 ms-4" id="modalNik">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-user me-2"></i>Nama PTK
                                </label>
                                <p class="mb-0 ms-4 fw-bold text-primary" id="modalNamaPtk">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-map-pin me-2"></i>Tempat Lahir
                                </label>
                                <p class="mb-0 ms-4" id="modalTempatLahir">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-calendar me-2"></i>Tanggal Lahir
                                </label>
                                <p class="mb-0 ms-4" id="modalTanggalLahir">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-gender-male me-2"></i>Jenis Kelamin
                                </label>
                                <p class="mb-0 ms-4" id="modalJenisKelamin">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-heart me-2"></i>Ibu Kandung
                                </label>
                                <p class="mb-0 ms-4" id="modalNamaIbu">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-pray me-2"></i>Agama
                                </label>
                                <p class="mb-0 ms-4" id="modalAgama">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-wheelchair me-2"></i>Kebutuhan Khusus
                                </label>
                                <p class="mb-0 ms-4" id="modalKebutuhanKhusus">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-heart me-2"></i>Status Perkawinan
                                </label>
                                <p class="mb-0 ms-4" id="modalStatusPerkawinan">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-mail me-2"></i>Email
                                </label>
                                <p class="mb-0 ms-4" id="modalEmail">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-map me-2"></i>Kabupaten/Kota
                                </label>
                                <p class="mb-0 ms-4" id="modalKabupatenKota">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-map-pins me-2"></i>Kecamatan
                                </label>
                                <p class="mb-0 ms-4" id="modalKecamatan">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-building-community me-2"></i>Desa/Kelurahan
                                </label>
                                <p class="mb-0 ms-4" id="modalDesaKelurahan">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-home me-2"></i>Alamat
                                </label>
                                <p class="mb-0 ms-4" id="modalAlamat">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-direction me-2"></i>Kode Pos
                                </label>
                                <p class="mb-0 ms-4" id="modalKodePos">-</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Group 2: Informasi Kepegawaian -->
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h6 class="card-title mb-0">
                            <i class="ti ti-briefcase me-2 text-success"></i>2. Informasi Kepegawaian
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-user-check me-2"></i>Jenis PTK
                                </label>
                                <p class="mb-0 ms-4" id="modalJenisPtk">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-shield-check me-2"></i>Status Kepegawaian
                                </label>
                                <p class="mb-0 ms-4" id="modalStatusKepegawaian">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-id me-2"></i>NIP
                                </label>
                                <p class="mb-0 ms-4" id="modalNip">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-building-bank me-2"></i>Lembaga Pengangkat
                                </label>
                                <p class="mb-0 ms-4" id="modalLembagaPengangkat">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-file-certificate me-2"></i>No. SK Pengangkatan
                                </label>
                                <p class="mb-0 ms-4" id="modalNoSkPengangkatan">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-calendar-event me-2"></i>TMT Pengangkatan
                                </label>
                                <p class="mb-0 ms-4" id="modalTmtPengangkatan">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-wallet me-2"></i>Sumber Gaji
                                </label>
                                <p class="mb-0 ms-4" id="modalSumberGaji">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-cut me-2"></i>Sudah Lisensi Kepala Sekolah
                                </label>
                                <br />
                                <span class="badge ms-4" id="modalLisensiKepalaSekolah">-</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Group 3: Penugasan -->
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h6 class="card-title mb-0">
                            <i class="ti ti-map-pin me-2 text-warning"></i>3. Penugasan
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-map me-2"></i>Wilayah (Nama Kabupaten/Kota)
                                </label>
                                <p class="mb-0 ms-4" id="modalWilayah">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-building-store me-2"></i>Nama Sekolah
                                </label>
                                <p class="mb-0 ms-4 fw-semibold" id="modalNamaSekolah">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-file-description me-2"></i>Nomor Surat Tugas
                                </label>
                                <p class="mb-0 ms-4" id="modalNomorSuratTugas">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-calendar me-2"></i>Tanggal Surat Tugas
                                </label>
                                <p class="mb-0 ms-4" id="modalTanggalSuratTugas">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-calendar-event me-2"></i>TMT Tugas
                                </label>
                                <p class="mb-0 ms-4" id="modalTmtTugas">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-file-upload me-2"></i>Upload SK Penugasan
                                </label>
                                <div id="modalUploadSk">
                                    <span class="text-muted">Belum ada file</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Group 4: Informasi Satpen -->
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h6 class="card-title mb-0">
                            <i class="ti ti-building-store me-2 text-info"></i>4. Informasi Satuan Pendidikan
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-building me-2"></i>Nama Satpen
                                </label>
                                <p class="mb-0 ms-4 fw-semibold" id="modalSatpenNama">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-cut me-2"></i>Nomor Registrasi
                                </label>
                                <p class="mb-0 ms-4" id="modalSatpenNoRegistrasi">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-id-badge-2 me-2"></i>NPSN
                                </label>
                                <p class="mb-0 ms-4" id="modalSatpenNpsn">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-school me-2"></i>Jenjang
                                </label>
                                <p class="mb-0 ms-4" id="modalSatpenJenjang">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-map-pin me-2"></i>Kabupaten
                                </label>
                                <p class="mb-0 ms-4" id="modalSatpenKabupaten">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-map me-2"></i>Provinsi
                                </label>
                                <p class="mb-0 ms-4" id="modalSatpenProvinsi">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-map-pins me-2"></i>Kecamatan
                                </label>
                                <p class="mb-0 ms-4" id="modalSatpenKecamatan">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-home me-2"></i>Alamat
                                </label>
                                <p class="mb-0 ms-4" id="modalSatpenAlamat">-</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Group 5: Informasi NPYP -->
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h6 class="card-title mb-0">
                            <i class="ti ti-cut me-2 text-purple"></i>5. Informasi NPYP
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-cut me-2"></i>Nomor NPYP
                                </label>
                                <p class="mb-0 ms-4 fw-semibold text-primary" id="modalNpypNomor">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-user me-2"></i>Nama NPYP
                                </label>
                                <p class="mb-0 ms-4" id="modalNpypNama">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-clipboard me-2"></i>Nama Operator
                                </label>
                                <p class="mb-0 ms-4" id="modalNpypOperator">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-phone me-2"></i>Nomor HP Operator
                                </label>
                                <p class="mb-0 ms-4" id="modalNpypNomorHp">-</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Status Pengajuan & Timeline -->
                <div class="card">
                    <div class="card-header bg-light">
                        <h6 class="card-title mb-0">
                            <i class="ti ti-clock-hour-4 me-2 text-danger"></i>Status Pengajuan & Timeline
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-flag me-2"></i>Status Pengajuan
                                </label>
                                <div>
                                    <span class="badge" id="modalStatusPengajuan">-</span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-user-check me-2"></i>Petugas Approval
                                </label>
                                <p class="mb-0 ms-4" id="modalPetugasApproval">-</p>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-note me-2"></i>Catatan/Keterangan Revisi
                                </label>
                                <div class="bg-light p-3 rounded">
                                    <p class="mb-0" id="modalCatatan">Tidak ada catatan</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-calendar me-2"></i>Tanggal Verifikasi
                                </label>
                                <p class="mb-0 ms-4" id="modalTanggalVerifikasi">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-calendar me-2"></i>Tanggal Approve
                                </label>
                                <p class="mb-0 ms-4" id="modalTanggalApprove">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-file-certificate me-2"></i>Nomor SK Keluar
                                </label>
                                <p class="mb-0 ms-4" id="modalNomorSkKeluar">-</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="ti ti-calendar-event me-2"></i>Tanggal Dikeluarkan
                                </label>
                                <p class="mb-0 ms-4" id="modalTanggalDikeluarkan">-</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="ti ti-x me-1"></i>Tutup
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modalscripts')
<script>
function populateDetailModal(data) {
    // Header Information
    $('#modalNamaPtkHeader').text(data.nama_ptk || '-');
    $('#modalNikHeader').text(data.nik || '-');
    $('#modalJenisPtkBadge').text(data.jenis_ptk || '-');
    $('#modalStatusKepegawaianBadge').text(data.status_kepegawaian || '-');
    $('#modalStatusPengajuanBadge').text(getStatusLabel(data.status_ajuan));

    // Group 1: Identitas PTK
    $('#modalNik').text(data.nik || '-');
    $('#modalNamaPtk').text(data.nama_ptk || '-');
    $('#modalTempatLahir').text(data.tempat_lahir || '-');
    $('#modalTanggalLahir').text(data.tanggal_lahir ? formatDate(data.tanggal_lahir) : '-');
    $('#modalJenisKelamin').text(data.jenis_kelamin || '-');
    $('#modalNamaIbu').text(data.nama_ibu || '-');
    $('#modalAgama').text(data.agama || '-');
    $('#modalKebutuhanKhusus').text(data.kebutuhan_khusus || 'Tidak ada');
    $('#modalStatusPerkawinan').text(data.status_perkawinan || '-');
    $('#modalEmail').text(data.email || '-');
    $('#modalKabupatenKota').text(data.kabupaten_kota || '-');
    $('#modalKecamatan').text(data.kecamatan || '-');
    $('#modalDesaKelurahan').text(data.desa_kelurahan || '-');
    $('#modalAlamat').text(data.alamat || '-');
    $('#modalKodePos').text(data.kode_pos || '-');

    // Group 2: Informasi Kepegawaian
    $('#modalJenisPtk').text(data.jenis_ptk || '-');
    $('#modalStatusKepegawaian').text(data.status_kepegawaian || '-');
    $('#modalNip').text(data.nip || '-');
    $('#modalLembagaPengangkat').text(data.lembaga_pengangkat || '-');
    $('#modalNoSkPengangkatan').text(data.no_sk_pengangkatan || '-');
    $('#modalTmtPengangkatan').text(data.tmt_pengangkatan ? formatDate(data.tmt_pengangkatan) : '-');
    $('#modalSumberGaji').text(data.sumber_gaji || '-');

    // Handle lisensi kepala sekolah badge
    let lisensiClass = data.lisensi_kepala_sekolah === 'Sudah' ? 'bg-success' : 'bg-warning';
    $('#modalLisensiKepalaSekolah').removeClass().addClass('ms-4 badge ' + lisensiClass).text(data.lisensi_kepala_sekolah || 'Belum');

    // Group 3: Penugasan
    $('#modalWilayah').text(data.satpen && data.satpen.kabupaten ? data.satpen.kabupaten.nama : '-');
    $('#modalNamaSekolah').text(data.satpen ? data.satpen.nama : '-');
    $('#modalNomorSuratTugas').text(data.nomor_surat_tugas || '-');
    $('#modalTanggalSuratTugas').text(data.tanggal_surat_tugas ? formatDate(data.tanggal_surat_tugas) : '-');
    $('#modalTmtTugas').text(data.tmt_tugas ? formatDate(data.tmt_tugas) : '-');

    // Handle upload SK
    if (data.upload_sk) {
        $('#modalUploadSk').html(`
            <a href="/a/npyp/file/${data.upload_sk}" target="_blank" class="btn btn-sm btn-outline-primary ms-4">
                <i class="ti ti-file-text me-1"></i>Lihat File
            </a>
        `);
    } else {
        $('#modalUploadSk').html('<span class="ms-4 text-muted">Belum ada file</span>');
    }

    // Group 4: Informasi Satpen
    $('#modalSatpenNama').text(data.satpen ? data.satpen.nama : '-');
    $('#modalSatpenNoRegistrasi').text(data.satpen ? data.satpen.no_registrasi : '-');
    $('#modalSatpenNpsn').text(data.satpen ? data.satpen.npsn : '-');
    $('#modalSatpenJenjang').text(data.satpen ? data.satpen.jenjang : '-');
    $('#modalSatpenKabupaten').text(data.satpen && data.satpen.kabupaten ? data.satpen.kabupaten.nama : '-');
    $('#modalSatpenProvinsi').text(data.satpen && data.satpen.kabupaten && data.satpen.kabupaten.provinsi ? data.satpen.kabupaten.provinsi.nama : '-');
    $('#modalSatpenKecamatan').text(data.satpen ? data.satpen.kecamatan : '-');
    $('#modalSatpenAlamat').text(data.satpen ? data.satpen.alamat : '-');

    // Group 5: Informasi NPYP
    $('#modalNpypNomor').text(data.npyp ? data.npyp.nomor_npyp : '-');
    $('#modalNpypNama').text(data.npyp ? data.npyp.nama_npyp : '-');
    $('#modalNpypOperator').text(data.npyp ? data.npyp.nama_operator : '-');
    $('#modalNpypNomorHp').text(data.npyp ? data.npyp.nomor_operator : '-');

    // Status Pengajuan & Timeline
    let statusPengajuan = getStatusLabel(data.status_ajuan);
    let statusClass = getStatusClass(data.status_ajuan);

    $('#modalStatusPengajuan').removeClass().addClass('ms-4 badge ' + statusClass).text(statusPengajuan);
    $('#modalPetugasApproval').text(data.approver_id || '-');
    $('#modalCatatan').text(data.keterangan_revisi || 'Tidak ada catatan');
    $('#modalTanggalVerifikasi').text(data.tanggal_verifikasi ? formatDateTime(data.tanggal_verifikasi) : '-');
    $('#modalTanggalApprove').text(data.tanggal_approve ? formatDateTime(data.tanggal_approve) : '-');
    $('#modalNomorSkKeluar').text(data.nomor_sk_keluar || '-');
    $('#modalTanggalDikeluarkan').text(data.tanggal_dikeluarkan ? formatDateTime(data.tanggal_dikeluarkan) : '-');

    // Update header badge classes
    updateBadgeClass('#modalJenisPtkBadge', 'bg-primary');
    updateBadgeClass('#modalStatusKepegawaianBadge', 'bg-info');
    updateBadgeClass('#modalStatusPengajuanBadge', statusClass);
}

function getStatusLabel(status) {
    const labels = {
        'verifikasi': 'Menunggu Verifikasi',
        'revisi': 'Perlu Revisi',
        'proses': 'Dalam Proses',
        'approve': 'Disetujui',
        'dikeluarkan': 'SK Dikeluarkan'
    };
    return labels[status] || 'Menunggu';
}

function getStatusClass(status) {
    switch(status) {
        case 'approve':
        case 'dikeluarkan': return 'bg-success';
        case 'revisi': return 'bg-danger';
        default: return 'bg-warning';
    }
}

function updateBadgeClass(selector, className) {
    $(selector).removeClass().addClass('badge ' + className);
}

// Helper function to format date (YYYY-MM-DD to DD/MM/YYYY)
function formatDate(dateString) {
    if (!dateString) return '-';
    try {
        const date = new Date(dateString);
        return date.toLocaleDateString('id-ID');
    } catch (e) {
        return dateString;
    }
}

// Helper function to format datetime (YYYY-MM-DD HH:ii:ss to DD/MM/YYYY HH:ii)
function formatDateTime(dateTimeString) {
    if (!dateTimeString) return '-';
    try {
        const date = new Date(dateTimeString);
        return date.toLocaleDateString('id-ID') + ' ' + date.toLocaleTimeString('id-ID', {hour: '2-digit', minute:'2-digit'});
    } catch (e) {
        return dateTimeString;
    }
}

function populateDocuments(documents) {
    let docContainer = $('#modalDokumen');
    docContainer.empty();

    if (documents.length === 0) {
        docContainer.html(`
            <div class="col-md-12 text-center text-muted py-3">
                <i class="ti ti-file-off fs-3"></i>
                <p class="mb-0 ms-4">Belum ada dokumen yang diunggah</p>
            </div>
        `);
        return;
    }

    documents.forEach(doc => {
        docContainer.append(`
            <div class="col-md-4 mb-3">
                <div class="card border h-100">
                    <div class="card-body text-center">
                        <i class="ti ti-file-text fs-2 text-primary mb-2"></i>
                        <h6 class="card-title">${doc.nama}</h6>
                        <p class="card-text small text-muted">${doc.jenis}</p>
                        <a href="${doc.url}" class="btn btn-sm btn-outline-primary" target="_blank">
                            <i class="ti ti-eye me-1"></i>Lihat
                        </a>
                    </div>
                </div>
            </div>
        `);
    });
}

</script>

@endsection