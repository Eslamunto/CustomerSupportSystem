<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon as Carbon;
use DB;

class Notification extends Model
{
    /*
     * The table associated with the model.
     *
     * @var string
     */
        protected $table = 'notifications';

    /**
    * Fillable fields
    *
    * @var array
    */
    protected $fillable   = [
        'user_id', 'type', 'subject', 'body', 'object_id', 'object_type', 'sent_at'
    ];

    public function users(){
        return $this->belongsToMany('App\Notification', 'user_notifications', 'user_id', 'notification_id');
    }

    public function scopeUnread($query)
    {
        return $query->where('is_read', '=', 0);
    }

    public function withType($type)
    {
        $this->type = $type;
     
        return $this;
    }

    public function withSubject($subject)
    {
        $this->subject = $subject;
     
        return $this;
    }
     
    public function withBody($body)
    {
        $this->body = $body;
     
        return $this;
    }
     
    public function regarding($object)
    {
        if(is_object($object))
        {
            $this->object_id   = $object->id;
            $this->object_type = get_class($object);
        }
     
        return $this;
    }

    public function send()
    {
        $this->sent_at = new Carbon;
        $this->save();
     
        return $this;
    }

    public static function getUserNotifications($user_id)
    {
        $notifications_query = DB::table('user_notifications')
            ->join('notifications', 'user_notifications.notification_id', '=', 'notifications.id')
            ->where('user_notifications.user_id', $user_id)
            ->orderBy('is_read', 'asc');

        return $notifications_query;
    }

    public static function getNotificationsCount($user_id)
    {
        $notifications_count = DB::table('user_notifications')
            ->join('notifications', 'user_notifications.notification_id', '=', 'notifications.id')
            ->where('user_notifications.user_id', $user_id)
            ->where('user_notifications.is_read', '=', 0)
            ->count();

        return $notifications_count;       
    }
}
