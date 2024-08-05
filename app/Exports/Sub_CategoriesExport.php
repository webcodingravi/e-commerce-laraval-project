<?php

namespace App\Exports;

use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Contracts\view\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;


class Sub_CategoriesExport implements FromView
{
   
    public function view(): View
    {
     
        //  SubCategory export
      
        $subCategories = SubCategory::select('sub_categories.*', 'categories.name as categoryName')
        ->latest('id')
        ->join('categories','categories.id','sub_categories.category_id')->get();

        return view('admin.sub-categories.Sub_Category-export', [
          'subCategories' => $subCategories 
        ]);
        
        
    }

   
}
