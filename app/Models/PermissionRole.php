<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    use HasFactory;
    protected $table = "permission_role";
    // protected $fillable = [
    //     'id_role',
    //     'id_permission',
    //     'isAllowed'
    // ];

    public function permissionrole_permission()
    {
        return $this->hasMany('App\Models\Permission', 'id', 'id_permission');
    }
    public function permissionrole_role()
    {
        return $this->hasMany('App\Models\Role', 'id', 'id_role');
    }
}
