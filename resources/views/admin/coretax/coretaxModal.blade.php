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
    <div class="modal fade" id="modalAppear" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Final Aprove</h5>
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
                            <label for="nitku" class="form-label">NITKU</label>
                            <input type="text" class="form-control form-control-sm @error('nitku') is-invalid @enderror" id="nitku" name="nitku" placeholder="NITKU" value="{{ old('nitku') }}">
                            <div class="invalid-feedback">
                                @error('nitku') {{ $message }} @enderror
                            </div>
                        </div>
                        <div>
                            <label for="tgl_expiry" class="form-label">Tanggal Expiry</label>
                            <input type="date" class="form-control form-control-sm @error('tgl_expiry') is-invalid @enderror" id="tgl_expiry" name="tgl_expiry" value="{{ old('tgl_expiry') }}" required>
                            <div class="invalid-feedback">
                                @error('tgl_expiry') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">
                            <i class="ti ti-device-floppy"></i> Approve</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalDetailBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content rounded-2">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title mb-0" id="exampleModalLabel">Pengajuan Coretax</h5>
                        <small>detail permohonan pengajuan coretax</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-detail">
                    
                </div>
                <div class="modal-footer">
    
                </div>
            </div>
        </div>
    </div>

@endsection


@section('extendscripts')
    <script>
        let modalTolak = document.getElementById('modalTolak')
        modalTolak.addEventListener('show.bs.modal', function (event) {
            let coretaxId = event.relatedTarget.getAttribute('data-bs')
            let routeReject = "{{ route('a.coretax.reject', ['coretax' => ':param']) }}".replace(':param', coretaxId);
            $("#modalTolak form").attr('action', routeReject);
        });

        let modalAppear = document.getElementById('modalAppear')
        modalAppear.addEventListener('show.bs.modal', function (event) {
            let coretaxId = event.relatedTarget.getAttribute('data-bs')
            let routeAppear = "{{ route('a.coretax.appear', ['coretax' => ':param']) }}".replace(':param', coretaxId);
            $("#modalAppear form").attr('action', routeAppear);
        });


        let modalDetailBackdrop = document.getElementById('modalDetailBackdrop')
        modalDetailBackdrop.addEventListener('show.bs.modal', function (event) {
            let coretaxId = event.relatedTarget.getAttribute('data-bs')
            let routeUrl = "{{ route('a.coretax.byid', ['coretaxId' => ':param']) }}".replace(':param', coretaxId);

            $.ajax({
                url: routeUrl,
                type: "GET",
                dataType: 'json',
                success: function(res) {
                    let modalDetail = `<div class="row">
                        <div class="col col-sm-6" style="overflow-x:auto;">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>`;
                                    
                                    if (res?.satpen) {
                                        modalDetail += `<tr>
                                            <td width="230"><strong>Nama Sekolah/Madrasah</strong></td>
                                            <td>:</td>
                                            <td>${res?.satpen.nm_satpen}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor Registrasi Ma'arif NU</strong></td>
                                            <td>:</td>
                                            <td>${res?.satpen.no_registrasi}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Provinsi</strong></td>
                                            <td>:</td>
                                            <td>${res?.satpen?.provinsi.nm_prov}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kabupaten</strong></td>
                                            <td>:</td>
                                            <td>${res?.satpen?.kabupaten.nama_kab}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kecamatan</strong></td>
                                            <td>:</td>
                                            <td>${res?.satpen.kecamatan}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kelurahan</strong></td>
                                            <td>:</td>
                                            <td>${res?.satpen.kelurahan}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Alamat</strong></td>
                                            <td>:</td>
                                            <td>${res?.satpen.alamat}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kepala Sekolah</strong></td>
                                            <td>:</td>
                                            <td>${res?.satpen.kepsek}</td>
                                        </tr>`;
                                    
                                    } else if (res?.cabang) {
                                        modalDetail += `<tr>
                                            <td width="230"><strong>Nama Cabang</strong></td>
                                            <td>:</td>
                                            <td>${res?.cabang.nama_pc}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Provinsi</strong></td>
                                            <td>:</td>
                                            <td>${res?.cabang?.prov.nm_prov}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kabupaten</strong></td>
                                            <td>:</td>
                                            <td>${res?.cabang?.profile.kabupaten}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kecamatan</strong></td>
                                            <td>:</td>
                                            <td>${res?.cabang?.profile.kecamatan}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kelurahan</strong></td>
                                            <td>:</td>
                                            <td>${res?.cabang?.profile.kelurahan}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Alamat</strong></td>
                                            <td>:</td>
                                            <td>${res?.cabang?.profile.alamat}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Ketua</strong></td>
                                            <td>:</td>
                                            <td>${res?.cabang?.profile.ketua}</td>
                                        </tr>`;

                                    } else if (res?.wilayah) {
                                        modalDetail += `<tr>
                                            <td width="230"><strong>Nama Wilayah</strong></td>
                                            <td>:</td>
                                            <td>Wilayah ${res?.wilayah.nm_prov}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Provinsi</strong></td>
                                            <td>:</td>
                                            <td>${res?.wilayah.nm_prov}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kabupaten</strong></td>
                                            <td>:</td>
                                            <td>${res?.wilayah?.profile.kabupaten}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kecamatan</strong></td>
                                            <td>:</td>
                                            <td>${res?.wilayah?.profile.kecamatan}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kelurahan</strong></td>
                                            <td>:</td>
                                            <td>${res?.wilayah?.profile.kelurahan}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Alamat</strong></td>
                                            <td>:</td>
                                            <td>${res?.wilayah?.profile.alamat}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Ketua</strong></td>
                                            <td>:</td>
                                            <td>${res?.wilayah?.profile.ketua}</td>
                                        </tr>`;
                                    }
                                    
                                    modalDetail += `</tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col col-sm-6" style="overflow-x:auto;">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td width="190"><strong>NITKU/NPWP</strong></td>
                                        <td>:</td>
                                        <td>${res?.nitku ?? ''}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Nama PIC</strong></td>
                                        <td>:</td>
                                        <td>${res?.nama_pic}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>NIK PIC</strong></td>
                                        <td>:</td>
                                        <td>${res?.nik_pic}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Nomor Whatsapp PIC</strong></td>
                                        <td>:</td>
                                        <td>${res?.whatsapp_pic}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tanggal Permohonan</strong></td>
                                        <td>:</td>
                                        <td>${(res?.tgl_submit ?? '').split("-").reverse().join("-")}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tanggal Disetujui</strong></td>
                                        <td>:</td>
                                        <td>${(res?.tgl_acc ?? '').split("-").reverse().join("-")}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tanggal Expiry</strong></td>
                                        <td>:</td>
                                        <td>${(res?.tgl_expiry ?? '').split("-").reverse().join("-")}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Catatan</strong></td>
                                        <td>:</td>
                                        <td>${res?.corestatus.find((item) => item.statusType === res.status)?.keterangan ?? ''}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>`;

                    $("#modal-detail").html(modalDetail);

                }
            });
        });

    </script>
@endsection
