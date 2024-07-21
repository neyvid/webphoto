<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Faker\Core\File;
use App\Models\Photo;
use App\Mail\userCreated;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Response;
use Illuminate\Cache\FileStore;
use Faker\Factory as FakerFactory;
use Database\Factories\UserFactory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\File as HttpFile;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserCreateRequest;
use PHPUnit\Framework\Constraint\FileExists;
use App\Repositories\UserRepository\UserRepository;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Facades\File as FacadesFile;
use App\Repositories\PhotoRepository\PhotoRepository;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;


class UserController extends Controller
{
   
    protected $userRepo;
    protected $photoRepo;
    public function __construct()
    {
        $this->userRepo = new UserRepository();
        $this->photoRepo = new PhotoRepository();
    }
    public function show()
    {
        // $users = User::factory()->count(3)->create();
        $users = $this->userRepo->all();
        return view('admin.users.index', compact('users'));
    }
    public function delete(Request $request)
    {
       
        $user=$this->userRepo->find($request->id); 
        $userImages=$user->photos; 
   
        foreach ($userImages as $userImage ){
            
            if (file_exists(public_path() . "/uploads/".$user->id.'/' . $userImage->name)) {
                unlink(public_path() . "/uploads/".$user->id.'/' . $userImage->name);
            }
            $userImage->delete();
        };
        rmdir(public_path("uploads/".$user->id));
        $userDeleted = $this->userRepo->delete($request->id);
       if ($userDeleted) {
            return redirect()->back()->with('success', 'کاربر موردنظرباموفقیت حذف گردید');
        }
    }
    public function edit(Request $request)
    {
        $user = $this->userRepo->find($request->id);
        return view('admin.users.update', compact('user'));
    }
    public function update(Request $request)
    {
        $data = [
            'name' => $request->name,
            'lastname' => $request->lastname,
            'sex' => $request->sex,
            'address' => $request->address,
            'phone' => $request->phone
        ];
        return $request->hasFile('file');
        return $data;
        $this->userRepo->update($request->id, $data);
    }
    public function changeUserStatus($id)
    {
        $user = $this->userRepo->find($id);
        $userStatus = $user->status;
        if ($userStatus == 'فعال') {
            $this->userRepo->update($id, ['status' => 'غیرفعال']);
            return 'bg-danger';
        } else {
            $this->userRepo->update($id, ['status' => 'فعال']);
            return 'bg-danger';
        }
    }
    public function userCreatForm()
    {
        return view('admin.users.create');
    }
    public function userCreate(Request $request)
    {
        
        $checkISEmailExist = $this->userRepo->findBy(['email' => $request->input('email')]);
        $checkISMobileExist = $this->userRepo->findBy(['mobile' => $request->input('mobile')]);
        if ($checkISEmailExist || $checkISMobileExist) {
            return 'این ایمیل و یا شماره موبایل قبلا در سیستم ثبت نام کرده است';
        }
        $password = Str::random(8);
        $userData = [
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'national_code' => $request->input('national_code'),
            'mobile' => $request->input('mobile'),
            'sex' => $request->input('sex'),
            'status' => 'فعال',
            'password' => Hash::make($password),
            'wallet' => 0,
            'address' => $request->input('address'),
        ];

        $userCreated = $this->userRepo->create($userData);
    
        foreach ($request->file('file') as $file) {
            $fileExtension = $file->getClientOriginalExtension();
            $fileSize = $file->getSize();
            $newNameGenerated = Carbon::now('Asia/Tehran')->format('Y-m-d') . '_' . Str::random(40);
            $newFileName = $newNameGenerated . '.' . $fileExtension;
            $imageSaved=$file->move('uploads/'.$userCreated->id.'/', $newFileName);
            Image::make($imageSaved)->insert('uploads/FOOTER.jpg','center',0,0)->opacity(40)->save($imageSaved);

            $this->photoRepo->create([
                'name' => $newFileName,
                'size' => $fileSize,
                'type' => $fileExtension,
                'status' => 1,
                'user_id' => $userCreated->id,
            ]);
        };
        // if ($userCreated instanceof User) {
        //     Mail::to($userCreated->email)->send(new userCreated($userCreated, $password));
        //     //implement send SMS
        // }
        return redirect()->route('users.show')->with('success', 'کاربر با موفقیت ثبت شد');
    }
    public function removeImage(Request $request)
    {
        if (file_exists(public_path() . "/uploads/" . $request->input('fileName'))) {
            unlink(public_path() . "/uploads/" . $request->input('fileName'));
            return 'file deleted successfully';
        }
        return 'file not deleted ';
    }
}
