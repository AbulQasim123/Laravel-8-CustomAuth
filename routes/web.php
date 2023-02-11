<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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


        // Auth route
Route::get('register',[AuthController::class,'Registration'])->name('register');
Route::post('submit-registration',[AuthController::class,'PostRegistration'])->name('register.post');
Route::get('login',[AuthController::class,'Login'])->name('')->name('login');
Route::post('submit-login',[AuthController::class,'PostLogin'])->name('login.post');
Route::get('dashboard',[AuthController::class,'Dashboard']);
Route::get('logout',[AuthController::class,'Logout'])->name('logout');