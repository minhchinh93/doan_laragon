<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class cfController extends Controller
{
    //
    public function update($remember_token){
        if(User::where('remember_token',$remember_token)){
          User::where('remember_token',$remember_token)->update(['email_verified_at'=>now()]);
          return redirect()->route('login')->with('success',' success verryMail !') ;
        }else{
          return redirect()->route('login')->with('erros','bạn đã verryMail !') ;
        }
  }
}
