<?php

namespace App\Http\Controllers;

use App\Http\Requests\createRunner;
use App\User;

class RunnerController extends Controller
{
    public static function create(  )
    {
    	$runners = User::fetchRunners();

        return view('add-runner')
	        ->with('runners' , $runners);
    }

    public static function store( createRunner $request )
    {
		$data = $request->except('_token');

		User::createRunner( $data );

		return redirect('/add-runner');

    }
}
