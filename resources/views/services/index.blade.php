@extends('layouts.master')
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Services</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href=" {{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active">Services</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-6">
                    <h3 class="card-title">Liste</h3>
                  </div>
                  <div class="col-md-6" style="text-align: right;">
                    <a href=" {{route('services.create')}} " class="btn btn-primary">
                      <i class="nav-icon fas fa-plus"></i> Ajouter
                    </a>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" style="text-align: center;">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nom du service</th>
                      <th>Departement</th>
                      <th colspan="3">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($data->isEmpty())
                    <tr>
                      <td colspan="6">Aucune donnée disponible pour l'instant.</td>
                    </tr>
                    @else
                      @php $t = 0 @endphp
                      @foreach($data as $item)
                        <tr>
                          <td> {{ $t+=1 }} </td>
                          <td> {{ $item->nom }} </td>
                          <td><span class="badge bg-warning"> {{ $item->departement->nom }} </span></td>
                          <td>
                             <a href="{{ route('services.edit', $item->id) }}" class="btn btn-primary" title="Modifier"><i class="nav-icon fas fa-edit"></i></a>
                          </td>
                          <td>
                            <a href="{{ route('services.show', $item->id) }}" class="btn btn-success" title="Details"><i class="nav-icon fas fa-eye"></i></a>
                          </td>
                          <td>
                          <form method="post" action="{{ route('services.destroy', $item->id) }}"
                          onsubmit="return confirm('Etre vous sure de vouloir Supprimer cet Service ?') ">
                            {{ csrf_field() }}{{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger" title="Supprimer"><i class="nav-icon fas fa-trash"></i></button>
                          </form>
                          </td>
                        </tr>
                      @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    {{ $data->links('vendor.pagination.bootstrap-4') }}
                </ul>
              </div>
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>



    <!-- /.content -->
  </div>

@endsection

