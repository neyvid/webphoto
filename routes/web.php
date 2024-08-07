<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Front\UserController as FrontUserController;
use Doctrine\DBAL\Driver\Middleware;

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

//Route OF FRONT`
Route::get('/',[HomeController::class,'index'])->name('home');
Route::controller(FrontUserController::class)->group(function(){
    Route::get('/login','showLogin')->name('login');
    Route::post('/login','doLogin')->name('dologin');
    Route::get('/register','showRegister');
    Route::post('/register','doRegister');
});


//Route OF ADMIN PANEL
// baraye didan route haze zir hatman bayad role user ya super-admin bashe
Route::group(['middleware'=>['auth','role:user|super-admin']],function(){
    Route::controller(UserController::class)->prefix('panel')->group(function(){
        Route::get('user','show')->name('users.show');
        Route::get('user/delete','delete')->name('user.delete');
        Route::get('user/edit','edit')->name('user.edit');
        Route::post('user/edit','update')->name('user.update');
        Route::get('user/status/change/{id}','changeUserStatus')->name('changeUserStatus');
        Route::get('user/create','userCreatForm')->name('user.create.form');
        Route::post('user/create','userCreate')->name('user.create');
        // Route::post('user/image','create');
        Route::get('user/image/remove','removeImage')->name('user.remove.image');
        Route::get('logout','logOut')->name('user.logout');
    
    });
    Route::controller(ImageController::class)->prefix('panel')->group(function(){
        Route::get('image','show')->name('users.images.show');
        Route::get('image/status/change/{id}','changeImageStatus')->name('changeImageStatus');
        Route::get('image/edit','edit')->name('image.edit');
        Route::post('image/edit','update')->name('image.update');
        Route::get('image/delete','delete')->name('image.delete');
        Route::get('image/create','imageCreateForm')->name('image.create.form');
        Route::post('image/create','imageCreate')->name('image.create');
    });
    
    
    Route::resource('panel/permissions',PermissionController::class);
    Route::get('panel/permissions/{permissionId}/delete',[PermissionController::class,'destroy']);
    Route::resource('panel/roles',RoleController::class);
    Route::get('panel/roles/{roleId}/delete',[RoleController::class,'destroy']);
    Route::get('panel/roles/{roleId}/give-permission',[RoleController::class,'addPermissionToRole']);
    Route::put('panel/roles/{roleId}/give-permission',[RoleController::class,'givePermissionToRole']);
    
    Route::get('/panel',[AdminController::class,'index'])->name('panel');
    
});
