<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poliklinik - {{ $title ?? 'Dashboard' }}</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        /* CSS RESET & BASE */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #f1f5f9; color: #0f172a; overflow-x: hidden; }

        .app-wrapper { display: flex; min-height: 100vh; }

        /* SIDEBAR STYLE */
        .sidebar-modern {
            width: 280px; 
            background-color: #1e3a8a; 
            color: white;
            position: fixed; 
            height: 100vh; 
            display: flex; 
            flex-direction: column;
            z-index: 1000;
        }

        .brand-area { padding: 2rem 1.5rem; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .logo-placeholder { 
            width: 55px; height: 55px; background: white; border-radius: 50%; 
            display: inline-flex; align-items: center; justify-content: center; 
            color: #1e3a8a; font-weight: bold; font-size: 1.4rem; margin-bottom: 10px;
        }

        .nav-modern { flex: 1; padding: 1rem; }
        .nav-header { font-size: 0.7rem; color: rgba(255,255,255,0.5); padding: 1rem; font-weight: 700; text-transform: uppercase; }
        
        .nav-link-modern {
            display: flex; align-items: center; gap: 12px; padding: 0.9rem 1.2rem;
            color: rgba(255,255,255,0.7); text-decoration: none; border-radius: 10px; margin-bottom: 5px; transition: 0.3s;
        }
        .nav-link-modern:hover, .nav-link-modern.active {
            background: rgba(255,255,255,0.1); color: white;
        }

        .logout-area { padding: 1.5rem 1rem; }
        .btn-logout {
            background: #ef4444; color: white; border: none; width: 100%;
            padding: 12px; border-radius: 12px; cursor: pointer; font-weight: 600;
            display: flex; align-items: center; justify-content: center; gap: 8px; transition: 0.2s;
        }
        .btn-logout:hover { background: #dc2626; }

        /* MAIN CONTENT STYLE */
        .main-content {
            flex: 1;
            margin-left: 280px; 
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header.top-bar {
            background: white; 
            padding: 1rem 2rem; 
            display: flex;
            justify-content: space-between; 
            align-items: center; 
            border-bottom: 1px solid #e2e8f0;
            position: sticky; top: 0; z-index: 900;
        }

        .content-body { padding: 2.5rem; flex: 1; }

        .card { 
            background: white; border-radius: 16px; padding: 2rem; 
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); border: 1px solid #e5e7eb;
        }

        /* Styling Tabel */
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        th { text-align: left; padding: 12px; border-bottom: 2px solid #f1f5f9; color: #64748b; font-size: 0.85rem; background: #f8fafc; text-transform: uppercase; }
        td { padding: 15px 12px; border-bottom: 1px solid #f1f5f9; font-size: 0.9rem; vertical-align: middle; }
        tr:hover { background: #f8fafc; }

        .btn-primary { background: #4338ca; color: white; padding: 10px 18px; border-radius: 10px; text-decoration: none; font-weight: 600; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 8px; border: none; }
        .btn-edit { background: #fef9c3; color: #a16207; padding: 6px 12px; border-radius: 6px; text-decoration: none; font-size: 0.8rem; font-weight: 600; border: 1px solid #fde047; }
        .btn-delete { background: #fee2e2; color: #991b1b; padding: 6px 12px; border-radius: 6px; border: 1px solid #fecaca; cursor: pointer; font-size: 0.8rem; font-weight: 600; }
        
        .badge-poli { background-color: #dbeafe; color: #1e40af; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; display: inline-block; }

        /* Style Tombol Edit Modern */
.btn-action-edit {
    background-color: #f59e0b; /* Warna Oranye */
    color: white !important;
    padding: 6px 14px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 0.8rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    transition: 0.3s;
    border: none;
}

.btn-action-edit:hover {
    background-color: #d97706;
    transform: translateY(-1px);
}

/* Style Tombol Hapus Modern */
.btn-action-delete {
    background-color: #ef4444; /* Warna Merah */
    color: white !important;
    padding: 6px 14px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    font-size: 0.8rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    transition: 0.3s;
}

.btn-action-delete:hover {
    background-color: #dc2626;
    transform: translateY(-1px);
}
    </style>
</head>
<body>
    <div class="app-wrapper">
        <aside class="sidebar-modern">
            <div class="brand-area">
                <div class="logo-placeholder">K</div>
                <h2 style="font-size: 1.25rem;">Poliklinik</h2>
                <span style="background: rgba(255,255,255,0.2); padding: 2px 10px; border-radius: 10px; font-size: 0.7rem;">ADMIN</span>
            </div>

            <nav class="nav-modern">
                <div class="nav-header">Menu Admin</div>
                
                <a href="{{ route('admin.dashboard') }}" class="nav-link-modern {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
                </a>
                
                <a href="{{ route('admin.polis.index') }}" class="nav-link-modern {{ request()->routeIs('admin.polis.*') ? 'active' : '' }}">
                    <i class="fas fa-hospital"></i> <span>Manajemen Poli</span>
                </a>

                <a href="{{ route('admin.dokter.index') }}" class="nav-link-modern {{ request()->routeIs('admin.dokter.*') ? 'active' : '' }}">
                    <i class="fas fa-user-doctor"></i> <span>Manajemen Dokter</span>
                </a>

                {{-- INI KODE TAMBAHAN DARI TUTORIAL: Manajemen Pasien --}}
                <a href="{{ route('admin.pasien.index') }}" class="nav-link-modern {{ request()->routeIs('admin.pasien.*') ? 'active' : '' }}">
                    <i class="fas fa-bed-pulse"></i> <span>Manajemen Pasien</span>
                </a>
            </nav>

            <div class="logout-area">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-logout">
                        <i class="fas fa-sign-out-alt"></i> Keluar
                    </button>
                </form>
            </div>
        </aside>

        <main class="main-content">
            <header class="top-bar">
                <div style="font-weight: 700; color: #1e3a8a;">{{ $title ?? 'Dashboard' }}</div>
                <div style="display: flex; align-items: center; gap: 12px;">
                    <div style="text-align: right;">
                        <div style="font-size: 0.85rem; font-weight: 600;">Admin</div>
                        <div style="font-size: 0.7rem; color: #64748b;">Administrator</div>
                    </div>
                    <div style="width: 40px; height: 40px; background: #1e3a8a; border-radius: 50%; color: white; display: flex; align-items: center; justify-content: center; font-weight: bold;">A</div>
                </div>
            </header>

            <div class="content-body">
                {{ $slot }}
            </div>

            <footer style="padding: 1.5rem; text-align: center; font-size: 0.8rem; color: #64748b;">
                &copy; {{ date('Y') }} Poliklinik — All rights reserved.
            </footer>
        </main>
    </div>
</body>
</html>