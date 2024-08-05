@extends('admin.layouts.app')
@section('content')
	<!-- Content Header (Page header) -->
  <section class="content-header">					
    <div class="container-fluid my-2">
      <div class="row mb-2">
        @include('admin.alertMessage')
        <div class="col-sm-6">
          <h1>Orders <a href="{{route('orders.export')}}" style="font-size: 1.7rem">
            <i class="fas fa-file-excel text-success"></i>
         </a> 
        </h1>
          
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
            <button type="button" class="btn btn-info btn-sm" onclick="window.location.href='{{route("orders.index")}}'">
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
                <th>Order#</th>
                <th>Customer</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Amount</th>
                <th>Date Purchased</th>

              </tr>
            </thead>

            <tbody>
              @if($orders->isNotEmpty())
                @foreach ($orders as  $order)
                <tr>
                <td><a href="{{route('orders.detail',$order->id)}}">{{$order->id}}</a></td>
                <td>{{$order->name}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->mobile}}</td>

                
              
                  
                  <td>
                    @if($order->status == 'pending')
                      <span class="badge bg-danger">Pending</span>

                    @elseif($order->status == 'shipped')
                    <span class="badge bg-info">Shipped</span>

                    @elseif($order->status == 'delivered')
                    <span class="badge bg-success">Delivered</span>

                    @else
                    <span class="badge bg-danger">cancelled</span>

                    @endif

                 
                  </td>

                  <td>₹{{number_format($order->grand_total,2)}}</td>

                  <td>{{\Carbon\Carbon::parse($order->created_at)->format('d M, Y')}}</td>

                 
              </tr>


             @endforeach
            
              @else
              <tr>
                <td span="5"><h1>No, Record Found</h1></td>
              </tr>

              @endif
          
            </tbody>
          </table>										
        </div>
        <div class="pagination-section px-4">
          {{$orders->links('pagination::bootstrap-5')}}

        </div>
       
      </div>
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
  
@endsection