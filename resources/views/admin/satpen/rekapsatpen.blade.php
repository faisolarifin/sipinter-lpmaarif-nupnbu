@extends('template.layout', [
    'title' => 'Siapinter - Rekapitulasi Satuan Pendidikan'
])

@section('navbar')
    @include('template.navadmin')
@endsection

@section('container')
<!--  Row 1 -->
<div class="row container-begin">
    <div class="col-sm-12">

        <nav class="mt-2 mb-4" aria-label="breadcrumb">
            <ul id="breadcrumb" class="mb-0">
                <li><a href="#"><i class="ti ti-home"></i></a></li>
                <li><a href="#"><span class=" fa fa-info-circle"> </span> Satpen</a></li>
                <li><a href="#"><span class="fa fa-snowflake-o"></span> Rekap Satpen</a></li>
            </ul>
        </nav>

        @include('template.alert')

        <div class="card w-100">
            <div class="card-body pt-3">

                <div class="d-flex justify-content-between align-items-sm-center mt-2 mb-4">
                    <div>
                        <h5 class="mb-0">Rekap Satpen</h5>
                        <small>data satpen yang telah diterima</small>
                    </div>
                    <div class="text-center">
                        <h5 class="mb-0">{{ $countSatpen  }}</h5>
                        <small>record satpen</small>
                    </div>
                </div>

                <div class="table-responsive">
                    <form class="d-flex justify-content-between mb-2">
                        <div class="d-flex flex-column flex-sm-row">
                            @if(!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))
                                <div class="me-sm-2">
                                    <select class="form-select form-select-sm" name="provinsi">
                                        <option value="">PROVINSI</option>
                                        @foreach($propinsi as $row)
                                            <option value="{{ $row->id_prov }}" {{ $row->id_prov == request()->provinsi ? 'selected' : '' }}>{{ $row->nm_prov }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            @if(!in_array(auth()->user()->role, ["admin cabang"]))
                            <div class="me-sm-2">
                                <select class="form-select form-select-sm" name="kabupaten">
                                    <option value=''>KABUPATEN</option>
                                    <!-- value by ajax -->
                                </select>
                            </div>
                            @endif

                            <div class="me-sm-2">
                                <select class="form-select form-select-sm" name="jenjang">
                                    <option value="">JENJANG</option>
                                    @foreach($jenjang as $row)
                                        <option value="{{ $row->id_jenjang }}" {{ $row->id_jenjang == request()->jenjang ? 'selected' : '' }}>{{ $row->nm_jenjang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="me-sm-2">
                                <select class="form-select form-select-sm" name="kategori">
                                    <option value="">KATEGORI</option>
                                    @foreach($kategori as $row)
                                        <option value="{{ $row->id_kategori }}" {{ $row->id_kategori == request()->kategori ? 'selected' : '' }}>{{ $row->nm_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="me-sm-2">
                                <select class="form-select form-select-sm" name="status">
                                    <option value="">STATUS</option>
                                    <option value="setujui" {{ 'setujui' == request()->status ? 'selected' : '' }}>Active</option>
                                    <option value="expired" {{ 'expired' == request()->status ? 'selected' : '' }}>Expired</option>
                                    <option value="perpanjangan" {{ 'perpanjangan' == request()->status ? 'selected' : '' }}>Perpanjangan</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="ti ti-filter"></i> Filter</button>
                            <a href="#" class="btn btn-success btn-sm mx-2 py-2" id="export-btn"><i class="ti ti-file-spreadsheet"></i> Export to Excel</a>

                        </div>
                        <div class="d-flex">
                            <input type="text" name="keyword" id="keyword" class="form-control form-control-sm mx-2" placeholder="Nama Satpen" value="{{ request()->keyword }}">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="ti ti-search"></i></button>
                        </div>
                    </form>
                    <table class="table table-hover" id="mytable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">No. Registrasi</th>
                            <th scope="col">Nama Satpen</th>
                            <th scope="col">Yayasan</th>
                            <th scope="col">Jenjang</th>
                            <th scope="col">Provinsi</th>
                            <th scope="col">Kabupaten</th>
                            <th scope="col">Aktif</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($no=0)
                        @php($today=\Carbon\Carbon::now())
                        @if(count($satpenProfile) > 0)
                            @foreach($satpenProfile as $row)
                                @php($diff = $today->diffInMonths(\Carbon\Carbon::parse($row->tgl_registrasi)))
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $row->kategori->nm_kategori }}</td>
                                    <td>{{ $row->no_registrasi }}</td>
                                    <td>{{ $row->nm_satpen }}</td>
                                    <td>{{ $row->yayasan }}</td>
                                    <td>{{ $row->jenjang->nm_jenjang }}</td>
                                    <td>{{ $row->provinsi->nm_prov }}</td>
                                    <td>{{ $row->kabupaten->nama_kab }}</td>
                                    <td class="{{ $row->status == 'expired' ? 'expired' : '' }}">{{ $diff .' bln' }}</td>
                                    <td>
                                        <a href="{{ route('a.rekapsatpen.detail', $row->id_satpen) }}">
                                            <button class="btn btn-sm btn-info"><i class="ti ti-eye"></i></button></a>
                                        <form action="{{ route('a.rekapsatpen.destroy', $row->id_satpen ) }}" method="post" class="d-inline deleteBtn">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <td colspan="10">No data available in table</td>
                        @endif
                        </tbody>
                    </table>
                    {{ $satpenProfile->links() }}
                </div>

            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
    $(".deleteBtn").on('click', function () {
        if (confirm("benar anda akan menghapus data?")) {
            return true;
        }
        return false;
    });

    $("#export-btn").attr("href", "{{ route('satpen.excel') }}" + location.search);

    $("select[name='provinsi']").on('change', function() {
        getKabupaten();
    });

    function getKabupaten(provId) {
        provId = provId ? provId : $("select[name='provinsi']").val();
        let routeGetData = "{{ route('api.kabupatenbyprov', ['provId' => ':param']) }}".replace(':param', provId);

        $.ajax({
            url: routeGetData,
            type: "GET",
            dataType: 'json',
            success: function(res) {

                let $select = $("select[name='kabupaten']");
                $select.empty();
                $select.append("<option value=''>KABUPATEN</option>");

                $.each(res,function(key, value) {
                    $select.append('<option value=' + value.id_kab + '>' + value.nama_kab + '</option>');
                });

                let kabParam = location.search.split("&");
                if (kabParam.length > 1) {
                    kabParam = kabParam[1].split("=")[1];
                    $select.val(kabParam);
                }
            }
        })
    }

    getKabupaten({{ auth()->user()->provId }});

</script>
@endsection
