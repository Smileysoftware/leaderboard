<?php

namespace App\Http\Controllers;

use App\Http\Requests\createRunner;
use App\User;

/**
 * Class RunnerController
 * @package App\Http\Controllers
 */
class RunnerController extends Controller
{
	/**
	 * @return $this
	 */
	public static function create(  )
    {
    	$runners = User::fetchRunners();

        return view('add-runner')
	        ->with('runners' , $runners);
    }

	/**
	 * @param createRunner $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public static function store( createRunner $request )
    {
		$data = $request->except('_token');

		User::createRunner( $data );

		return redirect('/add-runner');

    }

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public static function delete( $id )
    {
    	$runner = User::where('id' , $id)->where('runner' , 1)->first();

    	$runner->delete();

	    return redirect('/add-runner');

    }
    
    public static function edit( $id )
    {
        dd( 'This needs doing' );
	}
}
