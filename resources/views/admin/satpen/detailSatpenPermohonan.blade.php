@section('modal-style')
    <link rel="stylesheet" href="{{ asset('assets/css/timeline.css') }}" />
    <style>
        /* Modern Modal Styling */
        .modal-content {
            border-radius: 16px !important;
            border: 1px solid rgba(0, 0, 0, 0.08) !important;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15) !important;
        }

        .modal-header {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%) !important;
            border-bottom: 2px solid #e5e7eb !important;
            padding: 24px 32px !important;
            border-radius: 16px 16px 0 0 !important;
        }

        .modal-header .modal-title {
            color: #1e293b;
            font-weight: 700;
            font-size: 1.35rem;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .modal-header .modal-title::before {
            content: '';
            width: 4px;
            height: 28px;
            background: linear-gradient(180deg, #3b82f6 0%, #2563eb 100%);
            border-radius: 2px;
        }

        .modal-header small {
            color: #64748b;
            font-size: 0.875rem;
            font-weight: 500;
            margin-left: 16px;
        }

        .modal-body {
            padding: 32px !important;
            background: #ffffff;
        }

        .modal-footer {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%) !important;
            border-top: 2px solid #e5e7eb !important;
            padding: 20px 32px !important;
            border-radius: 0 0 16px 16px !important;
        }

        /* Modern Detail Table */
        .detail-table {
            background: #ffffff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .detail-table table {
            width: 100%;
            font-size: 0.9rem;
        }

        .detail-table table th {
            color: #64748b;
            font-weight: 600;
            padding: 10px 0;
            font-size: 0.875rem;
        }

        .detail-table table td {
            color: #1e293b;
            font-weight: 500;
            padding: 10px 0;
        }

        .detail-table table tr {
            border-bottom: 1px solid rgba(0, 0, 0, 0.03);
        }

        .detail-table table tr:last-child {
            border-bottom: none;
        }

        /* Modern Card Box Detail */
        .card-box-detail {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border-radius: 12px;
            border: 1px solid rgba(0, 0, 0, 0.06);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .card-box-detail::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(180deg, #3b82f6 0%, #2563eb 100%);
        }

        .card-box-detail:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        }

        .card-box-detail h6 {
            color: #1e293b;
            font-weight: 700;
            font-size: 1rem;
            margin-bottom: 8px;
        }

        .card-box-detail p {
            color: #64748b;
            font-size: 0.875rem;
            margin-bottom: 4px;
        }

        .card-box-detail small {
            color: #94a3b8;
            font-size: 0.813rem;
        }

        .card-box-detail .badge {
            padding: 6px 14px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.75rem;
        }

        /* Modern Buttons */
        .btn-modern {
            border-radius: 10px;
            padding: 10px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-modern-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
        }

        .btn-modern-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
            color: white;
        }

        .btn-modern-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
        }

        .btn-modern-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(239, 68, 68, 0.3);
            color: white;
        }

        .btn-modern-warning {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white;
        }

        .btn-modern-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
            color: white;
        }

        .btn-modern-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
        }

        .btn-modern-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
            color: white;
        }

        .btn-generate-padding {
            padding: 8px 20px;
        }

        /* Section Headers */
        .section-header {
            color: #1e293b;
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 16px;
            padding-bottom: 12px;
            border-bottom: 2px solid #e5e7eb;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-header::before {
            content: '';
            width: 4px;
            height: 24px;
            background: linear-gradient(180deg, #3b82f6 0%, #2563eb 100%);
            border-radius: 2px;
        }

        /* Form Control Modern */
        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-label {
            color: #64748b;
            font-weight: 600;
            font-size: 0.875rem;
        }

        /* Timeline Enhancement */
        .timeline {
            background: #ffffff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        /* Loading State */
        .modal-body-loading {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 200px;
            color: #64748b;
        }
    </style>
@endsection

@section('modals')
    <!-- Modal Detail Permohonan -->
    <div class="modal fade" id="modalDetailBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content rounded-2">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title mb-0" id="exampleModalLabel">Detail Satuan Pendidikan</h5>
                        <small>Informasi lengkap permohonan registrasi satuan pendidikan baru</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-detail">
                    <div class="modal-body-loading">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Revisi -->
    <div class="modal fade" id="modalRevisi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Catatan Perbaikan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="keterangan" class="form-label">Catatan Perbaikan</label>
                        <input type="hidden" name="status_verifikasi" value="revisi">
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" placeholder="Berikan catatan detail mengenai hal yang perlu diperbaiki..." id="keterangan" name="keterangan" rows="4">{{ old('keterangan') }}</textarea>
                        <div class="invalid-feedback">
                            @error('keterangan') {{ $message }} @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-modern-danger">
                        <i class="ti ti-x"></i> Kirim Catatan Perbaikan
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Revisi Extensif -->
    <div class="modal fade" id="modalRevisiExtensif" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tolak Perpanjangan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="keterangan" class="form-label">Alasan Penolakan</label>
                            <input type="hidden" name="status_verifikasi" value="expired">
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" placeholder="Berikan alasan penolakan perpanjangan..." id="keterangan" name="keterangan" rows="4">{{ old('keterangan') }}</textarea>
                            <div class="invalid-feedback">
                                @error('keterangan') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-modern-danger">
                            <i class="ti ti-x"></i> Tolak Perpanjangan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Revisi Backdrop -->
    <div class="modal fade" id="modalRevisiBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content rounded-2">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title mb-0" id="exampleModalLabel">Detail Satuan Pendidikan</h5>
                        <small>Satuan pendidikan dalam tahap revisi dan perbaikan dokumen</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-detail-revisi">
                    <div class="modal-body-loading">
                        <div class="spinner-border text-warning" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Proses Dokumen -->
    <div class="modal fade" id="modalProsesDokumenBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content rounded-2">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title mb-0" id="exampleModalLabel">Detail Satuan Pendidikan</h5>
                        <small>Generate dokumen registrasi resmi untuk satuan pendidikan</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-detail-dokumen">
                    <div class="modal-body-loading">
                        <div class="spinner-border text-success" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Perpanjangan -->
    <div class="modal fade" id="modalPerpanjangBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content rounded-2">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title mb-0" id="exampleModalLabel">Detail Satuan Pendidikan</h5>
                        <small>Perpanjangan masa berlaku dokumen registrasi satuan pendidikan</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-detail-perpanjang">
                    <div class="modal-body-loading">
                        <div class="spinner-border text-info" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

@endsection

@section('modalscripts')
    <script>
        let modalDetailBackdrop = document.getElementById('modalDetailBackdrop')
        modalDetailBackdrop.addEventListener('show.bs.modal', function (event) {
            let satpenId = event.relatedTarget.getAttribute('data-bs')
            let routeGetData = "{{ route('api.satpenbyid', ['satpenId' => ':param']) }}".replace(':param', satpenId);
            let routeChangeStatus = "{{ route('a.satpen.changestatus', ['satpen' => ':param']) }}".replace(':param', satpenId);

            $.ajax({
                url: routeGetData,
                type: "GET",
                dataType: 'json',
                success: function(res) {
                    detailTag = `<div class="row mt-3 container-begin">`;
                    detailTag += createTableDetail(res);
                    detailTag += `<div class="col-sm-7 d-flex flex-column justify-content-between">`;
                    detailTag += `<div class="row">`;
                    detailTag += createTableFiles(res);
                    detailTag += createTimeline(res);
                    detailTag += `</div>`;
                    detailTag += `<div class="row"> <div class="col px-2 py-2 text-end">`;
                    detailTag += `<div class="text-center d-flex justify-content-end align-items-end gap-2">
                                    <form class="d-inline" action="${routeChangeStatus}"
                                                        method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status_verifikasi" value="proses dokumen">
                                    <button type="submit" class="btn btn-modern-success"><i class="ti ti-check"></i> Terima Permohonan
                                        </button>
                                    </form>
                                    <button class="btn btn-modern-danger" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalRevisi" data-bs="${res.id_satpen}"><i class="ti ti-x"></i> Perlu Perbaikan</button>
                                    </div>`;
                    detailTag += `</div> </div>
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

        let modalRevisiBackdrop = document.getElementById('modalRevisiBackdrop')
        modalRevisiBackdrop.addEventListener('show.bs.modal', function (event) {
            let satpenId = event.relatedTarget.getAttribute('data-bs')
            let routeUrl = "{{ route('api.satpenbyid', ['satpenId' => ':param']) }}".replace(':param', satpenId);
            let routeChangeStatus = "{{ route('a.satpen.changestatus', ['satpen' => ':param']) }}".replace(':param', satpenId);
            let routeSendNotif = "{{ route('email.notif', ['satpen' => ':param']) }}".replace(':param', satpenId);

            $.ajax({
                url: routeUrl,
                type: "GET",
                dataType: 'json',
                success: function(res) {
                    detailTag = `<div class="row mt-3 container-begin">`;
                    detailTag += createTableDetail(res);
                    detailTag += `<div class="col-sm-7 d-flex flex-column justify-content-between">`;
                    detailTag += `<div class="row">`;
                    detailTag += createTableFiles(res);
                    detailTag += createTimeline(res);
                    detailTag += `</div>`;
                    detailTag += `<div class="row"> <div class="col px-2 py-2 text-end">`;
                    detailTag += `<div class="d-flex justify-content-end gap-2">
                                        <a href="${routeSendNotif}"><button type="submit" class="btn btn-modern-warning"><i class="ti ti-mail"></i> Kirim Email Notifikasi
                                            </button></a>
                                        <form class="d-inline" action="${routeChangeStatus}"
                                            method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status_verifikasi" value="proses dokumen">
                                        <button type="submit" class="btn btn-modern-success"><i class="ti ti-check"></i> Terima
                                            </button>
                                        </form>

                                      </div>`;
                    detailTag += `</div> </div>
                                </div>
                            </div>`;

                    $("#modal-detail-revisi").html(detailTag);

                }
            });
        });

        let modalProsesDokumenBackdrop = document.getElementById('modalProsesDokumenBackdrop')
        modalProsesDokumenBackdrop.addEventListener('show.bs.modal', function (event) {
            let satpenId = event.relatedTarget.getAttribute('data-bs')
            let routeUrl = "{{ route('api.satpenbyid', ['satpenId' => ':param']) }}".replace(':param', satpenId);

            $.ajax({
                url: routeUrl,
                type: "GET",
                dataType: 'json',
                success: function(res) {
                    detailTag = `<div class="row mt-3 container-begin">`;
                    detailTag += createTableDetail(res);
                    detailTag += `<div class="col-sm-7 d-flex flex-column justify-content-between">`;
                    detailTag += `<div class="row">`;
                    detailTag += createTableFiles(res);
                    detailTag += createTimeline(res);
                    detailTag += `</div>`;
                    detailTag += `<div class="row"> <div class="col px-2 py-2 text-end">`;
                    detailTag += `<div class="d-flex justify-content-end align-items-end">
                                       <form class="d-flex justify-content-end align-items-end gap-2" action="{{route('generate.document')}}"
                                        method="post">
                                        @csrf
                                        <div>
                                            <label class="form-label mb-1">Tanggal Dokumen</label>
                                            <input type="hidden" name="satpenid" value="${satpenId}">
                                            <input type="date" name="tgl_doc" class="form-control form-control-sm" required>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-modern-primary btn-generate-padding"><i class="ti ti-printer"></i> Generate Dokumen</button>
                                        </div>
                                        </form>
                                  </div>`;
                    detailTag += `</div> </div>
                                </div>
                            </div>`;

                    $("#modal-detail-dokumen").html(detailTag);

                }
            });
        });

        let modalRevisiExtend = document.getElementById('modalRevisiExtensif')
        modalRevisiExtend.addEventListener('show.bs.modal', function (event) {
            let satpenId = event.relatedTarget.getAttribute('data-bs')
            let routeChangeStatus = "{{ route('a.satpen.changestatus', ['satpen' => ':param']) }}";
            let completeRouteChangeStatus = routeChangeStatus.replace(':param', satpenId);
            console.log(completeRouteChangeStatus);
            $("#modalRevisiExtensif form").attr('action', completeRouteChangeStatus);
        });

        let modalPerpanjangBackdrop = document.getElementById('modalPerpanjangBackdrop')
            modalPerpanjangBackdrop.addEventListener('show.bs.modal', function (event) {
            let satpenId = event.relatedTarget.getAttribute('data-bs')
            let routeUrl = "{{ route('api.satpenbyid', ['satpenId' => ':param']) }}".replace(':param', satpenId);

            $.ajax({
                url: routeUrl,
                type: "GET",
                dataType: 'json',
                success: function(res) {
                    detailTag = `<div class="row mt-3 container-begin">`;
                    detailTag += createTableDetail(res);
                    detailTag += `<div class="col-sm-7 d-flex flex-column justify-content-between">`;
                    detailTag += `<div class="row">`;
                    detailTag += createTableFiles(res);
                    detailTag += createTimeline(res);
                    detailTag += `</div>`;
                    detailTag += `<div class="row"> <div class="col px-2 py-2 text-end">`;
                    detailTag += `<div class="d-flex justify-content-end align-items-end">
                                       <form class="d-flex justify-content-end align-items-end gap-2" action="{{route('regenerate.document')}}"
                                        method="post">
                                        @csrf
                                        <div>
                                            <label class="form-label mb-1">Tanggal Dokumen</label>
                                            <input type="hidden" name="satpenid" value="${satpenId}">
                                            <input type="date" name="tgl_doc" class="form-control form-control-sm" required>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-modern-success btn-generate-padding"><i class="ti ti-printer"></i> Regenerate Dokumen</button>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-modern-danger btn-generate-padding" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalRevisiExtensif" data-bs="${res.id_satpen}"><i class="ti ti-hand-stop"></i> Tolak</button>
                                        </div>
                                        </form>
                                  </div>`;
                    detailTag += `</div> </div>
                                </div>
                            </div>`;

                    $("#modal-detail-perpanjang").html(detailTag);

                }
            });
        });

        function createTableDetail(res) {
            return `<div class="col-sm-5">
                        <div class="detail-table">
                            <h5 class="section-header">Informasi Satuan Pendidikan</h5>
                            <table>
                            <tbody>
                            <tr>
                                <th width="140">NPSN</th>
                                <td width="30">:</td>
                                <td><strong>${res.npsn}</strong></td>
                            </tr>
                            <tr>
                                <th>Nama Satpen</th>
                                <td>:</td>
                                <td><strong>${res.nm_satpen}</strong></td>
                            </tr>
                            <tr>
                                <th>No. Registrasi</th>
                                <td>:</td>
                                <td>${res.no_registrasi}</td>
                            </tr>
                            <tr>
                                <th>Kategori Satpen</th>
                                <td>:</td>
                                <td>${res.kategori?.nm_kategori}</td>
                            </tr>
                            <tr>
                                <th>Yayasan</th>
                                <td>:</td>
                                <td>${res.yayasan}</td>
                            </tr>
                            <tr>
                                <th>Kepala Sekolah</th>
                                <td>:</td>
                                <td>${res.kepsek}</td>
                            </tr>
                            <tr>
                                <th>Tahun Berdiri</th>
                                <td>:</td>
                                <td>${res.thn_berdiri}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td>${res.email}</td>
                            </tr>
                            <tr>
                                <th>Telpon</th>
                                <td>:</td>
                                <td>${res.telpon}</td>
                            </tr>
                            <tr>
                                <th>Fax</th>
                                <td>:</td>
                                <td>${res.fax}</td>
                            </tr>
                            <tr>
                                <th>Provinsi</th>
                                <td>:</td>
                                <td>${res.provinsi.nm_prov}</td>
                            </tr>
                            <tr>
                                <th>Kabupaten</th>
                                <td>:</td>
                                <td>${res.kabupaten.nama_kab}</td>
                            </tr>
                            <tr>
                                <th>Cabang</th>
                                <td>:</td>
                                <td>${res.cabang.nama_pc}</td>
                            </tr>
                            <tr>
                                <th>Kecamatan</th>
                                <td>:</td>
                                <td>${res.kecamatan}</td>
                            </tr>
                            <tr>
                                <th>Kelurahan/Desa</th>
                                <td>:</td>
                                <td>${res.kelurahan}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td>${res.alamat}</td>
                            </tr>
                            <tr>
                                <th>Aset Tanah</th>
                                <td>:</td>
                                <td>${res.aset_tanah}</td>
                            </tr>
                            <tr>
                                <th>Nama Pemilik</th>
                                <td>:</td>
                                <td>${res.nm_pemilik}</td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                  </div>`;
        }

        function replaceMapFile(mapfile) {
            mapfile = mapfile.replace("_", " ");
            if (mapfile.includes("pc")) {
                mapfile = "pengurus cabang";
            } else if (mapfile.includes("pw")) {
                mapfile = "pengurus wilayah";
            }
            return mapfile;
        }

        function createTableFiles(res) {
            cardFiles = `<div class="col-sm-6 px-3">
                      <h5 class="section-header">File Pendukung</h5>`;
            $.each(res.filereg, function(key, row) {
                let routepdfViewer = "{{ route('viewerpdf', ['fileName' => ':param']) }}".replace(':param', row.filesurat);
                cardFiles += `<div class="mb-3 px-3 py-2 card-box-detail">
                        <h6 class="text-capitalize">${ replaceMapFile(row.mapfile) }</h6>
                        <p class="mb-1"><strong>${row.nm_lembaga}</strong> ${row.daerah ?? ''}</p>
                        <p class="mb-2">Nomor: <strong>${row.nomor_surat}</strong></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small><i class="ti ti-calendar"></i> ${row.tgl_surat}</small>
                            <a href="${routepdfViewer}" target="_blank"><span class="badge bg-primary"><i class="ti ti-eye"></i> Lihat PDF</span></a>
                        </div>
                    </div>`;
            });
            cardFiles += `</div>`;

            return cardFiles;
        }

        function createTimeline(res) {
            timelineTag = `<div class="col-sm-6 d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="section-header">Riwayat Status</h5>
                                    <div style="max-height:35rem;overflow:auto;">
                                        <ul class="timeline">`;
                        $.each(res.timeline, function(key, row) {
                            timelineTag +=
                                `<li>
                                    <a href="#" class="text-capitalize fw-bold">${row.status_verifikasi}</a>
                                    <small class="float-end text-muted">${row.keterangan}</small>
                                    <p class="text-muted"><i class="ti ti-calendar"></i> ${row.tgl_status}</p>
                                </li>`;
                        });
            timelineTag += `</ul></div>
                                </div>
                            </div>`;

            return timelineTag;
        }

    </script>
@endsection
