
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Sistem Manajemen Pelanggan | {{ $title }}</title>

 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="{{  asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
 <!-- Ionicons -->
 <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 <!-- Tempusdominus Bootstrap 4 -->
 <link rel="stylesheet" href="{{  asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
 <!-- iCheck -->
 <link rel="stylesheet" href="{{  asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
 <!-- JQVMap -->
 <link rel="stylesheet" href="{{  asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
 <!-- Theme style -->
 <link rel="stylesheet" href="{{  asset('assets/dist/css/adminlte.min.css') }}">
 <!-- overlayScrollbars -->
 <link rel="stylesheet" href="{{  asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
 <!-- Daterange picker -->
 <link rel="stylesheet" href="{{  asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
 <!-- summernote -->
 <link rel="stylesheet" href="{{  asset('assets/plugins/summernote/summernote-bs4.min.css') }}">

 {{-- boostrapt 5 css --}}
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

 {{-- my style --}}
 <link rel="stylesheet" href="{{ asset('assets/css/myStyle.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto mr-3">
      @if(auth()->user())
        <li class="nav-item me-4">
          <div class="dropdown dropstart">
            <button class="btn dropdown-toggle fw-bold" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->username }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li>
                <form action="/logout" method="post">
                  @csrf
      
                  <button class="btn nav-link fw-bold" type="submit">Logout</button>
                </form>
              </li>
            </ul>
          </div>
        </li>
      @else
        <li class="nav-item me-3">
          <a class="nav-link fw-bold" href="/login">
            Login
          </a>
        </li>
      @endif

      @if(auth()->user())
        @if(auth()->user()->is_admin == 0)
          <li class="nav-item">
            <a class="nav-link {{ Request::is('carts') ? 'text-primary' : '' }}" href="/carts" >
              <i class="fa fa-cart-plus fs-3 fw-bold" aria-hidden="true"></i>
            </a>
          </li>
        @endif
      @endif
    </ul>
  </nav>
  {{-- swert allert --}}
  @include('sweetalert::alert')

  <!-- /.navbar -->

  @include('partials.sidebar')

  @include('partials.header')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        @yield('container')

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  @include('partials.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>

{{-- boostrapt 5 js --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

{{-- jquery cdn --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

{{-- swert alert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

{{-- my Script --}}
<script src="{{ asset('assets/js/scanner.js') }}"></script>

<script src="{{ asset('assets/js/detailPromotion.js') }}"></script>


</body>
</html>
