<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffInactiveController extends Controller
{
    public function index()
    {
        $staffs = Staff::where('status',false)->orderBy('nama','ASC')->get();
        return view('staff.index',['staffs'=>$staffs]);
    }

}
