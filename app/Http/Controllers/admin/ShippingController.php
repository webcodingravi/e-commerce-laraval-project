<?php

namespace App\Http\Controllers\admin;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\ShippingCharge;
use App\Exports\ShippingExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $countries = Country::get();

      $data['countries'] = $countries;

      $shippingCharges = ShippingCharge::select('shipping_charges.*', 'countries.name')->leftJoin('countries','countries.id', 'shipping_charges.country_id')->get();

      $data['shippingCharges'] = $shippingCharges;
      

      return view('admin.shipping.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

         $request->validate([
                'country' => 'required',
                'amount' => 'required|numeric'
        ]);
     
          $shipping = new ShippingCharge;
          $shipping->country_id = $request->country;
          $shipping->amount = $request->amount;
          $shipping->save();

          if($shipping) {
            return redirect()->route('shipping.create')->with('success', 'successfully insert data');


          }else{
            return redirect()->route('shipping.create')->with('error', 'Not insert Data');
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

        $shippingCharge = ShippingCharge::find($id);
        $countries = Country::get();

        $data['countries'] = $countries;
        $data['shippingCharge'] = $shippingCharge;


        return view('admin.shipping.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

      

        $request->validate([
            'country' => 'required',
            'amount' => 'required|numeric'
    ]);

 
      $shipping = ShippingCharge::find($id);
      $shipping->country_id = $request->country;
      $shipping->amount = $request->amount;
      $shipping->save();

      if($shipping) {
        return redirect()->route('shipping.create')->with('success', 'successfully updated data');


      }else{
        return redirect()->route('shipping.create')->with('error', 'Not updated Data');
      }

    
    }
   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
     $shippingCharge = ShippingCharge::find($id);
     $shippingCharge->delete();

     if( $shippingCharge) {
        return redirect()->route('shipping.create')->with('success', 'successfully deleted data');


      }else{
        return redirect()->route('shipping.create')->with('error', 'Not deleted Data');
      }


}


 public function export() {
  return Excel::download(new ShippingExport, 'shipping.xlsx');

 }


}