@extends('layout.master')
@section('title', 'Halaman Surat Tugas')
@push('custom-css')
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <script src=" assets/plugins/jquery/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endpush

@section('content')
<section class="content">
<div class="container-fluid">
    <section class="content">
    <h2 class="mt-0"> Data Surat Tugas</h2>
  <div class="card card-info card-outline">
  <div class="card-header">
      <div class="card-tools">
          <button class="btn btn-primary" data-toggle="modal" data-target="#tambahdata"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data 
          </button>
      </div>
      <button type="button" data-toggle="modal" data-target="#cetakmodal" class="btn btn-warning"><i class="fa fa-print" aria-hidden="true"></i>
      </button>
  </div>

  <div class="card-body table-responsive">
      <table class="table table-bordered">
         <tr class="text-center">
              <th scope="col">No</th>
              <th scope="col">Status</th>
              <th scope="col">No ST</th>
              <th scope="col">Nama</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Status</th>
              <th scope="col">Aksi</th>
          </tr>
          <!-- kalo tidak ada data maka akan menampilkan pesan no data to display -->
          @if ($datast->count() == 0)
        <tr>
            <td colspan="10">No data to display.</td>
        </tr>
        @endif
          @foreach ($datast as $item )
          <tr class="text-center">
              <td>{{ $loop->iteration}}</td>
              <td>
                @if($item->status==1)
                  <a href="{{ route('status' , $item->id_st)}}" class="btn btn-sm btn-danger btn-xs">Non Aktifkan</a>
                @else 
                  <a href="{{ route('status', $item->id_st)}}" class="btn btn-sm btn-success btn-xs">Aktifkan</a>
                @endif
              </td>
              <td>{{ $item->no_st}}</td>
              <td>{{ $item->nama}}</td>
              <td>{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
              <td><span class="badge {{ ($item->status == 1) ? 'badge-success' : 'badge-danger' }}">{{ ($item->status == 1) ? "Sudah diverifikasi" : "Belum diverifikasi" }}</span></td>
              <td>
                <button class="btn btn-primary btn-sm" title="Edit Data"  data-toggle="modal" data-target="#editmodal{{$item->id_st}}"><i class="fas fa-pencil-alt"></i></button>
                <a href="{{route('cetaksurat', $item->id_st)}}"><button class="btn btn-warning btn-sm" title="Cetak Surat" ><i class="fas fa-print"></i></button></a>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailmodal{{$item->id_st}}" title="Detail Data" ><i class="fas fa-eye"></i></button>
                  <form action="{{ route('surattugas.destroy', $item->id_st) }}" method="POST" class="d-inline">
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
      <div class="float-left">
          Showing 
          {!! $datast->firstItem() !!}
          of 
          {!! $datast->lastItem() !!}
        </div>
        <div class="float-right">
            {!! $datast->links() !!}
        </div>
      </div><!-- /.card body table responsive -->
        </div>
      </div>
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
        <a href="" onclick="this.href='/cetakpertanggal/'+ document.getElementById('tglawal').value +
        '/' + document.getElementById('tglakhir').value " target="_blank" class="btn btn-success">Cetak Data</a>
      </div>
    </div>
  </div>
</div>




<!-- modal tambah data-->
<div class="modal fade bd-example-modal-lg" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Surat Tugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{route('surattugas.store')}}" method="post">
        {{ csrf_field() }}
              <div class="form-group">
                <label for="exampleFormControlInput1">No Surat Tugas</label>
                <input type="text" class="form-control @error('no_st') is-invalid @enderror" id="no_st" name="no_st" placeholder="Masukkan No Surat Tugas" value="">
                  @error('no_st')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">NIP</label>
                <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" placeholder="Masukkan nip" value="">
                  @error('nip')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama" value="">
                  @error('nama')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>           

<!-- modal detail -->
@foreach ($datast as $item)
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
                  <th scope="col">nip</th>
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
@foreach ($datast as $item)
<div class="modal fade bd-example-modal-lg" id="editmodal{{$item->id_st}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Surat Tugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('pegawai.store')}}" method="POST">
      <div class="modal-body">
      {{ csrf_field() }}
              <div class="form-group">
                <label for="exampleFormControlInput1">No Surat Tugas</label>
                <input type="text" class="form-control @error('no_st') is-invalid @enderror" id="no_st" name="no_st" placeholder="Masukkan No Surat Tugas"  value="{{$item->no_st}}">
                  @error('no_st')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">nip</label>
                <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" placeholder="Masukkan nip" value="{{$item->nip}}">
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
                <label for="exampleFormControlInput1">Keperluan</label>
                <textarea class="form-control @error('keperluan') is-invalid @enderror" id="keperluan" name="keperluan" placeholder="Masukkan Keperluan">{{$item->keperluan}}</textarea>  
                @error('keperluan')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Tanggal</label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" placeholder="Masukkan Nama" value="{{$item->tanggal}}>
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

@endsection
@include('sweetalert::alert')
@push('custom.script')
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
@endpush


