@extends('admin.layouts.app')

@section('content')
  		<!-- Content Header (Page header) -->
      <section class="content-header">					
        <div class="container-fluid my-2">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Create Product</h1>
            </div>
            <div class="col-sm-6 text-right">
              <a href="{{route('products.index')}}" class="btn btn-primary">Back</a>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <form action="{{route('products.update',$products->id)}}" method="post" enctype="multipart/form-data">
          @csrf
      @method('PUT')
        <div class="container-fluid">
                      <div class="row">
                          <div class="col-md-8">
                              <div class="card mb-3">
                                  <div class="card-body">								
                                      <div class="row">
                                          <div class="col-md-12">
                                              <div class="mb-3">
                                                  <label for="title">Title</label>
                                                  <input type="text" value="{{$products->title}}" name="title" id="title" class="form-control" placeholder="">
                                                  
                                              </div>
                                          </div>

                                          <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="slug">Slug</label>
                                                <input type="text" value="{{$products->slug}}" readonly name="slug" id="slug" class="form-control" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                          <div class="mb-3">
                                              <label for="short_description">Short Description</label>
                                              <textarea name="short_description" id="short_description" cols="30" rows="10" class="summernote" placeholder="">
                                                {{$products->short_description}}
                                              </textarea>
                                          </div>
                                      </div> 


                                          <div class="col-md-12">
                                              <div class="mb-3">
                                                  <label for="description">Description</label>
                                                  <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="">
                                                    {{$products->description}}
                                                  </textarea>
                                              </div>
                                          </div> 
                                          
                                          
                                          <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="shipping_returns">Shipping and Returns</label>
                                                <textarea name="shipping_returns" id="shipping_returns" cols="30" rows="10" class="summernote" placeholder="">
                                                  {{$products->shipping_returns}}
                                                </textarea>
                                            </div>
                                        </div>  


                                      </div>
                                  </div>	                                                                      
                              </div>
                              <div class="card mb-3">
                                  <div class="card-body">
                                      <h2 class="h4 mb-3">Media</h2>								
                                      <div id="image" class="dropzone dz-clickable">
                                          <div class="dz-message needsclick">    
                                              <br>Drop files here or click to upload.<br><br>                                            
                                          </div>
                                      </div>
                                  </div>	                                                                      
                              </div>
                              <div class="row" id="product-gallery">
                                @if ($productImages->isNotEmpty())
                                  @foreach ($productImages as $Image)
                                  <div class="col-md-3" id="image-row-{{$Image->id}}">
                                  <div class="card" style="width:200px;">
                                    <input type="hidden" name="image_array[]" value="{{ $Image->id }}">
                                    <img src="{{asset('uploads/products/small/'.$Image->image)}}" class="card-img-top" width="200" height="200" alt="...">
                                  
                                    <div class="card-body">
                                        <a href="javascript:void(0)" onClick="deleteImage({{ $Image->id }})" class="btn btn-danger">Delete</a>
                                    </div>
                                    </div>
                                  </div>
                                  @endforeach
                                @endif
                              </div>
                              <div class="card mb-3">
                                  <div class="card-body">
                                      <h2 class="h4 mb-3">Pricing</h2>								
                                      <div class="row">
                                          <div class="col-md-12">
                                              <div class="mb-3">
                                                  <label for="price">Price</label>
                                                  <input type="text" value="{{$products->price}}" name="price" id="price" class="form-control" placeholder="Price">
                                                 
                                              </div>
                                          </div>
                                          <div class="col-md-12">
                                              <div class="mb-3">
                                                  <label for="compare_price">Compare at Price</label>
                                                  <input type="text" value="{{$products->compare_price}}" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price">
                                                  <p class="text-muted mt-3">
                                                      To show a reduced price, move the product’s original price into Compare at price. Enter a lower value into Price.
                                                  </p>	
                                              </div>
                                          </div>                                            
                                      </div>
                                  </div>	                                                                      
                              </div>
                              <div class="card mb-3">
                                  <div class="card-body">
                                      <h2 class="h4 mb-3">Inventory</h2>								
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="mb-3">
                                                  <label for="sku">SKU (Stock Keeping Unit)</label>
                                                  <input type="text" value="{{$products->sku}}" name="sku" id="sku" class="form-control" placeholder="sku">
                                                 
                                              </div>
                                              
                                          </div>
                                          <div class="col-md-6">
                                              <div class="mb-3">
                                                  <label for="barcode">Barcode</label>
                                                  <input type="text" value="{{$products->barcode}}" name="barcode" id="barcode" class="form-control" placeholder="Barcode">	
                                              </div>
                                          </div>   



                                    

                                          <div class="col-md-12">
                                              <div class="mb-3">
                                                  <div class="custom-control custom-checkbox">
                                                    <input type="hidden" name="track_qty" value="No">
                                                      <input class="custom-control-input" type="checkbox" id="track_qty" value="Yes" name="track_qty" {{$products->track_qty == 'Yes' ? 'checked' : ''}}>
                                                      <label for="track_qty" class="custom-control-label">Track Quantity</label>
    
                                                  </div>
                                              </div>
                                              <div class="mb-3">
                                                  <input type="number" value="{{$products->qty}}" min="0" name="qty" id="qty" class="form-control" placeholder="Qty">	
                                                
                                              </div>
                                          </div>     
                                          
                                          
                                      </div>
                                  </div>	                                                                      
                              </div>


                              <div class="card mb-3">
                                <div class="card-body">	
                                    <h2 class="h4 mb-3">Related Products</h2>
                                    <div class="mb-3">
                                        <select multiple class="related-product w-100 form-select" name="related_products[]" id="related_products"> 
                                          @if(!empty($relatedProducts))
                                            @foreach ($relatedProducts as $relProduct)
                                               <option selected value="{{$relProduct->id}}">{{$relProduct->title}}</option>
                                            @endforeach
                                          @endif
                                        </select>
                                      
                                    </div>
                                </div>
                            </div> 

                            
                          </div>
                          <div class="col-md-4">
                              <div class="card mb-3">
                                  <div class="card-body">	
                                      <h2 class="h4 mb-3">Product status</h2>
                                      <div class="mb-3">
                                          <select name="status" id="status" class="form-control">
                                              <option {{$products->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                              <option {{$products->status == 0 ? 'selected' : ''}} value="0">Deactive</option>
                                          </select>

                                      </div>
                                  </div>
                              </div> 
                              <div class="card">
                                  <div class="card-body">	
                                      <h2 class="h4  mb-3">Product category</h2>
                                      <div class="mb-3">
                                          <label for="category">Category</label>
                                          <select name="category" id="category" class="form-control">
                                              <option value="">Select a Category</option>

                                              @if ($categories->isNotEmpty())
                                              @foreach ($categories as $category)
                                              <option {{($products->category_id == $category->id) ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                              @endforeach
                                                
                                              @endif
                                            
                                          </select>
                                     
                                      </div>
                                      <div class="mb-3">
                                          <label for="category">Sub category</label>
                                          <select name="sub_category" id="sub_category" class="form-control">
                                            <option value="">Select a Sub Category</option>
                                            @if ($subCategories->isNotEmpty())
                                            @foreach ($subCategories as $subCategory)
                                            <option {{($products->sub_category_id == $subCategory->id) ? 'selected' : ''}} 
                                              value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                            @endforeach
                                              
                                            @endif
                                          </select>
                                      </div>
                                  </div>
                              </div> 
                              <div class="card mb-3">
                                  <div class="card-body">	
                                      <h2 class="h4 mb-3">Product brand</h2>
                                      <div class="mb-3">
                                          <select name="brand" id="brand" class="form-control">
                                            <option value="">Select a Brand</option>

                                            @if ($brands->isNotEmpty())
                                            @foreach ($brands as $brand)
                                            <option {{($products->brand_id == $brand->id) ? 'selected' : ''}} value="{{$brand->id}}">{{$brand->name}}</option>

                                            @endforeach

                                            @endif
                                             
                                          </select>
                                      </div>
                                  </div>
                              </div> 
                              <div class="card mb-3">
                                  <div class="card-body">	
                                      <h2 class="h4 mb-3">Featured product</h2>
                                      <div class="mb-3">
                                          <select name="is_featured" id="is_featured" class="form-control">
                                              <option {{($products->is_featured == 'No') ? 'selected' : ''}} value="No">No</option>
                                              <option {{($products->is_featured == 'Yes') ? 'selected' : ''}} value="Yes">Yes</option>                                                
                                          </select>
                                        
                                      </div>
                                  </div>
                              </div> 
                              
                              
                      


                          </div>
                      </div>
          
          <div class="pb-5 pt-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{route('products.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
          </div>
        </div>
      </form>
        <!-- /.card -->
      </section>
      <!-- /.content -->

@endsection

@section('customJS')
<script>

$('.related-product').select2({
    ajax: {
        url: '{{ route("products.getProducts") }}',
        dataType: 'json',
        tags: true,
        multiple: true,
        minimumInputLength: 3,
        processResults: function (data) {
            return {
                results: data.tags
            };
        }
    }
}); 


  $(document).ready(function() {
    $('#title').change(function() {
     element = $(this).val();
        $.ajax({
          url: '{{ route("getSlug") }}',
          type: 'get',
          data: {title: element},
          dataType: 'json',
          success: function(response) {
            if(response["status"] == true) {
              $("#slug").val(response["slug"]);
            }
          }
        })
      });


     
      $("#category").change(function() {
        var category_id = $(this).val();
        $.ajax({
          url: "{{route('products-subCategory.index')}}",
          type: 'get',
          data: {category_id:category_id},
          dataType: 'json',
          success:function(response) {
           
              $("#sub_category").find("option").not(":first").remove();
              $.each(response["subCategory"],function(key,item) {
                $("#sub_category").append(`<option value="${item.id}">${item.name}</option>`);
              });
          },
          error: function(){
            console.log("Something Went Wrong");
          }
        });

      });

     
  });


  

  Dropzone.autoDiscover = false;
      const dropzone = $("#image").dropzone({
        url: "{{ route('product-images.update')}}",
        maxFiles: 10,
        paramName: 'image',
        params: {'product_id': '{{ $products->id }}'},
        addRemoveLinks: true,
        acceptedFiles: "image/jpeg,image/png,image/gif",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        success: function(file, response){
            // $("#image_id").val(respone.image_id);


          var html = `<div class="card" id="image-row-${response.image_id}" style="width:200px;">
            <input type="hidden" name="image_array[]" value="${response.image_id}">
            <img src="${response.imagePath}" class="card-img-top" width="200" height="200" alt="...">
            <div class="card-body">
                <a href="javascript:void(0)" onClick="deleteImage(${response.image_id})" class="btn btn-danger">Delete</a>
            </div>
            </div>`;

            $("#product-gallery").append(html);
        },
        
        complete: function(file) {
        this.removeFile(file);
      }



     

      });


      function deleteImage(id) {
        $("#image-row-"+id).remove();
         if(confirm("Are you sure you want to delete image?")) {
          $.ajax({
            url: '{{ route("product-images.destroy")}}',
            type: 'delete',
            data: {
            "_token": "{{ csrf_token() }}",
            id:id
            },
        
            success: function(response) {
              if(response.status == true) {
                alert(response.message)
              }else{
                alert(response.message)
              }

            }
        });
         }

         
      
      }
   

     



     
    
 


</script>
@endsection