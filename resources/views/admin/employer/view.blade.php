@extends('admin.layouts.include')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
            <h1>Employer View</h1>
          </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Employer View</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                  
                 <img src="{{asset($employer->image)}}" alt="" height="150px" width="194px"><br>
                </div>
                  <div class="col-sm-4 invoice-col">
                  <b>Name:</b> {{$employer->name}}<br>
                  <b>Email:</b>{{$employer->email}} <br>
                  <b>Address:</b> {{$employer->address}} <br>
                  <b>Company Name:</b> {{$employer->company_name}}<br>
                 <b>Social Links:</b> 
                   @foreach($employer->social_links as $key => $data1)  
                   {{$employer->social_links[$key]}},
            
                  @endforeach
                </div>
      
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    </div>

@endsection
