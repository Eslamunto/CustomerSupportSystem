<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';
    function ticket(){
        return $this->belongsTo('App\Ticket');
    }
    public function postable()
    {
        return $this->morphTo();
    }
}
