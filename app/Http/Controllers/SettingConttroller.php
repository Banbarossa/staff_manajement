<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingConttroller extends Controller
{
    public function index(){
        return view ('setting.index');
    }
}
