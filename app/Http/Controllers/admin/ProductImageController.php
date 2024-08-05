<?php

namespace App\Http\Controllers\admin;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

class ProductImageController extends Controller
{
    public function update(Request $request) {
        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $tempImageLocation = $image->getPathName();

        $productImage = new ProductImage();
        $productImage->product_id = $request->product_id;
        $productImage->image = 'NULL';
        $productImage->save();

        
        $imageName = $request->product_id.'-'.$productImage->id.'-'.time().'.'.$ext;

        $productImage->image = $imageName;

        $productImage->save();



        // Generate Thumbnail Image Upload on Folder Code
                // Lage image
                $image = Image::read($tempImageLocation);
        
                $destinationPathThumbnail = public_path('/uploads/products/large/');
                $image->resize(1400, null, function($constraint){
                  $constraint->aspectRatio();
                });
                $image->save($destinationPathThumbnail.$imageName);
        
        
        
                // small image
                $image = Image::read($tempImageLocation);
                $destinationPathThumbnail = public_path('/uploads/products/small/');
                $image->resize(300, 300);
                $image->save($destinationPathThumbnail.$imageName);


                return response()->json([
                  'status' => true,
                  'image_id' => $productImage->id,
                  'imagePath' => asset('uploads/products/small/'.$productImage->image),
                  'message' => 'Image save successfully',

                ],200);
        
    }


    public function destroy(Request $request) {
        $productImage = ProductImage::find($request->id);
        if(empty($productImage)) {
            return response()->json([
                'status' => true,
                'message' => 'Image Not Found'
           ],404);
        }

        // Delete images from folder

        File::delete(public_path('uploads/products/large/'.$productImage->image));
        File::delete(public_path('uploads/products/small/'.$productImage->image));

        $productImage->delete();


        return response()->json([
             'status' => true,
             'message' => 'Image deleted successfully'
        ],200);
    }
}
