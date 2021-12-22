<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Jobs\NewJob;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class regiterController extends Controller
{
    //
    public function index() {
        return view('clients.auth.regiter');
    }
    public function postList(Request $request){
        $remember_token= md5($request->name.time());
        $url = route('senmail',[$remember_token]);
        $data=[
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            'remember_token'=> $remember_token,

        ];
        $input= [
            'link'=> $url,
            'name'=>$request->name
        ];
        $email= $request->email;
        // send mail queue job
        $emailJob = (new NewJob( $email, $input))->delay(Carbon::now()->addMinutes(5));
        dispatch($emailJob);
        User::create($data);
        return redirect()->route('login')->with('success','bạn đăng ký thanh cong');
    }
}
