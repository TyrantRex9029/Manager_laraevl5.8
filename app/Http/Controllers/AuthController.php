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
        return view('login');
    }

    public function register()
    {
        $DataPlace = DataModel::select('city','dis')->get();
        return view('RegisterForm',compact('DataPlace'));
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
