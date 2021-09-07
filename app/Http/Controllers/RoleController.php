<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function getList()
    {
        $role = Role::all();
        return view('admin/role/list', ['role' => $role]);
    }

    public function getAdd()
    {

        return view('admin/role/add');
    }

    public function postAdd(Request $request)
    {

        $this->validate($request,
            ['name' => 'required|min:3|max:100|unique:role,name']
            ,
            [
                'name.required' => 'You have not entered a name',
                'name.min' => 'role names must be 3 to 100 characters long',
                'name.unique' => 'role name already exists',
                'name.max' => 'role names must be 3 to 100 characters long',
            ]);

        $role = new Role;
        $role->name = $request->name;
        $role->save();

        return redirect('admin/role/add')->with('messenger', 'success');

    }
    public function getEdit($id)
    {

        $permissions = Permission::all();

        $role = Role::find($id);

      
        $permission_of_role = Permission::query()
            ->join('permission_role', 'permission.id', 'permission_role.id_permission')
            ->join('role', 'role.id', 'permission_role.id_role')
            ->where('id_role', $role->id)
            ->select('permission.*', 'permission_role.*')
            ->pluck('id_permission')->toArray() // cái này anh lấy những permision nào thuộc role đó. có nghĩa là
        // có tồn tại trong bảng PR là checked. còn ko hiện là unchecked./
     
        ; 
 

        return view('admin/role/edit', ['role' => $role, 'permissions' => $permissions, 'permision_of_role' => $permission_of_role]);
    }

    public function postEdit(Request $request, $id)
    {
        // update thì ko so sanh name vs role hiện tại nhá.
        $this->validate($request,
            [
                'name' => 'required|min:3|max:100',
            ],
            [
                'name.required' => 'You have not entered a name',
                // 'name.unique' => 'role name already exists',
                'name.min' => 'role names must be 3 to 100 characters long',
                'name.max' => 'role names must be 3 to 100 characters long',
            ]);

        $role = Role::find($id);
        // xóa hết permisison troong role
        PermissionRole::whereIdRole($role->id)->delete();
        $permissions = $request->permission;
        foreach ($permissions as $value) {
            PermissionRole::insert([
                'id_role' => $role->id,
                'id_permission' => $value,
                'isAllowed' => 1, // cái này do db ko thể null nên insert đại vào cho ko lỗi db
            ]);
        }

        return redirect('admin/role/edit/' . $role->id)->with('messenger', 'edit success');

    }

    public function getDelete($id)
    {
        $role = Role::find($id);
        $role->delete();

        return redirect('admin/role/list')->with('messenger', 'delete success');

    }
}
