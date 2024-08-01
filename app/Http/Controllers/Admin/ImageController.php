<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PhotoRepository\PhotoRepository;
use App\Repositories\UserRepository\UserRepository;
use App\Services\ChangeStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;

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
      
        $imageData = [
            'user_id' => $request->input('imageOwnerId'),
        ];

        $imageCreate = $this->photoRepo->create($imageData);
        
        foreach ($request->file('file') as $file) {
            $fileExtension = $file->getClientOriginalExtension();
            $fileSize = $file->getSize();
            $newNameGenerated = Carbon::now('Asia/Tehran')->format('Y-m-d') . '_' . Str::random(4);
            $newFileName = $newNameGenerated . '.' . $fileExtension;
            $imageSaved = $file->move('uploads/' . $request->input('imageOwnerId') . '/', $newFileName);
            Image::make($imageSaved)->resize(800, 800)->insert('uploads/images.png')->save($imageSaved);

            $imageCreate->update([
                'name' => $newFileName,
                'size' => $fileSize,
                'type' => $fileExtension,
                'status' => 'فعال',
            ]);
        };

        return redirect()->route('users.images.show')->with('success', 'کاربر با موفقیت ثبت شد');
    }
}
