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
    public function __construct()
    {  
        // $this->user = Auth::user();

        if(Auth::user()->role == 0){
            $this->middleware(['admin']);
        }elseif(Auth::user()->role == 1){
            $this->middleware(['supervisor']);
        }elseif(Auth::user()->role == 2){
            $this->middleware(['agent']);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);

        // $notifications_query = DB::table('user_notifications')
        //     ->join('notifications', 'user_notifications.notification_id', '=', 'notifications.id')
        //     ->where('user_notifications.user_id', $user->id)
        //     ->where('notifications.is_read', '=', 0);

        $notifications_query = Notification::getUserNotifications($user->id);

        $notifications = $notifications_query->get();
        $notifications_count = $notifications_query->count();    
        // $user_notifications = UserNotification::where('user_id', '=', $user->id);
        // $notifications_count = $user_notifications->unread()->count();

        return view('layouts.master', compact('notifications','notifications_count'));
        // if(Auth::user()->role == 0) {
        //     return view('admin.adminFeed', compact('notifications','notifications_count'));
        // } elseif (Auth::user()->role == 1) {
        //     return view('supervisor.supervisorFeed', compact('notifications','notifications_count'));
        // } elseif (Auth::user()->role == 2) {
        //     return view('agent.agentFeed', compact('notifications','notifications_count'));
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function markNotificationsAsRead($role, $user_id)
    {
        // echo("Im here");
        // dd($user_id);
        // $notifications_query = Notification::getUserNotifications($user_id);
        $notifications = Notification::getUserNotifications($user_id)->get();
        // $notifications_count = $notifications_query->count();
        $notifications_count = Notification::getNotificationsCount($user_id);
        // dd($notifications);

        $user = User::find($user_id);

        foreach ($notifications as $notification) {
            // dd($notification);
            $user_notification = UserNotification::where('notification_id', '=', $notification->id)
                ->where('user_id', '=', $user_id)->first();
            // dd($user_notification);
            $user_notification->is_read = 1;
            $user_notification->save();
            // dd($notification);
            // $notification->save();
        }

        return redirect()->back();
        // return redirect()->back()->with($notifications_count, $notifications);
        // return view('layouts.master', compact('notifications','notifications_count'));
        // return redirect()->back();
    }
}
