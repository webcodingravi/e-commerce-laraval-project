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
        <form action="{{route('products.store')}}" id="onSubmit" method="post">
          @csrf
        <div class="container-fluid">
                      <div class="row">
                          <div class="col-md-8">
                              <div class="card mb-3">
                                  <div class="card-body">								
                                      <div class="row">
                                          <div class="col-md-12">
                                              <div class="mb-3">
                                                  <label for="title">Title</label>
                                                  <input type="text" value="{{old('title')}}" name="title" id="title" class="form-control" placeholder="Title">
                                                   <p class="error"></p>
                                                   @error('title')
                                                       <span class="text-danger">
                                                        {{$message}}
                                                       </span>
                                                   @enderror
                                              </div>
                                          </div>

                                          <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="slug">Slug</label>
                                                <input type="text" value="{{old('slug')}}" readonly name="slug" id="slug" class="form-control" placeholder="slug">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="short_description">Short Description</label>
                                                <textarea name="short_description" id="short_description" cols="30" rows="10" class="summernote" placeholder=""></textarea>
                                            </div>
                                        </div> 


                                          <div class="col-md-12">
                                              <div class="mb-3">
                                                  <label for="description">Description</label>
                                                  <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description"></textarea>
                                              </div>
                                          </div> 
                                          
                                          
                                          <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="shipping_returns">Shipping and Returns</label>
                                                <textarea name="shipping_returns" id="shipping_returns" cols="30" rows="10" class="summernote" placeholder=""></textarea>
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

                              </div>
                              <div class="card mb-3">
                                  <div class="card-body">
                                      <h2 class="h4 mb-3">Pricing</h2>								
                                      <div class="row">
                                          <div class="col-md-12">
                                              <div class="mb-3">
                                                  <label for="price">Price</label>
                                                  <input type="text" value="{{old('price')}}" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Price">
                                                  @error('price     ')
                                                  <span class="text-danger">
                                                       {{$message}}
                                                  </span>
                                                  @enderror	
                                              </div>
                                          </div>
                                          <div class="col-md-12">
                                              <div class="mb-3">
                                                  <label for="compare_price">Compare at Price</label>
                                                  <input type="text" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price">
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
                                                  <input type="text" name="sku" id="sku" class="form-control @error('sku') is-invalid @enderror" placeholder="sku">
                                                  @error('sku')
                                                  <span class="text-danger">
                                                       {{$message}}
                                                  </span>
                                                  @enderror
                                              </div>
                                              
                                          </div>
                                          <div class="col-md-6">
                                              <div class="mb-3">
                                                  <label for="barcode">Barcode</label>
                                                  <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode">	
                                              </div>
                                          </div>   


                                          <div class="col-md-12">
                                              <div class="mb-3">
                                                  <div class="custom-control custom-checkbox">
                                                    <input type="hidden" name="track_qty" value="No">
                                                      <input class="custom-control-input" type="checkbox" id="track_qty" value="Yes" name="track_qty" checked>
                                                      <label for="track_qty" class="custom-control-label">Track Quantity</label>
                            
                                                            @error('track_qty')
                                                            <span class="text-danger">
                                                                 {{$message}}
                                                            </span>
                                                            @enderror
                                                         
                                                      
                                                  </div>
                                              </div>
                                              <div class="mb-3">
                                                  <input type="number" min="0" name="qty" id="qty" class="form-control @error('qty') is-invalid  @enderror" placeholder="Qty">	
                                                  @error('qty')
                                                  <span class="text-danger">
                                                        {{$message}}
                                                  </span>
                                              @enderror
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
                                              <option value="1">Active</option>
                                              <option value="0">Deactive</option>
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
                                              <option value="{{$category->id}}">{{$category->name}}</option>
                                              @endforeach
                                                
                                              @endif
                                            
                                          </select>
                                          @error('category')
                                          <span class="text-danger">
                                                {{$message}}
                                          </span>
                                      @enderror
                                      </div>
                                      <div class="mb-3">
                                          <label for="category">Sub category</label>
                                          <select name="sub_category" id="sub_category" class="form-control">
                                            <option value="">Select a Sub Category</option>
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
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>

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
                                              <option value="No">No</option>
                                              <option value="Yes">Yes</option>                                                
                                          </select>
                                          @error('is_featured')
                                              <span class="text-danger">
                                                    {{$message}}
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                              </div>                                 
                          </div>
                      </div>
          
          <div class="pb-5 pt-3">
            <button type="submit" class="btn btn-primary">Create</button>
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
        url: "{{ route('temp-images.create')}}",
        maxFiles: 10,
        paramName: 'image',
        addRemoveLinks: true,
        acceptedFiles: "image/jpeg,image/png,image/gif",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        success: function(file, response){
            // $("#image_id").val(respone.image_id);


          var html = `<div class="card" id="image-row-${response.image_id}" style="width:200px;">
            <input type="hidden" name="image_array[]" value="${response.image_id}">
            <img src="${response.imagePath}" class="card-img-top" alt="...">
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
      }

     
    
 


</script>
@endsection