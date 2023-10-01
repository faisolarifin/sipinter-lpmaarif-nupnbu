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

        @if(in_array(auth()->user()->role, ["super admin", "admin pusat"]))

        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Satpen</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('a.vnpsn') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-message-code"></i>
                </span>
                <span class="hide-menu">NPSN Virtual</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('a.satpen') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Registrasi Satpen</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('a.rekapsatpen') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Rekap Satpen</span>
            </a>
        </li>
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Permohonan</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('a.oss') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-device-sim"></i>
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
            <a class="sidebar-link" href="{{ route('a.bantuan') }}" aria-expanded="false">
            <span>
              <i class="ti ti-help"></i>
            </span>
                <span class="hide-menu">Layanan Bantuan Sekolah</span>
            </a>
        </li>
            <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('a.beasiswa') }}" aria-expanded="false">
            <span>
              <i class="ti ti-award"></i>
            </span>
                <span class="hide-menu">Layanan Beasiswa</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('a.katalog') }}" aria-expanded="false">
            <span>
              <i class="ti ti-paperclip"></i>
            </span>
                <span class="hide-menu">Katalog</span>
            </a>
        </li>
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Artikel</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('informasi.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-news"></i>
                </span>
                <span class="hide-menu">Kelola Informasi</span>
            </a>
        </li>

            @if(in_array(auth()->user()->role, ["super admin"]))

            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Manajemen User</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('users.index') }}" aria-expanded="false">
                    <span>
                      <i class="ti ti-users"></i>
                    </span>
                    <span class="hide-menu">Kelola Admin</span>
                </a>
            </li>

            @endif

        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Master Data</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('propinsi.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-brand-mastercard"></i>
                </span>
                <span class="hide-menu">Data Propinsi</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('kabupaten.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-mask"></i>
                </span>
                <span class="hide-menu">Data Kabupaten</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('cabang.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-git-branch"></i>
                </span>
                <span class="hide-menu">Pengurus Cabang</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('jenjang.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-keyframe-align-vertical"></i>
                </span>
                <span class="hide-menu">Jenjang Pendidikan</span>
            </a>
        </li>

        @elseif(in_array(auth()->user()->role, ["admin wilayah", "admin cabang"]))

            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Satpen</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('a.rekapsatpen') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                    <span class="hide-menu">Rekap Satpen</span>
                </a>
            </li>

        @endif

    </ul>
</nav>
