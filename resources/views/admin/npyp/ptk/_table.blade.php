<div class="card border">
    <div class="card-header bg-light">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0">
                <i class="ti ti-database me-2"></i>Data PTK - {{ ucfirst($status) }}
            </h6>
            <div class="d-flex align-items-center">
                <small class="text-muted me-3">
                    <i class="ti ti-clock me-1"></i>
                    Update realtime
                </small>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="table-{{ $tabId }}">
                <thead class="table-light">
                    <tr>
                        <th width="5%" class="text-center">
                            <i class="ti ti-hash text-muted"></i>
                        </th>
                        <th width="8%">
                            <i class="ti ti-file-text text-primary me-1"></i>No. Registrasi
                        </th>
                        <th width="15%">
                            <i class="ti ti-school text-warning me-1"></i>Nama Satpen
                        </th>
                        <th width="10%">
                            <i class="ti ti-map text-info me-1"></i>Kab/Kota
                        </th>
                        <th width="8%">
                            <i class="ti ti-world text-cyan me-1"></i>Provinsi
                        </th>
                        <th width="12%">
                            <i class="ti ti-user text-success me-1"></i>Nama PTK
                        </th>
                        <th width="10%">
                            <i class="ti ti-id text-purple me-1"></i>NIK
                        </th>
                        <th width="8%">
                            <i class="ti ti-flag text-orange me-1"></i>Status Pengajuan
                        </th>
                        <th width="8%">
                            <i class="ti ti-user-check text-indigo me-1"></i>Petugas Approval
                        </th>
                        <th width="8%">
                            <i class="ti ti-note text-teal me-1"></i>Catatan
                        </th>
                        <th width="8%" class="text-center">
                            <i class="ti ti-settings text-muted"></i>Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be populated via DataTables -->
                    <tr>
                        <td colspan="11" class="text-center py-5">
                            <div class="d-flex flex-column align-items-center">
                                <div class="spinner-border text-primary mb-3" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <h6 class="text-muted mb-1">Memuat Data PTK</h6>
                                <small class="text-muted">Sedang mengambil data dari database...</small>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>