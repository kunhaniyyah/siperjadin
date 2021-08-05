
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('assets/index3.html') }}" class="brand-link">
      <img src="{{ asset('assets/dist/img/logosv.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIPERJADIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/orang.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
          <span>
          {{auth()->user()->name}}
          </span>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
          @if(auth()->user()->level_user == "admin")
          <li class="nav-item">
            <a href="/dashboard" class="nav-link {{ Request::path() === 'dashboard' ? 'bg-primary' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @endif
          @if(auth()->user()->level_user == "admin")
          <li class="nav-item">
            <a href="{{ route('pegawai.index')}}" class="nav-link {{ Request::path() === 'pegawai' ? 'bg-primary' : '' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Pegawai
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ route('surattugas.index') }}" class="nav-link {{ Request::path() === 'surattugas' ? 'bg-primary' : '' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Surat Tugas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('sppd.index') }}" class="nav-link {{ Request::path() === 'sppd' ? 'bg-primary' : '' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data SPPD
              </p>
            </a>
          </li>
         @endif

         @if(auth()->user()->level_user == "staff")
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Mekanisme Pengajuan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('surattgs.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengajuan Surat Tugas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sppdpegawai.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengajuan SPPD</p>
                </a>
              </li>
              </ul>
         @endif
         <li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link"
                onclick="
                event.preventDefault();
                document.getElementById('formLogout').submit();
                " role="button">
                <ion-icon name="log-out-outline"></ion-icon>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Log Out</p>
                  <form id="formLogout" action="{{ route('logout') }}" method="POST">@csrf</form>
                </a>
              </li>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
