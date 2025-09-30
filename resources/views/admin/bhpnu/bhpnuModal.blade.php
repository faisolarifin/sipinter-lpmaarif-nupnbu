@section('modal-style')
<style>
    /* Simplified Modal Styling */
    .modal-modern .modal-content {
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        overflow: hidden;
    }

    .modal-modern .modal-header {
        background: #fff;
        color: #111827;
        border-bottom: 2px solid #e5e7eb;
        padding: 1rem 1.5rem;
    }

    .modal-modern .modal-header .modal-title {
        font-weight: 700;
        font-size: 1.125rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .modal-modern .modal-header .modal-title i {
        font-size: 1.25rem;
    }

    .modal-modern .modal-header .btn-close {
        transition: all 0.2s ease;
    }

    .modal-modern .modal-header .btn-close:hover {
        transform: scale(1.1);
    }

    .modal-modern .modal-body {
        padding: 1.5rem;
        background: #fff;
    }

    .modal-modern .modal-footer {
        padding: 1rem 1.5rem;
        background: #f9fafb;
        border-top: 1px solid #e5e7eb;
        gap: 0.5rem;
        display: flex;
        justify-content: flex-end;
    }

    .modal-modern .form-label {
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
        display: flex;
        align-items: center;
        gap: 0.375rem;
    }

    .modal-modern .form-label i {
        color: #6b7280;
        font-size: 1rem;
    }

    .modal-modern .form-control,
    .modal-modern textarea.form-control {
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        padding: 0.625rem 0.875rem;
        transition: all 0.2s ease;
        font-size: 0.875rem;
        background: #fff;
    }

    .modal-modern .form-control:focus,
    .modal-modern textarea.form-control:focus {
        border-color: #9ca3af;
        box-shadow: 0 0 0 3px rgba(156, 163, 175, 0.1);
        outline: none;
    }

    .modal-modern .alert {
        border-radius: 6px;
        padding: 0.875rem 1rem;
        border: 1px solid transparent;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 500;
        font-size: 0.875rem;
    }

    .modal-modern .alert i {
        font-size: 1.125rem;
        flex-shrink: 0;
    }

    /* Modal Animation */
    .modal.fade .modal-dialog {
        transform: scale(0.9) translateY(-20px);
        opacity: 0;
        transition: all 0.2s ease;
    }

    .modal.show .modal-dialog {
        transform: scale(1) translateY(0);
        opacity: 1;
    }

    /* Danger Modal Variant */
    .modal-danger .modal-header {
        background: #fee;
        border-bottom-color: #fecaca;
    }

    .modal-danger .modal-title {
        color: #dc2626;
    }

    /* Success Modal Variant */
    .modal-success .modal-header {
        background: #f0fdf4;
        border-bottom-color: #bbf7d0;
    }

    .modal-success .modal-title {
        color: #16a34a;
    }

    /* Button in Modal */
    .modal-modern .btn-modern {
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
        font-weight: 600;
    }
</style>
@endsection

@section('modals')
    <!-- Modal Tolak -->
    <div class="modal fade modal-modern modal-danger" id="modalTolak" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="ti ti-alert-circle"></i>
                        Tolak Permohonan
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="alert alert-warning border-0" role="alert">
                        <i class="ti ti-info-circle me-2"></i>
                        Pastikan Anda memberikan alasan penolakan yang jelas
                    </div>
                    <div>
                        <label for="keterangan" class="form-label">
                            <i class="ti ti-note me-1"></i>Catatan Penolakan
                        </label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" placeholder="Tuliskan alasan penolakan..." rows="4">{{ old('keterangan') }}</textarea>
                        <div class="invalid-feedback">
                            @error('keterangan') {{ $message }} @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-modern" data-bs-dismiss="modal">
                        <i class="ti ti-x me-1"></i>Batal
                    </button>
                    <button type="submit" class="btn btn-danger btn-modern">
                        <i class="ti ti-circle-x me-1"></i>Tolak Permohonan
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Dikirim -->
    <div class="modal fade modal-modern modal-success" id="modalDikirim" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="ti ti-send"></i>
                        Kirim Dokumen BHPNU
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="alert alert-info border-0" role="alert">
                            <i class="ti ti-info-circle me-2"></i>
                            Lengkapi informasi pengiriman dokumen BHPNU
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="keterangan" class="form-label">
                                    <i class="ti ti-note me-1"></i>Keterangan
                                </label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" placeholder="Keterangan pengiriman..." rows="3">{{ old('keterangan') }}</textarea>
                                <div class="invalid-feedback">
                                    @error('keterangan') {{ $message }} @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nomor_resi" class="form-label">
                                    <i class="ti ti-barcode me-1"></i>Nomor Resi
                                </label>
                                <input type="text" class="form-control @error('nomor_resi') is-invalid @enderror" id="nomor_resi" name="nomor_resi" placeholder="Masukkan nomor resi..." value="{{ old('nomor_resi') }}">
                                <div class="invalid-feedback">
                                    @error('nomor_resi') {{ $message }} @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tgl_dikirim" class="form-label">
                                    <i class="ti ti-calendar-event me-1"></i>Tanggal Dikirim
                                </label>
                                <input type="date" class="form-control @error('tgl_dikirim') is-invalid @enderror" id="tgl_dikirim" name="tgl_dikirim" value="{{ old('tgl_dikirim') }}">
                                <div class="invalid-feedback">
                                    @error('tgl_dikirim') {{ $message }} @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="tgl_expired" class="form-label">
                                    <i class="ti ti-clock-exclamation me-1"></i>Tanggal Expired Izin
                                </label>
                                <input type="date" class="form-control @error('tgl_expired') is-invalid @enderror" id="tgl_expired" name="tgl_expired" value="{{ old('tgl_expired') }}">
                                <div class="invalid-feedback">
                                    @error('tgl_expired') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-modern" data-bs-dismiss="modal">
                            <i class="ti ti-x me-1"></i>Batal
                        </button>
                        <button type="submit" class="btn btn-success btn-modern">
                            <i class="ti ti-send me-1"></i>Kirim Dokumen
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@section('extendscripts')
    <script>
        let modalTolak = document.getElementById('modalTolak')
        modalTolak.addEventListener('show.bs.modal', function (event) {
            let ossId = event.relatedTarget.getAttribute('data-bs')
            let routeReject = "{{ route('a.bhpnu.reject', ['bhpnu' => ':param']) }}".replace(':param', ossId);
            $("#modalTolak form").attr('action', routeReject);
        });

        let modalDikirim = document.getElementById('modalDikirim')
        modalDikirim.addEventListener('show.bs.modal', function (event) {
            let ossId = event.relatedTarget.getAttribute('data-bs')
            let routeAppear = "{{ route('a.bhpnu.appear', ['bhpnu' => ':param']) }}".replace(':param', ossId);
            $("#modalDikirim form").attr('action', routeAppear);
        });

    </script>
@endsection
