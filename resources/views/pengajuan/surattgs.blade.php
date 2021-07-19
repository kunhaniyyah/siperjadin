@extends('layout.master')
@section('title', 'Halaman Pengajuan')
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
          @if ($data->count() == 0)
        <tr>
            <td colspan="10">No data to display.</td>
        </tr>
        @endif
          @foreach ($data as $item )
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
        </div><!-- /.card body table responsive -->
      </div>
    </div>
</section>


<!-- modal tambah data -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <label for="exampleFormControlInput1">No Surat Tugas</label>
            <input type="text" class="form-control @error('no_st') is-invalid @enderror" id="no_st" name="no_st" placeholder="Masukkan No Surat Tugas" value="">
              @error('no_st')
                <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">user_nip</label>
            <input type="text" class="form-control @error('user_nip') is-invalid @enderror" id="user_nip" name="user_nip" placeholder="Masukkan user_nip" value="">
              @error('user_nip')
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
            <textarea class="form-control @error('tempat') is-invalid @enderror" id="tempat" name="tempat" placeholder="Masukkan Keperluan" value=""></textarea>  
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
<!-- selesai modal tambah data  -->




@endsection
@include('sweetalert::alert')
@push('custom.script')
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
@endpush
