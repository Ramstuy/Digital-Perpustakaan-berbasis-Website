<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view ('register.index', [
            'title'=>'Register',
            'active'=>'login'
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name'=>'required|min:3|max:28|regex:/^[a-zA-Z\s]+$/',
            'username'=>'required|min:4|max:12|unique:users|alpha_dash:ascii',
            'email'=>'required|email:dns|unique:users',
            'password'=>'required|min:6|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        $request->session()->flash('success','Registration successfull! Please login');
        return redirect('/login');    
    }
}
