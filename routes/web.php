<?php

use App\Http\Controllers\Admin\UserController;
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

// Route::get('/', function () {
//     return view('admin.users.index');
// });
Route::get('/', function () {
    return view('front.index');
});
Route::get('/login', function () {
    return view('front.user.login');
});
// Route::get('/user',[UserController::class,'show'])->middleware('auth');

Route::controller(UserController::class)->group(function(){
    Route::get('/user','show');
});
Route::get('/user',[UserController::class,'show']);