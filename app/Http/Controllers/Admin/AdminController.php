<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.home.index');
    }
    public function userIndex(){
        return view('admin.home.user.index');
    }
}
