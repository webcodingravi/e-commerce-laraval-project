@extends('admin.layouts.app')
@section('content')
		<!-- Content Header (Page header) -->
    <section class="content-header">					
      <div class="container-fluid my-2">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Category</h1>
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
        <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="card">
          <div class="card-body">								
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="name">Name</label>
                  <input type="text" value="{{old('name')}}" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">	
                  @error('name')
                    <span class="text-danger">
                      {{$message}}
                    </span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="slug">Slug</label>
                  <input type="text" value="{{old('slug')}}" readonly name="slug" id="slug" class="form-control  @error('name') is-invalid @enderror" placeholder="Slug">
                  @error('slug')
                  <span class="text-danger">
                    {{$message}}
                  </span>
                @enderror	
                </div>
              </div>	

              <div class="col-md-6">
                <div class="mb-3">
                  <label for="image">image</label>
                  <input type="file" value="{{old('image')}}" name="image" class="form-control @error('image') is-invalid @enderror" onChange="document.querySelector('#output').src=window.URL.createObjectURL(this.files[0])" accept="image/*">
                  @error('image')
                  <span class="text-danger">
                    {{$message}}
                  </span>
                @enderror	
                </div>

                <div class="mb-3">
                  <img src="" id="output" width="200" >
                </div>
              </div>		

              

              
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="status">Status</label>
                  <select name="status" class="form-control" id="status">
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>
                  </select>
                  @error('status')
                  <span class="text-danger">
                    {{$message}}
                  </span>
                @enderror	
                </div>
              </div>	


              <div class="col-md-6">
                <div class="mb-3">
                  <label for="showHme">Show Home</label>
                  <select name="showHome" class="form-control" id="showHme">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
                 
                </div>
  
  
              </div>	


            </div>
          </div>							
        </div>
        <div class="pb-5 pt-3">
          <button type="submit" class="btn btn-primary">Create</button>
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







