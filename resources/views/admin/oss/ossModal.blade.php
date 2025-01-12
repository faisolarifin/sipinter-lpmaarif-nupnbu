@section('modals')

    <!-- Modal -->
    <div class="modal fade" id="modalVerifikasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body pb-1">
                        @csrf
                        @method('PUT')
                        @include('admin.oss.form-modal')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Izin -->
    <div class="modal fade" id="modalIzin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Terbitkan Izin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body pb-1">
                        @csrf
                        @method('PUT')
                        @include('admin.oss.form-modal')
                        <div>
                            <label for="tgl_expired" class="form-label">Tanggal Expired Izin</label>
                            <input type="date" class="form-control form-control-sm @error('tgl_expired') is-invalid @enderror" id="tgl_expired" name="tgl_expired" value="{{ old('tgl_expired') }}">
                            <div class="invalid-feedback">
                                @error('tgl_expired') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Terbitkan</button>
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
            if (ossState.toLocaleLowerCase() === "tolak") {
                route = "{{ route('a.oss.reject', ['oss' => ':param']) }}".replace(':param', ossId);
                $('#modalVerifikasi .modal-title').text('Tolak Permohonan');
                $('#modalVerifikasi button[type=submit]').addClass('btn-danger').text('Tolak Permohonan');
            } else if (ossState.toLocaleLowerCase() == "terima") {
                route = "{{ route('a.oss.acc', ['oss' => ':param']) }}".replace(':param', ossId);
                $('#modalVerifikasi .modal-title').text('Terima Permohonan');
                $('#modalVerifikasi button[type=submit]').addClass('btn-success').text('Terima Permohonan');
            }
            $("#modalVerifikasi form").attr('action', route);
        });

        let modalIzin = document.getElementById('modalIzin')
        modalIzin.addEventListener('show.bs.modal', function (event) {
            let ossId = event.relatedTarget.getAttribute('data-bs')
            let routeAppear = "{{ route('a.oss.appear', ['oss' => ':param']) }}".replace(':param', ossId);
            $("#modalIzin form").attr('action', routeAppear);
        });

    </script>
@endsection
