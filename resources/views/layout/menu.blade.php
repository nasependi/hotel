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
        <li class="nav-item ">
          <a href="javascript:;" class="nav-link ">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              Widgets
              <i class="end fas fa-angle-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ asset('/') }}pages/widgets/small-box.html" class="nav-link ">
                <i class="fas fa-angle-right"></i>
                <p>Small Box</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ asset('/') }}pages/widgets/info-box.html" class="nav-link ">
                <i class="fas fa-angle-right"></i>
                <p>info Box</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ asset('/') }}pages/widgets/cards.html" class="nav-link ">
                <i class="fas fa-angle-right"></i>
                <p>Cards</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
  <!-- /.sidebar -->
