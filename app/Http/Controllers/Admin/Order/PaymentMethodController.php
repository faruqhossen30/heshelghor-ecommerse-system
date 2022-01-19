<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Order\PaymentMethod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Session;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('payment')){
            abort(403, 'You have no access this page.');
        };
        $paymentmethodlist = PaymentMethod::all();
        return view('admin.payment.paymentmethodlist', compact('paymentmethodlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('payment')){
            abort(403, 'You have no access this page.');
        };
        return view('admin.payment.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('payment')){
            abort(403, 'You have no access this page.');
        };
        $request->validate([
            'name' => 'required'
        ]);
        PaymentMethod::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug'        => Str::of($request->name)->slug('-'),
            'author_id'   => Auth::guard('admin')->user()->id,
        ]);
        Session::flash('create');
        return redirect()->route('paymentmethod.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('payment')){
            abort(403, 'You have no access this page.');
        };
        $paymentmethod = PaymentMethod::where('id', $id)->first();
        return view('admin.payment.edit', compact('paymentmethod'));
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
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('payment')){
            abort(403, 'You have no access this page.');
        };
        $paymentmethod = PaymentMethod::where('id', $id)->first();
        $request->validate([
            'name' => 'required'
        ]);

        PaymentMethod::where('id', $id)->update([
            'name'=> $request->name,
            'description'=> $request->description,
        ]);

        Session::flash('update');
        return redirect()->route('paymentmethod.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(is_null(Auth::guard('admin')->user()) || !Auth::guard('admin')->user()->can('payment')){
            abort(403, 'You have no access this page.');
        };

        $delete = PaymentMethod::where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->route('paymentmethod.index');
    }
}
