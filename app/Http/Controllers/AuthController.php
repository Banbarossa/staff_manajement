<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    
    
    
    public function index(){
        return view ('welcome');
    }



    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
 

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

        

    }


    public function logout(Request $request) : RedirectResponse
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    
    
    public function profil(){
        return view ('auth.profil');
    }



    public function changePassword(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'min:8|required_with:new_password_confirmation|same:new_password_confirmation',
            'check_password'=>'min:8'
        ]);

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'Gagal Update, Password lama tidak cocok.');
        }

        $password = Hash::make($validatedData['new_password']);

        User::find($user->id)->update([
            'password'=>$password
        ]);


        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/')->with('success',"Password has been updated, please relogin");
        
        // return redirect()->back()->with('success', 'Kata sandi berhasil diubah.');
    }


    public function update(Request $request){
        

        $validatedData = $request->validate([
            'name'  =>'required|min:4',
        ]);


        User::find(Auth::user()->id)->update([
            'name'=>$validatedData['name'],

        ]);

        return redirect()->back()->with('success','Data berhasil diubah');
    }

    public function create(){
        return view('auth.profile_create');
    }

    public function store(Request $request){

        $validatedData=$request->validate([
            'name'=>'required|min:4',
            'email'=>'required|email|unique:users,email',
            'password'=>'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'=>'min:8|required'
        ]);

        User::create([
            'name'=>$validatedData['name'],
            'email'=>$validatedData['email'],
            'password'=>$validatedData['password'],
        ]);

        return redirect()->back()->with('success','Data user berhasil di tambahakan');
        
    }

}
