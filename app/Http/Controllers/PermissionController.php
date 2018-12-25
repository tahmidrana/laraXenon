<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('admin_console.permission.permission', ['permissions'=>$permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_console.permission.add_permission');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataValidate = $request->validate([
            'slug' => 'required|min:3',
        ]);

        $perm = new Permission;
        $perm->slug = $request->slug;
        $perm->description = $request->description;

        if($perm->save()) {
            return redirect('/permission')->with('success', 'Permission Saved Successfully');
        } else {
            return redirect('/permission/create')->with('error', 'Permission Save Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('admin_console.permission.update_permission', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataValidate = $request->validate([
            'slug' => 'required|min:3',
        ]);

        $data = [
            'slug' => $request->slug,
            'description' => $request->description
        ];

        if(Permission::where('id', $id)->update($data)) {
            return redirect('/permission')->with('success', 'Permission Updated Successfully');
        } else {
            return redirect("/permission/{$id}/edit")->with('error', 'Permission Save Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perm = Permission::find($id);
        if($perm->delete()) {
            return redirect('/permission')->with('success', 'Permission Deleted Successfully');
        } else {
            return redirect("/permission")->with('error', 'Permission Delete Failed');
        }
    }
}
