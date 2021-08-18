<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Archivage APP | Se Connecter</title>

  @include('layouts.css')
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>{{ config('app.name', 'Laravel') }}</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    @yield('content')
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
@include('layouts.js')
</body>
</html>
