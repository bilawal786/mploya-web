@extends('admin.layouts.include')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>25</h3>

                                <p>New</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-folder-plus"></i>
                            </div>
                        </div>
                    </div>
                {{--       <!-- ./col -->
                       <div class="col-lg-3 col-6">
                           <!-- small box -->
                           <div class="small-box bg-success">
                               <div class="inner">
                                   <h3>{{$c_back}}</h3>

                                   <p>Call Back</p>
                               </div>
                               <div class="icon">
                                   <i class="fa fa-phone-alt"></i>
                               </div>
                           </div>
                       </div>
                       <!-- ./col -->
                       <div class="col-lg-3 col-6">
                           <!-- small box -->
                           <div class="small-box bg-dark">
                               <div class="inner">
                                   <h3>{{$new_answer}}</h3>

                                   <p>No Answer</p>
                               </div>
                               <div class="icon">
                                   <i class="fa fa-microphone-alt-slash"></i>
                               </div>
                           </div>
                       </div>
                       <!-- ./col -->
                       <div class="col-lg-3 col-6">
                           <!-- small box -->
                           <div class="small-box bg-danger">
                               <div class="inner">
                                   <h3>{{$new_answer}}</h3>

                                   <p>New no Answer</p>
                               </div>
                               <div class="icon">
                                   <i class="fa fa-exclamation"></i>
                               </div>
                           </div>
                       </div>
                       <!-- ./col -->

                       <div class="col-lg-3 col-6">
                           <!-- small box -->
                           <div class="small-box bg-warning">
                               <div class="inner">
                                   <h3>{{$done}}</h3>

                                   <p>Done</p>
                               </div>
                               <div class="icon">
                                   <i class="fa fa-check"></i>
                               </div>
                           </div>
                       </div>
                       <!-- ./col -->

                       <div class="col-lg-3 col-6">
                           <!-- small box -->
                           <div class="small-box" style="background-color: pink; ">
                               <div class="inner">
                                   <h3>{{$done_money}}</h3>

                                   <p>Done in the Money</p>
                               </div>
                               <div class="icon">
                                   <i class="fa fa-hand-holding-usd"></i>
                               </div>
                           </div>
                       </div>
                       <!-- ./col -->

                       <div class="col-lg-3 col-6">
                           <!-- small box -->
                           <div class="small-box bg-muted" style="background-color: #00FFFF;">
                               <div class="inner">
                                   <h3>{{$n_intrested}}</h3>

                                   <p>Not Intrested</p>
                               </div>
                               <div class="icon">
                                   <i class="fa fa-handshake-alt-slash"></i>
                               </div>
                           </div>
                       </div>
                       <!-- ./col -->

                       <div class="col-lg-3 col-6">
                           <!-- small box -->
                           <div class="small-box" style="background-color: #d5d525;">
                               <div class="inner">
                                   <h3>{{$w_answer}}</h3>

                                   <p>What's no Answer</p>
                               </div>
                               <div class="icon">
                                   <i class="fa fa-question"></i>
                               </div>
                           </div>
                       </div>
                       <!-- ./col -->



                       <div class="col-lg-3 col-6">
                           <!-- small box -->
                           <div class="small-box bg-secondary">
                               <div class="inner">
                                   <h3>{{$try}}</h3>

                                   <p>Try Again</p>
                               </div>
                               <div class="icon">
                                   <i class="fa fa-redo-alt"></i>
                               </div>
                           </div>
                       </div>--}}
                <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
