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
  @stack('custom-css')
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <script src=" assets/plugins/jquery/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="assets/DataTables/datatables.min.css">
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
        
    <!-- Main content -->
    <section class="content">
    <h2 class="mt-0"> Data Pegawai</h2>

<div class="card card-info card-outline">
<div class="card-header">
    <div class="card-tools">
        <button type="button" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"  data-toggle="modal" data-target="#exampleModal"></i> Tambah Data 
        </button>
    </div>
</div>
<div class="card-body table-responsive" >
    <table class="table table-bordered" id="datatables">
      <thead>
       <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">NIP</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Level</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <!-- kalo tidak ada data maka akan menampilkan pesan no data to display -->
        @if ($user->count() == 0)
      <tr>
          <td colspan="10">No data to display.</td>
      </tr>
      @endif
       @foreach ($user as $item)
        <tr class="text-center">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nip}}</td>
            <td>{{ $item->name}}</td>
            <td>{{ $item->username}}</td>
            <td>{{ $item->email}}</td>
            <td>{{ $item->level_user}}</td>
            <td>
              <form action="{{ route('user.destroy', $item->nip) }}" method="POST" class="d-inline">
                @method('Delete')
                @csrf
                <button class="btn btn-danger btn-sm" title="Delete Data" type="submit" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></button>
              </form>
            </td>
        </tr>
        @endforeach
      </table>
    </tbody>
        </div><!-- /.card body table responsive -->
      </div>
    </div>
  </div>
</div><!-- /.container-fluid -->
</div>
</section>



@include('layout.footer')
@include('sweetalert::alert')

<!-- jQuery -->

@stack('custom-script')

<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>
<script src="assets/dataTables/datatables.min.js"></script>
<script>
  $(document).ready( function () {
    $('#datatables').DataTable();
} );
</script>
</body>
</html>
