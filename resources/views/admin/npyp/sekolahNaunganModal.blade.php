@section('modals')
<!-- Modal Tambah Sekolah Naungan -->
<div class="modal fade" id="sekolahNaunganModal" tabindex="-1" aria-labelledby="sekolahNaunganModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-light-primary">
                <div>
                    <h4 class="modal-title text-primary mb-1" id="sekolahNaunganModalLabel">
                        <i class="ti ti-school-plus me-2"></i>Tambah Sekolah Naungan
                    </h4>
                    <small class="text-muted">Pilih sekolah yang akan menjadi naungan NPYP</small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <!-- Information Alert -->
                <div class="alert alert-info d-flex align-items-start mb-4" role="alert">
                    <i class="ti ti-info-circle me-2 mt-1"></i>
                    <div>
                        <h6 class="alert-heading mb-1">Petunjuk Penggunaan</h6>
                        <p class="mb-1">
                            <strong>1.</strong> Gunakan fitur pencarian untuk menemukan sekolah yang diinginkan<br>
                            <strong>2.</strong> Centang kotak di sebelah kiri untuk memilih sekolah<br>
                            <strong>3.</strong> Anda dapat memilih beberapa sekolah sekaligus untuk efisiensi<br>
                            <strong>4.</strong> Klik "Tambah Sekolah Terpilih" untuk menyimpan pilihan
                        </p>
                        <small class="text-muted">
                            <i class="ti ti-bulb me-1"></i>
                            <strong>Tips:</strong> Gunakan checkbox "Select All" untuk memilih semua sekolah yang tampil
                        </small>
                    </div>
                </div>

                <!-- Search Section -->
                <div class="card border-0 bg-light mb-4">
                    <div class="card-body p-3">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <label for="searchSekolah" class="form-label fw-bold mb-2">
                                    <i class="ti ti-search me-1"></i>Cari Sekolah
                                </label>
                                <input type="text" class="form-control form-control-lg" id="searchSekolah" 
                                       placeholder="Masukkan nama sekolah, NPSN, atau lokasi untuk mencari...">
                            </div>
                            <div class="col-md-4 text-end">
                                <div class="mt-3">
                                    <small class="text-muted d-block">Jumlah Sekolah Ditemukan</small>
                                    <h5 class="text-primary mb-0" id="foundCount">-</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Table Section -->
                <div class="card border">
                    <div class="card-header bg-light">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">
                                <i class="ti ti-database me-2"></i>Daftar Sekolah Tersedia
                            </h6>
                            <div class="d-flex align-items-center">
                                <small class="text-muted me-3">
                                    <i class="ti ti-clock me-1"></i>
                                    Data diperbaharui secara realtime
                                </small>
                                <span class="badge bg-primary" id="loadingBadge" style="display: none;">
                                    <i class="ti ti-loader-2 spin"></i> Loading...
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="sekolahTable">
                                <thead class="table-light">
                                    <tr>
                                        <th width="5%" class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" id="selectAll" class="form-check-input">
                                                <label class="form-check-label fw-bold" for="selectAll">
                                                    Pilih Semua
                                                </label>
                                            </div>
                                        </th>
                                        <th width="12%">
                                            <i class="ti ti-id me-1"></i>No Registrasi
                                        </th>
                                        <th width="30%">
                                            <i class="ti ti-school me-1"></i>Nama Sekolah
                                        </th>
                                        <th width="8%">
                                            <i class="ti ti-category me-1"></i>Jenjang
                                        </th>
                                        <th width="22%">
                                            <i class="ti ti-map-pin me-1"></i>Provinsi
                                        </th>
                                        <th width="23%">
                                            <i class="ti ti-map-2 me-1"></i>Kabupaten
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="satpenTableBody">
                                    <!-- Data will be loaded dynamically from API -->
                                    <tr>
                                        <td colspan="6" class="text-center py-5">
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="spinner-border text-primary mb-3" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                                <h6 class="text-muted mb-1">Memuat Data Sekolah</h6>
                                                <small class="text-muted">Sedang mengambil daftar sekolah dari database...</small>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Pagination -->
                <div class="card border-0 mt-3" id="paginationContainer" style="display: none;">
                    <div class="card-body p-3">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm justify-content-center mb-0" id="pagination">
                                <!-- Pagination buttons will be generated here -->
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Selection Summary -->
                <div class="card border-0 bg-light-success mt-3">
                    <div class="card-body p-3">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="ti ti-check-circle text-success me-2"></i>
                                    <div>
                                        <h6 class="mb-0">
                                            <span id="selectedCount">0</span> Sekolah Dipilih
                                        </h6>
                                        <small class="text-muted">Siap untuk ditambahkan ke NPYP</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 text-end">
                                <small class="text-muted" id="paginationInfo">
                                    <!-- Pagination info will be shown here -->
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <div class="d-flex w-100 justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="ti ti-info-circle text-muted me-2"></i>
                        <small class="text-muted">
                            Pastikan pilihan sekolah sudah sesuai sebelum menyimpan
                        </small>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-light border" data-bs-dismiss="modal">
                            <i class="ti ti-x me-1"></i>Batal
                        </button>
                        <button type="button" class="btn btn-primary" id="tambahSekolahBtn">
                            <i class="ti ti-plus me-1"></i>Tambah Sekolah Terpilih
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modalscripts')
<script>
    function initSekolahNaunganModal() {
        let currentPage = 1;
        
        // Load satpen data when modal is shown
        $('#sekolahNaunganModal').on('show.bs.modal', function() {
            currentPage = 1;
            loadSatpenData(currentPage);
        });

        // Load data from API
        function loadSatpenData(page = 1) {
            // Show loading indicator
            $('#loadingBadge').show();
            
            $.ajax({
                url: '{{ route("a.npyp.satpen-list") }}',
                type: 'GET',
                data: { page: page },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        populateTable(response.data);
                        setupPagination(response.pagination);
                        setupEventHandlers();
                        updatePaginationInfo(response.pagination);
                        updateFoundCount(response.data.length);
                    } else {
                        showError('Gagal memuat data: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    showError('Terjadi kesalahan saat memuat data satpen');
                },
                complete: function() {
                    // Hide loading indicator
                    $('#loadingBadge').hide();
                }
            });
        }

        // Populate table with data
        function populateTable(data) {
            let tbody = $('#satpenTableBody');
            tbody.empty();
            
            if (data.length === 0) {
                tbody.append(`
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <div class="d-flex flex-column align-items-center">
                                <i class="ti ti-search-off text-muted mb-2" style="font-size: 2rem;"></i>
                                <h6 class="text-muted mb-1">Tidak Ada Data Ditemukan</h6>
                                <small class="text-muted">Coba ubah kata kunci pencarian atau refresh halaman</small>
                            </div>
                        </td>
                    </tr>
                `);
                $('#paginationContainer').hide();
                return;
            }

            data.forEach(function(satpen) {
                let row = `
                    <tr class="align-middle">
                        <td class="text-center">
                            <div class="form-check">
                                <input type="checkbox" name="selectedSekolah[]" value="${satpen.id}" 
                                       class="form-check-input sekolah-checkbox" id="school_${satpen.id}">
                                <label class="form-check-label" for="school_${satpen.id}"></label>
                            </div>
                        </td>
                        <td>
                            <small class="text-muted">${satpen.no_registrasi || '-'}</small>
                        </td>
                        <td>
                            <div>
                                <h6 class="mb-1">${satpen.nama_satpen}</h6>
                                <small class="text-muted">
                                    <i class="ti ti-id-badge me-1"></i>NPSN: ${satpen.npsn || 'Belum ada'}
                                </small>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-light-primary text-primary">${satpen.jenjang}</span>
                        </td>
                        <td>
                            <small class="text-muted">
                                <i class="ti ti-map-pin me-1"></i>${satpen.provinsi}
                            </small>
                        </td>
                        <td>
                            <small class="text-muted">
                                <i class="ti ti-map-2 me-1"></i>${satpen.kabupaten}
                            </small>
                        </td>
                    </tr>
                `;
                tbody.append(row);
            });
        }

        // Setup pagination
        function setupPagination(pagination) {
            if (!pagination || pagination.last_page <= 1) {
                $('#paginationContainer').hide();
                return;
            }

            $('#paginationContainer').show();
            let paginationHtml = '';
            
            // Previous button
            if (pagination.current_page > 1) {
                paginationHtml += `<li class="page-item"><a class="page-link" href="#" data-page="${pagination.current_page - 1}">Previous</a></li>`;
            } else {
                paginationHtml += `<li class="page-item disabled"><span class="page-link">Previous</span></li>`;
            }

            // Page numbers
            let startPage = Math.max(1, pagination.current_page - 2);
            let endPage = Math.min(pagination.last_page, pagination.current_page + 2);

            if (startPage > 1) {
                paginationHtml += `<li class="page-item"><a class="page-link" href="#" data-page="1">1</a></li>`;
                if (startPage > 2) {
                    paginationHtml += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
                }
            }

            for (let i = startPage; i <= endPage; i++) {
                if (i === pagination.current_page) {
                    paginationHtml += `<li class="page-item active"><span class="page-link">${i}</span></li>`;
                } else {
                    paginationHtml += `<li class="page-item"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`;
                }
            }

            if (endPage < pagination.last_page) {
                if (endPage < pagination.last_page - 1) {
                    paginationHtml += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
                }
                paginationHtml += `<li class="page-item"><a class="page-link" href="#" data-page="${pagination.last_page}">${pagination.last_page}</a></li>`;
            }

            // Next button
            if (pagination.current_page < pagination.last_page) {
                paginationHtml += `<li class="page-item"><a class="page-link" href="#" data-page="${pagination.current_page + 1}">Next</a></li>`;
            } else {
                paginationHtml += `<li class="page-item disabled"><span class="page-link">Next</span></li>`;
            }

            $('#pagination').html(paginationHtml);

            // Handle pagination clicks
            $('#pagination a.page-link').on('click', function(e) {
                e.preventDefault();
                let page = $(this).data('page');
                currentPage = page;
                loadSatpenData(page);
            });
        }

        // Update pagination info
        function updatePaginationInfo(pagination) {
            if (pagination && pagination.total > 0) {
                $('#paginationInfo').text(`Menampilkan ${pagination.from}-${pagination.to} dari ${pagination.total} data`);
            } else {
                $('#paginationInfo').text('');
            }
        }

        // Setup event handlers after data is loaded
        function setupEventHandlers() {
            // Select All functionality
            $('#selectAll').off('change').on('change', function() {
                $('.sekolah-checkbox').prop('checked', this.checked);
                updateSelectedCount();
            });

            // Individual checkbox change
            $(document).off('change', '.sekolah-checkbox').on('change', '.sekolah-checkbox', function() {
                updateSelectedCount();
                // Update select all checkbox
                if ($('.sekolah-checkbox:checked').length === $('.sekolah-checkbox').length) {
                    $('#selectAll').prop('checked', true);
                } else {
                    $('#selectAll').prop('checked', false);
                }
            });

            // Search functionality
            $('#searchSekolah').off('keyup').on('keyup', function() {
                let searchText = $(this).val().toLowerCase();
                $('#sekolahTable tbody tr').each(function() {
                    let rowText = $(this).text().toLowerCase();
                    if (rowText.includes(searchText)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });

            updateSelectedCount();
        }

        // Add selected schools
        $('#tambahSekolahBtn').on('click', function() {
            let selectedSatpenIds = [];
            $('.sekolah-checkbox:checked').each(function() {
                selectedSatpenIds.push(parseInt($(this).val()));
            });

            if (selectedSatpenIds.length === 0) {
                alert('Silakan pilih minimal satu sekolah.');
                return;
            }

            // Disable button to prevent double submission
            $(this).prop('disabled', true).text('Menambahkan...');

            // AJAX call to save the selected schools
            $.ajax({
                url: '{{ route("a.npyp.add-sekolah-naungan") }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    selected_satpen: selectedSatpenIds
                },
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        
                        // Reset modal
                        resetModal();
                        
                        // Close modal
                        $('#sekolahNaunganModal').modal('hide');
                        
                        // Reload the main table if it exists
                        if (typeof sekolahNaunganTable !== 'undefined') {
                            sekolahNaunganTable.draw();
                        }
                    } else {
                        alert('Gagal menambahkan sekolah: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    let errorMessage = 'Terjadi kesalahan saat menambahkan sekolah';
                    
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    
                    alert(errorMessage);
                },
                complete: function() {
                    // Re-enable button
                    $('#tambahSekolahBtn').prop('disabled', false).text('Tambah Sekolah Terpilih');
                }
            });
        });

        function resetModal() {
            $('.sekolah-checkbox').prop('checked', false);
            $('#selectAll').prop('checked', false);
            $('#searchSekolah').val('');
            $('#sekolahTable tbody tr').show();
            updateSelectedCount();
        }

        function updateSelectedCount() {
            let count = $('.sekolah-checkbox:checked').length;
            $('#selectedCount').text(count);
            
            // Update selection summary styling based on count
            let selectionCard = $('.bg-light-success');
            if (count > 0) {
                selectionCard.removeClass('bg-light-success').addClass('bg-light-primary');
                selectionCard.find('.text-success').removeClass('text-success').addClass('text-primary');
            } else {
                selectionCard.removeClass('bg-light-primary').addClass('bg-light-success');
                selectionCard.find('.text-primary').removeClass('text-primary').addClass('text-success');
            }
        }

        function updateFoundCount(count) {
            $('#foundCount').text(count);
        }

        function showError(message) {
            $('#satpenTableBody').html(`
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <div class="d-flex flex-column align-items-center">
                            <i class="ti ti-alert-circle text-danger mb-2" style="font-size: 2rem;"></i>
                            <h6 class="text-danger mb-1">Terjadi Kesalahan</h6>
                            <small class="text-muted">${message}</small>
                        </div>
                    </td>
                </tr>
            `);
            $('#paginationContainer').hide();
            $('#foundCount').text('0');
        }
    }
</script>
@endsection