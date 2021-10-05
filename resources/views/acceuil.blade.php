@extends('layouts.master')
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tableau de bord</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Tableau de bord</li>
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
          <div class="col-lg-12 col-12">
            <h2>Quelques Statistiques</h2>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $doc }}</h3>

                <p>Documents Archivés</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $user }}</h3>

                <p>Utilisateurs</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $ser }}</h3>

                <p>Services</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="card bg-gradient-info">
          <div class="card-header border-0">
            <h3 class="card-title">
              <i class="fas fa-th mr-1"></i>
              Pourcentage Par Type de document archivé
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-3 text-center">
                <input type="text" class="knob" data-readonly="true" value="{{ $tabs[0] }}" data-width="200" data-height="200"
                       data-fgColor="rgba(82, 211, 7, 0.753)">
                <div class="text-white">Documents (Pdf, words, Excel, texte, PowerPoint)</div>
              </div>
              <!-- ./col -->
               <div class="col-3 text-center">
                <input type="text" class="knob" data-readonly="true" value="{{ $tabs[1] }}" data-width="200" data-height="200"
                       data-fgColor="rgb(231, 235, 18)">

                <div class="text-white">Images (Png, jpg, jpeg)</div>
              </div>
              <!-- ./col -->
               <div class="col-3 text-center">
                    <input type="text" class="knob" data-readonly="true" value="{{ $tabs[2] }}" data-width="200" data-height="200"
                       data-fgColor="#39CCCC">
                    <div class="text-white">Medias (Sons et vidéos)</div>
              </div>
              <!-- ./col -->
               <div class="col-3 text-center">
                    <input type="text" class="knob" data-readonly="true" value="{{ $tabs[3] }}" data-width="200" data-height="200"
                       data-fgColor="#39CCCC">
                    <div class="text-white">Autres (documents Zipé)</div>
              </div>
              <!-- ./col -->
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer bg-transparent">
            <!-- /.row -->
          </div>
          <!-- /.card-footer -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

@endsection
