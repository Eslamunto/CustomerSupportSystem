<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team as Team;
use App\Http\Requests;

class TeamController extends Controller
{
    public function departmentTeam ($departmentId){
        $teams = Team::where('departmentId','=',$departmentId)->get();
        return $teams->toJson();
    }
}
