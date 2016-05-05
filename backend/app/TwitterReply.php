<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TwitterReply extends Model
{
    protected $table = 'twitter_replies';
    public function replies()
    {
        return $this->morphMany('App\Reply', 'replyable');
    }
}
