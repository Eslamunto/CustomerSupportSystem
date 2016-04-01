<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ticket';
    function department(){
        return $this->belongsTo('App\Department');
    }
    function customer(){
        return $this->belongsTo('App\Customer');
    }
    function status(){
        return $this->belongsTo('App\Status');
    }
    function priority(){
        return $this->belongsTo('App\Priority');
    }
    function post(){
        return $this->hasOne('App\Post');
    }
    function reply(){
        return $this->hasMany('App\Reply');
    }
}
