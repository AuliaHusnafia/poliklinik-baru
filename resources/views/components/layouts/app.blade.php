<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poliklinik</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

@stack('scripts')

</body>
</html>