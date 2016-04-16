<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;

use Abraham\TwitterOAuth\TwitterOAuth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 0){
            return redirect('/admin');
        }elseif(Auth::user()->role == 1){
            return redirect('/supervisor');
        }elseif(Auth::user()->role == 2){
            return redirect('/agent');
        }
    }
}
