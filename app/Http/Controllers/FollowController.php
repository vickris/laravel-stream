<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function index()
    {
        return view('users.index', [
            'users' => $users = User::all()->except(Auth::id())
        ]);
    }

    public function follow(User $user)
    {
        if (!$user->followed_by(Auth::User(), $user->id)) {
            // Create a new follow instance for the authenticated user
            Auth::user()->follows()->create([
                'target_id' => $user->id,
            ]);

            \FeedManager::followUser(Auth::id(), $user->id);
        }

        return redirect()->back();
    }

    public function unfollow(User $user)
    {
        if ($user->followed_by(Auth::User(), $user->id)) {
            $follow = Auth::user()->follows()->where('target_id', $user->id)->first();

            if ($follow) {
                \FeedManager::unfollowUser(Auth::id(), $follow->target_id);
                $follow->delete();
            }
        }

        return redirect()->back();
    }
}
