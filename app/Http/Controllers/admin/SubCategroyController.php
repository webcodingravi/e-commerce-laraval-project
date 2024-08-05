<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Exports\CategoriesExport;
use App\Exports\Sub_CategoriesExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;


class SubCategroyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $sub_categories = SubCategory::select('sub_categories.*', 'categories.name as categoryName')
        ->latest('id')
        ->join('categories','categories.id','sub_categories.category_id');
        

        if(!empty($request->get('keyword'))){
            $sub_categories = $sub_categories->where('sub_categories.name', 'like', '%'.$request->get('keyword').'%');
            $sub_categories = $sub_categories->orwhere('categories.name', 'like', '%'.$request->get('keyword').'%');
        }


        $sub_categories = $sub_categories->paginate(10);
       return view('admin.sub-categories.subcategories', compact('sub_categories'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $categories = Category::orderBy('name', 'ASC')->get();

      return view('admin.sub-categories.create-subcategroy', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:sub_categories,slug',
            'status' => 'required',
             'category' => 'required',
         ]);

         $store = SubCategory::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'status' => $request->status,
                'showHome' => $request->showHome,
                'category_id' => $request->category
         ]);

         if($store) {
            return redirect()->route('sub-categories.index')->with("success", "Sub Category Successfully Inserted.");
         }else{
            return redirect()->route('sub-categories.index')->with('error', "Sub Category Not Inserted.");
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
        $subcategory = SubCategory::find($id);
        $categories = Category::orderBy('name', 'ASC')->get();

        return view('admin.sub-categories.update-subcategory',compact('categories','subcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    
        $subcategory = SubCategory::find($id)
        ->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'status' => $request->status,
                'showHome' => $request->showHome,
                'category_id' => $request->category  
        ]);

        if($subcategory) {
            return redirect()->route('sub-categories.index')->with("success", "Sub Category Successfully Updated");
         }else{
            return redirect()->route('sub-categories.index')->with('error', "Sub Category Not Updated.");
         }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->delete();

        if($subcategory) {
            return redirect()->route('sub-categories.index')->with("success", "Sub Category Successfully Deleted");
         }else{
            return redirect()->route('sub-categories.index')->with('error', "Sub Category Not Deleted.");
         }
    }


    public function export() 
    {
        return Excel::download(new Sub_CategoriesExport, 'subCategory.xlsx');
    }
}
