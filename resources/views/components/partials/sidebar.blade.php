<aside class="sidebar-modern">

    <!-- BRAND -->
    <div class="brand-area" style="display:flex; align-items:center; gap:10px;">
        <div class="logo-placeholder">K</div>

        <div style="display:flex; flex-direction:column;">
            <h2 style="font-size: 1.1rem; margin:0; line-height:1;">
                Poliklinik
            </h2>
            <span style="background: rgba(255,255,255,0.2); 
                         padding: 2px 8px; 
                         border-radius: 8px; 
                         font-size: 0.65rem; 
                         width: fit-content;">
                ADMIN
            </span>
        </div>
    </div>

    <!-- MENU -->
    <nav class="nav-modern">
        <div class="nav-header">Menu Admin</div>

        <a href="{{ route('admin.dashboard') }}" 
           class="nav-link-modern {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('admin.poli.index') }}" 
           class="nav-link-modern {{ request()->routeIs('admin.poli.*') ? 'active' : '' }}">
            <i class="fas fa-hospital"></i>
            <span>Manajemen Poli</span>
        </a>

        <a href="{{ route('admin.dokter.index') }}" 
           class="nav-link-modern {{ request()->routeIs('admin.dokter.*') ? 'active' : '' }}">
            <i class="fas fa-user-doctor"></i>
            <span>Manajemen Dokter</span>
        </a>

        <a href="{{ route('admin.pasien.index') }}" 
           class="nav-link-modern {{ request()->routeIs('admin.pasien.*') ? 'active' : '' }}">
            <i class="fas fa-bed-pulse"></i>
            <span>Manajemen Pasien</span>
        </a>

        <a href="{{ route('admin.obat.index') }}" 
           class="nav-link-modern {{ request()->routeIs('admin.obat.*') ? 'active' : '' }}">
            <i class="fas fa-pills"></i>
            <span>Manajemen Obat</span>
        </a>
    </nav>

    <!-- LOGOUT -->
    <div class="logout-area">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">
                <i class="fas fa-sign-out-alt"></i>
                <span>Keluar</span>
            </button>
        </form>
    </div>

</aside>