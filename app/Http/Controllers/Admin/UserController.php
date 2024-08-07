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
use App\Services\ChangeStatus;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    protected $userRepo;
    protected $photoRepo;
    public function __construct()
    {
        $this->userRepo = new UserRepository();
        $this->photoRepo = new PhotoRepository();

        // yani permission create faghat baraye method edit lahaz beshe ,yani agar permission create nadare method edit ra
        // nemitone  bebine
        $this->middleware('permission:create', ['only' => ['userCreate', 'userCreatForm']]);
        $this->middleware('permission:view', ['only' => 'show']);
        $this->middleware('permission:update', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete', ['only' => ['delete']]);
    }
    public function show()
    {
        // $users = User::factory()->count(3)->create();
        $users = $this->userRepo->all();
        return view('admin.users.index', compact('users'));
    }
    public function delete(Request $request)
    {

        $user = $this->userRepo->find($request->id);
        $userImages = $user->photos;

        foreach ($userImages as $userImage) {

            if (file_exists(public_path() . "/uploads/" . $user->id . '/' . $userImage->name)) {
                unlink(public_path() . "/uploads/" . $user->id . '/' . $userImage->name);
            }
            $userImage->delete();
        };
        rmdir(public_path("uploads/" . $user->id));
        $userDeleted = $this->userRepo->delete($request->id);
        if ($userDeleted) {
            return redirect()->back()->with('success', 'کاربر موردنظرباموفقیت حذف گردید');
        }
    }
    public function edit(Request $request)
    {
        $user = $this->userRepo->find($request->id);
        $roles = Role::all();
        return view('admin.users.update', compact('user', 'roles'));
    }
    public function update(Request $request)
    {



        $data = [
            'name' => $request->name,
            'lastname' => $request->lastname,
            'sex' => $request->sex,
            'address' => $request->address,
            'phone' => $request->phone,
        ];

        if (!empty($request->input('password'))) {
            $password = $request->input('password');
            $data['password'] = Hash::make($password);
        }

        $this->userRepo->update($request->id, $data);
        $currentUser = $this->userRepo->find($request->id);
        $currentUser->syncRoles($request->roles);
        return redirect()->route('users.show');
    }
    public function changeUserStatus($id)
    {
        ChangeStatus::changeStatus($id, $this->userRepo);
    }
    public function userCreatForm()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }
    public function userCreate(Request $request)
    {

        $checkISEmailExist = $this->userRepo->findBy(['email' => $request->input('email')]);
        $checkISMobileExist = $this->userRepo->findBy(['mobile' => $request->input('mobile')]);
        if ($checkISEmailExist || $checkISMobileExist) {
            return 'این ایمیل و یا شماره موبایل قبلا در سیستم ثبت نام کرده است';
        }
        if (empty($request->input('password'))) {
            $password = Str::random(8);
        } else {
            $password = $request->input('password');
        }
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

        $userCreated->syncRoles($request->roles);

        foreach ($request->file('file') as $file) {
            $fileExtension = $file->getClientOriginalExtension();
            $fileSize = $file->getSize();
            $newNameGenerated = Carbon::now('Asia/Tehran')->format('Y-m-d') . '_' . Str::random(4);
            $newFileName = $newNameGenerated . '.' . $fileExtension;
            $imageSaved = $file->move('uploads/' . $userCreated->id . '/', $newFileName);
            Image::make($imageSaved)->resize(800, 800)->insert('uploads/images.png')->save($imageSaved);

            $this->photoRepo->create([
                'name' => $newFileName,
                'size' => $fileSize,
                'type' => $fileExtension,
                'status' => 1,
                'user_id' => $userCreated->id,
            ]);
        };
        if ($userCreated instanceof User) {
            Mail::to($userCreated->email)->send(new userCreated($userCreated, $password));
            //implement send SMS
        }
        return redirect()->route('users.show')->with('success', 'کاربر با موفقیت ثبت شد');
    }
    public function removeImage(Request $request)
    {
        $imageId = $request->input('imageId');
        $imageName = $this->photoRepo->find($imageId);
        if (file_exists(public_path() . "/uploads/" . $imageName->user_id . '/' . $imageName->name)) {
            unlink(public_path() . "/uploads/" . $imageName->user_id . '/' . $imageName->name);
            $this->photoRepo->delete($imageId);
        }
        return 'file not deleted ';
    }
    public function logOut()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
