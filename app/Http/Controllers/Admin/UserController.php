<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepo;
    public function __construct()
    {
        $this->userRepo=new UserRepository();
    }
    public function show(){
        return $this->userRepo->findBy(['name'=>'ali','sex'=>'مرد']);
    }
}
