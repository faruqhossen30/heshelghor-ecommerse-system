<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;
use Session;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('isMarchent');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('marchant.brand.brand', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marchant.brand.addbrand');
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


        $validate = $request->validate([
            'name'        => 'required|unique:brands',
            'description' => 'required'
        ]);

        Brand::create([
            'name'        => $request->name,
            'description' => $request->description,
            'slug'        => Str::of($request->name)->slug('-'),
            'author'      => 'merchant',
            'author_id'   => Auth::guard('marchant')->user()->id,
            'img_full'    => $request->img_full,
            'img_small'   => $request->img_small,
            'img_medium'  => $request->img_medium,
            'img_large'   => $request->img_large
        ]);
        Session::flash('create');
        return redirect()->route('myaddedbrand');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::where('id', $id)->get()->first();
        return view('marchant.brand.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::where('id', $id)->get()->first();
        return view('marchant.brand.edit', compact('brand'));
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

        // return $request->all();

        $validate = $request->validate([
            'name'        => 'required',
            'description' => 'required',
        ]);

        $data = [
            'name'        => $request->name,
            'description' => $request->description,
            'img_full'    => $request->img_full,
            'img_small'   => $request->img_small,
            'img_medium'  => $request->img_medium,
            'img_large'   => $request->img_large
        ];

        $update = Brand::where('id', $id)->update($data);
        Session::flash('update');
        return redirect()->route('myaddedbrand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::where('id', $id)->get()->first();
        if (isset($brand->image)) {
            unlink($brand->image);
        };
        $delete = Brand::where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->route('brand.index');
    }
}
