@extends('admin.layouts.include')

@section('content')


   <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Job Details</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{route('admin.all.employers')}}">Active Jobs</a></li>
                                <li class="breadcrumb-item active">Job Details</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-md-12">
                            <div class="card">
                                {{-- <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#jobs"
                                                data-toggle="tab">Job</a></li>
                                    </ul>
                                </div><!-- /.card-header --> --}}
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="jobs">
                                            <!-- Post -->
                                          
                                        
                                            <div class="post">
                                                <div class="user-block">

                                                    <a href="#">{{$job->job_title}}</a>
                                                    <a href="{{route('admin.job.status',['id' => $job->id])}}" type="button" style="float: right" class="btn btn-success">Change Status</a>

                                                </div>
                                                <!-- /.user-block -->
                                                <p>
                                                    {{$job->description}}
                                                </p>

                                                    <p><b>Requirements:</b></p>
                                                <!-- /.user-block -->
                                                <p style="margin-top: -15px">
                                                    {{$job->requirements}}
                                                </p>

                                                <p>
                                                    <span href="#" class="text-sm mr-2"><b>Education:</b>
                                                        {{$job->education}}</span>
                                                    <span href="#" class="text-sm mr-2"><b>Experience:</b>
                                                        {{$job->min_experience}} To {{$job->max_experience}} Year</span>

                                                    <span href="#" class="text-sm mr-2"><b>Occupation:</b>
                                                        {{$job->occupation}}</span>
                                                    <span href="#" class="text-sm mr-2"><b>Vacancies:</b>
                                                        {{$job->vacancies}}</span>
                                                    
                                                    <span href="#" class="text-sm mr-2"><b>Job Type:</b>
                                                        {{$job->job_type}}</span>

                                                    <span href="#" class="text-sm mr-2"><b>Link:</b>
                                                        {{$job->link}}</span>

                                                    {{-- <span class="float-right"> --}}
                                                          @if($job->min_salary == '0' && $job->max_salary == '0')
                                                          <span href="#" class="text-sm mr-2"><b>Salary:</b>
                                                            Not Found</span>
                                                          @else
                                                          <span href="#" class="text-sm mr-2"><b>Salary:</b>
                                                            ${{$job->min_salary}} To ${{$job->max_salary}}</span> 
                                                          @endif
                                                        
                                                        <span href="#" class="text-sm"><b>Salary Type:</b>
                                                            {{$job->salary_type}}</span>
                                                    {{-- </span> --}}

                                                </p>


                                            </div>
                                         


                                            <!-- /.post -->

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


@endsection
