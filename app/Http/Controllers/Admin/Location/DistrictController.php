<?php

namespace App\Http\Controllers\Admin\Location;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Location\District;
use App\Models\Admin\Location\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('location')) {
            abort(403, 'You have no access this page.');
        };

        $districts = District::with('getDivision')->get();
        return view('admin.location.district.district', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('location')) {
            abort(403, 'You have no access this page.');
        };

        $divisions = Division::all();

        return view('admin.location.district.adddistrict', compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('location')) {
            abort(403, 'You have no access this page.');
        };
        $district = District::create([
            'name' => $request->name,
            'division_id' => $request->division_id,
        ]);

        // return back();
        Session::flash('create');
        return redirect()->route('district.index');
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
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('location')){
            abort(403, 'You have no access this page.');
        };
        $divisions = Division::all();
        // $divisions = Division::where('id', $id)->get()->first();
        $district = District::where('id', $id)->get()->first();
        return view('admin.location.district.edit', compact('divisions', 'district'));
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
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('location')){
            abort(403, 'You have no access this page.');
        };
        $gross = [
            'name' => $request->name,
            'division_id' => $request->division_id,
        ];

        // return back();
        $update = District::where('id', $id)->update($gross);
        Session::flash('update');
        return redirect()->route('district.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('location')){
            abort(403, 'You have no access this page.');
        };
        $delete = District::where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->route('district.index');
    }


    public function selectDistrict(Request $request)
    {
        if ($request->has('division_id')) {
            $district = District::where('division_id', $request->division_id)->get();
            return $district;
        };
    }
}
