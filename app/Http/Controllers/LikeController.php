<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        $user = Auth::user();
        $like = Like::where('post_id', $post_id)->where('user_id', $user->id)->get();
        if (count($like) > 0) {
            Like::where('post_id', $post_id)->where('user_id', $user->id)->delete();
        } else {
            Like::create([
                'post_id' => $post_id,
                'user_id' => $user->id
            ]);
        }
        return redirect()->back();
    }
}
