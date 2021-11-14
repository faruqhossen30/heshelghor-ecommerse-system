<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserAuthAPIController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'string', 'max:15', 'unique:users'],
            'password' => ['required', 'string', 'min:2', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
            'status' => true,
        ]);

        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'User Successfully Registered !',
            'data' => $user
        ]);

    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'android_token' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // return $user->createToken($request->device_name)->plainTextToken;
        $token = $user->createToken($request->device_name)->plainTextToken;
        if($request->android_token){
            $user->android_token = $request->android_token;
            $user->save();
        }
        return response()->json([
            'success' => true,
            'code'    => 200,
            'message' => 'User Successfully login !',
            'token'   => $token,
            'data'    => $user
        ]);
    }

    // Logout
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
            'message' => 'User Successfully logged out',
        ]);
    }
}
