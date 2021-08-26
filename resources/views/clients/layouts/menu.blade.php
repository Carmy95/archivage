<header class="header-area clearfix">
    <!-- Close Icon -->
    <div class="nav-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <!-- Logo -->
    <div class="logo" style="margin-bottom: 10px;">
        <a href="{{route('clients.profil',$users->personne->id)}}"><img style="border-radius: 10%; border: solid rgb(252, 194, 4) 5px; with:150px; height:150px; margin-bottom: 10px;" src="{{asset(''.$users->personne->photo.'')}}" alt=""></a>
        <div style="text-align: center">
            <b class="h5" style="">{{ $users->personne->nom }} <br> {{ $users->personne->prenoms }}</b>
            <i>{{ $users->personne->role->libelle }}</i>
        </div>
    </div>
    <!-- Amado Nav -->
    <nav class="amado-nav">
        <ul>
            <li class="{{ $active == 'home' ? 'active' : '' }}"><a href="{{route('home')}} ">Accueil</a></li>
            <li class="{{ $active == 'archive' ? 'active' : '' }}"><a href="{{route('clients.create')}}">Archiver un docunent</a></li>
            <li class="{{ $active == 'service' ? 'active' : '' }}"><a href="{{route('clients.service')}}">Les Documents du Services</a></li>
            @if ($users->personne->role_id == 1)
                <li class="{{ $active == 'departement' ? 'active' : '' }}"><a href="{{route('clients.departement')}}">Les Documents du Departements</a></li>
            @endif
            <li class="{{ $active == 'connexion' ? 'active' : '' }}"><a href="{{ route('deconnecter') }}">Se Deconnecter</a></li>
        </ul>
    </nav>
    <!-- Cart Menu -->
    <div class="cart-fav-search mb-100">
        <a href="#" class="search-nav"><img src="{{asset('dist/img/core-img/search.png')}}" alt=""> Recherche</a>
    </div>
</header>
