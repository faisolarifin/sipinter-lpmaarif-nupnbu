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
            <span class="hide-menu">Permohonan</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('mysatpen') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">My Profile</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('oss') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-device-sim"></i>
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
            <a class="sidebar-link" href="{{ route('bantuan') }}" aria-expanded="false">
            <span>
              <i class="ti ti-help"></i>
            </span>
                <span class="hide-menu">Layanan Bantuan Sekolah</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('beasiswa') }}" aria-expanded="false">
            <span>
              <i class="ti ti-award"></i>
            </span>
                <span class="hide-menu">Layanan Beasiswa Pendidikan</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('katalog') }}" aria-expanded="false">
            <span>
              <i class="ti ti-paperclip"></i>
            </span>
                <span class="hide-menu">Katalog</span>
            </a>
        </li>
    </ul>
</nav>
