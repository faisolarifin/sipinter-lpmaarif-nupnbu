@extends('template.layout', [
    'title' => 'Sipinter - Manajemen PTK',
])

@section('navbar')
    @include('template.nav')
@endsection

@section('style')

<style>
    .nav-tabs .nav-link {
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
    }
    .nav-tabs .nav-link.active {
        font-weight: 600;
    }
    .table th {
        font-weight: 600;
        font-size: 0.875rem;
        color: #495057;
        border-bottom: 2px solid #dee2e6;
    }
    .badge {
        font-size: 0.75rem;
        font-weight: 500;
    }
    .empty-state {
        padding: 3rem 0;
    }
    #breadcrumb {
        background: transparent;
        list-style: none;
        padding: 0;
    }
    #breadcrumb li {
        display: inline;
        margin-right: 10px;
    }
    #breadcrumb li:not(:last-child)::after {
        content: " > ";
        color: #6c757d;
        margin-left: 10px;
    }
    #breadcrumb a {
        color: #0d6efd;
        text-decoration: none;
    }
    #breadcrumb a:hover {
        text-decoration: underline;
    }
    
    /* Modal Detail Styles */
    .bg-light-success {
        background-color: rgba(40, 167, 69, 0.1) !important;
    }
    .bg-light-danger {
        background-color: rgba(220, 53, 69, 0.1) !important;
    }
    .bg-light-info {
        background-color: rgba(13, 202, 240, 0.1) !important;
    }
    .bg-light-primary {
        background-color: rgba(13, 110, 253, 0.1) !important;
    }
    .bg-light-warning {
        background-color: rgba(255, 193, 7, 0.1) !important;
    }
    .bg-pink {
        background-color: #e83e8c !important;
    }
    .form-control-plaintext.border-bottom {
        border-bottom: 1px solid #dee2e6 !important;
        padding-bottom: 8px;
        margin-bottom: 8px;
    }
    .timeline-item {
        position: relative;
    }
    .modal-xl {
        max-width: 1200px;
    }
    @media print {
        .modal-header, .modal-footer {
            display: none !important;
        }
        .modal-body {
            max-height: none !important;
            overflow: visible !important;
        }
    }
</style>
@endsection

@section('container')
<div class="row container-begin">
    <div class="col-sm-12">

        <nav class="mt-2 mb-4" aria-label="breadcrumb">
            <ul id="breadcrumb" class="mb-0">
                <li><a href="#"><i class="ti ti-home"></i></a></li>
                <li><a href="#"><span class="fa fa-file-certificate"></span> NPYP</a></li>
                <li><a href="#"><span class="fa fa-users"></span> Manajemen PTK</a></li>
            </ul>
        </nav>

        @include('template.alert')

        <!-- Header Information -->
        <div class="card w-100 mb-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="card-title fw-bold text-primary mb-2">
                            <i class="ti ti-users me-2"></i>MANAJEMEN PTK (PENDIDIK DAN TENAGA KEPENDIDIKAN)
                        </h4>
                        <p class="text-muted mb-0">
                            Kelola data PTK satuan pendidikan Anda. Ajukan, pantau status verifikasi, dan kelola dokumen PTK 
                            melalui sistem terintegrasi dengan NPYP.
                        </p>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="bg-light-primary p-3 rounded">
                            <h6 class="text-primary mb-1">Total PTK</h6>
                            <h4 class="text-primary mb-0" id="totalPTK">0</h4>
                            <small class="text-muted">Data Terdaftar</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($npypSatpen)
            <!-- Tabs Navigation -->
            <div class="card w-100">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="ptkTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pengisian-tab" data-bs-toggle="tab" data-bs-target="#pengisian" 
                                    type="button" role="tab" data-status="pengisian">
                                <i class="ti ti-edit me-1"></i>Formulir 
                                <span class="badge bg-warning ms-1" id="badge-pengisian">0</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="verifikasi-tab" data-bs-toggle="tab" data-bs-target="#verifikasi" 
                                    type="button" role="tab" data-status="verifikasi">
                                <i class="ti ti-clock me-1"></i>Verifikasi 
                                <span class="badge bg-info ms-1" id="badge-verifikasi">0</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="revisi-tab" data-bs-toggle="tab" data-bs-target="#revisi" 
                                    type="button" role="tab" data-status="revisi">
                                <i class="ti ti-alert-triangle me-1"></i>Revisi PTK 
                                <span class="badge bg-danger ms-1" id="badge-revisi">0</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="proses-tab" data-bs-toggle="tab" data-bs-target="#proses" 
                                    type="button" role="tab" data-status="proses">
                                <i class="ti ti-refresh me-1"></i>Proses PTK
                                <span class="badge bg-primary ms-1" id="badge-proses">0</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="approve-tab" data-bs-toggle="tab" data-bs-target="#approve" 
                                    type="button" role="tab" data-status="approve">
                                <i class="ti ti-check me-1"></i>PTK Approve 
                                <span class="badge bg-success ms-1" id="badge-approve">0</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="dikeluarkan-tab" data-bs-toggle="tab" data-bs-target="#dikeluarkan" 
                                    type="button" role="tab" data-status="dikeluarkan">
                                <i class="ti ti-file-certificate me-1"></i>Dikeluarkan 
                                <span class="badge bg-dark ms-1" id="badge-dikeluarkan">0</span>
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="ptkTabContent">
                        
                        <!-- Pengisian Formulir Tab -->
                        <div class="tab-pane fade show active" id="pengisian" role="tabpanel">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0"><i class="ti ti-edit me-2"></i>Pengisian Formulir PTK</h5>
                                <div class="d-flex gap-2">
                                    <input type="text" class="form-control" placeholder="Cari PTK..." id="searchPengisian" style="width: 250px;">
                                    <button class="btn btn-outline-secondary" onclick="refreshTable('pengisian')">
                                        <i class="ti ti-refresh"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary" onclick="showAddPTKForm()">
                                        <i class="ti ti-plus me-1"></i>Tambah PTK Baru
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover" id="tablePengisian">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama PTK</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Status Kepegawaian</th>
                                            <th>Status</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <div id="paginationPengisian"></div>
                        </div>

                        <!-- Verifikasi Tab -->
                        <div class="tab-pane fade" id="verifikasi" role="tabpanel">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0"><i class="ti ti-clock me-2"></i>PTK Menunggu Verifikasi</h5>
                                <div class="d-flex gap-2">
                                    <input type="text" class="form-control" placeholder="Cari PTK..." id="searchVerifikasi" style="width: 250px;">
                                    <button class="btn btn-outline-secondary" onclick="refreshTable('verifikasi')">
                                        <i class="ti ti-refresh"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover" id="tableVerifikasi">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama PTK</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Status Kepegawaian</th>
                                            <th>Status</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <div id="paginationVerifikasi"></div>
                        </div>

                        <!-- Revisi PTK Tab -->
                        <div class="tab-pane fade" id="revisi" role="tabpanel">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0"><i class="ti ti-alert-triangle me-2"></i>PTK Perlu Revisi</h5>
                                <div class="d-flex gap-2">
                                    <input type="text" class="form-control" placeholder="Cari PTK..." id="searchRevisi" style="width: 250px;">
                                    <button class="btn btn-outline-secondary" onclick="refreshTable('revisi')">
                                        <i class="ti ti-refresh"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="alert alert-warning">
                                <i class="ti ti-info-circle me-2"></i>
                                <strong>Perhatian:</strong> PTK yang memerlukan revisi harus diperbaiki dan diajukan kembali untuk verifikasi.
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover" id="tableRevisi">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama PTK</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Status Kepegawaian</th>
                                            <th>Status</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <div id="paginationRevisi"></div>
                        </div>

                        <!-- Proses PTK Tab -->
                        <div class="tab-pane fade" id="proses" role="tabpanel">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0"><i class="ti ti-refresh me-2"></i>PTK Dalam Proses</h5>
                                <div class="d-flex gap-2">
                                    <input type="text" class="form-control" placeholder="Cari PTK..." id="searchProses" style="width: 250px;">
                                    <button class="btn btn-outline-secondary" onclick="refreshTable('proses')">
                                        <i class="ti ti-refresh"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="alert alert-info">
                                <i class="ti ti-info-circle me-2"></i>
                                <strong>Info:</strong> PTK sedang dalam proses verifikasi dan validasi data oleh administrator.
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover" id="tableProses">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama PTK</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Status Kepegawaian</th>
                                            <th>Status</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <div id="paginationProses"></div>
                        </div>

                        <!-- PTK Approve Tab -->
                        <div class="tab-pane fade" id="approve" role="tabpanel">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0"><i class="ti ti-check me-2"></i>PTK Telah Disetujui</h5>
                                <div class="d-flex gap-2">
                                    <input type="text" class="form-control" placeholder="Cari PTK..." id="searchApprove" style="width: 250px;">
                                    <button class="btn btn-outline-secondary" onclick="refreshTable('approve')">
                                        <i class="ti ti-refresh"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="alert alert-success">
                                <i class="ti ti-check-circle me-2"></i>
                                <strong>Selamat!</strong> PTK telah disetujui dan sedang menunggu penerbitan SK.
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover" id="tableApprove">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama PTK</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Status Kepegawaian</th>
                                            <th>Status</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <div id="paginationApprove"></div>
                        </div>

                        <!-- PTK Dikeluarkan Tab -->
                        <div class="tab-pane fade" id="dikeluarkan" role="tabpanel">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0"><i class="ti ti-file-certificate me-2"></i>PTK SK Dikeluarkan</h5>
                                <div class="d-flex gap-2">
                                    <input type="text" class="form-control" placeholder="Cari PTK..." id="searchDikeluarkan" style="width: 250px;">
                                    <button class="btn btn-outline-secondary" onclick="refreshTable('dikeluarkan')">
                                        <i class="ti ti-refresh"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="alert alert-primary">
                                <i class="ti ti-file-certificate me-2"></i>
                                <strong>Selesai!</strong> SK PTK telah diterbitkan dan dapat diunduh.
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover" id="tableDikeluarkan">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama PTK</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Status Kepegawaian</th>
                                            <th>Status</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <div id="paginationDikeluarkan"></div>
                        </div>

                    </div>
                </div>
            </div>
        @else
            <!-- No NPYP Registration Card -->
            <div class="card w-100">
                <div class="card-body text-center">
                    <div class="empty-state">
                        <div class="mb-4">
                            <i class="ti ti-users display-1 text-muted"></i>
                        </div>
                        <h4 class="text-muted mb-3">Belum Terdaftar dalam NPYP</h4>
                        <p class="text-muted mb-4">
                            Satuan pendidikan Anda belum terdaftar dalam NPYP. Silakan daftarkan terlebih dahulu 
                            untuk dapat mengajukan PTK.
                        </p>
                        <a href="{{ route('npyp.index') }}" class="btn btn-primary">
                            <i class="ti ti-arrow-left me-2"></i>Kembali ke NPYP
                        </a>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
@endsection

@section('modals')
<!-- Add/Edit PTK Modal -->
<div class="modal fade" id="ptkModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="ptkModalTitle">
                    <i class="ti ti-user-plus me-2"></i>Tambah PTK Baru
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                <form id="ptkForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="ptkId" name="ptk_id">
                    <input type="hidden" name="id_satpen" value="{{ $satpen->id_satpen ?? '' }}">
                    
                    @include('npyp.partials.ptk-form-fields')
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="ti ti-x me-1"></i>Batal
                </button>
                <button type="button" class="btn btn-primary" onclick="submitPTKForm()">
                    <i class="ti ti-device-floppy me-1"></i>Simpan PTK
                </button>
            </div>
        </div>
    </div>
</div>

<!-- View PTK Detail Modal -->
<div class="modal fade" id="viewPTKModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-gradient bg-primary text-white">
                <h5 class="modal-title">
                    <i class="ti ti-eye me-2"></i>Detail Lengkap PTK
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="viewPTKContent" style="max-height: 75vh; overflow-y: auto;">
                <!-- Content will be loaded dynamically -->
                <div class="text-center py-5">
                    <div class="spinner-border text-primary mb-3" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="text-muted">Memuat data PTK...</p>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="ti ti-x me-1"></i>Tutup
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Format date functions
function formatDate(dateString) {
    if (!dateString) return null;
    try {
        const date = new Date(dateString);
        return date.toLocaleDateString('id-ID', {
            year: 'numeric',
            month: 'long',
            day: '2-digit'
        });
    } catch (e) {
        return dateString;
    }
}

function formatDateTime(dateTimeString) {
    if (!dateTimeString) return null;
    try {
        const date = new Date(dateTimeString);
        return date.toLocaleDateString('id-ID', {
            year: 'numeric',
            month: 'numeric',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit'
        });
    } catch (e) {
        return dateTimeString;
    }
}

let currentStatus = 'pengisian';
let currentPage = {};
let totalPages = {};
let searchQuery = {};

// Initialize pagination data for each status
const statuses = ['pengisian', 'verifikasi', 'revisi', 'proses', 'approve', 'dikeluarkan'];
statuses.forEach(status => {
    currentPage[status] = 1;
    totalPages[status] = 1;
    searchQuery[status] = '';
});

$(document).ready(function() {
    // Load initial data
    loadStatusCounts();
    
    // Tab click events
    $('#ptkTabs button[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
        const status = $(e.target).data('status');
        currentStatus = status;
        
        loadTableData(status, currentPage[status], searchQuery[status]);
    });
    
    // Search events
    $('#searchPengisian, #searchVerifikasi, #searchRevisi, #searchProses, #searchApprove, #searchDikeluarkan').on('keyup', function() {
        const status = this.id.replace('search', '').toLowerCase();
        const query = $(this).val();
        searchQuery[status] = query;
        currentPage[status] = 1; // Reset to first page when searching
        loadTableData(status, 1, query);
    });
    
    // Load pengisian data initially (since it's the active tab)
    loadTableData('pengisian', 1, '');
});

function loadTableData(status, page = 1, search = '') {
    const tableId = '#table' + status.charAt(0).toUpperCase() + status.slice(1) + ' tbody';
    const paginationId = '#pagination' + status.charAt(0).toUpperCase() + status.slice(1);
    
    // Show loading
    $(tableId).html('<tr><td colspan="8" class="text-center py-4"><div class="spinner-border text-primary"></div><br>Memuat data...</td></tr>');
    
    $.ajax({
        url: '{{ route("ptk.data") }}',
        method: 'GET',
        data: {
            status: status,
            page: page,
            per_page: 10,
            search: search
        },
        success: function(response) {
            if (response.success !== false) {
                populateTable(tableId, response.data);
                updatePagination(paginationId, page, response.last_page, status);
                currentPage[status] = page;
                totalPages[status] = response.last_page;
            } else {
                $(tableId).html('<tr><td colspan="8" class="text-center py-4 text-muted">Tidak ada data PTK</td></tr>');
                $(paginationId).html('');
            }
        },
        error: function() {
            $(tableId).html('<tr><td colspan="8" class="text-center py-4 text-danger">Gagal memuat data</td></tr>');
        }
    });
}

function populateTable(tableId, data) {
    let html = '';
    
    if (data && data.length > 0) {
        data.forEach((item, index) => {
            html += `
                <tr>
                    <td>${item.no}</td>
                    <td>${item.nik}</td>
                    <td>${item.nama_ptk}</td>
                    <td>${item.jenis_kelamin}</td>
                    <td>${item.status_kepegawaian}</td>
                    <td>${item.status || '-'}</td>
                    <td>${item.tanggal_dibuat}</td>
                    <td>${item.aksi}</td>
                </tr>
            `;
        });
    } else {
        html = '<tr><td colspan="8" class="text-center py-4 text-muted">Tidak ada data PTK</td></tr>';
    }
    
    $(tableId).html(html);
}

function updatePagination(paginationId, currentPage, totalPages, status) {
    if (totalPages <= 1) {
        $(paginationId).html('');
        return;
    }
    
    let html = '<nav><ul class="pagination justify-content-center">';
    
    // Previous button
    if (currentPage > 1) {
        html += `<li class="page-item">
            <a class="page-link" href="#" onclick="loadTableData('${status}', ${currentPage - 1}, searchQuery['${status}'])">&laquo;</a>
        </li>`;
    }
    
    // Page numbers
    const startPage = Math.max(1, currentPage - 2);
    const endPage = Math.min(totalPages, currentPage + 2);
    
    for (let i = startPage; i <= endPage; i++) {
        const activeClass = i === currentPage ? 'active' : '';
        html += `<li class="page-item ${activeClass}">
            <a class="page-link" href="#" onclick="loadTableData('${status}', ${i}, searchQuery['${status}'])">${i}</a>
        </li>`;
    }
    
    // Next button
    if (currentPage < totalPages) {
        html += `<li class="page-item">
            <a class="page-link" href="#" onclick="loadTableData('${status}', ${currentPage + 1}, searchQuery['${status}'])">&raquo;</a>
        </li>`;
    }
    
    html += '</ul></nav>';
    $(paginationId).html(html);
}


function refreshCurrentTable() {
    loadTableData(currentStatus, currentPage[currentStatus], searchQuery[currentStatus]);
    loadStatusCounts();
}

function refreshTable(status) {
    loadTableData(status, currentPage[status], searchQuery[status]);
    loadStatusCounts();
}

function loadStatusCounts() {
    $.get('{{ route("ptk.status-counts") }}', function(response) {
        if (response.success) {
            const counts = response.data;
            $('#totalPTK').text(counts.total);
            $('#badge-pengisian').text(counts.pengisian || counts.verifikasi);
            $('#badge-verifikasi').text(counts.verifikasi);
            $('#badge-revisi').text(counts.revisi);
            $('#badge-proses').text(counts.proses);
            $('#badge-approve').text(counts.approve);
            $('#badge-dikeluarkan').text(counts.dikeluarkan);
        }
    });
}

function showAddPTKForm() {
    try {
        // Reset form properly
        $('#ptkForm')[0].reset();
        $('#ptkId').val('');
        
        // Reset modal title
        $('#ptkModalTitle').html('<i class="ti ti-user-plus me-2"></i>Tambah PTK Baru');
        
        // Show modal
        $('#ptkModal').modal('show');
    } catch (error) {
        console.error('Error showing add PTK form:', error);
        alert('Terjadi kesalahan saat membuka form');
    }
}

function editPTK(id) {
    // Load PTK data and show in modal
    $.get(`{{ url('/npyp/ptk') }}/${id}`, function(response) {
        if (response.success) {
            const ptk = response.data;
            
            // Reset form first
            $('#ptkForm')[0].reset();
            
            // Set modal title and ID
            $('#ptkId').val(ptk.id);
            $('#ptkModalTitle').html('<i class="ti ti-edit me-2"></i>Edit PTK');
            
            // Fill form with data
            fillPTKForm(ptk);
            $('#ptkModal').modal('show');
        } else {
            alert('Gagal memuat data PTK: ' + (response.message || 'Error tidak diketahui'));
        }
    }).fail(function(xhr) {
        alert('Terjadi kesalahan saat memuat data PTK');
        console.error('Edit PTK error:', xhr);
    });
}

function fillPTKForm(ptk) {
    try {
        // Define the fields that should be filled
        const fieldsToFill = [
            'nik', 'nama_ptk', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 
            'nama_ibu', 'agama', 'kebutuhan_khusus', 'status_perkawinan', 'email',
            'kabupaten_kota', 'kecamatan', 'desa_kelurahan', 'alamat', 'kode_pos',
            'jenis_ptk', 'status_kepegawaian', 'nip', 'lembaga_pengangkat', 
            'no_sk_pengangkatan', 'tmt_pengangkatan', 'sumber_gaji', 
            'lisensi_kepala_sekolah', 'nomor_surat_tugas', 'tanggal_surat_tugas', 
            'tmt_tugas'
        ];
        
        // Fill form fields safely
        fieldsToFill.forEach(key => {
            if (ptk[key] !== undefined && ptk[key] !== null) {
                const input = $(`[name="${key}"]`);
                if (input.length > 0) {
                    // Handle different input types
                    if (input.is('select')) {
                        // For select elements
                        input.val(ptk[key]).trigger('change');
                    } else if (input.attr('type') === 'date') {
                        // For date inputs, ensure proper format
                        if (ptk[key]) {
                            const dateValue = new Date(ptk[key]).toISOString().split('T')[0];
                            input.val(dateValue);
                        }
                    } else {
                        // For regular inputs
                        input.val(ptk[key]);
                    }
                }
            }
        });
        
        // Handle file input separately (can't set value for security reasons)
        // Just show current file info if exists
        if (ptk.upload_sk) {
            // You might want to show current file name or link
            console.log('Current file:', ptk.upload_sk);
        }
        
    } catch (error) {
        console.error('Error filling form:', error);
        alert('Terjadi kesalahan saat mengisi form');
    }
}

function viewPTK(id) {
    $('#viewPTKModal').modal('show');
    
    $.get(`{{ url('/npyp/ptk') }}/${id}`, function(response) {
        if (response.success) {
            const ptk = response.data;
            const history = response.history || [];
            
            let content = generatePTKDetailHTML(ptk, history);
            $('#viewPTKContent').html(content);
        } else {
            $('#viewPTKContent').html(`
                <div class="text-center py-5">
                    <i class="ti ti-alert-circle text-danger" style="font-size: 4rem;"></i>
                    <h5 class="mt-3 text-danger">Gagal Memuat Data</h5>
                    <p class="text-muted">${response.message || 'Terjadi kesalahan saat memuat data PTK'}</p>
                    <button class="btn btn-primary" onclick="viewPTK(${id})">
                        <i class="ti ti-refresh me-1"></i>Coba Lagi
                    </button>
                </div>
            `);
        }
    }).fail(function() {
        $('#viewPTKContent').html(`
            <div class="text-center py-5">
                <i class="ti ti-wifi-off text-warning" style="font-size: 4rem;"></i>
                <h5 class="mt-3 text-warning">Koneksi Bermasalah</h5>
                <p class="text-muted">Tidak dapat terhubung ke server. Periksa koneksi internet Anda.</p>
                <button class="btn btn-primary" onclick="viewPTK(${id})">
                    <i class="ti ti-refresh me-1"></i>Coba Lagi
                </button>
            </div>
        `);
    });
}

function generatePTKDetailHTML(ptk, history) {
    return `
        <div class="container-fluid">
            <!-- Header Profile -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0 bg-light">
                        <div class="card-body text-center py-4">
                            <div class="d-flex justify-content-center avatar-xl mx-auto mb-3">
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                    <i class="ti ti-user text-white" style="font-size: 2.5rem;"></i>
                                </div>
                            </div>
                            <h4 class="mb-1 text-dark">${ptk.nama_ptk || '-'}</h4>
                            <p class="text-muted mb-2">${ptk.jenis_ptk || '-'}</p>
                            <span class="badge ${ptk.status_ajuan === 'approve' ? 'bg-success' : ptk.status_ajuan === 'revisi' ? 'bg-danger' : ptk.status_ajuan === 'proses' ? 'bg-info' : ptk.status_ajuan === 'dikeluarkan' ? 'bg-primary' : 'bg-warning'} px-3 py-2">
                                ${ptk.status_label || ptk.status_ajuan || 'Menunggu Verifikasi'}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Tabs -->
            <div class="row">
                <div class="col-12">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-personal-tab" data-bs-toggle="tab" data-bs-target="#nav-personal" type="button" role="tab">
                                <i class="ti ti-user-circle me-1"></i>Data Pribadi
                            </button>
                            <button class="nav-link" id="nav-address-tab" data-bs-toggle="tab" data-bs-target="#nav-address" type="button" role="tab">
                                <i class="ti ti-map-pin me-1"></i>Domisili
                            </button>
                            <button class="nav-link" id="nav-employment-tab" data-bs-toggle="tab" data-bs-target="#nav-employment" type="button" role="tab">
                                <i class="ti ti-briefcase me-1"></i>Kepegawaian
                            </button>
                            <button class="nav-link" id="nav-documents-tab" data-bs-toggle="tab" data-bs-target="#nav-documents" type="button" role="tab">
                                <i class="ti ti-file-certificate me-1"></i>Penugasan
                            </button>
                            <button class="nav-link" id="nav-history-tab" data-bs-toggle="tab" data-bs-target="#nav-history" type="button" role="tab">
                                <i class="ti ti-clock me-1"></i>Riwayat
                            </button>
                        </div>
                    </nav>

                    <div class="tab-content mt-3" id="nav-tabContent">
                        <!-- Data Pribadi Tab -->
                        <div class="tab-pane fade show active" id="nav-personal" role="tabpanel">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-primary">
                                                <i class="ti ti-id me-1"></i>NIK
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${ptk.nik || '-'}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-primary">
                                                <i class="ti ti-user me-1"></i>Nama Lengkap
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${ptk.nama_ptk || '-'}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-primary">
                                                <i class="ti ti-map-pin me-1"></i>Tempat Lahir
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${ptk.tempat_lahir || '-'}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-primary">
                                                <i class="ti ti-calendar me-1"></i>Tanggal Lahir
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${formatDate(ptk.tanggal_lahir) || '-'}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-primary">
                                                <i class="ti ti-gender-male me-1"></i>Jenis Kelamin
                                            </label>
                                            <p class="form-control-plaintext border-bottom">
                                                <span class="badge ${ptk.jenis_kelamin === 'Laki-Laki' ? 'bg-primary' : 'bg-pink'}">${ptk.jenis_kelamin || '-'}</span>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-primary">
                                                <i class="ti ti-user-heart me-1"></i>Nama Ibu Kandung
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${ptk.nama_ibu || '-'}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-primary">
                                                <i class="ti ti-mosque me-1"></i>Agama
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${ptk.agama || '-'}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-primary">
                                                <i class="ti ti-accessible me-1"></i>Kebutuhan Khusus
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${ptk.kebutuhan_khusus || '-'}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-primary">
                                                <i class="ti ti-heart me-1"></i>Status Perkawinan
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${ptk.status_perkawinan || '-'}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-primary">
                                                <i class="ti ti-mail me-1"></i>Email
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${ptk.email || '-'}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Alamat Tab -->
                        <div class="tab-pane fade" id="nav-address" role="tabpanel">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-success">
                                                <i class="ti ti-building-community me-1"></i>Kabupaten/Kota
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${ptk.kabupaten_kota || '-'}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-success">
                                                <i class="ti ti-building me-1"></i>Kecamatan
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${ptk.kecamatan || '-'}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-success">
                                                <i class="ti ti-home me-1"></i>Desa/Kelurahan
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${ptk.desa_kelurahan || '-'}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-success">
                                                <i class="ti ti-mailbox me-1"></i>Kode Pos
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${ptk.kode_pos || '-'}</p>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fw-bold text-success">
                                                <i class="ti ti-map-2 me-1"></i>Alamat Lengkap
                                            </label>
                                            <p class="form-control-plaintext border-bottom p-3 bg-light rounded">${ptk.alamat || '-'}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kepegawaian Tab -->
                        <div class="tab-pane fade" id="nav-employment" role="tabpanel">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-warning">
                                                <i class="ti ti-user-check me-1"></i>Jenis PTK
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${ptk.jenis_ptk || '-'}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-warning">
                                                <i class="ti ti-badge me-1"></i>Status Kepegawaian
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${ptk.status_kepegawaian || '-'}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-warning">
                                                <i class="ti ti-id-badge me-1"></i>NIP
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${ptk.nip || '-'}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-warning">
                                                <i class="ti ti-building-bank me-1"></i>Lembaga Pengangkat
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${ptk.lembaga_pengangkat || '-'}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-warning">
                                                <i class="ti ti-file-certificate me-1"></i>No. SK Pengangkatan
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${ptk.no_sk_pengangkatan || '-'}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-warning">
                                                <i class="ti ti-calendar-event me-1"></i>TMT Pengangkatan
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${formatDate(ptk.tmt_pengangkatan) || '-'}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-warning">
                                                <i class="ti ti-coins me-1"></i>Sumber Gaji
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${ptk.sumber_gaji || '-'}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-warning">
                                                <i class="ti ti-school me-1"></i>Lisensi Kepala Sekolah
                                            </label>
                                            <p class="form-control-plaintext border-bottom">
                                                <span class="badge ${ptk.lisensi_kepala_sekolah === 'Sudah' ? 'bg-success' : 'bg-secondary'}">${ptk.lisensi_kepala_sekolah || '-'}</span>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-warning">
                                                <i class="ti ti-file-certificate me-1"></i>No. SK Keluar
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${ptk.nomor_sk_keluar || '-'}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Penugasan Tab -->
                        <div class="tab-pane fade" id="nav-documents" role="tabpanel">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <!-- Informasi Wilayah dan Sekolah -->
                                        <div class="col-12">
                                            <h6 class="text-primary fw-bolder mb-3">
                                                <i class="ti ti-building-community me-1"></i>Informasi Wilayah & Sekolah
                                            </h6>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-primary">
                                                <i class="ti ti-map-2 me-1"></i>Nama Wilayah
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${ptk.satpen?.provinsi?.nm_prov || '-'}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-primary">
                                                <i class="ti ti-school me-1"></i>Nama Sekolah
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${ptk.satpen?.nm_satpen || '-'}</p>
                                        </div>
                                        
                                        <!-- Data Penugasan -->
                                        <div class="col-12">
                                            <h6 class="text-warning fw-bolder mb-3">
                                                <i class="ti ti-file-certificate me-1"></i>Data Penugasan
                                            </h6>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-warning">
                                                <i class="ti ti-file-text me-1"></i>No. Surat Tugas
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${ptk.nomor_surat_tugas || '-'}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-warning">
                                                <i class="ti ti-calendar me-1"></i>Tanggal Surat Tugas
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${formatDate(ptk.tanggal_surat_tugas) || '-'}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-warning">
                                                <i class="ti ti-calendar-check me-1"></i>TMT Tugas
                                            </label>
                                            <p class="form-control-plaintext border-bottom">${formatDate(ptk.tmt_tugas) || '-'}</p>
                                        </div>
                                        
                                        <!-- Upload Dokumen -->
                                        <div class="col-12">
                                            <h6 class="text-info fw-bolder mb-3">
                                                <i class="ti ti-upload me-1"></i>Dokumen Pendukung
                                            </h6>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fw-bold text-info">
                                                <i class="ti ti-file-certificate me-1"></i>Upload SK Pengangkatan
                                            </label>
                                            <div class="p-3 bg-light rounded">
                                                ${ptk.upload_sk ? 
                                                    `<a href="file/${ptk.upload_sk}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                        <i class="ti ti-eye me-1"></i>Lihat Dokumen SK
                                                    </a>` : 
                                                    '<span class="text-muted">Belum ada dokumen</span>'
                                                }
                                            </div>
                                        </div>
                                        
                                        <!-- Keterangan Revisi -->
                                        ${ptk.keterangan_revisi ? `
                                            <div class="col-12">
                                                <hr class="my-3">
                                                <label class="form-label fw-bold text-danger">
                                                    <i class="ti ti-alert-triangle me-1"></i>Keterangan Revisi
                                                </label>
                                                <div class="alert alert-warning">
                                                    <i class="ti ti-info-circle me-2"></i>${ptk.keterangan_revisi}
                                                </div>
                                            </div>
                                        ` : ''}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Riwayat Tab -->
                        <div class="tab-pane fade" id="nav-history" role="tabpanel">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <div class="timeline-container">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold text-primary">
                                                    <i class="ti ti-calendar-plus me-1"></i>Tanggal Dibuat
                                                </label>
                                                <p class="form-control-plaintext border-bottom">${formatDateTime(ptk.created_at) || '-'}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold text-primary">
                                                    <i class="ti ti-calendar-up me-1"></i>Terakhir Diupdate
                                                </label>
                                                <p class="form-control-plaintext border-bottom">${formatDateTime(ptk.updated_at) || '-'}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold text-info">
                                                    <i class="ti ti-clock me-1"></i>Tanggal Verifikasi
                                                </label>
                                                <p class="form-control-plaintext border-bottom">${formatDateTime(ptk.tanggal_verifikasi) || '-'}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold text-warning">
                                                    <i class="ti ti-edit me-1"></i>Tanggal Revisi
                                                </label>
                                                <p class="form-control-plaintext border-bottom">${formatDateTime(ptk.tanggal_revisi) || '-'}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold text-primary">
                                                    <i class="ti ti-refresh me-1"></i>Tanggal Proses
                                                </label>
                                                <p class="form-control-plaintext border-bottom">${formatDateTime(ptk.tanggal_proses) || '-'}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold text-success">
                                                    <i class="ti ti-check me-1"></i>Tanggal Approve
                                                </label>
                                                <p class="form-control-plaintext border-bottom">${formatDateTime(ptk.tanggal_approve) || '-'}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold text-dark">
                                                    <i class="ti ti-file-certificate me-1"></i>Tanggal Dikeluarkan
                                                </label>
                                                <p class="form-control-plaintext border-bottom">${formatDateTime(ptk.tanggal_dikeluarkan) || '-'}</p>
                                            </div>
                                        </div>
                                        
                                        ${history && history.length > 0 ? `
                                        <hr class="my-4">
                                        <h6 class="text-primary mb-3">
                                            <i class="ti ti-timeline me-1"></i>Timeline Proses
                                        </h6>
                                        <div class="timeline">
                                            ${history.map(h => `
                                                <div class="timeline-item mb-3 p-3 border-start border-3 ${h.status_to === 'approve' ? 'border-success bg-light-success' : 
                                                    h.status_to === 'revisi' ? 'border-danger bg-light-danger' : 
                                                    h.status_to === 'dikeluarkan' ? 'border-primary bg-light-primary' : 'border-info bg-light-info'}">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <span class="badge ${h.status_to === 'approve' ? 'bg-success' : 
                                                            h.status_to === 'revisi' ? 'bg-danger' : 
                                                            h.status_to === 'dikeluarkan' ? 'bg-primary' : 'bg-info'} me-2">
                                                            ${h.status_to}
                                                        </span>
                                                        <small class="text-muted">
                                                            <i class="ti ti-clock me-1"></i>${formatDateTime(h.created_at)}
                                                        </small>
                                                    </div>
                                                    ${h.keterangan ? `<p class="mb-0 text-dark"><small>${h.keterangan}</small></p>` : ''}
                                                </div>
                                            `).join('')}
                                        </div>
                                        ` : ''}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
}

function deletePTK(id) {
    if (confirm('Apakah Anda yakin ingin menghapus data PTK ini?')) {
        $.ajax({
            url: `{{ url('/npyp/ptk') }}/${id}`,
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    alert('Data PTK berhasil dihapus');
                    refreshCurrentTable();
                } else {
                    alert('Gagal menghapus data PTK');
                }
            },
            error: function() {
                alert('Terjadi kesalahan saat menghapus data PTK');
            }
        });
    }
}

function submitPTKForm() {
    try {
        const form = $('#ptkForm')[0];
        if (!form) {
            throw new Error('Form tidak ditemukan');
        }
        
        const formData = new FormData(form);
        const ptkId = $('#ptkId').val();
        const url = ptkId ? `{{ url('/npyp/ptk') }}/${ptkId}` : '{{ route("ptk.store") }}';
        
        if (ptkId) {
            formData.append('_method', 'PUT');
        }
        
        // Disable submit button to prevent double submission
        const submitBtn = $('button[onclick="submitPTKForm()"]');
        submitBtn.prop('disabled', true).html('<i class="ti ti-loader-2 spin me-1"></i>Menyimpan...');
        
        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    alert(response.message);
                    $('#ptkModal').modal('hide');
                    refreshCurrentTable();
                } else {
                    alert(response.message || 'Terjadi kesalahan');
                }
            },
            error: function(xhr) {
                console.error('Submit PTK error:', xhr);
                const errors = xhr.responseJSON?.errors;
                if (errors) {
                    let message = 'Validasi gagal:\n';
                    Object.keys(errors).forEach(key => {
                        message += '- ' + errors[key][0] + '\n';
                    });
                    alert(message);
                } else {
                    const errorMessage = xhr.responseJSON?.message || 'Terjadi kesalahan saat menyimpan data PTK';
                    alert(errorMessage);
                }
            },
            complete: function() {
                // Re-enable submit button
                submitBtn.prop('disabled', false).html('<i class="ti ti-device-floppy me-1"></i>Simpan PTK');
            }
        });
    } catch (error) {
        console.error('Submit form error:', error);
        alert('Terjadi kesalahan: ' + error.message);
    }
}

function submitRevisi(id) {
    if (confirm('Apakah Anda yakin ingin mengajukan ulang PTK ini untuk verifikasi?')) {
        $.ajax({
            url: `{{ url('/npyp/ptk') }}/${id}/revisi`,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    alert(response.message);
                    refreshCurrentTable();
                } else {
                    alert(response.message || 'Terjadi kesalahan');
                }
            },
            error: function(xhr) {
                alert('Terjadi kesalahan saat mengajukan ulang PTK');
            }
        });
    }
}

</script>
@endsection