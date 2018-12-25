<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Role;


class RoleController extends Controller
{
    public function index() {
        $roles = DB::Table('roles')->where('slug', '!=', 'super_admin')->get();
        return view('admin_console.role.role', ['roles'=>$roles]);
    }

    public function add_role() {
        $role_list = DB::table('roles')->get();
        return view('admin_console.role.add_role', ['role_list'=> $role_list]);
    }

    public function save_role(Request $request) {
        $validateData = $request->validate([
            'name'=> 'required|unique:roles|max:100',
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
        $role = DB::table('roles')->where('id', $id)->first();
        return view('admin_console.role.update_role', ['role'=> $role]);
    }

    public function save_updated_role(Request $request, $id)
    {
        $validateData = $request->validate([
            'name'=> 'required|max:100',
            'slug'=> 'required|max:100',
            'permissions'=> 'max:150'
        ]);


        if(DB::table('roles')->where('id', $id)->update($validateData)) {
            return redirect('/role')->with('success', 'Role Updated Successfully');
        } else {
            return redirect('/role/update_role/'.$id)->with('error', 'Role Update Failed');
        }
    }

    public function delete_role($id)
    {
        if(DB::table('roles')->where('id', $id)->delete()) {
            return redirect('/role')->with('success', 'Role Deleted Successfully');
        } else {
            return redirect('/role')->with('error', 'Role Delete Failed');
        }
    }

    public function role_config($id)
    {
        /*$menu_list = DB::table('menus AS a')
                    ->leftJoin('menu_role AS b', function($lJoin) use ($id){
                        $lJoin->on('a.id', '=', 'b.menu_id')
                            ->where('b.role_id', '=', $id);
                    })
                    ->select('a.*, b.role_id')
                    ->get();*/
        $menu_list = DB::select("SELECT a.*, b.role_id FROM menus a LEFT JOIN menu_role b ON a.id=b.menu_id AND b.role_id=?", [$id]);
        $perm_list = DB::select("SELECT a.*, b.role_id FROM permissions a LEFT JOIN permission_role b ON a.id=b.permission_id AND b.role_id=?", [$id]);
        $data = [
            'role_data' => Role::findOrFail($id),
            'menu_list' => $menu_list,
            'perm_list' => $perm_list
        ];
        return view('admin_console.role.role_config', $data);
    }

    public function update_role_menu(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $del = DB::table('menu_role')->where('role_id', $id)->delete();

            $menus = $request->group_menu_list;

            if($menus) {
                foreach ($menus as $menu) {
                    $ins = DB::table('menu_role')->insert([
                        'menu_id' => $menu,
                        'role_id' => $id
                    ]);
                }
            }
        });
        return redirect("/role/{$id}/config")->with('success', 'Saved Successfully');
    }

    public function update_role_permission(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $del = DB::table('permission_role')->where('role_id', $id)->delete();

            $perms = $request->group_permission_list;

            if($perms) {
                foreach ($perms as $perm) {
                    $ins = DB::table('permission_role')->insert([
                        'permission_id' => $perm,
                        'role_id' => $id
                    ]);
                }
            }
        });
        return redirect("/role/{$id}/config")->with('success', 'Saved Successfully');
    }
}
