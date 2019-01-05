<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Permission;
use App\Models\Menu;

class Role extends Model
{
	protected $table = 'roles';

    public function users()
    {
    	return $this->belongsToMany(User::class);
    }

    public function permissions()
    {
    	return $this->belongsToMany(Permission::class, 'permission_role');
    }

    public function menus()
    {
    	return $this->belongsToMany(Menu::class);
    }
}
