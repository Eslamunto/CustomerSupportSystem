<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhonePost extends Model
{
    protected $table = 'phone_post';
    public function post()
    {
        return $this->morphMany('App\Post', 'postable');
    }
}
