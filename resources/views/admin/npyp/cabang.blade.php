@extends('template.layout', [
    'title' => 'Sipinter - Data NPYP Cabang',
])

@section('navbar')
    @include('template.navadmin')
@endsection

@section('style')
     <style>
        #npypCabangTable tbody td {
            padding: 12px 8px !important;
            vertical-align: middle;
        }
        #npypCabangTable tbody td div {
            padding: 4px 0;
        }
        .table-success th {
            padding: 15px 8px !important;
        }
        .spin {
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        #satpenDetailTable tbody td {
            padding: 12px 8px !important;
            vertical-align: middle;
        }
        #satpenDetailTable thead th {
            padding: 12px 8px !important;
            font-weight: 600;
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
                    <li><a href="#"><span class="fa fa-table"></span> Data NPYP Cabang</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <div class="card w-100">
                <div class="card-body pt-3">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title fw-bold mb-0">
                            <i class="ti ti-table me-2"></i>Tabel Data NPYP Cabang
                        </h5>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-success btn-sm" id="exportExcelBtn">
                                <i class="ti ti-file-spreadsheet"></i> Export Excel
                            </button>
                        </div>
                    </div>
                    
                    <div class="card border shadow-none">
                        <div class="card-header bg-light">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">
                                    <i class="ti ti-building me-2"></i>Tabel Data NPYP Cabang
                                </h6>
                                <div class="d-flex align-items-center">
                                    <small class="text-muted me-3">
                                        <i class="ti ti-refresh me-1"></i>
                                        Data terkini dari database
                                    </small>
                                    <span class="badge bg-success" id="loadingBadgeCabang" style="display: none;">
                                        <i class="ti ti-loader-2 spin"></i> Loading...
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0" id="npypCabangTable">
                                    <thead class="table-success">
                                        <tr>
                                            <th width="5%" class="text-center">
                                                No
                                            </th>
                                            <th width="12%">
                                                Nomor NPYP
                                            </th>
                                            <th width="20%">
                                                Nama NPYP
                                            </th>
                                            <th width="15%">
                                                Nama Operator
                                            </th>
                                            <th width="12%">
                                                No. HP Operator
                                            </th>
                                            <th width="18%">
                                                Cabang
                                            </th>
                                            <th width="18%">
                                                Wilayah
                                            </th>
                                            <th width="10%" class="text-center">
                                                <i class="ti ti-settings text-white me-1"></i>Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Data will be populated via DataTables -->
                                        <tr>
                                            <td colspan="8" class="text-center py-5">
                                                <div class="d-flex flex-column align-items-center">
                                                    <div class="spinner-border text-success mb-3" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                    <h6 class="text-muted mb-1">Memuat Data NPYP Cabang</h6>
                                                    <small class="text-muted">Sedang mengambil data dari seluruh cabang...</small>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal Detail Satuan Pendidikan -->
    <div class="modal fade" id="detailSatpenModal" tabindex="-1" aria-labelledby="detailSatpenModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-success text-white border-0">
                    <div>
                        <h5 class="modal-title fw-bold mb-1" id="detailSatpenModalLabel">
                            <i class="ti ti-building-bank me-2"></i>Detail Satuan Pendidikan
                        </h5>
                        <small class="opacity-75" id="npypNameSubtitle">-</small>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                        <div class="card border shadow-sm">
                            <div class="card-header bg-white border-bottom">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0 fw-bold">
                                        <i class="ti ti-list-details me-2 text-success"></i>Daftar Satuan Pendidikan
                                    </h6>
                                    <span class="badge bg-success" id="loadingBadgeDetail" style="display: none;">
                                        <i class="ti ti-loader-2 spin"></i> Memuat...
                                    </span>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0" id="satpenDetailTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th width="5%" class="text-center">No</th>
                                                <th width="12%">NPSN</th>
                                                <th width="15%">No. Registrasi</th>
                                                <th width="28%">Nama Satpen</th>
                                                <th width="10%">Jenjang</th>
                                                <th width="15%">Kabupaten/Kota</th>
                                                <th width="15%">Alamat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="7" class="text-center py-5">
                                                    <div class="d-flex flex-column align-items-center">
                                                        <div class="spinner-border text-success mb-3" role="status">
                                                            <span class="visually-hidden">Loading...</span>
                                                        </div>
                                                        <h6 class="text-muted mb-1">Memuat Data</h6>
                                                        <small class="text-muted">Sedang mengambil data satuan pendidikan...</small>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer border-0 bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="ti ti-x me-1"></i>Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap5.min.js') }}"></script>
        
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            let npypCabangTable = $('#npypCabangTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("a.npyp.cabang.data") }}',
                    type: 'GET',
                    dataSrc: function(json) {
                        // Update total data counter
                        $('#totalData').text(json.recordsTotal || 0);
                        return json.data;
                    },
                    beforeSend: function() {
                        $('#loadingBadgeCabang').show();
                    },
                    complete: function() {
                        $('#loadingBadgeCabang').hide();
                    }
                },
                columns: [
                    { data: 'no', name: 'no', orderable: false, searchable: false, render: function(data) { return data; } },
                    { data: 'nomor_npyp', name: 'nomor_npyp', render: function(data) { return data; } },
                    { data: 'nama_npyp', name: 'nama_npyp', render: function(data) { return data; } },
                    { data: 'nama_operator', name: 'nama_operator', render: function(data) { return data; } },
                    { data: 'nomor_operator', name: 'nomor_operator', render: function(data) { return data; } },
                    { data: 'cabang', name: 'cabang', render: function(data) { return data; } },
                    { data: 'wilayah', name: 'wilayah', render: function(data) { return data; } },
                    {
                        data: 'id_npyp',
                        name: 'aksi',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                        render: function(data, type, row) {
                            return '<button class="btn btn-info btn-sm detail-btn" data-npyp-id="' + data + '" data-nama-npyp="' + row.nama_npyp + '" title="Lihat Detail Satuan Pendidikan">' +
                                   '<i class="ti ti-eye"></i>' +
                                   '</button>';
                        }
                    }
                ],
                order: [[1, 'asc']],
                pageLength: 10,
                lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
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
                },
                responsive: true,
                scrollX: true
            });

            // Detail button click handler
            let satpenDetailTable = null;

            $('#npypCabangTable').on('click', '.detail-btn', function() {
                const npypId = $(this).data('npyp-id');
                const npypName = $(this).data('nama-npyp');

                // Set modal title
                $('#npypNameSubtitle').text(npypName);

                // Show modal
                $('#detailSatpenModal').modal('show');

                // Load data
                loadSatpenDetail(npypId);
            });

            function loadSatpenDetail(npypId) {
                // Show loading
                $('#loadingBadgeDetail').show();

                // Destroy existing DataTable if exists
                if (satpenDetailTable) {
                    satpenDetailTable.destroy();
                }

                // Show loading in table
                $('#satpenDetailTable tbody').html(
                    '<tr><td colspan="7" class="text-center py-5">' +
                    '<div class="spinner-border text-success mb-3" role="status"></div>' +
                    '<h6 class="text-muted mb-1">Memuat Data</h6>' +
                    '<small class="text-muted">Sedang mengambil data satuan pendidikan...</small>' +
                    '</td></tr>'
                );

                // Fetch data from API
                $.ajax({
                    url: '{{ route("a.npyp.satpen-detail", ":npypId") }}'.replace(':npypId', npypId),
                    type: 'GET',
                    success: function(response) {
                        if (response.success) {
                            // Initialize DataTable with data
                            satpenDetailTable = $('#satpenDetailTable').DataTable({
                                data: response.data,
                                columns: [
                                    {
                                        data: 'no',
                                        className: 'text-center',
                                        render: function(data) {
                                            return '<span class="badge bg-light text-dark">' + data + '</span>';
                                        }
                                    },
                                    {
                                        data: 'npsn',
                                        render: function(data) {
                                            return '<span class="fw-bold">' + data + '</span>';
                                        }
                                    },
                                    {
                                        data: 'no_registrasi',
                                        render: function(data, type, row) {
                                            if (data && data !== '-' && row.id_satpen) {
                                                const detailUrl = '{{ route("a.rekapsatpen.detail", ":id") }}'.replace(':id', row.id_satpen);
                                                return '<a href="' + detailUrl + '" class="text-decoration-none" target="_blank">' +
                                                       '<i class="ti ti-external-link me-1"></i><small>' + data + '</small>' +
                                                       '</a>';
                                            }
                                            return '<small class="text-muted">' + data + '</small>';
                                        }
                                    },
                                    {
                                        data: 'nama_satpen',
                                        render: function(data) {
                                            return '<div class="text-wrap">' + data + '</div>';
                                        }
                                    },
                                    {
                                        data: 'jenjang',
                                        render: function(data) {
                                            let badgeClass = 'bg-secondary';
                                            if (['RA', 'TK'].includes(data)) badgeClass = 'bg-danger';
                                            else if (['MI', 'SD'].includes(data)) badgeClass = 'bg-info';
                                            else if (['MTs', 'SMP'].includes(data)) badgeClass = 'bg-warning';
                                            else if (['MA', 'SMA', 'SMK'].includes(data)) badgeClass = 'bg-success';

                                            return '<span class="badge ' + badgeClass + '">' + data + '</span>';
                                        }
                                    },
                                    {
                                        data: 'kabupaten',
                                        render: function(data) {
                                            return '<small>' + data + '</small>';
                                        }
                                    },
                                    {
                                        data: 'alamat',
                                        render: function(data) {
                                            return '<small class="text-muted">' + data + '</small>';
                                        }
                                    }
                                ],
                                pageLength: 10,
                                lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
                                order: [[0, 'asc']],
                                language: {
                                    processing: "Memuat data...",
                                    search: "Cari:",
                                    lengthMenu: "Tampilkan _MENU_ data",
                                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                                    infoEmpty: "Tidak ada data",
                                    infoFiltered: "(difilter dari _MAX_ total data)",
                                    zeroRecords: "Tidak ada data yang ditemukan",
                                    emptyTable: "Tidak ada data di tabel",
                                    paginate: {
                                        first: "Pertama",
                                        previous: "Sebelumnya",
                                        next: "Selanjutnya",
                                        last: "Terakhir"
                                    }
                                },
                                responsive: true,
                                autoWidth: false
                            });

                            $('#loadingBadgeDetail').hide();
                        } else {
                            showError(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        showError('Gagal memuat data: ' + error);
                    }
                });
            }

            function showError(message) {
                $('#loadingBadgeDetail').hide();
                $('#satpenDetailTable tbody').html(
                    '<tr><td colspan="7" class="text-center py-5">' +
                    '<div class="text-danger mb-3"><i class="ti ti-alert-circle fs-1"></i></div>' +
                    '<h6 class="text-danger mb-1">Terjadi Kesalahan</h6>' +
                    '<small class="text-muted">' + message + '</small>' +
                    '</td></tr>'
                );
            }

            // Reset modal when closed
            $('#detailSatpenModal').on('hidden.bs.modal', function() {
                if (satpenDetailTable) {
                    satpenDetailTable.destroy();
                    satpenDetailTable = null;
                }
                $('#satpenDetailTable tbody').html(
                    '<tr><td colspan="7" class="text-center py-5">' +
                    '<div class="spinner-border text-success mb-3" role="status"></div>' +
                    '<h6 class="text-muted mb-1">Memuat Data</h6>' +
                    '<small class="text-muted">Sedang mengambil data satuan pendidikan...</small>' +
                    '</td></tr>'
                );
            });

            // Export Excel button click (custom implementation without buttons extension)
            $('#exportExcelBtn').on('click', function() {
                // Get current table data
                let tableData = [];
                let headers = ['No', 'Nomor NPYP', 'Nama NPYP', 'Nama Operator', 'No. HP Operator', 'Cabang', 'Wilayah'];
                tableData.push(headers);

                // Get all data via AJAX for export
                $.ajax({
                    url: '{{ route("a.npyp.cabang.data") }}',
                    type: 'GET',
                    data: {
                        length: -1, // Get all data
                        search: { value: '' }
                    },
                    success: function(response) {
                        response.data.forEach(function(row, index) {
                            tableData.push([
                                index + 1,
                                row.nomor_npyp,
                                row.nama_npyp,
                                row.nama_operator,
                                row.nomor_operator,
                                row.cabang,
                                row.wilayah
                            ]);
                        });

                        // Create and download CSV
                        let csvContent = tableData.map(row => row.map(cell => `"${cell}"`).join(',')).join('\n');
                        let blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
                        let link = document.createElement("a");
                        if (link.download !== undefined) {
                            let url = URL.createObjectURL(blob);
                            link.setAttribute("href", url);
                            link.setAttribute("download", "Data_NPYP_Cabang.csv");
                            link.style.visibility = 'hidden';
                            document.body.appendChild(link);
                            link.click();
                            document.body.removeChild(link);
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat mengexport data');
                    }
                });
            });
        });
    </script>
@endsection