<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product\Category;
use Illuminate\Support\Str;
use Image;
use Session;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(is_null(Auth::guard('admin')->user()) || !(Auth::guard('admin')->user()->can('category.view') || Auth::guard('admin')->user()->can('category.edit') )   ){
            abort(403, 'You have no access this page.');
        };
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
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('category.create')){
            abort(403, 'You have no access this page.');
        };
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
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('category.create')){
            abort(403, 'You have no access this page.');
        };
        $image = $request->file('image');

        if($image){
            $validate = $request->validate([
                'name'        => 'required | unique:categories',
                'description' => 'required',
                'image'       => 'mimes:png,jpg,gif,bmp|max:10240',
            ]);


            $fileExtention = $image->getClientOriginalExtension();
            $fileName = date('Ymdhis') . '.' . $fileExtention;

            Image::make($image)->save(public_path('uploads/category/') . $fileName);

            Category::create([
                'name'        => $request->name,
                'description' => $request->description,
                'slug'        => SlugService::createSlug(Category::class, 'slug', $request->name, ['unique' => true]),
                'image'       => 'uploads/category/' . $fileName,
            ]);

            Session::flash('create');
            return redirect()->route('category.index');

        } else{
            $validate = $request->validate([
                'name'        => 'required | unique:categories',
                'description' => 'required',
            ]);
            Category::create([
                'name'        => $request->name,
                'description' => $request->description,
                'slug'        => SlugService::createSlug(Category::class, 'slug', $request->name, ['unique' => true]),
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
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('category.view')){
            abort(403, 'You have no access this page.');
        };
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
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('category.edit')){
            abort(403, 'You have no access this page.');
        };
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
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('category.edit')){
            abort(403, 'You have no access this page.');
        };
        $image = $request->file('image');
        if($image){
            $validate = $request->validate([
                'name'        => 'required | unique:categories',
                'description' => 'required',
                'image' => 'mimes:png,jpg,gif,bmp|max:10240',
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
            // if(isset($old_image)){
            //     unlink($old_image);
            // }
            $update = Category::where('id', $id)->update($data);
            Session::flash('update');
            return redirect()->route('category.index');

        } else{

            $validate = $request->validate([
                'name'        => 'required | unique:categories',
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
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('category.delete')){
            abort(403, 'You have no access this page.');
        };
        $category = Category::where('id', $id)->get()->first();
        if(isset($category->image)){
            unlink($category->image);
        };
        $delete = Category::where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->route('category.index');
    }
}
