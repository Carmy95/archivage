@extends('clients.layouts.master')
@section('content')


    <!-- Main content -->
      <div class="single-product-area section-padding-100 clearfix">
          <div class="row">
              <div class="col-md-4 cart-title" style="text-align: right; font-weight: bolder;">
                <h2 class="headline text-danger" style="font-size: 100px;">500</h2>
              </div>
              <div class="col-md-8">
                <div class="error-content">
                  <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Une erreur c'est produit.</h3>

                  <p>
                    Le document que vous  souhaiter archivé ne correspond pas au type que vous avez choisir.
                    <br>Pour resoudre cette erreur :
                    <ol>
                        <li> * Vous devez changer le type de document par :
                            <ul>
                                <li><span style="font-style: italic; font-weight: bolder">Documents</span> pour tout vos documents dont l'extention est <span style="font-style: italic; font-weight: bolder">.pdf, .txt, .doc, .docs, .ppt, .xlsx</span></li>
                                <li><span style="font-style: italic; font-weight: bolder">Images</span> pour tout vos documents dont l'extention est <span style="font-style: italic; font-weight: bolder">.jpg, .jpeg, .gif, .png</span></li>
                                <li><span style="font-style: italic; font-weight: bolder">Medias</span> pour tout vos documents dont l'extention est <span style="font-style: italic; font-weight: bolder">.mp3, .mp4, .avi, .mpg</span></li>
                                <li><span style="font-style: italic; font-weight: bolder">Autres</span> pour tout vos documents dont l'extention est <span style="font-style: italic; font-weight: bolder">.zip, .rar, .7z, .cab, .iso</span></li>
                            </ul>
                        </li>
                        <li>** Vous devez selectionner un document</li>
                    </ol>
                  </p>
                  <p>
                    <a class="btn amado-btn" href="{{ route('clients.create') }}">Ressayer </a> ou <a class="btn amado-btn" href="{{ route('home') }}">Retourner</a>.</p>

                </div>

              </div>
          </div>

      </div>
      <!-- /.error-page -->
    @endsection

