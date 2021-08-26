@extends('clients.layouts.master')
@section('content')


    <!-- Main content -->
      <div class="single-product-area section-padding-100 clearfix">
          <div class="row">
              <div class="col-md-4 cart-title" style="text-align: right; font-weight: bolder;">
                <h2 class="headline text-danger" style="font-size: 100px;">404</h2>
              </div>
              <div class="col-md-8">
                <div class="error-content">
                  <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Une erreur c'est produit.</h3>

                  <p>
                    La Page que vous demandez n'existe pas.
                  </p>
                  <p>
                    <a class="btn amado-btn" href="{{ route('home') }}">Revenir à la Page d'Acceuil</a>.</p>

                </div>

              </div>
          </div>

      </div>
      <!-- /.error-page -->
    @endsection

