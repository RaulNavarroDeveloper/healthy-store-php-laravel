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
    <div class="sidebar close">
        <div class="logo-details">
            <span class="logo-name"></span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="{{route('admin.blog.listado')}}">
                    <i class="bx bx-grid-alt"></i>
                    <span class="link_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{route('usuarios.index')}}">
                    <i class="bx bx-user" ></i>
                    <span class="link_name">Usuarios</span>
                </a>
            </li>
{{--            <li>--}}
{{--                <a href="{{route('perfil', ['usuario_id' => Auth::id()])}}">--}}
{{--                    <i class="bx bx-chart" ></i>--}}
{{--                    <span class="link_name">Perfil</span>--}}
{{--                </a>--}}
{{--            </li>--}}
            <li>
                <a href="{{route('estadisticas.index')}}">
                    <i class="bx bx-chart" ></i>
                    <span class="link_name">Estadísticas</span>
                </a>
            </li>
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="../imgs/la-importancia-de-comer-sano.jpg" alt="">
                    </div>
                    <div class="name-job">
                        <div class="profile_name">Raul Navarro</div>
                        <div class="job">Web dev</div>
                    </div>
                    <form id="form-logout" action="{{route('auth.cerrar.sesion.ejecutar')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <button type="submit" class="btn">
                            <i class="bx bx-log-out"></i>
                        </button>
                    </form>

                </div>
            </li>
        </ul>
    </div>
    <div class="btn-sidebar">
        <i class='bx bxs-chevron-left' ></i>
    </div>

    @if(Session::has('status.message'))
        <div class="div-alerta alert alert-{{ Session::get('status.type') ?? 'info' }} mx-auto mt-2 d-flex justify-content-between align-items-center animate__animated animate__fadeInDown">
            <p class="fw-bold mb-0">{!! Session::get('status.message') !!}</p>
            <i class="fa-solid fa-xmark fs-3"></i>
        </div>
    @endif

    <main class="main-admin-content">
        @yield('main')
    </main>

{{--    <footer class="footer footer-admin d-flex flex-row justify-content-around">--}}
{{--        <div class="mt-4 d-none d-md-block">--}}
{{--            <ul class="list-unstyled">--}}
{{--                <li><a class="text-decoration-none text-light" href="#">Inicio</a></li>--}}
{{--                <li><a class="text-decoration-none text-light" href="#">Categorias</a></li>--}}
{{--                <li><a class="text-decoration-none text-light" href="index.php?s=contacto">Contacto</a></li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--        <div class="mt-4">--}}
{{--            <h2 class="h4 text-light text-center">¡Síguenos en redes sociales!</h2>--}}
{{--            <ul class="ul-redes list-unstyled d-flex flex-row justify-content-center">--}}
{{--                <li class="me-3"><i class="fa-brands fa-instagram"><a href="" class="text-secondary"></a></i></li>--}}
{{--                <li class="me-3"><i class="fa-brands fa-twitter"><a href=""></a></i></li>--}}
{{--                <li class="me-3"><i class="fa-brands fa-facebook-f"><a href=""></a></i></li>--}}
{{--                <li class="me-3"><i class="fa-brands fa-pinterest-p"></i><a href=""></a></li>--}}
{{--            </ul>--}}
{{--        </div>--}}

{{--        <div class="mt-4">--}}
{{--            <ul class="list-unstyled">--}}
{{--                <li class="text-light">Raul Alfredo Navarro</li>--}}
{{--                <li class="text-light">Portales y comercio</li>--}}
{{--                <li class="text-light">Cuarto cuatrimestre</li>--}}
{{--                <li class="text-light">DWT4</li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </footer>--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{URL::asset('js/main.js')}}"></script>
    <script src="{{URL::asset('js/sidebar-menu.js')}}"></script>
    @stack('js')

</body>
</html>
