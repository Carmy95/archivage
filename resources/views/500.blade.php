@extends('layouts.master')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Erreur 500</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('documents.index') }}">Documents</a></li>
              <li class="breadcrumb-item active">Erreur</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-danger">500</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Une erreur c'est produit.</h3>

          <p>
            Le document que vous  souhaiter archivé ne correspond pas au type que vous avez choisir.
            <br>Pour resoudre cette erreur :
            <ul>
                <li>Vous devez changer le type de document par :
                    <ul>
                        <li><span style="font-style: italic; font-weight: bolder">Documents</span> pour tout vos documents dont l'extention est <span style="font-style: italic; font-weight: bolder">.pdf, .txt, .doc, .docs, .ppt, .xlsx</span></li>
                        <li><span style="font-style: italic; font-weight: bolder">Images</span> pour tout vos documents dont l'extention est <span style="font-style: italic; font-weight: bolder">.jpg, .jpeg, .gif, .png</span></li>
                        <li><span style="font-style: italic; font-weight: bolder">Medias</span> pour tout vos documents dont l'extention est <span style="font-style: italic; font-weight: bolder">.mp3, .mp4, .avi, .mpg</span></li>
                        <li><span style="font-style: italic; font-weight: bolder">Autres</span> pour tout vos documents dont l'extention est <span style="font-style: italic; font-weight: bolder">.zip, .rar, .7z, .cab, .iso</span></li>
                    </ul>
                </li>
                <li>Vous devez selectionner un document</li>
            </ul>
            <a href="{{ route('documents.create') }}">Ressayer </a> ou <a href="{{ route('documents.index') }}">Retourner</a>.
          </p>

        </div>
      </div>
      <!-- /.error-page -->

    </section>
    <!-- /.content -->
</div>
    @endsection

