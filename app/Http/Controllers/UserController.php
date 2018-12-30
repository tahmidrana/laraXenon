<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
    	//
    }

    public function index()
    {
    	$users = User::all();
    	return view('admin_console.users.users', ['users'=>$users]);
    }
}
