<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call( UsersTableSeeder::class );
	}
}


class UsersTableSeeder extends  Seeder{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->insert([
			'firstname' => 'Lyle',
			'surname' => 'Barras',
			'email' => 'lyle.barras@barrasweb.co.uk',
			'dob' => '16/6/77',
			'password' => bcrypt('123123123'),
		]);
	}

}