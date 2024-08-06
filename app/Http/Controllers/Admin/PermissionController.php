<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index(){
        $permissions=Permission::all();
            return view('admin.permission.index',compact('permissions'));
    }
    public function create(){   
        return view('admin.permission.create');


    }
    public function store(Request $request){   
        $request->validate(
            ['permissionName'=>'required'],
            ['permissionName'=>'string'],
            ['permissionName.required'=>'این فیلد اجباریست'],
            ['permissionName.string'=>'مجوز باید رشته باشد '],
            ['unique:permissions,name'],
        );
       Permission::create([
            'name'=>$request->permissionName
       ]);
       return redirect('panel/permissions')->with('success','مجوز مورد نیاز با موفقیت ثبت شد.');
    }
    public function edit(Request $request,Permission $permission){
       
        return view('admin.permission.edit',compact('permission'));
    }
    public function update(Request $request , Permission $permission){
    
        $request->validate(
            ['permissionName'=>'required'],
            ['permissionName.required'=>'نام مجوز الزامی می باشد'],
        );
        $permission->update([
            'name'=>$request->permissionName
        ]);
        return redirect()->route('permissions.index')->with('success','مجوز مورد نظر با موفقیت ویرایش شد');
    }

    public function destroy(){

    }


}
