<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href=" / ">Universitas Mulawarman</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">UM</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown">
                <a href="/home " class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="">General Dashboard</a></li>
                </ul>
              </li>
              <li class="menu-header">Menu</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-file-alt"></i> 
                  <span>PENGUJIAN SAMPLE</span></a>
                  <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('datapelanggan.index')}}">0. Data Pelanggan</a></li> 
                    <li><a class="nav-link" href="{{route('parameteruji.index')}}">1. Parameter Uji</a></li> 
                  <li><a class="nav-link" href="{{route('bukuinduk.index')}}">2. Buku Induk </a></li> 
                </ul>
              </li>
              @if ($message = Session::get('grupnya') == '2')
              <li class="menu-header">User</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{route('lihat-user')}}">Lihat User</a></li>
                  
                  <li><a href=" {{route('tambah-user')}} ">Tambah User</a></li>
                 
                </ul>
              </li>
              @endif
             
        </aside>
      </div>