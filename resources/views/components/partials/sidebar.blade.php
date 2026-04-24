<aside class="sidebar-modern">

    <!-- BRAND -->
    <div class="brand-area" style="display:flex; align-items:center; gap:10px;">
        <div class="logo-placeholder">K</div>

        <div style="display:flex; flex-direction:column;">
            <h2 style="font-size: 1.1rem; margin:0; line-height:1;">
                Poliklinik
            </h2>
            <span>
                {{ strtoupper(auth()->user()->role) }}
            </span>
        </div>
    </div>

    <!-- MENU -->
    <nav class="nav-modern">

    @auth

        {{-- ================= ADMIN ================= --}}
        @if(auth()->user()->role == 'admin')
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
        @endif


        {{-- ================= DOKTER ================= --}}
        @if(auth()->user()->role == 'dokter')
            <div class="nav-header">Menu Dokter</div>

            <a href="{{ route('dokter.dashboard') }}" 
            class="nav-link-modern {{ request()->routeIs('dokter.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i>
                <span>Dashboard Dokter</span>
            </a>

            <a href="{{ route('dokter.jadwal-periksa.index') }}" 
            class="nav-link-modern {{ request()->routeIs('dokter.jadwal-periksa.*') ? 'active' : '' }}">
                <i class="fas fa-calendar-check"></i>
                <span>Jadwal Periksa</span>
            </a>

        @endif


         {{-- ================= PASIEN ================= --}}
        @if(auth()->user()->role == 'pasien')
            <div class="nav-header">Menu Pasien</div>

            <a href="{{ route('pasien.dashboard') }}" 
            class="nav-link-modern {{ request()->routeIs('pasien.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i>
                <span>Dashboard Pasien</span>
            </a>



                        <a href="{{ route('pasien.daftar-poli') }}" 
            class="nav-link-modern {{ request()->routeIs('pasien.daftar') ? 'active' : '' }}">
                <i class="fas fa-calendar-check"></i>
                <span>Pendaftaran Periksa</span>
            </a>
        @endif

    @endauth

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