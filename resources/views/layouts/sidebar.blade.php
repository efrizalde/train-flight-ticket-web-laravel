<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #1fab89;">
      
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/pesanan">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-plane"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Travel <sup>ijal</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
  <li class="nav-item">
      <a class="nav-link" href="dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Data
    </div>

    <li class="nav-item {{ Route::is('pesanan') ? 'active' : '' }}">
      <a class="nav-link" href="{{route('pesanan')}}">
        <i class="fas fa-fw fa-ticket-alt"></i>
        <span>Pesanan Tiket</span></a>
    </li>

    <li class="nav-item {{ Route::is('rute') ? 'active' : '' }}">
    <a class="nav-link" href="{{route('rute')}}">
        <i class="fas fa-fw fa-route"></i>
        <span>Rute</span></a>
      </li>
    
    <li class="nav-item {{ Route::is('transportasi') ? 'active' : '' }}">
    <a class="nav-link" href="{{route('transportasi')}}">
        <i class="fas fa-fw fa-plane"></i>
        <span>Transportasi</span></a>
      </li>
      
    {{-- <li class="nav-item">
        <a class="nav-link" href="">
          <i class="fas fa-fw fa-users"></i>
          <span>Penumpang</span></a>
      </li> --}}

    <li class="nav-item {{ Route::is('petugas') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('petugas')}}">
          <i class="fas fa-fw fa-user-tie"></i>
          <span>Petugas</span></a>
      </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->