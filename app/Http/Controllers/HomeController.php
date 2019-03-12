<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct() 
    {
        session(['main_menu' => 'home']);
    }

    public function index()
    {
        session(['main_menu' => 'home', 'sub_menu' => '']);
    	/*$action = app("request")->route()->getAction();
    	$action_path = $action["controller"];
    	$controller_method = class_basename($action_path);
    	$controller_method = explode('@', $controller_method);
    	$controller = $controller_method[0];
    	$method = $controller_method[1];
    	
    	$controller_path = explode('@', $action_path)[0];

    	echo "<pre>";
    	print_r(get_class_methods($controller_path));*/
        return view('home.index');
    }

}
