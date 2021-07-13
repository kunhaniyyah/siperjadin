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
    <script src=" assets/plugins/jquery/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
          <button type="button" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"  data-toggle="modal" data-target="#exampleModal"></i> Tambah Data 
          </button>
      </div>
  </div>

  <div class="card-body table-responsive">
      <table class="table table-bordered">
         <tr class="text-center">
              <th scope="col">No</th>
              <th scope="col">NIP</th>
              <th scope="col">Nama</th>
              <th scope="col">Fakultas</th>
              <th scope="col">Jabatan Fungsional</th>
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
              <!-- jabatan yg ke 2 itu nama field di tabel jabfung -->
              <td>{{ $item->jabfung->jabfung}}</td>
              <td>
                <form action="" method="POST" class="d-inline">
                  @method('Delete')
                  @csrf
                  <button onclick="$('#detailpegawai{{$item->id_pegawai}}').modal('show')" type="button" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i>  </button>
                  <button onclick="$('#editpegawai{{$item->id_pegawai}}').modal('show')" type="button" class="btn btn-primary btn-sm edit"><i class="fas fa-pencil-alt"></i>  </button>
                            <!-- <a href="{{ url('editpegawai', $item->id_pegawai)}}" class="btn btn-primary btn-sm" title="Edit Data" ><i class="fas fa-pencil-alt"></i></a> -->
                            <a href="{{ route('pegawai.destroy',$item->id_pegawai) }}" class="btn btn-danger btn-sm" title="Delete Data" type="submit" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></a>
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

<!-- modal tambah data -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="" method="post">
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
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" value="{{old('nama')}}">
                  @error('nip')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Jabatan Fungsional</label>
                  <select class="form-control" id="jabfung_id" name="jabfung_id">
                    <option value="">Pilih Jabatan</option>
                    @foreach ($jab as $item)
                    <option value="{{ $item->id }}">{{ $item->jabfung }}</option>
                    @endforeach
                  </select>
              </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Pangkat</label>
          <select class="form-control @error('pangkat') is-invalid @enderror" id="pangkat" name="pangkat">
            <option>Lektor</option>
            <option>Pembina</option>
            <option>Pembina Utama</option>
            <option>Pembina Utama Madya</option>
            <option>Pembina Utama Muda</option>
            <option>Pembina Tk.1</option>
            <option>Penata</option>
            <option>Penata Tk.1a</option>
            <option>Penata Muda</option>
            <option>Penata Muda Tk.1</option>
            <option>Pengatur</option>
            <option>Pengatur Muda</option>
            <option>Juru</option>
          </select>
          @error('pangkat')
              <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="exampleFormControlSelect1">Golongan</label>
          <select class="form-control" id="golongan" name="golongan" required>
            <option>I/c</option>
            <option>II/c</option>
            <option>II/a</option>
            <option>III/a</option>
            <option>III/b</option>
            <option>III/c</option>
            <option>III/d</option>
            <option>IV/a</option>
            <option>IV/b</option>
            <option>IV/c</option>
            @error('golongan')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </select>
        </div>
        <div class="col-md-6 mb-3">
          <label for="exampleFormControlSelect1">Tingkat</label>
          <select class="form-control" id="tingkat" name="tingkat">
            <option>B</option>
            <option>C</option>
            @error('tingkat')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </select>
        </div>
      </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Fakultas</label>
          <select class="form-control" id="fakultas" name="fakultas">
            <option>Pilih Fakultas</option>
            <option value="Sekolah Vokasi">Sekolah Vokasi</option>
            <option>FMIPA</option>
            <option>FP</option>
            <option>FK</option>
            <option>FKIP</option>
            <option>FISIP</option>
            <option>FH</option>
            <option>FEB</option>
            <option>FIB</option>
            <option>FT</option>
            <option>FSRD</option>
            <option>FKOR</option>
            <option>PDD Madiun</option>
            <option>UNS Pusat</option>
            <option>UPT Kearsipan</option>
          </select>
        </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-success">Simpan Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- selesai modal tambah data  -->


<!-- modal detail data  -->
@foreach($datapegawai as $data)
<div class="modal fade" id="detailpegawai{{$data->id_pegawai}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Data Pegawai</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <div class="modal-body">
        <div class="row">
          <div class="col md-8 offsite md-2">
            <table class="table">
              <tbody>
                <tr>
                  <th scope="col">NIP</th>
                  <td>{{$data->nip}}</td>
                </tr>
                <tr>
                  <th scope="col">Nama</th>
                  <td>{{$data->nama}}</td>
                </tr>
                <tr>
                  <th scope="col">Fakultas</th>
                  <td>{{$data->fakultas}}</td>
                </tr>
                <tr>
                  <th scope="col">Jabatan Fungsional</th>
                  <td>{{$data->jabfung_id}}</td>
                </tr>
                <tr>
                  <th scope="col">Pangkat</th>
                  <td>{{$data->pangkat}}</td>
                </tr>
                <tr>
                  <th scope="col">Golongan</th>
                  <td>{{$data->golongan}}</td>
                </tr>
                <tr>
                  <th scope="col">Tingkat</th>
                  <td>{{$data->tingkat}}</td>
                </tr>
              </tbody>
            </table>
            </div>
        </div>
      
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!-- <button type="submit" class="btn btn-primary" onclick="countWord()">Save changes</button> -->
        </div>
        </div>
      </div>
    </div>
</div>
@endforeach
<!-- selesai modal detail data  -->

@include('sweetalert::alert')
@include('layout.footer')
</body>
</html>