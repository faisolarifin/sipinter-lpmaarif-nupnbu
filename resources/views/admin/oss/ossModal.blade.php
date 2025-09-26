@section('modals')

<style>
    /* Modern Modal Styling */
    .modern-modal .modal-dialog {
        margin: 1.75rem auto;
        max-width: 600px;
    }

    .modern-modal .modal-content {
        border: none;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        overflow: hidden;
        backdrop-filter: blur(10px);
    }

    .modern-modal .modal-header {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        border-bottom: 1px solid rgba(0, 0, 0, 0.06);
        padding: 24px 32px;
        position: relative;
    }

    .modern-modal .modal-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #ffc107 0%, #ffb300 50%, #ffc107 100%);
    }

    .modern-modal .modal-title {
        font-weight: 700;
        font-size: 1.25rem;
        color: #1e293b;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .modern-modal .modal-icon {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        background: linear-gradient(135deg, #ffc107 0%, #ffb300 100%);
        color: #212529;
    }

    .modern-modal .btn-close {
        background: none;
        border: none;
        font-size: 1.2rem;
        opacity: 0.6;
        transition: all 0.2s ease;
        padding: 8px;
        border-radius: 8px;
    }

    .modern-modal .btn-close:hover {
        opacity: 1;
        background: rgba(0, 0, 0, 0.05);
        transform: scale(1.1);
    }

    .modern-modal .modal-body {
        padding: 32px;
        background: #ffffff;
    }

    .modern-modal .form-group {
        margin-bottom: 24px;
    }

    .modern-modal .form-label {
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .modern-modal .form-label i {
        font-size: 16px;
        color: #6b7280;
    }

    .modern-modal .form-control {
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        padding: 12px 16px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: #f9fafb;
    }

    .modern-modal .form-control:focus {
        border-color: #ffc107;
        box-shadow: 0 0 0 3px rgba(255, 193, 7, 0.1);
        background: #ffffff;
        outline: none;
    }

    .modern-modal .form-control.is-invalid {
        border-color: #ef4444;
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
    }

    .modern-modal .invalid-feedback {
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 6px;
        font-weight: 500;
    }

    .modern-modal .modal-footer {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-top: 1px solid rgba(0, 0, 0, 0.06);
        padding: 20px 32px;
        display: flex;
        gap: 12px;
        justify-content: flex-end;
    }

    .modern-modal .btn {
        padding: 12px 24px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.25s ease;
        border: none;
        position: relative;
        overflow: hidden;
    }

    .modern-modal .btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: all 0.3s ease;
    }

    .modern-modal .btn:hover::before {
        width: 100%;
        height: 100%;
    }

    .modern-modal .btn-secondary {
        background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(107, 114, 128, 0.3);
    }

    .modern-modal .btn-secondary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(107, 114, 128, 0.4);
        color: white;
    }

    .modern-modal .btn-success {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    }

    .modern-modal .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
        color: white;
    }

    .modern-modal .btn-danger {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    }

    .modern-modal .btn-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
        color: white;
    }

    .modern-modal .btn-warning {
        background: linear-gradient(135deg, #ffc107 0%, #ffb300 100%);
        color: #212529;
        box-shadow: 0 4px 12px rgba(255, 193, 7, 0.3);
    }

    .modern-modal .btn-warning:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(255, 193, 7, 0.4);
        color: #212529;
    }

    /* Animation */
    .modern-modal.fade .modal-dialog {
        transform: translate(0, -50px) scale(0.95);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .modern-modal.show .modal-dialog {
        transform: translate(0, 0) scale(1);
    }

    /* Responsive */
    @media (max-width: 576px) {
        .modern-modal .modal-dialog {
            margin: 1rem;
            max-width: none;
        }

        .modern-modal .modal-header,
        .modern-modal .modal-body,
        .modern-modal .modal-footer {
            padding: 20px;
        }

        .modern-modal .btn {
            padding: 10px 20px;
            font-size: 0.85rem;
        }
    }
</style>

    <!-- Modern Modal Verifikasi -->
    <div class="modal fade modern-modal" id="modalVerifikasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <span class="modal-icon">
                            <i class="ti ti-clipboard-check"></i>
                        </span>
                        <span class="title-text"></span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        @include('admin.oss.form-modal')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="ti ti-x"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="ti ti-check"></i> <span class="submit-text">Submit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modern Modal Izin -->
    <div class="modal fade modern-modal" id="modalIzin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <span class="modal-icon">
                            <i class="ti ti-certificate"></i>
                        </span>
                        <span>Terbitkan Izin OSS</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        @include('admin.oss.form-modal')
                        <div class="form-group">
                            <label for="tgl_expired" class="form-label">
                                <i class="ti ti-calendar-event"></i>
                                Tanggal Expired Izin
                            </label>
                            <input type="date" class="form-control @error('tgl_expired') is-invalid @enderror" id="tgl_expired" name="tgl_expired" value="{{ old('tgl_expired') }}" required>
                            <div class="invalid-feedback">
                                @error('tgl_expired') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="ti ti-x"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-warning">
                            <i class="ti ti-certificate"></i> Terbitkan Izin
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
            $('#modalVerifikasi button[type=submit]').removeClass('btn-danger btn-success');

            if (ossState.toLocaleLowerCase() === "tolak") {
                route = "{{ route('a.oss.reject', ['oss' => ':param']) }}".replace(':param', ossId);
                $('#modalVerifikasi .title-text').text('Tolak Permohonan OSS');
                $('#modalVerifikasi .modal-icon i').removeClass().addClass('ti ti-x-circle');
                $('#modalVerifikasi .modal-icon').css('background', 'linear-gradient(135deg, #ef4444 0%, #dc2626 100%)').css('color', 'white');
                $('#modalVerifikasi button[type=submit]').addClass('btn-danger');
                $('#modalVerifikasi .submit-text').text('Tolak Permohonan');
            } else if (ossState.toLocaleLowerCase() == "terima") {
                route = "{{ route('a.oss.acc', ['oss' => ':param']) }}".replace(':param', ossId);
                $('#modalVerifikasi .title-text').text('Terima Permohonan OSS');
                $('#modalVerifikasi .modal-icon i').removeClass().addClass('ti ti-check-circle');
                $('#modalVerifikasi .modal-icon').css('background', 'linear-gradient(135deg, #10b981 0%, #059669 100%)').css('color', 'white');
                $('#modalVerifikasi button[type=submit]').addClass('btn-success');
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
            // Reset form
            $(this).find('form')[0].reset();
            // Reset icon and styling
            $('#modalVerifikasi .modal-icon i').removeClass().addClass('ti ti-clipboard-check');
            $('#modalVerifikasi .modal-icon').css('background', 'linear-gradient(135deg, #ffc107 0%, #ffb300 100%)').css('color', '#212529');
        });

        $('#modalIzin').on('hidden.bs.modal', function () {
            // Reset form
            $(this).find('form')[0].reset();
        });
    </script>
@endsection
