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

      <li class="nav-item dropdown show">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
        {{auth()->user()->name }}</a>
        <div class="dropdown-menu doprdown-menu-lg dropdown-menu-right" style="left:inherit; right: 0px;">
        <span class="dropdown-item dropdown-item" data-widget="logout" data-slide="true" href="{{ route('logout') }}"
                onclick="
                event.preventDefault();
                document.getElementById('formLogout').submit();">Logout</span>
        <form id="formLogout" action="{{ route('logout') }}" method="POST">@csrf</form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->