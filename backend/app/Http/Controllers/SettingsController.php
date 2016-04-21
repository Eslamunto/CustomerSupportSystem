<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\SocialProvider as SocialProvider;

use App\Status as Status;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $twitter_account = SocialProvider::where('provider', 'twitter')->get();
        $statuses = Status::all();

        return view('admin.adminSettings')->with('twitter_account', $twitter_account->first())
        	->with('statuses', $statuses);
    }
}
