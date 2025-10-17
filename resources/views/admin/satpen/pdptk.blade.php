@extends('template.layout', [
    'title' => 'Sipinter - Data PD & PTK',
])

@section('navbar')
    @include('template.navadmin')
@endsection

@section('style')
<style>
    /* Modern Card Styling */
    .modern-card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(0, 0, 0, 0.05);
        overflow: hidden;
        margin-bottom: 24px;
    }

    .modern-card-header {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        padding: 24px 32px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.06);
    }

    .modern-card-header h5 {
        color: #1e293b;
        font-weight: 700;
        font-size: 1.25rem;
        margin: 0 0 6px 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .modern-card-header small {
        color: #64748b;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .card-icon {
        width: 32px;
        height: 32px;
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        color: white;
    }

    /* Modern Table */
    .modern-table {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    .modern-table thead {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%) !important;
    }

    .modern-table thead th {
        color: #1e293b !important;
        font-weight: 700;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 16px 20px !important;
        border: none;
        border-bottom: 2px solid #e5e7eb !important;
        background: transparent !important;
    }

    .modern-table tbody tr {
        transition: all 0.2s ease;
        border-bottom: 1px solid rgba(0, 0, 0, 0.04);
    }

    .modern-table tbody tr:hover {
        background: linear-gradient(135deg, #f8fafc 0%, #f9fafb 100%);
        transform: scale(1.01);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    .modern-table tbody td {
        padding: 16px 20px !important;
        color: #374151;
        font-weight: 500;
        vertical-align: middle;
        border: none;
    }

    /* Modern Buttons */
    .btn-modern {
        border-radius: 10px;
        padding: 10px 20px;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
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

    .btn-modern-primary {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: white;
    }

    .btn-modern-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
        color: white;
    }

    .btn-modern-info {
        background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
        color: white;
    }

    .btn-modern-info:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(6, 182, 212, 0.3);
        color: white;
    }

    .btn-action {
        padding: 8px 14px;
        font-size: 0.875rem;
    }

    /* Statistics Card */
    .stats-card-inline {
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
        border-radius: 12px;
        padding: 16px 24px;
        border: 1px solid rgba(59, 130, 246, 0.2);
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.1);
    }

    .stats-card-inline h5 {
        color: #1e40af;
        font-weight: 700;
        font-size: 1.75rem;
        margin: 0;
    }

    .stats-card-inline small {
        color: #3b82f6;
        font-weight: 600;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Filter Offcanvas */
    .offcanvas-header {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-bottom: 2px solid #e5e7eb;
    }

    .offcanvas-body h5 {
        color: #1e293b;
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 2px solid #e5e7eb;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .offcanvas-body h5::before {
        content: '';
        width: 4px;
        height: 24px;
        background: linear-gradient(180deg, #3b82f6 0%, #2563eb 100%);
        border-radius: 2px;
    }

    /* Search Box */
    .search-box {
        position: relative;
    }

    .search-box input {
        border-radius: 10px;
        border: 1px solid #e5e7eb;
        padding: 10px 16px;
        transition: all 0.3s ease;
    }

    .search-box input:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    /* Rekap Table */
    .table-rekap {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-radius: 12px;
        padding: 24px;
        margin-top: 24px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    .table-rekap thead th {
        color: #1e293b;
        font-weight: 700;
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding-bottom: 16px;
        border-bottom: 2px solid #e5e7eb;
    }

    .table-rekap tbody td {
        color: #374151;
        font-size: 0.938rem;
        padding: 8px 0;
    }

    .table-rekap tbody strong {
        color: #1e40af;
        font-weight: 700;
        font-size: 1.125rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .modern-card-header {
            padding: 20px;
        }

        .modern-table thead th,
        .modern-table tbody td {
            padding: 12px 16px !important;
            font-size: 0.813rem;
        }
    }
</style>
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

            <div class="modern-card">
                <div class="modern-card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0">
                                <span class="card-icon">
                                    <i class="ti ti-users"></i>
                                </span>
                                Data Peserta Didik & Pendidik Tenaga Kependidikan
                            </h5>
                            <small>Rekapitulasi data PD & PTK dari setiap satuan pendidikan berdasarkan tahun pelajaran</small>
                        </div>
                        <div class="stats-card-inline text-center">
                            <h5 class="mb-0">{{ $pdptkCount }}</h5>
                            <small>Total Satpen</small>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-3">

                    <div>
                        <form class="d-flex justify-content-between mb-3 flex-wrap gap-2">
                            <div class="d-flex gap-2">
                                <div>
                                    @php($tapelBox = request()->tapel ?? App\Http\Controllers\Settings::get('current_tapel'))
                                    <select name="tapel" id="tapelBox" class="form-select" style="border-radius: 10px; border: 1px solid #e5e7eb; padding: 10px 16px;">
                                        @foreach ($tapel as $row)
                                            <option value="{{ $row->tapel_dapo }}"
                                                {{ $row->tapel_dapo == $tapelBox ? 'selected' : '' }}>
                                                {{ $row->nama_tapel . ' | ' . $row->tapel_dapo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if (in_array(auth()->user()->role, ['super admin']))
                                    <a href="{{ route('a.pdptk.sync', request()->has('tapel') ? ['tapel' => request()->query('tapel')] : []) }}"
                                        class="btn btn-modern-info btn-action"><i class="ti ti-reload"></i> Sinkron Bulk</a>
                                @endif
                            </div>
                            <div class="d-flex gap-2">
                                <div class="d-flex gap-2 flex-wrap">
                                    <!-- offcanvas filter form -->
                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasFilter"
                                        aria-labelledby="offcanvasRightLabel" style="max-width:27rem;">
                                        <div class="offcanvas-header justify-content-end">
                                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body">
                                            <h5 class="mb-3">Filter Data</h5>
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
                                            <button type="submit" class="btn btn-modern-primary w-100">
                                                <i class="ti ti-filter"></i> Terapkan Filter
                                            </button>
                                        </div>
                                    </div>
                                    <!-- end offcanvas -->

                                    <a href="#" class="btn btn-modern-success btn-action" id="export-btn">
                                        <i class="ti ti-file-spreadsheet"></i> Export Excel
                                    </a>
                                    <button type="button" class="btn btn-modern-primary btn-action" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasFilter" aria-controls="offcanvasFilter">
                                        <i class="ti ti-filter"></i> Filter
                                    </button>
                                </div>
                                <div class="d-flex search-box">
                                    <input type="text" name="keyword" id="keyword"
                                        class="form-control form-control-sm"
                                        placeholder="Cari NPSN, No. Registrasi, atau Nama Satpen..." value="{{ request()->keyword }}" style="min-width: 300px;">
                                    <button type="submit" class="btn btn-modern-primary btn-action ms-2">
                                        <i class="ti ti-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive" id="table-scroll-container">
                            <table class="table modern-table" id="mytable">
                                <thead>
                                    <tr>
                                        <th width="3%" class="text-center">#</th>
                                        <th width="10%">No. Registrasi</th>
                                        <th width="15%">Nama Satpen</th>
                                        <th width="8%">Jenjang</th>
                                        <th width="10%">Provinsi</th>
                                        <th width="10%">Kab/Kota</th>
                                        <th width="5%" class="text-center">PD LK</th>
                                        <th width="5%" class="text-center">PD PR</th>
                                        <th width="5%" class="text-center">JML PD</th>
                                        <th width="5%" class="text-center">Guru LK</th>
                                        <th width="5%" class="text-center">Guru PR</th>
                                        <th width="5%" class="text-center">JML Guru</th>
                                        <th width="5%" class="text-center">Tendik LK</th>
                                        <th width="5%" class="text-center">Tendik PR</th>
                                        <th width="5%" class="text-center">JML Tendik</th>
                                        <th width="8%" class="text-center">Last Sync</th>
                                        <th width="5%" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($pdptkData->count() > 0)
                                        @foreach ($pdptkData as $row)
                                            <tr>
                                                <td class="text-center">
                                                    <span class="badge bg-light text-dark">{{ $loop->iteration }}</span>
                                                </td>
                                                <td><small class="fw-bold">{{ $row->satpen->no_registrasi }}</small></td>
                                                <td><strong>{{ $row->satpen->nm_satpen }}</strong></td>
                                                <td><small>{{ $row->satpen->jenjang->nm_jenjang }}</small></td>
                                                <td><small>{{ $row->satpen->provinsi->nm_prov }}</small></td>
                                                <td><small>{{ $row->satpen->kabupaten->nama_kab }}</small></td>
                                                <td class="text-center"><strong class="text-primary">{{ $row->pd_lk }}</strong></td>
                                                <td class="text-center"><strong class="text-danger">{{ $row->pd_pr }}</strong></td>
                                                <td class="text-center"><strong class="text-info">{{ $row->jml_pd }}</strong></td>
                                                <td class="text-center"><strong class="text-primary">{{ $row->guru_lk }}</strong></td>
                                                <td class="text-center"><strong class="text-danger">{{ $row->guru_pr }}</strong></td>
                                                <td class="text-center"><strong class="text-info">{{ $row->jml_guru }}</strong></td>
                                                <td class="text-center"><strong class="text-primary">{{ $row->tendik_lk }}</strong></td>
                                                <td class="text-center"><strong class="text-danger">{{ $row->tendik_pr }}</strong></td>
                                                <td class="text-center"><strong class="text-info">{{ $row->jml_tendik }}</strong></td>
                                                <td class="text-center"><small>{{ $row->last_sinkron }}</small></td>
                                                <td class="text-center">
                                                    <a href="{{ route('a.pdptk.syncid', ['satpen' => $row->id_satpen]) }}{{ request()->has('tapel') ? '?tapel=' . request()->query('tapel') : '' }}"
                                                        class="btn btn-modern-info btn-action" title="Sinkronisasi Data">
                                                        <i class="ti ti-reload"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="17" class="text-center py-4">
                                                <div class="text-muted">
                                                    <i class="ti ti-inbox-off fs-1"></i>
                                                    <p class="mt-2 mb-0">Tidak ada data tersedia</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            {{ $pdptkData->links() }}
                        </div>
                    </div>

                    <div class="table-rekap">
                        <table class="table table-borderless" id="table-rekap">
                            <thead>
                                <tr>
                                    <th>
                                        <i class="ti ti-users me-2"></i>REKAP GURU {{ strtoupper($region) }}
                                    </th>
                                    <th>
                                        <i class="ti ti-school me-2"></i>REKAP SISWA {{ strtoupper($region) }}
                                    </th>
                                    <th>
                                        <i class="ti ti-user-check me-2"></i>REKAP TENDIK {{ strtoupper($region) }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Jumlah Total Guru Laki-Laki: <strong>{{ $sum['sumGuruLk'] }}</strong></td>
                                    <td>Jumlah Total Siswa Laki-Laki: <strong>{{ $sum['sumPdLk'] }}</strong></td>
                                    <td>Jumlah Total Tendik Laki-Laki: <strong>{{ $sum['sumTendikLk'] }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Total Guru Perempuan: <strong>{{ $sum['sumGuruPr'] }}</strong></td>
                                    <td>Jumlah Total Siswa Perempuan: <strong>{{ $sum['sumPdPr'] }}</strong></td>
                                    <td>Jumlah Total Tendik Perempuan: <strong>{{ $sum['sumTendikPr'] }}</strong></td>
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
            if (confirm("Apakah Anda yakin akan menghapus data ini? Data yang dihapus tidak dapat dikembalikan.")) {
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
