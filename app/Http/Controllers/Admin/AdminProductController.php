<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Attribute\Color;
use App\Models\Admin\Attribute\Size;
use App\Models\Admin\Location\District;
use App\Models\Admin\Location\Division;
use App\Models\Admin\Location\Upazila;
use App\Models\Merchant\Shop;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Product\Category;
use App\Models\Product\SubCategory;
use App\Models\Product\Brand;
use App\Models\Product\ProductColor;
use App\Models\Product\ProductSize;
use App\Models\Product\ProductImage;
use App\Models\Product\ProductImgFull;
use Illuminate\Support\Facades\Auth;

use Session;
use \Cviebrock\EloquentSluggable\Services\SlugService;

use Illuminate\Support\Str;
use Image;

class AdminProductController extends Controller
{
   public function productEdit($id)
   {
    // $merchantId = Auth::guard('marchant')->user()->id;


        $categories = Category::orderBy('name', 'asc')->get();
        $subcategories = SubCategory::orderBy('name', 'asc')->get();
        $brands = Brand::orderBy('name', 'asc')->get();
        $shops = Shop::get();
        $colors = Color::orderBy('name', 'asc')->get();
        $sizes = Size::orderBy('name', 'asc')->get();

        $divisions = Division::all();
        $districts = District::all();
        $upazilas = Upazila::all();



        $images = ProductImgFull::where('product_id', $id)->get();
        $product = Product::where('id', $id)->get()->first();

        $colorArray = ProductColor::where('product_id', $id)->select('color_id')->get()->toArray();
        $sizeArray = ProductSize::where('product_id', $id)->select('size_id')->get()->toArray();

    return view('admin.product.edit',compact('product', 'categories', 'subcategories', 'brands', 'shops', 'images',  'colors', 'sizes', 'divisions', 'districts', 'upazilas', 'colorArray', 'sizeArray'));
   }
   public function productUpdate(Request $request, $id)
   {
    // return $request->all();
    $product = Product::where('id', $id)->first();

    $colors = $request->colors;
    $sizes = $request->sizes;
    $fullsizeimages = $request->fullsizeimages;
    $slug = strtolower($request->title);

    $validate = $request->validate([
        'title'             => 'required | max:255',
        'description'       => 'required | max:15000',
        'short_description' => 'required | max:5000',
        'slug'              => SlugService::createSlug(Product::class, 'slug', $slug, ['unique' => true]),
        'category_id'       => 'required',
        'subcategory_id'    => 'required',
        // 'brand_id'          => 'required',
        'shop_id'           => 'required',
        'upazila_id'        => 'required',
        'district_id'       => 'required',
        'division_id'       => 'required',
        'regular_price'     => 'required',
        'price'             => 'required',
        'quantity'          => 'required',
        'quantity_alert'    => 'required',
        'img_full'          => 'required'
    ],[
        'img_full.required' => 'Please select product photo'
    ]);

        $data = [
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
            // 'puk_code'       => $request->title,
            'img_full'          => $request->img_full,
            'img_small'         => $request->img_small,
            'img_medium'        => $request->img_medium,
            'img_large'         => $request->img_large,
            'youtube_link'      => $request->youtube_link
        ];

        // return $request->all();
        // return $data;
        $update = Product::where('id', $id)->update($data);

        // Update Color
        if (!empty($colors)) {
            ProductColor::where('product_id', $id)->delete();
        };
        if (!empty($colors)) {
            foreach ($colors as $color) {
                ProductColor::create([
                    'color_id' => $color,
                    'product_id' => $product->id,
                ]);
            }
        };
        // Update Size
        if (!empty($sizes)) {
            ProductSize::where('product_id', $id)->delete();
        };
        if (!empty($sizes)) {
            foreach ($sizes as $size) {
                ProductSize::create([
                    'size_id' => $size,
                    'product_id' => $product->id,
                ]);
            }
        };
        // Update Slider Image

        if (!empty($fullsizeimages)) {
            ProductImgFull::where('product_id', $id)->delete();
            foreach ($fullsizeimages as $image) {
                ProductImgFull::create([
                    'url' => $image,
                    'product_id' => $product->id,
                ]);
            }
        };


        Session::flash('update');
        return redirect()->route('promotion.index');
   }
}
