<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Time
 * @package App
 */
class Time extends Model
{

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function runner()
	{
		return $this->hasOne('App\User' , 'id');
	}

	/**
	 * @param $data
	 */
	public static function createEntry( $data )
    {
        $t = new Time;

        $t->user_id = $data['runner'];
        $t->time = $data['time'];

        $t->save();
    }

	/**
	 * @return mixed
	 */
	public static function fetchTodaysTimes( )
    {
    	$times = Time::with('runner')->whereRaw(" `created_at` > date('now') ")->get();
	    
	    return $times;

    }
}
