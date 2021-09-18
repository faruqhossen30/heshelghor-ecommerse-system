<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Product\Category;
use App\Models\Product\SubCategory;
use App\Models\Product\Brand;

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
        $products = Product::all();


        // return $products;

        return view('marchant.product.product', compact('products'));
        // return view('marchant.product.show');

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

        return view('marchant.product.create', compact('categories', 'subcategories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


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

        $insert = Product::create($product);

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
        // $product = Product::where('id', $id)->get()->first();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
