<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Halaman Data User')</title>

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
    <h2 class="mt-0"> Data User</h2>
  <div class="card card-info card-outline">
  <div class="card-header">
  </div>
  <div class="card-body">
      <table class="table table-bordered">
          <tr class="text-center">
              <th scope="col">No</th>
              <th scope="col">NIP</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">Level User</th>
              <th scope="col">Aksi</th>
          </tr>
          <tbody>
         @foreach ($user as $item)
          <tr class="text-center">
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->nip}}</td>
              <td>{{ $item->name}}</td>
              <td>{{ $item->email}}</td>
              <td>{{ $item->level_user}}</td>
              <td>
                <button onclick="$('#detailmodal{{$item->id}}').modal('show')" type="button" class="btn btn-primary btn-sm edit"><i class="fas fa-eye"></i>  </button>
                <form action="{{ route('user.destroy', $item->id) }}" method="POST" class="d-inline">
                  @method('Delete')
                  @csrf
                  <button class="btn btn-danger btn-sm" title="Delete Data" data-toggle="modal" data-target="#modal-danger"  type="submit" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></button>
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
@include('sweetalert::alert')

<!-- jQuery -->

@stack('custom-script')

<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>
</body>
</html>
