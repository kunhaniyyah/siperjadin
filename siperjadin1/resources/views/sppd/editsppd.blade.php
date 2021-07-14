<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Halaman Edit Data SPPD')</title>

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
          <a href="{{ route('pegawai.store', $item->id_pegawai) }}" class="btn btn-primary" data-toggle="modal" data-target="#ruangModal"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data 
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
          <tbody>
          <!-- kalo tidak ada data maka akan menampilkan pesan no data to display -->
          @if ($sppd->count() == 0)
        <tr>
            <td colspan="10">No data to display.</td>
        </tr>
        @endif
         @foreach ($sppd as $item)
          <tr class="text-center">
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->no_sppd}}</td>
              <td>{{date('d-m-Y', strtotime($item->tgl_sppd)) }}</td>
              <td>{{ $item->no_st}}</td>
              <td>{{ $item->tingkat}}</td>
              <!-- jabatan yg ke 2 itu nama field di tabel jabfung -->
              <td>
                  <form action="" method="POST" class="d-inline">
                        @method('Delete')
                        @csrf
                            <a href="{{ route('editsppd') }}" class="btn btn-primary btn-sm" title="Edit Data" ><i class="fas fa-pencil-alt"></i></a>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default" title="Detail Data" ><i class="fas fa-eye"></i></button>
                            <a href="" class="btn btn-danger btn-sm" title="Delete Data" data-toggle="modal" data-target="#modal-danger"  type="submit" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></a>
                    </form>
              </td>
          </tr>
        </tbody>
        @endforeach
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
