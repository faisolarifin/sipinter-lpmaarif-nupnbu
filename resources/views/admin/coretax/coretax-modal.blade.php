@section('modals')
    <!-- Modal Tolak Permohonan -->
    <div class="modal fade" id="modalTolak" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-gradient-danger text-white border-0">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm bg-white bg-opacity-25 rounded me-3 d-flex align-items-center justify-content-center">
                            <i class="ti ti-x fs-4 text-white"></i>
                        </div>
                        <div>
                            <h5 class="modal-title mb-0" id="exampleModalLabel">
                                <i class="ti ti-alert-triangle me-2"></i>Tolak Permohonan
                            </h5>
                            <small class="text-white-75">Berikan alasan penolakan yang jelas</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body p-4">
                        @csrf
                        @method('PUT')

                        <div class="alert alert-warning d-flex align-items-center mb-4" role="alert">
                            <i class="ti ti-info-circle me-2 fs-4"></i>
                            <div>
                                <strong>Perhatian!</strong> Pastikan alasan penolakan sudah sesuai dengan kebijakan yang berlaku.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label fw-semibold">
                                <i class="ti ti-message-circle me-2 text-danger"></i>Catatan Penolakan
                            </label>
                            <textarea class="form-control @error('keterangan') is-invalid @enderror"
                                id="keterangan"
                                name="keterangan"
                                rows="4"
                                placeholder="Berikan penjelasan yang detail mengenai alasan penolakan..."
                                value="{{ old('keterangan') }}"
                                required></textarea>
                            <div class="form-text">
                                <i class="ti ti-bulb me-1"></i>Catatan ini akan dikirim kepada pemohon
                            </div>
                            <div class="invalid-feedback">
                                @error('keterangan') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light border-0 p-3">
                        <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">
                            <i class="ti ti-x me-1"></i>Batal
                        </button>
                        <button type="submit" class="btn btn-danger">
                            <i class="ti ti-x me-2"></i>Tolak Permohonan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Final Approve -->
    <div class="modal fade" id="modalAppear" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-gradient-success text-white border-0">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm bg-white bg-opacity-25 rounded me-3 d-flex align-items-center justify-content-center">
                            <i class="ti ti-check fs-4 text-white"></i>
                        </div>
                        <div>
                            <h5 class="modal-title mb-0" id="exampleModalLabel">
                                <i class="ti ti-checks me-2"></i>Final Approve Coretax
                            </h5>
                            <small class="text-white-75">Lengkapi informasi untuk menyelesaikan persetujuan</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body p-4">
                        @csrf
                        @method('PUT')

                        <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
                            <i class="ti ti-info-circle me-2 fs-4"></i>
                            <div>
                                <strong>Informasi:</strong> Lengkapi data berikut untuk menyelesaikan proses persetujuan.
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="keterangan" class="form-label fw-semibold">
                                    <i class="ti ti-message-circle me-2 text-success"></i>Keterangan Persetujuan
                                </label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror"
                                    id="keterangan"
                                    name="keterangan"
                                    rows="3"
                                    placeholder="Berikan catatan tambahan jika diperlukan..."
                                    value="{{ old('keterangan') }}"></textarea>
                                <div class="form-text">
                                    <i class="ti ti-info-circle me-1"></i>Opsional - Catatan akan disertakan dalam pemberitahuan
                                </div>
                                <div class="invalid-feedback">
                                    @error('keterangan') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nitku" class="form-label fw-semibold">
                                    <i class="ti ti-receipt-tax me-2 text-primary"></i>NITKU <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="ti ti-hash"></i>
                                    </span>
                                    <input type="text"
                                        class="form-control @error('nitku') is-invalid @enderror"
                                        id="nitku"
                                        name="nitku"
                                        placeholder="Masukkan nomor NITKU"
                                        value="{{ old('nitku') }}"
                                        required>
                                    <div class="invalid-feedback">
                                        @error('nitku') {{ $message }} @enderror
                                    </div>
                                </div>
                                <div class="form-text">
                                    <i class="ti ti-info-circle me-1"></i>Nomor Induk Tanda Kena Usaha
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="tgl_expiry" class="form-label fw-semibold">
                                    <i class="ti ti-calendar-time me-2 text-warning"></i>Tanggal Expiry <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="ti ti-calendar"></i>
                                    </span>
                                    <input type="date"
                                        class="form-control @error('tgl_expiry') is-invalid @enderror"
                                        id="tgl_expiry"
                                        name="tgl_expiry"
                                        value="{{ old('tgl_expiry') }}"
                                        required>
                                    <div class="invalid-feedback">
                                        @error('tgl_expiry') {{ $message }} @enderror
                                    </div>
                                </div>
                                <div class="form-text">
                                    <i class="ti ti-clock me-1"></i>Tanggal berakhir masa berlaku
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light border-0 p-3">
                        <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">
                            <i class="ti ti-x me-1"></i>Batal
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="ti ti-check me-2"></i>Approve Permohonan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Detail Coretax -->
    <div class="modal fade" id="modalDetailBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-gradient-primary text-white border-0 sticky-top">
                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="modal-title mb-0" id="exampleModalLabel">
                                <i class="ti ti-receipt-tax me-2"></i>Detail Pengajuan Coretax
                            </h5>
                            <small class="text-white-75" id="detail-subtitle">Informasi lengkap permohonan layanan perpajakan</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-0" id="modal-detail">
                    <!-- Loading State -->
                    <div class="d-flex justify-content-center align-items-center py-5" id="modal-loading">
                        <div class="text-center">
                            <div class="spinner-border text-primary mb-3" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <p class="text-muted">Memuat detail pengajuan...</p>
                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-light border-0 p-3" id="modal-detail-footer">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            <i class="ti ti-x me-1"></i>Tutup
                        </button>
                        <div id="detail-action-buttons">
                            <!-- Action buttons will be populated dynamically based on status -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('modalscripts')
    <script>
        let modalTolak = document.getElementById('modalTolak')
        modalTolak.addEventListener('show.bs.modal', function (event) {
            let coretaxId = event.relatedTarget.getAttribute('data-bs')
            let routeReject = "{{ route('a.coretax.reject', ['coretax' => ':param']) }}".replace(':param', coretaxId);
            $("#modalTolak form").attr('action', routeReject);
        });

        let modalAppear = document.getElementById('modalAppear')
        modalAppear.addEventListener('show.bs.modal', function (event) {
            let coretaxId = event.relatedTarget.getAttribute('data-bs')
            let routeAppear = "{{ route('a.coretax.appear', ['coretax' => ':param']) }}".replace(':param', coretaxId);
            $("#modalAppear form").attr('action', routeAppear);
        });


        let modalDetailBackdrop = document.getElementById('modalDetailBackdrop')
        modalDetailBackdrop.addEventListener('show.bs.modal', function (event) {
            let coretaxId = event.relatedTarget.getAttribute('data-bs')
            let routeUrl = "{{ route('a.coretax.byid', ['coretaxId' => ':param']) }}".replace(':param', coretaxId);

            // Show loading state
            $("#modal-loading").show();
            $("#modal-detail").html('');
            $("#detail-action-buttons").html('');

            $.ajax({
                url: routeUrl,
                type: "GET",
                dataType: 'json',
                success: function(res) {
                    const ctx = res.ctx;
                    const ctxJurney = res.ctxJurney;

                    // Hide loading
                    $("#modal-loading").hide();

                    // Update modal title based on entity type
                    let entityName = '';
                    if (ctx?.satpen) entityName = ctx.satpen.nm_satpen;
                    else if (ctx?.cabang) entityName = ctx.cabang.nama_pc;
                    else if (ctx?.wilayah) entityName = `Wilayah ${ctx.wilayah.nm_prov}`;

                    $("#detail-subtitle").text(`${entityName} - Status: ${getStatusBadge(ctx?.status)}`);

                    // Modern card-based layout
                    let modalDetail = `
                        <div class="container-fluid p-4">
                            <!-- Status Alert -->
                            <div class="alert ${getStatusAlertClass(ctx?.status)} d-flex align-items-center mb-4" role="alert">
                                <i class="${getStatusIcon(ctx?.status)} me-2 fs-4"></i>
                                <div>
                                    <strong>Status Pengajuan:</strong> ${getStatusText(ctx?.status)}
                                    ${ctx?.corestatus.find((item) => item.statusType === ctx?.status)?.keterangan ?
                                        `<br><small>Catatan: ${ctx.corestatus.find((item) => item.statusType === ctx?.status).keterangan}</small>` : ''}
                                </div>
                            </div>

                            <div class="row g-4">
                                <!-- Entity Information Card -->
                                <div class="col-lg-6">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-header bg-primary text-white">
                                            <h6 class="card-title mb-0">
                                                <i class="${getEntityIcon(ctx)} me-2"></i>Informasi ${getEntityType(ctx)}
                                            </h6>
                                        </div>
                                        <div class="card-body">
                                            ${generateEntityInfo(ctx)}
                                        </div>
                                    </div>
                                </div>

                                <!-- Application Details Card -->
                                <div class="col-lg-6">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-header bg-success text-white">
                                            <h6 class="card-title mb-0">
                                                <i class="ti ti-file-text me-2"></i>Detail Pengajuan
                                            </h6>
                                        </div>
                                        <div class="card-body">
                                            ${generateApplicationDetails(ctx)}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- History Section -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-header bg-info text-white">
                                            <h6 class="card-title mb-0">
                                                <i class="ti ti-history me-2"></i>Riwayat Pengajuan
                                            </h6>
                                            <small class="text-white-75">Daftar riwayat pengajuan layanan Coretax yang telah diapprove</small>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table table-hover mb-0" id="detail-table">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th width="5%" class="text-center"><i class="ti ti-hash"></i></th>
                                                            <th><i class="ti ti-receipt-tax me-1"></i>NITKU</th>
                                                            <th><i class="ti ti-user me-1"></i>Nama PIC</th>
                                                            <th><i class="ti ti-id me-1"></i>NIK PIC</th>
                                                            <th><i class="ti ti-phone me-1"></i>WhatsApp</th>
                                                            <th><i class="ti ti-calendar me-1"></i>Tgl Pengajuan</th>
                                                            <th><i class="ti ti-check me-1"></i>Tgl Disetujui</th>
                                                            <th><i class="ti ti-calendar-time me-1"></i>Tgl Expired</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>`;

                                    let no = 1;
                                    ctxJurney.forEach((item) => {
                                        modalDetail += `
                                            <tr>
                                                <td class="text-center">
                                                    <span class="badge bg-light text-dark">${no++}</span>
                                                </td>
                                                <td><code>${item.nitku || '-'}</code></td>
                                                <td>${item.nama_pic}</td>
                                                <td><span class="text-muted">${item.nik_pic}</span></td>
                                                <td>
                                                    <a href="https://wa.me/${item.whatsapp_pic}" class="text-success" target="_blank">
                                                        <i class="ti ti-brand-whatsapp me-1"></i>${item.whatsapp_pic}
                                                    </a>
                                                </td>
                                                <td>${formatDate(item.tgl_submit)}</td>
                                                <td>${formatDate(item.tgl_acc)}</td>
                                                <td>${formatDate(item.tgl_expiry)}</td>
                                            </tr>`;
                                    });

                                    modalDetail += `
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`;

                    $("#modal-detail").html(modalDetail);

                    // Initialize DataTable with modern styling
                    $('#detail-table').DataTable({
                        responsive: true,
                        language: {
                            search: '<i class="ti ti-search me-2"></i>Cari:',
                            lengthMenu: '<i class="ti ti-list me-2"></i>Tampilkan _MENU_ data',
                            info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
                            paginate: {
                                first: '<i class="ti ti-chevron-left-pipe"></i>',
                                previous: '<i class="ti ti-chevron-left"></i>',
                                next: '<i class="ti ti-chevron-right"></i>',
                                last: '<i class="ti ti-chevron-right-pipe"></i>'
                            }
                        }
                    });

                    // Generate action buttons based on status
                    generateActionButtons(ctx?.status, coretaxId);
                },
                error: function() {
                    $("#modal-loading").hide();
                    $("#modal-detail").html(`
                        <div class="d-flex justify-content-center align-items-center py-5">
                            <div class="text-center">
                                <i class="ti ti-alert-triangle fs-1 text-danger mb-3"></i>
                                <h5 class="text-danger">Gagal Memuat Data</h5>
                                <p class="text-muted">Terjadi kesalahan saat mengambil detail pengajuan</p>
                            </div>
                        </div>
                    `);
                }
            });
        });

        // Helper functions for modern modal content
        function getStatusBadge(status) {
            const statusMap = {
                'verifikasi': 'Verifikasi',
                'proses': 'Diproses',
                'approve': 'Disetujui',
                'tolak': 'Ditolak',
                'revisi': 'Revisi'
            };
            return statusMap[status] || status;
        }

        function getStatusAlertClass(status) {
            const alertMap = {
                'verifikasi': 'alert-warning',
                'proses': 'alert-primary',
                'approve': 'alert-success',
                'tolak': 'alert-danger',
                'revisi': 'alert-info'
            };
            return alertMap[status] || 'alert-secondary';
        }

        function getStatusIcon(status) {
            const iconMap = {
                'verifikasi': 'ti ti-clock-hour-9',
                'proses': 'ti ti-settings',
                'approve': 'ti ti-check-circle',
                'tolak': 'ti ti-x-circle',
                'revisi': 'ti ti-edit-circle'
            };
            return iconMap[status] || 'ti ti-info-circle';
        }

        function getStatusText(status) {
            const textMap = {
                'verifikasi': 'Menunggu Verifikasi Admin',
                'proses': 'Sedang Dalam Proses',
                'approve': 'Pengajuan Telah Disetujui',
                'tolak': 'Pengajuan Ditolak',
                'revisi': 'Memerlukan Revisi'
            };
            return textMap[status] || 'Status Tidak Diketahui';
        }

        function getEntityIcon(ctx) {
            if (ctx?.satpen) return 'ti ti-school';
            if (ctx?.cabang) return 'ti ti-building';
            if (ctx?.wilayah) return 'ti ti-map';
            return 'ti ti-building';
        }

        function getEntityType(ctx) {
            if (ctx?.satpen) return 'Satuan Pendidikan';
            if (ctx?.cabang) return 'Cabang';
            if (ctx?.wilayah) return 'Wilayah';
            return 'Entitas';
        }

        function generateEntityInfo(ctx) {
            let html = '<div class="row g-3">';

            if (ctx?.satpen) {
                html += `
                    <div class="col-12"><div class="d-flex"><i class="ti ti-school text-primary me-3 mt-1"></i><div><strong>Nama Sekolah/Madrasah</strong><br><span class="text-muted">${ctx.satpen.nm_satpen}</span></div></div></div>
                    <div class="col-12"><div class="d-flex"><i class="ti ti-file-text text-success me-3 mt-1"></i><div><strong>No. Registrasi Ma'arif NU</strong><br><span class="text-muted">${ctx.satpen.no_registrasi}</span></div></div></div>
                    <div class="col-6"><div class="d-flex"><i class="ti ti-map text-info me-3 mt-1"></i><div><strong>Provinsi</strong><br><span class="text-muted">${ctx.satpen?.provinsi?.nm_prov || '-'}</span></div></div></div>
                    <div class="col-6"><div class="d-flex"><i class="ti ti-map-pin text-warning me-3 mt-1"></i><div><strong>Kabupaten</strong><br><span class="text-muted">${ctx.satpen?.kabupaten?.nama_kab || '-'}</span></div></div></div>
                    <div class="col-6"><div class="d-flex"><i class="ti ti-location text-secondary me-3 mt-1"></i><div><strong>Kecamatan</strong><br><span class="text-muted">${ctx.satpen.kecamatan || '-'}</span></div></div></div>
                    <div class="col-6"><div class="d-flex"><i class="ti ti-map-2 text-dark me-3 mt-1"></i><div><strong>Kelurahan</strong><br><span class="text-muted">${ctx.satpen.kelurahan || '-'}</span></div></div></div>
                    <div class="col-12"><div class="d-flex"><i class="ti ti-home text-purple me-3 mt-1"></i><div><strong>Alamat</strong><br><span class="text-muted">${ctx.satpen.alamat || '-'}</span></div></div></div>
                    <div class="col-12"><div class="d-flex"><i class="ti ti-user-check text-success me-3 mt-1"></i><div><strong>Kepala Sekolah</strong><br><span class="text-muted">${ctx.satpen.kepsek || '-'}</span></div></div></div>
                `;
            } else if (ctx?.cabang) {
                html += `
                    <div class="col-12"><div class="d-flex"><i class="ti ti-building text-primary me-3 mt-1"></i><div><strong>Nama Cabang</strong><br><span class="text-muted">${ctx.cabang.nama_pc}</span></div></div></div>
                    <div class="col-6"><div class="d-flex"><i class="ti ti-map text-info me-3 mt-1"></i><div><strong>Provinsi</strong><br><span class="text-muted">${ctx.cabang?.prov?.nm_prov || '-'}</span></div></div></div>
                    <div class="col-6"><div class="d-flex"><i class="ti ti-map-pin text-warning me-3 mt-1"></i><div><strong>Kabupaten</strong><br><span class="text-muted">${ctx.cabang?.profile?.kabupaten || '-'}</span></div></div></div>
                    <div class="col-6"><div class="d-flex"><i class="ti ti-location text-secondary me-3 mt-1"></i><div><strong>Kecamatan</strong><br><span class="text-muted">${ctx.cabang?.profile?.kecamatan || '-'}</span></div></div></div>
                    <div class="col-6"><div class="d-flex"><i class="ti ti-map-2 text-dark me-3 mt-1"></i><div><strong>Kelurahan</strong><br><span class="text-muted">${ctx.cabang?.profile?.kelurahan || '-'}</span></div></div></div>
                    <div class="col-12"><div class="d-flex"><i class="ti ti-home text-purple me-3 mt-1"></i><div><strong>Alamat</strong><br><span class="text-muted">${ctx.cabang?.profile?.alamat || '-'}</span></div></div></div>
                    <div class="col-12"><div class="d-flex"><i class="ti ti-user-check text-success me-3 mt-1"></i><div><strong>Ketua</strong><br><span class="text-muted">${ctx.cabang?.profile?.ketua || '-'}</span></div></div></div>
                `;
            } else if (ctx?.wilayah) {
                html += `
                    <div class="col-12"><div class="d-flex"><i class="ti ti-map text-primary me-3 mt-1"></i><div><strong>Nama Wilayah</strong><br><span class="text-muted">Wilayah ${ctx.wilayah.nm_prov}</span></div></div></div>
                    <div class="col-6"><div class="d-flex"><i class="ti ti-map text-info me-3 mt-1"></i><div><strong>Provinsi</strong><br><span class="text-muted">${ctx.wilayah.nm_prov}</span></div></div></div>
                    <div class="col-6"><div class="d-flex"><i class="ti ti-map-pin text-warning me-3 mt-1"></i><div><strong>Kabupaten</strong><br><span class="text-muted">${ctx.wilayah?.profile?.kabupaten || '-'}</span></div></div></div>
                    <div class="col-6"><div class="d-flex"><i class="ti ti-location text-secondary me-3 mt-1"></i><div><strong>Kecamatan</strong><br><span class="text-muted">${ctx.wilayah?.profile?.kecamatan || '-'}</span></div></div></div>
                    <div class="col-6"><div class="d-flex"><i class="ti ti-map-2 text-dark me-3 mt-1"></i><div><strong>Kelurahan</strong><br><span class="text-muted">${ctx.wilayah?.profile?.kelurahan || '-'}</span></div></div></div>
                    <div class="col-12"><div class="d-flex"><i class="ti ti-home text-purple me-3 mt-1"></i><div><strong>Alamat</strong><br><span class="text-muted">${ctx.wilayah?.profile?.alamat || '-'}</span></div></div></div>
                    <div class="col-12"><div class="d-flex"><i class="ti ti-user-check text-success me-3 mt-1"></i><div><strong>Ketua</strong><br><span class="text-muted">${ctx.wilayah?.profile?.ketua || '-'}</span></div></div></div>
                `;
            }

            html += '</div>';
            return html;
        }

        function generateApplicationDetails(ctx) {
            return `
                <div class="row g-3">
                    <div class="col-12">
                        <div class="d-flex">
                            <i class="ti ti-receipt-tax text-primary me-3 mt-1"></i>
                            <div>
                                <strong>NITKU/NPWP Lembaga</strong><br>
                                <code class="bg-light px-2 py-1 rounded">${ctx?.nitku || 'Belum diisi'}</code>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex">
                            <i class="ti ti-user text-success me-3 mt-1"></i>
                            <div>
                                <strong>Nama PIC</strong><br>
                                <span class="text-muted">${ctx?.nama_pic || '-'}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex">
                            <i class="ti ti-id text-info me-3 mt-1"></i>
                            <div>
                                <strong>NIK PIC</strong><br>
                                <span class="text-muted">${ctx?.nik_pic || '-'}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex">
                            <i class="ti ti-brand-whatsapp text-success me-3 mt-1"></i>
                            <div>
                                <strong>Nomor WhatsApp PIC</strong><br>
                                <a href="https://wa.me/${ctx?.whatsapp_pic}" class="text-success" target="_blank">
                                    <i class="ti ti-external-link me-1"></i>${ctx?.whatsapp_pic || '-'}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex">
                            <i class="ti ti-calendar text-warning me-3 mt-1"></i>
                            <div>
                                <strong>Tanggal Permohonan</strong><br>
                                <span class="text-muted">${formatDate(ctx?.tgl_submit)}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex">
                            <i class="ti ti-check text-success me-3 mt-1"></i>
                            <div>
                                <strong>Tanggal Disetujui</strong><br>
                                <span class="text-muted">${formatDate(ctx?.tgl_acc)}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex">
                            <i class="ti ti-calendar-time text-danger me-3 mt-1"></i>
                            <div>
                                <strong>Tanggal Expiry</strong><br>
                                <span class="badge ${getExpiryBadgeClass(ctx?.tgl_expiry)}">${formatDate(ctx?.tgl_expiry)}</span>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

        function formatDate(dateString) {
            if (!dateString) return '-';
            return dateString.split("-").reverse().join("-");
        }

        function getExpiryBadgeClass(expiryDate) {
            if (!expiryDate) return 'bg-secondary';

            const today = new Date();
            const expiry = new Date(expiryDate);
            const diffTime = expiry - today;
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

            if (diffDays < 0) return 'bg-danger';
            if (diffDays <= 30) return 'bg-warning text-dark';
            return 'bg-success';
        }

        function generateActionButtons(status, coretaxId) {
            let buttons = '';

            // Check user role permissions
            const userRole = '{{ auth()->user()->role }}';
            const restrictedRoles = ['admin wilayah', 'admin cabang'];

            if (!restrictedRoles.includes(userRole)) {
                switch(status) {
                    case 'verifikasi':
                        // For verifikasi status: direct approve link and reject modal
                        buttons += `
                            <a href="${'{{ route("a.coretax.acc", ":id") }}'.replace(':id', coretaxId)}" class="btn btn-success me-2">
                                <i class="ti ti-check me-2"></i>Terima Pengajuan
                            </a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalTolak" data-bs="${coretaxId}" onclick="closeDetailModal()">
                                <i class="ti ti-x me-2"></i>Tolak Pengajuan
                            </button>
                        `;
                        break;

                    case 'perbaikan':
                        // For perbaikan status: same as table row - final approve modal and reject modal
                        buttons += `
                            <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#modalAppear" data-bs="${coretaxId}" onclick="closeDetailModal()">
                                <i class="ti ti-checks me-2"></i>Final Approve
                            </button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalTolak" data-bs="${coretaxId}" onclick="closeDetailModal()">
                                <i class="ti ti-x me-2"></i>Tolak Pengajuan
                            </button>
                        `;
                        break;

                    case 'dokumen diproses':
                        // For proses status: final approve modal and reject modal (same as table row)
                        buttons += `
                            <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#modalAppear" data-bs="${coretaxId}" onclick="closeDetailModal()">
                                <i class="ti ti-checks me-2"></i>Final Approve
                            </button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalTolak" data-bs="${coretaxId}" onclick="closeDetailModal()">
                                <i class="ti ti-x me-2"></i>Tolak Pengajuan
                            </button>
                        `;
                        break;

                    case 'final aprove':
                        // Add delete button for super admin
                        if (userRole === 'super admin') {
                            buttons += `
                                <button class="btn btn-outline-danger ms-2" onclick="deleteCoretax('${coretaxId}')">
                                    <i class="ti ti-trash me-1"></i>Hapus
                                </button>
                            `;
                        }
                        break;

                    default:
                        // For unknown status, show basic info
                        buttons += `
                            <span class="badge bg-secondary fs-6 px-3 py-2">
                                <i class="ti ti-info-circle me-1"></i>Status: ${status || 'Tidak diketahui'}
                            </span>
                        `;
                        break;
                }
            } else {
                // For restricted roles, just show status
                buttons += `
                    <span class="badge bg-secondary fs-6 px-3 py-2">
                        <i class="ti ti-eye me-1"></i>Hanya Dapat Melihat
                    </span>
                `;
            }

            $("#detail-action-buttons").html(buttons);
        }

        // Function to handle delete action for super admin
        function deleteCoretax(coretaxId) {
            if (confirm('Apakah Anda yakin ingin menghapus data Coretax ini?')) {
                // Create a form and submit it
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route("a.coretax.destroy", ":id") }}'.replace(':id', coretaxId);

                let csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';

                let methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';

                form.appendChild(csrfToken);
                form.appendChild(methodInput);
                document.body.appendChild(form);
                form.submit();
            }
        }

        function closeDetailModal() {
            setTimeout(() => {
                $('#modalDetailBackdrop').modal('hide');
            }, 500);
        }

    </script>
@endsection
