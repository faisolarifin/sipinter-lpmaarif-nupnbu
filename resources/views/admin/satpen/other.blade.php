@extends('template.layout', [
    'title' => 'Sipinter - Data Lainnya',
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

    /* Modern Badges */
    .badge-modern {
        padding: 6px 14px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .badge-akreditasi-a {
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
        color: #059669;
    }

    .badge-akreditasi-b {
        background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        color: #2563eb;
    }

    .badge-akreditasi-c {
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        color: #d97706;
    }

    .badge-akreditasi-none {
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        color: #dc2626;
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
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> Data Lainnya</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <div class="modern-card">
                <div class="modern-card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0">
                                <span class="card-icon">
                                    <i class="ti ti-file-text"></i>
                                </span>
                                Informasi Data Lainnya Satuan Pendidikan
                            </h5>
                            <small>Data pelengkap satuan pendidikan meliputi NPYP, akreditasi, SK pendirian, dan informasi tambahan lainnya</small>
                        </div>
                        <div class="stats-card-inline text-center">
                            <h5 class="mb-0">{{ $othersCount }}</h5>
                            <small>Total Satpen</small>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-3">

                    <div>
                        <form class="d-flex justify-content-between mb-3 flex-wrap gap-2">
                            <div class="d-flex gap-2">
                                @if (in_array(auth()->user()->role, ['super admin']))
                                    <a href="{{ route('a.other.sync') }}" class="btn btn-modern-info btn-action">
                                        <i class="ti ti-reload"></i> Sinkron Bulk
                                    </a>
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
                                                    'name' => 'lingkungan_satpen',
                                                    'prefix' => '',
                                                    'current' => request('lingkungan_satpen'),
                                                    'default' => 'LINGKUNGAN SATPEN',
                                                    'val' => 'id',
                                                    'label' => 'name',
                                                    'data' => [
                                                        ['id' => 'Sekolah berbasis Pondok Pesantren', 'name' => 'Sekolah berbasis Pondok Pesantren'],
                                                        ['id' => 'Sekolah Boarding', 'name' => 'Sekolah Boarding'],
                                                        ['id' => 'Sekolah biasa', 'name' => 'Sekolah biasa'],
                                                    ],
                                                ])
                                            </div>

                                            <div class="mb-3">
                                                @include('component.selectpicker', [
                                                    'name' => 'akreditasi',
                                                    'prefix' => '',
                                                    'current' => request('akreditasi'),
                                                    'default' => 'AKREDITASI',
                                                    'val' => 'id',
                                                    'label' => 'name',
                                                    'data' => [
                                                        ['id' => 'A', 'name' => 'A (Unggulan)'],
                                                        ['id' => 'B', 'name' => 'B (Baik)'],
                                                        ['id' => 'C', 'name' => 'C (Cukup Baik)'],
                                                        ['id' => '-', 'name' => 'Tidak Terakreditasi'],
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
                                        <th width="2%" class="text-center">#</th>
                                        <th width="8%">No. Registrasi</th>
                                        <th width="12%">Nama Satpen</th>
                                        <th width="6%">Jenjang</th>
                                        <th width="8%">Provinsi</th>
                                        <th width="8%">Kab/Kota</th>
                                        <th width="8%">NPYP</th>
                                        <th width="7%">Naungan</th>
                                        <th width="8%">No. SK Pendirian</th>
                                        <th width="7%">Tgl. SK Pendirian</th>
                                        <th width="8%">No. SK Operasional</th>
                                        <th width="7%">Tgl. SK Operasional</th>
                                        <th width="6%" class="text-center">Akreditasi</th>
                                        <th width="8%">Website</th>
                                        <th width="10%">Lingkungan Satpen</th>
                                        <th width="7%" class="text-center">Last Sync</th>
                                        <th width="4%" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($othersData->count() > 0)
                                        @foreach ($othersData as $row)
                                            @php($akreditasiBadge = 'badge-akreditasi-none')
                                            @if ($row->akreditasi == 'A')
                                                @php($akreditasiBadge = 'badge-akreditasi-a')
                                            @elseif ($row->akreditasi == 'B')
                                                @php($akreditasiBadge = 'badge-akreditasi-b')
                                            @elseif ($row->akreditasi == 'C')
                                                @php($akreditasiBadge = 'badge-akreditasi-c')
                                            @endif
                                            <tr>
                                                <td class="text-center">
                                                    <span class="badge bg-light text-dark">{{ $loop->iteration }}</span>
                                                </td>
                                                <td><small class="fw-bold">{{ $row->satpen->no_registrasi }}</small></td>
                                                <td><strong>{{ $row->satpen->nm_satpen }}</strong></td>
                                                <td><small>{{ $row->satpen->jenjang->nm_jenjang }}</small></td>
                                                <td><small>{{ $row->satpen->provinsi->nm_prov }}</small></td>
                                                <td><small>{{ $row->satpen->kabupaten->nama_kab }}</small></td>
                                                <td><small class="text-primary fw-bold">{{ $row->npyp }}</small></td>
                                                <td><small>{{ $row->naungan }}</small></td>
                                                <td><small>{{ $row->no_sk_pendirian }}</small></td>
                                                <td><small>{{ Date::tglReverseDash($row->tgl_sk_pendirian) }}</small></td>
                                                <td><small>{{ $row->no_sk_operasional }}</small></td>
                                                <td><small>{{ Date::tglReverseDash($row->tgl_sk_operasional) }}</small></td>
                                                <td class="text-center">
                                                    <span class="badge-modern {{ $akreditasiBadge }}">
                                                        {{ $row->akreditasi ?: '-' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @if($row->website)
                                                        <a href="{{ $row->website }}" target="_blank" class="text-primary text-decoration-none">
                                                            <i class="ti ti-external-link"></i> <small>Website</small>
                                                        </a>
                                                    @else
                                                        <small class="text-muted">-</small>
                                                    @endif
                                                </td>
                                                <td><small>{{ $row->lingkungan_satpen }}</small></td>
                                                <td class="text-center"><small>{{ $row->last_sinkron }}</small></td>
                                                <td class="text-center">
                                                    <a href="{{ route('a.other.syncid', $row->id_satpen) }}"
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
                            {{ $othersData->links() }}
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection

@section('extendscripts')
    <script>
        $(".deleteBtn").on('click', function() {
            if (confirm("Apakah Anda yakin akan menghapus data ini? Data yang dihapus tidak dapat dikembalikan.")) {
                return true;
            }
            return false;
        });

        $("#export-btn").attr("href", "{{ route('other.excel') }}" + location.search);
    </script>
@endsection
