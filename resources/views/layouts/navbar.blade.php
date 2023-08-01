<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light bg-warning">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard') }}" class="nav-link">Sistem Pendukung Keputusan Pemberian Tunjangan Karyawan</a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST">
          @csrf <!-- Ini akan menambahkan token CSRF ke dalam formulir -->
          <button class="btn" type="submit"><i class="fas fa-power-off"></i></button>
      </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->