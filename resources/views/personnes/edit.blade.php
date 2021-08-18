@extends('layouts.master' )
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Personnelles</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href=" {{route('dashboard')}} ">Acceuil</a></li>
              <li class="breadcrumb-item"><a href=" {{route('personnes.index')}} ">Personnelles</a></li>
              <li class="breadcrumb-item"><a href=" {{route('personnes.show',$data->id)}} ">{{ strtoupper($data->nom) }} {{ $data->prenoms }}</a></li>
              <li class="breadcrumb-item active">Modifier</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                     <img class="profile-user-img img-fluid img-circle"
                        src="{{ asset(''.$data->photo.'') }}"
                         alt="{{ $data->nom }}_photo_profil">
                  </div>

                   <h3 class="profile-username text-center">{{ strtoupper($data->nom) }} {{ $data->prenoms }}</h3>

                   <p class="text-muted text-center"><i>{{ $data->role->libelle }}</i></p>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                       <b>Département </b> <a class="float-right">{{ strtoupper($data->service->departement->nom) }}</a>
                    </li>
                    <li class="list-group-item">
                       <b>Service </b> <a class="float-right">{{ strtoupper($data->service->nom) }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Documents Archivés</b> <a class="float-right">{{ $doc }}</a>
                    </li>
                  </ul>

                  <a href="#" ><b></b></a>
                  <input type="submit" disabled class="btn btn-primary btn-block" value="Modifier Mon Profil">
                  <input type="submit" disabled class="btn btn-warning btn-block" value="Modifier Mon Mot de Passe">
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                    <span class="h3 mt-2" style="text-align: center">Formulaire de Modification</span>
                </div><!-- /.card-header -->
                <form action="{{route('personnes.update',$data->id)}}" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                    <!-- form start -->
                    {{ csrf_field() }}
                      <div class="card-body">
                        <div class="form-group">
                        <input type="hidden" name="_method" value="PUT">
                          <label for="nom">Nom</label>
                          <input type="text" value="{{ $data->nom }}" class="form-control {{ $errors->first('nom','is-invalid')}} " name="nom" id="nom">
                          <input type="hidden" name="id" value="{{ $data->id }}">
                          {!! $errors->first('nom', '<span style="color: red">:message</span>') !!}
                        </div>
                        <div class="form-group">
                          <label for="prenoms">Prénoms</label>
                          <input type="text" value="{{ $data->prenoms }}" class="form-control {{ $errors->first('nom','is-invalid')}} " name="prenoms" id="prenoms">
                          {!! $errors->first('prenoms', '<span style="color: red">:message</span>') !!}
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label for="service">Service</label>
                                  <select class="form-control" name="service" id="service">
                                   @if($done->isEmpty())
                                     <option>Aucune donnée disponible pour l'instant.</option>
                                   @else
                                    <option value="">Selectionner un Service</option>
                                     @foreach($done as $item)
                                      <option {{ $item->id == $data->service_id ? 'selected' : '' }} value=" {{$item->id}}"> {{$item->nom}}</option>
                                    @endforeach
                                   @endif
                                  </select>
                                  {!! $errors->first('service', '<span style="color: red">:message</span>') !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label for="role">Rôle</label>
                                  <select class="form-control" name="role" id="role">
                                   @if($statu->isEmpty())
                                     <option>Aucune donnée disponible pour l'instant.</option>
                                   @else
                                    <option value="">Selectionner le Rôle</option>
                                     @foreach($statu as $item)
                                      <option {{ $item->id == $data->role_id ? 'selected' : '' }} value=" {{$item->id}}"> {{$item->libelle}}</option>
                                    @endforeach
                                   @endif
                                  </select>
                                  {!! $errors->first('role', '<span style="color: red">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="photo">Changer de photo</label>
                          <input type="file" class="form-control" name="photo" id="photo">
                          @if(session()->has('photo'))
                          <span style="color: red">{{ session('photo') }}</span>
                          @endif
                        </div>
                      </div>
                      <!-- /.card-body -->


                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6" style="text-align: right;">
                              <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                        <div class="col-md-6" style="text-align: left;">
                            <a href="{{route('personnes.show', $data->id)}}" class="btn btn-danger">Annuler</a>
                        </div>
                    </div>
                </div>
              </form>
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>


    <!-- /.content -->
  </div>

@endsection
