<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
    <ul id="sidebarnav">
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Kelembagaan</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('mysatpen') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-user-circle"></i>
                </span>
                <span class="hide-menu">My Profile</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('pdptk') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Data PD & PTK</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('other') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-database"></i>
                </span>
                <span class="hide-menu">Data Lainnya</span>
            </a>
        </li>
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Permohonan</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('oss') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-certificate"></i>
                </span>
                <span class="hide-menu">Layanan OSS</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('bhpnu') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-report"></i>
                </span>
                <span class="hide-menu">Layanan BHPNU</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('coretax') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-file-invoice"></i>
                </span>
                <span class="hide-menu">Layanan Coretax</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                <span>
                    <i class="ti ti-id-badge"></i>
                </span>
                <span class="hide-menu">Manajemen NPYP</span>
            </a>
            <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                    <a href="{{ route('npyp.index') }}" class="sidebar-link">
                        <span class="hide-menu">Data NPYP</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('ptk.index') }}" class="sidebar-link">
                        <span class="hide-menu">Ajuan Verval PTK</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('bantuan') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-lifebuoy"></i>
                </span>
                <span class="hide-menu">Layanan Bantuan Sekolah</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('beasiswa') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-school"></i>
                </span>
                <span class="hide-menu">Layanan Beasiswa</span>
            </a>
        </li>
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Lainnya</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('katalog') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-book-2"></i>
                </span>
                <span class="hide-menu">Katalog</span>
            </a>
        </li>
    </ul>
</nav>
