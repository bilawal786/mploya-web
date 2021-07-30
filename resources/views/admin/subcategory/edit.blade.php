@extends('admin.layouts.include')

@section('content')
<style>
    @media only screen and (max-width: 600px) {
        #profile_form
        {
            margin-left: -4px !important;
        }
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
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Update Sub Category</li>
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
                <h3 class="card-title">Update Sub Category</h3>
              </div>
              <!-- /.card-header -->
               <?php
              $categories = App\Category::all();
               ?>
              <!-- form start -->
              <form id="subcategoryform">
                  @csrf
                  <input type="hidden" name="subcategory_id" value="{{$subcategory->id}}">
                <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$subcategory->title}}" required>
                  </div>
                      <div class="form-group">
                    <label for="exampleInputEmail1">Select Main Category</label>
                    <select name="category_id" class="form-control">
                          
                          @foreach ($categories as $row)
                          @if($subcategory->category->title == $row->title)
                              
                              <option value="{{$subcategory->category_id}}" selected>{{$subcategory->category->title}}</option>
                              @else
                              <option value="{{$row->id}}">{{$row->title}}</option>
                              @endif
                          @endforeach
                     
                    </select>
                  </div>
                </div>
                       <div class="form-group row">
                                <div class="col-8" style="margin-left: 15%">
                                    <div class="custom-file">

                                        <input type="file" class="custom-file-input" name="image"
                                            onchange="readURL(this);" accept="image/*">
                                        <label class="custom-file-label" for="thumbnail">Choose file</label>
                                    </div>
                                    <div class="img-thumbnail  text-center" id="imagepreview">
                                        <img src="{{asset($subcategory->image)}}" style="height: 150px; width: 400px;"
                                            class="img-fluid" id="one">
                                    </div>
                                </div>
                            </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit"  id="add" class="btn btn-primary">Update</button>
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
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#one')
                    .attr('src', e.target.result)
                    .width(400)
                    .height(150);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        $('#subcategoryform').on('submit', function (event) {
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                
                url: '{{route("admin.subcategory.update")}}',
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