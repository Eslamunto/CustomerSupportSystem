<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTicket extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userId', 'ticketId',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_tickets';
}
