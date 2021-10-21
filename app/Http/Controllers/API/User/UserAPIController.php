<?php

namespace App\Http\Controllers\API\User;

use Exception;
use App\Models\User;

use Illuminate\Support\Str;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAPIController extends Controller
{
    public function userLogin(Request $request)
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

    public function userRegister(Request $request)
    {



        // $data = $request->only('name', 'email', 'mobile', 'password');
        // $data['password'] = Hash::make($request->password);
        // $id = DB::table('users')
        //     ->insertGetId($data);
        // $res_db_data = DB::table('users')
        //     ->find($id);

        // return response()->json([
        //     'msg' => 'User Created successfully!',
        //     'data' => $res_db_data
        // ], 201);



        $validated = $request->validate([
            'name'     => 'required|max:255',
            'email'    => 'required|unique:users|max:255',
            'mobile'   => 'required|unique:users|max:11',
            'password' => 'required|max:32',
        ]);
        try {
            $user = new User();
            $user->name = $request->name;
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->status = 1;
            $user->save();
            return response()->json(["success" => "Signup successfull! please Login."], 201);;
        } catch (Exception $e) {
            return response()->json(["error" => "Can't signup. Please try Again!!!"], 403);
        }
    }
}
