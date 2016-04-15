<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'departmentId',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'team';
    
    function users(){
        return $this->hasMany('App\User');
    }
    function department(){
        return $this->belongsTo('App\Department', 'departmentId');
    }
}
