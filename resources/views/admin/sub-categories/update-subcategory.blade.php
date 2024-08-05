@extends('admin.layouts.app')
@section('content')
		
 	<!-- Content Header (Page header) -->
   <section class="content-header">					
    <div class="container-fluid my-2">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Update Sub Category</h1>
        </div>
        <div class="col-sm-6 text-right">
          <a href="{{route('sub-categories.index')}}" class="btn btn-primary">Back</a>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="container-fluid">
      <form action="{{route('sub-categories.update', $subcategory->id)}}" method="post">
      @csrf
      @method('put')
      <div class="card">
        <div class="card-body">								
          <div class="row">
              <div class="col-md-12">
              <div class="mb-3">
                <label for="name">Category</label>
                <select name="category" id="category" class="form-control">
                @if($categories->isNotEmpty())
                @foreach ($categories as $category)
                <option {{ $subcategory->category_id == $category->id ? 'selected' : ''}} value={{$category->id}}>{{$category->name}}</option>
                @endforeach
                @endif
                
                </select>
              
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" value="{{$subcategory->name}}"  name="name" id="name" class="form-control" placeholder="Name">	
               
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="slug">Slug</label>
                <input type="text" value="{{$subcategory->slug}}" name="slug"  id="slug" class="form-control" placeholder="Slug">	
               
              </div>
            </div>	
            
            <div class="col-md-6">
              <div class="mb-3">
                <label for="status">Status</label>
                <select name="status" id="stauts" class="form-control">
                  <option value="1" {{$subcategory->status === 1 ? 'selected' : ''}}>Active</option>
                  <option value="0" {{$subcategory->status === 0 ? 'selected' : ''}}>Deactive</option>
                </select>
                
               </div>
            </div>	





            
            <div class="col-md-6">
              <div class="mb-3">
                <label for="showHme">Show Home</label>

                <select name="showHome" class="form-control" id="showHome">
                  <option {{($subcategory->showHome == 'Yes') ? 'selected' : ''}} value="Yes">No</option>
                  <option {{($subcategory->showHome == 'No') ? 'selected' : ''}} value="No">Yes</option>
                </select>
               
              </div>
            </div>



          </div>
        </div>							
      </div>

      <div class="pb-5 pt-3">
        <button class="btn btn-primary">Update</button>
        <a href="{{route('sub-categories.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
      </div>
    </form>
      
    </div>
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







