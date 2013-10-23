<?php

class BaseController extends Controller {

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

	public function getCurrentEntrepreneur() {
		// TODO: Implement code for Login System
		return Entrepreneur::all()->first();
	}

	public function __construct() {
		$this->entrepreneur = $this->getCurrentEntrepreneur();
	}
    
}