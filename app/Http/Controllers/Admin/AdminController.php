<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Auth\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Session;

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('admin.view')){
            abort(403, 'You have no access this page.');
        };
        $admins = Admin::get();
        return view('admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('admin.create')){
            abort(403, 'You have no access this page.');
        };
        $roles = Role::all();

        return view('admin.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:admins',
            'password' => 'required|min:2|confirmed',
        ]);

        // Create New Admin
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();

        if ($request->roles) {
            $admin->assignRole($request->roles);
        }

        Session::flash('create');
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('admin.view')){
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
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('admin.edit')){
            abort(403, 'You have no access this page.');
        };
        $admin = Admin::where('id', $id)->get()->first();
        $roles = Role::all();

        return view('admin.edit', compact('admin', 'roles'));
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
        $admin = Admin::find($id);

        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:admins,email,' . $id,
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;

        $admin->save();

        $admin->roles()->detach();
        if ($request->roles) {
            $admin->assignRole($request->roles);
        }

        Session::flash('update');
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('admin.delete')){
            abort(403, 'You have no access this page.');
        };
        $admin = Admin::where('id', $id)->get()->first();

        if (!is_null($admin)) {
            $admin->delete();
        }

        Session::flash('delete');
        return back();
    }
}
