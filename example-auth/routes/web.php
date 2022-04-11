<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Login
Route::get('/login',[CustomAuthController::class,'login'])->middleware('alreadyLoggedIn');

Route::post('/login-user',[CustomAuthController::class,'loginUser'])->name('login-user');

//Registration
Route::get('/registration',[CustomAuthController::class,'registration'])->middleware('alreadyLoggedIn');

Route::post('/register-user',[CustomAuthController::class,'registerUser'])->name('register-user');

//dasboard
// Route::get('/dashboard',[CustomAuthController::class,'dashboard'])->name('dashboard')->middleware('isLoggedIn');

Route::get('/dashboard1',[CustomAuthController::class,'dashboard'])->name('dashboard')->middleware('isLoggedIn');


Route::get('/logout',[CustomAuthController::class,'logout']);

Route::delete('/dashboard1/{id}',[CustomAuthController::class,'destroy'])->name('destroy');

