<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use \GetStream\StreamLaravel\Eloquent\ActivityTrait;

    protected $fillable = [
        'user_id', 'title', 'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
    * Stream: Change activity verb to 'created':
    */
    public function activityVerb()
    {
        return 'created';
    }

}
