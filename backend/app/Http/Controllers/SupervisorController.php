<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User as User;
use App\Team as Team;
use App\Department as Department;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator as Validator;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Support\Facades\Hash as Hash;
use Illuminate\Support\Facades\Session as Session;

use App\Status as Status;
use DB;

class SupervisorController extends Controller
{
    public function index(){
        $supervisors = User::where('role','=','1')->get();
        //$view = view('admin.adminA');
        $departments = Department::all();
        return response()
            ->view('admin.adminSupervisors', [ 'supervisors' => $supervisors, 'departments'=>$departments]);
//        return response()
//            ->view('admin.agentTest', [ 'agents' => $agents]);
    }
    public function show($id){
        $supervisor = User::find($id);
        return $supervisor->toJson();
    }
    public function getCreate(){
        $view = view('newagent');
        return $view;
    }
    public function postCreate(){
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email|unique:users',
            'teamid' => 'required|numeric',
            'password' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('indexSupervisors')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $supervisors = new User;
            $supervisors->name       = Input::get('name');
            $supervisors->email      = Input::get('email');
            $supervisors->password = Hash::make(Input::get('password'));
            $supervisors->role      = 1;
            $supervisors->teamid      = Input::get('teamid');
            $supervisors->save();
            $team = Team::find(Input::get('teamid'));
            $team->supervisorId = $supervisors->id;
            $team->save();
            // redirect
            Session::flash('message', 'Successfully created supervisor!');
            return redirect()->route('indexSupervisors');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id){
        $rules = array(
            'email'      => 'email',
            'teamId'    =>  'numeric',
            'role'      =>  'numeric'
        );
        $updateValidator = Validator::make(Input::all(), $rules);
        if ($updateValidator->fails()) {
            return redirect()->route('indexSupervisors')
                ->withErrors($updateValidator);
        }else {
            $name = Input::get('name');
            $password = Input::get('password');
            $email = Input::get('email');
            $role = Input::get('role');
            $teamid = Input::get('teamid');
            $supervisor = User::find($id);
            $supervisor->name = (!empty($name) && $name != '')
                ? $name
                : $supervisor->name;
            $supervisor->email = (!empty($email) && $email != '' && $email != $supervisor->email)
                ? $email
                : $supervisor->email;
            $supervisor->password = (!empty(Hash::make($password)) && $password != '')
                ? Hash::make($password)
                : $supervisor->password;
            $supervisor->role = (!empty($role) && $role != '')
                ? $role
                : $supervisor->role;
            $supervisor->teamId = (!empty($teamid) && $teamid != '')
                ? $teamid
                : $supervisor->teamId;
            $supervisor->save();
            Session::flash('message', 'Successfully update supervisor!');
            return redirect()->route('indexSupervisors');
        }

    }
    public function destroy($id){
        $supervisors = User::find($id);

        $supervisors->delete();
         Session::flash('message', 'Successfully deleted the Supervisor!');

        return redirect()->route('indexSupervisors');
    }


    public function getTeamAgents($id){
        $supervisor = User::find($id);
        $team_id = $supervisor->teamId;
        $agents = User::where('teamId', $team_id)->where('role', '2')->get();
        $tickets_statuses = Status::all();

        foreach ($agents as $agent) {   
            foreach ($tickets_statuses as $ticket_status) {
                $ticket_status_count = 
                    DB::table('user_tickets')->join('ticket', 'user_tickets.ticketId', '=', 'ticket.id')
                        ->where('user_tickets.userId', $agent->id)
                        ->where('ticket.statusId', $ticket_status->id)
                        ->count();
                $agents_tickets_with_Statuses[$agent->id][$ticket_status->id] = $ticket_status_count;
            }
        }

        return view('supervisor.supervisorAgents', compact('agents', 'tickets_statuses', 'agents_tickets_with_Statuses'));
    }
}