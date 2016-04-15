<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User as User;
use App\Department as Department;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator as Validator;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Support\Facades\Hash as Hash;
use Illuminate\Support\Facades\Session as Session;

class AgentController extends Controller
{
    public function index(){
        $agents = User::where('role','=','2')->get();
        //$view = view('admin.adminAgents');
        $departments = Department::all();
        return response()
            ->view('admin.adminAgents', [ 'agents' => $agents, 'departments'=>$departments]);
//        return response()
//            ->view('admin.agentTest', [ 'agents' => $agents]);
    }
    public function getCreate(){
        $view = view('newagent');
        return $view;
    }
    public function postCreate(){
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'teamid' => 'required|numeric',
            'password' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('indexAgents')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $agent = new User;
            $agent->name       = Input::get('name');
            $agent->email      = Input::get('email');
            $agent->password = Hash::make(Input::get('password'));
            $agent->role      = 2;
            $agent->teamid      = Input::get('teamid');
            $agent->save();
            // redirect
            Session::flash('message', 'Successfully created agent!');
            return redirect()->route('indexAgents');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id){
        $name = Input::get('name');
        $password = Input::get('password');
        $email = Input::get('email');
        $role = Input::get('role');
        $teamid = Input::get('teamid');
        $agent = User::find($id);
        $agent->name = (! empty($name)) ? $name : $agent->name;
        $agent->name = (!empty($email))? Input::get('email') : $agent->email;
        $agent->name = (!empty(Hash::make($password)))? Hash::make($password) : $agent->password;
        $agent->name = (!empty($role))? $role: $agent->role;
        $agent->name = (!empty($teamid))? $teamid: $agent->teamid;
        $agent->save();
        Session::flash('message', 'Successfully update agent!');
        return redirect()->route('indexAgents');

    }
    public function destroy($id){
        $agent = User::find($id);

            $agent->delete();
            // Session::flash('message', 'Successfully deleted the Agent!');

        return redirect()->route('indexAgents');
    }
}