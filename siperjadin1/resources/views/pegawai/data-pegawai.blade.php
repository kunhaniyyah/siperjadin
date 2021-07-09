<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Halaman Pegawai')</title>

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

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Halaman Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    
        <!-- Main row -->
        <section class="content">
          <div class="container fluid">
            
            <div class="card card-info card-outline">
              <div class="card-header">
                <div class="card-tools">
                    <a href="{{ route('input-pegawai') }}" class="btn btn-success"> Tambah Data <i class="fas fa-plus-square"></i></a>
                </div>
              </div><!-- /.card-header -->
              
              <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NIP</th>
      <th scope="col">Nama</th>
      <th scope="col">Pangkat</th>
      <th scope="col">Golongan</th>
      <th scope="col">Jabatan  Struktural</th>
      <th scope="col">Jabatan Fungsional</th>
      <th scope="col">Jabatan</th>
      <th scope="col">Fakultas</th>
      <th scope="col">AKSI</th>
      <th scope="col">AKSI</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($datapegawai as $item)
    <tr>
          <td>{{ $item->id}}</td>
          <td>{{ $item->nip}}</td>
          <td>{{ $item->nama}}</td>
          <td>{{ $item->pangkat}}</td>
          <td>{{ $item->golongan}}</td>
          <td>{{ $item->jabstruk}}</td>
          <td>{{ $item->jabfung}}</td>
          <td>{{ $item->jabatan}}</td>
          <td>{{ $item->fakultas}}</td>

           
              <td>
                  <a href="index/{{ $item->id }}" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i></a>
              </td>
          <td>

          <form action="route{{'data-pegawai.destroy','$item->id'}}" method="POST">
          @method('delete')
          @csrf
          <button class="btn btn-danger" title="Hapus" ><i class="fa fa-trash"></i></button>
          </td>
          </form>
          
    </tr>
  </tbody>
  @endforeach
</table>

                
            </div>
           
            </div>
  </div>
  </section>

@include('layout.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<!-- jQuery -->
<script src=" assets/plugins/jquery/jquery.min.js"></script>

<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>



@stack('custom-script')
</body>
</html>
