<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User as User;
use App\Notification as Notification;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }

        //Share user's notifications accross all views
        view()->composer('*', function ($view) {
            $this->prepareUserNotifications($view);
        });

        return $next($request);
    }

    public function prepareUserNotifications($view)
    {
        $user = User::find(Auth::user()->id);

        // $notifications_query = Notification::getUserNotifications($user->id);
        $notifications = Notification::getUserNotifications($user->id)->get();
        // $notifications_count = $notifications_query->count();
        $notifications_count = Notification::getNotificationsCount($user->id);

        $view->with(['notifications' => $notifications, 'notifications_count' => $notifications_count]);
    }
}
