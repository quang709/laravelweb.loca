<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table ="role";
    public function role_permissionrole()
    {
    	return $this->belongsTo('App\Models\PermissionRole','id','id_role');
    }

    public function role_user()
    {
        return $this->hasMany('App\Models\User','id_role','id');
    }
}
