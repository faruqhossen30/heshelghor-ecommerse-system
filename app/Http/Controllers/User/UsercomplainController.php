<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Usercomplain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsercomplainController extends Controller
{
    public function usercomplain(){

        $usercomplain = Usercomplain::with('userName','orderid')->latest()->get();

        // dd($user);
        return view('user.complain.usercomplain',compact('usercomplain'));
    }
}
