@extends('admin.layouts.include')

@section('content')
<style>
    @media only screen and (max-width: 600px) {
        #profile_form
        {
            margin-left: -4px !important;
        }
      }
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

</style>
<span id="result"></span>
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
                            <li class="breadcrumb-item active">Add Subscription</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6 align-self-center" id="profile_form" style="margin-left: 25%">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Subscription</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="subscriptionform">
                  @csrf
                  <input type="hidden" name="status" value="1" class="form-control">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter a title.." required>
                  </div>
                    </div>
                    <div class="col-sm-6">
                       <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="number" min="1" name="price" class="form-control" placeholder="Enter a price.." required>
                  </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                    <label for="exampleInputEmail1">Valid Jobs</label>
                    <input type="number" min="1" name="valid_job" class="form-control" placeholder="Enter a price.." required>
                  </div>
                    </div>
                    <div class="col-sm-6">
                       <div class="form-group">
                    <label for="exampleInputEmail1">Color</label>
                    <input type="color" name="color" class="form-control" required>
                  </div>
                    </div>
                  </div>
                  
                  
                 
                   <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Description</label>
                        <textarea id="description" class="form-control" name="description" rows="3" cols="30" placeholder="Enter ..."></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit"  id="add" class="btn btn-primary">Add</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
      </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        $('#subscriptionform').on('submit', function (event) {
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                
                url: '{{route("admin.subscription.store")}}',
                method: 'post',
                processData: false,
                contentType: false,
                data: formData,
                beforeSend: function () {
                    $('#add').attr('disabled', 'disabled');
                },
                    success: function (data) {
                     if (data.success) {
                        toastr.success(data.success);
                    } else {
                        toastr.error(data.error);

                    }

                }
            });
        });


    });

</script>