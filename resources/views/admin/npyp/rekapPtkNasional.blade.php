@extends('template.layout', [
    'title' => 'Sipinter - Rekap PTK Nasional',
])

@section('navbar')
    @include('template.navadmin')
@endsection

@section('styles')
<style>
/* Filter section smooth transition styling */
#filterSection {
    transition: all 0.3s ease-in-out;
}

#toggleFilterBtn {
    transition: all 0.2s ease-in-out;
}

#toggleFilterBtn:hover {
    transform: translateY(-1px);
}

#toggleFilterIcon {
    transition: transform 0.3s ease-in-out;
}

/* Enhanced card header styling */
.card-header {
    border-bottom: 2px solid #e9ecef;
}

/* Button hover effect */
#toggleFilterBtn:hover {
    background-color: #0d6efd;
    color: white;
    border-color: #0d6efd;
}

/* Improved table padding */
#ptkTable tbody td {
    padding: 15px 12px !important;
    vertical-align: middle;
}
#ptkTable thead th {
    padding: 18px 12px !important;
    vertical-align: middle;
}

/* Remove table and card shadows */
.table, .card {
    box-shadow: none !important;
}
</style>
@endsection

@section('container')
    <!--  Row 1 -->
    <div class="row container-begin">
        <div class="col-sm-12">

            <nav class="mt-2 mb-4" aria-label="breadcrumb">
                <ul id="breadcrumb" class="mb-0">
                    <li><a href="#"><i class="ti ti-home"></i></a></li>
                    <li><a href="#"><span class="fa fa-info-circle"></span> Manajemen NPYP</a></li>
                    <li><a href="#"><span class="ti ti-users"></span> Rekap PTK Nasional</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <!-- Statistics Cards -->
            <div class="row mb-2">
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bg-light-success p-3 rounded me-3">
                                    <i class="ti ti-check text-success fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 text-success">PTK Disetujui</h6>
                                    <h4 class="mb-0">{{ number_format($ptkDisetujui ?? 0) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bg-light-warning p-3 rounded me-3">
                                    <i class="ti ti-clock text-warning fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 text-warning">PTK Menunggu</h6>
                                    <h4 class="mb-0">{{ number_format($ptkMenunggu ?? 0) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bg-light-danger p-3 rounded me-3">
                                    <i class="ti ti-x text-danger fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 text-danger">PTK Ditolak</h6>
                                    <h4 class="mb-0">{{ number_format($ptkDitolak ?? 0) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bg-light-info p-3 rounded me-3">
                                    <i class="ti ti-school text-info fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 text-info">PTK Dikeluarkan</h6>
                                    <h4 class="mb-0">{{ number_format($ptkDikeluarkan ?? 0) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter Section -->
            <div class="card mb-4">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="ti ti-filter me-2"></i>Filter & Pencarian Data
                    </h5>
                    <button type="button" class="btn btn-sm btn-outline-primary" id="toggleFilterBtn" data-bs-toggle="tooltip" title="Sembunyikan/Tampilkan Filter">
                        <i class="ti ti-chevron-up" id="toggleFilterIcon"></i>
                    </button>
                </div>
                <div class="card-body" id="filterSection">
                    <form id="filterForm">
                        <!-- Filter Section -->
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Wilayah</label>
                                @include('component.selectpicker', [
                                    'id' => 'provinsi_id',
                                    'name' => 'provinsi',
                                    'prefix' => 'Wilayah ',
                                    'current' => request('provinsi_id'),
                                    'default' => 'Semua Wilayah',
                                    'val' => 'id_prov',
                                    'label' => 'nm_prov',
                                    'data' => $provinsi,
                                ])
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Cabang</label>
                                @include('component.selectpicker', [
                                    'id' => 'cabang_id',
                                    'name' => 'cabang',
                                    'prefix' => '',
                                    'current' => request('id_cabang'),
                                    'default' => 'Cabang',
                                    'val' => 'id_pc',
                                    'label' => 'nm_pc',
                                    'data' => [],
                                ])
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Status Pengajuan</label>
                                <select class="selectpicker" name="status_pengajuan" id="status_pengajuan">
                                    <option value="">Semua Status</option>
                                    <option value="disetujui" {{ request('status_pengajuan') == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                                    <option value="menunggu" {{ request('status_pengajuan') == 'menunggu' ? 'selected' : '' }}>Menunggu Persetujuan</option>
                                    <option value="ditolak" {{ request('status_pengajuan') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Jenis PTK</label>
                                <select class="selectpicker" name="jenis_ptk" id="jenis_ptk">
                                    <option value="">Semua Jenis</option>
                                    <option value="guru" {{ request('jenis_ptk') == 'guru' ? 'selected' : '' }}>Guru</option>
                                    <option value="kepala_sekolah" {{ request('jenis_ptk') == 'kepala_sekolah' ? 'selected' : '' }}>Kepala Sekolah</option>
                                    <option value="tenaga_administrasi" {{ request('jenis_ptk') == 'tenaga_administrasi' ? 'selected' : '' }}>Tenaga Administrasi</option>
                                    <option value="tenaga_perpustakaan" {{ request('jenis_ptk') == 'tenaga_perpustakaan' ? 'selected' : '' }}>Tenaga Perpustakaan</option>
                                    <option value="tenaga_laboratorium" {{ request('jenis_ptk') == 'tenaga_laboratorium' ? 'selected' : '' }}>Tenaga Laboratorium</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary me-2" id="filterBtn">
                                    <i class="ti ti-filter me-1"></i>Terapkan Filter
                                </button>
                                <button type="button" class="btn btn-outline-secondary me-2" id="resetBtn">
                                    <i class="ti ti-refresh me-1"></i>Reset Semua
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Data Table -->
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white">
                        <i class="ti ti-table me-2"></i>Data Rekap PTK Nasional
                    </h5>
                </div>


                <div class="card-body">
                    <div class="row align-items-center mb-3">
                        <div class="col-md-4">
                            <label class="form-label mb-2">Pencarian Cepat</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="ti ti-search"></i>
                                </span>
                                <input type="text" class="form-control" name="quick_search" id="quick_search"
                                       placeholder="Cari nama PTK, NIK, atau satpen..."
                                       value="{{ request('search') }}">
                                <button type="button" class="btn btn-outline-secondary" id="clearQuickSearch">
                                    <i class="ti ti-x"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label mb-2">Items per page</label>
                            <select class="form-control" name="quick_per_page" id="quick_per_page">
                                <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>10</option>
                                <option value="25" {{ request('per_page') == '25' ? 'selected' : '' }}>25</option>
                                <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>50</option>
                                <option value="100" {{ request('per_page') == '100' ? 'selected' : '' }}>100</option>
                            </select>
                        </div>
                        <div class="col-md-6 text-end">
                            <label class="form-label mb-2">&nbsp;</label>
                            <div class="d-flex gap-2 justify-content-end">
                                <button type="button" class="btn btn-outline-primary" id="quickSearchBtn">
                                    <i class="ti ti-search me-1"></i>Cari
                                </button>
                                <button type="button" class="btn btn-outline-secondary" id="quickResetBtn">
                                    <i class="ti ti-refresh me-1"></i>Reset
                                </button>
                                <button type="button" class="btn btn-success" id="quickExportBtn">
                                    <i class="ti ti-download me-1"></i>Export Excel
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover" id="ptkTable">
                            <thead class="table-dark">
                                <tr>
                                    <th width="5%">No.</th>
                                    <th width="8%">No Registrasi</th>
                                    <th width="8%">No NPYP</th>
                                    <th width="15%">Nama Satpen</th>
                                    <th width="10%">Kab/Kota</th>
                                    <th width="8%">Provinsi</th>
                                    <th width="18%">Nama PTK</th>
                                    <th width="8%">NIK</th>
                                    <th width="8%">Jenis PTK</th>
                                    <th width="8%">Status Kepegawaian</th>
                                    <th width="10%">Status Pengajuan</th>
                                    <th width="10%">Petugas Approval</th>
                                    <th width="8%">Catatan</th>
                                    <th width="5%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($ptkData as $index => $ptk)
                                <tr>
                                    <td>{{ ($ptkData->currentPage() - 1) * $ptkData->perPage() + $index + 1 }}</td>
                                    <td>
                                        <span class="badge bg-light-primary text-primary">
                                            {{ $ptk->satpen->no_registrasi ?? '-' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-light-info text-info">
                                            {{ $ptk->npyp->nomor_npyp ?? '-' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <span class="fw-semibold">{{ $ptk->satpen->nm_satpen ?? '-' }}</span>
                                                <br><small class="text-muted">{{ $ptk->satpen->jenjang->nm_jenjang ?? '-' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $ptk->satpen->kabupaten->nama_kab ?? '-' }}</td>
                                    <td>{{ $ptk->satpen->provinsi->nm_prov ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="fw-semibold">{{ $ptk->nama_ptk ?? '-' }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $ptk->nik ?? '-' }}</td>
                                    <td>
                                        <span class="badge bg-light-secondary text-secondary">
                                            {{ ucfirst(str_replace('_', ' ', $ptk->jenis_ptk ?? '-')) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-light-info text-info">
                                            {{ ucfirst($ptk->status_kepegawaian ?? '-') }}
                                        </span>
                                    </td>
                                    <td>
                                        @php
                                            $statusClass = match($ptk->status_ajuan ?? 'menunggu') {
                                                'approve', 'dikeluarkan' => 'bg-success',
                                                'revisi' => 'bg-danger',
                                                default => 'bg-warning'
                                            };

                                            $statusLabel = match($ptk->status_ajuan ?? 'menunggu') {
                                                'approve' => 'Disetujui',
                                                'dikeluarkan' => 'SK Dikeluarkan',
                                                'revisi' => 'Perlu Revisi',
                                                'verifikasi' => 'Verifikasi',
                                                'proses' => 'Proses',
                                                default => 'Menunggu'
                                            };
                                        @endphp
                                        <span class="badge {{ $statusClass }}">
                                            {{ $statusLabel }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ $ptk->npyp->nama_npyp ?? '-' }}
                                    </td>
                                    <td>
                                        @if($ptk->keterangan_revisi)
                                            <i class="ti ti-note text-info" data-bs-toggle="tooltip"
                                               title="{{ Str::limit($ptk->keterangan_revisi, 50) }}"></i>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary"
                                                onclick="showDetail({{ $ptk->id }})"
                                                data-bs-toggle="tooltip" title="Lihat Detail">
                                            <i class="ti ti-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="14" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="ti ti-database-off fs-3 mb-2 d-block"></i>
                                            <p class="mb-0">
                                                @if(request()->hasAny(['search', 'provinsi_id', 'cabang_id', 'status_pengajuan', 'jenis_ptk']))
                                                    Tidak ada data PTK yang sesuai dengan kriteria pencarian
                                                @else
                                                    Belum ada data PTK yang tersedia
                                                @endif
                                            </p>
                                            @if(request()->hasAny(['search', 'provinsi_id', 'cabang_id', 'status_pengajuan', 'jenis_ptk']))
                                                <button type="button" class="btn btn-sm btn-outline-primary mt-2" id="resetFromEmptyBtn">
                                                    <i class="ti ti-refresh me-1"></i>Reset Filter
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if(isset($ptkData))
                        @if($ptkData->total() > 0)
                            <div class="row mt-4 align-items-center">
                                <div class="col-md-6">
                                    <div class="text-muted">
                                        @if($ptkData->hasPages())
                                            Halaman {{ $ptkData->currentPage() }} dari {{ $ptkData->lastPage() }}
                                            ({{ number_format($ptkData->total()) }} total data)
                                        @else
                                            Menampilkan semua {{ number_format($ptkData->total()) }} data
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @if($ptkData->hasPages())
                                        <div class="d-flex justify-content-end">
                                            {{ $ptkData->appends(request()->query())->onEachSide(2)->links() }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Modal -->
    @include('admin.npyp.detailPtkModal')

@endsection

@section('extendscripts')
<script>
$(document).ready(function() {

    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Toggle filter section functionality
    $('#toggleFilterBtn').click(function() {
        const filterSection = $('#filterSection');
        const icon = $('#toggleFilterIcon');
        const isVisible = filterSection.is(':visible');

        if (isVisible) {
            // Hide the section
            filterSection.slideUp(300);
            icon.removeClass('ti-chevron-up').addClass('ti-chevron-down');
            $(this).attr('title', 'Tampilkan Filter');
            // Store state in localStorage
            localStorage.setItem('filterSectionHidden', 'true');
        } else {
            // Show the section
            filterSection.slideDown(300);
            icon.removeClass('ti-chevron-down').addClass('ti-chevron-up');
            $(this).attr('title', 'Sembunyikan Filter');
            // Store state in localStorage
            localStorage.setItem('filterSectionHidden', 'false');
        }

        // Reinitialize tooltip after title change
        $(this).tooltip('dispose').tooltip();
    });

    // Restore filter section state from localStorage
    const isFilterHidden = localStorage.getItem('filterSectionHidden') === 'true';
    if (isFilterHidden) {
        const filterSection = $('#filterSection');
        const icon = $('#toggleFilterIcon');
        const toggleBtn = $('#toggleFilterBtn');

        filterSection.hide();
        icon.removeClass('ti-chevron-up').addClass('ti-chevron-down');
        toggleBtn.attr('title', 'Tampilkan Filter');
    }

    // Search functionality
    $('#searchBtn').click(function(e) {
        e.preventDefault();
        performSearch();
    });

    $('#search').keypress(function(e) {
        if (e.which === 13) {
            performSearch();
        }
    });

    // Clear search
    $('#clearSearch').click(function(e) {
        e.preventDefault();
        $('#search').val('');
        performSearch();
    });

    // Quick search functionality
    $('#quickSearchBtn').click(function(e) {
        e.preventDefault();
        performQuickSearch();
    });

    $('#quick_search').keypress(function(e) {
        if (e.which === 13) {
            performQuickSearch();
        }
    });

    // Clear quick search
    $('#clearQuickSearch').click(function(e) {
        e.preventDefault();
        $('#quick_search').val('');
        performQuickSearch();
    });

    // Quick per page change
    $('#quick_per_page').change(function() {
        applyQuickFilters();
    });

    // Quick reset
    $('#quickResetBtn').click(function(e) {
        e.preventDefault();
        window.location.href = '{{ route("a.npyp.rekap-ptk") }}';
    });

    // Quick export
    $('#quickExportBtn').click(function(e) {
        e.preventDefault();
        let filters = {
            search: $('#quick_search').val(),
            per_page: $('#quick_per_page').val(),
            export: 'excel'
        };

        // Remove empty values
        Object.keys(filters).forEach(key => {
            if (!filters[key] && key !== 'export') {
                delete filters[key];
            }
        });

        let queryString = $.param(filters);
        let url = '{{ route("a.npyp.rekap-ptk") }}';
        if (queryString) {
            url += '?' + queryString;
        }
        window.open(url, '_blank');
    });

    function performQuickSearch() {
        let searchValue = $('#quick_search').val();

        let currentUrl = new URL(window.location.href);

        if (searchValue.trim()) {
            currentUrl.searchParams.set('search', searchValue.trim());
        } else {
            currentUrl.searchParams.delete('search');
        }

        // Reset to page 1 when searching
        currentUrl.searchParams.delete('page');

        window.location.href = currentUrl.toString();
    }

    function applyQuickFilters() {
        let filters = {
            search: $('#quick_search').val(),
            per_page: $('#quick_per_page').val()
        };

        // Remove empty values
        Object.keys(filters).forEach(key => {
            if (!filters[key]) {
                delete filters[key];
            }
        });

        let queryString = $.param(filters);
        let url = '{{ route("a.npyp.rekap-ptk") }}';
        if (queryString) {
            url += '?' + queryString;
        }
        window.location.href = url;
    }

    // Auto-search with debounce
    let searchTimeout;
    $('#search').on('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(function() {
            performSearch();
        }, 1000); // Wait 1 second after user stops typing
    });

    // Auto-search for quick search
    let quickSearchTimeout;
    $('#quick_search').on('input', function() {
        clearTimeout(quickSearchTimeout);
        quickSearchTimeout = setTimeout(function() {
            performQuickSearch();
        }, 1000); // Wait 1 second after user stops typing
    });

    function performSearch() {
        let searchValue = $('#search').val();

        let currentUrl = new URL(window.location.href);

        if (searchValue.trim()) {
            currentUrl.searchParams.set('search', searchValue.trim());
        } else {
            currentUrl.searchParams.delete('search');
        }

        // Reset to page 1 when searching
        currentUrl.searchParams.delete('page');

        window.location.href = currentUrl.toString();
    }

    // Per page change
    $('#per_page').change(function() {
        applyFilters();
    });

    // Filter button
    $('#filterBtn').click(function(e) {
        e.preventDefault();
        applyFilters();
    });

    function applyFilters() {
        let filters = {
            search: $('#search').val(),
            provinsi_id: $('#provinsi_id').val(),
            cabang_id: $('#cabang_id').val(),
            status_pengajuan: $('#status_pengajuan').val(),
            jenis_ptk: $('#jenis_ptk').val(),
            per_page: $('#per_page').val()
        };

        // Remove empty values
        Object.keys(filters).forEach(key => {
            if (!filters[key]) {
                delete filters[key];
            }
        });

        let queryString = $.param(filters);
        let url = '{{ route("a.npyp.rekap-ptk") }}';
        if (queryString) {
            url += '?' + queryString;
        }
        window.location.href = url;
    }

    // Reset button and reset from empty state
    $('#resetBtn, #resetFromEmptyBtn').click(function(e) {
        e.preventDefault();
        window.location.href = '{{ route("a.npyp.rekap-ptk") }}';
    });

    // Export button
    $('#exportBtn').click(function(e) {
        e.preventDefault();
        let filters = {
            search: $('#search').val(),
            provinsi_id: $('#provinsi_id').val(),
            cabang_id: $('#cabang_id').val(),
            status_pengajuan: $('#status_pengajuan').val(),
            jenis_ptk: $('#jenis_ptk').val(),
            export: 'excel'
        };

        // Remove empty values
        Object.keys(filters).forEach(key => {
            if (!filters[key] && key !== 'export') {
                delete filters[key];
            }
        });

        let queryString = $.param(filters);
        let url = '{{ route("a.npyp.rekap-ptk") }}';
        if (queryString) {
            url += '?' + queryString;
        }
        window.open(url, '_blank');
    });

    // Show loading state only after the main action is executed
    function showButtonLoading(buttonId) {
        let btn = $('#' + buttonId);
        let originalText = btn.html();

        btn.prop('disabled', true);
        btn.html('<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>Loading...');

        // Re-enable button after 2 seconds as fallback
        setTimeout(function() {
            btn.prop('disabled', false);
            btn.html(originalText);
        }, 2000);
    }

    // Add search highlight function
    function highlightSearchTerm() {
        let searchTerm = '{{ request("search") }}';
        if (searchTerm) {
            $('#ptkTable tbody tr').each(function() {
                $(this).find('td').each(function() {
                    let text = $(this).html();
                    if (text && typeof text === 'string') {
                        let highlightedText = text.replace(
                            new RegExp(searchTerm, 'gi'),
                            '<mark class="bg-warning">$&</mark>'
                        );
                        $(this).html(highlightedText);
                    }
                });
            });
        }
    }

    // Call highlight function
    highlightSearchTerm();
});

// Show detail modal function
function showDetail(ptkId) {
    // Show loading state
    $('#detailPtkModal').modal('show');

    // Clear previous data and show loading
    resetModalData();
    showModalLoading(true);

    // Fetch PTK detail
    $.ajax({
        url: `/a/npyp/rekap-ptk/${ptkId}/detail`,
        method: 'GET',
        success: function(response) {
            if (response.success && response.data) {
                populateDetailModal(response.data);
            } else {
                showModalError('Gagal memuat detail PTK: ' + (response.message || 'Data tidak ditemukan'));
            }
        },
        error: function(xhr, status, error) {
            let errorMessage = 'Terjadi kesalahan saat memuat detail PTK';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            }
            showModalError(errorMessage);
        },
        complete: function() {
            showModalLoading(false);
        }
    });
}

// Reset modal data to default state
function resetModalData() {
    // Reset all text elements (including header)
    $('[id^="modal"]').each(function() {
        if ($(this).hasClass('badge')) {
            $(this).removeClass().addClass('badge bg-secondary').text('-');
        } else {
            $(this).text('-');
        }
    });

    // Reset upload SK section
    $('#modalUploadSk').html('<span class="text-muted">Belum ada file</span>');

    // Reset header badges specifically
    $('#modalJenisPtkBadge').removeClass().addClass('badge bg-secondary');
    $('#modalStatusKepegawaianBadge').removeClass().addClass('badge bg-secondary');
    $('#modalStatusPengajuanBadge').removeClass().addClass('badge bg-secondary');
}

// Show/hide modal loading state
function showModalLoading(show) {
    $('#modalLoading').fadeOut(300, function() {
        $(this).remove();
    });
}

// Show modal error
function showModalError(message) {
    $('.modal-body').html(`
        <div class="d-flex align-items-center justify-content-center min-vh-50">
            <div class="text-center">
                <div class="mb-4">
                    <div class="bg-gradient-danger rounded-circle p-4 d-inline-block" style="background: linear-gradient(135deg, #fc4a1a 0%, #f7b733 100%);">
                        <i class="ti ti-alert-triangle text-white" style="font-size: 3rem;"></i>
                    </div>
                </div>
                <h4 class="text-danger fw-bold mb-3">
                    <i class="ti ti-exclamation-mark me-2"></i>Oops! Terjadi Kesalahan
                </h4>
                <div class="card border-0 bg-light p-4 mb-4" style="max-width: 500px; margin: 0 auto;">
                    <p class="text-muted mb-0">${message}</p>
                </div>
                <div class="d-flex gap-2 justify-content-center">
                    <button type="button" class="btn btn-outline-primary" onclick="location.reload()">
                        <i class="ti ti-refresh me-1"></i>Coba Lagi
                    </button>
                    <button type="button" class="btn btn-gradient-danger px-4" onclick="$('#detailPtkModal').modal('hide')" style="background: linear-gradient(135deg, #fc4a1a 0%, #f7b733 100%); border: none; color: white;">
                        <i class="ti ti-x me-1"></i>Tutup
                    </button>
                </div>
            </div>
        </div>
    `);
}

</script>
@endsection