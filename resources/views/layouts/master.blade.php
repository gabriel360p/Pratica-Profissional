<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">


    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('main/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('main/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('main/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('main/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('main/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('main/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('main/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('main/css/style.css') }}" rel="stylesheet">
    
</head>

<body>
    <!-- ======= Header ======= -->
    <header style="position: fixed; width:100%;" id="header">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <a href="/painel">
                <h1 class="logo">
                    Deff - Ifrn - CA
                    @php

                        if (\App\Models\Session::first()->nome_social) {
                            echo \App\Models\Session::first()->nome_social;
                        } else {
                            echo \App\Models\Session::first()->nome;
                        }

                    @endphp
                </h1>
            </a>
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            <nav id="navbar" class="navbar pe-4" style="">
                <ul>
                    <li><a class="nav-link scrollto active" href="/painel">Início</a></li>

                    <li><a class="nav-link scrollto" href="/itens/novo">Adicionar Item</a></li>

                    <li><a class="nav-link scrollto" href="/materiais/novo">Adicionar Material</a></li>

                    <li><a class="nav-link scrollto" href="/locais/novo">Adicionar Local</a></li>

                    <li><a class="nav-link scrollto" href="/categorias/nova">Adicionar Categoria</a></li>

                    <li><a class="nav-link scrollto pe-5 " href="{{ url('logout') }}">Sair</a></li>

                </ul>


                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-list mobile-nav-toggle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>

        </div>
        </nav><!-- .navbar -->

        </div>

    </header><!-- End Header -->


    {{-- <main> --}}

    <div class="container-fluid">
        @yield('master-main')
    </div>

    {{-- </main> --}}

    <!-- Vendor JS Files -->
    <script src="{{ asset('main/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('main/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('main/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('main/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('main/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('main/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('main/js/main.js') }}"></script>
</body>

</html>
