@extends('layout.master')
@section('title', 'Halaman Pengajuan Surat Tugas')
@push('custom-css')
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
@endpush
@stack('custom-css')
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <script src=" assets/plugins/jquery/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

@section('content')
<section class="content">
<div class="container-fluid">
    <section class="content">
    <h2 class="mt-0"> Data Pengajuan Surat Tugas</h2>
  <div class="card card-info card-outline">
  <div class="card-header">
      <div class="card-tools">
          <button class="btn btn-primary" data-toggle="modal" data-target="#tambahdata"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data 
          </button>
      </div>
  </div>

  <div class="card-body table-responsive">
      <table class="table table-bordered">
         <tr class="text-center">
              <th scope="col">No</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Keperluan</th>
              <th scope="col">Tempat</th>
              <th scope="col">Status</th>
              <th scope="col">Surat Tugas</th>
              <th scope="col">Aksi</th>
          </tr>
          <!-- kalo tidak ada data maka akan menampilkan pesan no data to display -->
          @if ($data->count() == 0)
        <tr>
            <td colspan="10">No data to display.</td>
        </tr>
        @endif
          @foreach ($data as $item )
          <tr class="text-center">
              <td>{{ $loop->iteration}}</td>
              <td>{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
              <td>{{ $item->keperluan}}</td>
              <td>{{ $item->tempat}}</td>
              <td><span class="badge {{ ($item->status == 0) ? 'badge-success' : 'badge-danger' }}">{{ ($item->status == 0) ? "Sudah diverifikasi" : "Belum diverifikasi" }}</span></td>
              <td>
              @if($item->status == 1)
              <a class="btn btn-info btn-xs disabled" href=""><i class="fa fa-download"></i> Download<span class="caret"></span></a>
              @endif
              @if($item->status == 0)
              <a href="{{route('cetaksurat', $item->id_st)}}" target="_blank" class="btn btn-info btn-xs" href=""><i class="fa fa-download"></i> Download</a>
              @endif
              </td>
              <td>
                <button class="btn btn-primary btn-sm" title="Edit Data"  data-toggle="modal" data-target="#detailmodal{{$item->id_st}}"><i class="fas fa-eye"></i></button>
                  <form action="{{ route('surattgs.destroy', $item->id_st) }}" method="POST" class="d-inline">
                        @method('Delete')
                        @csrf
                            <button class="btn btn-danger btn-sm" title="Delete Data" data-toggle="modal" data-target="#modal-danger"  type="submit" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></button>
                    </form>
                  </td>
                </tr>
              </tbody>
            @endforeach
          </table>
        <br>
        </div><!-- /.card body table responsive -->
      </div>
    </div>
</section>


<!-- modal tambah data -->
@foreach ($user as $item)
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Surat Tugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <form action="{{route('surattgs.store')}}" method="post">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleFormControlInput1">Keperluan</label>
            <textarea class="form-control @error('keperluan') is-invalid @enderror" id="keperluan" name="keperluan" placeholder="Masukkan Keperluan"></textarea>  
            @error('keperluan')
                <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Tanggal</label>
            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" placeholder="Masukkan Nama" value="">
              @error('tanggal')
                <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Tempat</label>
            <textarea class="form-control @error('tempat') is-invalid @enderror" id="tempat" name="tempat" placeholder="Masukkan Tempat" value=""></textarea>  
            @error('tempat')
                <span class="text-danger">{{ $message }}</span>
              @enderror
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
@endforeach
<!-- selesai modal tambah data  -->

<!-- modal detail -->
@foreach ($data as $item)
<div class="modal fade" id="detailmodal{{$item->id_st}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Data Surat Tugas</h5>
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
                  <th scope="col">Tanggal</th>
                  <td>{{date('d-m-Y', strtotime($item->tanggal)) }}</td>
                </tr>
                <tr>
                  <th scope="col">Keperluan</th>
                  <td>{{$item->keperluan}}</td>
                </tr>
                <tr>
                  <th scope="col">Tempat</th>
                  <td>{{$item->tempat}}</td>
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
@foreach ($data as $item)
<div class="modal fade bd-example-modal-lg" id="editmodal{{$item->id_st}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Surat Tugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('surattugas.store')}}" method="POST">
      <div class="modal-body">
      {{ csrf_field() }}
              <div class="form-group">
                <label for="exampleFormControlInput1">Keperluan</label>
                <textarea class="form-control @error('keperluan') is-invalid @enderror" id="keperluan" name="keperluan" placeholder="Masukkan Keperluan">{{$item->keperluan}}</textarea>  
                @error('keperluan')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Tanggal</label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" placeholder="Masukkan Nama" value="{{$item->tanggal}}">
                  @error('tanggal')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Tempat</label>
                <textarea class="form-control @error('tempat') is-invalid @enderror" id="tempat" name="tempat" placeholder="Masukkan Tempat" value="">{{$item->tempat}}</textarea>  
                @error('tempat')
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

<!-- modal detail -->
@foreach ($data as $item)
<div class="modal fade" id="detailmodal{{$item->id_st}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Data Surat Tugas</h5>
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
                  <th scope="col">Tanggal</th>
                  <td>{{date('d-m-Y', strtotime($item->tanggal)) }}</td>
                </tr>
                <tr>
                  <th scope="col">Keperluan</th>
                  <td>{{$item->keperluan}}</td>
                </tr>
                <tr>
                  <th scope="col">Tempat</th>
                  <td>{{$item->tempat}}</td>
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

@endsection
@include('sweetalert::alert')
@push('custom.script')
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
@endpush
