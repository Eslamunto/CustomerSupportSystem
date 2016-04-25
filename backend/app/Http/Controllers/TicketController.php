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
    public function destroy($id)
    {
      
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
    
}
