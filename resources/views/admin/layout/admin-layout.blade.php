
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="site_csrf_token" id="site_csrf_token" content="{{ csrf_token() }}">
  <title>@yield('title') : {{ config('app.name', 'Admin') }}</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('src/banner/logo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Main Sidebar Container -->
  @include('admin.layout.menu')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')


  <footer class="main-footer">
    <small>Maintened & Developed by <a target="_blank" href="https://matply.com">Matply Infotech </a>.</small>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</body>
<script src="{{asset('js/app.js')}}"></script>
@stack('add-script')
</html>
