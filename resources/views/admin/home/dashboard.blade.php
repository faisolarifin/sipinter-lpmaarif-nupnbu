@extends('template.layout', [
    'title' => 'Sipinter Admin - Dashboard'
])

@section('navbar')
    @include('template.navadmin')
@endsection

@section('container')

<nav class="mt-2 mb-4" aria-label="breadcrumb">
    <ul id="breadcrumb" class="mb-0">
        <li><a href="#"><i class="ti ti-home"></i></a></li>
        <li><a href="#"><span class=" fa fa-info-circle"> </span> Home</a></li>
        <li><a href="#"><span class="fa fa-snowflake-o"></span> Dashboard</a></li>
    </ul>
</nav>

@include('template.alert')

<div class="row">
    <div class="{{ !in_array(auth()->user()->role, ["admin wilayah"]) ? in_array(auth()->user()->role, ["admin cabang"]) ? 'col-lg-10' : 'col-lg-6' : 'col-lg-8' }} d-flex align-items-strech">
        <div class="card w-100 shadow-none">
            <div class="card-body py-3">
                <p class="mb-2">Halo,</p>
                <h4>{{ auth()->user()->name ? auth()->user()->name : 'Administrator' }}</h4>
            </div>
        </div>
    </div>
    @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
    <div class="col-lg-2">
        <div class="card w-100 shadow-none">
            <div class="card-body p-3 text-center">
                <p class="mb-2">TOTAL PROPINSI</p>
                <h4>{{ $countOfPropinsi }}</h4>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="card w-100 shadow-none">
            <div class="card-body p-3 text-center">
                <p class="mb-2">TOTAL KABUPATEN</p>
                <h4>{{ $countOfKabupaten }}</h4>
            </div>
        </div>
    </div>
    @endif
    @if(in_array(auth()->user()->role, ["admin wilayah"]))
    <div class="col-lg-2">
        <div class="card w-100 shadow-none">
            <div class="card-body p-3 text-center">
                <p class="mb-2">TOTAL CABANG</p>
                <h4>{{ $countOfKabupaten }}</h4>
            </div>
        </div>
    </div>
    @endif
    <div class="col-lg-2">
        <div class="card w-100 shadow-none">
            <div class="card-body p-3 text-center">
                <p class="mb-2">TOTAL SATPEN</p>
                <h4>{{ $countOfRecordSatpen }}</h4>
            </div>
        </div>
    </div>

</div>

<!--  Row 1 -->
<div class="row">
    <div class="col-lg-4">
        <div class="card overflow-hidden">
            <div class="card-body p-4">
                <h5 class="card-title mb-9 fw-semibold">Satpen Propinsi</h5>
                <div class="row align-items-center">
                    <div class="col-8">
                        <h4 class="fw-semibold mb-3 count-prop">0</h4>
                        <div class="d-flex align-items-center mb-3">
                          <span
                              class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-up-left text-success"></i>
                          </span>
                            <p class="fs-3 mb-0">PROPINSI</p>
                        </div>

                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-center">
                            <div id="propinsi"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
    <div class="col-lg-4">
        <div class="card overflow-hidden">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="card-title mb-0 fw-semibold">Satpen Kabupaten</h5>
                    <form class="form" style="width:40%;">
                        <select id="chartSelectProv" class="form-select form-select-sm">
                            @foreach($listProvinsi as $row)
                            <option value="{{ $row->id_prov }}">{{ $row->nm_prov }}</option>
                            @endforeach
                        </select>
                    </form>

                </div>
                <div class="row align-items-center">
                    <div class="col-8">
                        <h4 class="fw-semibold mb-3 count-kab">0</h4>
                        <div class="d-flex align-items-center mb-3">
                          <span
                              class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-up-left text-success"></i>
                          </span>
                            <p class="fs-3 mb-0">KABUPATEN</p>
                        </div>

                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-center">
                            <div id="kabupaten"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="col-lg-4">
        <div class="card overflow-hidden">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="card-title mb-0 fw-semibold">Satpen Cabang</h5>
                    <form class="form" style="width:40%;">
                        <select id="chartSelectProv" class="form-select form-select-sm">
                            @foreach($listProvinsi as $row)
                                <option value="{{ $row->id_prov }}">{{ $row->nm_prov }}</option>
                            @endforeach
                        </select>
                    </form>

                </div>
                <div class="row align-items-center">
                    <div class="col-8">
                        <h4 class="fw-semibold mb-3 count-pc">0</h4>
                        <div class="d-flex align-items-center mb-3">
                      <span
                          class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                        <i class="ti ti-arrow-up-left text-success"></i>
                      </span>
                            <p class="fs-3 mb-0">PANGURUS CABANG</p>
                        </div>

                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-center">
                            <div id="pc"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="col-lg-4">
        <div class="card overflow-hidden">
            <div class="card-body p-4">
                <h5 class="card-title mb-9 fw-semibold">Satpen Jenjang</h5>
                <div class="row align-items-center">
                    <div class="col-8">
                        <h4 class="fw-semibold mb-3 count-jp">0</h4>
                        <div class="d-flex align-items-center mb-3">
                          <span
                              class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-up-left text-success"></i>
                          </span>
                            <p class="fs-3 mb-0">JENJANG PENDIDIKAN</p>
                        </div>

                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-center">
                            <div id="jenjang-pendidikan"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(in_array(auth()->user()->role, ["super admin", "admin pusat"]))
<div class="row">
    <div class="col-lg-6 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Record Per Propinsi</h5>
                <div class="table-responsive">
                    <table class="table table-hover text-nowrap mb-0 align-middle table-container" id="datatb">
                        <thead class="text-dark fs-4">
                        <tr>
                            <th>
                                <h6 class="fw-semibold mb-0">Provinsi</h6>
                            </th>
                            <th>
                                <h6 class="fw-semibold mb-0">Jumlah Record</h6>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($recordPerPropinsi as $row)
                        <tr class="cursor-pointer clickable-row" data-href="{{ route('a.rekapsatpen', ["provinsi" => $row->id_prov]) }}">
                            <td>{{ $row->nm_prov }}</td>
                            <td>{{ $row->record_count }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Pemetaan Status</h5>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered text-nowrap mb-0 align-middle">
                        <tbody>
                        <tr class="cursor-pointer clickable-sigle-row" data-link="{{ route('a.satpen'). "#permohonan" }}">
                            <td class="d-flex justify-content-between">
                                <span>Permohonan</span>
                                <span class="badge bg-primary rounded-3 fw-semibold">{{ $countPerStatus[0]->permohonan }}</span>
                            </td>
                        </tr>
                        <tr class="cursor-pointer clickable-sigle-row" data-link="{{ route('a.satpen'). "#dokumen" }}">
                            <td class="d-flex justify-content-between">
                                <span>Proses Dokumen</span>
                                <span class="badge bg-info rounded-3 fw-semibold">{{ $countPerStatus[0]->proses_dokumen }}</span>
                            </td>
                        </tr>
                        <tr class="cursor-pointer clickable-sigle-row" data-link="{{ route('a.satpen'). "#revisi" }}">
                            <td class="d-flex justify-content-between">
                                <span>Revisi</span>
                                <span class="badge bg-warning rounded-3 fw-semibold">{{ $countPerStatus[0]->revisi }}</span>
                            </td>
                        </tr>
                        <tr class="cursor-pointer clickable-sigle-row" data-link="{{ route('a.rekapsatpen', ["status" => "expired"]) }}">
                            <td class="d-flex justify-content-between">
                                <span>Expired</span>
                                <span class="badge bg-danger rounded-3 fw-semibold">{{ $countPerStatus[0]->expired }}</span>
                            </td>
                        </tr>
                        <tr class="cursor-pointer clickable-sigle-row" data-link="{{ route('a.satpen'). "#perpanjang" }}">
                            <td class="d-flex justify-content-between">
                                <span>Perpanjangan</span>
                                <span class="badge bg-success rounded-3 fw-semibold">{{ $countPerStatus[0]->perpanjangan }}</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection

@section('scripts')
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
<script src="{{asset('assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/dataTables.bootstrap5.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#datatb').DataTable({
            searching: false, // Disable search functionality
            paging: true,     // Enable pagination
            lengthChange: false, // Show "Entries" dropdown
            pageLength: 5,
        });

        $(".table-container").on("click", ".clickable-row", function() {
            let url = $(this).attr("data-href");
            window.location.href = url;
        });
        $(".clickable-sigle-row").on("click", function () {
            let url = $(this).attr("data-link");
            window.location.href = url;
        });
    });

</script>
@endsection
