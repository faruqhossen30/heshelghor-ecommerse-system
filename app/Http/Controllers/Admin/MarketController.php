<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Location\Division;
use App\Models\Admin\Market;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Str;
use Session;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $markets = Market::get();
        return view('admin.market.market', compact('markets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::get();
        return view('admin.market.addmarket', compact('divisions'));
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
        if ($image) {
            $validate = $request->validate([
                'name'        => 'required',
                'image'       => 'mimes:png,jpg,gif,bmp|max:1024',
            ]);


            $fileExtention = $image->getClientOriginalExtension();
            $fileName = date('Ymdhis') . '.' . $fileExtention;

            $photo = Image::make($image)->save(public_path('uploads/market/') . $fileName);
            // dd($fileName);

            Market::create([
                'name'          => $request->name,
                'address'       => $request->address,
                'description'   => $request->description,
                'slug'          => SlugService::createSlug(Market::class, 'slug', $request->name, ['unique' => false]),
                'division_id'   => $request->division_id,
                'district_id'   => $request->district_id,
                'upazila_id'    => $request->upazila_id,
                'image'         => $fileName,
                'author'        => 'admin',
                'author_id'     => Auth::guard('admin')->user()->id,
            ]);

            Session::flash('create');
            return redirect()->route('market.index');
        } else {
            $validate = $request->validate([
                'name'        => 'required',
                'address'     => 'required',
                'division_id' => 'required',
                'district_id' => 'required',
                'upazila_id'  => 'required',
            ]);

            Market::create([
                'name'          => $request->name,
                'address'       => $request->address,
                'description'   => $request->description,
                'slug'          => SlugService::createSlug(Market::class, 'slug', $request->name, ['unique' => false]),
                'division_id'   => $request->division_id,
                'district_id'   => $request->district_id,
                'upazila_id'    => $request->upazila_id,
                'author'        => 'admin',
                'author_id'     => Auth::guard('admin')->user()->id,
            ]);

            Session::flash('create');
            return redirect()->route('market.index');
    }

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
