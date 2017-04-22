<?php

namespace App\Http\Controllers;

use App\Follow;
use Illuminate\Http\Request;
use Auth;
use Log;

class FollowsController extends Controller
{
    public function follow (Request $request) {
        $id = Auth::id();
        $target_id = $request->target;

        Follow::create($request->all() + ['follower_id' => $id]);
    }

    public function unfollow (Request $request) {
        $id = Auth::id();
        $target_id = $request->target_id;

        Follow::where('follower_id', $id)->where('target_id', $target_id)->delete();
    }

    public function isfollowed (Request $request) {
        $id = Auth::id();
        $target_id = $request->target;

        $isfollowed = Follow::where('follower_id', $id)->where('target_id', $target_id)->count() > 0;

        return response()->json($isfollowed);
    }
}
