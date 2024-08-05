<?php

namespace App\Http\Controllers\admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Exports\BrandsExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
     $brands = Brand::latest();
      
     if(!empty($request->get('keyword'))) {
        $brands = $brands->where('name', 'like', '%'.$request->get('keyword').'%');
     }

     $brands = $brands->paginate(10);

     return view('admin.brands.brand', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('admin.brands.create-brand');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:brands,slug',
            'status' => 'required'
          ]);

          $brands = Brand::create([
             'name' => $request->name,
             'slug' => $request->slug,
             'status' => $request->status
          ]);

          if($brands) {
             return redirect()->route("brand.index")->with("success", "Successfully Brand Insert.");
          }else{
            return redirect()->route("brand.index")->with("error", "Not Brand Insert.");

          }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $brands = Brand::find($id);
       return view('admin.brands.update-brand', compact('brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brands = Brand::find($id)->update([
           'name' => $request->name,
           'slug' => $request->slug,
           'status' => $request->status
        ]);

        if($brands) {
            return redirect()->route("brand.index")->with("success", "Successfully Brand Updated.");
         }else{
           return redirect()->route("brand.index")->with("error", "Not Brand Updated.");

         }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $brands = Brand::find($id);
      $brands->delete();

      if($brands) {
        return redirect()->route("brand.index")->with("success", "Successfully Brand Deleted.");
     }else{
       return redirect()->route("brand.index")->with("error", "Not Brand Deleted.");

     }


    }

    public function export() 
    {
        return Excel::download(new BrandsExport, 'Brands.xlsx');
    }
}
