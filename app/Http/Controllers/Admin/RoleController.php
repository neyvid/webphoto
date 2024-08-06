<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index(){
        $permissions=Role::all();
            return view('admin.role.index',compact('roles'));
    }
    public function create(){   
        return view('admin.role.create');


    }
    public function store(Request $request){   
        $request->validate(
            ['roleName'=>'required'],
            ['roleName'=>'string'],
            ['roleName.required'=>'این فیلد اجباریست'],
            ['roleName.string'=>'مجوز باید رشته باشد '],
            ['unique:roles,name'],
        );
       Role::create([
            'name'=>$request->permissionName
       ]);
       return redirect('panel/role')->with('success','مجوز مورد نیاز با موفقیت ثبت شد.');
    }
    public function edit(Request $request){
        return $request->role;
    }
    public function update(){

    }

    public function destroy(){

    }}
