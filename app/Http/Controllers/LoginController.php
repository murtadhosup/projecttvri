<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function postlogin(Request $request)
    {    
        if (Auth::attempt($request->only('email','password')))
        {
            if (auth()->user()->role == 'admin') {
                return redirect()->route('beranda-admin');
            }else if (auth()->user()->role == 'user') {
                return redirect()->route('beranda-user');
            }

        } else{
            return redirect('login');
        }
    }

    public function logout(Request $request)
    {    
        Auth::logout();
        return redirect('/');
    }
}
