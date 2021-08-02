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
                            <li class="breadcrumb-item active">Job Seekers</li>
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

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Job Seekers List</h3>
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
                                        <th>NIC</th>
                                        <th>Phone No</th>
                                        <th>Image</th>
                                        <th>Details</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                          @if(empty($jobseekers))
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
                                           @foreach ($jobseekers as $row)
                                           
                                             <tr>
                                                <td class="align-middle">{{$loop->iteration}}</td>
                                                <td class="align-middle">{{$row->name}}</td>
                                                 @if($row->father_name == '0')
                                                <td class="align-middle">Not Found</td>
                                                @else
                                                <td class="align-middle">{{$row->father_name}}</td>
                                                @endif
                                                <td class="align-middle">{{$row->email}}</td>
                                                <td class="align-middle">{{$row->address}}</td>
                                                @if($row->CNIC == '0')
                                                <td class="align-middle">Not Found</td>
                                                @else
                                                <td class="align-middle">{{$row->CNIC}}</td>
                                                @endif

                                                 @if($row->phone == '0')
                                                <td class="align-middle">Not Found</td>
                                                @else
                                                <td class="align-middle">{{$row->phone}}</td>
                                                @endif
                                                 @if($row->image == 0)
                                                <td><img src="{{asset('assets/dist/img/profilepic.png')}}" alt="image" width="74" height="74"></td>
                                                @else 
                                                <td><img src="{{asset($row->image)}}" alt="image" width="74" height="74"></td>
                                                @endif
                                                <td class="align-middle">
                                                     <a type="button" href="{{route('admin.jobseeker',['id' => $row->id])}}" title="View"  class="btn btn-success"><i class="far fa-eye"></i></a>
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