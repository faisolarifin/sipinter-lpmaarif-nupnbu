@extends('template.layout', [
    'title' => 'Sipinter - Data PD & PTK',
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
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> PD & PTK</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <div class="card w-100">
                <div class="card-body pt-3">

                    <div class="d-flex justify-content-between align-items-sm-center mt-2 mb-4">
                        <div>
                            <h5 class="mb-0">Data PD & PTK</h5>
                            <small>data rekap pd & ptk setiap satuan pendidikan</small>
                        </div>
                        <div class="text-center">
                            {{--                        <h5 class="mb-0">{{ $satpenProfile->count()  }}</h5> --}}
                            <h5 class="mb-0">{{ $pdptkCount }}</h5>
                            <small>record satpen</small>
                        </div>
                    </div>

                    <div>
                        <form class="d-flex justify-content-between mb-2">
                            <div class="d-flex">
                                <div>
                                    @php($tapelBox = request()->tapel ?? App\Http\Controllers\Settings::get('current_tapel'))
                                    <select name="tapel" id="tapelBox" class="form-select">
                                        @foreach ($tapel as $row)
                                            <option value="{{ $row->tapel_dapo }}"
                                                {{ $row->tapel_dapo == $tapelBox ? 'selected' : '' }}>
                                                {{ $row->nama_tapel . ' | ' . $row->tapel_dapo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if (in_array(auth()->user()->role, ['super admin']))
                                    <a href="{{ route('a.pdptk.sync', request()->has('tapel') ? ['tapel' => request()->query('tapel')] : []) }}"
                                        class="btn btn-info btn-sm mx-2 py-2"><i class="ti ti-reload"></i> Sinkron Bulk</a>
                                @endif
                            </div>
                            <div class="d-flex">
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
                                                    'name' => 'lembaga',
                                                    'prefix' => '',
                                                    'current' => request('lembaga'),
                                                    'default' => 'LEMBAGA',
                                                    'val' => 'id',
                                                    'label' => 'name',
                                                    'data' => [
                                                        ['id' => 'MADRASAH', 'name' => 'MADRASAH'],
                                                        ['id' => 'SEKOLAH', 'name' => 'SEKOLAH'],
                                                    ],
                                                ])
                                            </div>
                                            <div class="mb-3">
                                                @include('component.selectpicker', [
                                                    'name' => 'filled',
                                                    'prefix' => '',
                                                    'current' => request('filled'),
                                                    'default' => 'KELENGKAPAN DATA',
                                                    'val' => 'id',
                                                    'label' => 'name',
                                                    'data' => [
                                                        ['id' => 'true', 'name' => 'LENGKAP'],
                                                        ['id' => 'false', 'name' => 'KOSONG'],
                                                    ],
                                                ])
                                            </div>
                                            <button type="submit" class="btn btn-primary w-100"><i
                                                    class="ti ti-filter"></i>
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
                                    <button type="submit" class="btn btn-primary btn-sm"><i
                                            class="ti ti-search"></i></button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive" id="table-scroll-container">
                            <table class="table table-hover" id="mytable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">No. Registrasi</th>
                                        <th scope="col">Nama Satpen</th>
                                        <th scope="col">Jenjang</th>
                                        <th scope="col">Provinsi</th>
                                        <th scope="col">Kab/Kota</th>
                                        <th width="70" scope="col">PD LK</th>
                                        <th width="70" scope="col">PD PR</th>
                                        <th width="70" scope="col">JML PD</th>
                                        <th width="70" scope="col">Guru LK</th>
                                        <th width="70" scope="col">Guru PR</th>
                                        <th width="70" scope="col">JML Guru</th>
                                        <th width="70" scope="col">Tendik LK</th>
                                        <th width="70" scope="col">Tendik PR</th>
                                        <th width="70" scope="col">JML Tendik</th>
                                        <th width="70" scope="col">Last Sync</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($pdptkData->count() > 0)
                                        @foreach ($pdptkData as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->satpen->no_registrasi }}</td>
                                                <td>{{ $row->satpen->nm_satpen }}</td>
                                                <td>{{ $row->satpen->jenjang->nm_jenjang }}</td>
                                                <td>{{ $row->satpen->provinsi->nm_prov }}</td>
                                                <td>{{ $row->satpen->kabupaten->nama_kab }}</td>
                                                <td>{{ $row->pd_lk }}</td>
                                                <td>{{ $row->pd_pr }}</td>
                                                <td>{{ $row->jml_pd }}</td>
                                                <td>{{ $row->guru_lk }}</td>
                                                <td>{{ $row->guru_pr }}</td>
                                                <td>{{ $row->jml_guru }}</td>
                                                <td>{{ $row->tendik_lk }}</td>
                                                <td>{{ $row->tendik_pr }}</td>
                                                <td>{{ $row->jml_tendik }}</td>
                                                <td>{{ $row->last_sinkron }}</td>
                                                <td>
                                                    <a href="{{ route('a.pdptk.syncid', ['satpen' => $row->id_satpen]) }}{{ request()->has('tapel') ? '?tapel=' . request()->query('tapel') : '' }}"
                                                        class="btn btn-sm btn-info"><i class="ti ti-reload"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <td colspan="17">No data available in table</td>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        {{ $pdptkData->links() }}
                    </div>
                    <div>
                        <table class="table table-borderless" id="table-rekap">
                            <thead>
                                <tr>
                                    <th>REKAP GURU {{ strtoupper($region) }}</th>
                                    <th>REKAP SISWA {{ strtoupper($region) }}</th>
                                    <th>REKAP TENDIK {{ strtoupper($region) }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Jumlah Total Guru LK: <strong>{{ $sum['sumGuruLk'] }}</strong></td>
                                    <td>Jumlah Total Siswa LK: <strong>{{ $sum['sumPdLk'] }}</strong></td>
                                    <td>Jumlah Total Tendik LK: <strong>{{ $sum['sumTendikLk'] }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Total Guru PR: <strong>{{ $sum['sumGuruPr'] }}</strong></td>
                                    <td>Jumlah Total Siswa PR: <strong>{{ $sum['sumPdPr'] }}</strong></td>`
                                    <td>Jumlah Total Tendik PR: <strong>{{ $sum['sumTendikPr'] }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Total Guru: <strong>{{ $sum['sumJmlGuru'] }}</strong></td>
                                    <td>Jumlah Total Siswa: <strong>{{ $sum['sumJmlPd'] }}</strong></td>
                                    <td>Jumlah Total Tendik: <strong>{{ $sum['sumJmlTendik'] }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection

@section('extendscripts')
    <script>
        // $(document).ready(function () {
        //     $('#mytable').DataTable();
        // });

        $(".deleteBtn").on('click', function() {
            if (confirm("benar anda akan menghapus data?")) {
                return true;
            }
            return false;
        });

        $("#export-btn").attr("href", "{{ route('pdptk.excel') }}" + location.search);

        document.getElementById('tapelBox').addEventListener('change', function() {
            const selectedValue = this.value;
            const currentUrl = new URL(window.location.href);
            const params = currentUrl.searchParams;

            // Tambahkan atau update query param
            params.set('tapel', selectedValue);

            // Buat URL baru dengan parameter yang sudah diperbarui
            currentUrl.search = params.toString();

            // Redirect ke URL baru
            window.location.href = currentUrl.toString();
        });
    </script>
@endsection
