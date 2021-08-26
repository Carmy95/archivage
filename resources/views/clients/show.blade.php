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
                                        <a class="gallery_img" href="{{ asset(''.$data->couverture.'') }}">
                                            <img class="d-block w-100" src="{{ asset(''.$data->couverture.'') }}" alt="First slide" style="height: 400px;">
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
                                <p class="product-price">{{ $data->reference }}</p>
                                <a href="#">
                                    <h6>{{ strtoupper($data->nom) }}</h6>
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
                                    <div class="review">
                                        Archivé le : <a href="#">{{ $data->created_at }}</a>
                                    </div>
                                </div>
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <div class="ratings">
                                        <p class="avaibility"><i class="fa fa-circle"></i> {{ $data->statu->libelle }}</p>
                                    </div>
                                    <div class="review">
                                        <p class="avaibility"> Archivé Par :<i class="fa fa-users"></i> {{ $data->personne->nom }} {{ $data->personne->prenoms }}</p>
                                    </div>
                                </div>
                                <!-- Avaiable -->
                            </div>

                            <div class="short_overview my-5">
                                <p>{{ $data->commentaire }}</p>
                            </div>
                            <div class="short_overview my-5">
                            <p>
                            <div class="short_overview my-5">
                                @if ($data->statu_id == 2)
                                    @if ($users->personne->role_id == 1 || $users->personne->role_id == 2 || $users->personne_id == $data->personne_id)
                                    <p><a href="{{ route('download',$data->id) }}" class="btn amado-btn">Télécharger</a> <a href="{{ route('clients.service') }}" class="btn amado-btn">Retour</a></p>
                                    @else
                                    <p><a href="{{ route('clients.service') }}" class="btn amado-btn">Retour</a></p>
                                    @endif
                                @else
                                <p><a href="{{ route('download',$data->id) }}" class="btn amado-btn">Télécharger</a> <a href="{{ route('clients.service') }}" class="btn amado-btn">Retour</a></p>
                                @endif
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
