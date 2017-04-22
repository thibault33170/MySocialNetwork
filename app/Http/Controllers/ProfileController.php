<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Log;
use Image;
use Auth;

class ProfileController extends Controller
{
    public function profile($username){
    	$user = User::whereUsername($username)->first();

    	if ($user !== null) {
            return view('user.profile', compact('user'));
        } else {
    	    return view('errors.404');
        }
    }

    public function searchProfile (Request $request) {
        $results = User::where('name', 'LIKE', '%'.$request->search.'%')->get();

        return view('user.search', compact('results'));
    }

    public function updateAvatar (Request $request) {
        \Log::info($request->avatar);
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('uploads\\avatars\\' . $filename));

            $user = Auth::user();
            $user->avatar = $filename;

            $user->save();

            return view('user.profile', compact('user'));
        }
    }
}
