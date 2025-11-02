<!-- IDENTITAS Section -->
<div class="card mb-3">
    <div class="card-header bg-info text-white">
        <h6 class="mb-0"><i class="ti ti-id-badge me-2"></i>IDENTITAS</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">NIK (16 digit) <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nik" placeholder="Masukkan 16 digit NIK" maxlength="16" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Nama PTK <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama_ptk" placeholder="MASUKKAN NAMA LENGKAP" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Tempat Lahir <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="tempat_lahir" placeholder="MASUKKAN TEMPAT LAHIR" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Tanggal Lahir <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="tanggal_lahir" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Jenis Kelamin <span class="text-danger">*</span></label>
                <select class="form-select" name="jenis_kelamin" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Nama Ibu <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama_ibu" placeholder="MASUKKAN NAMA IBU KANDUNG" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Agama <span class="text-danger">*</span></label>
                <select class="form-select" name="agama" required>
                    <option value="">Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Kebutuhan Khusus</label>
                <select class="form-select" name="kebutuhan_khusus">
                    <option value="Tidak ada">Tidak ada</option>
                    <option value="A - Tuna Netra">A - Tuna Netra</option>
                    <option value="B - Tuna Rungu">B - Tuna Rungu</option>
                    <option value="C - Tuna Grahita Ringan">C - Tuna Grahita Ringan</option>
                    <option value="C1 - Tuna Grahita Sedang">C1 - Tuna Grahita Sedang</option>
                    <option value="D - Tuna Daksa Ringan">D - Tuna Daksa Ringan</option>
                    <option value="E - Tuna Laras">E - Tuna Laras</option>
                    <option value="F - Tuna Wicara">F - Tuna Wicara</option>
                    <option value="H - Hiperaktif">H - Hiperaktif</option>
                    <option value="I - Cerdas Istimewa">I - Cerdas Istimewa</option>
                    <option value="J - Bakat Istimewa">J - Bakat Istimewa</option>
                    <option value="K - Kesulitan Belajar">K - Kesulitan Belajar</option>
                    <option value="N - Narkoba">N - Narkoba</option>
                    <option value="O - Indigo">O - Indigo</option>
                    <option value="P - Down Sindrome">P - Down Sindrome</option>
                    <option value="Q - Autis">Q - Autis</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Status Perkawinan <span class="text-danger">*</span></label>
                <select class="form-select" name="status_perkawinan" required>
                    <option value="">Pilih Status Perkawinan</option>
                    <option value="Menikah">Menikah</option>
                    <option value="Belum Menikah">Belum Menikah</option>
                    <option value="Duda atau Lajang">Duda atau Lajang</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email" placeholder="contoh@email.com" required>
            </div>
        </div>
    </div>
</div>

<!-- DOMISILI Section -->
<div class="card mb-3">
    <div class="card-header bg-success text-white">
        <h6 class="mb-0"><i class="ti ti-map-pin me-2"></i>DOMISILI</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Kabupaten/Kota <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="kabupaten_kota" placeholder="Nama Kabupaten/Kota" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Kecamatan <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="kecamatan" placeholder="Nama Kecamatan" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Desa/Kelurahan <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="desa_kelurahan" placeholder="Nama Desa/Kelurahan" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Kode Pos <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="kode_pos" placeholder="Kode Pos" maxlength="5" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label fw-semibold">Alamat Lengkap <span class="text-danger">*</span></label>
                <textarea class="form-control" name="alamat" rows="2" placeholder="Alamat lengkap dengan RT, RW" required></textarea>
            </div>
        </div>
    </div>
</div>

<!-- KEPEGAWAIAN Section -->
<div class="card mb-3">
    <div class="card-header bg-warning text-dark">
        <h6 class="mb-0"><i class="ti ti-briefcase me-2"></i>KEPEGAWAIAN</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Jenis PTK <span class="text-danger">*</span></label>
                <select class="form-select" name="jenis_ptk" required>
                    <option value="">Pilih Jenis PTK</option>
                    <option value="Guru Kelas">Guru Kelas</option>
                    <option value="Guru Mapel">Guru Mapel</option>
                    <option value="Guru BK">Guru BK</option>
                    <option value="Guru Pendamping Khusus">Guru Pendamping Khusus</option>
                    <option value="Tenaga Administrasi Sekolah">Tenaga Administrasi Sekolah</option>
                    <option value="Guru TIK">Guru TIK</option>
                    <option value="Laboran">Laboran</option>
                    <option value="Tenaga Perpustakaan">Tenaga Perpustakaan</option>
                    <option value="Academic Advisor">Academic Advisor</option>
                    <option value="Academic Spesialis">Academic Spesialis</option>
                    <option value="Curiculum Development Advisor">Curiculum Development Advisor</option>
                    <option value="Kindegarten Teacher">Kindegarten Teacher</option>
                    <option value="Management Advisor">Management Advisor</option>
                    <option value="Playgroup Teacher">Playgroup Teacher</option>
                    <option value="Principal">Principal</option>
                    <option value="Teaching Assistant">Teaching Assistant</option>
                    <option value="Vice Principal">Vice Principal</option>
                    <option value="Tukang Kebun">Tukang Kebun</option>
                    <option value="Penjaga Sekolah">Penjaga Sekolah</option>
                    <option value="Petugas Keamanan">Petugas Keamanan</option>
                    <option value="Pesuruh/Office Boy">Pesuruh/Office Boy</option>
                    <option value="Kepala Sekolah">Kepala Sekolah</option>
                    <option value="Terapis">Terapis</option>
                    <option value="Guru Pengganti">Guru Pengganti</option>
                    <option value="Pengawas Paud Dikmas">Pengawas Paud Dikmas</option>
                    <option value="Penilik">Penilik</option>
                    <option value="Guru Pembimbing Khusus">Guru Pembimbing Khusus</option>
                    <option value="Instruktur Kejuruan">Instruktur Kejuruan</option>
                    <option value="Instruktur">Instruktur</option>
                    <option value="Penguji">Penguji</option>
                    <option value="Master Penguji">Master Penguji</option>
                    <option value="Tutor">Tutor</option>
                    <option value="Pamong Belajar">Pamong Belajar</option>
                    <option value="Tenaga Kependidikan">Tenaga Kependidikan</option>
                    <option value="Pengawas">Pengawas</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Status Kepegawaian <span class="text-danger">*</span></label>
                <select class="form-select" name="status_kepegawaian" required>
                    <option value="">Pilih Status Kepegawaian</option>
                    <option value="PNS">PNS</option>
                    <option value="PNS Diperbantukan">PNS Diperbantukan</option>
                    <option value="PNS Depag">PNS Depag</option>
                    <option value="GTY/PTY">GTY/PTY</option>
                    <option value="Honor Daerah Tk. 1 Provinsi">Honor Daerah Tk. 1 Provinsi</option>
                    <option value="Honor Daerah Tk. 2 Kab/Kota">Honor Daerah Tk. 2 Kab/Kota</option>
                    <option value="Guru Honor Sekolah">Guru Honor Sekolah</option>
                    <option value="Tenaga Honor Sekolah">Tenaga Honor Sekolah</option>
                    <option value="CPNS">CPNS</option>
                    <option value="PPPK">PPPK</option>
                    <option value="PPNPN">PPNPN</option>
                    <option value="Guru Pengganti">Guru Pengganti</option>
                    <option value="Kontrak Kerja WNA">Kontrak Kerja WNA</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">NIP</label>
                <input type="text" class="form-control" name="nip" placeholder="Masukkan NIP (jika ada)">
                <small class="text-muted">Kosongkan jika tidak memiliki NIP</small>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Lembaga Pengangkat <span class="text-danger">*</span></label>
                <select class="form-select" name="lembaga_pengangkat" required>
                    <option value="">Pilih Lembaga Pengangkat</option>
                    <option value="Pemerintah Pusat">Pemerintah Pusat</option>
                    <option value="Pemerintah Provinsi">Pemerintah Provinsi</option>
                    <option value="Pemerintah Kab/Kota">Pemerintah Kab/Kota</option>
                    <option value="Ketua Yayasan">Ketua Yayasan</option>
                    <option value="Kepala Sekolah">Kepala Sekolah</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">No. SK Pengangkatan <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="no_sk_pengangkatan" placeholder="No. SK Pengangkatan" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">TMT Pengangkatan <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="tmt_pengangkatan" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Sumber Gaji <span class="text-danger">*</span></label>
                <select class="form-select" name="sumber_gaji" required>
                    <option value="">Pilih Sumber Gaji</option>
                    <option value="APBN">APBN</option>
                    <option value="APBD Provinsi">APBD Provinsi</option>
                    <option value="APBD Kab/Kota">APBD Kab/Kota</option>
                    <option value="Yayasan">Yayasan</option>
                    <option value="Sekolah">Sekolah</option>
                    <option value="Lembaga Donor">Lembaga Donor</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Lisensi Kepala Sekolah</label>
                <select class="form-select" name="lisensi_kepala_sekolah">
                    <option value="Belum">Belum</option>
                    <option value="Sudah">Sudah</option>
                </select>
            </div>
        </div>
    </div>
</div>

<!-- PENUGASAN Section -->
<div class="card mb-3">
    <div class="card-header bg-primary text-white">
        <h6 class="mb-0"><i class="ti ti-clipboard-check me-2"></i>PENUGASAN</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Nomor Surat Tugas <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nomor_surat_tugas" placeholder="No. Surat Tugas" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Tanggal Surat Tugas <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="tanggal_surat_tugas" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">TMT Tugas <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="tmt_tugas" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Upload SK/Surat Tugas <span class="text-danger">*</span></label>
                <input type="file" class="form-control" name="upload_sk" accept=".pdf" required>
                <small class="text-muted">Format: PDF. Max: 1MB</small>
            </div>
        </div>
    </div>
</div>

<script>
// Auto uppercase for specific fields
$('input[name="nama_ptk"], input[name="tempat_lahir"], input[name="nama_ibu"]').on('input', function() {
    this.value = this.value.toUpperCase();
});

// NIK validation
$('input[name="nik"]').on('input', function() {
    const nik = this.value.replace(/\D/g, ''); // Remove non-digits
    if (nik.length > 16) {
        this.value = nik.slice(0, 16);
    } else {
        this.value = nik;
    }
});

// Postal code validation
$('input[name="kode_pos"]').on('input', function() {
    const kodePos = this.value.replace(/\D/g, ''); // Remove non-digits
    if (kodePos.length > 5) {
        this.value = kodePos.slice(0, 5);
    } else {
        this.value = kodePos;
    }
});

// File upload validation
$('input[name="upload_sk"]').on('change', function() {
    const file = this.files[0];
    const maxSize = 5 * 1024 * 1024; // 5MB
    const allowedTypes = ['application/pdf'];
    
    if (file) {
        if (file.size > maxSize) {
            alert('Ukuran file maksimal 5MB');
            this.value = '';
            return;
        }
        
        if (!allowedTypes.includes(file.type)) {
            alert('Format file harus PDF saja');
            this.value = '';
            return;
        }
    }
});
</script>