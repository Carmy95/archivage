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

                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" id="first_name" value="" placeholder="Intituler du document" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <select class="w-100" id="country">
                                    <option>Statut du Documents</option>
                                    <option value="uk">Public</option>
                                    <option value="ger">Privé</option>
                            	</select>
                            </div>
                            <div class="col-12 mb-3">
                                <select class="w-100" id="country">
                                <option>Type du document</option>
                                <option value="uk">PDF</option>
                                <option value="ger">Word</option>
                                <option value="fra">Image</option>
                                <option value="ind">Autres</option>
                            </select>
                            </div>
                            <div class="col-12 mb-3">
                                <textarea name="comment" class="form-control w-100" id="comment" cols="30" rows="10" placeholder="Commentaire sur le document"></textarea>
                            </div>
                            <div class="col-12 mb-3">
                            	<label for="street_address">Uploader le document</label>
                                <input type="file" class="form-control mb-3" id="street_address" placeholder="Uploader le document" value="">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection