<?php

namespace App\Http\Controllers;

use App\SocialProvider;
use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\DB as DB;
use App\Ticket as Ticket;
use App\Team as Team;
use App\User as User;
use App\Status as Status;
use App\Priority as Priority;
use App\UserTicket as UserTicket;

class FeedController extends Controller
{
    private $connection;

    /**
     * FeedController constructor.
     */
    public function __construct()
    {  
        if(Auth::user()->role == 0){
            $this->middleware(['admin']);
         }elseif(Auth::user()->role == 1){
             $this->middleware(['supervisor']);
        }elseif(Auth::user()->role == 2){
             $this->middleware(['agent']);
        }
    }
      public function index()
    {
        $userAssignedTickets = $this->getUserAssignedTickets();
        $unassignedTickets = $this->getunAssignedTickets();
        $userTeam = $this->getUserTeam();
        $userAgents = $this->getTeamAgents();
        $userAssignedTicketsCount = count($userAssignedTickets);
        $ticketStatus = Status::all();
        $ticketPriority = Priority::all();
         if(Auth::user()->role == 0){
            return view('admin.adminFeed', compact('unassignedTickets', 'userAssignedTickets', 'userTeam', 'userAgents','ticketStatus', 'ticketPriority', 'userAssignedTicketsCount'));
         }elseif(Auth::user()->role == 1){
            return view('supervisor.supervisorFeed', compact('unassignedTickets', 'userAssignedTickets', 'userTeam', 'userAgents', 'ticketStatus', 'ticketPriority'));
        }elseif(Auth::user()->role == 2){
            return view('agent.agentFeed', compact('unassignedTickets', 'userAssignedTickets', 'userTeam', 'userAgents', 'userAssignedTicketsCount', 'ticketStatus', 'ticketPriority'));
        }

    }

    /**
     * @return array|object|void
     */
    public function getTweets(){

        $twitter_keys = SocialProvider::findOrFail(1);
        $consumer_key = $twitter_keys->consumer_key;
        $consumer_secret = $twitter_keys->consumer_secret;
        $oauth_token = $twitter_keys->oauth_token;
        $oauth_secret_token =  $twitter_keys->oauth_secret_token;
        if(isset($oauth_token ) && isset( $oauth_secret_token)) {
            $connection = new TwitterOAuth($consumer_key, $consumer_secret,
                $oauth_token, $oauth_secret_token);
                $tweets = $connection->get("statuses/mentions_timeline");
                return $tweets;

        }
        return response("Error in getting tweets", 403);

    }
     public function getUserAssignedTickets(){

        if(UserTicket::all()){

            $userAssignedTickets = DB::table('ticket')
            ->join('user_tickets', 'ticket.id', '=', 'user_tickets.ticketId')
            ->join('users', 'user_tickets.userId', '=', 'users.id')
            ->join('status','ticket.statusId', '=', 'status.id')
            ->join('priority','ticket.priorityId', '=', 'priority.id')
            ->select('ticket.*','status.name AS statusName', 'priority.id AS priorityId','priority.name AS priorityName', 'priority.id AS priorityId')
            ->where('users.id', '=', Auth::user()->id)
            ->get();
            if($userAssignedTickets){
                 return $userAssignedTickets;
            }
            else {
                $assigned = array();
                return $assigned;
            }
        }
        else{
             $assigned = array();
                return $assigned;
        }
    }
     public function getunAssignedTickets(){
        if(UserTicket::all()){

         $unassignedTickets = DB::table('ticket')
            ->join('status','ticket.statusId', '=', 'status.id')
            ->join('priority','ticket.priorityId', '=', 'priority.id')
            ->leftjoin('user_tickets', 'ticket.id', '=', 'user_tickets.ticketId')
            ->select('ticket.*','status.name AS statusName', 'priority.id AS priorityId','priority.name AS priorityName', 'priority.id AS priorityId')
            ->whereNull('user_tickets.ticketId')
            ->get();
            if($unassignedTickets){
                 return $unassignedTickets;
            }
            else {
                $unassigned = array();
                return $unassigned;
            }
        }
        else{
             $unassigned = array();
                return $unassigned;
        }

        //unassignedTickets;
    }
     public function getUserTeam(){
        if(Auth::user()->role == 0){
             $userTeam = DB::table('users')
            ->join('team', 'users.teamId', '=', 'team.id')
            ->join('departments', 'team.departmentId', '=', 'departments.id')  
            ->select('users.*', 'departments.name AS departmentName', 'departments.id AS departmentId')
            ->where(function($query)
            {
                $query->where('users.id', '!=', Auth::user()->id);
            })
            ->get();
        }else {
             $userTeam = DB::table('users')
            ->join('team', 'users.teamId', '=', 'team.id')
            ->join('departments', 'team.departmentId', '=', 'departments.id')  
            ->select('users.*', 'departments.name AS departmentName', 'departments.id AS departmentId')
            ->where(function($query)
            {
                $query->where('users.teamId', '=',  Auth::user()->teamId)
                      ->where('users.id', '!=', Auth::user()->id);
            })
            ->get();
         }
         if($userTeam){
                 return $userTeam;
            }
            else {
                $team = array();
                return $team;
            }
    }
    public function getTeamAgents()
    {
        if(Auth::user()->role == 0){
             $userAgents = DB::table('users')
            ->join('team', 'users.teamId', '=', 'team.id')
            ->join('departments', 'team.departmentId', '=', 'departments.id')  
            ->select('users.*', 'departments.name AS departmentName', 'departments.id AS departmentId')
            ->where(function($query)
            {
                $query->where('users.id', '!=', Auth::user()->id);
            })
            ->get();
        }else {
             $userAgents = DB::table('users')
            ->join('team', 'users.teamId', '=', 'team.id')
            ->join('departments', 'team.departmentId', '=', 'departments.id')  
            ->select('users.*', 'departments.name AS departmentName', 'departments.id AS departmentId')
            ->where(function($query)
            {
                $query->where('users.teamId', '=',  Auth::user()->teamId)
                 ->where('users.id', '!=', Auth::user()->id)
                ->where('users.role', '=', 2);
            })
            ->get();
         }
         if($userAgents){
            return $userAgents;
        }
        else {
            $team = array();
            return $team;
        }
    }

}
