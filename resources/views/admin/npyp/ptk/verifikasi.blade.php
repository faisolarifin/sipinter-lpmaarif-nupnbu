@extends('template.layout', [
    'title' => 'Sipinter - Verifikasi dan Proses PTK',
])

@section('navbar')
    @include('template.navadmin')
@endsection

@section('container')
    <div class="row container-begin">
        <div class="col-sm-12">

            <nav class="mt-2 mb-4" aria-label="breadcrumb">
                <ul id="breadcrumb" class="mb-0">
                    <li><a href="#"><i class="ti ti-home"></i></a></li>
                    <li><a href="#"><span class="fa fa-info-circle"></span> Manajemen NPYP</a></li>
                    <li><a href="#"><span class="ti ti-user-check"></span> Verifikasi PTK</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <!-- Main Content with Tabs -->
            <div class="card w-100">
                <div class="card-body">
                    <!-- Tab Navigation -->
                    <ul class="nav nav-pills nav-fill mb-4" id="ptkTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="verifikasi-tab" data-bs-toggle="pill" data-bs-target="#verifikasi" type="button" role="tab" aria-controls="verifikasi" aria-selected="true">
                                <i class="ti ti-clock-hour-9 me-2"></i>Verifikasi
                                <span class="badge bg-warning text-dark ms-1" id="verifikasiBadge">0</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="revisi-tab" data-bs-toggle="pill" data-bs-target="#revisi" type="button" role="tab" aria-controls="revisi" aria-selected="false">
                                <i class="ti ti-edit me-2"></i>Revisi PTK
                                <span class="badge bg-danger ms-1" id="revisiBadge">0</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="proses-tab" data-bs-toggle="pill" data-bs-target="#proses" type="button" role="tab" aria-controls="proses" aria-selected="false">
                                <i class="ti ti-settings me-2"></i>Proses PTK
                                <span class="badge bg-info ms-1" id="prosesBadge">0</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="approve-tab" data-bs-toggle="pill" data-bs-target="#approve" type="button" role="tab" aria-controls="approve" aria-selected="false">
                                <i class="ti ti-check me-2"></i>PTK Di Approve
                                <span class="badge bg-success ms-1" id="approveBadge">0</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="dikeluarkan-tab" data-bs-toggle="pill" data-bs-target="#dikeluarkan" type="button" role="tab" aria-controls="dikeluarkan" aria-selected="false">
                                <i class="ti ti-cut me-2"></i>PTK Dikeluarkan
                                <span class="badge bg-primary ms-1" id="dikeluarkanBadge">0</span>
                            </button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content" id="ptkTabsContent">
                        <!-- Verifikasi Tab -->
                        <div class="tab-pane fade show active" id="verifikasi" role="tabpanel" aria-labelledby="verifikasi-tab">
                            @include('admin.npyp.ptk._table', ['tabId' => 'verifikasi', 'status' => 'verifikasi'])
                        </div>

                        <!-- Revisi Tab -->
                        <div class="tab-pane fade" id="revisi" role="tabpanel" aria-labelledby="revisi-tab">
                            @include('admin.npyp.ptk._table', ['tabId' => 'revisi', 'status' => 'revisi'])
                        </div>

                        <!-- Proses Tab -->
                        <div class="tab-pane fade" id="proses" role="tabpanel" aria-labelledby="proses-tab">
                            @include('admin.npyp.ptk._table', ['tabId' => 'proses', 'status' => 'proses'])
                        </div>

                        <!-- Approve Tab -->
                        <div class="tab-pane fade" id="approve" role="tabpanel" aria-labelledby="approve-tab">
                            @include('admin.npyp.ptk._table', ['tabId' => 'approve', 'status' => 'approve'])
                        </div>

                        <!-- Dikeluarkan Tab -->
                        <div class="tab-pane fade" id="dikeluarkan" role="tabpanel" aria-labelledby="dikeluarkan-tab">
                            @include('admin.npyp.ptk._table', ['tabId' => 'dikeluarkan', 'status' => 'dikeluarkan'])
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Detail Modal -->
    <div class="modal fade" id="detailPTKModal" tabindex="-1" aria-labelledby="detailPTKModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailPTKModalLabel">
                        <i class="ti ti-user-circle me-2"></i>Detail Data PTK
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="detailPTKContent">
                    <!-- Content will be loaded here -->
                </div>
                <div class="modal-footer" id="detailPTKModalFooter" style="display: none;">
                    <div class="d-flex justify-content-between w-100">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="ti ti-x me-1"></i>Tutup
                        </button>
                        <div id="detailActionButtons">
                            <!-- Action buttons will be populated based on PTK status -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Modal for Process/Approve/Reject -->
    <div class="modal fade" id="actionPTKModal" tabindex="-1" aria-labelledby="actionPTKModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="actionPTKModalLabel">
                        <i class="ti ti-settings me-2"></i>Aksi PTK
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="actionPTKForm">
                        <input type="hidden" id="actionPTKId" name="ptk_id">
                        <input type="hidden" id="actionType" name="action_type">

                        <div class="mb-3">
                            <label for="actionNotes" class="form-label">Catatan</label>
                            <textarea class="form-control" id="actionNotes" name="notes" rows="4"
                                placeholder="Masukkan catatan untuk aksi ini (opsional)"></textarea>
                        </div>

                        <div id="skFieldContainer" style="display: none;">
                            <div class="mb-3">
                                <label for="nomorSK" class="form-label">Nomor SK <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nomorSK" name="nomor_sk"
                                    placeholder="Masukkan nomor SK">
                            </div>
                            <div class="mb-3">
                                <label for="tanggalSK" class="form-label">Tanggal SK <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="tanggalSK" name="tanggal_sk">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="confirmActionBtn">Konfirmasi</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap5.min.js') }}"></script>

    <script>
        let currentTables = {};
        let currentPTKId = null;
        let currentAction = null;

        $(document).ready(function() {
            // Initialize all tables
            initializeTables();

            // Tab change handler
            $('#ptkTabs button[data-bs-toggle="pill"]').on('shown.bs.tab', function (e) {
                let targetTab = $(e.target).attr('data-bs-target').replace('#', '');
                if (currentTables[targetTab]) {
                    currentTables[targetTab].columns.adjust().draw();
                }
            });

            // Action button handlers
            $(document).on('click', '.btn-action', function() {
                currentPTKId = $(this).data('id');
                currentAction = $(this).data('action');

                let actionText = '';
                let modalTitle = '';

                switch(currentAction) {
                    case 'terima':
                        actionText = 'menerima';
                        modalTitle = 'Terima PTK';
                        break;
                    case 'tolak':
                        actionText = 'menolak';
                        modalTitle = 'Tolak PTK';
                        break;
                    case 'proses':
                        actionText = 'memproses';
                        modalTitle = 'Proses PTK';
                        break;
                    case 'approve':
                        actionText = 'menyetujui';
                        modalTitle = 'Approve PTK';
                        break;
                    case 'keluarkan':
                        actionText = 'mengeluarkan PTK';
                        modalTitle = 'Keluarkan PTK';
                        break;
                }

                $('#actionPTKModalLabel').html('<i class="ti ti-settings me-2"></i>' + modalTitle);
                $('#actionType').val(currentAction);
                $('#actionPTKId').val(currentPTKId);

                $('#confirmActionBtn').text(`Konfirmasi ${modalTitle}`);
                $('#actionPTKModal').modal('show');
            });

            // Confirm action handler
            $('#confirmActionBtn').on('click', function() {
                let formData = new FormData($('#actionPTKForm')[0]);

                $.ajax({
                    url: '{{ route("admin.ptk.action") }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#actionPTKModal').modal('hide');
                        if (response.success) {
                            alert(response.message);
                            // Refresh current table
                            refreshCurrentTable();
                            // Clear form
                            $('#actionPTKForm')[0].reset();

                            // If detail modal is open, close it to refresh the view
                            if ($('#detailPTKModal').hasClass('show')) {
                                $('#detailPTKModal').modal('hide');
                            }
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function(xhr) {
                        let errorMsg = 'Terjadi kesalahan saat memproses data';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMsg = xhr.responseJSON.message;
                        }
                        alert(errorMsg);
                    }
                });
            });

            // Detail button handler
            $(document).on('click', '.btn-detail', function() {
                let ptkId = $(this).data('id');
                loadPTKDetail(ptkId);
            });
        });

        function initializeTables() {
            const statuses = ['verifikasi', 'revisi', 'proses', 'approve', 'dikeluarkan'];

            statuses.forEach(function(status) {
                currentTables[status] = $('#table-' + status).DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route("admin.ptk.data") }}',
                        data: function(d) {
                            d.status = status;
                        }
                    },
                    columns: [
                        { data: 'no', name: 'no', orderable: false, searchable: false },
                        { data: 'no_registrasi', name: 'no_registrasi' },
                        { data: 'nama_satpen', name: 'nama_satpen' },
                        { data: 'kabupaten', name: 'kabupaten' },
                        { data: 'provinsi', name: 'provinsi' },
                        { data: 'nama_ptk', name: 'nama_ptk' },
                        { data: 'nik', name: 'nik' },
                        { data: 'status_pengajuan', name: 'status_pengajuan' },
                        { data: 'petugas_approval', name: 'petugas_approval' },
                        { data: 'catatan', name: 'catatan' },
                        { data: 'aksi', name: 'aksi', orderable: false, searchable: false }
                    ],
                    order: [[1, 'desc']],
                    pageLength: 10,
                    language: {
                        processing: "Memuat data...",
                        search: "Pencarian:",
                        lengthMenu: "Tampilkan _MENU_ data per halaman",
                        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                        infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                        infoFiltered: "(difilter dari _MAX_ total data)",
                        loadingRecords: "Memuat...",
                        zeroRecords: "Tidak ada data yang ditemukan",
                        emptyTable: "Tidak ada data di tabel",
                        paginate: {
                            first: "Pertama",
                            previous: "Sebelumnya",
                            next: "Selanjutnya",
                            last: "Terakhir"
                        }
                    }
                });
            });
        }

        function refreshCurrentTable() {
            let activeTab = $('.nav-link.active').attr('data-bs-target').replace('#', '');
            if (currentTables[activeTab]) {
                currentTables[activeTab].ajax.reload();
            }
        }

        function loadPTKDetail(ptkId) {
            $('#detailPTKModal').modal('show');
            $('#detailPTKModalFooter').hide();
            $('#detailActionButtons').html('');

            $.ajax({
                url: '{{ route("admin.ptk.detail", ":id") }}'.replace(':id', ptkId),
                type: 'GET',
                success: function(response) {
                    if (response.success) {
                        $('#detailPTKContent').html(response.html);

                        // Populate action buttons based on PTK status
                        populateDetailActionButtons(ptkId, response.ptk_status);
                    } else {
                        $('#detailPTKContent').html('<div class="alert alert-danger">Gagal memuat detail PTK</div>');
                    }
                },
                error: function() {
                    $('#detailPTKContent').html('<div class="alert alert-danger">Terjadi kesalahan saat memuat data</div>');
                }
            });
        }

        function populateDetailActionButtons(ptkId, status) {
            let buttons = '';

            switch(status) {
                case 'verifikasi':
                    buttons += '<button class="btn btn-success me-2 btn-action" data-id="' + ptkId + '" data-action="terima" title="Terima">';
                    buttons += '<i class="ti ti-check me-1"></i>Terima';
                    buttons += '</button>';
                    buttons += '<button class="btn btn-danger btn-action" data-id="' + ptkId + '" data-action="tolak" title="Tolak">';
                    buttons += '<i class="ti ti-x me-1"></i>Tolak';
                    buttons += '</button>';
                    break;

                case 'proses':
                    buttons += '<button class="btn btn-success me-2 btn-action" data-id="' + ptkId + '" data-action="approve" title="Approve">';
                    buttons += '<i class="ti ti-check me-1"></i>Approve';
                    buttons += '</button>';
                    buttons += '<button class="btn btn-danger btn-action" data-id="' + ptkId + '" data-action="tolak" title="Tolak">';
                    buttons += '<i class="ti ti-x me-1"></i>Tolak';
                    buttons += '</button>';
                    break;

                case 'approve':
                    buttons += '<button class="btn btn-primary btn-action" data-id="' + ptkId + '" data-action="keluarkan" title="Keluarkan PTK">';
                    buttons += '<i class="ti ti-cut me-1"></i>Keluarkan PTK';
                    buttons += '</button>';
                    break;

                case 'dikeluarkan':
                    buttons += '<button class="btn btn-success" onclick="downloadSK(' + ptkId + ')" title="Download SK">';
                    buttons += '<i class="ti ti-download me-1"></i>Download SK';
                    buttons += '</button>';
                    break;

                case 'revisi':
                    // No action buttons for revisi status
                    break;
            }

            if (buttons) {
                $('#detailActionButtons').html(buttons);
                $('#detailPTKModalFooter').show();
            }
        }
    </script>
@endsection