<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product\Category;
use App\Models\Product\SubCategory;
use Image;
use Session;
use Cviebrock\EloquentSluggable\Services\SlugService;


class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (is_null(Auth::guard('admin')->user()) || !(Auth::guard('admin')->user()->can('subcategory.view') || Auth::guard('admin')->user()->can('subcategory.edit'))) {
            abort(403, 'You have no access this page.');
        };

        $subcategories = SubCategory::all();
        // return $subcategories;
        return view('admin.subcategory.subcategory', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('subcategory.create')) {
            abort(403, 'You have no access this page.');
        };
        $categories = Category::all();
        return view('admin.subcategory.addsubcategory', compact('categories'));
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
        if (is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('subcategory.create')) {
            abort(403, 'You have no access this page.');
        };

        if ($request->hasFile('photo')) {

            $name = $request->photo->getClientOriginalName();
            $request->photo->storeAs('subcategory', $name, 'public');

            $add = SubCategory::create([
                'name'        => $request->name,
                'category_id' => $request->category_id,
                'commission'  => $request->commission,
                'description' => $request->description,
                'slug'        => SlugService::createSlug(SubCategory::class, 'slug', $request->name, ['unique' => true]),
                'author_id' => Auth::guard('admin')->user()->id,
                'photo' => $name,
            ]);

            Session::flash('create');
            return redirect()->route('subcategory.index');
        } else {
            $validate = $request->validate([
                'name'        => 'required | unique:sub_categories',
                'category_id' => 'required',
                'commission' => 'required',
                'description' => 'required',
            ]);
            $add = SubCategory::create([
                'name'        => $request->name,
                'category_id' => $request->category_id,
                'commission' => $request->commission,
                'description' => $request->description,
                'slug'        => SlugService::createSlug(SubCategory::class, 'slug', $request->name, ['unique' => true]),
                'author_id ' => Auth::guard('admin')->user()->id,
            ]);

            Session::flash('create');
            return redirect()->route('subcategory.index');
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
        if (is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('subcategory.view')) {
            abort(403, 'You have no access this page.');
        };
        $subcategory = SubCategory::where('id', $id)->get()->first();
        return view('admin.subcategory.show', compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('subcategory.edit')) {
            abort(403, 'You have no access this page.');
        };
        $categories = Category::all();
        $subcatagory = SubCategory::where('id', $id)->get()->first();

        return view('admin.subcategory.edit', compact('categories', 'subcatagory'));
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
        if (is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('subcategory.edit')) {
            abort(403, 'You have no access this page.');
        };
        // $image = $request->file('image');
        // if ($image) {
        //     $validate = $request->validate([
        //         'name'        => 'required',
        //         'category_id' => 'required',
        //         'commission' => 'required',
        //         'description' => 'required',
        //         'image'       => 'mimes:png,jpg,gif,bmp|max:10240',
        //     ]);

        //     $old_image = $request->old_image;

        //     $fileExtention = $image->getClientOriginalExtension();
        //     $fileName = date('Ymdhis') . '.' . $fileExtention;

        //     Image::make($image)->save(public_path('uploads/subcategory/') . $fileName);
        if ($request->hasFile('photo')) {

            $name = $request->photo->getClientOriginalName();
            $request->photo->storeAs('subcategory', $name, 'public');

            $data = [
                'name' => $request->name,
                'category_id' => $request->category_id,
                'commission' => $request->commission,
                'description' => $request->description,
                // 'image'       => 'uploads/subcategory/' . $fileName,
                'update_author_id' => Auth::guard('admin')->user()->id,
                'photo' => $name,
            ];

            if (isset($old_image)) {
                unlink($old_image);
            }

            $update = SubCategory::where('id', $id)->update($data);
            Session::flash('update');
            return redirect()->route('subcategory.index');
        } else {
            $validate = $request->validate([
                'name'        => 'required',
                'category_id' => 'required',
                'commission' => 'required',
                'description' => 'required',
            ]);

            $data = [
                'name' => $request->name,
                'category_id' => $request->category_id,
                'commission' => $request->commission,
                'description' => $request->description,
                'update_author_id' => Auth::guard('admin')->user()->id,
            ];

            $update = SubCategory::where('id', $id)->update($data);
            Session::flash('update');
            return redirect()->route('subcategory.index');
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('subcategory.delete')) {
            abort(403, 'You have no access this page.');
        };
        $delete = SubCategory::where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->route('subcategory.index');
    }

    // For api
    public function getSubcategoryById(Request $request)
    {
        $allsubcategory = SubCategory::where('category_id', $request->category_id)->get();
        return $allsubcategory;
    }
}
