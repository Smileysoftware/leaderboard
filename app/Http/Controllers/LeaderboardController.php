<?php

namespace App\Http\Controllers;

use App\Time;

/**
 * Class LeaderboardController
 * @package App\Http\Controllers
 */
class LeaderboardController extends Controller
{
	/**
	 * @return $this
	 */
	public function index(  )
    {
	    $times = Time::fetchTodaysTimes();
	    
    	return view('leaderboard')->with('times' , $times );
    }
}
