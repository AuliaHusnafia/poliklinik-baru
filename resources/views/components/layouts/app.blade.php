{{-- File: resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Poliklinik - {{ $title ?? 'Dashboard' }}</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    @stack('styles')
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: #f1f5f9;
            color: #0f172a;
        }
        
        /* Layout */
        .app-wrapper {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar Style Terbaru */
.sidebar-modern {
    width: 260px;
    background-color: #1e3a8a; /* Biru Solid sesuai contoh */
    color: white;
    position: fixed;
    height: 100vh;
    display: flex;
    flex-direction: column; /* Memungkinkan elemen diatur atas-bawah */
    transition: all 0.3s ease;
    z-index: 100;
}

.brand-area {
    padding: 2rem 1.5rem;
    text-align: center;
}

.brand-area .logo-placeholder {
    width: 50px;
    height: 50px;
    background: white;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: #1e3a8a;
    font-weight: bold;
    font-size: 1.5rem;
    margin-bottom: 10px;
}

.brand-area h2 {
    font-size: 1.2rem;
    color: white;
    margin: 0;
}

.brand-area span.badge-admin {
    background: rgba(255,255,255,0.2);
    padding: 2px 10px;
    border-radius: 10px;
    font-size: 0.7rem;
    text-transform: uppercase;
}

.nav-modern {
    flex: 1; /* Mengisi ruang tengah */
    padding: 0 1rem;
}

.nav-header {
    font-size: 0.75rem;
    color: rgba(255,255,255,0.6);
    padding: 1rem;
    font-weight: 600;
}

.nav-link-modern {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 0.8rem 1rem;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    margin-bottom: 5px;
    transition: 0.2s;
}

.nav-link-modern:hover, .nav-link-modern.active {
    background: rgba(255,255,255,0.1);
    border: 1px solid rgba(255,255,255,0.3);
}

/* Tombol Keluar di Bawah */
.logout-area {
    padding: 1.5rem 1rem;
}

.btn-logout-sidebar {
    background-color: #ef4444; /* Merah sesuai contoh */
    color: white;
    border: none;
    width: 100%;
    padding: 12px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
}
        /* Main Content */
        .main-content-modern {
            flex: 1;
            margin-left: 280px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .top-header {
            background: rgba(255,255,255,0.95);
            padding: 0.875rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e2e8f0;
            position: sticky;
            top: 0;
            z-index: 50;
            backdrop-filter: blur(8px);
        }

        .content-area { padding: 2rem; flex: 1; }

        /* Card & Table Perbaikan */
        .card-modern {
            background: white;
            border-radius: 16px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 20px;
        }

        .card-header-modern {
            padding: 1.25rem 1.75rem;
            border-bottom: 1px solid #f3f4f6;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-modern {
            width: 100%;
            border-collapse: collapse;
        }

        .table-modern th {
            background: #f8fafc;
            padding: 1rem 1.5rem;
            text-align: left;
            font-weight: 600;
            font-size: 0.85rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .table-modern td {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #f0f2f5;
            font-size: 0.9rem;
        }

        /* Tombol Aksi agar simetris (Penting!) */
        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
        }

        .btn-edit-small, .btn-delete-small {
            padding: 6px 14px !important;
            border-radius: 8px !important;
            font-size: 0.8rem !important;
            font-weight: 600 !important;
            display: inline-flex !important;
            align-items: center;
            gap: 5px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-edit-small { background: #fef3c7 !important; color: #b45309 !important; }
        .btn-delete-small { background: #fee2e2 !important; color: #dc2626 !important; }

        .btn-primary-modern {
            background-color: #1e3a8a;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .footer-modern {
            padding: 1.5rem 2rem;
            text-align: center;
            font-size: 0.8rem;
            color: #64748b;
            border-top: 1px solid #e2e8f0;
        }
    </style>
</head>
<body>
    <div class="app-wrapper">
        <aside class="sidebar-modern">
    <div class="brand-area">
        <div class="logo-placeholder">K</div>
        <h2>Poliklinik</h2>
        <span class="badge-admin">Admin</span>
    </div>

    <div class="nav-modern">
        <div class="nav-header">MENU ADMIN</div>
        
        <a href="{{ route('admin.dashboard') }}" class="nav-link-modern {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i> <span>Dashboard Admin</span>
        </a>
        
        <a href="{{ route('admin.polis.index') }}" class="nav-link-modern {{ request()->routeIs('admin.polis.*') ? 'active' : '' }}">
            <i class="fas fa-hospital"></i> <span>Manajemen Poli</span>
        </a>
    </div>

    <div class="logout-area">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout-sidebar">
                <i class="fas fa-sign-out-alt"></i> Keluar
            </button>
        </form>
    </div>
</aside>
        <main class="main-content-modern">
            <header class="top-header">
                <div class="page-title">{{ $title ?? 'Dashboard' }}</div>
                <div class="user-info" style="display: flex; align-items: center; gap: 12px;">
                    <div style="text-align: right;">
                        <div style="font-size: 0.85rem; font-weight: 600;">Admin</div>
                        <div style="font-size: 0.7rem; color: #64748b;">Administrator</div>
                    </div>
                    <div style="width: 35px; height: 35px; background: #3b82f6; border-radius: 50%; color: white; display: flex; align-items: center; justify-content: center; font-weight: bold;">A</div>
                </div>
            </header>

            <div class="content-area">
                @if(session('success'))
                    <div style="background: #dcfce7; color: #166534; padding: 1rem; border-radius: 12px; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif
                {{ $slot }}
            </div>

            <footer class="footer-modern">
                Copyright &copy; {{ date('Y') }} — All rights reserved by Poliklinik
            </footer>
        </main>
    </div>
    @stack('scripts')
</body>
</html>