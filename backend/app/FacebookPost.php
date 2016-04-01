<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacebookPost extends Model
{
    protected $table = 'facebook_post';

    public function post()
    {
        return $this->morphMany('App\Post', 'postable');
    }

}

