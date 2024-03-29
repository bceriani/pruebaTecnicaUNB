<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bautista Ceriani UNB</title>

    @vite('resources/css/app.css')
</head>

<body>
    @include('layouts.partials.navbar')
    <main class="mx-auto sm:px-4">
        @yield('content')
    </main>
</body>
</html>
