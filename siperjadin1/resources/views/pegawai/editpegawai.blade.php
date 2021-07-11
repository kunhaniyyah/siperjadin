@extends('layout.master')
@section('title', 'Halaman Edit Pegawai')
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
<h3> Form Edit Data Pegawai</h3>
    <form action="{{ route('updatepegawai', $peg->id_pegawai) }}" method="post">
    {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleFormControlInput1">NIP</label>
    <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" placeholder="Masukkan NIP" value="{{ $peg->nip}}">
      @error('nip')
        <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama</label>
    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" value="{{ $peg->nama}}">
    @error('nama')
        <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Pangkat</label>
    <select class="form-control @error('pangkat') is-invalid @enderror" id="pangkat" name="pangkat" value="{{ $peg->pangkat}}">
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
    <select class="form-control" id="golongan" name="golongan" value="{{ $peg->golongan}}">
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
    <select class="form-control" id="jabfung" name="jabfung" value="{{ $peg->jabfung_id}}"> 
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
    <select class="form-control" id="tingkat" name="tingkat" value="{{ $peg->tingkat}}">
      <option>B</option>
      <option>C</option>
      @error('tingkat')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Fakultas</label>
    <select class="form-control" id="fakultas" name="fakultas" value="{{ $peg->fakultas}}"> 
      <option>Sekolah Vokasi</option>
      <option>FP</option>
      <option>FMIPA</option>
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
      @error('fakultas')
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
