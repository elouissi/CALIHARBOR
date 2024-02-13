<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;





class ForgetPasswordManager extends Controller
{
    public function forgetPassword(){
        return view('auth.forget_password');
    }
    public function forgetPasswordPost(Request $resquest){
        $resquest->validate([
            'email' =>'required|email|exists:users'
        ]);
        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' =>$resquest->email,
            'token' =>$token,
            'created_at'=> Carbon::now(),

        ]);
        Mail::send("auth.emails.forget_password",['token' =>$token],function($message)use($resquest){
            $message->to($resquest->email);
            $message->subject("reset password");
        });
        return   redirect(route('forgetPassword'))->with('success','we have send a email to reset password');

    }
    public function resetPassword($token){
        return view('auth.new_password', compact('token'));
    }
    
    public function resetPasswordPost(Request $resquest){
         $resquest->validate([
            'email' =>'required|email|exists:users',
            'password' => 'required|same:confirm-password',
            'confirm-password' => 'required',
        ]);
         $updatePassword = DB::table('password_reset_tokens')->where([
            'email'=>$resquest->email,
            'token'=>$resquest->token
        ])->first();

        

        if(empty($updatePassword)){
            return   redirect(route('resetPassword'));
        }
        User::where('email' ,$resquest->email)->update([
            'password' => hash::make($resquest->password)
        ]);
        DB::table('password_reset_tokens')->where(['email' => $resquest->email])->delete();
        return   redirect(route('login'));

    }

}
