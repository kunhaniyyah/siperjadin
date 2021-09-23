<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" sizes="114x114" href="{{ asset('dist/img//logouns.jpg') }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Halaman Profile')</title>

  @section('content')
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="assetss/img/logouns.ico">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  @stack('custom-css')
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/DataTables/datatables.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  @include('layout.nav-header')
  @include('layout.sidebar')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <section class="content">
          @foreach($user as $item)
          <div class="card card-info card-outline">
            <div class="card-header"></div>
              <div class="card-body table-responsive" >
                <div class="row">
                          <div class="col md-8 offsite md-2">
                                <table class="table table-striped">
                                  <tbody>
                                    <tr>
                                      <th scope="col">NIP</th>
                                      <td>:     {{$item->nip}}</td>
                                    </tr>
                                    <tr>
                                      <th scope="col">Nama</th>
                                      <td>:     {{$item->name}}</td>
                                    </tr>
                                    <tr>
                                      <th scope="col">Username</th>
                                      <td>:     {{$item->username}}</td>
                                    </tr>
                                    <tr>
                                      <th scope="col">Email</th>
                                      <td>: {{$item->email}}</td>
                                    </tr>
                                    <tr>
                                      <th scope="col">Level</th>
                                      <td>: {{$item->level_user}}</td>
                                    </tr>
                                  </tbody>
                                </table>
                                <div class="modal-footer">
                                  <button onclick="$('#editakun{{$item->id}}').modal('show')" type="button" class="btn btn-primary">Edit</button>
                                </div>
                            </div><!-- /.card body table responsive -->
                        </div>
                      </div>
                      @endforeach
                    </div>
          </section>
        </div>
      </div>
  </div><!-- /.container-fluid -->
</div>

@foreach($user as $item)
<div class="modal" tabindex="-1" role="dialog" id="editakun{{$item->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('akun.update', $item->id)}}" method="post">
        {{ csrf_field() }}
            @method('PATCH')
                  <div class="form-group">
                      <label for="exampleFormControlInput1">NIP</label>
                      <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" placeholder="Masukkan NIP" value="{{$item->nip}}">
                        @error('nip')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Nama</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukkan Nama Lengkap" value="{{$item->name}}">
                      @error('nama')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Username</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="username" name="username" placeholder="Masukkan Nama Lengkap" value="{{$item->username}}">
                      @error('username')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Email</label>
                      <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan Nama Lengkap" value="{{$item->email}}">
                      @error('email')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" onclick="countWord()">Save changes</button>
                  </div>
              </div>
        </form>
    </div>
</div>
@endforeach

@include('layout.footer')
@include('sweetalert::alert')

<!-- jQuery -->

@stack('custom-script')

<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('assets/dataTables/datatables.min.js') }}"></script>
<script>
  $(document).ready( function () {
    $('#datatables').DataTable();
} );
</script>
</body>
</html>
