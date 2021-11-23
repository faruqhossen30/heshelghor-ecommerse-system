<?php

namespace App\Http\Controllers\Product;

use Illuminate\Support\Facades\Auth;
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
use Session;
use \Cviebrock\EloquentSluggable\Services\SlugService;

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
        $merchantId = Auth::guard('marchant')->user()->id;

        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $shops = Shop::where('author_id',$merchantId)->get();
        $colors = Color::all();
        $sizes = Size::all();

        return view('marchant.product.addproduct', compact('categories', 'subcategories', 'brands', 'shops', 'colors', 'sizes'));
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



            $validate = $request->validate([
                'title'             => 'required | max:255',
                'description'       => 'required | max:5000',
                'short_description' => 'required | max:1000',
                'category_id'       => 'required',
                'subcategory_id'    => 'required',
                'brand_id'          => 'required',
                'colors'            => 'required',
                'sizes'             => 'required',
                'shop_id'           => 'required',
                'upazila_id'        => 'required',
                'district_id'       => 'required',
                'division_id'       => 'required',
                'regular_price'     => 'required',
                'price'             => 'required',
                'photo'             => 'required',
            ]);


            $photo = $request->file('photo');

            if($request->file('photo')){
                $photofileExtention = $photo->getClientOriginalExtension();
                $photofileName = hexdec(uniqid()) . '.' . $photofileExtention;
                Image::make($photo)->save(public_path('uploads/product/') . $photofileName);

            };

            $images = [];
            $i = 0;
            $sliderimage = $request->file('image');

            if($sliderimage){
                foreach($request->file('image') as $image){

                    $fileExtention = $image->getClientOriginalExtension();
                    $fileName = hexdec(uniqid()) . '.' . $fileExtention;
                    Image::make($image)->save(public_path('uploads/products/') . $fileName);

                    $images[] = $fileName;
                    $i++;

                };
            }



        // return $request->all();

        $colors = $request->colors;
        $sizes = $request->sizes;

        $product = Product::create([
            'title'             => $request->title,
            'description'       => $request->description,
            'short_description' => $request->short_description,
            'slug'              => $slug = SlugService::createSlug(Product::class, 'slug', $request->title, ['unique' => true]),
            'category_id'       => $request->category_id,
            'subcategory_id'    => $request->subcategory_id,
            'brand_id'          => $request->brand_id,

            'author'            => 'merchant',
            'author_id'         => Auth::guard('marchant')->user()->id,
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
            'photo'             => $photofileName,
        ]);



        if($product){
            // Add Image
            if(!empty($images)){
                foreach($images as $image){
                    ProductImage::create([
                        'image' => $image,
                        'product_id' => $product->id,
                    ]);
                }
            };


            // Add Color
            if(!empty($colors)){
                foreach($colors as $color){
                    ProductColor::create([
                        'color_id' => $color,
                        'product_id' => $product->id,
                    ]);
                }
            };
            // Add Size
            if(!empty($sizes)){
                foreach($sizes as $size){
                    ProductSize::create([
                        'size_id' => $size,
                        'product_id' => $product->id,
                    ]);
                }
            };

        };





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
        $merchantId = Auth::guard('marchant')->user()->id;

        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $divisions = Division::all();
        $districts = District::all();
        $upazilas = Upazila::all();

        $shops = Shop::where('author_id', $merchantId)->get();
        $colors = Color::all();
        $sizes = Size::all();

        $images = ProductImage::where('product_id', $id)->get();
        $product = Product::where('id', $id)->get()->first();
        // return $product;
        return view('marchant.product.edit', compact('product', 'categories', 'subcategories', 'brands', 'images', 'shops', 'colors', 'sizes', 'divisions', 'districts', 'upazilas'));
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
