<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Halaman Edit Data Pegawai')</title>

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

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Form Input Data Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <!-- Main row -->
            <div class="card card-info card-outline">
            
              <div class="card-body">
                <table class="table-bordered">
                  <!-- Morris chart - Sales -->
                 <form action=" " method="POST">
                 {{ csrf_field() }}
                  <div class="form-group">
                  <label for=""> NIP  </label>
                    <input type="text" id="nip" name="nip" class="form-control" placeholder="NIP" value="{{ $item->nip }}">
                  </div> 
                  </div>
                  <div class="form-group">
                    <label for=""> Nama  </label>
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Pegawai" value="{{ $item->nama }}">
                    <small id="emailHelp" class="form-text text-muted">Tuliskan Nama Lengkap</small>
                  </div>
                  <div class="form-group">
                  <label for=""> Pangkat </label>
                    <input type="text" id="pangkat" name="pangkat" class="form-control" placeholder="Pangkat" value="{{ $item->pangkat }}">
                  </div>
                  <div class="form-group">
                      <label for=""> Golongan </label>
                      <select class="form-control" id="golongan" name="golongan"  placeholder="Golongan">
                        
                        <option>IA</option>
                        <option>IIA</option>
                        <option>IIIA</option>
                        <option>IVA</option>
                        <option>IB</option>
                        <option>IIB</option>
                        <option>IIIB</option>
                        <option>IVB</option>
                        <option>IC</option>
                        <option>IIC</option>
                        <option>IIIC</option>
                        <option>IVC</option>
                        <option>ID</option>
                        <option>IID</option>
                        <option>IIID</option>
                        <option>IVD</option>
                        
                  </select>
                    </label>
                  </div>
                  <div class="form-group">
                  <label for=""> Fakultas </label>
                  <select class="form-control" id="fakultas" name="fakultas" placeholder="Fakultas">
                    <option>Sekolah Vokasi</option>
                    <option>Fakultas Pertanian</option>
                    <option>Fakultas MIPA</option>
                    <option>Fakultas Kedokteran</option>
                    <option>Fakultas Keguruan dan Ilmu Pendidikan</option>
                    <option>Fakultas Ilmu Sosial dan Politik</option>
                    <option>Fakultas Hukum</option>
                    <option>Fakultas Ekonomi Bisnis</option>
                    <option>Fakultas Ilmu Budaya</option>
                    <option>Fakultas Seni Rupa Desain</option>
                    <option>Fakultas Teknik</option>
                    <option>PDD Madiun</option>
                    <option>Pusat</option>
                    <option>UPT Kearsipan</option>
                  </select>
                </label>
              </div>
                   
                  <div class="form-group">
                    <label for=""> Jabatan Fungsional </label>
                      <select class="form-control" id="jabfung" name="jabfung"  placeholder="Jabatan Fungsional">
                          <option>Guru Besar</option>
                          <option>Lektor</option>
                          <option>Lektor Kepala</option>
                          <option>Tenaga Pengajar</option>
                          <option>Tenaga Pendidik</option>
                          <option>Fungsional Umum</option>
                          <option>Pranata Laboraturium Pendidikan</option>
                          <option>Arsiparis</option>

                      </select>
                  </div>
                  <div class="form-group">
                  <label for=""> Jabatan Struktural </label>
                    <input type="text" id="jabstruk" name="jabstruk" class="form-control" placeholder="Jabatan Struktural">
                  </div>
                  <div class="form-group">
                  <label for=""> Jabatan  </label>
                    <input type="text" id="jabatan" name="jabatan" class="form-control" placeholder="Jabatan">
                  </div>
                  <button type="submit" class="btn btn-success">Submit</button>
                 </form>
                  
                 
                </table>
              </div><!-- /.card-body -->
            </div>
          <!-- right col -->
        <!-- /.row (main row) -->
      
    </div>
    <!-- /.content -->
  </div>

@include('layout.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<!-- jQuery -->
<script src=" assets/plugins/jquery/jquery.min.js"></script>

<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="assets/dist/js/demo.js"></script> -->


@stack('custom-script')
</body>
</html>
