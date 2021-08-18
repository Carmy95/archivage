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
              <li class="breadcrumb-item active"><i>Etape 2/3</i></li>
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
                <h3 class="card-title">Formaulaire d'Ajout</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="email">Adresse Email</label>
                    <label for="">{{ $mdp }}</label>
                    <input type="email" class="form-control {{ $errors->first('email','is-invalid')}} " name="email" id="email" placeholder="Enter ll'adresse Email">
                    {!! $errors->first('email', '<span style="color: red">:message</span>') !!}
                    <input type="hidden" id="password" name="password" value="{{ $mdp }}" >
                    <input id="password-confirm" type="hidden" value="{{ $mdp }}" name="password_confirmation">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                	<div class="row">
                		<div class="col-md-6" style="text-align: right;">
                  			<button type="submit" class="btn btn-primary">Enregistrer</button>
                		</div>
                		<div class="col-md-6" style="text-align: left;">
                			<a href=" {{route('personnes.index')}} " class="btn btn-danger">Annuler</a>
                		</div>
                	</div>
                </div>
              </form>
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
