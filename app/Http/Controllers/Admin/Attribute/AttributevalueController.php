<?php

namespace App\Http\Controllers\Admin\Attribute;

use App\Http\Controllers\Controller;
use App\Models\Admin\Attribute\Attribute;
use App\Models\Admin\Attribute\AttributeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttributevalueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $attribute = Attribute::with('values')->firstWhere('id', $id);
        return view('admin.attribute-value.create', compact('attribute'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return Auth::guard('admin')->user()->id;
        $request->validate([
            'attribute_id' => 'required',
            'value' => 'required',
        ]);

        AttributeValue::create([
            'attribute_id'=> $request->attribute_id,
            'value'=> $request->value,
            'author_id'=> Auth::guard('admin')->user()->id
        ]);

        return redirect()->back();


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
        $value = AttributeValue::firstWhere('id', $id);
        // return $value;

        return view('admin.attribute-value.edit', compact('value'));


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
            'value' => 'required'
        ]);

        AttributeValue::firstWhere('id', $id)->update([
            'value' => $request->value,
            'edit_author_id' => Auth::guard('admin')->user()->id
        ]);

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $value = AttributeValue::firstWhere('id', $id);
        $value->delete();

        return redirect()->back();
    }
}
