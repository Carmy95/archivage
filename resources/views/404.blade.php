@extends('layouts.master')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Erreur 404</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Erreur</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-danger">404</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Une erreur c'est produit.</h3>

          <p>
            La Page que vous demandez n'existe pas. <br>
          </p>
          <p>
              <br>
              <a class="btn btn-primary" href="{{ route('dashboard') }}">Revenir à la Page d'Acceuil</a>.
          </p>

        </div>
      </div>
      <!-- /.error-page -->

    </section>
    <!-- /.content -->
</div>
    @endsection

