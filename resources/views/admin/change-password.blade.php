@extends('admin.layouts.app')
@section('content')
		<!-- Content Header (Page header) -->
    <section class="content-header">					
      <div class="container-fluid my-2">
        <div class="row mb-2">
          @include('admin.alertMessage')

          <div class="col-sm-6">
            <h1>Change Password</h1>
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
          <form name="changePasswordForm" id="changePasswordForm" method="post">
            @csrf
          <div class="card">
            <div class="card-body">								
              <div class="row">
                <div class="col-md-12">
                  <div class="mb-3">
                    <label for="old_password">Old Password</label>
                    <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Old Password">	
                    <p></p>
                    
                  </div>
                </div>
           

                <div class="col-md-12">
                  <div class="mb-3">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Old Password">	
                    <p></p>
                    
                  </div>
                </div>
           

                <div class="col-md-12">
                  <div class="mb-3">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">	
                    <p></p>
                    
                  </div>
                </div>
  
              </div>
            </div>							
          </div>
          <div class="pb-5 pt-3">
            <button id="submit" class="btn btn-primary">Update</button>
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
       $("#changePasswordForm").submit(function(event) {
         event.preventDefault();

         $.ajax({
            url: '{{route("admin.processChangePassword")}}',
            type: 'post',
            data: $(this).serializeArray(),
            dataType: 'json',
            success: function(response) {

              if(response.status == true) {
                $("#old_password").removeClass("is-invalid").siblings("P").removeClass("invalid-feedback").html("");
                $("#new_password").removeClass("is-invalid").siblings("P").removeClass("invalid-feedback").html("");
                $("#confirm_password").removeClass("is-invalid").siblings("P").removeClass("invalid-feedback").html("");


                 window.location.href="{{route('admin.showChangePasswordForm')}}";


              }else{
                  if(response.errors['old_password']) {
                   $("#old_password").addClass("is-invalid").siblings("P").addClass("invalid-feedback").html(response.errors['old_password']);
                  }else{
                    $("#old_password").removeClass("is-invalid").siblings("P").removeClass("invalid-feedback").html("");

                  }

                  if(response.errors['new_password']) {
                   $("#new_password").addClass("is-invalid").siblings("P").addClass("invalid-feedback").html(response.errors['new_password']);
                  }else{
                    $("#new_password").removeClass("is-invalid").siblings("P").removeClass("invalid-feedback").html("");

                  }

                  if(response.errors['confirm_password']) {
                   $("#confirm_password").addClass("is-invalid").siblings("P").addClass("invalid-feedback").html(response.errors['confirm_password']);
                  }else{
                    $("#confirm_password").removeClass("is-invalid").siblings("P").removeClass("invalid-feedback").html("");

                  }

              

                  
              }
            }
         });
       })

      </script>
    @endsection







