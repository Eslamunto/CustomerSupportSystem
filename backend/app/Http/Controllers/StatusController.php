<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Status as Status;
use Illuminate\Support\Facades\Validator as Validator;
use Illuminate\Support\Facades\Session as Session;
use Illuminate\Support\Facades\Auth as Auth;
use App\User as User;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'color' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('adminSettings')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            $input = $request->all();
            $status = Status::create($input);

            //Logic for notifications
            $user = Auth::user();
            $users_to_be_notified = User::where('id', '!=', $user->id)->get();
        
            $user->newNotification($users_to_be_notified)
                ->withType('new.Ticket.status')
                ->withSubject('New Ticket Status')
                ->withBody($user->name . ' added ' . $request->name . ' status to the system.')
                ->regarding($status)
                ->send();

            Session::flash('message', 'Ticket Status ' . $request->name . ' is created Successfully !');
            return redirect()->route('adminSettings');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required_without_all:color',
            'color' => 'required_without_all:name'
        ]);

        if ($validator->fails()) {
            return redirect()->route('adminSettings')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            $status = Status::find($id);
            if($request->name != '')
                $status->name = $request->name;
            if($request->color != '#00aabb')
                $status->color = $request->color;
            $status->save();

            Session::flash('message', 'Ticket Status is updated Successfully !');
            return redirect()->route('adminSettings');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = Status::find($id);
        $status->delete();

        Session::flash('message', 'Ticket Status is deleted successfully !');
        return redirect()->route('adminSettings');
    }
}
