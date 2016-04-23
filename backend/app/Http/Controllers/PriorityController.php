<?php

namespace App\Http\Controllers;

use App\Priority;
use Illuminate\Http\Request;

use App\Http\Requests;

class PriorityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $priorities = Priority::all();
        return $priorities->toJson();
    }
}
