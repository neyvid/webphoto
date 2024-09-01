<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;
use App\Services\ChangeStatus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use PHPUnit\Framework\Constraint\FileExists;
use App\Repositories\UserRepository\UserRepository;
use App\Repositories\PhotoRepository\PhotoRepository;

class ImageController extends Controller
{
    protected $photoRepo;
    protected $userRepo;
    public function __construct()
    {
        $this->photoRepo = new PhotoRepository();
        $this->userRepo = new UserRepository();
    }
    //Show All Images Of Users
    public function show()
    {
        $images = $this->photoRepo->all();
        return view('admin.photos.index', compact('images'));
    }
    //Change Status Of 
    public function changeImageStatus($id)
    {
        ChangeStatus::changeStatus($id, $this->photoRepo);
    }
    //Edit Image Of User
    public function edit(Request $request)
    {
        $imageOfUser = $this->photoRepo->find($request->id);
        $imageOwner = $imageOfUser->user;
        $allUser = $this->userRepo->all();
        return view('admin.photos.update', compact('imageOfUser', 'imageOwner', 'allUser'));
    }
    //Update Image
    public function update(Request $request)
    {
        $this->photoRepo->update($request->id, [
            'user_id' => $request->imageOwnerId
        ]);
        return redirect()->route('users.images.show')->with('success', 'ویرایش با موفقیت ثبت شد');
    }
    //Form for Upload New Photo For user
    public function imageCreateForm()
    {
        $allUser = $this->userRepo->all();
        return view('admin.photos.create', compact('allUser'));
    }
    //Upload New Photo For user
    public function imageCreate(Request $request)
    {
      
        // $imageData = [
        //     'user_id' => $request->input('imageOwnerId'),
        // ];

        // $imageCreate = $this->photoRepo->create($imageData);
        
        foreach ($request->file('file') as $file) {
            $fileExtension = $file->getClientOriginalExtension();
            $fileSize = $file->getSize();
            $newNameGenerated = Carbon::now('Asia/Tehran')->format('Y-m-d') . '_' . Str::random(4);
            $newFileName = $newNameGenerated . '.' . $fileExtension;
            $imageSaved = $file->move('uploads/' . $request->input('imageOwnerId') . '/', $newFileName);
            Image::make($imageSaved)->resize(800, 800)->insert('uploads/images.png')->save($imageSaved);

            $this->photoRepo->create([
                'name' => $newFileName,
                'size' => $fileSize,
                'type' => $fileExtension,
                'user_id' => $request->input('imageOwnerId'),
                'status' => 'فعال',
            ]);
        };

        return redirect()->route('users.images.show')->with('success', 'کاربر با موفقیت ثبت شد');
    }
    //delete photo
    public function delete(Request $request){
        $imageOfUser=$this->photoRepo->find($request->id);
        if(file_exists(public_path().'/uploads/'.$imageOfUser->user_id.'/'.$imageOfUser->name)){
            unlink(public_path() . "/uploads/".$imageOfUser->user_id.'/' . $imageOfUser->name);
            $imageOfUser->delete();
            return back()->with('success','تصویر با موفقیت حذف شد');
        }else{
            return back()->with('warning','خطایی رخ داده است!');
        }

    }
    
    public function addtocart(Request $request){
   
        $cart =session()->get('cart', []);

        $specialKey=$request->printGenus.$request->photoSize.$request->printType.$request->photoId;
        if($request->printGenus=='shasi'){
            
            $specialKey=$request->printGenus.$request->photoSize.$request->printType.$request->photoId.$request->thickness;
        }
        if(!array_key_exists($specialKey,$cart)){
            $photoInstance=$this->photoRepo->find($request->photoId);
            $photo_link=asset('/uploads'.'/'.$photoInstance->user->id."/".$photoInstance->name);
            
            $cart[$specialKey]=[
                    'printGenus'=>$request->printGenus,
                    'photoSize'=>$request->photoSize,
                    'printType'=>$request->printType,
                    'quantity'=>$request->quantity,
                    'thickness'=>$request->thickness,
                    'photoId'=>$request->photoId,
                    'photo_link'=>$photo_link,
                    'price'=>$request->price,
            ];
        }else{
            $cart[$specialKey]['quantity']+=$request->quantity;
        }
           
           
        session()->put('cart',$cart);
        $cartCount=count(session()->get('cart'));
        return ['session'=>session()->get('cart'),'specialKey'=>$specialKey,'cartCount'=>$cartCount];

    



    }
}
