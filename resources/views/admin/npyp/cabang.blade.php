@extends('template.layout', [
    'title' => 'Sipinter - Data NPYP Cabang',
])

@section('navbar')
    @include('template.navadmin')
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
                    
                    <div class="card border">
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
                        <div class="card-body p-4>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Data will be populated via DataTables -->
                                        <tr>
                                            <td colspan="7" class="text-center py-5">
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
                responsive: true,
                scrollX: true
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