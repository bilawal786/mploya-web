@extends('admin.layouts.include')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
            <h1>Jobseeker View</h1>
          </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Job Seeker View</li>
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
                         <div class="col-sm-3 invoice-col">
                         
                  <img src="{{asset($jobseeker->image)}}" alt="" height="240px" width="194px"><br>
            
            
                </div>
                   <div class="col-sm-3 invoice-col">
                         
                  <b>Name:</b> {{$jobseeker->name}}<br>
                  <b>Father Name:</b> {{$jobseeker->father_name}}<br>
                  <b>Email:</b> {{$jobseeker->email}} <br>
                  <b>Education Name:</b> 
                  @foreach($jobseeker->education_name as $key => $data1)  
                  {{$jobseeker->education_name[$key]}}, 
      
                  @endforeach
                  <br><b>Education Description:</b> 
                   @foreach($jobseeker->education_name as $key => $data1)  
                   {{$jobseeker->education_description[$key]}},
                 
                  @endforeach
                   <br> <b>Education Continue or Complete:</b> 
                   @foreach($jobseeker->education_name as $key => $data1)  
                   {{$jobseeker->education_is_continue[$key]}},
            
                  @endforeach
                   <br> <b>Education Complete Date:</b> 
                   @foreach($jobseeker->education_name as $key => $data1)  
                   {{$jobseeker->education_complete_date[$key]}},
            
                  @endforeach


                </div>
                <!-- /.col -->
                   <div class="col-sm-3 invoice-col">
                  
                  <b>Address:</b> {{$jobseeker->address}}<br>
                  <b>CNIC:</b> {{$jobseeker->CNIC}}<br>
                  <b>Phone:</b> {{$jobseeker->phone}}

                  <b>Project Title:</b> 
                  @foreach($jobseeker->project_title as $key => $data1)  
                  {{$jobseeker->project_title[$key]}}, 
      
                  @endforeach
                  <br><b>Project Occupation:</b> 
                   @foreach($jobseeker->project_title as $key => $data1)  
                   {{$jobseeker->project_occupation[$key]}},
                 
                  @endforeach
                   <br> <b>Project Year:</b> 
                   @foreach($jobseeker->project_title as $key => $data1)  
                   {{$jobseeker->project_year[$key]}},
            
                  @endforeach
                   <br> <b>Project Links:</b> 
                   @foreach($jobseeker->project_title as $key => $data1)  
                   {{$jobseeker->project_links[$key]}},
            
                  @endforeach

                    <br> <b>Project Description:</b> 
                   @foreach($jobseeker->project_title as $key => $data1)  
                   {{$jobseeker->project_description[$key]}},
            
                  @endforeach

                   <br> <b>Skill Name:</b> 
                   @foreach($jobseeker->skill_name as $key => $data1)  
                   {{$jobseeker->skill_name[$key]}},
            
                  @endforeach

                </div>
                <!-- /.col -->
                <div class="col-sm-3 invoice-col">
                 
                  <b>Country:</b> {{$jobseeker->country}}<br>
                  <b>City:</b> {{$jobseeker->city}}<br>
                  <b>description:</b> {{$jobseeker->description}}

                  

                    <br> <b>Certification Name:</b> 
                   @foreach($jobseeker->certification_name as $key => $data1)  
                   {{$jobseeker->certification_name[$key]}},
            
                  @endforeach

                     <br> <b>Certification Year:</b> 
                   @foreach($jobseeker->certification_year as $key => $data1)  
                   {{$jobseeker->certification_year[$key]}},
            
                  @endforeach

                     <br> <b>Certification Description:</b> 
                   @foreach($jobseeker->certification_description as $key => $data1)  
                   {{$jobseeker->certification_description[$key]}},
            
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
    </div>

@endsection