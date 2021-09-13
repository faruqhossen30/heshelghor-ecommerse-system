<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Brand;
use Illuminate\Support\Str;
use Image;

class BrandController extends Controller
{
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
        $validate = $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'image' => 'mimes:png,jpg,gif,bmp|max:1024',
        ]);


        $image = $request->file('image');
        $fileExtention = $image->getClientOriginalExtension();
        $fileName = date('Ymdhis') . '.' . $fileExtention;

        Image::make($image)->save(public_path('uploads/brand/') . $fileName);

        Brand::create([
            'name'        => $request->name,
            'description' => $request->description,
            'slug'        => Str::of($request->name)->slug('-'),
            'image'       => 'uploads/brand/' . $fileName,
        ]);

        return redirect()->route('brand.index');
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
        return $brand;
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
        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        $update = Brand::where('id', $id)->update($data);
        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $update = Brand::where('id', $id)->delete();
        return redirect()->route('brand.index');
    }
}
