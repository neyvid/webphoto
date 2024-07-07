<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\UserRepository\UserRepository;
use Database\Factories\UserFactory;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $userRepo;
    public function __construct()
    {
        $this->userRepo = new UserRepository();
    }
    public function show()
    {
        // $users = User::factory()->count(3)->create();
        $users = $this->userRepo->all();
        return view('admin.users.index', compact('users'));
    }
    public function delete(Request $request)
    {
        $userDeleted = $this->userRepo->delete($request->id);
        if ($userDeleted) {
            return redirect()->back()->with('success', 'کاربر موردنظرباموفقیت حذف گردید');
        }
    }
    public function edit(Request $request){
        $user=$this->userRepo->find($request->id);
        return view('admin.users.update',compact('user'));
    }
    public function update(Request $request){
        $data=[
            'name'=>$request->name,
            'lastname'=>$request->lastname,
            'sex'=>$request->sex,
            'address'=>$request->address,
            'phone'=>$request->phone
        ];
        return $request->hasFile('file');
        return $data;
        $this->userRepo->update($request->id,$data);
    }
    public function changeUserStatus($id){
        $user=$this->userRepo->find($id);
        $userStatus=$user->status;
        if($userStatus=='فعال'){
            $this->userRepo->update($id,['status'=>'غیرفعال']);   
            return 'bg-danger';

        }else{
            $this->userRepo->update($id,['status'=>'فعال']);   
            return 'bg-danger';
        }
    }
    public function userCreatForm(){
        return view('admin.users.create');
    }
    public function userCreate(Request $request){
        $checkISEmailExist=$this->userRepo->findBy(['email'=>$request->input('email')]);
        $checkISMobileExist=$this->userRepo->findBy(['mobile'=>$request->input('mobile')]);
        if($checkISEmailExist || $checkISMobileExist){
            return 'این ایمیل و یا موبایل در سیستم موجودهست';
        }
        $userData=[            
            'name'=>$request->input('name'),
            'lastname'=>$request->input('lastname'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'mobile'=>$request->input('mobile'),
            'sex'=>$request->input('sex'),
            'status'=>'فعال',
            'password'=>123, //change it in product
            'wallet'=>0,
            'address'=>$request->input('address'),
        ];
       $userCreated=$this->userRepo->create($userData);

       return redirect()->route('users.show');
    }
}

