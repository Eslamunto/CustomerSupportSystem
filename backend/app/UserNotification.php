<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
        protected $table = 'user_notifications';

    /**
    * Fillable fields
    *
    * @var array
    */
    protected $fillable   = [
        'user_id', 'notification_id'
    ];
}
