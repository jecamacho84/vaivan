<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'VaiVan') }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f5f7fb; }
        .layout { display: grid; grid-template-columns: 240px 1fr; min-height: 100vh; }
        .sidebar { background: #111827; color: #fff; padding: 20px; }
        .sidebar a { color: #cbd5e1; text-decoration: none; display: block; padding: 8px 0; }
        .content { padding: 24px; }
        .card { background: #fff; border-radius: 10px; padding: 20px; box-shadow: 0 2px 8px rgba(0,0,0,.06); }
    </style>
</head>
<body>
<div class="layout">
    <aside class="sidebar">
        <h2>VaiVan</h2>
        <nav>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="#">Empresas</a>
            <a href="#">Usuários</a>
            <a href="#">Motoristas</a>
            <a href="#">Veículos</a>
            <a href="#">Responsáveis</a>
            <a href="#">Passageiros</a>
        </nav>
    </aside>

    <main class="content">
        @yield('content')
    </main>
</div>
</body>
</html>
