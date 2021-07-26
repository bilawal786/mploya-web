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
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Employers</li>
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
                                <h3 class="card-title">Employers List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Father Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>CNIC</th>
                                        <th>Phone No</th>
                                        <th>Education</th>
                                        <th>Continue Or Not</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      
                                          @if(empty($employers))
                                             <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                      
                                          @else
                                           @foreach ($employers as $row)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$row->name}}</td>
                                                 @if($row->father_name == '0')
                                                <td></td>
                                                @else 
                                                <td>{{$row->father_name}}</td>
                                                @endif
                                                <td>{{$row->email}}</td>
                                                <td>{{$row->address}}</td>
                                                @if($row->CNIC == '0')
                                                <td></td>
                                                @else 
                                                <td>{{$row->CNIC}}</td>
                                                @endif
                                            
                                                 @if($row->phone == '0')
                                                <td></td>
                                                @else 
                                                <td>{{$row->phone}}</td>
                                                @endif

                                                 @if($row->education == '0')
                                                <td></td>
                                                @else 
                                                <td>{{$row->education}}</td>
                                                @endif

                                                 @if($row->is_continue == '0')
                                                <td></td>
                                                @else 
                                                <td>{{$row->is_continue}}</td>
                                                @endif

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