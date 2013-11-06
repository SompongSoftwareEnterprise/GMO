<?php

class LoginTest extends TestCase {
	
	protected $database = true;
	
	public function testLoginRedirect() {
		$this->fixtures('login-data');
		$this->assertLoginRedirect('u1', 'p1', 'EntrepreneurRequestsController@index');
		$this->assertLoginRedirect('u2', 'p2', 'EntrepreneurRequestsController@index');
		$this->assertLoginRedirect('u3', 'p3', 'StaffRequestsController@index');
		$this->assertLoginRedirect('u4', 'p4', 'LabController@index');
	}

	private function assertLoginRedirect($user, $pass, $action) {
		$this->action('POST', 'LoginController@login', array(
			'username' => $user,
			'password' => $pass
		));
		$this->assertRedirectedToAction($action);
	}
	
}


