<?php

namespace App\Http\Controllers\Admin\Location;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Location\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('location')){
            abort(403, 'You have no access this page.');
        };

        $divissions = Division::all();
        return view('admin.location.divission.divission', compact('divissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('location')){
            abort(403, 'You have no access this page.');
        };
        return view('admin.location.divission.adddivission');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('location')){
            abort(403, 'You have no access this page.');
        };
        $divission = Division::create([
            'name' => $request->name,
            'division_id' => $request->division_id,
        ]);

        // return back();
        return redirect()->route('divission.index');
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
