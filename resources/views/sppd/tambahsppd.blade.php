@extends('layout.master')
@section('title', 'Halaman Tambah Data SPPD')
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
<h3> Form Tambah Data Surat SPPD</h3>
    <form action=" {{ url('simpansppd') }}" method="post">
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
    <textarea class="form-control @error('tingkat') is-invalid @enderror" id="tingkat" name="tingkat" placeholder="Masukkan Keperluan">{{old('keperluan')}}</textarea>  
    @error('keperluan')
        <span class="text-danger">{{ $message }}</span>
      @enderror
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
  <div class="form-group">
    <label for="exampleFormControlInput1">Total Ajuan</label>
    <input type="text" class="form-control @error('total_ajuan') is-invalid @enderror" id="total_ajuan" name="total_ajuan" value="{{old('total_ajuan')}}">
      @error('total_ajuan')
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
