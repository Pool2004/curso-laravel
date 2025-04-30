<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>@yield('title')</title>
</head>
<body>


    <header style="backgroud-color: rgb(192, 192, 192); color: rgb(0, 0, 0); padding: 10px; text-align: center;">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('products')}}">Productos</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('view')}}">Ver Producto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create')}}">Crear Producto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('update')}}">Actualizar Producto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('delete')}}">Eliminar Producto</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        @yield('body')
    </main>

    <footer style="text-align: center; padding: 20px; background-color: #f8f9fa; position: fixed; width: 100%; bottom: 0;">
        2025 - Curso Laravel | Todos los derechos reservados
    </footer>


    @if(session('success') && session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Proceso Éxitoso',
                text: '{{ session('success') }}',
            })
        </script>

    @elseif(session('error') && session()->has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error Proceso',
                text: '{{ session('error') }}',
            })
        </script>
    @endif
</body>
</html>