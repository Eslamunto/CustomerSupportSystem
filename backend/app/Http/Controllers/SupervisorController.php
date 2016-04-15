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
    public function update($id){
        $name = Input::get('name');
        $password = Input::get('password');
        $email = Input::get('email');
        $role = Input::get('role');
        $teamid = Input::get('teamid');
        $supervisors = User::find($id);
        $supervisors->name = (! empty($name)) ? $name : $supervisors->name;
        $supervisors->name = (!empty($email))? Input::get('email') : $supervisors->email;
        $supervisors->name = (!empty(Hash::make($password)))? Hash::make($password) : $supervisors->password;
        $supervisors->name = (!empty($role))? $role: $supervisors->role;
        $supervisors->name = (!empty($teamid))? $teamid: $supervisors->teamid;
        $supervisors->save();
        Session::flash('message', 'Successfully update supervisor!');
        return redirect()->route('indexSupervisors');

    }
    public function destroy($id){
        $supervisors = User::find($id);

        $supervisors->delete();
        // Session::flash('message', 'Successfully deleted the Agent!');

        return redirect()->route('indexSupervisors');
    }
}