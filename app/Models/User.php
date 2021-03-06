<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Permissions\HasPermissionTrait;

class User extends Authenticatable
{
	use Notifiable, HasApiTokens, HasPermissionTrait;
	
	protected $fillable = [
        'first_name', 'last_name', 'email', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
    	return $this->hasRole('admin');
    }

    public function getFullName() {
        return isset($this->first_name) ? $this->first_name.' '.$this->last_name : $this->username;
    }

    public function findForPassport($username) {
        return $this->where('username', $username)->first();
    }

}
