<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $user = User::all();
        return view('user.index',['users'=>$user]);
    }


    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'name'=>'required|min:4',
            'email'=>'required|email|unique:users,email',
            'password'=>'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'=>'min:8|required'
        ]);

        User::create([
            'name'=>$validatedData['name'],
            'email'=>$validatedData['email'],
            'role'=>$request->role,
            'password'=>Hash::make($validatedData['password']),
        ]);

        return redirect()->back()->with('success','Data user berhasil di tambahakan');
    }


    public function show(string $id)
    {
        $user=User::find($id);
        return view('user.update',['user'=>$user]);
    }


    public function edit(string $id)
    {
        $user=User::find($id);
        return view('user.update',['user'=>$user]);
    }


    public function update(Request $request, string $id)
    {
        $validatedData=$request->validate([
            'name'=>'required|min:4',
            // 'email'=>'required|email|unique:users,email',
            'password'=>'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'=>'min:8|required'
        ]);

        User::find($id)->update([
            'name'=>$validatedData['name'],
            // 'email'=>$validatedData['email'],
            'role'=>$request->role,
            'password'=>Hash::make($validatedData['password']),
        ]);


        return redirect()->back()->with('success','Data user berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('success','Data Berhasil di hapus');
        
    }
}
