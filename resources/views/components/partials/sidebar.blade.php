<aside class="main-sidebar sidebar-dark-indigo elevation-4">
    <a href="#" class="brand-link border-bottom border-white/10">
        <div class="flex items-center gap-3 px-2">
            <img src="{{ asset('images/logo-bengkot.png') }}" class="brand-image img-circle elevation-3">
            <span class="brand-text font-weight-light">Poliklinik</span>
        </div>
    </a>

    <div class="sidebar">
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column gap-1" data-widget="treeview" role="menu">
                <li class="nav-header text-xs text-uppercase opacity-50">Menu Admin</li>
                
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>Dashboard Admin</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('polis.index') }}" class="nav-link {{ request()->routeIs('polis.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-hospital"></i>
                        <p>Manajemen Poli</p>
                    </a>
                </li>

                <li class="nav-item mt-10">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link btn btn-danger text-white text-left w-full">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Keluar</p>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>