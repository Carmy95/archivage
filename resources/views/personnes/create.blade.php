@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Personnels </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href=" {{route('dashboard')}} ">Acceuil</a></li>
              <li class="breadcrumb-item"><a href=" {{route('personnes.index')}} ">Personnels</a></li>
              <li class="breadcrumb-item active">Ajouter</li>
              <li class="breadcrumb-item active"><i>Etape 1/3</i></li>
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

              <form action=" {{route('personnes.store')}} " method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control {{ $errors->first('nom','is-invalid')}} " name="nom" id="nom" placeholder="Enter le nom">
                    {!! $errors->first('nom', '<span style="color: red">:message</span>') !!}
                  </div>
                  <div class="form-group">
                    <label for="prenoms">Prénoms</label>
                    <input type="text" class="form-control {{ $errors->first('prenoms','is-invalid')}} " name="prenoms" id="prenoms" placeholder="Enter le ou les prénoms">
                    {!! $errors->first('prenoms', '<span style="color: red">:message</span>') !!}
                  </div>
                  <div class="form-group">
                    <label for="service">Service</label>
                    <select class="form-control" name="service" id="service">
                     @if($data->isEmpty())
                       <option>Aucune donnée disponible pour l'instant.</option>
                     @else
                      <option value="">Selectionner un Service</option>
                       @foreach($data as $item)
                        <option value=" {{$item->id}}"> {{$item->nom}}</option>
                      @endforeach
                     @endif
                    </select>
                    {!! $errors->first('service', '<span style="color: red">:message</span>') !!}
                  </div>
                  <div class="form-group">
                    <label for="role">Roles</label>
                    <select class="form-control" name="role" id="role">
                     @if($type->isEmpty())
                       <option>Aucune donnée disponible pour l'instant.</option>
                     @else
                      <option value="">Selectionner le Role</option>
                       @foreach($type as $item)
                        <option value=" {{$item->id}}"> {{$item->libelle}}</option>
                      @endforeach
                     @endif
                    </select>
                    {!! $errors->first('role', '<span style="color: red">:message</span>') !!}
                    @if(session()->has('rolerrors'))
                    <span style="color: red">{{ session('rolerrors') }}</span>
                    @endif
                  </div>
                  {{-- <div class="form-group">
                    <label for="statu">Statut du Document</label>
                    <select class="form-control" name="statu" id="statu">
                     @if($statu->isEmpty())
                       <option>Aucune donnée disponible pour l'instant.</option>
                     @else
                      <option value="">Selectionner le Statut du document</option>
                       @foreach($statu as $item)
                        <option value=" {{$item->id}}"> {{$item->libelle}}</option>
                      @endforeach
                     @endif
                    </select>
                    {!! $errors->first('statu', '<span style="color: red">:message</span>') !!}
                  </div> --}}
                  {{-- <div class="form-group">
                    <label for="document">Uploader le Document</label>
                    <input type="file" class="form-control {{ $errors->first('document','is-invalid')}} " name="document">
                    {!! $errors->first('document', '<span style="color: red">:message</span>') !!}
                  </div> --}}
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                	<div class="row">
                		<div class="col-md-6" style="text-align: right;">
                  			<button type="submit" class="btn btn-primary">Continuer</button>
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
