<?php

namespace App\Exports;
use App\Models\Country;
use App\Models\ShippingCharge;
use Illuminate\Contracts\view\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;


class ShippingExport implements FromView
{
   
    public function view(): View
    {
     
        //  Products export
        $shippingCharge = ShippingCharge::select('shipping_charges.*', 'countries.name')->leftJoin('countries','countries.id', 'shipping_charges.country_id')->get();

        return view('admin.shipping.shipping-export', [
          'shippingCharge' => $shippingCharge,
       
        ]);
        
        
    }

   
}
