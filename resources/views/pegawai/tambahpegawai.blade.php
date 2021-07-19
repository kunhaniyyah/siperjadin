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
    <form action="{{ route('pegawai.store') }}" method="post">
    
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
    <label for="exampleFormControlInput1">Jabatan Fungsional</label>
    <select class="form-control" id="jabfung_id" name="jabfung_id">
    <option disabled value="">Pilih Jabatan</option>
        @foreach ($datapegawai as $item)
          <option value="{{ $item->jabfung_id }}">{{ $item->jabfung }}</option>
        @endforeach
    </select>
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
    <select class="form-control" id="fakultas" name="fakultas">
      <option>Pilih Fakultas</option>
      <option value="Sekolah Vokasi">Sekolah Vokasi</option>
      <option>FMIPA</option>
      <option>FP</option>
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
