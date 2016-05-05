<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TwitterPost extends Model
{
    protected $table = 'twitter_posts';
    public function post()
    {
        return $this->morphMany('App\Post', 'postable');
    }
}
