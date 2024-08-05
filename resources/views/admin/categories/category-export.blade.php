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
    @foreach ($categories as $category)
    <tr>
      <td>{{$category->id}}</td>
      <td>{{$category->name}}</td>
      <td>{{$category->slug}}</td>
      <td>{{$category->status}}</td>
      <td>{{\Carbon\Carbon::parse($category->created_at)->format('d/m/y')}}</td>
      <td>{{\Carbon\Carbon::parse($category->updated_at)->format('d/m/y')}}</td>




     </tr>
    @endforeach
 


</tbody>


</table>