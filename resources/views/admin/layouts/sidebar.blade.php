<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        {{-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" href="/admin">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Aduan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/histori')  ? 'active' : ''  }}" href="/admin/histori">
            <span data-feather="trash-2" class="align-text-bottom"></span>
            Histori
          </a>
        </li>
      </ul>

     
     
     @if (Auth::user()->level === 'super_admin')
     <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
       <span>Administrasi</span>
     </h6>
     <ul class="nav flex-column">
       <li class="nav-item">
         <a class="nav-link {{ Request::is('admin/tambah*') ? 'active' : '' }}" aria-current="page" href="/admin/tambah">
           <span data-feather="user-plus" class="align-text-bottom"></span>
             Tambah Admin
         </a>
       </li>
     </ul>
         
     @endif
    </div>
  </nav>
  