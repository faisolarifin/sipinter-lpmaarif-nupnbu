@section('modals')
    <!-- Modal -->
    <div class="modal fade" id="modalTolak" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tolak Permohonan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                <div class="modal-body pb-1">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="keterangan" class="form-label">Catatan Penolakan</label>
                        <input type="text" class="form-control form-control-sm @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" placeholder="Catatan penolakan" value="{{ old('keterangan') }}">
                        <div class="invalid-feedback">
                            @error('keterangan') {{ $message }} @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Tolak Permohonan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Dikirim -->
    <div class="modal fade" id="modalDikirim" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kirim Dokumen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body pb-1">
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control form-control-sm @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" placeholder="Keterangan" value="{{ old('keterangan') }}">
                            <div class="invalid-feedback">
                                @error('keterangan') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="nomor_resi" class="form-label">Nomor Resi</label>
                            <input type="text" class="form-control form-control-sm @error('nomor_resi') is-invalid @enderror" id="nomor_resi" name="nomor_resi" placeholder="Nomor Resi" value="{{ old('nomor_resi') }}">
                            <div class="invalid-feedback">
                                @error('nomor_resi') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="tgl_dikirim" class="form-label">Tanggal Dikirim</label>
                            <input type="date" class="form-control form-control-sm @error('tgl_dikirim') is-invalid @enderror" id="tgl_dikirim" name="tgl_dikirim" value="{{ old('tgl_dikirim') }}">
                            <div class="invalid-feedback">
                                @error('tgl_dikirim') {{ $message }} @enderror
                            </div>
                        </div>
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
                        <button type="submit" class="btn btn-success">Kirim</button>
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
