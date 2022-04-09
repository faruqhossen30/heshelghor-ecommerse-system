<?php

namespace App\Http\Controllers\Admin\Courier;

use App\Http\Controllers\Controller;
use App\Models\Admin\Courier\Courier;
use App\Models\Admin\Courier\CourierHasDelivery;
use App\Models\Admin\Location\Division;
use App\Models\Admin\Location\Upazila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Prophecy\Promise\ReturnPromise;
use Illuminate\Support\Str;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $couriers = Courier::get();
        return view('admin.courier.couriers', compact('couriers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courier.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
        Courier::create([
            'name'                    => $request->name,
            'description'             => $request->description,
            'price'                   => $request->price,
            'slug'                    => Str::of($request->name)->slug('-'),
            'author_id'               => Auth::guard('admin')->user()->id,
            'dhaka_to_dhaka_price'    => $request->dhaka_to_dhaka_price,
            'all_place_price'         => $request->all_place_price,
            'dhaka_to_dhaka_per_kg'   => $request->dhaka_to_dhaka_per_kg,
            'dhaka_to_outside_per_kg' => $request->dhaka_to_outside_per_kg,
        ]);
        return redirect()->route('courier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courier = Courier::where('id', $id)->first();
        return view('admin.courier.show', compact('courier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courier = Courier::where('id', $id)->first();
        $divisions = Division::with('districts')->get();

        // $district = District::with('upazilas')->get();

        // return $courier;

        return view('admin.courier.edit', compact('courier', 'divisions'));
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
            'name' => 'required',
            'price' => 'required'
        ]);

        Courier::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Courier::where('id', $id)->delete();
        return redirect()->route('courier.index');
    }

}
