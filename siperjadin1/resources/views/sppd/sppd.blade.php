<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Halaman SPPD')</title>

  @section('content')
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
 
  @stack('custom-css')
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @include('layout.nav-header')
  @include('layout.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
    
   
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <h2 class="mt-0"> Data SPPD Pegawai</h2>
  <div class="card card-info card-outline">
  <div class="card-header">
      <div class="card-tools">
          <a href="{{ route('tambahpegawai') }}" class="btn btn-primary" data-toggle="modal" data-target="#ruangModal"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data 
          </a>
      </div>
  </div>
  <div class="card-body">
      <table class="table table-bordered">
          <tr class="text-center">
              <th scope="col">No</th>
              <th scope="col">No. SPPD</th>
              <th scope="col">Nama</th>
              <th scope="col">Fakultas</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Aksi</th>
          </tr>
      </table>
  </div>
  </div>
            </div>
            </div><!-- /.container-fluid -->
            </section>
@include('layout.footer')


<!-- jQuery -->
<script src=" assets/plugins/jquery/jquery.min.js"></script>
@stack('custom-script')

<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="assets/dist/js/demo.js"></script> -->


</body>
</html>
