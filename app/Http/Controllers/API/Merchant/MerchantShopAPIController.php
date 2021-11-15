<?php

namespace App\Http\Controllers\API\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merchant\Shop;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Image;
class MerchantShopAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $merchantId = $request->user()->id;

        $shops = Shop::where('author_id', $merchantId)->get();
        if (count($shops) == 0) {
            return response()->json([
                'success' => true,
                'code'    => 200,
                'message' => 'No brands found'
            ]);
        }
        if (!empty($shops)) {
            return response()->json([
                'success' => true,
                'code'    => 200,
                'data'    => $shops
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
        //
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
        if ($image) {
            $validate = $request->validate([
                'name'        => 'required',
                'address'     => 'required',
                'image'       => 'mimes:png,jpg,gif,bmp|max:1024',
            ]);


            $fileExtention = $image->getClientOriginalExtension();
            $fileName = date('Ymdhis') . '.' . $fileExtention;

            $photo = Image::make($image)->save(public_path('uploads/shop/') . $fileName);

            $shop = Shop::create([
                'name'          => $request->name,
                'address'       => $request->address,
                'description'   => $request->description,
                'slug'          => SlugService::createSlug(Shop::class, 'slug', $request->name, ['unique' => true]),
                'trade_license' => $request->trade_license,
                'market_id'     => $request->market_id,
                'division_id'   => $request->division_id,
                'district_id'   => $request->district_id,
                'upazila_id'    => $request->upazila_id,
                'image'         => 'uploads/shop/' . $fileName,
                'author'        => 'merchant',
                'author_id'     => $merchantId
            ]);

            return response()->json([
                'success' => true,
                'code'    => 201,
                'message' => 'Shop create successfully !',
                'data'    => $shop
            ]);

        } else {
            $validate = $request->validate([
                'name'        => 'required',
                'address'     => 'required',
                'division_id' => 'required',
                'district_id' => 'required',
                'upazila_id'  => 'required',
            ]);
            $shop = Shop::create([
                'name'          => $request->name,
                'address'       => $request->address,
                'description'   => $request->description,
                'slug'          => SlugService::createSlug(Shop::class, 'slug', $request->name, ['unique' => true]),
                'trade_license' => $request->trade_license,
                'market_id'     => $request->market_id,
                'division_id'   => $request->division_id,
                'district_id'   => $request->district_id,
                'upazila_id'    => $request->upazila_id,
                'author'        => 'merchant',
                'author_id'     => $merchantId
            ]);

            return response()->json([
                'success' => true,
                'code'    => 201,
                'message' => 'Shop create successfully !',
                'data'    => $shop
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
        $shop = Shop::where('author_id', $merchantId)->where('id', $id)->first();

        return response()->json([
            'success' => true,
            'code'    => 200,
            'data'    => $shop
        ]);
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
        $shop = Shop::where('author_id', $merchantId)->where('id', $id)->first();
        $image = $request->file('image');

        if ($image) {
            $validate = $request->validate([
                'name'        => 'required',
                'address'     => 'required',
                'division_id' => 'required',
                'district_id' => 'required',
                'upazila_id'  => 'required',
                'image'       => 'mimes:png,jpg,gif,bmp|max:1024',
            ]);

            $fileExtention = $image->getClientOriginalExtension();
            $fileName = date('Ymdhis') . '.' . $fileExtention;

            $photo = Image::make($image)->save(public_path('uploads/shop/') . $fileName);

            $data = [
                'name'          => $request->name,
                'address'       => $request->address,
                'description'   => $request->description,
                'slug'          => SlugService::createSlug(Shop::class, 'slug', $request->name, ['unique' => true]),
                'trade_license' => $request->trade_license,
                'market_id'     => $request->market_id,
                'division_id'   => $request->division_id,
                'district_id'   => $request->district_id,
                'upazila_id'    => $request->upazila_id,
                'image'         => 'uploads/shop/' . $fileName,
                'author'        => 'merchant',
                'author_id'     => $merchantId
            ];

            $update = Shop::where('author_id', $merchantId)->where('id', $id)->update($data);
            if(isset($shop->image)){
                unlink($shop->image);
            }

            return response()->json([
                'success' => true,
                'code'    => 200,
                'message' => 'Update successfully !',
            ]);

        } else {
            $validate = $request->validate([
                'name'        => 'required',
                'address'     => 'required',
                'division_id' => 'required',
                'district_id' => 'required',
                'upazila_id'  => 'required',
            ]);
            $data = [
                'name'          => $request->name,
                'address'       => $request->address,
                'description'   => $request->description,
                'slug'          => SlugService::createSlug(Shop::class, 'slug', $request->name, ['unique' => true]),
                'trade_license' => $request->trade_license,
                'market_id'     => $request->market_id,
                'division_id'   => $request->division_id,
                'district_id'   => $request->district_id,
                'upazila_id'    => $request->upazila_id,
                'author'        => 'merchant',
                'author_id'     => $merchantId
            ];
            $update = Shop::where('author_id', $merchantId)->where('id', $id)->update($data);

            return response()->json([
                'success' => true,
                'code'    => 200,
                'message' => 'Update successfully !',
            ]);
        };
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
        $shop = Shop::where('author_id', $merchantId)->where('id', $id)->first();
        if(isset($shop->image)){
            unlink($shop->image);
        }
        $delete = Shop::where('author_id', $merchantId)->where('id', $id)->delete();

        return response()->json([
            'success' => true,
            'code'    => 200,
            'message'    => "Delete Successfull !",
        ]);

    }
}
