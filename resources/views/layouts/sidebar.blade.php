<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-warning">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('assets') }}/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PT. Budi Agung S</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="{{ route('dashboard') }}" class="nav-link {{ Route::is('dashboard*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
            
          </li>
          <li class="nav-item ">
            <a href="{{route('alternative.index')}}" class="nav-link {{ Route::is('alternative*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Karyawan
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('criteria.index') }}" class="nav-link {{ Route::is('criteria*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Kriteria
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('subcriteria.index') }}" class="nav-link {{ Route::is('subcriteria*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Sub Kriteria
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('penilaian.index') }}" class="nav-link {{ Route::is('penilaian*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-file-signature"></i>
              <p>
                Penilaian Karyawan
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('result.index') }}" class="nav-link {{ Route::is('result*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-calculator"></i>
              <p>
                Hasil
                
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>