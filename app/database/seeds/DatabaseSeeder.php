<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('HomesTableSeeder');
		$this->call('WorksTableSeeder');
		$this->call('Work_picturesTableSeeder');
		$this->call('AboutsTableSeeder');
		$this->call('ServicesTableSeeder');
		$this->call('PostsTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('Work_typesTableSeeder');
	}

}
