@extends('layouts.master')
@section('content')  
 <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Départements</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href=" {{route('home')}} ">Acceuil</a></li>
              <li class="breadcrumb-item"><a href=" {{route('departements.index')}} ">Départements</a></li>
              <li class="breadcrumb-item active">Modifier</li>
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
                <h3 class="card-title">Formaulaire de Modification</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action=" {{route('departements.update',$data->id)}} " method="post">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                  <input type="hidden" name="_method" value="PUT">
                    <label for="nom">Intituler du département</label>
                    <input type="text" value=" {{ $data->nom }} " class="form-control {{ $errors->first('nom','is-invalid')}} " name="nom" id="nom" placeholder="Enter le nom du département">
                    {!! $errors->first('nom', '<span style="color: red">:message</span>') !!}
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <div class="row">
                    <div class="col-md-6" style="text-align: right;">
                        <input type="submit" class="btn btn-primary" value="Modifier"> 
                    </div>
                    <div class="col-md-6" style="text-align: left;">
                      <a href=" {{route('departements.index')}} " class="btn btn-danger">Annuler</a>
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