<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Contracts\view\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;


class OrdersExport implements FromView
{
   
    public function view(): View
    {
     
        //  Orders export

        $orders = Order::latest()->get();

    
        return view('admin.orders.orders-export', [
          'orders' => $orders
        ]);
        
        
    }

   
}
