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

		$this->call('EntrepreneurSeeder');
	}

}

class EntrepreneurSeeder extends Seeder {
	
	public function run() {
		Entrepreneur::create(array(
			'user_id' => User::create(array(
				'username' => 'entre1',
				'password_hash' => '',
				'password_salt' => '',
				'name' => 'Wolfgang Gangwolf',
				'role' => 'Customer'
			))->id,
			'is_agency' => 0,
			'is_company' => 0,
			'first_name' => 'Wolfgang',
			'last_name' => 'Gangwolf',
			'sex' => 'M',
			'nationality' => 'Thai',
			'date_of_birth' => '1987-11-11',
			'address1' => '123/45 Happy Meal, McDonald\'s, Starbucks',
			'address2' => 'Carbonara, The Pizza Company, 11111',
			'city' => 'Lat Yao',
			'zip' => '11111',
			'province' => 'Bangkok',
			'country' => 'Thailand',
			'email' => 'wolfgang@gangwolf.co.th',
			'phone' => '02-345-6789',
			'fax' => '02-345-6790',
			'mobile' => '087-654-3210',
		));
	}
	
}
