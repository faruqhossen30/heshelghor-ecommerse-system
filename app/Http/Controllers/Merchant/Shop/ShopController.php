<?php

namespace App\Http\Controllers\Merchant\Shop;

use App\Http\Controllers\Controller;
use App\Models\Admin\Location\Division;
use Illuminate\Http\Request;
use App\Models\Admin\Shop\Shop;
use App\Models\Product\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;
use Session;

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
        $shops = Shop::where('author_id', $userID)->get();
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
        $divisions = Division::all();

        return view('marchant.shop.addshop', compact('divisions'));
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
                'image'       => 'mimes:png,jpg,gif,bmp|max:1024',
            ]);


            $fileExtention = $image->getClientOriginalExtension();
            $fileName = date('Ymdhis') . '.' . $fileExtention;

            Image::make($image)->save(public_path('uploads/shop/') . $fileName);

            Shop::create([
                'name'          => $request->name,
                'address'       => $request->address,
                'description'   => $request->description,
                'slug'          => Str::of($request->name)->slug('-'),
                'trade_license' => $request->trade_license,
                'market_id'     => $request->market_id,
                'division_id'   => $request->division_id,
                'district_id'   => $request->district_id,
                'upazila_id'    => $request->upazila_id,
                'author'        => 'merchant',
                'author_id'     => Auth::guard('marchant')->user()->id,
                'image'         => 'uploads/shop/' . $fileName,
            ]);

            Session::flash('create');
            return redirect()->route('shop.index');

        } else{
            $validate = $request->validate([
                'name'        => 'required',
                'address'        => 'required',
                'division_id'        => 'required',
                'district_id'        => 'required',
                'upazila_id'        => 'required',
            ]);
            $marchantname = 'merchant';
            Shop::create([
                'name'          => $request->name,
                'address'       => $request->address,
                'description'   => $request->description,
                'slug'          => Str::of($request->name)->slug('-'),
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
        //
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
