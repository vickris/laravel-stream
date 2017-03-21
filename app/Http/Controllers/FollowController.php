<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;

class FollowController extends Controller
{
    public function index()
    {
        return view('users.index', [
            'users' => User::get()
        ]);
    }

    public function follow(Request $request)
    {
        // Create a new follow instance for the authenticated user
        // This target_id will come from a hidden field input after clicking the
        // follow button in the users index view
        $request->user()->follows()->create([
            'target_id' => $request->target_id,
        ]);
        \FeedManager::followUser($request->user()->id, $request->target_id);
        return redirect()->back();
    }

    public function unfollow($user_id, Request $request)
    {
        $follow = $request->user()->follows()->where('target_id', $user_id)->first();
        \FeedManager::unfollowUser($request->user()->id, $follow->target_id);
        $follow->delete();

        return redirect()->back();
    }
}
