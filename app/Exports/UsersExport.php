<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\view\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;


class UsersExport implements FromView
{
   
    public function view(): View
    {
     
        //  Users export

        $users = User::latest()->where('role',1)->get();

    
        return view('admin.users.users-export', [
          'users' =>  $users
        ]);
        
        
    }

   
}
