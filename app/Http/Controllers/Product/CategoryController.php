<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Category;
use Illuminate\Support\Str;
use Image;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.addcategory');
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

            Image::make($image)->save(public_path('uploads/category/') . $fileName);

            Category::create([
                'name'        => $request->name,
                'description' => $request->description,
                'slug'        => Str::of($request->name)->slug('-'),
                'image'       => 'uploads/category/' . $fileName,
            ]);

            Session::flash('create');
            return redirect()->route('category.index');

        } else{
            $validate = $request->validate([
                'name'        => 'required',
                'description' => 'required',
            ]);
            Category::create([
                'name'        => $request->name,
                'description' => $request->description,
                'slug'        => Str::of($request->name)->slug('-'),
            ]);

            Session::flash('create');
            return redirect()->route('category.index');
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
        $category = Category::where('id', $id)->get()->first();
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('id', $id)->get()->first();
        return view('admin.category.edit', compact('category'));
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

            Image::make($image)->save(public_path('uploads/category/') . $fileName);

            $data = [
                'name'        => $request->name,
                'description' => $request->description,
                'image'       => 'uploads/category/' . $fileName,
            ];
            if(isset($old_image)){
                unlink($old_image);
            }
            $update = Category::where('id', $id)->update($data);
            Session::flash('update');
            return redirect()->route('category.index');

        } else{

            $validate = $request->validate([
                'name'        => 'required',
                'description' => 'required',
            ]);

            $data = [
                'name'        => $request->name,
                'description' => $request->description,
            ];

            $update = Category::where('id', $id)->update($data);
            Session::flash('update');
            return redirect()->route('category.index');
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
        $category = Category::where('id', $id)->get()->first();
        if(isset($category->image)){
            unlink($category->image);
        };
        $delete = Category::where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->route('category.index');
    }
}
