<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'departments';
    function Team(){
        return $this->hasMany('App\Team');
    }
    function Ticket(){
        return $this->hasMany('App\Ticket');
    }

}
