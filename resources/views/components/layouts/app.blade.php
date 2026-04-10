<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard | Poliklinik</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    
    <script src="https://cdn.tailwindcss.com"></script>

    @livewireStyles
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        {{-- Header/Navbar --}}
        @include('components.partials.header')

        {{-- Sidebar --}}
        @include('components.partials.sidebar')

        {{-- Konten Utama --}}
        <div class="content-wrapper bg-gray-50">
            <div class="content-header">
                <div class="container-fluid">
                    {{ $slot }}
                </div>
            </div>
        </div>

        {{-- Footer --}}
        @include('components.partials.footer')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    
    @livewireScripts
</body>
</html>