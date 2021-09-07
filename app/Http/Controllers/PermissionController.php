<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function getList()
    {
        $permission = Permission::all();
        return view('admin/permission/list', ['permission' => $permission]);
    }

    public function getAdd()
    {
        return view('admin/permission/add');
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,

            [
                'name' => 'required|min:3|max:100|unique:permission,name',
            ],
            [
                'name.required' => 'You have not entered a name',
                'name.min' => 'permission names must be 3 to 100 characters long',
                'name.unique' => 'permission name already exists',
                'name.max' => 'permission names must be 3 to 100 characters long',
            ]);

        $permission = new Permission;
        $permission->name = $request->name;
        $permission->save();

        return redirect('admin/permission/add')->with('messenger', 'success');

    }

    public function getEdit($id)
    {
        $permission = Permission::find($id);
        return view('admin/permission/edit', ['permission' => $permission]);
    }

 

    public function postEdit(Request $request,$id)
    { 
      

        $this->validate($request,
            [
                'name' => 'required|unique:permission,name|min:3|max:100',
            ],
            [
                'name.required' => 'You have not entered a name',
                'name.unique' => 'permission name already exists',
                'name.min' => 'permission names must be 3 to 100 characters long',
                'name.max' => 'permission names must be 3 to 100 characters long',
            ]);

        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->save();

        return redirect('admin/permission/edit/' . $permission->id)->with('messenger', 'edit success');

    }

    public function getDelete($id)
    {
        $permission = Permission::find($id);
        $permission->delete();

        return redirect('admin/permission/list')->with('messenger', 'delete success');

    }

}
