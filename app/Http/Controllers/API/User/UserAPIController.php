<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Exception;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserAPIController extends Controller
{
    public function userLoginForApps(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 1])) {
            return Auth::user();
            // return Auth::user()->token;
        } else {
            return response()->json(["error" => "User Not found!!! Please try again!"], 404);
        }
    }

    public function userSignupForApps(Request $request)
    {
        try {
             $validated = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|unique:users|max:255',
                'mobile' => 'required|unique:users|max:11',
                'password' => 'required|max:32',
            ]);

            $user = new User();
            $user->name = $request->name;
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->token = Str::random(80);
            $user->status = true;
            $user->save();
            return response()->json(["success" => "Signup successfull! please Login."], 200);;
        } catch (Exception $e) {
            return response()->json(["error" => "Can't signup. Please try Again!!!"], 404);
        }
    }
}
