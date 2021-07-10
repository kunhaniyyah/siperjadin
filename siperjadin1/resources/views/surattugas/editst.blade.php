@extends('layout.master')
@section('title', 'Halaman Edit Data Surat Tugas')
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
<h3> Form Edit Data Surat Tugas</h3>
    <form action=" {{route('updatest', $st->no_st) }}" method="post">
    {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleFormControlInput1">No Surat Tugas</label>
    <input type="text" class="form-control @error('no_st') is-invalid @enderror" id="no_st" name="no_st" placeholder="Masukkan No Surat Tugas" value="{{ $st->no_st}}">
      @error('no_st')
        <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">NIP</label>
    <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" placeholder="Masukkan NIP" value="{{ $st->nip}}">
      @error('nip')
        <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama</label>
    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ $st->nama}}">
      @error('nama')
        <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Keperluan</label>
    <textarea class="form-control @error('keperluan') is-invalid @enderror" id="keperluan" name="keperluan" placeholder="Masukkan Keperluan" value="">{{ $st->keperluan}}</textarea>  
    @error('keperluan')
        <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Tanggal</label>
    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ $st->tanggal}}">
      @error('tanggal')
        <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Tempat</label>
    <textarea class="form-control @error('tempat') is-invalid @enderror" id="tempat" name="tempat" placeholder="Masukkan Tempat"> {{$st->tempat}}</textarea>  
    @error('tempat')
        <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>
       <button type="submit" class="btn btn-success">Simpan Data</button>
</form>
            </section>
@endsection
@include('sweetalert::alert')
@push('custom.script')
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
@endpush
