<?php

namespace App\Http\Controllers;

use GetStream\StreamLaravel\Enrich;
use Illuminate\Http\Request;

class FeedsController extends Controller
{
    public function newsFeed(Request $request)
    {
        // Timeline feed:
        $feed = \FeedManager::getNewsFeeds($request->user()->id)['timeline'];
        //  get 25 most recent activities from the timeline feed:
        $activities = $feed->getActivities(0,25)['results'];
        $activities = $this->enrich()->enrichActivities($activities);

        return view('feed.newsfeed', [
            'activities' => $activities,
        ]);
    }

    public function notification(Request $request)
    {
        //Notification feed:
        $feed = \FeedManager::getNotificationFeed($request->user()->id);
        $activities = $feed->getActivities(0,25)['results'];
        $activities = $this->enrich()->enrichActivities($activities);

        return view('feed.notifications', [
            'activities' => $activities,
        ]);
    }

    private function enrich()
    {
        return new Enrich;
    }

}
