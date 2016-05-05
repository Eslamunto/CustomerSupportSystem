<?php
/**
 * Created by PhpStorm.
 * User: Eldesouky
 */

namespace App\Http\Controllers;

use App\Customer ;
use App\Post;
use App\TwitterPost;
use Illuminate\Support\Facades\Validator as Validator;
use Illuminate\Support\Facades\Session as Session;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth as Auth;
use App\UserTicket;
use App\Ticket;
use App\User;
use Illuminate\Support\Facades\DB as DB;
use App\SocialProvider as SocialProvider;
use Abraham\TwitterOAuth\TwitterOAuth as TwitterOAuth;
use App\Status;
use App\Priority;
use Log;

class TicketController extends Controller
{
    

    public function index()
    {
          if(Auth::user()->role == 0){
            return view('admin.adminFeed');
         }else{
            return view('supervisor.supervisorFeed');

        }
    }
    

    public function create()
    {
        return view('admin.adminFeed');
    }
  


    public function assign(Request $request, $id)
    {   
        $ticket = Ticket::find($id);
        $user = User::find(Input::get('selectedAssignee'));
        $userTicket = new UserTicket;
        $userTicket->userId = Input::get('selectedAssignee');
        $userTicket->ticketId = $id;
        $userTicket->save();
         if($user->role == 1){
            Session::flash('message', 'Ticket: '.$ticket->title .' has been successfully assigneed to Supervisor '.$user->name);
        }else {
            Session::flash('message', 'Ticket: '.$ticket->title .' has been successfully assigneed to Agent '.$user->name);
        }
       
        return redirect()->back();
    }
     public function claim(Request $request, $id)
    {   
        $ticket = Ticket::find($id);
        
        $userAssignedTickets = DB::table('ticket')
            ->join('user_tickets', 'ticket.id', '=', 'user_tickets.ticketId')
            ->join('users', 'user_tickets.userId', '=', 'users.id')
            ->select('ticket.*')
            ->where('users.id', '=', Auth::user()->id)
            ->count();

        if(Auth::user()->role == 2){
            if ($userAssignedTickets >=3 ){
                Session::flash('error', 'Sorry! Currently you can not claim any tickets. As an agent, you can not claim a ticket while having more than 3 assigned ones');
            }
            else{
                $userTicket = new UserTicket;
                $userTicket->userId = Auth::user()->id;
                $userTicket->ticketId = $id;
                $userTicket->save();
                Session::flash('message', 'You have successfully claimed Ticket: '.$ticket->title);
            }
        }else {
           $userTicket = new UserTicket;
                $userTicket->userId = Auth::user()->id;
                $userTicket->ticketId = $id;
                $userTicket->save();
                Session::flash('message', 'You have successfully claimed Ticket: '.$ticket->title);
        }
       
        return redirect()->back();
    }
    public function setStatus(Request $request, $id)
    {
        //dd(Input::get('selectedStatus'));  
        $ticket = Ticket::find($id);
        $status = Status::find(Input::get('selectedStatus'));
        $ticket->statusId = Input::get('selectedStatus');
        $ticket->save();
        Session::flash('message', 'The Status of '.$ticket->title .' has been set to '. $status->name.' status Successfully');
        return redirect()->back();  
    }
    public function setPriority(Request $request, $id)
    {
        //dd(Input::get('selectedStatus'));  
        $ticket = Ticket::find($id);
        $priority = Priority::find(Input::get('selectedPriority'));
        $ticket->priorityId = Input::get('selectedPriority');
        $ticket->save();
        Session::flash('message', 'The Priority of '.$ticket->title .' has been set to '. $priority->name.' priority Successfully');
        return redirect()->back();  
    }
    public function esclateTicket(Request $request, $id)
    {
        if(Auth::user()->role == 2)
        {
        $supervisor = DB::table('users')
        ->join('team', 'users.id', '=', 'team.supervisorId' )  
        ->select('users.*')
        ->where('team.id', '=', Auth::user()->teamId)
        ->first();
                //dd($supervisor);
        }
        else 
        {
            $supervisor = DB::table('users')
            ->select('users.*')
            ->where('users.role', '=', 0)
            ->first();
        }
        

        // $supervisor = User::find($supervisor->id);
        $userTicket = new UserTicket;
        $userTicket->userId = $supervisor->id;
        $ticket = Ticket::find($id);
        $userTicket->ticketId = $ticket->id;
        //dd($userTicket);
        $userTicket->save();
        Session::flash('message', $ticket->title .' has been esclated to your supervisor Successfully');
        return redirect()->back();  
    }
    public function destroy($id)
    {
      
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
    public function ajaxCreate(){
           //Ticket varables
            $title = Input::get('title');
            $customerId = Input::get('customerId');
            $description = Input::get('description');
            $priority = Input::get('priority');
            $department = Input::get('department');
            $statusId = Input::get('status');
            //Post variables
            $tweetId = Input::get('tweetId');
            $tweetBody = Input::get('tweetBody');

            //UserTicket variables
            $agent = Input::get('agent');

            //create twitter post
            $twitterPost = new TwitterPost();
            $twitterPost->tweetId = $tweetId;
            $twitterPost->tweetBody = $tweetBody;
            $twitterPost->save();

            //create post
            $post = new Post();
            $post->postId = $twitterPost->id;
            $post->postable_type = 't';
            $post->save();

            // store

            $ticket = new Ticket();
            $ticket->statusId = $statusId;
            $ticket->priorityId = $priority;
            $ticket->customerId = $customerId;
            $ticket->departmentId = $department;
            $ticket->title = $title;
            $ticket->description = $description;
            $ticket->postId = $post->id;
            $ticket->save();

            if ($agent != 0){
                $assign = new UserTicket();
                $assign->userId = $agent;
                $assign->ticketId=$ticket->id;
                $assign->save();
            }

            return response('Adding new ticket successfully ', 200);
        

    }

    public function reply(){
        $tweetId = Input::get('tweetId');
        $customerId = Input::get('customerId');
        $customer = Customer::find($customerId);
        $username = $customer->twitterUsername;
        $replyBody = $username.' '.Input::get('reply');
        $twitter_keys = SocialProvider::findOrFail(1);
        $consumer_key = $twitter_keys->consumer_key;
        $consumer_secret = $twitter_keys->consumer_secret;
        $oauth_token = $twitter_keys->oauth_token;
        $oauth_secret_token =  $twitter_keys->oauth_secret_token;
        if(isset($oauth_token ) && isset( $oauth_secret_token)) {
            $connection = new TwitterOAuth($consumer_key, $consumer_secret,
                $oauth_token, $oauth_secret_token);
            $reply = $connection->post("statuses/update", ['in_reply_to_status_id'=>$tweetId, 'status'=>$replyBody]);
            $response = json_encode($reply);
            $array = json_decode($response);
            
            return json_encode($array);

        }
        return response("Error in reply to a tweet", 403);

    }

}
