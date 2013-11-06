<?php

class LoginController extends BaseController {

	public function index() {
		return View::make('login');
	}

	public function login() {
		$username = Input::get('username');
		$password = Input::get('password');
		$user = User::where('username', $username)->first();
		if (Hasher::checkHash($password, $user->password_salt, $user->password_hash)) {
			return Redirect::action('EntrepreneurRequestsController@index');
		} else {
			$bag = new Illuminate\Support\MessageBag;
			$bag->add('username', 'Invalid username or password.');
			return Redirect::action('LoginController@index')->withErrors($bag);
		}
	}

}
