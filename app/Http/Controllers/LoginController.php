<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view ('login.index', [
            'title'=>'Login',
            'active'=>'login'
        ]);
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'username'=>'required|min:4|max:12|alpha_dash:ascii',
            'password'=> 'required|max:255'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Incorrect username or password.');

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
