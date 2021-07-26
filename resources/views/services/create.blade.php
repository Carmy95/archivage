@extends('layouts.master')
@section('content')  
 <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Services</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href=" {{route('home')}} ">Acceuil</a></li>
              <li class="breadcrumb-item"><a href=" {{route('services.index')}} ">Services</a></li>
              <li class="breadcrumb-item active">Ajouter</li>
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
              <form action=" {{route('services.store')}} " method="post">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="nom">Intituler du service</label>
                    <input type="text" class="form-control {{ $errors->first('nom','is-invalid')}} " name="nom" id="nom" placeholder="Enter le nom du service">
                    {!! $errors->first('nom', '<span style="color: red">:message</span>') !!}
                  </div>
                  <div class="form-group">
                    <label for="departement">Departements</label>
                    <select class="form-control" name="departement" id="departement">
                     @if($data->isEmpty())
                       <option>Aucune donnée disponible pour l'instant.</option>
                     @else                     
                      <option value="">Selectionner un Département</option>
                       @foreach($data as $item)
                        <option value=" {{$item->id}}"> {{$item->nom}}</option>
                      @endforeach
                     @endif                     
                    </select>
                    {!! $errors->first('departement', '<span style="color: red">:message</span>') !!}
                  </div>    
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                	<div class="row">
                		<div class="col-md-6" style="text-align: right;">
                  			<button type="submit" class="btn btn-primary">Enregistrer</button> 
                		</div>
                		<div class="col-md-6" style="text-align: left;">
                			<a href=" {{route('services.index')}} " class="btn btn-danger">Annuler</a>
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