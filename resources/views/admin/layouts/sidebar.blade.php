<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
      <img src="{{asset('image/mploya.jpeg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Mploya</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(!empty(Auth::user()->image))
          <img src="{{asset(Auth::user()->image)}}" class="img-circle elevation-2" alt="User Image">
          @else
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
         <div class="info">
          <a href="#" class="d-block">{{Auth::guard('admin')->user()->name}}</a>
        </div>
      </div>
    @php

        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        {
          $link = "https";
        }
        else
        {
          $link = "http";

          // Here append the common URL characters.
          $link .= "://";

          // Append the host(domain name, ip) to the URL.
          $link .= $_SERVER['HTTP_HOST'];

          // Append the requested resource location to the URL
          $link .= $_SERVER['REQUEST_URI'];
        }

    @endphp
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item menu-open">
                <a href="{{route('admin.dashboard')}}" class="nav-link {{ $link == route('home') ? 'active':'' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                      Dashboard
                  </p>
                </a>
              </li>
{{--            {{ $link == route('subscription.user') ? 'active':'' }}--}}


              <li class="nav-item">
                    <a href="{{route('admin.all.employers')}}" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>Employers</p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{route('admin.all.jobseeker')}}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Job Seekers</p>
                    </a>
                </li>

                <li class="nav-item">
            <a href="{{route('admin.category.all')}}" class="nav-link">
                <i class="nav-icon fa  fa-list-alt"></i>
              <p>
                Categories
              </p>
            </a>
          </li>

                    <li class="nav-item">
            <a href="{{route('admin.subcategory.all')}}" class="nav-link">
                <i class="nav-icon fa  fa-list-alt"></i>
              <p>
                Sub Categories
              </p>
            </a>
          </li>

                      <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-comment-dollar"></i>
              <p>
                Subscriptions
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.subscription.all')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Subscriptions</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.create.subscription')}}" class="nav-link">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <p>Add Subscriptions</p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item">
            <a href="{{route('logout')}}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Log Out</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
