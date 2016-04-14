<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator as Validator;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Support\Facades\Hash as Hash;
use Illuminate\Support\Facades\Session as Session;

class SupervisorController extends Controller
{
    public function index(){
        $supervisors = User::where('role','=','1')->get();
        //$view = view('admin.adminAgents');
        return response()
            ->view('admin.adminSupervisors', [ 'supervisors' => $supervisors]);
    }
    public function getCreate(){
        $view = view('newsv');
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
            return redirect()->route('getCreateAgent')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $supervisor = new User;
            $supervisor->name       = Input::get('name');
            $supervisor->email      = Input::get('email');
            $supervisor->password = Hash::make(Input::get('password'));
            $supervisor->role      = 1;
            $supervisor->teamid      = Input::get('teamid');
            $supervisor->save();
            // redirect
            Session::flash('message', 'Successfully created Supervisor!');
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
        $supervisor = User::find($id);
        $supervisor->name = (! empty($name)) ? $name : $supervisor->name;
        $supervisor->name = (!empty($email))? Input::get('email') : $supervisor->email;
        $supervisor->name = (!empty(Hash::make($password)))? Hash::make($password) : $supervisor->password;
        $supervisor->name = (!empty($role))? $role: $supervisor->role;
        $supervisor->name = (!empty($teamid))? $teamid: $supervisor->teamid;
        $supervisor->save();
        Session::flash('message', 'Successfully update supervisor!');
        return redirect()->route('indexAgents');

    }
    public function destroy($id){
        $supervisor = User::find($id);
        $supervisor->delete();
        // redirect
        // Session::flash('message', 'Successfully deleted the Agent!');
        return redirect()->route('indexSupervisors');
    }
}
