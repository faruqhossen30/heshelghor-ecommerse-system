<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Product\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'comment'=> 'required|max:500'
        ]);
        $comment = Comment::create([
            'product_id' => $id,
            'user_id' => Auth::user()->id,
            'comment' => $request->comment
        ]);

        return redirect()->back();
    }
}
