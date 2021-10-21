<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Image;
use Session;

class BrandsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('isMarchent');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.brand', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.addbrand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');

        if($image){
            $validate = $request->validate([
                'name'        => 'required',
                'description' => 'required',
                'image'       => 'mimes:png,jpg,gif,bmp|max:1024',
            ]);


            $fileExtention = $image->getClientOriginalExtension();
            $fileName = date('Ymdhis') . '.' . $fileExtention;

            Image::make($image)->save(public_path('uploads/brand/') . $fileName);

            Brand::create([
                'name'        => $request->name,
                'description' => $request->description,
                'slug'        => Str::of($request->name)->slug('-'),
                'image'       => 'uploads/brand/' . $fileName,
                'author'      => 'admin',
                'author_id'   => Auth::guard('admin')->user()->id,
            ]);

            Session::flash('create');
            return redirect()->route('brands.index');

        } else{
            $validate = $request->validate([
                'name'        => 'required',
                'description' => 'required',
            ]);
            Brand::create([
                'name'        => $request->name,
                'description' => $request->description,
                'slug'        => Str::of($request->name)->slug('-'),
                'author'      => 'admin',
                'author_id'   => Auth::guard('admin')->user()->id,
            ]);

            Session::flash('create');
            return redirect()->route('brands.index');

        };

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
        return view('admin.brand.show', compact('brand'));
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
        return view('admin.brand.edit', compact('brand'));
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
        $image = $request->file('image');
        if($image){
            $validate = $request->validate([
                'name'        => 'required',
                'description' => 'required',
                'image' => 'mimes:png,jpg,gif,bmp|max:1024',
            ]);

            $old_image = $request->old_image;

            $fileExtention = $image->getClientOriginalExtension();
            $fileName = date('Ymdhis') . '.' . $fileExtention;

            Image::make($image)->save(public_path('uploads/brand/') . $fileName);

            $data = [
                'name'        => $request->name,
                'description' => $request->description,
                'image'       => 'uploads/brand/' . $fileName,
            ];
            if(isset($old_image)){
                unlink($old_image);
            }
            $update = Brand::where('id', $id)->update($data);
            Session::flash('update');
            return redirect()->route('brands.index');
        } else{

            $validate = $request->validate([
                'name'        => 'required',
                'description' => 'required',
            ]);

            $data = [
                'name'        => $request->name,
                'description' => $request->description,
            ];

            $update = Brand::where('id', $id)->update($data);
            Session::flash('update');
            return redirect()->route('brands.index');
        }


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
        if(isset($brand->image)){
            unlink($brand->image);
        };
        $delete = Brand::where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->route('brands.index');
    }
}
