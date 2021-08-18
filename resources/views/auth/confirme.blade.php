@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Personnelles </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href=" {{route('dashboard')}} ">Acceuil</a></li>
              <li class="breadcrumb-item"><a href=" {{route('personnes.index')}} ">Personnelles</a></li>
              <li class="breadcrumb-item active">Ajouter</li>
              <li class="breadcrumb-item active"><i>Etape 3/3</i></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Création du compte terminé</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->


                <div class="card-body" style="font-size: 25px;">
                    <h2 style="text-align: center; text-decoration: underline">Compte crée avec Success</h2>
                    <p>Le Compte de M./Mme/Mlle <b>{{ strtoupper($tabs['nom']) }} {{ $tabs['prenoms'] }}</b> a ete crée avec success</p>
                    <p>il peut desormais avoir access a la plateforme d'archivage, pour archiver, consulter les documents du service au quelle il/elle appartient.</p>
                    <h5><u>Identifient de Connexion:</u></h5>
                    <p style="padding-left: 15px">Email : <b><i>{{ $user->email }}</i></b></p>
                    <p style="padding-left: 15px">Mot de Passe : <b><i>{{ $tabs['mdp'] }}</i></b></p>
                    <span style="color: red"><i>NB : il/elle devra changer de mot de passe lors de la 1ère connexion.</i></span>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                	<div class="row">
                		<div class="col-md-12" style="text-align: center;">
                			<a href=" {{route('personnes.index')}} " class="btn btn-primary">Terminer</a>
                		</div>
                	</div>
                </div>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
</div>
@endsection
