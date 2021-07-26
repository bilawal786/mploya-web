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
                            <li class="breadcrumb-item active">Categories</li>
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
                                <h3 class="card-title">Categories List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Action</th>
                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                      
                                          @if(empty($categories))
                                             <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                      
                                          @else
                                           @foreach ($categories as $row)
                                           {{-- {{dd($row->image)}} --}}
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$row->title}}</td>
                                                 @if($row->image)
                                                <td>
                                                      <img src="{{asset($row->image)}}" alt="" width="80px" height="50px">
                                                </td>
                                                @else 
                                                <td></td>
                                                @endif
                                         
                                                <td>
                                                      <a type="button" href="{{route('admin.category.edit',['id' => $row->id])}}"  class="btn btn-success"><i class="far fa-edit"></i></a>
                                                      <a type="button" href="{{route('admin.category.delete',['id' => $row->id])}}"  class="btn btn-danger"><i class="fa fa-trash"></i></a>
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