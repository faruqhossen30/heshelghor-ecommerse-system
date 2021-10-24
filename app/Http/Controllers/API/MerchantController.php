<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Models\Auth\Marchant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class MerchantController extends Controller
{
    public function login(Request $request)
    {
        return response()->json('merchant login successfully!');
    }
    public function logout()
    {
        return response()->json('merchant Logout successfully!');
    }
    public function register(Request $request)
    {
        // $validated = $request->validate([
        //     'name'         => 'required|max:255',
        //     'email'        => 'required|unique:marchants|max:200',
        //     'phone_number' => 'required|numeric|unique:marchants|max:11',
        //     'password'     => 'required|max:32',
        //     'address'      => 'required|max:200',
        // ]);



        try {
            $merchant               = new Marchant();
            $merchant->name         = $request->name;
            $merchant->phone_number = $request->phone_number;
            $merchant->email        = $request->email;
            $merchant->address      = $request->address;
            $merchant->password     = Hash::make($request->password);
            $merchant->save();
            return response()->json(["success" => "Signup successfull! please Login."], 201);;
        } catch (Exception $e) {
            return response()->json(["error" => "Can't signup. Please try Again!!!"], 401);
        }

        // return response()->json($request);
    }
}
