<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacebookReply extends Model
{
    protected $table = 'facebook_replies';
    public function replies()
    {
        return $this->morphMany('App\Reply', 'replyable');
    }
}
