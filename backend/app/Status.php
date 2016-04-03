<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'status';

    /**
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = ['name'];

    function ticket(){
        return $this->hasMany('App\Ticket');
    }

}
