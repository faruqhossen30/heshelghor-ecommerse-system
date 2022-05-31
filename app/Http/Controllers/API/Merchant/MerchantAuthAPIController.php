<?php

namespace App\Http\Controllers\API\Merchant;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auth\Marchant;
use Illuminate\Support\Facades\Validator;

class MerchantAuthAPIController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:marchants'],
            'password' => ['required', 'string', 'min:2', 'confirmed'],
            'phone_number' => ['required'],
            'address' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => 'false',
                'code' => 422,
                'validation error' => $validator->errors()
            ]);
        }
        $merchant = Marchant::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone_number' => $data['phone_number'],
            'address' => $data['address']
        ]);

        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'Merchant Successfully Registered !',
            'data' => $merchant
        ]);

    }

    public function login(Request $request)
    {
        $request->validate([
            'email'         => 'required|email',
            'password'      => 'required',
            'android_token' => 'required'
        ]);

        $merchant = Marchant::where('email', $request->email)->first();

        if (! $merchant || ! Hash::check($request->password, $merchant->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // return $merchant->createToken($request->device_name)->plainTextToken;
        $token = $merchant->createToken(uniqid())->plainTextToken;
        if($request->android_token){
            $merchant->android_token = $request->android_token;
            $merchant->save();
        }

        return response()->json([
            'success' => true,
            'code'    => 200,
            'message' => 'Merchant Successfully login !',
            'token'   => $token,
            'data'    => $merchant
        ]);
    }
    // Merchant Logout
    public function logout(Request $request)
    {
        $user = $request->user();
        // Revoke all tokens...
        // $user->tokens()->delete();
        // Revoke a specific token...
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Merchant Successfully logged out',
        ]);
    }
}
