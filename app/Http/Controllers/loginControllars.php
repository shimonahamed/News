<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class loginControllars extends Controller
{
    public function index(){
        return view('backend.auth.login');
    }
    public function adlogin(Request $request){
        $credentials=[
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ];
        $login=Auth::attempt($credentials);

        if ($login){
            return redirect('/dashboard');
        }else{
            Session::flash('failed','Login Failed');
            return redirect()->back();
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

}
