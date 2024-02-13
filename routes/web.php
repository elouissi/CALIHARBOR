<?php

use App\Http\Controllers\ForgetPasswordManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController ;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'loginform'])->name('loginForm')->middleware('guest');
Route::get('/register', [AuthController::class, 'index'])->name('registerForme')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('/logout',[AuthController::class,'logout'])->middleware('auth');




Route::get('/forgetPassword',[ForgetPasswordManager::class,'forgetPassword'])->name('forgetPassword')->middleware('guest');
Route::post('/forgetPassword',[ForgetPasswordManager::class,'forgetPasswordPost'])->name('forgetPasswordPost')->middleware('guest');
Route::get('/resetPassword/{token}',[ForgetPasswordManager::class,'resetPassword'])->name('resetPassword')->middleware('guest');
Route::post('/resetPassword',[ForgetPasswordManager::class,'resetPasswordPost'])->name('resetPasswordPost');
