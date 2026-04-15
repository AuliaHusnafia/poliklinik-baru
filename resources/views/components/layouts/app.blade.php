<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poliklinik</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #f1f5f9; }

        .app-wrapper { display: flex; min-height: 100vh; }

        /* SIDEBAR */
        .sidebar-modern {
            width: 280px; 
            background-color: #1e3a8a; 
            color: white;
            position: fixed; 
            height: 100vh; 
            display: flex; 
            flex-direction: column;
        }

        .brand-area { padding: 2rem; text-align: center; }
        .logo-placeholder {
            width: 55px; height: 55px; background: white; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: #1e3a8a; font-weight: bold;
        }

        .nav-modern { padding: 1rem; }
        .nav-header { font-size: 0.7rem; color: rgba(255,255,255,0.5); padding: 1rem; }

        .nav-link-modern {
            display: flex; align-items: center; gap: 10px;
            padding: 10px 15px; border-radius: 10px;
            color: rgba(255,255,255,0.7); text-decoration: none;
            transition: 0.2s;
        }

        .nav-link-modern:hover {
            background: rgba(255,255,255,0.1);
        }

        .nav-link-modern.active {
            background: rgba(255,255,255,0.2);
            color: white;
        }

        .logout-area { margin-top: auto; padding: 1rem; }

        .btn-logout {
            width: 100%; padding: 10px;
            background: red; color: white;
            border: none; border-radius: 10px;
            cursor: pointer;
        }

        /* MAIN */
        .main-content {
            margin-left: 280px;
            padding: 2rem;
            width: 100%;
        }

        .card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 10px rgba(0,0,0,0.05);
        }

        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; border-bottom: 1px solid #eee; }

        .btn-primary {
            background: #4338ca;
            color: white;
            padding: 8px 15px;
            border-radius: 8px;
            text-decoration: none;
        }

        .btn-action-edit {
            background: orange;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .btn-action-delete {
            background: red;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="app-wrapper">

    <!-- SIDEBAR -->
    <x-partials.sidebar />

    <!-- MAIN -->
    <main class="main-content">

        <div class="content-wrapper">
            {{ $slot }}
        </div>

    </main>

</div>
</body>
</html>