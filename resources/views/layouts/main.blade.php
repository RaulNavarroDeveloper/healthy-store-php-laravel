<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--    Links de conexión a librerias--}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous"
    >
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    >
    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >
    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >
    <link
        href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,900;1,400&display=swap"
        rel="stylesheet"
    >
    <link
        href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'
        rel='stylesheet'
    >
    <link
        rel="stylesheet"
        href="{{ URL::asset('css/style.css')}}"
    >
    <script
        src="https://kit.fontawesome.com/ed0c580b93.js"
        crossorigin="anonymous">
    </script>
    <title>@yield('title')</title>
</head>
<body>
<nav class="navbar nav-general navbar-expand-md navbar-light">
    <div class="container-fluid ">
        <a class="navbar-brand tipografia-titulo" href="#">Healthy box</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-md-flex justify-content-end align-items-center me-5" id="navbarNavDropdown">
        <div class="collapse navbar-collapse d-md-flex justify-content-end align-items-center me-5" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Inicio</a>
                </li>
                <li class="nav-item ms-4">
                    <a class="nav-link " aria-current="page" href="{{route('blog')}}">Blog</a>
                </li>
                <li class="nav-item ms-4">
                    <a class="nav-link " aria-current="page" href="{{route('suscripcion.pricing')}}">Precios</a>
                </li>
                @if(Auth::user() && Auth::user()->rol_id == 1)
                    <li class="nav-item">
                        <a class="nav-link ms-4" aria-current="page" href="{{route('admin.blog.listado')}}">Administración</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ms-4" aria-current="page" href="{{route('usuarios.index')}}">Usuarios</a>
                    </li>
                @endif
                @auth
                <li class="nav-item ms-4">
                    <a class="nav-link" aria-current="page" href="{{route('perfil', ['usuario_id' => Auth::id()])}}">Perfil</a>
                </li>
                <li class="nav-item ms-4">
                    <form action="{{route('auth.cerrar.sesion.ejecutar')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <button type="submit" class="btn">Cerrar sesión</button>
                    </form>
                </li>
                @elseguest
                <li class="nav-item nav-login d-flex align-items-center ms-4">
                    <a class="fw-bold" aria-current="page" href="{{route('auth.iniciar.sesion.form')}}">Iniciar Sesión</a>
                </li>
                <li class="nav-item nav-register ms-4">
                    <a class=" btn btn-register fw-bold" aria-current="page" href="{{route('auth.registro.form')}}">Registrarse</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

@if(Session::has('status.message'))
    <div class="div-alerta alert alert-{{ Session::get('status.type') ?? 'info' }} mx-auto mt-2 d-flex justify-content-between align-items-center animate__animated animate__fadeInDown">
        <p class="fw-bold mb-0">{!! Session::get('status.message') !!}</p>
        <i class="fa-solid fa-xmark fs-3"></i>
    </div>
@endif

<main id="mainUsers" class="">
    @yield('main')
</main>
<footer class="footer d-flex flex-row justify-content-around">
    <div class="mt-4 d-none d-md-block">
        <ul class="list-unstyled">
            <li><a class="text-decoration-none text-light" href="#">Inicio</a></li>
            <li><a class="text-decoration-none text-light" href="#">Categorias</a></li>
            <li><a class="text-decoration-none text-light" href="index.php?s=contacto">Contacto</a></li>
        </ul>
    </div>
    <div class="mt-4">
        <h2 class="h4 text-light text-center">¡Síguenos en redes sociales!</h2>
        <ul class="ul-redes list-unstyled d-flex flex-row justify-content-center">
            <li class="me-3"><i class="fa-brands fa-instagram"><a href="" class="text-secondary"></a></i></li>
            <li class="me-3"><i class="fa-brands fa-twitter"><a href=""></a></i></li>
            <li class="me-3"><i class="fa-brands fa-facebook-f"><a href=""></a></i></li>
            <li class="me-3"><i class="fa-brands fa-pinterest-p"></i><a href=""></a></li>
        </ul>
    </div>

    <div class="mt-4">
        <ul class="list-unstyled">
            <li class="text-light">Raul Alfredo Navarro</li>
            <li class="text-light">Portales y comercio</li>
            <li class="text-light">Cuarto cuatrimestre</li>
            <li class="text-light">DWT4</li>
        </ul>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{URL::asset('js/main.js')}}"></script>
    @stack('js')
</body>
</html>
