<table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Country</th>
      <th>Amount</th>
      <th>Created_at</th>
      <th>Updated_at</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($shippingCharge as $shipping)
    <tr>
      <td>{{$shipping->id}}</td>
      <td>{{$shipping->name}}</td>
      <td>{{$shipping->amount}}</td>
      <td>{{\Carbon\Carbon::parse($shipping->created_at)->format('d/m/y')}}</td>
      <td>{{\Carbon\Carbon::parse($shipping->updated_at)->format('d/m/y')}}</td>
     </tr>
    @endforeach
 


</tbody>


</table>