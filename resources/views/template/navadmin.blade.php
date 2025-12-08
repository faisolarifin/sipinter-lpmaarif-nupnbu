<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
    <ul id="sidebarnav">
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('a.dash') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>
        @if (in_array(auth()->user()->role, ['admin wilayah', 'admin cabang']))
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('profile') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-building"></i>
                    </span>
                    <span class="hide-menu">Profile Organisasi</span>
                </a>
            </li>
        @endif

        @if (in_array(auth()->user()->role, ['super admin', 'admin pusat']))

            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Satpen</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('a.vnpsn') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-id-badge-2"></i>
                    </span>
                    <span class="hide-menu">NPSN Virtual</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('a.satpen') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-school"></i>
                    </span>
                    <span class="hide-menu">Registrasi Satpen</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('a.rekapsatpen') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-chart-pie"></i>
                    </span>
                    <span class="hide-menu">Rekap Satpen</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('a.pdptk') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-users"></i>
                    </span>
                    <span class="hide-menu">Data PD dan PTK</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('a.other') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-database"></i>
                    </span>
                    <span class="hide-menu">Data Lainnya</span>
                </a>
            </li>
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Rekap Permohonan</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('a.oss') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-certificate"></i>
                    </span>
                    <span class="hide-menu">Layanan OSS</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('a.bhpnu') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-report"></i>
                    </span>
                    <span class="hide-menu">Layanan BHPNU</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('a.coretax') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-receipt"></i>
                    </span>
                    <span class="hide-menu">Manajemen Coretax</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <span>
                        <i class="ti ti-certificate"></i>
                    </span>
                    <span class="hide-menu">Manajemen NPYP</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('a.npyp') }}" class="sidebar-link">
                            <span class="hide-menu">Data NPYP Pusat</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('a.npyp.wilayah') }}" class="sidebar-link">
                            <span class="hide-menu">Data NPYP Wilayah</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('a.npyp.cabang') }}" class="sidebar-link">
                            <span class="hide-menu">Data NPYP Cabang</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.ptk.verifikasi') }}" class="sidebar-link">
                            <span class="hide-menu">Verifikasi PTK</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('a.npyp.rekap-ptk') }}" class="sidebar-link">
                            <span class="hide-menu">Rekap PTK Nasional</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('a.bantuan') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-lifebuoy"></i>
                    </span>
                    <span class="hide-menu">Layanan Bantuan Sekolah</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('a.beasiswa') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-school"></i>
                    </span>
                    <span class="hide-menu">Layanan Beasiswa</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('a.katalog') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-book-2"></i>
                    </span>
                    <span class="hide-menu">Katalog</span>
                </a>
            </li>
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Profile Daerah</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('a.wilayah') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-map-pin"></i>
                    </span>
                    <span class="hide-menu">Pengurus Wilayah</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('a.cabang') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-building"></i>
                    </span>
                    <span class="hide-menu">Pengurus Cabang</span>
                </a>
            </li>
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Artikel</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('informasi.index') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-article"></i>
                    </span>
                    <span class="hide-menu">Kelola Informasi</span>
                </a>
            </li>

            @if (in_array(auth()->user()->role, ['super admin']))
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Pengaturan</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('users.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-user"></i>
                        </span>
                        <span class="hide-menu">Kelola Admin</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('users.satpen') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu">Kelola Users</span>
                    </a>
                </li>

                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('a.logactivity') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-history"></i>
                        </span>
                        <span class="hide-menu">Log Activity</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('a.setting') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-settings"></i>
                        </span>
                        <span class="hide-menu">Konfigurasi</span>
                    </a>
                </li>
            @endif

            @if (in_array(auth()->user()->role, ['super admin']))
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Master Data</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('dapo.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-database"></i>
                        </span>
                        <span class="hide-menu">Dapo LP Ma'arif</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('propinsi.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-map"></i>
                        </span>
                        <span class="hide-menu">Data Propinsi</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('kabupaten.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-map-pin"></i>
                        </span>
                        <span class="hide-menu">Data Kabupaten</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('cabang.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-building-warehouse"></i>
                        </span>
                        <span class="hide-menu">Pengurus Cabang</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('jenjang.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-stairs"></i>
                        </span>
                        <span class="hide-menu">Jenjang Pendidikan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('tapel.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-calendar-stats"></i>
                        </span>
                        <span class="hide-menu">Tahun Pelajaran</span>
                    </a>
                </li>
            @endif
        @elseif(in_array(auth()->user()->role, ['admin wilayah', 'admin cabang']))
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Satpen</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('a.rekapsatpen') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-chart-pie"></i>
                    </span>
                    <span class="hide-menu">Rekap Satpen</span>
                </a>
            </li>
             <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('a.pdptk') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-users"></i>
                    </span>
                    <span class="hide-menu">Data PD dan PTK</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('a.other') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-database"></i>
                    </span>
                    <span class="hide-menu">Data Lainnya</span>
                </a>
            </li>
            @if (in_array(auth()->user()->role, ['admin wilayah']))
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Profile Daerah</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('a.cabang') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-building"></i>
                        </span>
                        <span class="hide-menu">Pengurus Cabang</span>
                    </a>
                </li>
            @endif
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Rekap Permohonan</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('a.oss') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-certificate"></i>
                    </span>
                    <span class="hide-menu">Layanan OSS</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('a.bhpnu') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-report"></i>
                    </span>
                    <span class="hide-menu">Layanan BHPNU</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('a.coretax') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-receipt"></i>
                    </span>
                    <span class="hide-menu">Manajemen Coretax</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <span>
                        <i class="ti ti-certificate"></i>
                    </span>
                    <span class="hide-menu">Manajemen NPYP</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                    @if (in_array(auth()->user()->role, ['admin wilayah']))
                    <li class="sidebar-item">
                        <a href="{{ route('a.npyp.wilayah') }}" class="sidebar-link">
                            <span class="hide-menu">Data NPYP Wilayah</span>
                        </a>
                    </li>
                    @endif
                    <li class="sidebar-item">
                        <a href="{{ route('a.npyp.cabang') }}" class="sidebar-link">
                            <span class="hide-menu">Data NPYP Cabang</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.ptk.verifikasi') }}" class="sidebar-link">
                            <span class="hide-menu">Verifikasi PTK</span>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Pengajuan</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('coretax') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-file-invoice"></i>
                    </span>
                    <span class="hide-menu">Layanan Coretax</span>
                </a>
            </li>

        @endif

    </ul>
</nav>
