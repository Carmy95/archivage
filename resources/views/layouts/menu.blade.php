<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Archivage APP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link {{ $active == 'home' ? 'active' : '' }} ">
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('departements.index')}}" class="nav-link {{ $active == 'departements' ? 'active' : '' }} ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Departements
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('services.index')}}" class="nav-link {{ $active == 'services' ? 'active' : '' }} ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Services
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('documents.index')}}" class="nav-link {{ $active == 'documents' ? 'active' : '' }} ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Documents
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('personnes.index')}}" class="nav-link {{ $active == 'users' ? 'active' : '' }} ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Personnelles
              </p>
            </a>
          </li>
          <li class="nav-item8">
            <a href="#" class="nav-link {{ $active == 'config' ? 'active' : '' }} ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Configuration
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('types.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Type de Document</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('status.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Status du Document</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
