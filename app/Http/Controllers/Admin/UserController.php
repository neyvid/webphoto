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
    public function edit(){
        return view('admin.users.update');
    }
}
