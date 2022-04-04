<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Admin\Location\District;
use App\Models\Admin\Location\Division;
use Illuminate\Http\Request;
use App\Models\Admin\Order\DeliverySystem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Session;

class DeliverySystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('payment')){
            abort(403, 'You have no access this page.');
        };

        $deliverySystems = DeliverySystem::all();
        // return $deliverySystems;
        return view('admin.delivery.deliverysystems', compact('deliverySystems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('payment')){
            abort(403, 'You have no access this page.');
        };
        return view('admin.delivery.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('payment')){
            abort(403, 'You have no access this page.');
        };
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
        DeliverySystem::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'slug'        => Str::of($request->name)->slug('-'),
            'author_id'   => Auth::guard('admin')->user()->id,
        ]);
        Session::flash('create');
        return redirect()->route('deliverysystem.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('payment')){
            abort(403, 'You have no access this page.');
        };
        $deliverySystem = DeliverySystem::where('id', $id)->first();
        return view('admin.delivery.show', compact('deliverySystem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('payment')){
            abort(403, 'You have no access this page.');
        };
        $deliverySystem = DeliverySystem::where('id', $id)->first();
        $divisions = Division::with('districts')->get();

        // $district = District::with('upazilas')->get();

        // return $district;

        return view('admin.delivery.edit', compact('deliverySystem', 'divisions'));
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
        // $deliverySystem = DeliverySystem::where('id', $id)->first();
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('payment')){
            abort(403, 'You have no access this page.');
        };
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        DeliverySystem::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);
        Session::flash('update');
        return redirect()->route('deliverysystem.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('payment')){
            abort(403, 'You have no access this page.');
        };
        $delete = DeliverySystem::where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->route('deliverysystem.index');
    }
}
