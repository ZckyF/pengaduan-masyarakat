<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="/admin">Dashboard Admin</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    {{-- <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search"> --}}
    <div class="dropdown col-md-4">
      <button class="btn dropdown-toggle text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{-- <i  class="bi bi-sun-fill theme-icon-active" data-theme-icon-active=" bi-sun-fill"></i> --}}
        Mode
      </button>
      <ul class="dropdown-menu">
        <li>
          <button class="dropdown-item d-flex align-items-center " type="button" data-bs-theme-value="light"  >
            <i  class="bi bi-sun-fill me-2 opacity-50" data-theme-icon=" bi-sun-fill"></i>
            Light
          </button>
        </li> 
        <li>
          <button class="dropdown-item d-flex align-items-center " type="button" data-bs-theme-value="dark">
            <i class="bi bi-moon-fill me-2 opacity-50" data-theme-icon=" bi-moon-fill"></i>
            Dark
          </button>
        </li>
      </ul>
      
    </div>

    <form action="{{ Request::is('/admin') ? '/admin' : '' }} {{ Request::is('/admin/histori') ? '/admin/histori' : '' }} {{ Request::is('/admin/tambah') ? '/admin/tambah' : '' }}" method="get" class="col-md-5">
      <input class="form-control form-control-dark w-100 rounded-0 border-0-4 " type="text" placeholder="Cari nama atau judul" aria-label="Search" name="search" value="{{ request('search') }}" />
    
    </form>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="/logout">Logout<span data-feather="log-out"></span></a>
      </div>
    </div>
  </header>