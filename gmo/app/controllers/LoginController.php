<?php

class LoginController extends BaseController {

	public function index() {
		return View::make('login');
	}

	private $target = array(
		'GMO Staff' => 'StaffRequestsController@index',
		'Agency' => 'EntrepreneurRequestsController@index',
		'Customer' => 'EntrepreneurRequestsController@index',
		'Lab Staff' => 'LabController@index',
	);

	public function login() {
		$username = Input::get('username');
		$password = Input::get('password');
		$user = User::where('username', $username)->first();
		if ($user && Hasher::checkHash($password, $user->password_salt, $user->password_hash)) {
			return Redirect::action($this->target[$user->role]);
		} else {
			$bag = new Illuminate\Support\MessageBag;
			$bag->add('username', 'Invalid username or password.');
			return Redirect::action('LoginController@index')->withErrors($bag);
		}
	}

}
