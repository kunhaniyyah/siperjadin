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
    <h2 class="mt-0"> Data SPPD Pegawai</h2>
  <div class="card card-info card-outline">
  <div class="card-header">
      <div class="card-tools">
          <a href="{{ route('sppd.create') }}" class="btn btn-primary" data-toggle="modal" data-target="#tambahmodal"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data 
          </a>
      </div>
      <button type="button" data-toggle="modal" data-target="#cetakmodal" class="btn btn-success"><i aria-hidden="true"></i>Cetak Rekap Data
      </button>
      <a href="{{ route('exportsppd') }}" target="_blank" class="btn btn-success"><i aria-hidden="true"></i>Export to Excel
        </a>
  </div>
  <div class="card-body">
      <table class="table table-bordered" id="datatables">
        <thead>
          <tr class="text-center">
              <th scope="col">No</th>
              <th scope="col">#</th>
              <th scope="col">No. SPPD</th>
              <th scope="col">Nama</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Status</th>
              <th scope="col">Aksi</th>
          </tr>
          </thead>
          <tbody>
         @foreach ($sppd as $item)
          <tr class="text-center">
              <td>{{ $loop->iteration }}</td>
              <td>
                @if($item->status==1)
                  <a href="{{ route('statussppd' , $item->id_sppd)}}" class="btn btn-xs btn-success"> Aktifkan</a>
                @else 
                  <a href="{{ route('statussppd', $item->id_sppd)}}" class="btn btn-xs btn-danger"> Non Aktifkan</a>
                @endif
              </td>
              <td>{{ $item->no_sppd}}</td>
              <!-- <td>{{ $item->no_st}}</td> -->
              <td>{{ $item->nama}}</td>
              <td>{{date('d-m-Y', strtotime($item->created_at)) }}</td>
              <td><span class="badge {{ ($item->status == 1) ? 'badge-danger' : 'badge-success'  }}">{{ ($item->status == 1) ?  "Belum diverifikasi" : "Sudah diverifikasi"  }}</span></td>
              <!-- jabatan yg ke 2 itu nama field di tabel jabfung -->
              <td>
                <button onclick="$('#editmodal{{$item->id_sppd}}').modal('show')" type="button" class="btn btn-primary btn-sm edit"><i class="fas fa-pencil-alt"></i>  </button>
                <button onclick="$('#detailmodal{{$item->id_sppd}}').modal('show')" type="button" class="btn btn-primary btn-sm edit"><i class="fas fa-eye"></i>  </button>
                <form action="{{route('sppd.destroy', $item->id_sppd) }}" method="POST" class="d-inline">
                      @method('Delete')
                      @csrf
                        <button class="btn btn-danger btn-sm" title="Delete Data" data-toggle="modal" data-target="#modal-danger"  type="submit" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    @if($item->status==0)
                    <a href="{{route('cetaksppd', $item->id_sppd)}}" target="_blank" ><button class="btn btn-warning btn-sm" title="Cetak Surat" ><i class="fas fa-print"></i></button></a>
                    @else
                    <a href="#"><button class="btn btn-warning btn-sm disabled" title="Cetak Surat" ><i class="fas fa-print"></i></button></a>
                    @endif
              </td>
          </tr>
          @endforeach
        </table>
      </tbody>
  </div>
  </div>
</div>
</div><!-- /.container-fluid -->
</section>



<!-- cetak modal -->
<div class="modal fade" id="cetakmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cetak Data per tanggal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
          <label for="label">Tanggal Awal</label>
          <input type="date" name="tglawal" id="tglawal" class="form-control">
      </div>
        <div class="form-group">
          <label for="label">Tanggal Akhir</label>
          <input type="date" name="tglakhir" id="tglakhir" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="" onclick="this.href='/cetakpertanggalsppd/'+ document.getElementById('tglawal').value +
        '/' + document.getElementById('tglakhir').value " target="_blank" class="btn btn-success">Cetak Data</a>
      </div>
    </div>
  </div>
</div>




<!-- modal tambah data -->

<div class="modal fade" id="tambahmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data SPPD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action=" {{ route('sppd.store') }}" method="post">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleFormControlInput1">No SPPD</label>
            <input type="text" class="form-control @error('no_sppd') is-invalid @enderror" id="no_sppd" name="no_sppd" placeholder="Masukkan No SPPD" value="{{old('no_sppd')}}">
              @error('no_st')
                <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">No Surat Tugas</label>
            <input type="text" class="form-control @error('no_st') is-invalid @enderror" id="no_st" name="no_st" placeholder="Masukkan No Surat Tugas" value="{{old('no_st')}}">
              @error('no_st')
                <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">NIP</label>
            <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" placeholder="Masukkan NIP" value="{{old('nip')}}">
              @error('nip')
                <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama" value="{{old('nama')}}">
              @error('nama')
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
@foreach ($sppd as $item)
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
            <table class="table">
              <tbody>
                <tr>
                  <th scope="col">No. SPPD</th>
                  <td>{{$item->no_sppd}}</td>
                </tr>
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
                  <td>{{$item->tgl_berangkat}}</td>
                </tr>
                <tr>
                  <th scope="col">Tanggal Pulang</th>
                  <td>{{$item->tgl_pulang}}</td>
                </tr>
                <tr>
                  <th scope="col">Kegiatan</th>
                  <td>{{$item->kegiatan}}</td>
                </tr>
                <tr>
                  <th scope="col">Kota</th>
                  <td>{{$item->kota}}</td>
                </tr>
                <tr>
                  <th scope="col">Provinsi</th>
                  <td>{{$item->provinsi}}</td>
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

<!-- modal edit -->
@foreach($sppd as $item)
<div class="modal fade" id="editmodal{{$item->id_sppd}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <div class="modal-body">
        <form action="{{route('sppd.update', $item->id_sppd)}}" method="post">
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
            <div class="form-group">
              <label for="exampleFormControlInput1">Tingkat</label>
              <textarea class="form-control @error('tingkat') is-invalid @enderror" id="tingkat" name="tingkat" placeholder="Masukkan Keperluan">{{$item->tingkat}}</textarea>  
              @error('keperluan')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Tanggal Berangkat</label>
              <input type="date" class="form-control @error('tgl_berangkat') is-invalid @enderror" id="tgl_berangkat" name="tgl_berangkat" value="{{$item->tgl_berangkat}}">
                @error('tgl_berangkat')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Tanggal Pulang</label>
              <input type="date" class="form-control @error('tgl_pulang') is-invalid @enderror" id="tgl_pulang" name="tgl_pulang" value="{{$item->tgl_pulang}}">
                @error('tgl_pulang')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Kegiatan</label>
              <textarea class="form-control @error('kegiatan') is-invalid @enderror" id="kegiatan" name="kegiatan" placeholder="Masukkan Kegiatan">{{$item->kegiatan}}</textarea>  
              @error('kegiatan')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Provinsi</label>
              <textarea class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi" placeholder="Masukkan Provinsi Tujuan" value="{{$item->provinsi}}">{{$item->provinsi}}</textarea>  
              @error('provinsi')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Kota</label>
              <textarea class="form-control @error('provinsi') is-invalid @enderror" id="kota" name="kota" placeholder="Masukkan Kota Tujuan" value="{{$item->kota}}">{{$item->kota}}</textarea>  
              @error('kota')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" onclick="countWord()">Save changes</button>
        </div>
        </div>
    </form>
    </div>
</div>
@endforeach
<!-- end modal -->


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
