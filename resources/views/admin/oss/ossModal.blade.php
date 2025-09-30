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
        margin-bottom: .7rem;
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

    /* Warning Modal Variant */
    .modal-warning .modal-header {
        background: #fefce8;
        border-bottom-color: #fde047;
    }

    .modal-warning .modal-title {
        color: #ca8a04;
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

    <!-- Modal Verifikasi -->
    <div class="modal fade modal-modern" id="modalVerifikasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="title-icon ti ti-clipboard-check"></i>
                        <span class="title-text">Verifikasi Permohonan</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="alert alert-info border-0" role="alert">
                            <i class="ti ti-info-circle"></i>
                            <span class="alert-text">Pastikan Anda telah memeriksa kelengkapan dokumen</span>
                        </div>
                        @include('admin.oss.form-modal')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-modern" data-bs-dismiss="modal">
                            <i class="ti ti-x me-1"></i>Batal
                        </button>
                        <button type="submit" class="btn btn-success btn-modern submit-btn">
                            <i class="ti ti-check me-1"></i><span class="submit-text">Submit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Terbitkan Izin -->
    <div class="modal fade modal-modern modal-warning" id="modalIzin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="ti ti-certificate"></i>
                        Terbitkan Izin OSS
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="alert alert-info border-0" role="alert">
                            <i class="ti ti-info-circle"></i>
                            Lengkapi informasi penerbitan izin OSS
                        </div>
                        @include('admin.oss.form-modal')
                        <div class="mb-3">
                            <label for="tgl_expired" class="form-label">
                                <i class="ti ti-clock-exclamation"></i>Tanggal Expired Izin
                            </label>
                            <input type="date" class="form-control @error('tgl_expired') is-invalid @enderror" id="tgl_expired" name="tgl_expired" value="{{ old('tgl_expired') }}" required>
                            <div class="invalid-feedback">
                                @error('tgl_expired') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-modern" data-bs-dismiss="modal">
                            <i class="ti ti-x me-1"></i>Batal
                        </button>
                        <button type="submit" class="btn btn-warning btn-modern">
                            <i class="ti ti-certificate me-1"></i>Terbitkan Izin
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@section('extendscripts')
    <script>
        let modalVerifikasi = document.getElementById('modalVerifikasi')
        modalVerifikasi.addEventListener('show.bs.modal', function (event) {
            let ossId = event.relatedTarget.getAttribute('data-bs')
            let ossState = event.relatedTarget.getAttribute('data-st')
            let route;

            // Reset classes
            $('#modalVerifikasi').removeClass('modal-danger modal-success').addClass('modal-modern');
            $('#modalVerifikasi .submit-btn').removeClass('btn-danger btn-success');

            if (ossState.toLocaleLowerCase() === "tolak") {
                route = "{{ route('a.oss.reject', ['oss' => ':param']) }}".replace(':param', ossId);
                $('#modalVerifikasi').addClass('modal-danger');
                $('#modalVerifikasi .title-text').text('Tolak Permohonan OSS');
                $('#modalVerifikasi .title-icon').removeClass().addClass('ti ti-alert-circle');
                $('#modalVerifikasi .alert-text').text('Pastikan Anda memberikan alasan penolakan yang jelas');
                $('#modalVerifikasi .alert').removeClass('alert-info').addClass('alert-warning');
                $('#modalVerifikasi .submit-btn').addClass('btn-danger');
                $('#modalVerifikasi .submit-text').text('Tolak Permohonan');
            } else if (ossState.toLocaleLowerCase() == "terima") {
                route = "{{ route('a.oss.acc', ['oss' => ':param']) }}".replace(':param', ossId);
                $('#modalVerifikasi').addClass('modal-success');
                $('#modalVerifikasi .title-text').text('Terima Permohonan OSS');
                $('#modalVerifikasi .title-icon').removeClass().addClass('ti ti-check-circle');
                $('#modalVerifikasi .alert-text').text('Pastikan Anda telah memeriksa kelengkapan dokumen');
                $('#modalVerifikasi .alert').removeClass('alert-warning').addClass('alert-info');
                $('#modalVerifikasi .submit-btn').addClass('btn-success');
                $('#modalVerifikasi .submit-text').text('Terima Permohonan');
            }
            $("#modalVerifikasi form").attr('action', route);
        });

        let modalIzin = document.getElementById('modalIzin')
        modalIzin.addEventListener('show.bs.modal', function (event) {
            let ossId = event.relatedTarget.getAttribute('data-bs')
            let routeAppear = "{{ route('a.oss.appear', ['oss' => ':param']) }}".replace(':param', ossId);
            $("#modalIzin form").attr('action', routeAppear);
        });

        // Reset modal on close
        $('#modalVerifikasi').on('hidden.bs.modal', function () {
            $(this).find('form')[0].reset();
            $('#modalVerifikasi').removeClass('modal-danger modal-success');
            $('#modalVerifikasi .title-icon').removeClass().addClass('ti ti-clipboard-check');
            $('#modalVerifikasi .alert').removeClass('alert-warning').addClass('alert-info');
        });

        $('#modalIzin').on('hidden.bs.modal', function () {
            $(this).find('form')[0].reset();
        });
    </script>
@endsection
