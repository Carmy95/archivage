@extends('clients.layouts.master')
@section('content')

<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="checkout_details_area mt-50 clearfix">

                    <div class="cart-title">
                        <h2>Formulaire d'Ajout</h2>
                    </div>

                    <form action=" {{route('clients.store')}} " method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" id="first_name" name="nom" value="" placeholder="Intituler du document" required>
                                {!! $errors->first('nom', '<span style="color: red">:message</span>') !!}
                                <input type="hidden" name="service" value="bon">
                            </div>
                            <div class="col-md-6 mb-3">
                                <select class="w-100" id="country" name="statu">
                                    <option>Statut du Documents</option>
                                    @if($statu->isEmpty())
                                      <option>Aucune donnée disponible pour l'instant.</option>
                                    @else
                                      @foreach($statu as $item)
                                       <option value=" {{$item->id}}"> {{$item->libelle}}</option>
                                     @endforeach
                                    @endif
                            	</select>
                                {!! $errors->first('statu', '<span style="color: red">:message</span>') !!}
                            </div>
                            <div class="col-12 mb-3">
                                <select class="w-100" id="country" name="type">
                                <option>Type du document</option>
                                @if($type->isEmpty())
                                  <option>Aucune donnée disponible pour l'instant.</option>
                                @else
                                  @foreach($type as $item)
                                   <option value=" {{$item->id}}"> {{$item->libelle}}</option>
                                 @endforeach
                                @endif
                            </select>
                            {!! $errors->first('type', '<span style="color: red">:message</span>') !!}
                            </div>
                            <div class="col-12 mb-3">
                                <textarea name="commentaire" class="form-control w-100" id="comment" cols="30" rows="10" placeholder="Commentaire sur le document"></textarea>
                            </div>
                            <div class="col-12 mb-3">
                            	<label for="street_address">Uploader le document</label>
                                <input type="file" name="document" class="form-control mb-3" id="street_address" placeholder="Uploader le document" value="">
                                {!! $errors->first('document', '<span style="color: red">:message</span>') !!}
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6" style="text-align: right;">
                                  <button type="submit" class="btn btn-warning">Enregistrer</button>
                            </div>
                            <div class="col-md-6" style="text-align: left;">
                                <a href=" {{route('home')}} " class="btn btn-danger">Annuler</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
