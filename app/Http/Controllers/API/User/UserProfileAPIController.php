<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Image;

class UserProfileAPIController extends Controller
{
    public function profile(Request $request)
    {
        $userId = $request->user()->id;
        $user = User::where('id', $userId)->first();
       return response()->json([
           'success' => true,
           'code'    => 200,
           'data'    => $user
       ]);
    }

    public function profileUpdate(Request $request)
    {
        $userId = $request->user()->id;
        $user = User::where('id', $userId)->first();

        $photo = $request->file('photo');

        if ($photo) {
            $photoExtention = $photo->getClientOriginalExtension();
            $photoName = hexdec(uniqid()) . '.' . $photoExtention;
            $photo = Image::make($photo)->save(public_path('uploads/user/profile/') . $photoName);


            $update = User::where('id', $userId)->update([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'bio' => $request->bio,
                'address' => $request->address,
                'photo' => $photoName
            ]);
            if($user->photo){
                unlink('uploads/user/profile/'.$user->photo);
            }

            return response()->json([
                'success' => true,
                'code'    => 200,
                'message' => 'Update successfully !',
                'data' => User::where('id', $userId)->first()
            ]);
        } else{
            $user = User::where('id', $userId)->update([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'bio' => $request->bio,
                'address' => $request->address
            ]);

            return response()->json([
                'success' => true,
                'code'    => 200,
                'message' => 'Update successfully !',
                'data' => User::where('id', $userId)->first()
            ]);
        }

    }


}
