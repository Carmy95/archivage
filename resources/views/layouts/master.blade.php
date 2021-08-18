@php
    if(empty($active)){
        $active = '';
    }
@endphp
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Archivage | Dashboard</title>
  @include('layouts.css')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
@include('layouts.navbar')

@include('layouts.menu')
<div class="wrapper">
@yield('content')

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; {{ date('Y')}}
    <span> Réalysé Par : <i><a href="#">Aicha KONATE</a></i></span></strong>
    Tout droit réserver
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


@include('layouts.js')
</body>
</html>
