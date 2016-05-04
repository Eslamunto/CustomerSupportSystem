<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Notification as Notification;
use App\UserNotification as UserNotification;
use App\User as User;
use Illuminate\Support\Facades\Auth as Auth;

class NotificationController extends Controller
{
    public function markNotificationsAsRead($role, $user_id)
    {
        $notifications = Notification::getUserNotifications($user_id)->get();
        $notifications_count = Notification::getNotificationsCount($user_id);

        $user = User::find($user_id);

        foreach ($notifications as $notification) {
            $user_notification = UserNotification::where('notification_id', '=', $notification->id)
                ->where('user_id', '=', $user_id)->first();
            
            $user_notification->is_read = 1;
            $user_notification->save();
        }

        return redirect()->back();
    }
}
