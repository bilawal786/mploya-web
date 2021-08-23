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

      <div class="container-fluid">
            <div class="row">
                  <div class="col-md-12">
                      
        <!-- Content Header (Page header) -->
    

        <!-- Main content -->
        <section class="content" style="margin-top: 250px;">
          <div class="error-page">
            <h2 class="headline text-warning">404</h2>

            <div class="error-content">
              <h3>
                <i class="fas fa-exclamation-triangle text-warning"></i> Oops!
                Page not found.
              </h3>

              <p>
                We could not find the page you were looking for. Meanwhile, you
                may <a href="{{route('welcome')}}">return to back</a> 
              </p>
            </div>
            <!-- /.error-content -->
          </div>
          <!-- /.error-page -->
        </section>
        <!-- /.content -->
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