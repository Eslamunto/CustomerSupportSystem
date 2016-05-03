<?php
/**
 * Created by PhpStorm.
 * User: Eldesouky
 */

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Support\Facades\Redirect;
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
use App\Status;
use App\Priority;
use App\Team;

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
        $supervisor = DB::table('users')
        ->join('team', 'users.id', '=', 'team.supervisorId' )  
        ->select('users.*')
        ->where('team.id', '=', Auth::user()->teamId)
        ->first();
                //dd($supervisor);

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
    
}
