<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\cart;

class logincontroller extends Controller
{
    //
    public function index() {
        return view('clients.auth.login');
    }

    public function login(Request $request){

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('showdasboa');

        } else{
            return redirect()->back()->with('erros', 'Login failed!');
        }
    }

    public function logout(){
        if(Auth::check()){
            Auth::logout();
            Cart::destroy();
            return redirect()->route('login');
        }
    }
}
