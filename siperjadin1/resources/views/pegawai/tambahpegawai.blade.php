<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Halaman Tambah Pegawai')</title>
  @section('content')
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
 
  @stack('custom-css')
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
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
    <h3> Form Input Data Pegawai</h3>
    <form action="{{ route('simpanpegawai') }}" method="post">
    
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
    <label for="exampleFormControlSelect1">Jabatan Fungsional</label>
    <select class="form-control" id="jabfung" name="jabfung" value="{{old('jabfung')}}"> 
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
    <label for="exampleFormControlSelect1">Pangkat</label>
    <select class="form-control @error('pangkat') is-invalid @enderror" id="pangkat" name="pangkat">
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
  <div class="col-md-4 mb-3">
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
  </div>
  <div class="form-row">
  <div class="col-md-4 mb-3">
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
    <select class="custom-select" id="fakultas" name="fakultas">
      <option value="" selected disabled>Pilih Fakultas</option>
      <option value={{($Pegawai->fakultas === 'FMIPA')? 'selected' : ''}}>FMIPA</option>
      <option value="Sekolah Vokasi">Sekolah Vokasi</option>
      <option value="FP">FP</option>
      <option value="FK">FK</option>
      <option value="FKIP">FKIP</option>
      <option value="FISIP">FISIP</option>
      <option value="FH">FH</option>
      <option value="FEB">FEB</option>
      <option value="FIB">FIB</option>
      <option value="FT">FT</option>
      <option value="FSRD">FSRD</option>
      <option value="FKOR">FKOR</option>
      <option value="PDD Madiun">PDD Madiun</option>
      <option value="UNS Pusat">UNS Pusat</option>
      <option value="UPT Kearsipan">UPT Kearsipan</option>
    </select>
  </div>
  <button type="submit" class="btn btn-success">Simpan Data</button>
</form>

</section>
@include('layout.footer')
<script src=" assets/plugins/jquery/jquery.min.js"></script>
@stack('custom-script')

<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="assets/dist/js/demo.js"></script> -->


</body>
</html>
