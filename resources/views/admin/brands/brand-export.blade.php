<table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Slug</th>
      <th>Status</th>
      <th>Created_at</th>
      <th>Updated_at</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($brands as $brand)
    <tr>
      <td>{{$brand->id}}</td>
      <td>{{$brand->name}}</td>
      <td>{{$brand->slug}}</td>
      <td>{{$brand->status}}</td>
      <td>{{\Carbon\Carbon::parse($brand->created_at)->format('d/m/y')}}</td>
      <td>{{\Carbon\Carbon::parse($brand->updated_at)->format('d/m/y')}}</td>
     </tr>
    @endforeach
 


</tbody>


</table>