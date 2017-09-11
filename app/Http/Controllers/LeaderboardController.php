<?php

namespace App\Http\Controllers;

use App\Time;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index(  )
    {
	    $times = Time::fetchTodaysTimes();
	    
    	return view('leaderboard')->with('times' , $times );
    }
}
