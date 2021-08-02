<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce Template | Home</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{asset('dist/img/core-img/favicon.ico')}}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{asset('dist/css/core-style.css')}}">
    <link rel="stylesheet" href="{{asset('dist/style.css')}}">

</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="{{asset('dist/img/core-img/search.png')}}" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.html"><img src="{{asset('dist/img/core-img/logo.png')}}" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
		@include('clients.layouts.menu')

        <!-- Header Area End -->

        <!-- Product Catagories Area Start -->
		@yield('content')

        <!-- Product Catagories Area End -->
    </div>

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-5">
                    <div class="single_widget_area">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href=" {{route('home')}} "><img src="{{asset('dist/img/core-img/logo2.png')}}" alt=""></a>

                        <p class="copywrite"> Copyright &copy; {{ date('Y')}}  Tout droit réserver | Réalisé Par <a href="#" target="_blank">Aicha Konaté</a> | Version 0.1
                        </p>
                        </div>
                        <!-- Copywrite Text -->
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-7">
                    <div class="single_widget_area">
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <nav class="navbar navbar-expand-lg justify-content-end">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse" id="footerNavContent">
                                    <ul class="navbar-nav ml-auto">
                                        <li class=" nav-item active"></li>
                                        <li class=" nav-item active"></li>
                                        <li class=" nav-item active"></li>
                                        <li class=" nav-item active"></li>
                                        <li class=" nav-item active"></li>

                                        <li class="nav-item {{ $active == 'home' ? 'active' : '' }}">
                                            <a class="nav-link" href="{{route('home')}} ">Accueil</a>
                                        </li>
                                        <li class="nav-item {{ $active == 'archive' ? 'active' : '' }}">
                                            <a class="nav-link" href="{{route('clients.create')}}">Archiver un docunent</a>
                                        </li>
                                        <li class="nav-item {{ $active == 'service' ? 'active' : '' }}">
                                            <a class="nav-link" href="{{route('clients.service')}}">Les Documents du Services</a>
                                        </li>
                                        <li class="nav-item {{ $active == 'departement' ? 'active' : '' }}">
                                            <a class="nav-link" href="{{route('clients.departement')}}">Les Documents du Departements</a>
                                        </li>
                                        <li class="nav-item {{ $active == 'connexion' ? 'active' : '' }}">
                                            <a class="nav-link" href="{{ route('clients.show','1') }}">Se Connecter</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="{{asset('dist/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('dist/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('dist/js/bootstrap.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{asset('dist/js/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('dist/js/active.js')}}"></script>

</body>

</html>
