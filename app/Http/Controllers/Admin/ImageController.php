<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PhotoRepository\PhotoRepository;
use App\Repositories\UserRepository\UserRepository;
use App\Services\ChangeStatus;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    protected $photoRepo;
    protected $userRepo;
    public function __construct()
    {
        $this->photoRepo=new PhotoRepository();
        $this->userRepo=new UserRepository();
    }
    //Show All Images Of Users
    public function show(){
        $images=$this->photoRepo->all();
        return view('admin.photos.index',compact('images'));
    }
    //Change Status Of 
    public function changeImageStatus($id){
         ChangeStatus::changeStatus($id,$this->photoRepo);
    }
}
