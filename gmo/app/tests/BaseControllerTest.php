<?php

class BaseControllerTest extends TestCase {
	
	protected $database = true;
	
	public function testGetCurrentEntrepreneur() {

		$this->fixtures('login-data');
		$controller = App::make('BaseController');

		Session::put('user_id', null);
		$this->assertNull($controller->getCurrentEntrepreneur());

		Session::put('user_id', 1);
		$this->assertEquals($controller->getCurrentEntrepreneur()->user->id, 1);

		Session::put('user_id', 2);
		$this->assertEquals($controller->getCurrentEntrepreneur()->user->id, 2);

		Session::put('user_id', 3);
		$this->assertNull($controller->getCurrentEntrepreneur());

	}

}


