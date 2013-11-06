<?php

class LoginTest extends TestCase {
	
	protected $database = true;
	
	public function testLoginRedirect() {
		$this->fixtures('login-data');
		$this->assertLoginRedirect('u1', 'p1', 'EntrepreneurRequestsController@index', 1);
		$this->assertLoginRedirect('u2', 'p2', 'EntrepreneurRequestsController@index', 2);
		$this->assertLoginRedirect('u3', 'p3', 'StaffRequestsController@index', 3);
		$this->assertLoginRedirect('u4', 'p4', 'LabController@index', 4);
	}

	public function testLoginFail() {
		$this->fixtures('login-data');
		$this->assertLoginFailure('u1', 'p2');
		$this->assertLoginFailure('u2', 'p1');
	}

	private function assertLoginFailure($user, $pass) {
		$this->login($user, $pass);
		$this->assertRedirectedToAction('LoginController@index');
		$this->assertSessionHasErrors();
		$this->assertNull(Session::get('user_id'));
	}

	private function assertLoginRedirect($user, $pass, $action, $user_id) {
		$this->login($user, $pass);
		$this->assertRedirectedToAction($action);
		$this->assertSessionHas('user_id', $user_id);
	}

	private function login($user, $pass) {
		$this->action('POST', 'LoginController@login', array(
			'username' => $user,
			'password' => $pass
		));
	}
	
}


