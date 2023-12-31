<button id="show-sidebar" class="btn btn-sm btn-dark">
  <i class="fas fa-bars"></i>
</button>
<nav id="sidebar" class="sidebar-wrapper">
  <div class="sidebar-content">
    <div class="sidebar-brand">
      <a href="#">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1969px-Laravel.svg.png" alt="Logo DLH DKI" class="img-fluid mr-1" style="width: 32px;">
        Laravel
    </a>
      <div id="close-sidebar">
        <i class="fas fa-times"></i>
      </div>
    </div>
    <div class="sidebar-header">
      <div class="user-pic">
        <img class="img-responsive img-rounded" src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
          alt="User picture">
      </div>
      <div class="user-info px-2">
        <span class="user-name">
          <strong>
            Hello,
            {{Auth::user()->first_name}} {{Auth::user()->last_name}}
          </strong>
        </span>
        <span class="user-status">
          <i class="fa fa-circle"></i>
          <span>Online</span>
        </span>
      </div>
    </div>
    <!-- sidebar-header  -->
    <div class="sidebar-menu">
      <ul>
        <li class="header-menu">
          <a href="{{route('dashboard')}}">
            <i class="fas fa-home"></i>
            Dashboard
          </a>
        </li>
        <li class="sidebar-dropdown">
          <a href="#">
            <i class="fas fa-calendar-week"></i>
            Siswa
          </a>
          <div class="sidebar-submenu" >
            <ul>
              <li class="active">
                <a href="{{route('siswa.index')}}">Daftar Siswa</a>
              </li>
              <li class="active">
                <a href="{{route('siswa.add')}}">Tambah Siswa Baru</a>
              </li>
            </ul>
          </div>
        </li>
        {{-- <li class="sidebar-dropdown">
          <a href="#">
            <i class="fa fa-tachometer-alt"></i>
            <span>Dashboard</span>
            <span class="badge badge-pill badge-warning">New</span>
          </a>
          <div class="sidebar-submenu">
            <ul>
              <li>
                <a href="#">Dashboard 1
                  <span class="badge badge-pill badge-success">Pro</span>
                </a>
              </li>
              <li>
                <a href="#">Dashboard 2</a>
              </li>
              <li>
                <a href="#">Dashboard 3</a>
              </li>
            </ul>
          </div>
        </li> --}}
      </ul>
    </div>
    <!-- sidebar-menu  -->
  </div>
  <!-- sidebar-content  -->
  <div class="sidebar-footer">
    {{-- <a href="#">
      <i class="fa fa-sign-out-alt"></i>
    </a> --}}
  </div>
</nav>
