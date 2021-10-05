@extends('layouts.master' )
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Personnels</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href=" {{route('dashboard')}} ">Acceuil</a></li>
              <li class="breadcrumb-item"><a href=" {{route('personnes.index')}} ">Personnels</a></li>
              <li class="breadcrumb-item active">Details</li>
              <li class="breadcrumb-item active">{{ strtoupper($data->nom) }} {{ $data->prenoms }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

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
                         alt="{{ $data->nom }}_photo_profil"
                         style="width: 87px; height: 87px;">
                  </div>

                  <h3 class="profile-username text-center">{{ strtoupper($data->nom) }} {{ $data->prenoms }}</h3>

                  <p class="text-muted text-center"><i>{{ $data->role->libelle }}</i></p>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Service </b> <a class="float-right">{{ strtoupper($data->service->nom) }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Documents Archivés</b> <a class="float-right">{{ $doc }}</a>
                    </li>
                  </ul>
                  @if ($users->id == $data->user_id || $users->personne->role_id == 1 )
                    <a href="{{ route('personnes.edit',$data->id) }}" class="btn btn-primary btn-block"><b>Modifier Mon Profil</b></a>
                    <a href="#" class="btn btn-warning btn-block"><b>Modifier Mon Mot de Passe</b></a>
                  @endif
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                  <span class="h3 mt-2" style="text-align: center">Quelque Statistiques</span>
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Vue globale</a></li>
                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Par Types</a></li>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Par Statut</a></li>
                    <li class="nav-item"><a class="nav-link" href="#compte" data-toggle="tab">Mon Compte</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <div class="row">
                            <div class="col-md-6">
                              <div class="info-box">
                                <span class="info-box-icon bg-success"><i class="fa fa-building"></i></span>

                                <div class="info-box-content">
                                  <span class="info-box-text">Dans l'Appli</span>
                                  <span class="info-box-number">{{ $docs }}</span>
                                </div>
                                <!-- /.info-box-content -->
                              </div>
                              <!-- /.info-box -->
                            </div>
                            <div class="col-md-6">
                              <div class="info-box">
                                <span class="info-box-icon bg-warning"><i class="fa fa-home"></i></span>

                                <div class="info-box-content">
                                  <span class="info-box-text">Dans le Service</span>
                                  <span class="info-box-number">{{ $serv }}</span>
                                </div>
                                <!-- /.info-box-content -->
                              </div>
                              <!-- /.info-box -->
                            </div>

                        </div>
                        <div class="row" style="margin-top: 5px;padding-bottom: 25px">
                            <h3 class="card-title">
                              <i class="fas fa-th mr-1"></i>
                              Pourcentage de document archivé
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-6 text-center">
                              <input type="text" class="knob" data-readonly="true" value="{{ $ens }}" data-width="100" data-height="100"
                                     data-fgColor="#28a745">
                              <div class="text-dark">{{ $ens }}% dans l'Appli</div>
                            </div>
                            <div class="col-6 text-center">
                              <input type="text" class="knob" data-readonly="true" value="{{ $ser }}" data-width="100" data-height="100"
                                     data-fgColor="#ffc107">
                              <div class="text-dark">{{ $ser }}% dans le service</div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="timeline">
                        <div class="row">
                            <div class="col-md-3">
                              <div class="info-box">
                                <span class="info-box-icon bg-success"><i class="far fa-file-pdf"></i></span>

                                <div class="info-box-content">
                                  <span class="info-box-text">Documents</span>
                                  <span class="info-box-number">{{$tab[0]}}</span>
                                </div>
                                <!-- /.info-box-content -->
                              </div>
                              <!-- /.info-box -->
                            </div>
                            <div class="col-md-3">
                              <div class="info-box">
                                <span class="info-box-icon bg-purple"><i class="far fa-image"></i></span>

                                <div class="info-box-content">
                                  <span class="info-box-text">Images</span>
                                  <span class="info-box-number">{{ $tab[1] }}</span>
                                </div>
                                <!-- /.info-box-content -->
                              </div>
                              <!-- /.info-box -->
                            </div>
                            <div class="col-md-3">
                              <div class="info-box">
                                <span class="info-box-icon bg-warning"><i class="fa fa-video"></i></span>

                                <div class="info-box-content">
                                  <span class="info-box-text">Medias</span>
                                  <span class="info-box-number">{{ $tab[2] }}</span>
                                </div>
                                <!-- /.info-box-content -->
                              </div>
                              <!-- /.info-box -->
                            </div>
                            <div class="col-md-3">
                              <div class="info-box">
                                <span class="info-box-icon bg-orange"><i class="fa fa-archive"></i></span>

                                <div class="info-box-content">
                                  <span class="info-box-text">Autres</span>
                                  <span class="info-box-number">{{ $tab[3] }}</span>
                                </div>
                                <!-- /.info-box-content -->
                              </div>
                              <!-- /.info-box -->
                            </div>

                        </div>
                        <div class="row" style="margin-top: 5px;padding-bottom: 25px">
                            <h3 class="card-title">
                              <i class="fas fa-th mr-1"></i>
                              Pourcentage de document archivé
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-3 text-center">
                              <input type="text" class="knob" data-readonly="true" value="{{ $tabs[0] }}" data-width="100" data-height="100"
                                     data-fgColor="#28a745">
                              <div class="text-dark">{{ $tabs[0] }}% de documents</div>
                            </div>
                            <div class="col-3 text-center">
                              <input type="text" class="knob" data-readonly="true" value="{{ $tabs[1] }}" data-width="100" data-height="100"
                                     data-fgColor="#605ca8">
                              <div class="text-dark">{{ $tabs[1] }}% d'images</div>
                            </div>
                            <div class="col-3 text-center">
                              <input type="text" class="knob" data-readonly="true" value="{{ $tabs[2] }}" data-width="100" data-height="100"
                                     data-fgColor="#ffc107">
                              <div class="text-dark">{{ $tabs[2] }}% de Médias</div>
                            </div>
                            <div class="col-3 text-center">
                              <input type="text" class="knob" data-readonly="true" value="{{ $tabs[3] }}" data-width="100" data-height="100"
                                     data-fgColor="#ff851b">
                              <div class="text-dark">{{ $tabs[3] }}% d'Autres</div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="settings">
                        <div class="row">
                            <div class="col-md-6">
                              <div class="info-box">
                                <span class="info-box-icon bg-success"><i class="fa fa-lock"></i></span>

                                <div class="info-box-content">
                                  <span class="info-box-text">Documents Privés</span>
                                  <span class="info-box-number">{{ $tab2[1] }}</span>
                                </div>
                                <!-- /.info-box-content -->
                              </div>
                              <!-- /.info-box -->
                            </div>
                            <div class="col-md-6">
                              <div class="info-box">
                                <span class="info-box-icon bg-purple"><i class="fa fa-users"></i></span>

                                <div class="info-box-content">
                                  <span class="info-box-text">Documents Publiques</span>
                                  <span class="info-box-number">{{ $tab2[0] }}</span>
                                </div>
                                <!-- /.info-box-content -->
                              </div>
                              <!-- /.info-box -->
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px;padding-bottom: 25px">
                            <h3 class="card-title">
                              <i class="fas fa-th mr-1"></i>
                              Pourcentage de document archivé
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-6 text-center">
                              <input type="text" class="knob" data-readonly="true" value="{{ $statu[1] }}" data-width="100" data-height="100"
                                     data-fgColor="#28a745">
                              <div class="text-dark">{{ $statu[1] }}% de documents Privés</div>
                            </div>
                            <div class="col-6 text-center">
                              <input type="text" class="knob" data-readonly="true" value="{{ $statu[0] }}" data-width="100" data-height="100"
                                     data-fgColor="#605ca8">
                              <div class="text-dark">{{ $statu[0] }}% de documents Publique</div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="compte">
                        <div class="row">
                            <div class="col-md-12" style="text-align: center;">
                                <h1>Paramètre de Connexion</h1>
                              <!-- /.info-box -->
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px;padding-bottom: 25px">
                        </div>
                        <div class="row">
                            <div class="col-6 text-center">
                                <div class="info-box">
                                  <span class="info-box-icon bg-success"><i class="far fa-envelope"></i></span>

                                  <div class="info-box-content">
                                    <span class="info-box-text">Adresse Email</span>
                                    <span class="info-box-number">{{ $data->user->email }}</span>
                                  </div>
                                  <!-- /.info-box-content -->
                                </div>
                            </div>
                            <div class="col-6 text-center">
                                <div class="info-box">
                                  <span class="info-box-icon bg-success"><i class="fa fa-lock"></i></span>

                                  <div class="info-box-content">
                                    <span class="info-box-text">Mot de Passe</span>
                                    <span class="info-box-number">**********</span>
                                  </div>
                                  <!-- /.info-box-content -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
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
