
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Registrasi</title>

  <link rel="shortcut icon" type="image/x-icon" href="assetss/img/logouns.ico">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset ('assets/plugins/fontawesome-free/css/all.min.css') }} ">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset ('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset ('assets/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="{{ url('/') }}"><b>SIPERJADIN</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Halaman Registrasi</p>

      <form action="{{ route('simpanregister') }}" method="post">
      {{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="nip" placeholder="NIP">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" placeholder="Full Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="{{ url('/') }}" class="text-center">I already have an account</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset ('assets/plugins/jquery/jquery.min.js') }} "></script>
<!-- Bootstrap 4 -->
<script src="{{ asset ('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ('assets/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
