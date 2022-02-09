<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" sizes="114x114" href="{{ asset('dist/img//logouns.jpg') }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Halaman Pengajuan SPPD')</title>

  @section('content')
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assetss/img/logouns.ico">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  @stack('custom-css')
  <link rel="stylesheet" href=" {{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <script src=" {{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
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
      <h2 class="mt-0"> Data Pengajuan SPPD</h2>
        <div class="card card-info card-outline">
              <div class="card-header">
                  <div class="card-tools">
                  @if($cek) 
                  <button disabled class="btn btn-primary" data-toggle="modal" data-target="#tambahdata"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data 
                      </button>
                  @else
                      <button class="btn btn-primary" data-toggle="modal" data-target="#tambahdata"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data 
                      </button>
                  @endif
                  </div>
              </div>
              <div class="card-body table-responsive">
                      <table class="table table-bordered" id="datatables">
                        <thead>
                        <tr class="text-center">
                              <th scope="col">No</th>
                              <th scope="col">No ST</th>
                              <th scope="col">Nama</th>
                              <th scope="col">Tanggal Berangkat</th>
                              <th scope="col">Tanggal Pulang</th>
                              <th scope="col">Status</th>
                              <th scope="col">SPPD</th>
                              <th scope="col">Aksi</th>
                          </tr>
                          </thead>
                          <tbody>
                          <!-- kalo tidak ada data maka akan menampilkan pesan no data to display -->
                              @if ($data->count() == 0)
                              <tr>
                                  <td colspan="10">No data to display.</td>
                              </tr>
                          @endif
                          @foreach ($data as $item )
                              <tr class="text-center">
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $item->surattugas['no_st']}}</td>
                                    <td>{{ $item->surattugas['pegawai']['nama']}}</td>
                                    <td>{{ date('d-m-Y', strtotime($item->tgl_berangkat)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($item->tgl_pulang)) }}</td>
                                    <td><span class="badge {{ ($item->status == 1) ? 'badge-danger' : 'badge-success' }}">{{ ($item->status == 1) ?  "Belum diverifikasi" : "Sudah diverifikasi" }}</span></td>
                                    <td>
                                      @if($item->status == 1)
                                      <a class="btn btn-info btn-xs disabled" href=""><i class="fa fa-download"></i> Download<span class="caret"></span></a>
                                      @endif
                                      @if($item->status == 0)
                                      <a href="{{route('cetaksppd', $item->id_sppd)}}" target="_blank" class="btn btn-info btn-xs" href=""><i class="fa fa-download"></i> Download</a>
                                      @endif
                                    </td>
                                    <td>
                                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailmodal{{$item->id_sppd}}" title="Detail Data" ><i class="fas fa-eye"></i></button>
                                        <form action="{{ route('sppdpegawai.destroy', $item->id_sppd) }}" method="POST" class="d-inline">
                                                @method('Delete')
                                                @csrf
                                                    <button class="btn btn-danger btn-sm" title="Delete Data" data-toggle="modal" data-target="#modal-danger"  type="submit" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></button>
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
  </div>
</div>

<!-- modal tambah data -->

<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data SPPD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="{{route('sppdpegawai.store')}}" method="post">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleFormControlInput1">No Surat Tugas</label>
            <input type="text" class="form-control @error('no_st') is-invalid @enderror" id="no_st" name="no_st" placeholder="Masukkan No Surat Tugas" value="{{old('no_st')}}">
              @error('no_st')
                <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Tingkat</label>
            <select class="form-control" id="tingkat" name="tingkat" value="">
                  <option>B</option>
                  <option>C</option>
                  @error('tingkat')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Tanggal Berangkat</label>
            <input type="date" class="form-control @error('tgl_berangkat') is-invalid @enderror" id="tgl_berangkat" name="tgl_berangkat" value="">
              @error('tgl_berangkat')
                <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Tanggal Pulang</label>
            <input type="date" class="form-control @error('tgl_pulang') is-invalid @enderror" id="tgl_pulang" name="tgl_pulang" value="">
              @error('tgl_pulang')
                <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Kegiatan</label>
            <textarea class="form-control @error('kegiatan') is-invalid @enderror" id="kegiatan" name="kegiatan" placeholder="Masukkan Kegiatan">{{old('kegiatan')}}</textarea>  
            @error('kegiatan')
                <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Provinsi</label>
            <textarea class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi" placeholder="Masukkan Provinsi Tujuan" value="">{{old('provinsi')}}</textarea>  
            @error('provinsi')
                <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Kota</label>
            <textarea class="form-control @error('provinsi') is-invalid @enderror" id="kota" name="kota" placeholder="Masukkan Kota Tujuan" value="">{{old('kota')}}</textarea>  
            @error('kota')
                <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-success">Simpan Data</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  @include('sweetalert::alert')
</form>
<!-- selesai modal tambah data  -->

<!-- modal detail -->
@foreach ($data as $item)
<div class="modal fade" id="detailmodal{{$item->id_sppd}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Data SPPD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
          <div class="col md-8 offsite md-2">
            <table class="table table-striped">
              <tbody>
                <tr>
                  <th scope="col">No. ST</th>
                  <td>{{$item->no_st}}</td>
                </tr>
                <tr>
                  <th scope="col">NIP</th>
                  <td>{{$item->nip}}</td>
                </tr>
                <tr>
                  <th scope="col">Nama</th>
                  <td>{{$item->nama}}</td>
                </tr>
                <tr>
                  <th scope="col">Tingkat</th>
                  <td>{{$item->tingkat}}</td>
                </tr>
                <tr>
                  <th scope="col">Tanggal Berangkat</th>
                  <td>{{ date('d-m-Y', strtotime($item->tgl_berangkat)) }}</td>
                </tr>
                <tr>
                  <th scope="col">Tanggal Pulang</th>
                  <td>{{ date('d-m-Y', strtotime($item->tgl_pulang)) }}</td>
                </tr>
                <tr>
                  <th scope="col">Kegiatan</th>
                  <td>{{$item->kegiatan}}</td>
                </tr>
              </tbody>
            </table>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
