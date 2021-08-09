@extends('admin.layouts.include')

@section('content')
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
                            <li class="breadcrumb-item active">Active Jobs</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        {{-- {{dd($employers)}} --}}
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Jobs List</h3>
                                <a href="{{route('admin.create.job')}}" type="button" style="float: right" class="btn btn-success">Add Job</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                         <th>#</th>
                                        <th>Title</th>
                                        <th>Vacancies</th>
                                        <th>salary</th>
                                        <th>salary Type</th>
                                         <th>Education</th>
                                        <th>Experience</th>
                                        <th>Details</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>

                                          @if(empty($jobs))
                                             <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                          @else
                                           @foreach ($jobs as $row)
                                             <tr>
                                                <td class="align-middle">{{$loop->iteration}}</td>
                                                <td class="align-middle">{{$row->job_title}}</td>
                                                <td class="align-middle">{{$row->vacancies}}</td>
                                                 @if($row->salary == '0')
                                                <td class="align-middle">Not Found</td>
                                                @else
                                                <td class="align-middle">${{$row->salary}}</td>
                                                @endif
                                                @if($row->salary_type == '0')
                                                <td class="align-middle">Not Found</td>
                                                @else 
                                                 <td class="align-middle">{{$row->salary_type}}</td>
                                                @endif
                                                  @if($row->education == '0')
                                                <td class="align-middle">Not Found</td>
                                                @else 
                                                 <td class="align-middle">{{$row->education}}</td>
                                                @endif
                                                @if($row->experience == '0')
                                                <td class="align-middle">Not Found</td>
                                                @else 
                                                 <td class="align-middle">{{$row->experience}}</td>
                                                @endif
                                                 
                                                 <td class="align-middle">
                                                     <a type="button" href="{{route('admin.job',['id' => $row->id])}}" title="View"  class="btn btn-success"><i class="far fa-eye"></i></a>
                                                     <a type="button" href="{{route('admin.job.edit',['id' => $row->id])}}" title="Edit"  class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <a type="button" href="{{route('admin.job.delete',['id' => $row->id])}}" title="Delete"  class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                 </td>
                                            </tr>
                                          @endforeach
                                          @endif

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
