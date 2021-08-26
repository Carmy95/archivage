@extends('clients.layouts.master')
@section('content')

        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="{{ asset(''.$users->personne->photo.'') }}">
                                            <img class="d-block w-100" src="{{ asset(''.$users->personne->photo.'') }}" alt="First slide" style="height: 400px;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">{{ $users->personne->role->libelle }}</p>
                                <a href="#">
                                    <h6>{{ strtoupper($users->personne->nom) }} <i>{{ $users->personne->prenoms }}</i></h6>
                                </a>
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4>Service</h4>
                                    <p class="h5" style="margin-left: 15px"> <i>{{ $users->personne->service->nom }}</i></p>
                                </div>
                                <div>
                                    <h4>Département</h4>
                                    <p class="h5" style="margin-left: 15px"> <i>{{ $users->personne->service->departement->nom }}</i></p>
                                </div>
                                <!-- Avaiable -->
                            </div>
                            <div class="short_overview my-5">
                            <p>
                            <div class="short_overview my-5">
                                <p><a href="{{ route('clients.edit_profil',$users->personne->id) }}" class="btn amado-btn">Modifier Profil</a> <a href="#" class="btn amado-btn">Modifier Compte</a></p>
                                <p><a href="{{ route('home') }}" class="btn amado-btn"> Retour </a></p>
                            </div>
                            <div class="short_overview my-5">
                            </div>
                            </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection
