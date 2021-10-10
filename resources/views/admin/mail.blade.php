<!DOCTYPE html>
<html>
<head>
  <title>User Profile</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="margin: 0; padding: 0">


  <style>
    #about h1 {
      margin: 25px;
    }
    section {
      
      padding-bottom: 20px;
      padding-top: 20px;
    }
    .card .card-header {
      cursor: pointer;
    }
    .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}





    </style>  
        <div class="container mt-5">  
              <div class="row justify-content-center">
                    <div class="col-md-8 bg-light shadow-lg p-5 ">
                          <h1 class="text-center">
                                Applied For Job
                          </h1>
                          
                              <img style="width:250px; height:160px" class="mb-5 mt-5 center" src="assets/dist/img/mploya.jpeg"> <br>

                              Hello Sir, </p>
                              <p>

                          <p>I wish to apply for the job that is listed on your website.Job description match my interests and skills. I believe that I’m a good candidate for this position. </p>    


                              <p>Thank you for your valuable time. I’m optimistic that you’ll consider me for this role. I look forward to hearing from you about this job opportunity.</p>
                              <p>
                              Thank you for your consideration.
                        </p>

                             {{$jobseeker->name}} <br>
                               {{$jobseeker->phone}} <br>
                              {{$jobseeker->address}} <br>
                            
                              {{$jobseeker->email}}
                          
                    </div>
              </div>
                <!--| ABOUT |--------------------------------------------------->
                <section id="about" class="container"  style="text-align: center">
                     
                      <img style="width:250px; height:160px;margin-top:50px" src="assets/dist/img/mploya.jpeg">
                  
                  
                  <h1 class="display-4">Applied For Job</h1>
                  
                 <p>
                       <img style="width:80px; border-radius:50%" src="{{asset($jobseeker->image)}}"><br>
                                        

                       
                       <span class="badge badge-info">{{$jobseeker->name}}</span>
                  </p>
                   <p>
                      <strong>Address:</strong>
                      <span class="badge badge-info">{{$jobseeker->address}}</span>
                    
                 </p>
                 <p>
                      <strong>Email:</strong>
                      <span class="badge badge-info">{{$jobseeker->email}}</span>
                    
                 </p>
                  <p>
                    <strong>Phone:</strong>
                    <span class="badge badge-info">{{$jobseeker->phone}}</span>
                  </p> <br> 
                  <p>
                    
                    <span class="badge badge-info">Thank's for using our application</span>
                  </p>
                   <p>
                        <strong>Regards,</strong><br>
                    <span class="badge badge-info">mploya</span>
                  </p>
                 
                    
                 
                </section>

                
        
            
        </div>
    

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
