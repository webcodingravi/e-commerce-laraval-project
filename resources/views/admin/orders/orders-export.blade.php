<table>
  <thead>
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
      <td>{{$order->first_name}} {{$order->last_name}}</td>
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