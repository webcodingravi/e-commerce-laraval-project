@extends('admin.layouts.app')
@section('content')
		<!-- Content Header (Page header) -->
    <section class="content-header">					
      <div class="container-fluid my-2">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Category</h1>
          </div>
          <div class="col-sm-6 text-right">
            <a href="{{route('categories.index')}}" class="btn btn-primary">Back</a>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="container-fluid">
        <form action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
        <div class="card">
          <div class="card-body">								
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="name">Name</label>
                  <input type="text" value="{{$category->name}}" name="name" id="name" class="form-control">	
                 
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="slug">Slug</label>
                  <input type="text" value="{{$category->slug}}" readonly name="slug" id="slug" class="form-control">
                	
                </div>
              </div>	

              <div class="col-md-6">
                <div class="mb-3">
                  <label for="image">image</label>
                  <input type="file" name="image" class="form-control" onChange="document.querySelector('#output').src=window.URL.createObjectURL(this.files[0])" accept="image/*">
                </div>

                <div class="mb-3">
                  <img src="{{asset('/uploads/category/small/'.$category->image)}}" id="output" width="200" >
                  
                </div>
              </div>		


              
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="status">Status</label>
                  <select name="status" class="form-control" id="status">
                    <option value="1" {{$category->status === 1 ? 'selected' : ''}}>Active</option>
                    <option value="0" {{$category->status === 0 ? 'selected' : ''}}>Deactive</option>
                  </select>
              
                </div>
              </div>	


              <div class="col-md-6">
                <div class="mb-3">
                  <label for="showHme">Show Home</label>

                  <select name="showHome" class="form-control" id="showHome">
                    <option {{($category->showHome == 'Yes') ? 'selected' : ''}} value="Yes">Yes</option>
                    <option {{($category->showHome == 'No') ? 'selected' : ''}} value="No">No</option>
                  </select>
                 
                </div>
              </div>	



            </div>
          </div>							
        </div>
        <div class="pb-5 pt-3">
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{route('categories.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
      </div>
      </form>
      
      <!-- /.card -->
    </section>
    <!-- /.content -->
    @endsection

    @section('customJS')
      <script>
        $(document).ready(function() {
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
           
           
        });


    

      </script>
    @endsection







