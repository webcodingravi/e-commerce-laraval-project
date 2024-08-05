@extends('admin.layouts.app')
@section('content')
<section class="content-header">					
  <div class="container-fluid my-2">
    <div class="row mb-2">
      @include('admin.alertMessage')
      <div class="col-sm-6">
        <h1>Ratings</h1>
      </div>
      {{-- <div class="col-sm-6 text-right">
        <a href="{{route('products.create')}}" class="btn btn-primary">New Product</a>
      </div> --}}
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
          <button type="button" class="btn btn-info btn-sm" onclick="window.location.href='{{route("products.productRating")}}'">
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
              <th>Product</th>
              <th>Rating</th>
              <th>Comment</th>
              <th>Rated by</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
             @if ($ratings->isNotEmpty())
               @foreach ($ratings as $index =>$rating)

               <tr>
                <td>{{$index+1}}</td>
             
                <td><a href="#">{{$rating->productTitle}}</a></td>
                <td> {{number_format($rating->rating,2)}}/Rating</td>
                <td>{{$rating->comment}}</td>
                <td>{{$rating->username}}</td>

                <td>
                @if ($rating->status == 1)
                <a href="javascript:void(0);" onclick="changeStatus(0, '{{$rating->id}}');">
                <svg class="text-success-500 h-6 w-6 text-success" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </a>

              @else
              <a href="javascript:void(0);" onclick="changeStatus(1,'{{$rating->id}}');">
                <svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </a>




                @endif
              </td>
           
    
              </tr>
              
  
               @endforeach
             @else
               <tr>
                <td colspan="8"><h2>No, Record Found</h2></td>

              </tr>
             @endif
            </tbody>
        </table>										
      </div>

      <div class="pagination-section px-4">
        {{$ratings->links('pagination::bootstrap-5')}}

      </div>
    </div>
  </div>
  <!-- /.card -->
</section>
<!-- /.content -->


@endsection

@section('customJS')
<script>
  function changeStatus(status, id) {
    if(confirm("Are You sure you want to change status ?")) {
      $.ajax({
        url : '{{route("products.changeRatingStatus")}}',
        type: 'get',
        data: {status:status, id:id},
        dataType: 'json',
        success: function(response) {
          window.location.href='{{route("products.productRating")}}';
        }

      });
    }
  }
</script>
@endsection


