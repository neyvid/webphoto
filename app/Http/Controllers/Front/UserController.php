<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\authRequest;
use App\Models\User;
use App\Repositories\UserRepository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userRepo;
    public function __construct()
    {
        $this->userRepo=new UserRepository();
    }
    public function showLogin(){
        if(Auth::check()){
            return redirect('/');
        }
        return view('front.user.login');
    }
    
    public function showRegister(){
        if(!Auth::check()){
            return view('front.user.register');

        }
        return redirect('/');
    }
    public function doLogin(Request $request){
        $userFieldEntry=$this->authType($request->username);
       
        $userLogin=Auth::attempt([$userFieldEntry=>$request->username,'password'=>$request->password],true);
    
        if($userLogin){
            return 'you are login successfully';
        }

    }
    public function doRegister(Request $request){
       $authType= $this->authType($request->username);
       $checkIsExist=$this->userRepo->findBy([$authType=>$request->username]);
        if(empty($checkIsExist) && !$checkIsExist instanceof User){
           $user=$this->userRepo->create([
                $authType=>$request->username,
                'password'=>Hash::make($request->password),
           ]);
           Auth::login($user,true);
           return redirect()->route('user.edit');
        };
        return 'این ایمیل و یا شماره همراه قبلا در سیستم ثبت نام کرده است.';
    }   
    protected function authType($userFieldEntry){
       $userFieldEntry=$userFieldEntry;
       $authType='';
        if(filter_var($userFieldEntry,FILTER_VALIDATE_EMAIL)){
            $authType='email';
        }elseif(is_numeric($userFieldEntry)){
            $authType='mobile';
        }
        return $authType;
    }
}
