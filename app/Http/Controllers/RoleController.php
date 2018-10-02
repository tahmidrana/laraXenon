<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class RoleController extends Controller
{
    public function index() {
        $roles = DB::Table('roles')->get();
        return view('admin_console.role.role', ['roles'=>$roles]);
    }

    public function add_role() {
        $role_list = DB::table('roles')->get();
        return view('admin_console.role.add_role', ['role_list'=> $role_list]);
    }

    public function save_role(Request $request) {
        $validateData = $request->validate([
            'name'=> 'required|max:100',
            'slug'=> 'required|max:100',
            'permissions'=> 'max:150'
        ]);
        
        $role_data = [
            'name'=> $request->name,
            'slug'=> $request->slug,
            'permissions'=> $request->permissions ? $request->permissions : NULL
        ];

        if(DB::table('roles')->insert($role_data)) {
            return redirect('/role')->with('success', 'Role Saved Successfully');
        } else {
            return redirect('/role/add_role')->with('error', 'Role Save Failed');
        }
    }

    public function update_role($id) {
        return "role";
    }
}
