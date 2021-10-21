<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
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
        $deliverySystem = DeliverySystem::where('id', $id)->first();

        return view('admin.delivery.edit', compact('deliverySystem'));
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
        $delete = DeliverySystem::where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->route('deliverysystem.index');
    }
}
