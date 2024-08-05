<?php

namespace App\Http\Controllers\admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\TempImage;
use App\Models\SubCategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\ProductRating;
use App\Exports\ProductsExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Laravel\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      $products = Product::latest('id')->with('product_images');

      if(!empty($request->get('keyword'))) {
        $products = $products->where("title", "like", "%".$request->get('keyword')."%");
      }

      $products = $products->paginate(10);
      return view('admin.products.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $categories = Category::orderBy('name', 'ASC')->get();
       $brands = Brand::orderBy('name', 'ASC')->get();
       return view('admin.products.create-product', compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
  
      $request->validate([
        'title' => 'required',
        'slug' => 'required|unique:products',
        'price' => 'required',
        'sku' => 'required',
        'track_qty' => 'required|in:Yes,No',
        'category' => 'required',
        'is_featured' => 'required',
      ]);


      if(!empty($request->track_qty) && $request->track_qty == 'Yes') {
        $rules['qty'] = 'required';
      }
       
          $store = new Product();
          $store->title = $request->title;
          $store->slug = $request->slug;
          $store->description = $request->description;
          $store->price = $request->price;
          $store->compare_price = $request->compare_price;
          $store->sku = $request->sku;
          $store->barcode = $request->barcode;
          $store->track_qty = $request->track_qty;
          $store->qty = $request->qty;
          $store->status = $request->status;
          $store->category_id = $request->category;
          $store->sub_category_id = $request->sub_category;
          $store->brand_id = $request-> brand;
          $store->is_featured = $request->is_featured;
          $products->shipping_returns = $request->shipping_returns;
          $products->short_description = $request->short_description;
          $products->related_products = (!empty($request->related_products)) ? implode(',',$request->related_products) : '';

          $store->save();

     
        // Save gallery pics

        if(!empty($request->image_array)) {

          foreach($request->image_array as $temp_image_id) {
            
            $tempImageInfo = TempImage::find($temp_image_id);
             $extArray = explode('.',$tempImageInfo->name);
              $ext = last($extArray); // like jpg,gif,png etc

  
            $productImage = new ProductImage();
            $productImage->product_id = $store->id;
            $productImage->image = 'NULL';
            $productImage->save();


            $imageName = $store->id.'-'.$productImage->id.'-'.time().'.'.$ext;

            $productImage->image = $imageName;

            $productImage->save();



            // Generate Thumbnail Image Upload on Folder Code
                // Lage image
        $image = Image::read(public_path().'/temp/'.$tempImageInfo->name);
        
        $destinationPathThumbnail = public_path('/uploads/products/large/');
        $image->resize(1400, null, function($constraint){
          $constraint->aspectRatio();
        });
        $image->save($destinationPathThumbnail.$imageName);



        // small image
        // $image = Image::read(public_path().'/temp/'.$tempImageInfo->name);
        $destinationPathThumbnail = public_path('/uploads/products/small/');
        $image->resize(300, 300);
        $image->save($destinationPathThumbnail.$imageName);



            
          }
        }

        if($store) {
          return redirect()->route('products.index')->with('success', 'successfully insert Product');
      }else{
          return redirect()->route('products.index')->with('error', 'Not insert Product');
      }


        
       


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Product::find($id);

        if(empty($products)) {
           return redirect()->route('products.index')->with('error', 'Product Not Found');
        }

        // Fetch Images
       $productImages =  ProductImage::where('product_id',$products->id)->get();
        $subCategories = SubCategory::where('category_id', $products->category_id)->get();



        $categories = Category::orderBy('name', 'ASC')->get();
        $brands = Brand::orderBy('name', 'ASC')->get();


        $relatedProducts = [];
        // fetch related products
        if($products->related_products != '') {
          $productArray = explode(',',$products->related_products);

          $relatedProducts = Product::whereIn('id', $productArray)->with('product_images')->get();
        }


        return view('admin.products.update-product', compact('products', 'categories','brands', 'subCategories', 'productImages', 'relatedProducts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $products = Product::find($id);


       if(!empty($request->track_qty) && $request->track_qty == 'Yes') {
        $rules['qty'] = 'required';
      }
       
          $products->title = $request->title;
          $products->slug = $request->slug;
          $products->description = $request->description;
          $products->price = $request->price;
          $products->compare_price = $request->compare_price;
          $products->sku = $request->sku;
          $products->barcode = $request->barcode;
          $products->track_qty = $request->track_qty;
          $products->qty = $request->qty;
          $products->status = $request->status;
          $products->category_id = $request->category;
          $products->sub_category_id = $request->sub_category;
          $products->brand_id = $request-> brand;
          $products->is_featured = $request->is_featured;
          $products->shipping_returns = $request->shipping_returns;
          $products->short_description = $request->short_description;
           $products->related_products = (!empty($request->related_products)) ? implode(',',$request->related_products) : '';
          $products->save();



      


      if($products) {
        return redirect()->route('products.index')->with('success', 'successfully updated product');
    }else{
        return redirect()->route('products.index')->with('error', 'Not updated product');
    }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        $productImages = ProductImage::where('product_id' ,$id)->get();

       
        if(!empty($productImages)) {

          foreach($productImages as $productImage) {
            File::delete(public_path('uploads/products/large/'.$productImage->image));
            File::delete(public_path('uploads/products/small/'.$productImage->image));
    
            }
            productImage::where('product_id',$id)->delete();
        }
        
           $product->delete();


    
    return redirect()->route('products.index')->with('success', 'Product deleted successfully');


    }





     public function getProducts(Request $request) {
           
      $tempProduct = [];
      if($request->term != "") {
        $products = Product::where('title', 'like', '%'.$request->term.'%')->get();


        if($products != null) {
          foreach ($products as $product) {
            $tempProduct[] = array('id' => $product->id, 'text' => $product->title);
          }
        }
      }


      return response()->json([
         'tags' => $tempProduct,
         'status' => true
      ]);
     }


     public function export() {
      return Excel::download(new ProductsExport, 'products.xlsx');

     }


     public function productRating(Request $request) {
      $ratings = ProductRating::select('product_ratings.*','products.title as productTitle')->orderBy('product_ratings.created_at', 'DESC');
      $ratings = $ratings->leftJoin('products','products.id','product_ratings.product_id');

      
      if(!empty($request->get('keyword'))) {
        $ratings = $ratings->where("products.title", "like", "%".$request->get('keyword')."%");
        $ratings = $ratings->orWhere("product_ratings.username", "like", "%".$request->get('keyword')."%");

      }


      $ratings = $ratings->paginate(10);

      return view('admin.products.ratings',[
        'ratings' => $ratings
      ]);
     }


     public function changeRatingStatus(Request $request) {
           $productRating = ProductRating::find($request->id);
           $productRating->status = $request->status;
           $productRating->save();

           session()->flash('success', 'Status changed successfully');
           return response()->json([
               'status' => true,

           ]);
     }
}
