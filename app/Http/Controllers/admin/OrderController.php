<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Exports\OrdersExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function index(Request $request) {
     $orders = Order::latest('orders.created_at')->select('orders.*','users.name', 'users.email');

     $orders = $orders->leftJoin('users','users.id', 'orders.user_id');

     if($request->get('keyword') != '') {
        $orders = $orders->where('users.name', 'like', '%'.$request->get('keyword').'%');
        $orders = $orders->orwhere('users.email', 'like', '%'.$request->get('keyword').'%');
        $orders = $orders->orwhere('orders.id', 'like', '%'.$request->get('keyword').'%');

      }

      $orders = $orders->paginate(10);
      $data['orders'] = $orders;
     return view('admin.orders.list', $data);
    }

    public function detail($orderId) {
        $order = Order::select('orders.*', 'countries.name as countryName')->where('orders.id', $orderId)
        ->leftJoin('countries', 'countries.id', 'orders.country_id')
        ->first();

        $orderItems = OrderItem::where('order_id', $orderId)->get();
        $data['order'] = $order;
        $data['orderItems'] = $orderItems;
        return view('admin.orders.detail', $data);
        
    }


    public function changeOrderStatus(Request $request, $orderId) {
        $order = Order::find($orderId);
        $order->status = $request->status;
        $order->shipped_date = $request->shipped_date;
        $order->save();
         
        $message = 'Order status updated successfully';
        session()->flash('success',$message);
        return response()->json([
            'status' => true,
            'message' => $message
        ]);
    }

    public function sendInvoiceEmail(Request $request, $orderid) {
        orderEmail($orderid, $request->userType);

       
        $message = 'Order Email sent successfully';
        session()->flash('success',$message);
        return response()->json([
            'status' => true,
            'message' => $message
        ]);
    }


    public function export() 
    {
        return Excel::download(new OrdersExport, 'orders.xlsx');
    }
}
