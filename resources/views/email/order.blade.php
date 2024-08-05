<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  	{{-- Bootstrap-5 --}}
		<link rel="stylesheet" href="{{asset('bootstrap-5/bootstrap.min.css')}}">

  <title>Order Email</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; font-size:16px;">

  @if($mailData['userType'] == 'customer') 
  <h1>Thanks for your order!!</h1>
  <h2>Your Order Id is: #{{$mailData['order']->id}}</h2>
  @else
  <h1>You have received an order:</h1>
  <h2>Order Id is: #{{$mailData['order']->id}}</h2>
  @endif

  
  <h1 class="h5 mb-3">Shipping Address</h1>
        <address>
        <strong>{{$mailData['order']->first_name.' '.$mailData['order']->last_name}}</strong><br>
         {{$mailData['order']->address}}<br>
         {{$mailData['order']->city}}, {{$mailData['order']->zip}}, {{getCountryInfo($mailData['order']->country_id)->name}}<br>
          Phone: {{$mailData['order']->mobile}}<br>
          Email: {{$mailData['order']->email}}
          </address>

  <h2>Products</h2>
  
  <table class="table table-bordered table-striped" cellpadding="3" cellspacing="3" width="700">
    <thead class="bg-dark text-white">
        <tr>
            <th>Product</th>
            <th width="100">Price</th>
            <th width="100">Qty</th>                                        
            <th width="100">Total</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($mailData['order']->items as $Item)
      <tr>
        <td>{{$Item->name}}</td>
        <td>₹{{number_format($Item->price)}}</td>                                        
        <td>{{$Item->qty}}</td>
        <td>₹{{number_format($Item->total)}}</td>
    </tr>
      @endforeach
      
      
        <tr>
            <th colspan="3" >Subtotal:</th>
            <td>₹{{number_format($mailData['order']->subtotal,2)}}</td>
        </tr>

        <tr>
          <th colspan="3" >Discount: {{!empty($mailData['order']->coupen_code) ? '('.$mailData['order']->coupen_code.')' : ''}}</th>
          <td>₹{{number_format($mailData['order']->discount,2)}}</td>
      </tr>
        
        <tr>
            <th colspan="3" >Shipping:</th>
            <td>₹{{number_format($mailData['order']->shipping,2)}}</td>
        </tr>
        <tr>
            <th colspan="3" >Grand Total:</th>
            <td>₹{{number_format($mailData['order']->grand_total,2)}}</td>
        </tr>
    </tbody>
</table>	
  
</body>
</html>