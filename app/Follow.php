<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use \GetStream\StreamLaravel\Eloquent\ActivityTrait;

    protected $fillable = ['target_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function target()
    {
        return $this->belongsTo(User::class);
    }

    public function activityNotify()
    {
        $targetFeed = \FeedManager::getNotificationFeed($this->target->id);
        return array($targetFeed);
    }

    public function activityVerb()
    {
        return 'follow';
    }

    public function activityExtraData()
    {
        return array('followed' => $this->target, 'follower' => $this->user);
    }
}
