<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Admin\Attribute\Color;
use App\Models\Admin\Attribute\Size;
use App\Models\Admin\Shop\Shop;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Product\Category;
use App\Models\Product\SubCategory;
use App\Models\Product\Brand;
use Illuminate\Support\Facades\Auth;
use Session;

use Illuminate\Support\Str;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userID = Auth::guard('marchant')->user()->id;
        $products = Product::with('brand', 'category', 'subCategory')->where('author_id', $userID)->get();

        return view('marchant.product.product', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $shops = Shop::all();
        $colors = Color::all();
        $sizes = Size::all();

        return view('marchant.product.create', compact('categories', 'subcategories', 'brands', 'shops', 'colors', 'sizes'));
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

        $images = [];
        if($request->hasFile('image')){
            $i = 0;
            foreach($request->file('image') as $image){

                $fileExtention = $image->getClientOriginalExtension();
                $fileName = hexdec(uniqid()) . '.' . $fileExtention;
                Image::make($image)->save(public_path('uploads/products/') . $fileName);

                $images[] = $fileName;
                $i++;

            };
        }

        $product = [
            'title'             => $request->title,
            'description'       => $request->description,
            'short_description' => $request->short_description,
            'slug'              => Str::of($request->title)->slug('-'),
            'category_id'       => $request->category_id,
            'subcategory_id'    => $request->subcategory_id,
            'brand_id'          => $request->brand_id,
            'colors'            => json_encode($request->colors),
            'sizes'             => json_encode($request->sizes),
            'author'            => 'merchant',
            'author_id'         => Auth::guard('marchant')->user()->id,
            'shop_id'           => $request->shop_id,
            'regular_price'     => $request->regular_price,
            'sale_price'        => $request->sale_price,
            // 'offer_price'       => $request->offer_price,
            'price'             => $request->price,
            'quantity'          => $request->quantity,
            'quantity_alert'    => $request->quantity_alert,
            // 'puk_code'       => $request->title,
            'image'             => json_encode($images),
        ];

        // return $request->all();

        $insert = Product::create($product);
        Session::flash('create');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->get()->first();
        return view('marchant.product.show', compact('product'));
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
        $subcategories = SubCategory::all();
        $brands = Brand::all();

        $product = Product::where('id', $id)->get()->first();
        return view('marchant.product.edit', compact('product', 'categories', 'subcategories', 'brands'));
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

        $images = [];
        if($request->hasFile('image')){
            $i = 0;
            foreach($request->file('image') as $image){
                $old_image = $request->old_image;
                if(isset($old_image)){
                    unlink($old_image);
                }
                $fileExtention = $image->getClientOriginalExtension();
                $fileName = hexdec(uniqid()) . '.' . $fileExtention;
                Image::make($image)->save(public_path('uploads/products/') . $fileName);

                $images[] = $fileName;
                $i++;

            };
        }

        $product = [
            'title'             => $request->title,
            'description'       => $request->description,
            'short_description' => $request->short_description,
            'slug'              => Str::of($request->title)->slug('-'),
            'category_id'       => $request->catagory_id,
            'subcatagory_id'    => $request->subcatagory_id,
            'brand_id'          => $request->brand_id,
            // 'marchant_id'    => $request->title,
            // 'vendor_id'      => $request->title,
            'buy_price'         => $request->buy_price,
            'regular_price'     => $request->regular_price,
            'sale_price'        => $request->sell_price,
            'quantity'          => $request->quantity,
            // 'puk_code'       => $request->title,
            'image'             => json_encode($images),
        ];

        // return $request->all();
        $update = Product::where('id', $id)->update($product);
        Session::flash('update');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->get()->first();

        $delete = Product::where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->route('product.index');
    }
}
