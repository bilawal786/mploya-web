<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Mploya</title>

    <!-- Google Font: Source Sans Pro -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome -->
   <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
     <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
  </head>
  <style>
    @media only screen and (max-width: 600px) {
      #d{
        margin-left: 0px !important;
      
      }
    }
      i {
        color: #0fad00;
        font-size: 60px;
        line-height: 150px;
        margin-left:-15px;
      }
  </style>
<body>
  
     <div class="container">
	<div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3" id="d" style="margin-left: 240px; margin-top:150px">
          <div style="border-radius:200px; height:150px; width:150px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <br><br> <h2 style="color:#0fad00">Success</h2>
        {{-- <img src="{{asset('image/t.png')}}" width="40" height="50"> --}}
        {{-- <h3>Dear, Faisal khan</h3> --}}
        <p style="font-size:20px;color:#5C5C5C;">We received your purchase request<br>
        we'll be in touch shortly!</p>
       
    <br><br>
        </div>
        
	</div>
</div>
  

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
   <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    
    <!-- AdminLTE App -->
   <script src="{{asset('assets/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dist/js/demo.js')}}"></script>
  </body>
</html>