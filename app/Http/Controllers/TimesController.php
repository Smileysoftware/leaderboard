<?php

namespace App\Http\Controllers;

use App\Http\Requests\createTime;
use App\Time;
use App\User;
use Pusher\Pusher;

/**
 * Class TimesController
 * @package App\Http\Controllers
 */
class TimesController extends Controller
{
	/**
	 * @return $this
	 */
	public function create(  )
    {
    	$runners = User::fetchRunners();
    	$times = Time::fetchTodaysTimes();
    	$latest = Time::latest();

        return view('add-time')
	        ->with('runners' , $runners )
	        ->with('times' , $times )
	        ->with( 'latest' , $latest );
    }

	/**
	 * @param createTime $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function store( createTime $request )
    {
    	$data = $request->except('_token');

    	$id = Time::createEntry($data);

		$times = Time::fetchTodaysTimes();

		$options = array(
			'cluster' => 'eu',
			'encrypted' => true
		);
		$pusher =  new Pusher(
			'0411e30c5fbab3011642',
			'a5f6c21c7082da933f9e',
			'398096',
			$options
		);

	    $data['id'] = $id;
	    $data['times'] = $times;
	    $pusher->trigger('my-channel', 'my-event', $data);

    	return redirect('/add-times');

    }

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function delete( $id )
    {
        Time::where('id', $id)->delete();

	    return redirect('/add-times');
    }
}
