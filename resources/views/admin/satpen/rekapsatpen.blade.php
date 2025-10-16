@extends('template.layout', [
    'title' => 'Sipinter - Rekapitulasi Satuan Pendidikan',
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

    .badge-kategori {
        background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        color: #2563eb;
    }

    .badge-jenjang-ra {
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        color: #dc2626;
    }

    .badge-jenjang-mi {
        background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        color: #2563eb;
    }

    .badge-jenjang-mts {
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        color: #d97706;
    }

    .badge-jenjang-ma {
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
        color: #059669;
    }

    .badge-active {
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
        color: #059669;
    }

    .badge-expired {
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

    .btn-modern-danger {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: white;
    }

    .btn-modern-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(239, 68, 68, 0.3);
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

    /* Expired Style */
    .expired {
        color: #dc2626 !important;
        font-weight: 700;
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
                    <li><a href="#"><span class="fa fa-snowflake-o"></span> Rekap Satpen</a></li>
                </ul>
            </nav>

            @include('template.alert')

            <div class="modern-card">
                <div class="modern-card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0">
                                <span class="card-icon">
                                    <i class="ti ti-file-database"></i>
                                </span>
                                Rekapitulasi Satuan Pendidikan
                            </h5>
                            <small>Data satuan pendidikan yang telah disetujui dan aktif terdaftar</small>
                        </div>
                        <div class="stats-card-inline text-center">
                            <h5 class="mb-0">{{ $satpenProfileCount }}</h5>
                            <small>Total Satpen</small>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-3">
                    <div class="table-responsive">
                        <form class="d-flex justify-content-end mb-3 gap-2 flex-wrap">
                            <div class="d-flex gap-2">
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
                        </form>
                        <table class="table modern-table" id="mytable">
                            <thead>
                                <tr>
                                    <th width="3%" class="text-center">#</th>
                                    <th width="10%">Kategori</th>
                                    <th width="10%">NPSN</th>
                                    <th width="12%">No. Registrasi</th>
                                    <th width="18%">Nama Satpen</th>
                                    <th width="13%">Yayasan</th>
                                    <th width="8%">Jenjang</th>
                                    <th width="10%">Provinsi</th>
                                    <th width="10%">Kabupaten</th>
                                    <th width="8%">Aktif</th>
                                    <th width="8%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($no = 0)
                                @php($today = \Carbon\Carbon::now())
                                @if ($satpenProfile->count() > 0)
                                    @foreach ($satpenProfile as $row)
                                        @php($diff = $today->diffInMonths(\Carbon\Carbon::parse($row->actived_date)))
                                        @php($jenjang = $row->jenjang->nm_jenjang)
                                        @php($badgeClass = 'badge-jenjang-ra')
                                        @if (in_array($jenjang, ['MI', 'SD']))
                                            @php($badgeClass = 'badge-jenjang-mi')
                                        @elseif (in_array($jenjang, ['MTs', 'SMP']))
                                            @php($badgeClass = 'badge-jenjang-mts')
                                        @elseif (in_array($jenjang, ['MA', 'SMA', 'SMK']))
                                            @php($badgeClass = 'badge-jenjang-ma')
                                        @endif
                                        <tr>
                                            <td class="text-center">
                                                <span class="badge bg-light text-dark">{{ ++$no }}</span>
                                            </td>
                                            <td>
                                                <span class="badge-modern badge-kategori">{{ $row->kategori?->nm_kategori }}</span>
                                            </td>
                                            <td>
                                                <strong class="text-primary">{{ $row->npsn }}</strong>
                                            </td>
                                            <td>
                                                <small class="fw-bold">{{ $row->no_registrasi }}</small>
                                            </td>
                                            <td>
                                                <strong>{{ $row->nm_satpen }}</strong>
                                            </td>
                                            <td>
                                                <small>{{ $row->yayasan }}</small>
                                            </td>
                                            <td>
                                                <span class="badge-modern {{ $badgeClass }}">{{ $jenjang }}</span>
                                            </td>
                                            <td>
                                                <small>{{ $row->provinsi->nm_prov }}</small>
                                            </td>
                                            <td>
                                                <small>{{ $row->kabupaten->nama_kab }}</small>
                                            </td>
                                            <td>
                                                <span class="badge-modern {{ $row->status == 'expired' ? 'badge-expired' : 'badge-active' }}">
                                                    {{ $diff . ' bulan' }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center gap-1">
                                                    <a href="{{ route('a.rekapsatpen.detail', $row->id_satpen) }}">
                                                        <button class="btn btn-modern-info btn-action" title="Lihat Detail">
                                                            <i class="ti ti-eye"></i>
                                                        </button>
                                                    </a>

                                                    @if (in_array(auth()->user()->role, ['super admin']))
                                                        <form action="{{ route('a.rekapsatpen.destroy', $row->id_satpen) }}"
                                                            method="post" class="d-inline deleteBtn">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-modern-danger btn-action" title="Hapus Data">
                                                                <i class="ti ti-trash"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="11" class="text-center py-4">
                                            <div class="text-muted">
                                                <i class="ti ti-inbox-off fs-1"></i>
                                                <p class="mt-2 mb-0">Tidak ada data tersedia</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $satpenProfile->links() }}
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
            if (confirm("Apakah Anda yakin akan menghapus data satuan pendidikan ini? Data yang dihapus tidak dapat dikembalikan.")) {
                return true;
            }
            return false;
        });

        $("#export-btn").attr("href", "{{ route('satpen.excel') }}" + location.search);
    </script>
@endsection
