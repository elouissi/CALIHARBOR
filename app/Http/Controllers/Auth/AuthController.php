<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Repositories\UserRepositoryInterface;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
   protected $userRepositoryInterface;


   public function __construct(UserRepositoryInterface $userRepositoryInterface){
       $this->userRepositoryInterface = $userRepositoryInterface;
   }
  
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
        if(auth()->user()->hasRole(1)){
            return redirect('/dashboard');
        }else{
            return redirect('/');
        }
    }
    return back()->onlyInput('email');
}


 public function register(RegisterRequest $request)
 {
     $form = $request->validated();
    $form['password'] =hash::make($form['password']);
    $form['role_id'] = 2; // Définissez le rôle par défaut ici
 
    $user = $this->userRepositoryInterface->create($form); 
 
     auth()->login($user);
    return redirect('/');
 
 }

 public function logout(){
   // $vr=auth()->user()->hasRole;
   // dd($vr[0]->name);
 
   Auth::logout();
   return redirect('/');
 }
 
}
