<?php

namespace App\Http\Controllers\API\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class MerchantProductAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $merchantId = $request->user()->id;
        $products = Product::with('brand', 'category', 'subCategory')->where('author_id', $merchantId)->get();
        if (count($products) == 0) {
            return response()->json([
                'success' => true,
                'code'    => 200,
                'message' => 'No brands found'
            ]);
        }
        if (!empty($products)) {
            return response()->json([
                'success' => true,
                'code'    => 200,
                'data'    => $products
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $merchantId = $request->user()->id;
        $product = Product::with('brand', 'category', 'subCategory')
            ->where('author_id', $merchantId)
            ->where('id', $id)
            ->first();

        return response()->json([
            'success' => true,
            'code'    => 200,
            'data'    => $product
        ]);
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
    public function destroy(Request $request, $id)
    {
        $merchantId = $request->user()->id;
        $delete = Product::where('author_id', $merchantId)
            ->where('id', $id)
            ->delete();

        if($delete){
            return response()->json([
                'success' => true,
                'code'    => 200,
                'message'    => "Delete Successfull !",
            ]);
        } else{
            return response()->json([
                'message'    => "Opps! Something wrong !",
            ]);
        }
    }
}
