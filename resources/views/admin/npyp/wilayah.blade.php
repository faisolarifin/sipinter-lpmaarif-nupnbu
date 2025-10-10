@extends('template.layout', [
    'title' => 'Sipinter - Data NPYP Wilayah',
])

@section('navbar')
    @include('template.navadmin')
@endsection

@section('style')
    <style>
        #npypWilayahTable {
            width: 100% !important;
            table-layout: fixed;
        }
        #npypWilayahTable tbody td {
            padding: 12px 8px !important;
            vertical-align: middle;
            word-wrap: break-word;
        }
        #npypWilayahTable thead th {
            padding: 15px 8px !important;
        }
        #npypWilayahTable tbody td div {
            padding: 4px 0;
        }
        .table-responsive {
            overflow-x: auto;
        }
        #npypWilayahTable_wrapper {
            width: 100%;
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
                    <li><a href="#"><span class="fa fa-table"></span> Data NPYP Wilayah</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <!-- Header Information -->
            <div class="card w-100 mb-4">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="card-title fw-bold text-primary mb-2">
                                <i class="ti ti-database me-2"></i>REKAP DATA NPYP TINGKAT WILAYAH
                            </h4>
                            <p class="text-muted mb-0">
                                Halaman ini menampilkan rekapitulasi seluruh data Nomor Pokok Yayasan Penyelenggara (NPYP) 
                                yang telah terdaftar di tingkat wilayah/provinsi. Data mencakup informasi lengkap NPYP 
                                beserta operator yang bertanggung jawab di setiap wilayah.
                            </p>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="bg-light-primary p-3 rounded">
                                <h6 class="text-primary mb-1">Total Data</h6>
                                <h4 class="text-primary mb-0" id="totalData">-</h4>
                                <small class="text-muted">NPYP Wilayah</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card w-100">
                <div class="card-body pt-3">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title fw-bold mb-0">
                            <i class="ti ti-table me-2"></i>Tabel Data NPYP Wilayah
                        </h5>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-success btn-sm" id="exportExcelBtn">
                                <i class="ti ti-file-spreadsheet"></i> Export Excel
                            </button>
                        </div>
                    </div>
                    
                    <div class="alert alert-info d-flex align-items-center mb-3" role="alert">
                        <i class="ti ti-info-circle me-2"></i>
                        <div>
                            <strong>Informasi:</strong> Tabel di bawah ini menampilkan data NPYP yang terdaftar untuk setiap wilayah/provinsi. 
                            Gunakan fitur pencarian untuk menemukan data tertentu atau export ke Excel untuk keperluan laporan.
                        </div>
                    </div>

                    <div class="card border">
                        <div class="card-header bg-light">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">
                                    <i class="ti ti-database me-2"></i>Tabel Data NPYP Wilayah
                                </h6>
                                <div class="d-flex align-items-center">
                                    <small class="text-muted me-3">
                                        <i class="ti ti-refresh me-1"></i>
                                        Data terkini dari database
                                    </small>
                                    <span class="badge bg-primary" id="loadingBadgeWilayah" style="display: none;">
                                        <i class="ti ti-loader-2 spin"></i> Loading...
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0" id="npypWilayahTable">
                                    <thead class="table-primary">
                                        <tr>
                                            <th width="5%" class="text-center">
                                                <i class="ti ti-hash text-white"></i>
                                            </th>
                                            <th width="15%">
                                                <i class="ti ti-id text-white me-1"></i>Nomor NPYP
                                            </th>
                                            <th width="25%">
                                                <i class="ti ti-building text-white me-1"></i>Nama NPYP
                                            </th>
                                            <th width="20%">
                                                <i class="ti ti-user text-white me-1"></i>Nama Operator
                                            </th>
                                            <th width="15%">
                                                <i class="ti ti-phone text-white me-1"></i>No. HP Operator
                                            </th>
                                            <th width="20%">
                                                <i class="ti ti-map-pin text-white me-1"></i>Wilayah
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Data will be populated via DataTables -->
                                        <tr>
                                            <td colspan="6" class="text-center py-5">
                                                <div class="d-flex flex-column align-items-center">
                                                    <div class="spinner-border text-primary mb-3" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                    <h6 class="text-muted mb-1">Memuat Data NPYP Wilayah</h6>
                                                    <small class="text-muted">Sedang mengambil data dari seluruh wilayah...</small>
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
@endsection

@section('scripts')
    <script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap5.min.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            let npypWilayahTable = $('#npypWilayahTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("a.npyp.wilayah.data") }}',
                    type: 'GET',
                    dataSrc: function(json) {
                        // Update total data counter
                        $('#totalData').text(json.recordsTotal || 0);
                        return json.data;
                    },
                    beforeSend: function() {
                        $('#loadingBadgeWilayah').show();
                    },
                    complete: function() {
                        $('#loadingBadgeWilayah').hide();
                    }
                },
                columns: [
                    { data: 'no', name: 'no', orderable: false, searchable: false, render: function(data) { return data; } },
                    { data: 'nomor_npyp', name: 'nomor_npyp', render: function(data) { return data; } },
                    { data: 'nama_npyp', name: 'nama_npyp', render: function(data) { return data; } },
                    { data: 'nama_operator', name: 'nama_operator', render: function(data) { return data; } },
                    { data: 'nomor_operator', name: 'nomor_operator', render: function(data) { return data; } },
                    { data: 'wilayah', name: 'wilayah', render: function(data) { return data; } }
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
                responsive: false,
                scrollX: false,
                autoWidth: false,
                columnDefs: [
                    { width: "5%", targets: 0 },
                    { width: "15%", targets: 1 },
                    { width: "25%", targets: 2 },
                    { width: "20%", targets: 3 },
                    { width: "15%", targets: 4 },
                    { width: "20%", targets: 5 }
                ]
            });

            // Export Excel button click (custom implementation without buttons extension)
            $('#exportExcelBtn').on('click', function() {
                // Get current table data
                let tableData = [];
                let headers = ['No', 'Nomor NPYP', 'Nama NPYP', 'Nama Operator', 'No. HP Operator', 'Wilayah'];
                tableData.push(headers);

                // Get all data via AJAX for export
                $.ajax({
                    url: '{{ route("a.npyp.wilayah.data") }}',
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
                            link.setAttribute("download", "Data_NPYP_Wilayah.csv");
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