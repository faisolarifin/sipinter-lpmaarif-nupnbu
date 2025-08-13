@extends('template.layout', [
    'title' => 'Sipinter - Rekapitulasi Satuan Pendidikan',
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
                            {{--                        <h5 class="mb-0">{{ $satpenProfile->count()  }}</h5> --}}
                            <h5 class="mb-0">{{ $satpenProfileCount }}</h5>
                            <small>record satpen</small>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <form class="d-flex justify-content-end mb-2">
                            <div class="d-flex flex-column flex-sm-row">
                                <!-- offcanvas filter form -->
                                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasFilter"
                                    aria-labelledby="offcanvasRightLabel" style="max-width:27rem;">
                                    <div class="offcanvas-header justify-content-end">
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <h5 class="mb-3">Filter Berdasarkan</h5>
                                        @if (!in_array(auth()->user()->role, ['admin wilayah', 'admin cabang']))
                                            <div class="mb-3">
                                                @include('component.selectpicker', [
                                                    'name' => 'provinsi',
                                                    'prefix' => '',
                                                    'current' => request('provinsi'),
                                                    'default' => 'PROVINSI',
                                                    'val' => 'id_prov',
                                                    'label' => 'nm_prov',
                                                    'data' => $propinsi,
                                                ])
                                            </div>
                                        @endif
                                        @if (!in_array(auth()->user()->role, ['admin cabang']))
                                            <div class="mb-3">
                                                @include('component.selectpicker', [
                                                    'name' => 'kabupaten',
                                                    'prefix' => '',
                                                    'current' => request('kabupaten'),
                                                    'default' => 'KABUPATEN',
                                                    'val' => 'id_kab',
                                                    'label' => 'nama_kab',
                                                    'data' => [],
                                                ])
                                            </div>
                                        @endif
                                        @if (!in_array(auth()->user()->role, ['admin cabang']))
                                            <div class="mb-3">
                                                @include('component.selectpicker', [
                                                    'name' => 'cabang',
                                                    'prefix' => '',
                                                    'current' => request('cabang'),
                                                    'default' => 'CABANG',
                                                    'val' => 'id_pc',
                                                    'label' => 'nm_pc',
                                                    'data' => [],
                                                ])
                                            </div>
                                        @endif

                                        <div class="mb-3">
                                            @include('component.selectpicker', [
                                                'name' => 'jenjang',
                                                'prefix' => '',
                                                'current' => request('jenjang'),
                                                'default' => 'JENJANG',
                                                'val' => 'id_jenjang',
                                                'label' => 'nm_jenjang',
                                                'data' => $jenjang,
                                            ])
                                        </div>

                                        <div class="mb-3">
                                            @include('component.selectpicker', [
                                                'name' => 'kategori',
                                                'prefix' => '',
                                                'current' => request('kategori'),
                                                'default' => 'KATEGORI',
                                                'val' => 'id_kategori',
                                                'label' => 'nm_kategori',
                                                'data' => $kategori,
                                            ])
                                        </div>

                                        <div class="mb-3">
                                            @include('component.selectpicker', [
                                                'name' => 'status',
                                                'prefix' => '',
                                                'current' => request('status'),
                                                'default' => 'STATUS',
                                                'val' => 'id',
                                                'label' => 'name',
                                                'data' => [
                                                    ['id' => 'setujui', 'name' => 'Setujui'],
                                                    ['id' => 'expired', 'name' => 'Expired'],
                                                    ['id' => 'perpanjangan', 'name' => 'Perpanjangan'],
                                                ],
                                            ])
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100"><i class="ti ti-filter"></i>
                                            Filter</button>
                                    </div>
                                </div>
                                <!-- end offcanvas -->

                                <a href="#" class="btn btn-success btn-sm mx-2 py-2" id="export-btn"><i
                                        class="ti ti-file-spreadsheet"></i> Export to Excel</a>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasFilter" aria-controls="offcanvasFilter"><i
                                        class="ti ti-filter"></i> Filter</button>
                            </div>
                            <div class="d-flex">
                                <input type="text" name="keyword" id="keyword"
                                    class="form-control form-control-sm mx-2"
                                    placeholder="NPSN/Nomor Registrasi/Nama Satpen" value="{{ request()->keyword }}">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="ti ti-search"></i></button>
                            </div>
                        </form>
                        <table class="table table-hover" id="mytable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">NPSN</th>
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
                                @php($no = 0)
                                @php($today = \Carbon\Carbon::now())
                                @if ($satpenProfile->count() > 0)
                                    @foreach ($satpenProfile as $row)
                                        @php($diff = $today->diffInMonths(\Carbon\Carbon::parse($row->actived_date)))
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>{{ $row->kategori?->nm_kategori }}</td>
                                            <td>{{ $row->npsn }}</td>
                                            <td>{{ $row->no_registrasi }}</td>
                                            <td>{{ $row->nm_satpen }}</td>
                                            <td>{{ $row->yayasan }}</td>
                                            <td>{{ $row->jenjang->nm_jenjang }}</td>
                                            <td>{{ $row->provinsi->nm_prov }}</td>
                                            <td>{{ $row->kabupaten->nama_kab }}</td>
                                            <td class="{{ $row->status == 'expired' ? 'expired' : '' }}">
                                                {{ $diff . ' bln' }}</td>
                                            <td>
                                                <a href="{{ route('a.rekapsatpen.detail', $row->id_satpen) }}">
                                                    <button class="btn btn-sm btn-info"><i
                                                            class="ti ti-eye"></i></button></a>

                                                @if (in_array(auth()->user()->role, ['super admin']))
                                                    <form action="{{ route('a.rekapsatpen.destroy', $row->id_satpen) }}"
                                                        method="post" class="d-inline deleteBtn">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"><i
                                                                class="ti ti-trash"></i></button>
                                                    </form>
                                                @endif
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

@section('extendscripts')
    <script>
        $(".deleteBtn").on('click', function() {
            if (confirm("benar anda akan menghapus data?")) {
                return true;
            }
            return false;
        });

        $("#export-btn").attr("href", "{{ route('satpen.excel') }}" + location.search);
    </script>
@endsection
