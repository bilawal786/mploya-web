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
                            <li class="breadcrumb-item"><a href="{{route('admin.subscription.all')}}">Subscriptions</a></li>
                            <li class="breadcrumb-item active">Active Subscriptions</li>
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
                                <h3 class="card-title">Active Subscriptions List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Valid Jobs</th>
                                        <th>Color</th>
                                    
                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                      
                                          @if(empty($purchasedsubscriptions))
                                             <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                             
                                            </tr>
                                      
                                          @else
                                           @foreach ($purchasedsubscriptions as $row)
                                           
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$row->title}}</td>
                                                 
                                                <td>
                                                      {{$row->price}}
                                                </td>
                        
                                         
                                                <td>
                                                      {{$row->valid_job}}
                                                      {{-- <a type="button" href="{{route('admin.subscription.edit',['id' => $row->id])}}"  class="btn btn-success"><i class="far fa-edit"></i></a>
                                                      <a type="button" href="{{route('admin.subscription.delete',['id' => $row->id])}}"  class="btn btn-danger"><i class="fa fa-trash"></i></a> --}}
                                                </td>
                              
                                                <td><input type="color" name="color" class="form-control" value="{{$row->color}}" readonly></td>
                
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