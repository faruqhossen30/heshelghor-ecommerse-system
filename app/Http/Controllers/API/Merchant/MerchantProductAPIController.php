<?php

namespace App\Http\Controllers\API\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\Product\ProductColor;
use App\Models\Product\ProductImage;
use App\Models\Product\ProductImgFull;
use App\Models\Product\ProductSize;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Image;

class MerchantProductAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $merchantId = $request->user()->id;
        $products = Product::with('brand', 'category', 'subCategory', 'images', 'colors', 'sizes')->where('author_id', $merchantId)->get();
        if (count($products) == 0) {
            return response()->json([
                'success' => true,
                'code'    => 200,
                'message' => 'No brands found'
            ]);
        }
        if (!empty($products)) {
            return response()->json([
                'success' => true,
                'code'    => 200,
                'data'    => $products
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

        $validate = $request->validate([
            'title'             => 'required | max:255',
            'description'       => 'required | max:5000',
            'short_description' => 'required | max:1000',
            'category_id'       => 'required',
            'subcategory_id'    => 'required',
            'brand_id'          => 'required',
            'shop_id'           => 'required',
            'upazila_id'        => 'required',
            'district_id'       => 'required',
            'division_id'       => 'required',
            'regular_price'     => 'required',
            'price'             => 'required',
            'quantity'          => 'required',
            'quantity_alert'    => 'required'
        ]);



        $product = Product::create([
            'title'             => $request->title,
            'description'       => $request->description,
            'short_description' => $request->short_description,
            'slug'              => $slug = SlugService::createSlug(Product::class, 'slug', $request->title, ['unique' => true]),
            'category_id'       => $request->category_id,
            'subcategory_id'    => $request->subcategory_id,
            'brand_id'          => $request->brand_id,
            'author'            => 'merchant',
            'author_id'         => $merchantId,
            'shop_id'           => $request->shop_id,
            'division_id'       => $request->division_id,
            'district_id'       => $request->district_id,
            'upazila_id'        => $request->upazila_id,
            'regular_price'     => $request->regular_price,
            'discount'          => $request->discount,
            // 'offer_price'    => $request->offer_price,
            'price'             => $request->price,
            'quantity'          => $request->quantity,
            'quantity_alert'    => $request->quantity_alert,
            // 'puk_code'       => $request->title,
            'img_full'          => $request->img_full,
            'img_small'         => $request->img_small,
            'img_medium'        => $request->img_medium,
            'img_large'         => $request->img_large
        ]);



        if ($product) {
            // Add Image
            if (!empty($images)) {
                foreach ($images as $image) {
                    ProductImage::create([
                        'image' => $image,
                        'product_id' => $product->id,
                    ]);
                }
            };


            // Add Color
            if (!empty($colors)) {
                foreach ($colors as $color) {
                    ProductColor::create([
                        'color_id' => $color,
                        'product_id' => $product->id,
                    ]);
                }
            };
            // Add Size
            if (!empty($sizes)) {
                foreach ($colors as $size) {
                    ProductSize::create([
                        'size_id' => $size,
                        'product_id' => $product->id,
                    ]);
                }
            };
        };

        return response()->json([
            'success' => true,
            'code'    => 201,
            'message' => 'Product create successfully!',
            'data'    => $product
        ]);
    }
    public function productColor(Request $request)
    {
        $merchantId = $request->user()->id;

        $color = ProductColor::create([
            'product_id' => $request->product_id,
            'color_id' => $request->color_id
        ]);

        $result = ProductColor::where('product_id', $request->product_id,)->get();

        return response()->json([
            'success' => true,
            'code'    => 201,
            'message' => 'Product color insert successfully!',
            'data'    => $result
        ]);
    }
    public function productSize(Request $request)
    {
        $merchantId = $request->user()->id;

        $color = ProductSize::create([
            'product_id' => $request->product_id,
            'size_id' => $request->size_id
        ]);

        $result = ProductSize::where('product_id', $request->product_id,)->get();

        return response()->json([
            'success' => true,
            'code'    => 201,
            'message' => 'Product size insert successfully!',
            'data'    => $result
        ]);
    }
    public function productImage(Request $request)
    {
        $merchantId = $request->user()->id;


        $result = ProductImgFull::where('product_id', $request->product_id,)->get();

        return response()->json([
            'success' => true,
            'code'    => 201,
            'message' => 'Product Slider image insert successfully!',
            'data'    => $result
        ]);
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
        $product = Product::with('brand', 'category', 'subCategory','images', 'colors', 'sizes')
            ->where('author_id', $merchantId)
            ->where('id', $id)
            ->first();

        return response()->json([
            'success' => true,
            'code'    => 200,
            'data'    => $product
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
        // return 'Product update function';
        $merchantId = $request->user()->id;

        $validate = $request->validate([
            'title'             => 'required | max:255',
            'description'       => 'required | max:5000',
            'short_description' => 'required | max:1000',
            'category_id'       => 'required',
            'subcategory_id'    => 'required',
            'brand_id'          => 'required',
            'shop_id'           => 'required',
            'upazila_id'        => 'required',
            'district_id'       => 'required',
            'division_id'       => 'required',
            'regular_price'     => 'required',
            'price'             => 'required',
        ]);


        $photo = $request->file('photo');

        if ($request->file('photo')) {
            $photofileExtention = $photo->getClientOriginalExtension();
            $photofileName = hexdec(uniqid()) . '.' . $photofileExtention;
            Image::make($photo)->save(public_path('uploads/product/') . $photofileName);

            $product = Product::where('author_id', $merchantId)->where('id', $id)->first();

            if($product->photo){
                unlink('uploads/product/'.$product->photo);
            }

            $update = Product::where('author_id', $merchantId)->where('id', $id)->update([
                'title'             => $request->title,
                'description'       => $request->description,
                'short_description' => $request->short_description,
                'category_id'       => $request->category_id,
                'subcategory_id'    => $request->subcategory_id,
                'brand_id'          => $request->brand_id,
                'shop_id'           => $request->shop_id,
                'division_id'       => $request->division_id,
                'district_id'       => $request->district_id,
                'upazila_id'        => $request->upazila_id,
                'regular_price'     => $request->regular_price,
                'discount'          => $request->discount,
                'price'             => $request->price,
                'quantity'          => $request->quantity,
                'quantity_alert'    => $request->quantity_alert,
                'photo'             => $photofileName,
            ]);

            return response()->json([
                'success' => true,
                'code'    => 200,
                'message' => 'Product Update successfull!',
            ]);


        }else{
            $update = Product::where('author_id', $merchantId)->where('id', $id)->update([
                'title'             => $request->title,
                'description'       => $request->description,
                'short_description' => $request->short_description,
                'category_id'       => $request->category_id,
                'subcategory_id'    => $request->subcategory_id,
                'brand_id'          => $request->brand_id,
                'shop_id'           => $request->shop_id,
                'division_id'       => $request->division_id,
                'district_id'       => $request->district_id,
                'upazila_id'        => $request->upazila_id,
                'regular_price'     => $request->regular_price,
                'discount'          => $request->discount,
                'price'             => $request->price,
                'quantity'          => $request->quantity,
                'quantity_alert'    => $request->quantity_alert
            ]);
        };

        return response()->json([
            'success' => true,
            'code'    => 200,
            'message' => 'Product Update successfull!',
        ]);


    }
    // Product Color Update
    public function productColorUpdate(Request $request, $id)
    {
        $validate = $request->validate([
            'product_id' => 'required',
            'color_id' => 'required',
        ]);
        $colors = ProductColor::where('product_id', $id)->get();
        // return $colors;
        if(!empty($colors)){
            ProductColor::where('product_id', $id)->delete();
            ProductColor::create([
                'product_id' => $request->product_id,
                'color_id' => $request->color_id
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
        $delete = Product::where('author_id', $merchantId)
            ->where('id', $id)
            ->delete();

        if ($delete) {
            return response()->json([
                'success' => true,
                'code'    => 200,
                'message'    => "Delete Successfull !",
            ]);
        } else {
            return response()->json([
                'message'    => "Opps! Something wrong !",
            ]);
        }
    }
}
