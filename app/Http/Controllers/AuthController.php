<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\DataModel;
class AuthController extends Controller
{
   
    public function login()
    {
        return view('Admin.login');
    }

    public function register()
    {
        $GetProvince = \App\Models\Province::select('id','province_name')->get();
        $GetAmphure = \App\Models\Amphure::select('province_id','amphure_name')->get();
        return view('Admin.RegisterForm',compact('GetProvince','GetAmphure'));
    }

    public function checkLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Credentials do not match our records.'
        ]);
    }

    public function logout()
    {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/login');
    }

}
