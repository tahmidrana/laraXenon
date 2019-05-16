<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function sub_menus()
    {
    	return $this->hasMany('App\Models\Menu', 'parent_menu');
    }

    public function roles()
    {
    	return $this->belongsToMany('App\Models\Role');
    }
}
