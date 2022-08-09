<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginUserController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email'     => 'required',
            'password'  => 'required|min:8',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->level == 'admin') {
                return redirect()->intended('/admin');
            }
            return redirect()->intended('/');
        }

        return back()->with([
            'gagal'=> 'Email dan password tidak sesuai!'
        
        ]);
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

}
