<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Exports\CategoriesExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Laravel\Facades\Image;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {  
        $categories = Category::latest();

        if(!empty($request->get('keyword'))){
            $categories = $categories->where('name', 'like', '%'.$request->get('keyword').'%');
        }


        $categories = $categories->paginate(10);
       return view('admin.categories.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.categories.create-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'slug' => 'required|unique:categories',
           'image' => 'required|image|max:3000',
           'status' => 'required'
        ]);

       
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $random = mt_rand(1,1000);
            $newName = time().''.$random. '.'.$ext;
            $image->move(public_path(). '/uploads/category',$newName);

        // $path = $request->image->store('image', 'public');

       $categories = Category::create([
            
            'name'=>$request->name,
            'image'=>$newName,
            'slug'=>$request->slug,
            'status'=>$request->status,
            'showHome'=>$request->showHome
       ]);

       // thumb image
       $ImageLocation = public_path().'/uploads/category/'.$newName;
       $imagePath = Image::read($ImageLocation);
       $destinationPathThumbnail = public_path('/uploads/category/small/');
       $imagePath->cover(300, 275);
       $imagePath->save($destinationPathThumbnail.$newName);


       if($categories) {
        return redirect()->route('categories.index')->with('success', 'successfully Insert Category');
       }else{
        return redirect()->route('categories.index')->with('error', 'Not Insert Category');
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
        $category = Category::find($id);
        return view('admin.categories.categories-update',compact('category'));
        


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);


            if($request->hasFile('image')) {

                // $image_path = public_path("storage/").$category->image;
                // if(file_exists($image_path)) {
                //     @unlink($image_path);
                // }

                File::delete(public_path('uploads/category/'.$category->image));
                File::delete(public_path('uploads/category/small/'.$category->image));


                // $path = $request->image->store('image','public');

                $image = $request->image;
                $ext = $image->getClientOriginalExtension();
                $random = mt_rand(1,1000);
                $newName = time().''.$random. '.'.$ext;
                $image->move(public_path(). '/uploads/category',$newName);

          
                $category->image = $newName;
                $category->save();
               

            }
      
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->status = $request->status;
            $category->showHome = $request->showHome;
            $category->save();


           // thumb image
            $ImageLocation = public_path().'/uploads/category/'.$newName;
            $imagePath = Image::read($ImageLocation);
            $destinationPathThumbnail = public_path('/uploads/category/small/');
            $imagePath->cover(300, 275);
            $imagePath->save($destinationPathThumbnail.$newName);

      

        if($category) {
            return redirect()->route('categories.index')->with('success', 'successfully update Category');
           }else{
            return redirect()->route('categories.index')->with('error', 'Not update Category');
           }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $category = Category::find($id);

        // Delete images from folder

        File::delete(public_path('uploads/category/'.$category->image));
        File::delete(public_path('uploads/category/small/'.$category->image));


        $category->delete();

       
    //    $image_path = public_path("storage/").$category->image;

    //    if(file_exists($image_path)) {
    //     @unlink($image_path);
    //    }

       return redirect()->route('categories.index')->with('status', "Data Successfully deleted");
    }


    public function export() 
    {
        return Excel::download(new CategoriesExport, 'category.xlsx');
    }
}
