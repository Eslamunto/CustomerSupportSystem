<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\UserNotification as UserNotification;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'teamId',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function team(){
        return $this->belongsTo('App\Team', 'teamId');
    }
    public function ticket(){
        return $this->belongsToMany('App\User', 'user_tickets', 'userId', 'ticketId');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\User', 'user_notifications', 'user_id', 'notification_id');
    }

    public function newNotification($users)
    {
        $notification = Notification::create();

        foreach ($users as $user) {
            $user_notification = new UserNotification;
            $user_notification->user_id = $user->id;
            $user_notification->notification_id = $notification->id;

            $user_notification->save();
        }
     
        return $notification;
    }
}
