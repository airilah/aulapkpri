<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">Admin PKP-RI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/img/normal_koperasi.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->nama }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{ route('kalender') }}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{ route('daftar_katalog') }}" class="nav-link">
              <i class="nav-icon fas fa-solid fa-list"></i>
              <p>
                Katalog
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('daftar_aula') }}" class="nav-link">
              <i class="nav-icon far fa-building"></i>
              <p>
                Aula
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('daftar_pemesanan') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pemesanan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('daftar_antrian') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Antrian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('daftar_laporan') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('akun_admin') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Daftar Akun
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('akun_admin') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('akun_cust') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('daftar_anggota') }}" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Anggota & Pengurus
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('daftar_anggota') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Anggota</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('daftar_pengurus') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengurus</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('daftar_pembayaran') }}" class="nav-link">
              <i class="nav-icon far fa-regular fa-credit-card"></i>
              <p>
                Pembayaran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
              <i class="nav-icon fas fa-ban"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
