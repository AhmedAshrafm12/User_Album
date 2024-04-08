<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{


    public function store(Request $request){                // register
     
        $request->validate([
            'email'=>'required|email|unique:users,email',
            'userName'=>'required|min:3|unique:users,userName',
            'password'=>'min:6'
        ]);

        User::create($request->all());
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);    // auth user after register
        return redirect(route("user.Home"));
    }




    public function login(Request $request)             // login
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'min:6'
        ]);


        Auth::attempt(['email' => $request->email, 'password' => $request->password]);
    
       return redirect(route("user.Home"));
    }




    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
