@extends('layout.master')
@section('title', 'Halaman Surat Tugas')
@push('custom-css')
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
@endpush

@section('content')
<section class="content">
<div class="container-fluid">
    <section class="content">
    <h2 class="mt-0"> Data Surat Tugas</h2>
  <div class="card card-info card-outline">
  <div class="card-header">
      <div class="card-tools">
          <a href="{{route ('tambahst') }}" button class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data 
        </a>
      </div>
  </div>

  <div class="card-body table-responsive">
      <table class="table table-bordered">
         <tr class="text-center">
              <th scope="col">No ST</th>
              <th scope="col">NIP</th>
              <th scope="col">Nama</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Aksi</th>
          </tr>
          <!-- kalo tidak ada data maka akan menampilkan pesan no data to display -->
          @if ($datast->count() == 0)
        <tr>
            <td colspan="10">No data to display.</td>
        </tr>
        @endif
          @foreach ($datast as $item)
          <tr class="text-center">
              <td>{{ $item->no_st}}</td>
              <td>{{ $item->nip}}</td>
              <td>{{ $item->nama}}</td>
              <td>{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
              <td>
                  <form action="" method="POST" class="d-inline">
                        @method('Delete')
                        @csrf
                            <a href="{{ url('editst', $item->no_st)}}" class="btn btn-primary btn-sm" title="Edit Data" ><i class="fas fa-pencil-alt"></i></a>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default" title="Detail Data" ><i class="fas fa-eye"></i></button>
                            <a href="{{ url('deletest',$item->no_st) }}" class="btn btn-danger btn-sm" title="Delete Data" data-toggle="modal" data-target="#modal-danger"  type="submit" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></a>
                    </form>
              </td>
          </tr>
        </tbody>
        @endforeach
      </table>
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
@endsection
@include('sweetalert::alert')
@push('custom.script')
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
@endpush
