
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-success elevation-4 sidebar-adminbg">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link b__color">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AP" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminPanel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex b__color">
        <div class="image">
          <img src="{{ asset('dist/img/avatar.png') }}" class="img-circle elevation-2" title="Created at {{ \Auth::user()->created_at->toFormattedDateString() }} " alt="Image">
        </div>
        <div class="info">
          <a href="#" class="d-block" title="Created at {{ \Auth::user()->created_at->toFormattedDateString() }} ">{{ \Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link @if(Illuminate\Support\Facades\Route::is('home')) active @endif ">
              <i class="fa fa-tachometer-alt nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('calender') }}" class="nav-link @if(Illuminate\Support\Facades\Route::is('calender')) active @endif">
              <i class="fa fa-calendar nav-icon"></i>
              <p>Activity</p>
            </a>
          </li>

          @if(Auth::user()->isSuperAdmin())
          <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link @if(Illuminate\Support\Facades\Route::is('user.index')) active @endif">
              <i class="fas fa-users nav-icon"></i>
              <p>Registered Users</p>
            </a>
          </li>
          @endif

          @if(Auth::user()->isSuperAdmin())
          <li class="nav-item">
            <a href="{{ route('activity.index') }}" class="nav-link @if(Illuminate\Support\Facades\Route::is('activity.index')) active @endif">
              <i class="fas fa-user nav-icon"></i>
              <p>User Activities</p>
            </a>
          </li>
          @endif

          <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>
              Settings
                  </p>
                </a>
              </li>
          <li class="nav-item">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                  <p> <i class="nav-icon fas fa-sign-out-alt"></i> {{ __('Logout') }}</p>
                </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>