<?php

class BaseController extends Controller {

	protected $requireEntrepreneur = false;
	protected $requireGMOStaff = false;
	protected $requireLabStaff = false;

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function getCurrentUser() {
		$id = Session::get('user_id');
		if (empty($id)) return null;
		return User::find($id);
	}

	public function getCurrentEntrepreneur() {
		$id = Session::get('user_id');
		if (empty($id)) return null;
		return Entrepreneur::where('user_id', $id)->first();
	}

	private function createACLRedirect($role) {
		return MessageView::make("Unauthorized. You must be $role",
			'LoginController@index', 'Log In', 'log-in');
	}

	public function	checkLogin() {
		$action = 'LoginController@index';
		if ($this->requireEntrepreneur) {
			$entrepreneur = $this->getCurrentEntrepreneur();
			if (empty($entrepreneur)) {
				return $this->createACLRedirect('an entrepreneur');
			}
		}
		if ($this->requireGMOStaff) {
			$user = $this->getCurrentUser();
			if (empty($user) || $user->role != 'GMO Staff') {
				return $this->createACLRedirect('a GMO staff');
			}
		}
		if ($this->requireLabStaff) {
			$user = $this->getCurrentUser();
			if (empty($user) || $user->role != 'Lab Staff') {
				return $this->createACLRedirect('a lab staff');
			}
		}
	}

	public function __construct() {
		$this->entrepreneur = $this->getCurrentEntrepreneur();
		$this->user = $this->getCurrentUser();
		View::share('user_name', $this->user ? $this->user->name : 'Guest');
		$this->beforeFilter(function() {
			return $this->checkLogin();
		});
	}
    
	// These functions are for testing purposes, and not for using
	// in normal situations.
	public function testSetRequireEntrepreneur($requireEntrepreneur) {
		$this->requireEntrepreneur = $requireEntrepreneur;
	}
	public function testSetRequireGMOStaff($requireGMOStaff) {
		$this->requireGMOStaff = $requireGMOStaff;
	}
	public function testSetRequireLabStaff($requireLabStaff) {
		$this->requireLabStaff = $requireLabStaff;
	}

}
