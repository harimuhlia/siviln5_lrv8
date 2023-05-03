<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('AdminLTE') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">E-Ijazah N5</span>
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('fotoprofil/'. Auth()->user()->foto_profil) }}" class="img-circle elevation-2" alt="Foto Profil">
        </div>
        <div class="info">
          <a href="/profil" class="d-block">{{ Auth::user()->name }}</a>
          <span class="text-success"><i class="fas fa-circle nav-icon"></i> {{ Auth::user()->role }}</span>
        </div>
      </div>
  
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="{{ route('home')}}" class="nav-link {{ (request()->is('dashboard*')) ? 'active' : '' }}" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fas fa-list"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('datajurusan.index')}}" class="nav-link {{ (request()->is('datajurusan*')) ? 'active' : '' }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Jurusan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('datasiswa.index')}}" class="nav-link {{ (request()->is('datasiswa*')) ? 'active' : '' }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Lain</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('dataijazah.index')}}" class="nav-link {{ (request()->is('dataijazah*')) ? 'active' : '' }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                List Ijazah
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-header">PENGATURAN</li>
          <li class="nav-item">
          @if (Auth()->user()->role == 'Administrator')
            <a href="{{ route('usermanage.index')}}" class="nav-link {{ (request()->is('usermanage.index*')) ? 'active' : '' }}" class="nav-link">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                Data Pengguna
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-id-card"></i>
              <p>
                Profil Pengguna
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('profil') }}" class="nav-link {{ (request()->is('profil*')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Aplikasi</p>
                </a>
              </li>
            </ul>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="nav-link">
            <button type="button" class="btn btn-block btn-danger btn-sm" id="logout-form"><i class="fas fa-sign-out-alt"></i> KELUAR</button>
            {{ csrf_field() }}
            </form>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>