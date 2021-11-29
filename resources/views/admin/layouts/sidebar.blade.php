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
          @if(!empty(Auth::guard('admin')->user()->image))
          <img src="{{asset(Auth::guard('admin')->user()->image)}}" class="img-circle elevation-2" alt="User Image" style="height: 35px;width:35px">
          @else
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image" style="height: 35px;width:35px">
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
               {{-- Profile --}}
                         <li class="nav-item">
                            <a href="{{route('admin.profile')}}" class="nav-link {{ $link == route('admin.profile') ? 'active':'' }}">

                                <i class="nav-icon  fas fa-user"></i>
                                <p>
                                    Profile
                                </p>
                            </a>
                        </li>      
                {{-- end Ptofile  --}}
              <li class="nav-item">
                    <a href="{{route('admin.all.employers')}}" class="nav-link {{ $link == route('admin.all.employers') ? 'active':'' }}">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>Employers</p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{route('admin.all.jobseeker')}}" class="nav-link {{ $link == route('admin.all.jobseeker') ? 'active':'' }}">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Job Seekers</p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{route('admin.all.jobs')}}" class="nav-link {{ $link == route('admin.all.jobs') ? 'active':'' }}">
                        <i class="nav-icon  fas fa-briefcase"></i>
                        <p>Active Jobs</p>
                    </a>
                </li>
             <li class="nav-item {{ $link == route('admin.category.all') || $link == route('admin.subcategory.all')  ? 'menu-open':''}}">
            <a href="#" class="nav-link  {{ $link == route('admin.category.all') || $link == route('admin.subcategory.all')  ? 'active':'' }}">
                <i class="nav-icon fa  fa-list-alt"></i>
              <p>
                Categories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                 <a href="{{route('admin.category.all')}}" class="nav-link {{ $link == route('admin.category.all') ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
              <p>
                Categories
              </p>
            </a>
              </li>

            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                 <a href="{{route('admin.subcategory.all')}}" class="nav-link {{ $link == route('admin.subcategory.all') ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
              <p>
                Sub Categories
              </p>
            </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ $link == route('admin.subscription.all') || $link == route('admin.purchased.subscription') || $link == route('admin.create.subscription')  ? 'menu-open':'' }}">
            <a href="#" class="nav-link {{ $link == route('admin.subscription.all') || $link == route('admin.purchased.subscription') || $link == route('admin.create.subscription')  ? 'active':'' }}">
                <i class="nav-icon fa fa-comment-dollar"></i>
              <p>
                Subscriptions
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.subscription.all')}}" class="nav-link {{ $link == route('admin.subscription.all') ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Subscriptions</p>
                </a>
              </li>

            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.purchased.subscription')}}" class="nav-link {{ $link == route('admin.purchased.subscription') ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Subscriptions</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.create.subscription')}}" class="nav-link {{ $link == route('admin.create.subscription') ? 'active':'' }}">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <p>Add Subscriptions</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link {{ $link == route('admin.subscription.all') || $link == route('admin.purchased.subscription') || $link == route('admin.create.subscription')  ? 'active':'' }}">
                <i class="nav-icon fa fa-comment-dollar"></i>
              <p>
                Language
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.languages')}}" class="nav-link {{ $link == route('admin.languages') ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Languages</p>
                </a>
              </li>

            </ul>
          </li>

           <li class="nav-item">
            <a href="{{route('admin.logout')}}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Log Out</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
