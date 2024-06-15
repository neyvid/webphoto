<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\UserRepository\UserRespository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $UserRepository;
    public function __construct()
    {
        $this->UserRepository=new UserRespository;
    }
}
