<div class="card border shadow-none">
    <div class="card-header bg-light">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0">
                Data PTK - {{ ucfirst($status) }}
            </h6>
        </div>
    </div>
    <div class="card-body p-3">
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="table-{{ $tabId }}">
                <thead class="table-light">
                    <tr>
                        <th width="5%" class="text-center">
                            #
                        </th>
                        <th width="8%">
                            No. Registrasi
                        </th>
                        <th width="15%">
                            Nama Satpen
                        </th>
                        <th width="10%">
                            Kab/Kota
                        </th>
                        <th width="8%">
                            Provinsi
                        </th>
                        <th width="12%">
                            Nama PTK
                        </th>
                        <th width="10%">
                            NIK
                        </th>
                        <th width="8%">
                            Status Pengajuan
                        </th>
                        <th width="8%">
                            Petugas Approval
                        </th>
                        <th width="8%">
                            Catatan
                        </th>
                        <th width="8%" class="text-center">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be populated via DataTables -->
                </tbody>
            </table>
        </div>
    </div>
</div>