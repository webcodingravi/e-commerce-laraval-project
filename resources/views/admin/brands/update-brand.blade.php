@extends('admin.layouts.app')
@section('content')
		

 <!-- Content Header (Page header) -->
 <section class="content-header">					
  <div class="container-fluid my-2">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Create Brand</h1>
      </div>
      <div class="col-sm-6 text-right">
        <a href="{{route('brand.index')}}" class="btn btn-primary">Back</a>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="container-fluid">
    <form action="{{route('brand.update', $brands->id)}}" method="post">
      @csrf
      @method('PUT')
    <div class="card">
      <div class="card-body">								
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="name">Name</label>
              <input type="text" value="{{$brands->name}}" name="name" id="name" class="form-control" placeholder="Name">	
             
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="slug">Slug</label>
              <input type="text" value="{{$brands->slug}}" readonly name="slug" id="slug" class="form-control" placeholder="Slug">	
              
            </div>
          </div>		
          
          <div class="col-md-6">
            <div class="mb-3">
              <label for="status">Status</label>
              <select name="status" id="status" class="form-control">
                <option value="1" {{$brands->status === 1 ? 'selected' : ''}}>Active</option>
                <option value="0" {{$brands->status === 0 ? 'selected' : ''}}>Deactive</option>
                </select>	
                
            </div>
          </div>
        </div>
      </div>							
    </div>
    <div class="pb-5 pt-3">
      <button class="btn btn-primary">Update</button>
      <a href="{{route('brand.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
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







