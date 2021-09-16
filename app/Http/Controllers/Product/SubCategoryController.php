<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product\Category;
use App\Models\Product\SubCategory;
use Session;


class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = SubCategory::all();
        // return $subcategories;
        return view('marchant.subcategory.subcategory', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('marchant.subcategory.addsubcategory', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'        => 'required',
            'category_id' => 'required',
        ]);

        $add = SubCategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'slug' => Str::of($request->name)->slug('-'),
        ]);

        Session::flash('create');
        return redirect()->route('subcategory.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subcategory = SubCategory::where('id', $id)->get()->first();
        return view('marchant.subcategory.show', compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $subcatagory = SubCategory::where('id', $id)->get()->first();

        return view('marchant.subcategory.edit', compact('categories', 'subcatagory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name'        => 'required',
            'category_id' => 'required',
        ]);

        $update = SubCategory::where('id', $id)->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        Session::flash('update');
        return redirect()->route('subcategory.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = SubCategory::where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->route('subcategory.index');
    }
}
