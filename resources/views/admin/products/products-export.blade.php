<table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Slug</th>
      <th>Short Description</th>
      <th>Description</th>
      <th>Shipping and Returns</th>
      <th>Image</th>
      <th>Price</th>
      <th>Compare Price</th>
      <th>SKU</th>
      <th>Barcode</th>
      <th>Track Quantity</th>
      <th>Category</th>
      <th>Related Products</th>
      <th>Sub Category</th>
      <th>Brand</th>
      <th>Featured Product</th>
      <th>Status</th>
      <th>Created_at</th>
      <th>Updated_at</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($products as $product)
    <tr>
      <td>{{$product->id}}</td>
      <td>{{$product->slug}}</td>
      <td>{{$product->short_description}}</td>
      <td>{{$product->description}}</td>
      <td>{{$product->shipping_returns}}</td>
      <td>{{$product->product_images}}</td>
      <td>{{$product->price}}</td>
      <td>{{$product->compare_price}}</td>
      <td>{{$product->sku}}</td>
      <td>{{$product->barcode}}</td>
      <td>{{$product->track_qty}}</td>
      <td>{{$product->qty}}</td>
      <td>{{$product->related_products}}</td>
      <td>{{$product->category_id}}</td>
      <td>{{$product->brand_id}}</td>
      <td>{{$product->is_featured}}</td>
      <td>{{$product->status}}</td>
      <td>{{\Carbon\Carbon::parse($product->created_at)->format('d/m/y')}}</td>
      <td>{{\Carbon\Carbon::parse($product->updated_at)->format('d/m/y')}}</td>




     </tr>
    @endforeach
 


</tbody>


</table>