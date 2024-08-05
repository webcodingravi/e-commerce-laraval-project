<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\view\View;
use Maatwebsite\Excel\Concerns\FromView;


class CategoriesExport implements FromView
{
   
    public function view(): View
    {
        // Category export
        $category = Category::latest()->get();
        return view('admin.categories.category-export', [
          'categories' => $category 
        ]);


 
        
    }

   
}
