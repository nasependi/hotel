  <!-- Sidebar -->
  <div class="sidebar">
    <nav class="mt-2">
      <!-- Sidebar Menu -->
      <ul class="nav nav-pills nav-sidebar flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
        <li class="nav-item {{ request()->is('layout/home') ? 'menu-open' : '' }}">
          <a href="{{ url('layout/home') }}" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Dashboard
              <i class="end fas fa-angle-right"></i>
            </p>
          </a>
        </li>
        <li class="nav-item {{ request()->is('bookings') ? 'menu-open' : '' }}">
          <a href="{{ url('bookings') }}" class="nav-link ">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Booking
              <i class="end fas fa-angle-right"></i>
            </p>
          </a>
        </li>
         <li class="nav-item {{ request()->is('kamar') ? 'menu-open' : '' }}">
          <a href="javascript:;" class="nav-link ">
            <i class="nav-icon fas fa-bed"></i>
            <p>
              Kamar
              <i class="end fas fa-angle-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('kamar')}}" class="nav-link ">
                <i class="nav-icon far fa-circle"></i>
                <p>Kamar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('jkamar')}}" class="nav-link ">
                <i class="nav-icon far fa-circle"></i>
                <p>Jenis Kamar</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
  <!-- /.sidebar -->
