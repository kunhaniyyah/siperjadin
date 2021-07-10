
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="assets/dist/img/logosv.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIPERJADIN</span>
    </a>
        <!-- Sidebar -->
        <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/dist/img/orang.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
          <span> Welcome, </span><br>
          {{auth()->user()->name}}
          </a> 
        </div>
      </div>

      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="/dashboard" class="nav-link {{ Request::path() === 'dashboard' ? 'bg-primary' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class=""></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
          </li>

        @if(auth()->user()->level_user == "admin")
          <li class="nav-item">
            <a href="{{route('index')}}" class="nav-link {{ Request::path() === 'pegawai' ? 'bg-primary' : '' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Pegawai
                <span class=""></span>
              </p>
            </a>
 
          </li>
 @endif

 @if(auth()->user()->level_user == "admin")
          <li class="nav-item">
            <a href="#" class="nav-link {{ Request::path() === '' ? 'bg-primary' : '' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Surat Tugas
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Input Surat Tugas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Database Surat Tugas</p>
                </a>
              </li>
</ul>
</li>
@endif



@if(auth()->user()->level_user == "staff")
          <li class="nav-item">
            <a href="#" class="nav-link {{ Request::path() === '' ? 'bg-primary' : '' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Mekanisme Pengajuan
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <ul class="nav child_menu">
                <a href="{{url('surattugas')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengajuan Surat Tugas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengajuan SPPD</p>
                </a>
                </ul>
              </li>
</ul>
</li>
@endif


@if(auth()->user()->level_user == "admin")
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data SPPD
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Input SPPD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Database Pegawai</p>
                </a>
              </li>

            </ul>

        </li>
        @endif




      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

