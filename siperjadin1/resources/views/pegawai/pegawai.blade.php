<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Halaman Data Pegawai')</title>
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
    <section class="content">
    <h2 class="mt-0"> Data Pegawai</h2>

  <div class="card card-info card-outline">
  <div class="card-header">
      <div class="card-tools">
          <a href="{{ route('tambahpegawai') }}" class="btn btn-primary" data-toggle="modal" data-target="#ruangModal"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data 
          </a>
      </div>
  </div>

  <div class="card-body table-responsive">
      <table class="table table-bordered">
         <tr class="text-center">
              <th scope="col">No</th>
              <th scope="col">NIP</th>
              <th scope="col">Nama</th>
              <th scope="col">Fakultas</th>
              <th scope="col">Aksi</th>
          </tr>
          <tbody>
          <!-- kalo tidak ada data maka akan menampilkan pesan no data to display -->
          @if ($datapegawai->count() == 0)
        <tr>
            <td colspan="10">No data to display.</td>
        </tr>
        @endif
         @foreach ($datapegawai as $item)
          <tr class="text-center">
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->nip}}</td>
              <td>{{ $item->nama}}</td>
              <td>{{ $item->fakultas}}</td>
              <td>
                  <form action="" method="POST" class="d-inline">
                        @method('Delete')
                        @csrf
                            <a href="{{ url('editpegawai', $item->nip)}}" class="btn btn-primary btn-sm" title="Edit Data" ><i class="fas fa-pencil-alt"></i></a>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default" title="Detail Data" ><i class="fas fa-eye"></i></button>
                            <a href="{{ url('deletepegawai',$item->nip) }}" class="btn btn-danger btn-sm" title="Delete Data" data-toggle="modal" data-target="#modal-danger"  type="submit" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></a>
                    </form>
              </td>
          </tr>
        </tbody>
        @endforeach
      </table>
      </br>
        <div class="float-left">
          Showing 
          {!! $datapegawai->firstItem() !!}
          of 
          {!! $datapegawai->lastItem() !!}
        </div>
        <div class="float-right">
            {!! $datapegawai->links() !!}
        </div>
        
          </div><!-- /.card body table responsive -->
        </div>
      </div>
    </div>
    
  </div><!-- /.container-fluid -->
  </div>

<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

</section>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Modal header</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
</div>
</div>
</div>

@include('sweetalert::alert')
@include('layout.footer')

<!-- jQuery -->
<script src=" assets/plugins/jquery/jquery.min.js"></script>
@stack('custom-script')
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>
</body>
</html>