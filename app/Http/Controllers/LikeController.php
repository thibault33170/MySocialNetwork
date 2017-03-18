<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Access\Response;
use Log;
use Auth;
use App\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function isLiked($article_id) {
        $user_id = Auth::id();
        $isLiked = Like::where('user_id', $user_id)->where('article_id', $article_id)->count() > 0;

        return response()->json($isLiked);
    }

    public function likePost(Request $request) {
        Like::create($request->all() + ['user_id' => Auth::id()]);
    }

    public function unlikePost(Request $request) {
        $user_id = Auth::id();
        $article_id = $request->article_id;
        Log::info($request->all());
        Like::where('user_id', $user_id)->where('article_id', $article_id)->delete();
    }
}
