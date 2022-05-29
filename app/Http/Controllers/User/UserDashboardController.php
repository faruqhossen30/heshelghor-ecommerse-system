<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Merchant\Order;
use App\Models\Merchant\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserWelcome;
use Image;
use Ramsey\Uuid\Type\Hexadecimal;

class UserDashboardController extends Controller
{

    public function index()
    {
        $userId = Auth::user()->id;
        $totalorder = Order::where('user_id', $userId)->count();
        // return $totalorder;

        return view('user.dashboard', compact('totalorder'));
    }

    // For List order
    public function orders()
    {
        $userId = Auth::user()->id;
        $orders = Order::with('user')->where('user_id', $userId)->latest()->get();

        // return $orders;
        return view('user.order.userorder', compact('orders'));
    }
    public function showOrder($id)
    {
        $userId = Auth::user()->id;
        $order = Order::with('itemProducts')->where('user_id', $userId)->where('id', $id)->first();
        $orderitems = OrderItem::with('product')->where('user_id', $userId)->where('order_id', $id)->get();
        // return $order;
        return view('user.order.showorder', compact('order', 'orderitems'));
    }

    public function trackOrder()
    {
        return view('user.order.trace');
    }


    public function account()
    {
        $userId = Auth::user()->id;
        $user = User::where('id', $userId)->first();

        return view('user.account', compact('user'));
    }
    public function editAccount()
    {
        $userId = Auth::user()->id;
        $user = User::where('id', $userId)->first();

        return view('user.updateaccount', compact('user'));
    }
    public function updateAccount(Request $request)
    {
        $userId = Auth::user()->id;
        // $request->validate([
        //     'address' => 'required',
        //     'photo' => 'required',
        // ]);
        $user = User::where('id', $userId)->first();
        $photo = $request->file('photo');

        if ($photo) {
            $photoExtention = $photo->getClientOriginalExtension();
            $photoName = hexdec(uniqid()) . '.' . $photoExtention;
            $photo = Image::make($photo)->save(public_path('uploads/user/profile/') . $photoName);


            $update = User::where('id', $userId)->update([
                'name' => $request->name,
                'bio' => $request->bio,
                'address' => $request->address,
                'photo' => $photoName
            ]);
            if($user->photo){
                unlink('uploads/user/profile/'.$user->photo);
            }

            return redirect()->route('user.account');
        } else{
            $user = User::where('id', $userId)->update([
                'name' => $request->name,
                'bio' => $request->bio,
                'address' => $request->address
            ]);

            return redirect()->route('user.account');
        }
    }
}
