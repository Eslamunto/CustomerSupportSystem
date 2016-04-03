<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator as Validator;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Support\Facades\Hash as Hash;
use Illuminate\Support\Facades\Session as Session;

class AgentController extends Controller
{
    public function index(){
        $agent = User::where('role','=','2')->get();
        return dd($agent);
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
            return redirect()->route('getCreateAgent')
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
            Session::flash('message', 'Successfully created nerd!');
            return redirect()->route('indexAgents');
        }
    }
    public function destroy($id){
        $agent = User::find($id);
        $agent->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the Agent!');
        return redirect()->route('indexAgent');
    }
}
