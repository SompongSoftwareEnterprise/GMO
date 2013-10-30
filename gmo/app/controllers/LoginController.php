<?php

class LoginController extends BaseController {

	public function index() {
		return View::make('login');
	}

	public function login() {
		$username = Input::get('username');
		$password = Input::get('password');
		return 'login as ' . $username . ' with password ' . $password;
	}

}
