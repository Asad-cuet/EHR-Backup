<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdministrationController extends Controller
{
    public function all_user()
    {
        $user=User::where('role_as','!=','doctor')->get();
        $user=collect($user)->map(function($item,$key)
        {
            return [
                'id'=>$item['id'],
                'name'=>$item['name'],
                'email'=>$item['email'],
                'role_as'=>$item['role_as']
                ];
        });
        return view('pages.user.user_list',['user'=>$user]);
    }

    public function delete_user($user_id)
    {
        $user =User::find($user_id);
        $user->delete();
        return back()->with('status',"User deleted Successfully");
    }
}
