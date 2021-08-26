@extends('layouts.master' )
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Documents</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href=" {{route('dashboard')}} ">Acceuil</a></li>
              <li class="breadcrumb-item"><a href=" {{route('documents.index')}} ">Documents</a></li>
              <li class="breadcrumb-item active">Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="card">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <table class="table table-bordered" style="text-align: center;">
                        <thead>
                          <tr>
                            <th colspan="2">{{ $data->nom }} </th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <td rowspan="5"><img src="{{ asset(''.$data->couverture.'') }}" width="250" height="314" alt=""></td>
                              <td>Departement : {{ $data->service->departement->nom }}</td>
                            </tr>
                            <tr>
                              <td>Service : {{ $data->service->nom }}</td>
                            </tr>
                            <tr>
                              <td>Archivé le : {{ $data->created_at }} </td>
                            </tr>
                            <tr>
                                <td>Archivé par : {{ $data->personne->nom }} {{ $data->personne->prenoms }}</td>
                            </tr>
                            <tr>
                              <td>Aprops du document : <br>{{ $data->commentaire }} </td>
                            </tr>
                            @if ($data->statu_id == 2)
                                @if ($users->personne->role_id == 1 || $users->personne->role_id == 2 || $users->personne_id == $data->personne_id)
                                    <tr>
                                        <td colspan="2"> <a href="{{ route('download',$data->id) }}" class="btn btn-primary"><i class="nav-icon fas fa-download-alt"></i> Telecharger</a> </td>
                                    </tr>
                                @endif
                            @else
                                <tr>
                                    <td colspan="2"> <a href="{{ route('download',$data->id) }}" class="btn btn-primary"><i class="nav-icon fas fa-download-alt"></i> Telecharger</a> </td>
                                </tr>
                            @endif
                        </tbody>
                      </table>
                    </div>
                    <div class="col-lg-12"></div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                </div>
              </div>
        </div>
      </section>



    <!-- /.content -->
  </div>

@endsection
