@extends('front.layouts.app')



@section('content')

<section class="section-5 pt-3 pb-3 mb-3 bg-white">
  <div class="container">
      <div class="light-font">
          <ol class="breadcrumb primary-color mb-0">
              <li class="breadcrumb-item"><a class="white-text" href="{{route('front.home')}}">Home</a></li>
              <li class="breadcrumb-item"><a class="white-text" href="{{route('front.shop')}}">Shop</a></li>
              <li class="breadcrumb-item">{{$product->title}}</li>
          </ol>
      </div>
  </div>
</section>

<section class="section-7 pt-3 mb-3">
  <div class="container">
      <div class="row ">
        @include('front.account.common.newMessage')
          <div class="col-md-5">
              <div id="product-carousel" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner bg-light">
                    @if ($product->product_images)
                      @foreach ($product->product_images as $key => $productImage)
                      <div class="carousel-item {{($key == 0) ? 'active' : ''}}">
                        <img class="w-100 h-100" src="{{asset('/uploads/products/small/'.$productImage->image)}}" alt="Image">
                    </div>
                      @endforeach
                    @endif
                  </div>
                  <a class="carousel-control-prev" href="#product-carousel" data-bs-slide="prev">
                      <i class="fa fa-2x fa-angle-left text-dark"></i>
                  </a>
                  <a class="carousel-control-next" href="#product-carousel" data-bs-slide="next">
                      <i class="fa fa-2x fa-angle-right text-dark"></i>
                  </a>
              </div>
          </div>
          <div class="col-md-7">
              <div class="bg-light right">
                  <h1>{{$product->title}}</h1>
                  <div class="d-flex mb-3">
                      <div class="text-primary mr-2">
                          {{-- <small class="fas fa-star"></small>
                          <small class="fas fa-star"></small>
                          <small class="fas fa-star"></small>
                          <small class="fas fa-star-half-alt"></small>
                          <small class="far fa-star"></small> --}}

                          <div class="star-rating product mt-2" title="">
                            <div class="back-stars">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                
                                <div class="front-stars" style="width: {{$avgRatingPer}}%">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>  
                      </div>
                      <small class="pt-2 ps-1">({{($product->product_ratings_count > 1) ? $product->product_ratings_count.' Reviews' : $product->product_ratings_count.' Review'}})</small>
                  </div>
                  @if($product->compare_price > 0)
                  <h2 class="price text-secondary"><del>₹{{number_format($product->compare_price,2)}}</del></h2>

                  @endif

                  <h2 class="price ">₹{{number_format($product->price,2)}}</h2>
                 
                    {!!$product->short_description!!}
                 
                  

                  @if ($product->track_qty == 'Yes')
                        @if ($product->qty > 0)

                        <a href="javascript:void(0)" onclick="addToCart({{$product->id}})" class="btn btn-dark"><i class="fas fa-shopping-cart"></i> &nbsp;ADD TO CART</a>


                        @else
                        <a href="javascript:void(0)" class="btn btn-dark"><i class="fas fa-shopping-cart"></i>Out Of Stock</a>


                        @endif
                        

                        @else
                        <a href="javascript:void(0)" onclick="addToCart({{$product->id}})" class="btn btn-dark"><i class="fas fa-shopping-cart"></i> &nbsp;ADD TO CART</a>
                        @endif
              </div>
          </div>

        

          <div class="col-md-12 mt-5">
              <div class="bg-light">
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                      </li>
                      <li class="nav-item" role="presentation">
                          <button class="nav-link" id="shipping-tab" data-bs-toggle="tab" data-bs-target="#shipping" type="button" role="tab" aria-controls="shipping" aria-selected="false">Shipping & Returns</button>
                      </li>
                      <li class="nav-item" role="presentation">
                          <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews</button>
                      </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                          <p>
                          {!!$product->description!!}
                          </p>
                      </div>
                      <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
                        {!!$product->shipping_returns!!}
                      </div>

                      <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <div class="col-md-8">
                            <div class="row">
                                <form action="" name="productRatingForm" id="productRatingForm" method="post">
                                    @csrf
                                <h3 class="h4 pb-3">Write a Review</h3>
                                <div class="form-group col-md-6 mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                    <p></p>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                                    <p></p>

                                </div>
                                <div class="form-group mb-3">
                                    <label for="rating">Rating</label>
                                    <br>
                                    <div class="rating" style="width: 10rem">
                                        <input id="rating-5" type="radio" name="rating" value="5"/><label for="rating-5"><i class="fas fa-3x fa-star"></i></label>
                                        <input id="rating-4" type="radio" name="rating" value="4"  /><label for="rating-4"><i class="fas fa-3x fa-star"></i></label>
                                        <input id="rating-3" type="radio" name="rating" value="3"/><label for="rating-3"><i class="fas fa-3x fa-star"></i></label>
                                        <input id="rating-2" type="radio" name="rating" value="2"/><label for="rating-2"><i class="fas fa-3x fa-star"></i></label>
                                        <input id="rating-1" type="radio" name="rating" value="1"/><label for="rating-1"><i class="fas fa-3x fa-star"></i></label>
                                    </div>
                                    <p class="product-rating-error text-danger"></p>

                                </div>
                                <div class="form-group mb-3">
                                    <label for="">How was your overall experience?</label>
                                    <textarea name="comment"  id="comment" class="form-control" cols="30" rows="10" placeholder="How was your overall experience?"></textarea>
                                </div>
                                <p></p>

                                <div>
                                    <button type="submit" class="btn btn-dark">Submit</button>
                                </div>
                            </form>
                                
                            </div>
                        </div>
                        <div class="col-md-12 mt-5">
                            <div class="overall-rating mb-3">
                                <div class="d-flex">
                                    <h1 class="h3 pe-3">{{$avgRating}}</h1>
                                    <div class="star-rating mt-2" title="70%">
                                        <div class="back-stars">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            
                                            <div class="front-stars" style="width: {{$avgRatingPer}}%">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="pt-2 ps-2">({{($product->product_ratings_count > 1) ? $product->product_ratings_count.' Reviews' : $product->product_ratings_count.' Review'}})</div>
                                </div>
                                
                            </div>
                            @if ($product->product_ratings->isNotEmpty())
                                @foreach ($product->product_ratings as $rating)
                                    
                                @php
                                    $ratingPer = ($rating->rating*100)/5;
                                @endphp
                             
                            <div class="rating-group mb-4">
                               <span> <strong>{{$rating->username}}</strong></span>
                                <div class="star-rating mt-2" title="">
                                    <div class="back-stars">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        
                                        <div class="front-stars" style="width: {{$ratingPer}}%">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>   
                                <div class="my-3">
                                    <p>{{$rating->comment}}</p>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        
                        </div>
                    </div>

                  </div>
              </div>
          </div> 
      </div>           
  </div>
</section>

@if(!empty($relatedProducts))
<section class="pt-5 section-8">
  <div class="container">
      <div class="section-title">
          <h2>Related Products</h2>
      </div> 
      <div class="col-md-12">
          <div id="related-products" class="carousel">
           
            @foreach ($relatedProducts as $relProduct)
            @php
              $productImage = $relProduct->product_images->first();
            @endphp

<div class="col-md-3 col-sm-6 mb-2">
    <div class="product-grid">
    <div class="product-image">
        <a href="{{route('front.product',$relProduct->slug)}}" class="product-img">

        @if (!empty($productImage->image))
        <img class="card-img-top" src="{{asset('/uploads/products/small/'.$productImage->image)}}" alt="">

        @else 
        <img class="card-img-top" src="{{asset('/uploads/products/no-image.jpg')}}" alt="">

        @endif
        </a>
        <a class="product-quick-view" href="#"><i class="fas fa-eye"></i>quick view</a>
        <ul class="product-labels">
            <li>Sale</li>
        </ul>
    </div>
    <div class="product-content">
        <h3 class="title"><a href="#">{{$relProduct->title}}</a></h3>
        {{-- <ul class="rating">
            <li class="fas fa-star"></li>
            <li class="fas fa-star"></li>
            <li class="fas fa-star"></li>
            <li class="far fa-star"></li>
            <li class="far fa-star"></li>
            <li>(3)</li>
        </ul> --}}
        <div class="price">
                @if($relProduct->compare_price > 0)
                <span>₹{{number_format($relProduct->compare_price,2)}}</span>
                @endif

                ₹{{number_format($relProduct->price,2)}}</div>
        <ul class="product-links">
            @if ($relProduct->track_qty == 'Yes')
            @if ($relProduct->qty > 0)

            <li><a href="javascript:void(0)" onclick="addToCart({{$relProduct->id}})">Add to Cart</a></li>

            @else
            <li><a href="javascript:void(0)">Out Of Stock</a></li>

            @endif
            

            @else
             <li><a href="javascript:void(0)" onclick="addToCart({{$relProduct->id}})">Add to Cart</a></li>


            @endif
            <li><a href="javascript:void(0)" onclick="addToWishlist({{$relProduct->id}})"><i class="far fa-heart"></i></a></li>
            {{-- <li><a href="#"><i class="fa fa-random"></i></a></li> --}}
        </ul>
    </div>
    </div>
    </div>


            {{-- <div class="card product-card">
                <div class="product-image position-relative">
                    <a href="{{route('front.product',$relProduct->slug)}}" class="product-img">
                         
                      @if (!empty($productImage->image))
                      <img class="card-img-top" src="{{asset('/uploads/products/small/'.$productImage->image)}}" alt="">
                      
                      @else 
                      <img class="card-img-top" src="{{asset('/uploads/products/no-image.jpg')}}" alt="">

                      @endif
                    
                    
                    </a>

                    
                    <a class="whishlist" href="222"><i class="far fa-heart"></i></a>                            

                    <div class="product-action">
                        <a class="btn btn-dark" href="javascript:void(0)" onclick="addToCart({{$product->id}})">
                            <i class="fa fa-shopping-cart"></i> Add To Cart
                        </a>                            
                    </div>
                </div>                        
                <div class="card-body text-center mt-3">
                    <a class="h6 link" href="">{{$relProduct->title}}</a>
                    <div class="price mt-2">
                        <span class="h5"><strong>₹{{number_format($relProduct->price,2)}}</strong></span>
                        @if($relProduct->compare_price > 0)
                        <span class="h6 text-underline"><del>₹{{number_format($relProduct->compare_price,2)}}</del></span>
                        @endif
                    </div>
                </div>                        
            </div>   --}}
            @endforeach
            
            
          
          </div>
      </div>
  </div>
</section>
@endif
@endsection

@section('customJS')
<script>
    $("#productRatingForm").submit(function(event) {
        event.preventDefault();
        $.ajax({
            url: '{{ route("front.saveRating",$product->id) }}',
            type: 'post',
            data: $(this).serializeArray(),
            dataType: 'json',
            success: function(response) {
                if(response.status == true) {
                    $("#name").removeClass("is-invalid").siblings("P").removeClass("invalid-feedback").html('');
                    $("#email").removeClass("is-invalid").siblings("P").removeClass("invalid-feedback").html('');
                    $("#comment").removeClass("is-invalid").siblings("P").removeClass("invalid-feedback").html('');
                    $(".product-rating-error").removeClass("is-invalid").html('');

                    window.location.href="{{route('front.product',$product->slug)}}";





                }else{

                    if(response.errors['name']) {
                        $("#name").addClass("is-invalid").siblings("P").addClass("invalid-feedback").html(response.errors['name']);

                    }else{
                        $("#name").removeClass("is-invalid").siblings("P").removeClass("invalid-feedback").html('');

                    }

                    if(response.errors['email']) {
                        $("#email").addClass("is-invalid").siblings("P").addClass("invalid-feedback").html(response.errors['email']);

                    }else{
                        $("#email").removeClass("is-invalid").siblings("P").removeClass("invalid-feedback").html('');

                    }

                    if(response.errors['comment']) {
                        $("#comment").addClass("is-invalid").siblings("P").addClass("invalid-feedback").html(response.errors['comment']);

                    }else{
                        $("#comment").removeClass("is-invalid").siblings("P").removeClass("invalid-feedback").html('');

                    }

                    if(response.errors['rating']) {
                        $(".product-rating-error").addClass("is-invalid").html(response.errors['rating']);

                    }else{
                        $(".product-rating-error").removeClass("is-invalid").html('');

                    }


                    
                }
            }


        });
    });
</script>
    
@endsection

