<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Location\District;
use App\Models\Admin\Location\Division;
use App\Models\Admin\Location\Upazila;
use App\Models\Admin\Market;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Str;
use Session;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Session as FacadesSession;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(is_null(Auth::guard('admin')->user()) || !(Auth::guard('admin')->user()->can('market.view') || Auth::guard('admin')->user()->can('market.edit'))){
            abort(403, 'You have no access this page.');
        };
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
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('market.create')){
            abort(403, 'You have no access this page.');
        };
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

        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('market.create')){
            abort(403, 'You have no access this page.');
        };
            if ($request->hasFile('photo')) {

                $name = $request->photo->getClientOriginalName();
                $request->photo->storeAs('market', $name, 'public');

            Market::create([
                'name'          => $request->name,
                'address'       => $request->address,
                'description'   => $request->description,
                'slug'          => SlugService::createSlug(Market::class, 'slug', $request->name, ['unique' => false]),
                'division_id'   => $request->division_id,
                'district_id'   => $request->district_id,
                'upazila_id'    => $request->upazila_id,
                'photo'         => $name,
                'author'        => 'admin',
                'author_id'     => Auth::guard('admin')->user()->id,
            ]);

            Session::flash('create');
            return redirect()->route('market.index');
        } else {
            $validate = $request->validate([
                'name'        => 'required | unique:markets',
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
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('market.view')){
            abort(403, 'You have no access this page.');
        };
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
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('market.edit')){
            abort(403, 'You have no access this page.');
        };
        // return "under construction";
        $divisions = Division::get();
        $districts = District::get();
        $upazilas = Upazila::get();

        $market = Market::where('id', $id)->first();
        // return $market;
        return view('admin.market.edit', compact('market', 'divisions', 'districts', 'upazilas'));
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
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('market.edit')){
            abort(403, 'You have no access this page.');
        };
        if ($request->hasFile('photo')) {

            $name = $request->photo->getClientOriginalName();
            $request->photo->storeAs('market', $name, 'public');

            $data = [
                'name'          => $request->name,
                'address'       => $request->address,
                'description'   => $request->description,
                'division_id'   => $request->division_id,
                'district_id'   => $request->district_id,
                'upazila_id'    => $request->upazila_id,
                'photo'         => $name,
                'update_author_id' => Auth::guard('admin')->user()->id
            ];

            $update = Market::where('id', $id)->update($data);

            Session::flash('update');
            return redirect()->route('market.index');
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
                'division_id'   => $request->division_id,
                'district_id'   => $request->district_id,
                'upazila_id'    => $request->upazila_id,
                'update_author_id' => Auth::guard('admin')->user()->id
            ];

            $update = Market::where('id', $id)->update($data);

            Session::flash('create');
            return redirect()->route('market.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('market.delete')){
            abort(403, 'You have no access this page.');
        };
        $market = Market::where('id', $id)->get()->first();

        $delete = Market::where('id', $id)->delete();

        Session::flash('delete');
        return redirect()->route('market.index');
    }
}
