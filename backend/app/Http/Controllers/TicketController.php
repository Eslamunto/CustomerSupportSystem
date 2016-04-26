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
    public function destroy($id)
    {
      
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
    
}
