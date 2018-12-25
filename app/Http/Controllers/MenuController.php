<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;
use Exception;

class MenuController extends Controller
{
    public function index()
    {
        $menu_list = DB::table('menus AS a')
                        ->leftJoin('menus AS b', 'a.parent_menu', '=', 'b.id')
                        ->select('a.*', 'b.title AS parent_menu_title')
                        ->get();
        return view('admin_console.menu.menu', ['menu_list'=> $menu_list]);
    }

    public function add_menu()
    {
        $menu_list = DB::table('menus')->get();
        return view('admin_console.menu.add_menu', ['menu_list'=> $menu_list]);
    }

    public function save_menu(Request $request)
    {
        $validateData = $request->validate([
            'title'=> 'required|max:100',
            'menu_order'=> 'numeric',
            'description'=> 'max:150'
        ]);

        $menu = new Menu;
        $menu->title = $request->title;
        $menu->menu_url = $request->menu_url ? $request->menu_url : NULL;
        $menu->parent_menu = $request->parent_menu ? $request->parent_menu : NULL;
        $menu->menu_order = $request->menu_order ? $request->menu_order : 1;
        $menu->description = $request->description ? $request->description : NULL;

        if($menu->save()) {
            return redirect('/menu')->with('success', 'Menu Saved Successfully');
        } else {
            return redirect('/menu/add_menu')->with('error', 'Menu Save Failed');
        }
    }

    public function delete_menu($id)
    {
        $menu = Menu::find($id);

        try{
            $menu->delete();
            return redirect('/menu')->with('success', 'Successfully deleted');
        } catch (Exception $e) {
            return redirect('/menu')->with('error', 'Delete Failed');
        }
    }

    public function update_menu($id)
    {
        $menu_list = DB::table('menus')->get();
        $menu_data = Menu::find($id);
        return view('admin_console.menu.update_menu', ['menu_list'=> $menu_list, 'menu_data'=>$menu_data]);
    }

    public function save_updated_menu(Request $request, $id)
    {
        $validateData = $request->validate([
            'title'=> 'required|max:100',
            'menu_order'=> 'numeric',
            'description'=> 'max:150'
        ]);

        $menu = new Menu;
        $menu->title = $request->title;
        $menu->menu_url = $request->menu_url ? $request->menu_url : NULL;
        $menu->parent_menu = $request->parent_menu ? $request->parent_menu : NULL;
        $menu->menu_order = $request->menu_order ? $request->menu_order : 1;
        $menu->description = $request->description ? $request->description : NULL;

        if(Menu::where('id', $id)->update($validateData)) {
            return redirect('/menu')->with('success', 'Menu updated Successfully');
        } else {
            return redirect('/menu/update_menu/'.$id)->with('error', 'Menu update Failed');
        }
    }
}
