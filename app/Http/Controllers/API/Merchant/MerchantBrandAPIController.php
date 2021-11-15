<?php

namespace App\Http\Controllers\API\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Product\Brand;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class MerchantBrandAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $merchantId = $request->user()->id;
        $data = Brand::where('author', 'merchant')->where('author_id', $merchantId)->get();
        if(count($data) == 0){
            return response()->json([
                'success' => true,
                'code'    => 200,
                'message' => 'No brands found'
            ]);
        }
        if(!empty($data)){
            return response()->json([
                'success' => true,
                'code'    => 200,
                'data'    => $data
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json([
            'success' => true,
            'code'    => 200,
            'message' => 'welcome'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $merchantId = $request->user()->id;
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

            $brand = Brand::create([
                'name'        => $request->name,
                'description' => $request->description,
                'slug'        => SlugService::createSlug(Brand::class, 'slug', $request->name, ['unique' => true]),
                'image'       => 'uploads/brand/' . $fileName,
                'author'      => 'merchant',
                'author_id'   => $merchantId
            ]);

            return response()->json([
                'success' => true,
                'code'    => 201,
                'message' => 'Brand has been created successfully !',
                'data' =>$brand
            ]);

        } else{
            $validate = $request->validate([
                'name'        => 'required',
                'description' => 'required',
            ]);
            $brand = Brand::create([
                'name'        => $request->name,
                'description' => $request->description,
                'slug'        => SlugService::createSlug(Brand::class, 'slug', $request->name, ['unique' => true]),
                'author'      => 'merchant',
                'author_id'   => $merchantId
            ]);

            return response()->json([
                'success' => true,
                'code'    => 201,
                'message' => 'Brand has been created successfully !',
                'data' =>$brand
            ]);

        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $merchantId = $request->user()->id;
        $data = Brand::where('author', 'merchant')->where('author_id', $merchantId)->where('id', $id)->first();
        if(!empty($data)){
            return response()->json([
                'success' => true,
                'code'    => 200,
                'data'    => $data
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $merchantId = $request->user()->id;

        $image = $request->file('image');
        if($image){
            $validate = $request->validate([
                'name'        => 'required',
                'description' => 'required',
                'image' => 'mimes:png,jpg,gif,bmp|max:1024',
            ]);

            $brand = Brand::where('author', 'merchant')->where('author_id', $merchantId)->where('id', $id)->first();
            $old_image = $brand->image;

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
            $update = Brand::where('author', 'merchant')->where('author_id', $merchantId)->where('id', $id)->update($data);
            return response()->json([
                'success' => true,
                'code'    => 200,
                'message'    => "Update Successfull !",
            ]);
        } else{

            $validate = $request->validate([
                'name'        => 'required',
                'description' => 'required',
            ]);
            $data = [
                'name'        => $request->name,
                'description' => $request->description,
            ];
            $update = Brand::where('author', 'merchant')->where('author_id', $merchantId)->where('id', $id)->update($data);
            return response()->json([
                'success' => true,
                'code'    => 200,
                'message'    => "Update Successfull !",
            ]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $merchantId = $request->user()->id;
        $brand = Brand::where('author', 'merchant')->where('author_id', $merchantId)->where('id', $id)->first();

        if(isset($brand->image)){
            unlink($brand->image);
        };
        $delete = Brand::where('author', 'merchant')->where('author_id', $merchantId)->where('id', $id)->delete();

        return response()->json([
            'success' => true,
            'code'    => 200,
            'message'    => "Delete Successfull !",
        ]);
    }
}
