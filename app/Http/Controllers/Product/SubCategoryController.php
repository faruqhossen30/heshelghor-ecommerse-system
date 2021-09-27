<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product\Category;
use App\Models\Product\SubCategory;
use Image;
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
        return view('admin.subcategory.subcategory', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        // return $request->all();
        $image = $request->file('image');
        if($image){
        $validate = $request->validate([
            'name'        => 'required',
            'category_id' => 'required',
            'commission' => 'required',
            'description' => 'required',
            'image'       => 'mimes:png,jpg,gif,bmp|max:1024',
        ]);

        $fileExtention = $image->getClientOriginalExtension();
        $fileName = date('Ymdhis') . '.' . $fileExtention;

        Image::make($image)->save(public_path('uploads/subcategory/') . $fileName);

        $add = SubCategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'commission' => $request->commission,
            'description' => $request->description,
            'slug' => Str::of($request->name)->slug('-'),
            'image'       => 'uploads/subcategory/' . $fileName,
        ]);

        Session::flash('create');
        return redirect()->route('subcategory.index');

        } else{
            $validate = $request->validate([
                'name'        => 'required',
                'category_id' => 'required',
                'commission' => 'required',
                'description' => 'required',
            ]);
            $add = SubCategory::create([
                'name'        => $request->name,
                'category_id' => $request->category_id,
                'commission' => $request->commission,
                'description' => $request->description,
                'slug'        => Str::of($request->name)->slug('-'),
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
        $image = $request->file('image');
        if($image){
        $validate = $request->validate([
            'name'        => 'required',
            // 'category_id' => 'required',
            'commission' => 'required',
            'description' => 'required',
            'image'       => 'mimes:png,jpg,gif,bmp|max:1024',
        ]);

        $old_image = $request->old_image;

        $fileExtention = $image->getClientOriginalExtension();
        $fileName = date('Ymdhis') . '.' . $fileExtention;

        Image::make($image)->save(public_path('uploads/subcategory/') . $fileName);

        $data = [
            'name' => $request->name,
            // 'category_id' => $request->category_id,
            'commission' => $request->commission,
            'description' => $request->description,
            'image'       => 'uploads/subcategory/' . $fileName,
        ];

        if(isset($old_image)){
            unlink($old_image);
        }

        $update = SubCategory::where('id', $id)->update($data);
        Session::flash('update');
        return redirect()->route('subcategory.index');

        } else{
            $validate = $request->validate([
                'name'        => 'required',
                // 'category_id' => 'required',
                'commission' => 'required',
                'description' => 'required',
            ]);

            $data = [
                'name' => $request->name,
                // 'category_id' => $request->category_id,
                'commission' => $request->commission,
                'description' => $request->description,
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
