@extends('admin.layouts.app')
@section('content')
		<!-- Content Header (Page header) -->
    <section class="content-header">					
      <div class="container-fluid my-2">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Users</h1>
          </div>
          <div class="col-sm-6 text-right">
            <a href="{{route('users.index')}}" class="btn btn-primary">Back</a>
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
          <form name="usersForm" id="usersForm" method="post">
            @csrf
          <div class="card">
            <div class="card-body">								
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" value="{{$users->name}}" name="name" id="name" class="form-control" placeholder="Name">	
                    <p></p>
                    
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="text" value="{{$users->email}}" name="email" id="email" class="form-control" placeholder="Email">
                    <p></p>

                  </div>
                </div>	

                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <span>To change password you have to enter a value, otherwise leave blank.</span>
                    <p></p>

                  </div>
                </div>	

                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="phone">Mobile</label>
                    <input type="text" value="{{$users->phone}}" name="phone" id="phone" class="form-control" placeholder="Mobile">
                    <p></p>

                  </div>
                </div>	
  
          

                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status">
                      <option {{($users->status == 1) ? 'selected' : ''}} value="1">Active</option>
                      <option {{($users->status == 0) ? 'selected' : ''}} value="0">Deactive</option>
                    </select>
                    <p></p>

                  </div>
                </div>	
  
  
  
  
              </div>
            </div>							
          </div>
          <div class="pb-5 pt-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{route('users.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
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
       $("#usersForm").submit(function(event) {
         event.preventDefault();
         $.ajax({
            url: '{{route("users.update",$users->id)}}',
            type: 'put',
            data: $(this).serializeArray(),
            dataType: 'json',
            success: function(response) {
              if(response.status == true) {
                $("#name").removeClass("is-invalid").siblings("P").removeClass("invalid-feedback").html("");
                $("#email").removeClass("is-invalid").siblings("P").removeClass("invalid-feedback").html("");
                $("#password").removeClass("is-invalid").siblings("P").removeClass("invalid-feedback").html("");
                $("#phone").removeClass("is-invalid").siblings("P").removeClass("invalid-feedback").html("");


                 window.location.href="{{route('users.index')}}";


              }else{
                  if(response.errors['name']) {
                   $("#name").addClass("is-invalid").siblings("P").addClass("invalid-feedback").html(response.errors['name']);
                  }else{
                    $("#name").removeClass("is-invalid").siblings("P").removeClass("invalid-feedback").html("");

                  }

                  if(response.errors['email']) {
                   $("#email").addClass("is-invalid").siblings("P").addClass("invalid-feedback").html(response.errors['email']);
                  }else{
                    $("#email").removeClass("is-invalid").siblings("P").removeClass("invalid-feedback").html("");

                  }

                  if(response.errors['password']) {
                   $("#password").addClass("is-invalid").siblings("P").addClass("invalid-feedback").html(response.errors['password']);
                  }else{
                    $("#password").removeClass("is-invalid").siblings("P").removeClass("invalid-feedback").html("");

                  }

                  if(response.errors['phone']) {
                   $("#phone").addClass("is-invalid").siblings("P").addClass("invalid-feedback").html(response.errors['phone']);
                  }else{
                    $("#phone").removeClass("is-invalid").siblings("P").removeClass("invalid-feedback").html("");

                  }

                  
              }
            }
         });
       })

      </script>
    @endsection







