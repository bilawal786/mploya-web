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

        @media only screen and (max-width: 600px) {
            #profile_form {
                margin-left: -4px !important;
            }
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
            textarea {
        text-align: justify;
        white-space: normal;
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
                            <a href="{{route('admin.all.jobs')}}"
                                class="nav-link {{ $link == route('admin.all.jobs') || $link == route('admin.create.job') ? 'active':'' }}">
                                <i class="nav-icon  fas fa-briefcase"></i>
                                <p>Active Jobs</p>
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

        <span id="result"></span>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <!-- <h1>DataTables</h1> -->
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{route('admin.subscription.all')}}">Active
                                        Jobs</a></li>
                                <li class="breadcrumb-item active">Add Job</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-8 align-self-center" id="profile_form" style="margin-left: 17%">
                            <!-- jquery validation -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Job</h3>
                                </div>
                                <!-- /.card-header -->
                                <?php
                                    $categories = App\Category::all();
                    
                                ?>
                                <!-- form start -->
                                <form id="jobform">
                                    @csrf
                                    <input type="hidden" name="status" value="open" class="form-control">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Title</label>
                                                    <input type="text" name="job_title" class="form-control"
                                                        placeholder="Enter a Title.." required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                   
                                                        <label>Job Type</label>
                                                    <select class="form-control" name="job_type" required>
                                                      
                                                        <option value="Full Time">Full Time</option>
                                                        <option value="Part Time">Part Time</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Minimum Salary</label>
                                                    <input type="number" min="1" name="min_salary" class="form-control"
                                                        placeholder="Enter a Salary.." required>
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Maximum Salary</label>
                                                    <input type="number" min="1" name="max_salary" class="form-control"
                                                        placeholder="Enter a Salary.." required>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Salary Type</label>
                                                    <select class="form-control" name="salary_type" required>
                                                      
                                                        <option value="Per Month">Per Month</option>
                                                        <option value="Per Week">Per Week</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Vacancies</label>
                                                    <input type="number" min="1" name="vacancies" class="form-control"
                                                        placeholder="Enter Vacancies.." required>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="row">
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Occupation</label>
                                                    <input type="text" name="occupation" class="form-control"
                                                        placeholder="Enter a Occupation.." required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Education</label>
                                                    <input type="text" name="education" class="form-control"
                                                        placeholder="Enter a Education.." required>
                                                </div>
                                            </div>
                                          
                                        </div>
                                        <div class="row">
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Minimum Experience</label>
                                                    <input type="text" name="min_experience" class="form-control"
                                                        placeholder="Enter a Experience.." required>
                                                </div>
                                            </div>
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Maximum Experience</label>
                                                    <input type="text" name="max_experience" class="form-control"
                                                        placeholder="Enter a Experience.." required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Select Category</label>
                                                    <select class="form-control" name="category_id" id="category">
                                                        @foreach ($categories as $row)
                                                        <option value="{{$row->id}}">{{$row->title}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Select SubCategory</label>
                                                    <select class="form-control" name="subcategory_id" id="subcategory">
                                                         <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Link</label>
                                                    <input type="text" name="link" class="form-control"
                                                        placeholder="Enter a Link.." required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label for="summernote">Description</label>
                                                    <textarea id="summernote" class="form-control" name="description" rows="7" cols="30"
                                                    ></textarea>
                                                </div>
                                            </div>
                                         
                                        </div>
                                        <div class="row">
                                               <div class="col-sm-12">
                                                     <div class="form-group">
                                                    <label for='summernotetwo'>Requirements</label>
                                                    <textarea id="summernotetwo" class="form-control" name="requirements" rows="7"
                                                        cols="30"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-bordered table-striped" id="user_table_a"
                                            style="font-size: 13px;  text-align: center;">

                                            <thead>
                                                <tr>
                                                    <th class="align-middle" style="text-align: center;" width="">Skills
                                                    </th>
                                                    <th class="align-middle">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" id="sunmit" class="btn btn-primary">Add</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
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
            // Summernote
            $('#summernote').summernote(
                {
                    placeholder: 'Enter ...',
                    tabsize:2,
                    height:150
                }
            );

             $('#summernotetwo').summernote(
                {
                    placeholder: 'Enter ...',
                    tabsize:2,
                    height:150
                }
            );

            
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

            $('#jobform').on('submit', function (event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({

                    url: '{{route("admin.job.store")}}',
                    method: 'post',
                    processData: false,
                    contentType: false,
                    data: formData,
                    beforeSend: function () {
                        $('#sunmit').attr('disabled', 'disabled');
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {

            // 1
            var count = 1;

            dynamic_field(count);

            function dynamic_field(number) {
                html = '<tr>';
                html +=
                    '<td><input type="text" name="skills[]" class="form-control"  placeholder="Required"/></td>';
                if (number > 1) {
                    html +=
                        '<td><button type="button" name="remove" id="" class="btn btn-danger remove"><i class="fa fa-trash"></button></td></tr>';
                    $('#user_table_a tbody').append(html);
                } else {
                    html +=
                        '<td><button type="button" name="add" id="add" class="btn btn-success"><i class="fa fa-plus"></i></button></button></td></tr>';
                    $('#user_table_a tbody').html(html);
                }
            }

            $(document).on('click', '#add', function () {
                count++;
                dynamic_field(count);
            });

            $(document).on('click', '.remove', function () {
                count--;
                $(this).closest("tr").remove();
            });

        });

    </script>

     <script>
        $(document).ready(function () {
            var cat_id = $('#category').val();

            // ajx 
            $.ajax({
                url: '{{url("admin/ajax/subcategory")}}/' + cat_id,
                method: 'get',
                data: {
                    id: cat_id
                },
                success: function (data) {
                
                    $('#subcategory').empty();
                      if(data.length === 0){
                            $('#subcategory').append('<option>Not Found</option>');
                        }else{
                            $.each(data, function (index, subcatObj) {
                            $('#subcategory').append('<option value="' + subcatObj
                                .id + '">' + subcatObj.title + '</option>');
                        });
                        }

                }
            });

            // on change

            $('#category').on('change', function () {
                var cat_id = $('#category').val();
                // ajx 
                $.ajax({
                    url: '{{url("admin/ajax/subcategory")}}/' + cat_id,
                    method: 'get',
                    data: {
                        id: cat_id
                    },
                    success: function (data) {

                        $('#subcategory').empty();
                        if(data.length === 0){
                            $('#subcategory').append('<option>Not Found</option>');
                        }else{
                            $.each(data, function (index, subcatObj) {
                            $('#subcategory').append('<option value="' + subcatObj
                                .id + '">' + subcatObj.title + '</option>');
                        });
                        }
                    }
                });
            });
        });

    </script>

</body>

</html>
