<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $active = Staff::where('status',true)->get();
        $inactive = Staff::where('status',false)->get();
        $admin = User::where('role','admin')->get();
        $user = User::where('role','user')->get();

        
        return view('dashboard',[
            'active'=>$active,
            'inactive'=>$inactive,
            'admin'=>$admin,
            'user'=>$user,
        ]);
    }
}
