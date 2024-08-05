<?php

namespace App\Exports;

use App\Models\Brand;
use Illuminate\Contracts\view\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;


class BrandsExport implements FromView
{
   
    public function view(): View
    {
     
        //  Brand export
      
        $brands = Brand::latest()->get();

        return view('admin.brands.brand-export', [
          'brands' => $brands 
        ]);
        
        
    }

   
}
