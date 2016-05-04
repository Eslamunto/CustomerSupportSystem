<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\SocialProvider as SocialProvider;
use App\Status as Status;
use App\Priority as Priority;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $twitter_account = SocialProvider::where('provider', 'twitter')->get()->first();
        $statuses = Status::all();
        $priorities = Priority::all();

        return view('admin.adminSettings', compact('twitter_account', 'statuses', 'priorities'));
    }
}
