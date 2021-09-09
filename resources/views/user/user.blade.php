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
    <h2 class="mt-0"> Data User</h2>

<div class="card card-info card-outline">
<div class="card-header">
    <!-- <div class="card-tools">
        <button type="button" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"  data-toggle="modal" data-target="#exampleModal"></i> Tambah User
        </button>
    </div> -->
</div>
<div class="card-body table-responsive" >
    <table class="table table-bordered" id="datatables">
      <thead>
       <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">NIP</th>
            <th scope="col">NIP</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Level</th>
            <th scope="col">Status</th>
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
            <td>
                @if($item->status==0)
                  <a href="{{ route('statususer', $item->id)}}" class="btn btn-sm btn-success btn-xs">Aktifkan</a>
                @else 
                  <a href="{{ route('statususer' , $item->id)}}" class="btn btn-sm btn-danger btn-xs">Non Aktifkan</a>
                @endif
            </td>
            <td>{{ $item->nip}}</td>
            <td>{{ $item->name}}</td>
            <td>{{ $item->username}}</td>
            <td>{{ $item->email}}</td>
            <td>{{ $item->level_user}}</td>
            <td><span class="badge {{ ($item->status == 0) ? 'badge-danger' : 'badge-success'   }}">{{ ($item->status == 0) ?   "Non Aktif" : "Aktif" }}</span></td>
            <td>
            <button class="btn btn-primary btn-sm" title="Edit Data"  data-toggle="modal" data-target="#editmodal{{$item->id}}"><i class="fas fa-pencil-alt"></i></button>
              <form action="{{ route('user.destroy', $item->id) }}" method="POST" class="d-inline">
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

<!-- modal edit -->
@foreach ($user as $item)
<div class="modal fade bd-example-modal-lg" id="editmodal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('user.update' , $item->id)}}" method="post">
      <div class="modal-body">
      {{ csrf_field() }}
      @method('PUT')
            <div class="form-group">
                <label for="exampleFormControlInput1">Nama</label>
                <input type="text" class="form-control @error('no_st') is-invalid @enderror" id="name" name="name" placeholder="Masukkan No Surat Tugas"  value="{{$item->name}}">
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Username</label>
                <input type="text" class="form-control @error('no_st') is-invalid @enderror" id="username" name="username" placeholder="Masukkan No Surat Tugas"  value="{{$item->username}}">
                  @error('username')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input type="text" class="form-control @error('no_st') is-invalid @enderror" id="email" name="email" placeholder="Masukkan No Surat Tugas"  value="{{$item->email}}">
                  @error('email')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>           
@endforeach
<!-- end modal -->
</section>


<!-- modal tambah data -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('user.store')}}" method="post">
          {{ csrf_field() }}
                <div class="form-group">
                  <label for="exampleFormControlInput1">NIP</label>
                  <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" placeholder="Masukkan NIP" value="{{old('nip')}}">
                    @error('nip')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nama</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukkan Nama Lengkap" value="{{old('name')}}">
                  @error('nip')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Username</label>
                  <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Masukkan Nama Lengkap" value="{{old('username')}}">
                  @error('nip')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Level User</label>
                  <select class="form-control @error('pangkat') is-invalid @enderror" id="level_user" name="level_user">
                    <option>admin</option>
                    <option>staff</option>
                  </select>
                  @error('pangkat')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-success">Simpan Data</button>
                    </div>
                  </div>
      </div>
    </div>
  </div>
  @include('sweetalert::alert')
</form>
<!-- selesai modal tambah data  -->


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
