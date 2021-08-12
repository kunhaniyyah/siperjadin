<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" sizes="114x114" href="{{ asset('dist/img//logouns.jpg') }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Halaman Pegawai')</title>

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
  <div class="content-wrapper">
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
                <a href="{{ route('cetakpegawai') }}" target="_blank" class="btn btn-success"><i aria-hidden="true"></i>Export to PDF
                    </a>
                <a href="{{ route('exportpegawai') }}" target="_blank" class="btn btn-success"><i aria-hidden="true"></i>Export to Excel
                    </a>
            </div>
            <div class="card-body table-responsive" >
                <table class="table table-bordered" id="datatables">
                  <thead>
                    <tr class="text-center">
                          <th scope="col">No</th>
                          <th scope="col">NIP</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Fakultas</th>
                          <th scope="col">Aksi</th>
                      </tr>
                    </thead>
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
                                <button onclick="$('#editpegawai{{$item->id_pegawai}}').modal('show')" type="button" title="Edit Data" class="btn btn-primary btn-sm edit"><i class="fas fa-pencil-alt"></i>  </button>
                                <button onclick="$('#detailpegawai{{$item->id_pegawai}}').modal('show')" type="button" title="Detail Data" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i>  </button>
                                <form action="{{ route('pegawai.destroy', $item->id_pegawai) }}" method="POST" class="d-inline">
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
          </section>
        </div>
      </div>
  </div><!-- /.container-fluid -->
</div>



  <!-- Modal Edit -->
  @foreach($datapegawai as $data)
<div class="modal fade" id="editpegawai{{$data->id_pegawai}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <div class="modal-body">
        <form action="{{route('pegawai.update', $data->id_pegawai)}}" method="post">
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
                <select class="form-control" id="jabfung_id" name="jabfung_id" value=$data->jabfung> 
                  @foreach ($jab as $item)
                    <option value="{{ $item->id }}">{{ $item->jabfung }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
            <label for="exampleFormControlInput1">Jabatan</label>
            <textarea class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" placeholder="Masukkan jabatan">{{ $data->jabatan }}</textarea>  
            @error('jabatan')
                <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Tingkat</label>
                <select class="form-control" id="tingkat" name="tingkat" value="">
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
        <form action="{{route('pegawai.store')}}" method="post">
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
                    <label for="exampleFormControlInput1">Jabatan</label>
                    <textarea class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" placeholder="Masukkan jabatan"></textarea>  
                    @error('jabatan')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Pangkat</label>
          <select class="form-control @error('pangkat') is-invalid @enderror" id="pangkat" name="pangkat">
            <option>-</option>
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
        <div class="form-group">
                  <label for="exampleFormControlInput1">Foto</label>
                  <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" placeholder="Masukkan Nama Lengkap" value="{{old('foto')}}">
          </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-success">Simpan Data</button>
        </div>
      </div>
    </div>
  </div>
  @include('sweetalert::alert')
</form>
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
                  <td>{{$data->jabfung->jabfung}}</td>
                </tr>
                <tr>
                  <th scope="col">Jabatan</th>
                  <td>{{$data->jabatan}}</td>
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
