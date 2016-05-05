<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneReply extends Model
{
    protected $table = 'phone_replies';
    public function replies()
    {
        return $this->morphMany('App\Reply', 'replyable');
    }
}
