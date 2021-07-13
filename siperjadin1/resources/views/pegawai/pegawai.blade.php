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
              <td>{{ $item->jabfung_id}}</td>
              <td>
                  <form action="" method="POST" class="d-inline">
                        @method('Delete')
                        @csrf
                            <!-- <a href="{{ url('editpegawai', $item->id_pegawai)}}" class="btn btn-primary btn-sm" title="Edit Data" ><i class="fas fa-pencil-alt"></i></a> -->
                            <button onclick="$('#detailpegawai{{$item->id_pegawai}}').modal('show')" type="button" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i>  </button>
                            <button onclick="$('#editpegawai{{$item->id_pegawai}}').modal('show')" type="button" class="btn btn-primary btn-sm edit"><i class="fas fa-pencil-alt"></i>  </button>
                            <a href="{{ url('deletepegawai',$item->id_pegawai) }}" class="btn btn-danger btn-sm" title="Delete Data" data-toggle="modal" data-target="#modal-danger"  type="submit" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></a>
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



@foreach($datapegawai as $data)
<!-- Modal Edit -->
<div class="modal fade" id="detailpegawai{{$data->id_pegawai}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <div class="modal-body">
        <form action="{{route('updatepegawai', $data->id_pegawai)}}" method="post">
        {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
                <label for="exampleFormControlInput1">NIP</label>
                <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" placeholder="Masukkan NIP" value="{{$data->nip}}">
                  @error('nip')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" value="{{$data->nama}}">
                @error('nama')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Pangkat</label>
                <select class="form-control @error('pangkat') is-invalid @enderror" id="pangkat" name="pangkat" value=$data->pangkat>
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
              <div class="form-group">
                <label for="exampleFormControlSelect1">Golongan</label>
                <select class="form-control" id="golongan" name="golongan" value=$data->pangkat>
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
              <div class="form-group">
                <label for="exampleFormControlSelect1">Jabatan Fungsional</label>
                <select class="form-control" id="jabfung" name="jabfung" value=$data->jabfung> 
                  <option>Lektor</option>
                  <option>Lektor Kepala</option>
                  <option>Fungsional Umum</option>
                  <option>Tenaga Pengajar</option>
                  <option>Asisten Ahli</option>
                  <option>Guru Besar</option>
                  <option>Arsiparis</option>
                  <option>Tenaga Pendidik</option>
                  <option>Pranata Laboratorium</option>
                </select>
                @error('jabfung')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Tingkat</label>
                <select class="form-control" id="tingkat" name="tingkat" value=$data->tingkat>
                  <option>B</option>
                  <option>C</option>
                  @error('tingkat')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Fakultas</label>
                <select class="form-control" id="fakultas" name="fakultas">{{$data->fakultas}} 
                  <option <?php if ($data['fakultas'] == "Sekolah Vokasi"): ?> selected="selected"<?php endif; ?>>Sekolah Vokasi</option>
                  <option <?php if ($data['fakultas'] == "FP"): ?> selected="selected"<?php endif; ?>>FP</option>
                  <option <?php if ($data['fakultas'] == "FMIP"): ?> selected="selected"<?php endif; ?>>FMIPA</option>
                  <option <?php if ($data['fakultas'] == "FK"): ?> selected="selected"<?php endif; ?>>FK</option>
                  <option <?php if ($data['fakultas'] == "FKIP"): ?> selected="selected"<?php endif; ?>>FKIP</option>
                  <option <?php if ($data['fakultas'] == "FISIP"): ?> selected="selected"<?php endif; ?>>FISIP</option>
                  <option <?php if ($data['fakultas'] == "FH"): ?> selected="selected"<?php endif; ?>>FH</option>
                  <option <?php if ($data['fakultas'] == "FEB"): ?> selected="selected"<?php endif; ?>>FEB</option>
                  <option <?php if ($data['fakultas'] == "FIB"): ?> selected="selected"<?php endif; ?>>FIB</option>
                  <option <?php if ($data['fakultas'] == "FT"): ?> selected="selected"<?php endif; ?>>FT</option>
                  <option <?php if ($data['fakultas'] == "FSRD"): ?> selected="selected"<?php endif; ?>>FSRD</option>
                  <option <?php if ($data['fakultas'] == "FKOR"): ?> selected="selected"<?php endif; ?>>FKOR</option>
                  <option <?php if ($data['fakultas'] == "PDD Madiun"): ?> selected="selected"<?php endif; ?>>PDD Madiun</option>
                  <option <?php if ($data['fakultas'] == "UNS Pusat"): ?> selected="selected"<?php endif; ?>>UNS Pusat</option>
                  <option <?php if ($data['fakultas'] == "UPT Kearsipan"): ?> selected="selected"<?php endif; ?>>UPT Kearsipan</option>
                </select>
                  @error('fakultas')
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

@include('sweetalert::alert')
@include('layout.footer')
@stack('custom-script')
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>
@push('after-script')
<script type="text/javascript">
  $('.btn-sm edit').on('click', function(){
    console.log($(this).data('id_pegawai'))
    
  })

</script>
@endpush
</body>
</html>