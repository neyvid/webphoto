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
    //Edit Image Of User
    public function edit(Request $request){
        $imageOfUser=$this->photoRepo->find($request->id);
        $imageOwner=$imageOfUser->user;
        $allUser=$this->userRepo->all();
        return view('admin.photos.update',compact('imageOfUser','imageOwner','allUser'));
    }
    //Update Image
    public function update(Request $request){
            $this->photoRepo->update($request->id,[
                'user_id'=>$request->imageOwnerId
            ]);
            return redirect()->route('users.images.show')->with('success','ویرایش با موفقیت ثبت شد');
    }
}
