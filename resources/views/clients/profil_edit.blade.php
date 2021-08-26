@extends('clients.layouts.master')
@section('content')

<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="checkout_details_area mt-50 clearfix">

                    <div class="cart-title">
                        <h2>Formulaire de Modification du Profil</h2>
                    </div>

                    <form action=" {{route('clients.update_profil',$users->personne->id)}} " method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control" id="first_name" name="nom" value="{{ $users->personne->nom }}" placeholder="Entrer votre Nom" required>
                                <input type="hidden" name="service" value="{{ $users->personne->service_id }}">
                                {!! $errors->first('nom', '<span style="color: red">:message</span>') !!}
                            </div>
                            <div class="col-md-8 mb-3">
                                <input type="text" class="form-control" id="prenoms" name="prenoms" value="{{ $users->personne->prenoms }}" placeholder="Entrer vos Prénoms" required>
                                <input type="hidden" name="role" value="{{ $users->personne->role_id }}">
                                {!! $errors->first('prenoms', '<span style="color: red">:message</span>') !!}
                            </div>
                            <div class="col-12 mb-3">
                            	<label for="street_address">Photo</label>
                                <input type="file" name="photo" class="form-control mb-3" id="photo" placeholder="Changer la Photo de Profil" value="">
                                {!! $errors->first('photo', '<span style="color: red">:message</span>') !!}
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6" style="text-align: right;">
                                  <button type="submit" class="btn amado-btn">Modifier</button>
                            </div>
                            <div class="col-md-6" style="text-align: left;">
                                <a href=" {{route('clients.profil',$users->personne->id)}} " class="btn amado-btn">Annuler</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
