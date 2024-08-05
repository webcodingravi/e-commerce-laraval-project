<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function dashboard() {
        
        $totalOrders = Order::where('status', '!=', 'cancelled')->count();
        $totalProducts = Product::count();
        $totalCustomer = User::where('role',1)->count();

        $totalRevenue = Order::where('status', '!=', 'cancelled')->sum('grand_total');

        // This month revenue

        $startOfMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
        $currentDate = Carbon::now()->format('Y-m-d');
        
        $revenueThisMonth = Order::where('status', '!=', 'cancelled')
                            ->whereDate('created_at', '>=',$startOfMonth)
                            ->whereDate('created_at', '<=',$currentDate)
                            ->sum('grand_total');


        // Last month revenue

       $lastMonthStartDate = Carbon::now()->subMonth()->startOfMonth()->format('Y-m-d');
       $lastMonthEndDate = Carbon::now()->subMonth()->endOfMonth()->format('Y-m-d');
       $lastMonthName = Carbon::now()->subMonth()->endOfMonth()->format('M');

         

        $revenueLastMonth = Order::where('status', '!=', 'cancelled')
                    ->whereDate('created_at', '>=',$lastMonthStartDate)
                    ->whereDate('created_at', '<=',$lastMonthEndDate)
                    ->sum('grand_total');


            // Last 30 days sale

          $lastThirtyDayStartDays = Carbon::now()->subDays(30)->format('Y-m-d');

          $revenueLastThirtyDays = Order::where('status', '!=', 'cancelled')
                        ->whereDate('created_at', '>=',$lastThirtyDayStartDays)
                        ->whereDate('created_at', '<=',$currentDate)
                        ->sum('grand_total');


            // Delete Temp images here

            $dayBeforeToday = Carbon::now()->subDays(1)->format('Y-m-d H:i:s');

           $tempImages = TempImage::where('created_at', '<=', $dayBeforeToday)->get();

           foreach($tempImages as $tempImage) {
            $path = public_path('/temp/'.$tempImage->name);
            $thumbPath = public_path('/temp/thumb/'.$tempImage->name);

            // Delete Main Image

            if(File::exists($path)) {
                File::delete($path);

            }
            // Delete Thumb Image

               if(File::exists($thumbPath)) {
                File::delete($thumbPath);

            }

            TempImage::where('id',$tempImage->id)->delete();

           }



        return view('admin.dashboard',[
            'totalOrders' => $totalOrders,
            'totalProducts' => $totalProducts,
            'totalCustomer' => $totalCustomer,
            'totalRevenue' => $totalRevenue,
            'revenueThisMonth' => $revenueThisMonth,
            'revenueLastMonth' => $revenueLastMonth,
            'revenueLastThirtyDays' => $revenueLastThirtyDays,
            'lastMonthName' => $lastMonthName
        ]);
    }





    public function logout() {
        Auth::guard('admin')->logout();
        return view('admin.Login');
    }





}
