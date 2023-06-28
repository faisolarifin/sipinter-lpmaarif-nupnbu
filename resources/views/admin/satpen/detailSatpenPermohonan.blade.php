@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/timeline.css') }}" />
@endsection

@section('modals')
    <!-- Modal -->
    <div class="modal fade" id="modalDetailBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content rounded-2">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title mb-0" id="exampleModalLabel">Detail Satpen</h5>
                        <small>data permohonan satpen baru</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-detail">
                    ...
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalRevisi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Revisi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="keterangan" class="form-label">Catatan Revisi</label>
                        <input type="hidden" name="status_verifikasi" value="revisi">
                        <input type="text" class="form-control form-control-sm @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{ old('keterangan') }}">
                        <div class="invalid-feedback">
                            @error('keterangan') {{ $message }} @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Kirim Revisi</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Proses Dokumen -->
    <div class="modal fade" id="modalProsesDokumenBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content rounded-2">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title mb-0" id="exampleModalLabel">Detail Satpen</h5>
                        <small>buatkan dokumen untuk satpen</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-detail-dokumen">
                    ...
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

@endsection

@section('extendscripts')
    <script>
        let modalDetailBackdrop = document.getElementById('modalDetailBackdrop')
        modalDetailBackdrop.addEventListener('show.bs.modal', function (event) {
            let satpenId = event.relatedTarget.getAttribute('data-bs')
            let routeUrl = "{{ route('api.satpenbyid', ['satpenId' => ':param']) }}";
            let routeChangeStatus = "{{ route('a.satpen.changestatus', ['satpen' => ':param']) }}";
            let completeUrl = routeUrl.replace(':param', satpenId);
            let completeRouteChangeStatus = routeChangeStatus.replace(':param', satpenId);

            $.ajax({
                url: completeUrl,
                type: "GET",
                dataType: 'json',
                success: function(res) {
                    detailTag = `<div class="row mt-3 container-begin">`;
                    detailTag += createTableDetail(res);
                    detailTag += `<div class="col d-flex flex-column justify-content-between">`;
                    detailTag += createTimeline(res);
                    detailTag += `<div class="text-center">
                                    <form class="d-inline" action="${completeRouteChangeStatus}"
                                                        method="post">
                                    @csrf
                                    @METHOD('PUT')
                                    <input type="hidden" name="status_verifikasi" value="proses dokumen">
                                    <button type="submit" class="btn btn-success mx-1"><i class="ti ti-checkup-list"></i> Setujui
                                        </button>
                                    </form>
                                    <button class="btn btn-danger mx-1" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalRevisi" data-bs="${res.id_satpen}"><i class="ti ti-x"></i> Revisi</button>
                                    </div>
                                </div>
                            </div>`;

                    $("#modal-detail").html(detailTag);

                }
            });
        });


        let modalRevisi = document.getElementById('modalRevisi')
        modalRevisi.addEventListener('show.bs.modal', function (event) {
            let satpenId = event.relatedTarget.getAttribute('data-bs')
            let routeChangeStatus = "{{ route('a.satpen.changestatus', ['satpen' => ':param']) }}";
            let completeRouteChangeStatus = routeChangeStatus.replace(':param', satpenId);
            $("#modalRevisi form").attr('action', completeRouteChangeStatus);
        });

        let modalProsesDokumenBackdrop = document.getElementById('modalProsesDokumenBackdrop')
        modalProsesDokumenBackdrop.addEventListener('show.bs.modal', function (event) {
            let satpenId = event.relatedTarget.getAttribute('data-bs')
            let routeUrl = "{{ route('api.satpenbyid', ['satpenId' => ':param']) }}";
            let completeUrl = routeUrl.replace(':param', satpenId);

            $.ajax({
                url: completeUrl,
                type: "GET",
                dataType: 'json',
                success: function(res) {
                    detailTag = `<div class="row mt-3 container-begin">`;
                    detailTag += createTableDetail(res);
                    detailTag += `<div class="col d-flex flex-column justify-content-between">`;
                    detailTag += createTimeline(res);
                    detailTag += `<div class="text-center">
                                       <a href="{{route('export.piagam')}}"><button class="btn btn-warning mx-1">
                                       <i class="ti ti-printer"></i> Generate Piagam</button></a>
                                       <button class="btn btn-primary mx-1" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs="${res.id_satpen}"><i class="ti ti-printer"></i> Generate Surat Keputusan</button>
                                    </div>
                                </div>
                            </div>`;

                    $("#modal-detail-dokumen").html(detailTag);

                }
            });
        });

        function createTableDetail(res) {
            return `<div class="col">
                        <table>
                        <tbody>
                        <tr>
                            <td width="140">NPSN</td>
                            <td width="50">:</td>
                            <td>${res.npsn}</td>
                        </tr>
                        <tr>
                            <td>Nama Satpen</td>
                            <td>:</td>
                            <td>${res.nm_satpen}</td>
                        </tr>
                        <tr>
                            <td>No. Registrasi</td>
                            <td>:</td>
                            <td>${res.no_registrasi}</td>
                        </tr>
                        <tr>
                            <td>Kategori Satpen</td>
                            <td>:</td>
                            <td>${res.kategori.nm_kategori}</td>
                        </tr>
                        <tr>
                            <td>Yayasan</td>
                            <td>:</td>
                            <td>${res.yayasan}</td>
                        </tr>
                        <tr>
                            <td>Kepala Sekolah</td>
                            <td>:</td>
                            <td>${res.kepsek}</td>
                        </tr>
                        <tr>
                            <td>Tahun Berdiri</td>
                            <td>:</td>
                            <td>${res.thn_berdiri}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>${res.email}</td>
                        </tr>
                        <tr>
                            <td>Telpon</td>
                            <td>:</td>
                            <td>${res.telpon}</td>
                        </tr>
                        <tr>
                            <td>Fax</td>
                            <td>:</td>
                            <td>${res.fax}</td>
                        </tr>
                        <tr>
                            <td>Provinsi</td>
                            <td>:</td>
                            <td>${res.provinsi.nm_prov}</td>
                        </tr>
                        <tr>
                            <td>Kabupaten</td>
                            <td>:</td>
                            <td>${res.kabupaten.nama_kab}</td>
                        </tr>
                        <tr>
                            <td>Kecamatan</td>
                            <td>:</td>
                            <td>${res.kecamatan}</td>
                        </tr>
                        <tr>
                            <td>Kelurahan/Desa</td>
                            <td>:</td>
                            <td>${res.kelurahan}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>${res.alamat}</td>
                        </tr>
                        <tr>
                            <td>Aset Tanah</td>
                            <td>:</td>
                            <td>${res.aset_tanah}</td>
                        </tr>
                        <tr>
                            <td>Nama Pemilik</td>
                            <td>:</td>
                            <td>${res.nm_pemilik}</td>
                        </tr>
                        </tbody>
                    </table>
                  </div>`;
        }

        function createTimeline(res) {
            timelineTag = `<ul class="timeline">`;
            $.each(res.timeline, function(key, row) {
                timelineTag +=
                    `<li>
                        <a href="#" class="text-capitalize">${row.status_verifikasi}</a>
                        <small class="float-end">${row.keterangan}</small>
                        <p>${row.tgl_status}</p>
                    </li>`;
            });
            timelineTag += `</ul>`;

            return timelineTag;
        }

    </script>
@endsection
