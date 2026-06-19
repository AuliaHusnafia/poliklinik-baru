<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poliklinik</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        /* ======================================== */
        /* NOTIFICATION STYLES - POINT 5 */
        /* ======================================== */
        
        /* Success Notification */
        .notification-success {
            background: #dcfce7;
            border-left: 4px solid #22c55e;
            color: #166534;
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.875rem;
        }
        
        .notification-success i {
            color: #22c55e;
            font-size: 1.1rem;
        }
        
        /* Error Notification */
        .notification-error {
            background: #fee2e2;
            border-left: 4px solid #dc2626;
            color: #991b1b;
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.875rem;
        }
        
        .notification-error i {
            color: #dc2626;
            font-size: 1.1rem;
        }
        
        /* Warning Notification */
        .notification-warning {
            background: #fef3c7;
            border-left: 4px solid #f59e0b;
            color: #92400e;
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.875rem;
        }
        
        .notification-warning i {
            color: #f59e0b;
            font-size: 1.1rem;
        }
        
        /* Info Notification */
        .notification-info {
            background: #e0e7ff;
            border-left: 4px solid #3b82f6;
            color: #1e40af;
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.875rem;
        }
        
        .notification-info i {
            color: #3b82f6;
            font-size: 1.1rem;
        }
        
        /* Auto close animation */
        .notification-auto-close {
            animation: slideOut 0.5s ease-in-out forwards;
            animation-delay: 4s;
        }
        
        @keyframes slideOut {
            from {
                opacity: 1;
                transform: translateX(0);
            }
            to {
                opacity: 0;
                transform: translateX(100%);
                display: none;
            }
        }
        
        /* Floating notification (optional) */
        .notification-floating {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 300px;
            max-width: 450px;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
            animation: slideIn 0.3s ease-out;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(100%);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        /* ======================================== */
        /* EXISTING STYLES */
        /* ======================================== */
        
        .topbar {
            background: white;
            border-bottom: 1px solid #e2e8f0;
            padding: 0 2rem;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 40;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(8px);
        }
        
        .topbar-breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.85rem;
            color: #64748b;
        }
        
        .breadcrumb-root {
            color: #64748b;
        }
        
        .breadcrumb-sep {
            font-size: 10px;
            color: #cbd5e1;
        }
        
        .breadcrumb-current {
            font-weight: 600;
            color: #1e293b;
        }
        
        .topbar-user {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .topbar-user-info {
            text-align: right;
        }
        
        .topbar-user-name {
            font-size: 0.85rem;
            font-weight: 600;
            display: block;
        }
        
        .topbar-user-role {
            font-size: 0.7rem;
            color: #64748b;
        }
        
        .topbar-avatar {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        .topbar-footer {
            background: white;
            border-top: 1px solid #e2e8f0;
            padding: 0.875rem 2rem;
            text-align: center;
            font-size: 0.7rem;
            color: #94a3b8;
        }
        
        @media (max-width: 768px) {
            .flex-1[style*="margin-left"] {
                margin-left: 0 !important;
            }
            .topbar {
                padding: 0 1rem;
            }
        }
    </style>
</head>

<body class="bg-slate-100 font-[Inter]">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <x-partials.sidebar />

    <!-- MAIN WRAPPER -->
    <div class="flex-1 flex flex-col" style="margin-left: 260px;">

        <!-- TOPBAR -->
        <header class="topbar">
            {{-- Breadcrumb kiri --}}
            <div class="topbar-breadcrumb">
                <span class="breadcrumb-root">Poliklinik</span>
                <i class="fas fa-chevron-right breadcrumb-sep"></i>
                <span class="breadcrumb-current">{{ $title ?? 'Halaman' }}</span>
            </div>

            {{-- User info kanan --}}
            <div class="topbar-user">
                <div class="topbar-user-info">
                    <span class="topbar-user-name">{{ auth()->user()->nama ?? 'Pengguna' }}</span>
                    <span class="topbar-user-role">{{ auth()->user()->role ?? '' }}</span>
                </div>
                <div class="topbar-avatar">
                    {{ strtoupper(substr(auth()->user()->nama ?? 'U', 0, 1)) }}
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <main class="flex-1 p-8">
            <div class="max-w-7xl mx-auto">
                
                {{-- ======================================== --}}
                {{-- NOTIFIKASI SESSION - POINT 5 --}}
                {{-- ======================================== --}}
                @if(session('message') && session('type'))
                    <div class="notification-{{ session('type') }} notification-auto-close" id="notificationMessage">
                        <i class="fas 
                            @if(session('type') == 'success') fa-check-circle
                            @elseif(session('type') == 'error') fa-exclamation-circle
                            @elseif(session('type') == 'warning') fa-exclamation-triangle
                            @else fa-info-circle
                            @endif
                        "></i>
                        <span>{!! session('message') !!}</span>
                        <button onclick="closeNotification(this)" style="margin-left: auto; background: none; border: none; cursor: pointer; opacity: 0.6;">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif
                
                {{-- NOTIFIKASI STOK MENIPIS (untuk halaman obat) --}}
                @isset($obatsMenipis)
                    @if($obatsMenipis->count() > 0)
                        <div class="notification-warning" id="warningNotification">
                            <i class="fas fa-exclamation-triangle"></i>
                            <div>
                                <strong>⚠️ STOK MENIPIS!</strong>
                                <span style="font-size: 0.8rem; display: block; margin-top: 2px;">
                                    Terdapat {{ $obatsMenipis->count() }} obat dengan stok menipis (≤5 unit): 
                                    {{ $obatsMenipis->pluck('nama_obat')->implode(', ') }}.
                                    Segera lakukan restock.
                                </span>
                            </div>
                            <button onclick="closeNotification(this)" style="margin-left: auto; background: none; border: none; cursor: pointer; opacity: 0.6;">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    @endif
                @endisset
                
                @isset($obatsHabis)
                    @if($obatsHabis->count() > 0)
                        <div class="notification-error" id="errorNotification">
                            <i class="fas fa-exclamation-triangle"></i>
                            <div>
                                <strong>⚠️ PERINGATAN STOK HABIS!</strong>
                                <span style="font-size: 0.8rem; display: block; margin-top: 2px;">
                                    Terdapat {{ $obatsHabis->count() }} obat dengan stok HABIS: 
                                    {{ $obatsHabis->pluck('nama_obat')->implode(', ') }}.
                                    Segera tambah stok untuk kelancaran pelayanan.
                                </span>
                            </div>
                            <button onclick="closeNotification(this)" style="margin-left: auto; background: none; border: none; cursor: pointer; opacity: 0.6;">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    @endif
                @endisset
                
                {{ $slot }}
            </div>
        </main>

        <!-- FOOTER -->
        <footer class="topbar-footer">
            Copyright &copy; {{ date('Y') }} &mdash; All rights reserved by
            <a href="#" style="color: #2d4499; font-weight: 600; text-decoration: none;">Poliklinik</a>
        </footer>

    </div>

</div>

<script>
    // Fungsi untuk menutup notifikasi
    function closeNotification(button) {
        const notification = button.closest('[id*="Notification"], [class*="notification-"]');
        if (notification) {
            notification.style.opacity = '0';
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                notification.style.display = 'none';
            }, 300);
        }
    }
    
    // Auto close notifikasi setelah 5 detik
    document.addEventListener('DOMContentLoaded', function() {
        const notifications = document.querySelectorAll('.notification-auto-close');
        notifications.forEach(notification => {
            setTimeout(() => {
                if (notification) {
                    notification.style.opacity = '0';
                    notification.style.transform = 'translateX(100%)';
                    setTimeout(() => {
                        if (notification) notification.style.display = 'none';
                    }, 300);
                }
            }, 5000);
        });
    });
</script>

@stack('scripts')

</body>
</html>