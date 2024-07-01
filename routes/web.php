<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\UserController as FrontUserController;
use Illuminate\Support\Facades\Route;

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


//Route OF FRONT
Route::get('/',[HomeController::class,'index'])->name('home');
Route::controller(FrontUserController::class)->group(function(){
    Route::get('/login','showLogin')->name('login');
    Route::post('/login','doLogin')->name('dologin');
    Route::get('/register','showRegister');
    Route::post('/register','doRegister');
});


//Route OF ADMIN PANEL
Route::controller(UserController::class)->prefix('panel')->group(function(){
    Route::get('user','show')->name('users.show');
    Route::get('user/delete','delete')->name('user.delete');
    Route::get('user/edit','edit')->name('user.edit');
    Route::post('user/edit','update')->name('user.update');
    Route::get('user/status/change/{id}','changeUserStatus')->name('changeUserStatus');
    
});
Route::get('/panel',[AdminController::class,'index'])->name('panel');
