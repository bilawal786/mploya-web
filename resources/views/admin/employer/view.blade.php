{{-- @extends('admin.layouts.include')

@section('content') --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mploya</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bs-stepper/css/bs-stepper.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fullcalendar/main.css')}}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{asset('assets/plugins/dropzone/min/dropzone.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.min.css')}}">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <style>
        td {
            color: black;
        }

        /*.buttons-pdf{*/
        /*    background-color: #ee1f1f;*/
        /*}*/
        .buttons-csv,
        .buttons-excel {
            display: none;
        }

        .buttons-pdf {
            display: none;
        }

    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="goBack()" href="#" role="button"><i class="fas fa-arrow-left"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline" method="post" action="">
                            @csrf
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search" name="search" required="">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{route('admin.dashboard')}}" class="brand-link">
                <img src="{{asset('image/mploya.jpeg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
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
                        <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                            alt="User Image">
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
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="{{route('admin.dashboard')}}"
                                class="nav-link {{ $link == route('home') ? 'active':'' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>


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
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa  fa-list-alt"></i>
                                <p>
                                    Categories
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.category.all')}}"
                                        class="nav-link {{ $link == route('admin.category.all') ? 'active':'' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Categories
                                        </p>
                                    </a>
                                </li>

                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.subcategory.all')}}"
                                        class="nav-link {{ $link == route('admin.subcategory.all') ? 'active':'' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Sub Categories
                                        </p>
                                    </a>
                                </li>
                            </ul>
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
                                    <a href="{{route('admin.purchased.subscription')}}"
                                        class="nav-link {{ $link == route('admin.purchased.subscription') ? 'active':'' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Active Subscriptions</p>
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

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Employer Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{route('admin.all.employers')}}">Employers</a>
                                </li>
                                <li class="breadcrumb-item active">Employer Profile</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">

                                        @if($employer->image == '0')
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{asset('assets/dist/img/profilepic.png')}}"
                                            alt="User profile picture">
                                        @else
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{asset($employer->image)}}" alt="User profile picture">
                                        @endif

                                    </div>

                                    <h3 class="profile-username text-center">{{$employer->name}}</h3>



                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Profile Percentage</b>
                                            <div class="progress mt-2">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{$percentage}}%;" aria-valuenow="25"
                                                    aria-valuemin="0" aria-valuemax="100">{{$percentage}}%</div>
                                            </div>
                                        </li>

                                        <li class="list-group-item">

                                            <b>Jobs</b> <a class="float-right">
                                                @if($totaljobs == 0)
                                                Not Found
                                                @else
                                                {{$totaljobs}}
                                                @endif

                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Email</b> <a class="float-right">{{$employer->email}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Phone</b> <a class="float-right">
                                                @if($employer->phone == 0)
                                                Not Found
                                                @else
                                                {{$employer->phone}}
                                                @endif

                                            </a>
                                        </li>
                                    </ul>
                                    <input type="hidden" value="{{$employer->id}}" id="employer_id">
                                    <button class="btn btn-primary btn-block" data-toggle="modal"
                                        data-target="#exampleModal">Contact</button>
                                    @if($employer->is_popular == 0)
                                    <button id="pbtn" class="btn btn-success btn-block">Make Popular</button>
                                    @else
                                    <button id="pbtn" class="btn btn-success btn-block">Make UnPopular</button>
                                    @endif
                                    @if($employer->is_block == 1)
                                    <button id="bbtn" class="btn btn-danger btn-block">Block</button>
                                    @else
                                    <button id="bbtn" class="btn btn-danger btn-block">UnBlock</button>
                                    @endif

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- About Me Box -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">About Me</h3>
                                </div>
                                <div class="card-body">
                                    <strong><i class="fa fa-building mr-1"></i> Company Name</strong>

                                    @if ($employer->company_name == '0')
                                    <p class="text-muted">Not Found</p>
                                    @else
                                    <p class="text-muted">{{$employer->company_name}}</p>
                                    @endif

                                    <hr>
                                    <strong><i class="fas fa-address-card mr-1"></i> Address</strong>
                                    @if ($employer->address == '0')
                                    <p class="text-muted">Not Found</p>
                                    @else
                                    <p class="text-muted">{{$employer->address}}</p>
                                    @endif


                                    <hr>
                                    <strong><i class="fas fa-link mr-1"></i> Social Links</strong>
                                    <p class="text-muted"><b>Facebook: </b>
                                        @if ($employer->facebook_link == null)
                                        Not Found
                                        @else
                                        {{$employer->facebook_link}}
                                        @endif

                                        <br><b>Instagram:</b>
                                        @if ($employer->instagram_link == null)
                                        Not Found
                                        @else
                                        {{$employer->instagram_link}}
                                        @endif

                                        <br><b>Twitter: </b>
                                        @if ($employer->twitter_link == null)
                                        Not Found
                                        @else
                                        {{$employer->twitter_link}}
                                        @endif

                                        <br><b>Linkedin: </b>
                                        @if ($employer->linkedin_link == null)
                                        Not Found
                                        @else
                                        {{$employer->linkedin_link}}
                                        @endif

                                    </p>
                                    @if(( $employer->language == null))
                                    <hr>
                                    <strong><i class="fa fa-language mr-1" aria-hidden="true"></i>Language</strong>
                                    <p class="text-muted">
                                        Not Found
                                    </p>
                                    @else
                                    <hr>
                                    <strong><i class="fa fa-language mr-1" aria-hidden="true"></i>Language</strong>
                                    <p class="text-muted">
                                        @foreach($employer->language as $key => $data1)

                                        <span class="tag tag-danger">{{$employer->language[$key]}},</span>
                                        @endforeach
                                    </p>
                                    @endif
                                    @if($employer->description == null)
                                    <hr>
                                    <strong><i class="fas fa-pencil-alt mr-1"></i>Description</strong>
                                    <p class="text-muted">
                                        Not Found
                                    </p>
                                    @else
                                    <hr>
                                    <strong><i class="fas fa-pencil-alt mr-1"></i>Description</strong>
                                    <p class="text-muted">

                                        {{$employer->description}}
                                    </p>
                                    @endif

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#jobs"
                                                data-toggle="tab">Jobs</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#timeline"
                                                data-toggle="tab">Purchased Subscription</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#settings"
                                                data-toggle="tab">Video</a></li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="jobs">
                                            <!-- Post -->
                                            @if($jobs->isEmpty())

                                            <div class="post">
                                                <p>
                                                    Record Not Found
                                                </p>
                                            </div>
                                            @else
                                            @foreach ($jobs as $row)
                                            <div class="post">
                                                <div class="user-block">

                                                    <a href="#">{{$row->job_title}}</a>

                                                </div>
                                                <!-- /.user-block -->
                                                <p>
                                                    {{$row->description}}
                                                </p>

                                                <p>
                                                    <span href="#" class="text-sm mr-2"><b>Education:</b>
                                                        {{$row->education}}</span>
                                                    <span href="#" class="text-sm mr-2"><b>Experience:</b>
                                                        {{$row->experience}}</span>
                                                    <span href="#" class="text-sm"><b>Occupation:</b>
                                                        {{$row->occupation}}</span>
                                                    <span class="float-right">
                                                        <span href="#" class="text-sm mr-2"><b>Salary:</b>
                                                            {{$row->salary}}</span>
                                                        <span href="#" class="text-sm"><b>Salary Type:</b>
                                                            {{$row->salary_type}}</span>
                                                    </span>

                                                </p>


                                            </div>
                                            @endforeach
                                            @endif


                                            <!-- /.post -->

                                        </div>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="timeline">
                                            <!-- The timeline -->
                                            @if($purchasedsub->isEmpty())

                                            <div class="post">
                                                <p>
                                                    Record Not Found
                                                </p>
                                            </div>
                                            @else
                                            @foreach ($purchasedsub as $row)
                                            <div class="post">
                                                <div class="user-block">

                                                    <a href="#">{{$row->title}}</a>

                                                </div>
                                                <!-- /.user-block -->
                                                <p>
                                                    {{$row->description}}
                                                </p>

                                                <p>
                                                    <span href="#" class="text-sm mr-2"><b>Price:</b>
                                                        {{$row->price}}</span>
                                                    <span href="#" class="text-sm mr-2"><b>Valid Jobs:</b>
                                                        {{$row->valid_job}}</span>
                                                    <span href="#" class="text-sm"><b>Color:</b> {{$row->color}}</span>

                                                </p>


                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                        <!-- /.tab-pane -->

                                        <div class="tab-pane" id="settings">

                                            @if($employer->video == '0')
                                            <p> Video Not Found</p>
                                            @else
                                            <video width="320" height="240" controls>
                                                <source src="{{asset($employer->video)}}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                            @endif
                                        </div>
                                        <!-- /.tab-pane -->


                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Contact Form
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form id="messageform">
                                                        @csrf
                                                        <input type="hidden" value="{{$employer->id}}" name="user_id">
                                                        <div class="modal-body">
                                                            <label for="">Message</label>
                                                            <textarea class="form-control" rows="3"
                                                                placeholder="Enter your message..." name="message"
                                                                required></textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" id="add"
                                                                class="btn btn-primary">Send</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->


        </div>

        {{-- @endsection --}}
        <footer class="main-footer">
            <strong>Developed By <a href="https://www.webfabricant.com/">WebFabricant</a> 2021
            </strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);

    </script>

    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


    <!-- Bootstrap4 Duallistbox -->
    <script src="{{asset('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>

    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>

    <script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/plugins/inputmask/jquery.inputmask.min.js')}}"></script>

    <script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

    <script src="{{asset('assets/dist/js/adminlte.js')}}"></script>

    <script src="{{asset('assets/dist/js/demo.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('assets/dist/js/pages/dashboard.js')}}"></script>


    <script src="{{asset('assets/plugins/dropzone/min/dropzone.min.js')}}"></script>
    <script src="{{asset('assets/plugins/fullcalendar/main.js')}}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        @if(Session::has('messege'))
        var type = "{{Session::get('alert-type','success')}}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('messege') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
        @endif

    </script>

    <script>
        $(document).on("click", "#delete", function (e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Are you Want to delete?",
                    text: "Once Delete, This will be Permanently Delete!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Safe Data!");
                    }
                });
        });

    </script>

    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        $('#reservationdatetime').datetimepicker({
            icons: {
                time: 'far fa-clock'
            }
        });

    </script>
    <script>
        function goBack() {
            window.history.back();
        }

    </script>
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        });

    </script>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })


        });

    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            // make popular or Unpopular
            $('#pbtn').on('click', function () {
                var employer_id = $('#employer_id').val();

                $.ajax({
                    url: '{{url("admin/employer/popular")}}/' + employer_id,
                    method: 'get',
                    dataType: 'json',

                    success: function (data) {
                        if (data.success) {
                            toastr.success(data.success);
                            $('#pbtn').html('Make UnPopular');
                        } else {
                            toastr.error(data.error);
                            $('#pbtn').html('Make Popular');
                        }

                    },
                });
            });

            // block or unblock

            $('#bbtn').on('click', function () {
                var employer_id = $('#employer_id').val();

                $.ajax({

                    url: '{{url("admin/employer/block")}}/' + employer_id,
                    method: 'get',
                    dataType: 'json',

                    success: function (data) {
                        if (data.success) {
                            toastr.success(data.success);

                            $('#bbtn').html('Block');

                        } else {
                            toastr.error(data.error);

                            $('#bbtn').html('UnBlock');

                        }

                    }
                });

            });

        });

    </script>


    <script>
        $(document).ready(function () {

            $('#messageform').on('submit', function (event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({

                    url: '{{route("admin.contact")}}',
                    method: 'post',
                    processData: false,
                    contentType: false,
                    data: formData,
                    beforeSend: function () {

                        $('#exampleModal').modal('hide');
                    },
                    success: function (data) {
                        if (data.success) {
                            toastr.success(data.success);
                        } else {
                            toastr.error(data.error);

                        }

                    }

                });

            });
        });

    </script>

</body>

</html>
