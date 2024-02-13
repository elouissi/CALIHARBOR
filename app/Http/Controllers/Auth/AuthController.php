<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
 public function index(){

    return view('auth.register');
 } 

 public function loginform()
 {
    return view('auth.login');
 }

 public function login(LoginRequest $request)
 {
    $form = $request->validated();
    if(Auth::attempt($form))
    {
        $request->session()->regenerate();
        return redirect('/');
      }
    return back()->onlyInput('email');

  } 

 public function register(RegisterRequest $request)
 {
     $form = $request->validated();
    $form['password'] =hash::make($form['password']);
   $user = User::create($form);
    auth()->login($user);
    return redirect('/');
 
 }
 public function logout(Request $request )
 {

    auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');

 }
}
