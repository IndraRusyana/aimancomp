<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" style="z-index: 998">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <img src="{{asset('assets\img\icons\brands\aiman.png')}}" alt="" srcset="" width="50">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Aiman Comp</span>
        </a>

        <a href="javascript:void(0);"
            class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul id="sidebar" class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item @yield('dashboard')">
            <a href="{{route('dashboardAdmin')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Admin</span>
        </li>
        <li class="menu-item @yield('layanan')" data-value='{"path":"menu"}'>
            <a href="/admin/layanan/services" class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-ul"></i>
                <div data-i18n="Layanan">Layanan</div>
            </a>    
        </li>
        <li class="menu-item @yield('keanggotaan')">
            <a href="/admin/keanggotaan/admins" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div data-i18n="Table Keanggotaan">Table Keanggotaan</div>
            </a>
        </li>
        <li class="menu-item @yield('pekerjaan')">
            <a href="/admin/pekerjaan/jobservices" class="menu-link">
                <i class="menu-icon tf-icons bx bx-task"></i>
                <div data-i18n="Daftar Pekerjaan">Daftar Pekerjaan</div>
            </a>
        </li>
        <li class="menu-item @yield('laporan')">
            <a href="/admin/laporan" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-report"></i>
                <div data-i18n="Daftar Pekerjaan">Laporan Keuangan</div>
            </a>
        </li>
        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Web Store</span></li>
        <!-- Cards -->
        <li class="menu-item @yield('store')">
            <a href="" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-store"></i>
                <div data-i18n="Basic">Manajemen</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->
