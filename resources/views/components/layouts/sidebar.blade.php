<aside class="sidebar-modern">
    <div class="brand-area">
        <div class="logo-placeholder">K</div>
        <h2 style="font-size: 1.2rem;">Poliklinik</h2>
        <span style="background: rgba(255,255,255,0.2); padding: 2px 10px; border-radius: 10px; font-size: 0.7rem;">ADMIN</span>
    </div>

    <nav class="nav-modern">
        <div style="font-size: 0.7rem; color: rgba(255,255,255,0.5); padding: 1rem 1.2rem; font-weight: 700;">MENU UTAMA</div>
        
        {{-- Dashboard --}}
        <a href="{{ route('admin.dashboard') }}" class="nav-link-modern {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
        </a>
        
        {{-- Manajemen Poli --}}
        <a href="{{ route('admin.polis.index') }}" class="nav-link-modern {{ request()->routeIs('admin.polis.*') ? 'active' : '' }}">
            <i class="fas fa-hospital"></i> <span>Manajemen Poli</span>
        </a>

        {{-- Manajemen Dokter --}}
        <a href="{{ route('admin.dokter.index') }}" class="nav-link-modern {{ request()->routeIs('admin.dokter.*') ? 'active' : '' }}">
            <i class="fas fa-user-doctor"></i> <span>Manajemen Dokter</span>
        </a>

        {{-- TAMBAHAN: Manajemen Pasien (Sesuai Tutorial) --}}
        <a href="{{ route('admin.pasien.index') }}" class="nav-link-modern {{ request()->routeIs('admin.pasien.*') ? 'active' : '' }}">
            <i class="fas fa-bed-pulse"></i> <span>Manajemen Pasien</span>
        </a>
    </nav>

    <div class="logout-area">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout-sidebar">
                <i class="fas fa-sign-out-alt"></i> Keluar
            </button>
        </form>
    </div>
</aside>