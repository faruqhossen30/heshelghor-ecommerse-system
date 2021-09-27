<?php

namespace App\Http\Controllers\Admin\Location;

use App\Http\Controllers\Controller;
use App\Models\Admin\Location\Division;
use App\Models\Admin\Location\Upazila;
use App\Models\Admin\Location\District;
use Illuminate\Http\Request;
use Session;

class UpazilaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upazilas = Upazila::all();
        return view('admin.location.upazila.upazila', compact('upazilas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::all();

        return view('admin.location.upazila.addupazila', compact('divisions'));
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
            'division_id' => 'required',
            'district_id' => 'required',
            'name' => 'required',
        ]);

        $create = Upazila::create([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'name' => $request->name,
        ]);

        Session::flash('create');
        return redirect()->route('upazila.index');
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
        $divisions = Division::all();
        $districts = District::all();
        $upazila = Upazila::where('id', $id)->get()->first();
        return view('admin.location.upazila.edit', compact('divisions', 'districts', 'upazila'));
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
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'name' => 'required',
        ]);

        $pros = [
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'name' => $request->name,
        ];

        $update = Upazila::where('id', $id)->update($pros);
        Session::flash('update');
        return redirect()->route('upazila.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Upazila::where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->route('upazila.index');
    }
}
