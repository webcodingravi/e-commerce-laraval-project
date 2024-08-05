@extends('admin.layouts.app')
@section('content')
		<!-- Content Header (Page header) -->
    <section class="content-header">					
      <div class="container-fluid my-2">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Coupon Code</h1>
          </div>
          <div class="col-sm-6 text-right">
            <a href="{{route('coupons.index')}}" class="btn btn-primary">Back</a>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="container-fluid">
        <form action="" id="discountForm" name="discountForm" method="post">
          @csrf
        <div class="card">
          <div class="card-body">								
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="code">Code</label>
                  <input type="text" name="code" id="code" class="form-control"  placeholder="Code">	
                  <p></p>
                </div>
              </div>


              <div class="col-md-6">
                <div class="mb-3">
                  <label for="name">Name</label>
                  <input type="text" name="name" id="name" class="form-control"  placeholder="Name">	
              <p></p>
                </div>
              </div>


              <div class="col-md-6">
                <div class="mb-3">
                  <label for="Max Uses">Max Uses</label>
                  <input type="number" name="max_uses" id="max_uses" class="form-control"  placeholder="Max Uses">	
                  <p></p>

                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                  <label for="max_uses_user">Max Uses User</label>
                  <input type="text" name="max_uses_user" id="max_uses_user" class="form-control"  placeholder="Max Uses User">	
                  <p></p>

                </div>
              </div>
              

              <div class="col-md-6">
                <div class="mb-3">
                  <label for="status">Type</label>
                  <select name="type" id="type" class="form-control" >
                    <option value="">Please Select..</option>
                    <option value="parcent">Parcent</option>
                    <option value="fixed">Fixed</option>
                  </select>
                  <p></p>

                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                  <label for="discount_amount">Discount Amount</label>
                  <input type="text" name="discount_amount" id="discount_amount" class="form-control"  placeholder="Discount Amount">	
                  <p></p>

                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                  <label for="min_amount">Min Amount</label>
                  <input type="text" name="min_amount" id="min_amount" class="form-control"  placeholder="Min Amount">	
                  <p></p>

                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="status">Status</label>
                  <select name="status" class="form-control" id="status">
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>
                  </select>
                   <p></p>	
                </div>
              </div>	


              <div class="col-md-6">
                <div class="mb-3">
                  <label for="starts_at">Starts At</label>
                  <input type="text" name="starts_at" id="starts_at" class="form-control"  placeholder="Starts At">	
                  <p></p>

                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                  <label for="expires_at">Expires At</label>
                  <input type="text" name="expires_at" id="expires_at" class="form-control"  placeholder="Expires At">	
                  <p></p>

                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                  <label for="description">Description</label>
                 <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Description"></textarea>
                 <p></p>

                </div>
              </div>

            </div>
          </div>							
        </div>
        <div class="pb-5 pt-3">
          <button type="submit" class="btn btn-primary">Create</button>
          <a href="{{route('coupons.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
      </div>
      </form>
      
      <!-- /.card -->
    </section>
    <!-- /.content -->
    @endsection

    @section('customJS')
      <script>

        
            $('#starts_at').datetimepicker({
                // options here
                format:'Y-m-d H:i:s',
            });

            $('#expires_at').datetimepicker({
                // options here
                format:'Y-m-d H:i:s',
            });
          


         $("#discountForm").submit(function(e) {
           e.preventDefault();
           
           $('button[type=submit]').prop('disabled', true);
           $.ajax({
              url: '{{route("coupons.store")}}',
              type:'post',
              data: $(this).serializeArray(),
              dataType: 'json',
              success: function(response) {
                $('button[type=submit]').prop('disabled', true);

                if(response.status == true) {
                   window.location.href= '{{route("coupons.index")}}';
                }else{

                  if(response.errors['code']) {
                    $("#code").addClass("is-invalid").siblings("p").addClass('invalid-feedback').html(response.errors['code']);
                  }else{
                    $("#code").removeClass("is-invalid").siblings("p").removeClass('invalid-feedback').html('');
      
                  }

                   if(response.errors['type']) {
                     $("#type").addClass('is-invalid').siblings("p").addClass("invalid-feedback").html(response.errors['type']);
                   }else{
                    $("#type").removeClass('is-invalid').siblings("p").removeClass("invalid-feedback").html("");

                   }

                   if(response.errors['discount_amount']) {
                     $("#discount_amount").addClass('is-invalid').siblings("p").addClass("invalid-feedback").html(response.errors['discount_amount']);
                   }else{
                    $("#cdiscount_amount").removeClass('is-invalid').siblings("p").removeClass("invalid-feedback").html("");

                   }

                   if(response.errors['starts_at']) {
                     $("#starts_at").addClass('is-invalid').siblings("p").addClass("invalid-feedback").html(response.errors['starts_at']);
                   }else{
                    $("#starts_at").removeClass('is-invalid').siblings("p").removeClass("invalid-feedback").html("");

                   }

                   if(response.errors['expires_at']) {
                     $("#expires_at").addClass('is-invalid').siblings("p").addClass("invalid-feedback").html(response.errors['expires_at']);
                   }else{
                    $("#expires_at").removeClass('is-invalid').siblings("p").removeClass("invalid-feedback").html("");

                   }
                }
              }
            });
         });






      </script>
    @endsection







