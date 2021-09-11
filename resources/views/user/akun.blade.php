<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Halaman Akun')</title>

  @section('content')
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assetss/img/logouns.ico">
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
        <h2 class="mt-0">Akun</h2>

          <div class="card card-info card-outline">
            <div class="card-header"></div>
              <div class="card-body table-responsive" >
                <div class="row">
                          <div class="col md-8 offsite md-2">
                                <table class="table table-striped">
                                  <tbody>
                                    <tr>
                                      <th scope="col">NIP</th>
                                      @foreach ($user as $item)
                                      <td>:     {{$item->nip}}</td>
                                      @endforeach
                                    </tr>
                                    <tr>
                                      <th scope="col">Nama</th>
                                      @foreach ($user as $item)
                                      <td>:     {{$item->name}}</td>
                                      @endforeach
                                    </tr>
                                    <tr>
                                      <th scope="col">Username</th>
                                      @foreach ($user as $item)
                                      <td>:     {{$item->username}}</td>
                                      @endforeach
                                    </tr>
                                    <tr>
                                      <th scope="col">Email</th>
                                      @foreach ($user as $item)
                                      <td>: {{$item->email}}</td>
                                      @endforeach
                                    </tr>
                                    <tr>
                                      <th scope="col">Level User</th>
                                      @foreach ($user as $item)
                                      <td>: {{$item->level_user}}</td>
                                      @endforeach
                                    </tr>
                                  </tbody>
                                </table>
                                  <div class="modal-footer">
                                  @foreach ($user as $item)
                                    <button onclick="$('#editmodal').modal('show')" type="button" class="btn btn-primary">Edit</button>
                                  @endforeach
                                </div>
                            </div><!-- /.card body table responsive -->
                        </div>
                      </div>
                    </div>
                    </section>
                  </div>
                </div><!-- /.container-fluid -->
              </div>
</div>

<!-- modal edit -->
@foreach($user as $item)
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <div class="modal-body">
        <form action="" method="post">
          {{ csrf_field() }}
          @method('PUT')
            <div class="form-group">
              <label for="exampleFormControlInput1">No SPPD</label>
              <input type="text" class="form-control @error('no_sppd') is-invalid @enderror" id="no_sppd" name="no_sppd" placeholder="Masukkan No SPPD" value="{{$item->no_sppd}}">
                @error('no_st')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">No Surat Tugas</label>
              <input type="text" class="form-control @error('no_st') is-invalid @enderror" id="no_st" name="no_st" placeholder="Masukkan No Surat Tugas" value="{{$item->no_st}}">
                @error('no_st')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">NIP</label>
              <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" placeholder="Masukkan NIP" value="{{$item->nip}}">
                @error('nip')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Nama</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama" value="{{$item->nama}}">
                @error('nama')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" onclick="countWord()">Save changes</button>
          </form>
        </div>
    </div>
  </div>
</div>
@endforeach
<!-- end modal -->

@include('layout.footer')
@include('sweetalert::alert')

<!-- jQuery -->

@stack('custom-script')

<!-- AdminLTE App -->
<script src=" {{ asset('assets/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('assets/dataTables/datatables.min.js') }}"></script>
<script>
  $(document).ready( function () {
    $('#datatables').DataTable();
} );
</script>
</body>
</html>
