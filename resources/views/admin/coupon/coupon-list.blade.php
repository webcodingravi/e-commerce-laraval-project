@extends('admin.layouts.app')
@section('content')
	<!-- Content Header (Page header) -->
  <section class="content-header">					
    <div class="container-fluid my-2">
      <div class="row mb-2">
        @include('admin.alertMessage')
        <div class="col-sm-6">
          <h1>Discount Coupon
        </h1>
          
        </div>
        <div class="col-sm-6 text-right">
          <a href="{{route('coupons.create')}}" class="btn btn-primary">New Coupon</a>
        </div>
        
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="container-fluid">
      <div class="card">
        <form action="" method="get">
        <div class="card-header">
          <div class="card-title">
            <button type="button" class="btn btn-info btn-sm" onclick="window.location.href='{{route("coupons.index")}}'">
              Reset</button>
          </div>
           
       
          <div class="card-tools">
            <div class="input-group input-group" style="width: 250px;">
              <input type="text" value="{{Request::get('keyword')}}" name="keyword" class="form-control float-right" placeholder="Search">

             
              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
                </button>
                
              </div>

              </div>
             
          </div>       
        </div>
      </form>
        <div class="card-body table-responsive p-0">			
      
          <table class="table table-bordered table-striped table-hover text-nowrap">
            <thead class="bg-dark">
              <tr>
                <th>S.No</th>
                <th>Code</th>
                <th>Name</th>
                <th>Discount</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              @if($discountCoupon->isNotEmpty())
                   @foreach ($discountCoupon as $index => $Coupon)
                   <tr>
                <td>{{$index+1}}</td>
                <td>{{$Coupon->code}}</td>
                <td>{{$Coupon->name}}</td>
                <td>

                  @if($Coupon->type == 'parcent')
                  {{$Coupon->discount_amount}}%
                  @else
                  ₹{{$Coupon->discount_amount}}

                  @endif

                  <td>{{(!empty($Coupon->starts_at)) ? \Carbon\Carbon::parse($Coupon->starts_at)->format('Y/m/d H:i:s') : ''}}</td>

                  <td>{{(!empty($Coupon->expires_at)) ? \Carbon\Carbon::parse($Coupon->expires_at)->format('Y/m/d H:i:s') : ''}}</td>

                 
                {{-- <td><img src="{{asset('/storage/'.$category->image)}}" width="200"></td> --}}
                
              
                  @if($Coupon->status == 1)
                  <td>
                  <svg class="text-success-500 h-6 w-6 text-success" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                </td>
                  @else
                  <td>
                  	<svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                  </td>


                  @endif

                     <td>
                      <div class="d-flex">
                    <a href="{{route('coupons.edit',$Coupon->id)}}">
                      <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                      </svg>
                    </a>
                    {{-- <form action="{{route('coupons.destroy',$Coupon->id)}}" method="post">
                      @csrf
                        @method('DELETE') --}}
                        <a href="#" onclick="deleteCoupon({{$Coupon->id}})" class="btn w-4 h-1 mr-1 p-0">
                      <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1 text-danger" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                      </a>
                  </form>
                  </div>
                  </td>

              </tr>


             @endforeach
            
              @else
              <tr>
                <td colspan="10"><h2>No, Record Found</h2></td>
              </tr>

              @endif
          
            </tbody>
          </table>										
        </div>
        <div class="pagination-section px-4">
          {{$discountCoupon->links('pagination::bootstrap-5')}}

        </div>
       
      </div>
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
  
@endsection


@section('customJS')
<script>
function deleteCoupon(id) {
  var url = '{{route("coupons.destroy","ID")}}';
  var newUrl = url.replace("ID",id);

  if(confirm("Are you sure you want to delete")) {
    $.ajax({
       url : newUrl,
       type: 'delete',
       data: {
        "_token": "{{ csrf_token() }}",

       },
       dataType: 'json',
       success: function($response) {
         if($response["status"]) {
          window.location.href="{{route('coupons.index')}}";
         }
       }
    });
  }
}
</script>
  
@endsection