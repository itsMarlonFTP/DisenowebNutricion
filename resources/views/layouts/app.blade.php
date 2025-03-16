<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    <!-- Aquí puedes incluir estilos (ejemplo: Bootstrap) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Inicio</a>
            <div>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('allergies.index') }}">Alergias</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Usuarios</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="text-center mt-5">
        <p>&copy; 2025 Mi Aplicación - Todos los derechos reservados</p>
    </footer>

    <!-- Aquí puedes incluir scripts (ejemplo: Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
