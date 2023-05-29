<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

  <!-- Sidebar Toggle (Topbar) -->
  <form action="{{ route('logout') }}" method="HEAD">
    @csrf

  </form>
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
  </button>

  

  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">

      
      

      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <form action="{{ route('logout') }}" method="post">
         @csrf
          <button type="submit" class="nav-link dropdown-toggle"  id="userDropdown" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">logout</span>
              {{-- <img class="img-profile rounded-circle"
                  src="img/undraw_profile.svg"> --}}
          </button>
        </form>
          
      </li>

  </ul>

</nav>