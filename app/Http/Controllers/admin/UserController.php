<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      $users = User::latest(); 
      if(!empty($request->get('keyword'))) {
        $users = $users->where('name', 'like' ,'%'.$request->get('keyword').'%');
        $users = $users->orwhere('email', 'like' ,'%'.$request->get('keyword').'%');

      }
      $users = $users->paginate(10);

      return view('admin.users.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'name' => 'required',
           'email' => 'required|email|unique:users',
           'password' => 'required|min:5',
           'phone' => 'required'


        ]);

        if($validator->passes()) {
          
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->phone = $request->phone;
            $user->status = $request->status;

            $user->save();

            $message = 'User added successfully';
            session()->flash('success', $message);

            return response()->json([
                'status' => true,
                'errors' => $message
            ]);

        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
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
        $users = User::find($id);
        if($users == null) {
            $message = 'User not found';
            session()->flash('error', $message);
            
            return redirect()->route('users.index');

        }
        return view('admin.users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)

    {

        $user = User::find($id);
        if($user == null) {
            $message = 'User not found';
            session()->flash('error', $message);
        
            return response()->json([
                'status' => true,
                'errors' => $message
            ]);


        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id.',id',
            'phone' => 'required'
 
 
         ]);

         if($validator->passes()) {
          
            $user->name = $request->name;
            $user->email = $request->email;
            $user->status = $request->status;


            if($request->password != ''){
                $user->password = $request->password;

            }
            $user->phone = $request->phone;
            $user->save();

            $message = 'User Updated successfully';
            session()->flash('success', $message);

            return response()->json([
                'status' => true,
                'errors' => $message
            ]);

        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
    }

}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $user = User::find($id);
      $user->delete();

      $message = 'User Deleted Successfully';

      
      session()->flash('success', $message);

      return response()->json([
        'status' => true,
        'message' => $message



      ]);
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
