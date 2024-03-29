<?php

namespace App\Http\Controllers\Merchant\Shop;

use App\Http\Controllers\Controller;
use App\Models\Admin\Location\District;
use App\Models\Admin\Location\Division;
use App\Models\Admin\Location\Upazila;
use App\Models\Admin\Market;
use Illuminate\Http\Request;
// use App\Models\Admin\Shop\Shop;
use App\Models\Merchant\Shop;
use App\Models\Product\Category;
use App\Models\Product\Product;
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
        $validate = $request->validate([
            'name'        => 'required',
            'address'     => 'required',
            'mobile'      => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_id'  => 'required'
        ]);

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
            'image'         => $request->image,
            'author'        => 'merchant',
            'author_id'     => Auth::guard('marchant')->user()->id,
            'img_full'      => $request->img_full,
            'img_small'     => $request->img_small,
            'img_medium'    => $request->img_medium,
            'img_large'     => $request->img_large
        ]);

        Session::flash('create');
        return redirect()->route('shop.index');
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
        $divisions = Division::orderBy('name', 'asc')->get();
        $districts = District::orderBy('name', 'asc')->get();
        $upazilas = Upazila::orderBy('name', 'asc')->get();
        $markets = Market::orderBy('name', 'asc')->get();
        // return $upazilas;
        return view('marchant.shop.edit', compact('shop', 'markets', 'divisions', 'districts', 'upazilas'));
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
        // return $request->all();
        $validate = $request->validate([
            'name'        => 'required',
            'address'     => 'required',
            'mobile'      => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_id'  => 'required'
        ]);

        $data = [
            'name'          => $request->name,
            'address'       => $request->address,
            'mobile'        => $request->mobile,
            'description'   => $request->description,
            'trade_license' => $request->trade_license,
            'market_id'     => $request->market_id,
            'author_id'     => $request->author_id,
            'division_id'   => $request->division_id,
            'district_id'   => $request->district_id,
            'upazila_id'    => $request->upazila_id,
            'img_full'      => $request->img_full,
            'img_small'     => $request->img_small,
            'img_medium'    => $request->img_medium,
            'img_large'     => $request->img_large
        ];

        $userID = Auth::guard('marchant')->user()->id;
        Shop::where('author_id', $userID)->where('id', $id)->update([
            'name'          => $request->name,
            'address'       => $request->address,
            'mobile'        => $request->mobile,
            'description'   => $request->description,
            'trade_license' => $request->trade_license,
            'market_id'     => $request->market_id,
            'author_id'     => $request->author_id,
            'division_id'   => $request->division_id,
            'district_id'   => $request->district_id,
            'upazila_id'    => $request->upazila_id,
            'img_full'      => $request->img_full,
            'img_small'     => $request->img_small,
            'img_medium'    => $request->img_medium,
            'img_large'     => $request->img_large
        ]);

        Session::flash('update');
        return redirect()->route('shop.index');
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

    public function shopVacation(Request $request, $id)
    {
        $shop = Shop::findOrFail($id);
        if($shop->vacation == 0){
            Shop::where('id', $id)->update(['vacation'=> true]);
            Product::where('shop_id', $id)->update(['status'=>false]);
            return redirect()->back();
        }
        if($shop->vacation == 1){
            Shop::where('id', $id)->update(['vacation'=> false]);
            Product::where('shop_id', $id)->update(['status'=>true]);
            return redirect()->back();
        }


    }


}
