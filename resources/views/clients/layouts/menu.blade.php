<header class="header-area clearfix">
    <!-- Close Icon -->
    <div class="nav-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <!-- Logo -->
    <div class="logo">
        <a href="{{route('home')}}"><img src="{{asset('dist/img/core-img/logo.png')}}" alt=""></a>
    </div>
    <!-- Amado Nav -->
    <nav class="amado-nav">
        <ul>
            <li class="{{ $active == 'home' ? 'active' : '' }}"><a href="{{route('home')}} ">Accueil</a></li>
            <li class="{{ $active == 'archive' ? 'active' : '' }}"><a href="{{route('clients.create')}}">Archiver un docunent</a></li>
            <li class="{{ $active == 'service' ? 'active' : '' }}"><a href="{{route('clients.service')}}">Les Documents du Services</a></li>
            <li class="{{ $active == 'departement' ? 'active' : '' }}"><a href="{{route('clients.departement')}}">Les Documents du Departements</a></li>
            <li class="{{ $active == 'connexion' ? 'active' : '' }}"><a href="{{ route('deconnecter') }}">Se Connecter</a></li>
        </ul>
    </nav>
    <!-- Cart Menu -->
    <div class="cart-fav-search mb-100">
        <a href="#" class="search-nav"><img src="{{asset('dist/img/core-img/search.png')}}" alt=""> Recherche</a>
    </div>
</header>
