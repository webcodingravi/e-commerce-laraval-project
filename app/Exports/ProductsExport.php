<?php

namespace App\Exports;

use App\Models\Brand;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\ProductImage;
use Illuminate\Contracts\view\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;


class ProductsExport implements FromView
{
   
    public function view(): View
    {
     
        //  Products export
        $products = Product::latest('id')->with('product_images')
        ->get();
        return view('admin.products.products-export', [
          'products' => $products,
       
        ]);
        
        
    }

   
}
