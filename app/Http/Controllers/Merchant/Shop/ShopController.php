<?php

namespace App\Http\Controllers\Merchant\Shop;

use App\Http\Controllers\Controller;
use App\Models\Admin\Location\Division;
use App\Models\Admin\Market;
use Illuminate\Http\Request;
// use App\Models\Admin\Shop\Shop;
use App\Models\Merchant\Shop;
use App\Models\Product\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use Exception;
use Image;
use Session;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userID = Auth::guard('marchant')->user()->id;
        $shops = Shop::where('author_id', $userID)->orderBy('id', 'desc')->get();
        // return $shops;
        return view('marchant.shop.shop', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $markets = Market::get();
        $divisions = Division::all();
        // return $markets;
        return view('marchant.shop.addshop', compact('divisions', 'markets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('image');
        // return $request->all();
        $image = $request->file('image');
        if ($image) {
            $validate = $request->validate([
                'name'        => 'required',
                'image'       => 'mimes:png,jpg,gif,bmp|max:1024',
            ]);


            $fileExtention = $image->getClientOriginalExtension();
            $fileName = date('Ymdhis') . '.' . $fileExtention;

            $photo = Image::make($image)->save(public_path('uploads/shop/') . $fileName);
            // dd($fileName);

            Shop::create([
                'name'          => $request->name,
                'address'       => $request->address,
                'mobile'        => $request->mobile,
                'description'   => $request->description,
                'slug'          => SlugService::createSlug(Shop::class, 'slug', $request->name, ['unique' => true]),
                'trade_license' => $request->trade_license,
                'market_id'     => $request->market_id,
                'division_id'   => $request->division_id,
                'district_id'   => $request->district_id,
                'upazila_id'    => $request->upazila_id,
                'image'         => $fileName,
                'author'        => 'merchant',
                'author_id'     => Auth::guard('marchant')->user()->id,
            ]);

            Session::flash('create');
            return redirect()->route('shop.index');
        } else {
            $validate = $request->validate([
                'name'        => 'required',
                'address'     => 'required',
                'division_id' => 'required',
                'district_id' => 'required',
                'upazila_id'  => 'required',
            ]);
            $marchantname = 'merchant';
            Shop::create([
                'name'          => $request->name,
                'address'       => $request->address,
                'mobile'        => $request->mobile,
                'description'   => $request->description,
                'slug'          => SlugService::createSlug(Shop::class, 'slug', $request->name, ['unique' => true]),
                'trade_license' => $request->trade_license,
                'market_id'     => $request->market_id,
                'division_id'   => $request->division_id,
                'district_id'   => $request->district_id,
                'upazila_id'    => $request->upazila_id,
                'author'        => 'merchant',
                'author_id'     => Auth::guard('marchant')->user()->id,
            ]);
            Session::flash('create');
            return redirect()->route('shop.index');
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
        $shop = Shop::find($id);
        return view('marchant.shop.show', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Shop::find($id);
        $divisions = Division::all();
        $markets = Market::get();
        return view('marchant.shop.edit', compact('shop', 'markets', 'divisions'));
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
        $shop = Shop::find($id);
        $image = $request->file('image');

        if ($image) {
            $validate = $request->validate([
                'name'        => 'required',
                'image'       => 'mimes:png,jpg,gif,bmp|max:1024',
            ]);


            $fileExtention = $image->getClientOriginalExtension();
            $fileName = date('Ymdhis') . '.' . $fileExtention;

            Image::make($image)->save(public_path('uploads/shop/') . $fileName);

            $shop->name          = $request->name;
            $shop->address       = $request->address;
            $shop->mobile        = $request->mobile;
            $shop->description   = $request->description;
            $shop->trade_license = $request->trade_license;
            $shop->market_id     = $request->market_id;
            $shop->division_id   = $request->division_id;
            $shop->district_id   = $request->district_id;
            $shop->upazila_id    = $request->upazila_id;
            $shop->author_id     = Auth::guard('marchant')->user()->id;
            $shop->image         = 'uploads/shop/' . $fileName;
            $shop->save();

            Session::flash('update');
            return redirect()->route('shop.index');
        } else {
            $validate = $request->validate([
                'name'        => 'required',
                'address'     => 'required',
                'division_id' => 'required',
                'district_id' => 'required',
                'upazila_id'  => 'required',
            ]);
            $marchantname = 'merchant';
            $shop->name = $request->name;
            $shop->address       = $request->address;
            $shop->mobile        = $request->mobile;
            $shop->description   = $request->description;
            $shop->trade_license = $request->trade_license;
            $shop->market_id     = $request->market_id;
            $shop->division_id   = $request->division_id;
            $shop->district_id   = $request->district_id;
            $shop->upazila_id    = $request->upazila_id;
            $shop->author_id     = Auth::guard('marchant')->user()->id;
            $shop->save();
            Session::flash('update');
            return redirect()->route('shop.index');
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
        $shop = Shop::find($id);
        $shop->delete();
        if ($shop) {
            Session::flash('delete');
            return redirect()->route('shop.index');
        } else {
            throw new Exception("You can't delete this!!!");
        }
    }
}
