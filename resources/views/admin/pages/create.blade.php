@extends('admin.layouts.app')
@section('content')
		<!-- Content Header (Page header) -->
    <section class="content-header">					
      <div class="container-fluid my-2">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Page</h1>
          </div>
          <div class="col-sm-6 text-right">
            <a href="{{route('pages.index')}}" class="btn btn-primary">Back</a>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
          <form name="pageForm" id="pageForm" method="post">
            @csrf
          <div class="card">
            <div class="card-body">								
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">	
                    <p></p>
                    
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" readonly id="slug" class="form-control" placeholder="slug">
                    <p></p>

                  </div>
                </div>	

        
                <div class="col-md-12">
                  <div class="mb-3">
                      <label for="content">Content</label>
                      <textarea name="content" id="content" cols="30" rows="10" class="summernote" placeholder=""></textarea>
                  </div>
              </div> 
             
  
  
              </div>
            </div>							
          </div>
          <div class="pb-5 pt-3">
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{route('pages.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
          </div>
        </form>
        </div>
     
        
        <!-- /.card -->
      </section>
      <!-- /.content -->
    <!-- /.content -->
    @endsection

    @section('customJS')
      <script>
       $("#pageForm").submit(function(event) {
         event.preventDefault();
         $.ajax({
            url: '{{route("pages.store")}}',
            type: 'post',
            data: $(this).serializeArray(),
            dataType: 'json',
            success: function(response) {
              if(response.status == true) {
                $("#name").removeClass("is-invalid").siblings("P").removeClass("invalid-feedback").html("");
                $("#slug").removeClass("is-invalid").siblings("P").removeClass("invalid-feedback").html("");


                 window.location.href="{{route('pages.index')}}";


              }else{
                  if(response.errors['name']) {
                   $("#name").addClass("is-invalid").siblings("P").addClass("invalid-feedback").html(response.errors['name']);
                  }else{
                    $("#name").removeClass("is-invalid").siblings("P").removeClass("invalid-feedback").html("");

                  }

                  if(response.errors['slug']) {
                   $("#slug").addClass("is-invalid").siblings("P").addClass("invalid-feedback").html(response.errors['slug']);
                  }else{
                    $("#slug").removeClass("is-invalid").siblings("P").removeClass("invalid-feedback").html("");

                  }

        

                  
              }
            }
         });
       })




   
    $('#name').change(function() {
     element = $(this).val();
        $.ajax({
          url: '{{ route("getSlug") }}',
          type: 'get',
          data: {title: element},
          dataType: 'json',
          success: function(response) {
            if(response["status"] == true) {
              $("#slug").val(response["slug"]);
            }
          }
        })
      });


      </script>
    @endsection







