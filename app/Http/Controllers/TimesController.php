<?php

namespace App\Http\Controllers;

use App\Http\Requests\createTime;
use App\Time;
use App\User;

class TimesController extends Controller
{
    public function create(  )
    {
    	$runners = User::fetchRunners();
    	$times = Time::fetchTodaysTimes();
    	
        return view('add-time')
	        ->with('runners' , $runners )
	        ->with('times' , $times );
    }

    public function store( createTime $request )
    {
    	$data = $request->except('_token');

    	Time::createEntry($data);

    	return redirect('/add-times');

    }
}
