<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Auth\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('role.view')){
            abort(403, 'You have no access this page.');
        };

        $roles = Role::get();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('role.create')){
            abort(403, 'You have no access this page.');
        };
        $permissions = Permission::all();
        $permission_groups = Admin::getpermissionGroups();

        return view('admin.roles.create', compact('permissions', 'permission_groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('role.create')){
            abort(403, 'You have no access this page.');
        };
        $request->validate([
            'name' => 'required |unique:roles'
        ],[
            'name.required' => 'Please give a Role name.',
            'unique' => 'This Role already taken.',
        ]);


        $role = Role::create(['name' => $request->name, 'guard_name' => 'admin']);
        $permissions = $request->permissions;

        if(!empty($permissions)){
            $role->syncPermissions($permissions);
        };

        Session::flash('create');
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('role.view')){
            abort(403, 'You have no access this page.');
        };
        return "ok";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('role.update')){
            abort(403, 'You have no access this page.');
        };
        $role = Role::findById($id, 'admin');
        $permissions = Permission::all();
        $permission_groups = Admin::getpermissionGroups();

        return view('admin.roles.edit', compact('role', 'permissions', 'permission_groups'));
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
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('role.update')){
            abort(403, 'You have no access this page.');
        };
        $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Please give a Role name.'
        ]);


        $role = Role::findById($id, 'admin');
        $permissions = $request->permissions;

        if(!empty($permissions)){
            $role->name = $request->name;
            $role->save();
            $role->syncPermissions($permissions);
        };

        Session::flash('update');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('role.delete')){
            abort(403, 'You have no access this page.');
        };
        $role = Role::findById($id,'admin');
        if (!is_null($role)) {
            $role->delete();
        }

        Session::flash('delete');
        return redirect()->route('roles.index');
    }
}
