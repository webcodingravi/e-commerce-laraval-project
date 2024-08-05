<table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Category</th>
      <th>Slug</th>
      <th>Status</th>
      <th>Created_at</th>
      <th>Updated_at</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($subCategories as $sub_category)
    <tr>
      <td>{{$sub_category->id}}</td>
      <td>{{$sub_category->name}}</td>
      <td>{{$sub_category->categoryName}}</td>
      <td>{{$sub_category->slug}}</td>
      <td>{{$sub_category->status}}</td>
      <td>{{\Carbon\Carbon::parse($sub_category->created_at)->format('d/m/y')}}</td>
      <td>{{\Carbon\Carbon::parse($sub_category->updated_at)->format('d/m/y')}}</td>




     </tr>
    @endforeach
 


</tbody>


</table>