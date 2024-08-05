<?php

namespace App\Http\Controllers\admin;

use App\Models\TempImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Laravel\Facades\Image;




class TempImagesController extends Controller
{
    
    public function create(Request $request) {

             $image = $request->image;

             if(!empty($image)) {
                $ext = $image->getClientOriginalExtension();
                $random = mt_rand(1,1000);
                $newName = time().''.$random. '.'.$ext;

                $tempImage = new TempImage();
                $tempImage->name = $newName;
                $tempImage->save();

                $image->move(public_path(). '/temp',$newName);

                // thumb image
                $tempImageLocation = public_path().'/temp/'.$newName;
                $imagePath = Image::read($tempImageLocation);
                $destinationPathThumbnail = public_path('/temp/thumb/');
                $imagePath->cover(300, 275);
                $imagePath->save($destinationPathThumbnail.$newName);
                


                return response()->json([
                    'status' =>true,
                    'image_id' => $tempImage->id,
                    'imagePath' => asset('/temp/thumb/'.$newName),
                    'message' => "Image uploaded successfully"
                ]);
             }
    }


}
