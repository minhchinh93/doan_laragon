<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Jobs\NewJob;
use Carbon\Carbon;
class resetpassController extends Controller
{
    //
    public function forgotpass(){

        return view('clients.auth.cfmail');

    }

    public function checkmail(Request $request){
        $input=[

            'link'=> route('sendMailChangepass',[$request->email]),
            'name'=>$request->name,
        ];

        if(User::where('email', $request->email)){
            $email= $request->email;
            $emailJob = (new NewJob( $email, $input))->delay(Carbon::now()->addMinutes(5));
            dispatch($emailJob);
            return redirect()->route('login')->with('success','kiem tra mail de doi mk') ;
        }else{
            return redirect()->route('login')->with('erros','mail nay khong ton tai tren he thong') ;;
        }

    }
    public function sendMailChangepass($email){
        return view('clients.auth.cfPass',['email'=>$email]);
    }

    public function changePass(Request $request, $email){
        $password = bcrypt($request->password);

        if (User::where('email',$email)){
            User::where('email',$email)->update(['password'=>$password]);
            return redirect()->route('login')->with('success','succset password,try login !');
        } else{
            return redirect()->route('login')->with('erros','erros password,try login !');
        }

    }
}
