@section('modals')
    <!-- Modal -->
    <div class="modal fade" id="modalVNPSN" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tolak Permintaan VNPSN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                <div class="modal-body">
                    @csrf
                    @method('DELETE')
                    <div>
                        <label for="alasan" class="form-label">Alasan Penolakan</label>
                        <textarea class="form-control @error('alasan') is-invalid @enderror" id="alasan" name="alasan" rows="2" placeholder="masukkan alasan penolakan vnpsn"></textarea>
                        <div class="invalid-feedback">
                            @error('alasan') {{ $message }} @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Tolak Permintaan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->

@endsection


@section('extendscripts')
    <script>
        let modalVNPSN = document.getElementById('modalVNPSN')
        modalVNPSN.addEventListener('show.bs.modal', function (event) {
            let npsnId = event.relatedTarget.getAttribute('data-bs')
            let routeReject = "{{ route('a.vnpsn.reject', ['virtualNPSN' => ':param']) }}".replace(':param', npsnId);
            $("#modalVNPSN form").attr('action', routeReject);
        });

    </script>
@endsection
