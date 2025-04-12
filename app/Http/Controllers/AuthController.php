<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{

    public function doLogin(){
        if (!$user =User::where('email','=',request()->input("email"))->first()) {
            return redirect()->back();
        }
        if (!Hash::check(request()->input("password"),$user->password)) {
            return redirect()->back();
        }
        Auth::login($user);
        return redirect()->to(route('panel1'));
    }
    public function logout(){
        if(!Auth::check()){
            return redirect()->back();
        }
        Auth::logout();
        return redirect()->to(route('login'));

    }
}
