  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="" role="button">
        </a>
      </li>
      <li class="nav-item">
        <a class="btn btn-block btn-danger" data-widget="control-sidebar" data-slide="true" href="{{ route('logout') }}" class="nav-link"
                onclick="
                event.preventDefault();
                document.getElementById('formLogout').submit();
                " role="button">
          <i></i>Log Out
          <form id="formLogout" action="{{ route('logout') }}" method="POST">@csrf</form>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->