<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }
    public function create()
    {
        return view('admin.role.create');
    }
    public function store(Request $request)
    {

        $request->validate(
            ['roleName' => 'required|string'],
            ['roleName.required' => 'این فیلد اجباریست'],
            ['roleName.string' => 'مجوز باید رشته باشد '],
            ['unique:roles,name'],
        );
        Role::create([
            'name' => $request->roleName
        ]);
        return redirect()->back()->with('success', 'نقش مورد نیاز با موفقیت ثبت شد.');
    }
    public function edit(Request $request)
    {
        $role = Role::findById($request->role);
        return view('admin.role.edit', compact('role'));
    }
    public function update(Request $request)
    {
        $request->validate(
            ['roleName' => 'required'],
            ['roleName.required' => 'نام نقش الزامی می باشد'],
        );
        $role = Role::findById($request->role);
        $role->update([
            'name' => $request->roleName
        ]);
        return redirect()->route('roles.index')->with('success', 'نقش مورد نظر با موفقیت ویرایش شد');
    }

    public function destroy(Request $request)
    {
        $role = Role::find($request->roleId);
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'نقش مورد نظر با موفقیت حذف شد');
    }
    public function addPermissionToRole(Request $request)
    {
        $permissions=Permission::all();
        $role=Role::find($request->roleId);
        return view('admin.role.add-permission',compact('role','permissions'));
    }
    public function givePermissionToRole(Request $request){
        $request->validate(
            ['permission'=>'required'],
            ['permission.required'=>'باید حداقل یک محوز انتخاب کنید'],
        );
        $role=Role::find($request->roleId);
        $role->syncPermissions($request->permission);
        return redirect()->route('roles.index')->with('success','مجوز مورد نظر برای این نقش ثبت شد');
    }
}
