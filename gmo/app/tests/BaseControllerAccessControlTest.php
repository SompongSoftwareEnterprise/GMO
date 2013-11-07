<?php

use Symfony\Component\DomCrawler\Crawler;

class BaseControllerAccessControlTest extends TestCase {
	
	protected $database = true;

	public function setUp() {
		parent::setUp();
		$this->fixtures('login-data');
		$this->controller = App::make('BaseController');
	}
	
	private function assertLoginRedirect() {
		$response = $this->controller->checkLogin();
		$this->assertTrue($response->isMessageView);
		$this->assertEquals($response->action, 'LoginController@index');
	}

	private function assertNoLoginRedirect() {
		$response = $this->controller->checkLogin();
		$this->assertNull($response);
	}

	public function testCheckLoginWithNoACL() {
		Session::put('user_id', null);
		$this->assertNoLoginRedirect();
	}

	public function testCheckLoginNullUser() {
		Session::put('user_id', null);
		$this->assertLoginRedirects(true, true, true);
	}

	public function testCheckLoginWithCustomer() {
		Session::put('user_id', 1);
		$this->assertLoginRedirects(false, true, true);
	}

	public function testCheckLoginWithAgency() {
		Session::put('user_id', 2);
		$this->assertLoginRedirects(false, true, true);
	}

	public function testCheckLoginWithGMOStaff() {
		Session::put('user_id', 3);
		$this->assertLoginRedirects(true, false, true);
	}

	public function testCheckLoginWithLabStaff() {
		Session::put('user_id', 4);
		$this->assertLoginRedirects(true, true, false);
	}

	public function testCheckLoginWithInvalidId() {
		Session::put('user_id', 20);
		$this->assertLoginRedirects(true, true, true);
	}

	private function assertLoginRedirects($ent, $gmo, $lab) {
		$this->controller->testSetRequireEntrepreneur(true);
		$this->assertConditionalLoginRedirect($ent);
		$this->controller->testSetRequireEntrepreneur(false);

		$this->controller->testSetRequireGMOStaff(true);
		$this->assertConditionalLoginRedirect($gmo);
		$this->controller->testSetRequireGMOStaff(false);

		$this->controller->testSetRequireLabStaff(true);
		$this->assertConditionalLoginRedirect($lab);
		$this->controller->testSetRequireLabStaff(false);
	}

	private function assertConditionalLoginRedirect($mustLogin) {
		if ($mustLogin) {
			$this->assertLoginRedirect($this->controller);
		} else {
			$this->assertNoLoginRedirect($this->controller);
		}
	}

}


