<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>


    <header style="background-color: green; color: white; padding: 10px; text-align: center;">

        <h1>Curso laravel 2025</h1>
        
        @yield('header')
    </header>

    <main style="padding: 20px; background-color: #a0a0a0;">
        @yield('body')
    </main>

    <footer style="background-color: rgb(23, 0, 128); color: white; padding: 10px; text-align: center;">
        2025 - Curso Laravel | Todos los derechos reservados
        <br>
    </footer>
</body>
</html>