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
              <li class="breadcrumb-item active">Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
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
                          <th>Departement </th>
                          <th> {{ $data->nom }} </th>
                        </tr>
                      </thead>
                        <tr>
                          <th>Nombre de service</th>
                          <th> {{ $total }} </th>
                        </tr>
                      <tbody>
                      </tbody>
                    </table>                    
                  </div>
                  <div class="col-lg-12"></div>
                </div>
                <div class="row">
                  <div class="col-lg-12 col-12">
                    <h2>Quelques Statistiques</h2>
                  </div>
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3>150</h3>

                        <p>Documents en PDF</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                        <p>Image Archivé</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3>44</h3>

                        <p>Documents Words</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person-add"></i>
                      </div>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3>65</h3>

                        <p>Autres documents</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                      </div>
                    </div>
                  </div>
                  <!-- ./col -->
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              </div>
            </div>
      </div>
    </section>
  </div>
@endsection