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
}

