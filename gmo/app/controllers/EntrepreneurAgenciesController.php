<?php

class EntrepreneurAgenciesController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	| | You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getCurrentEntrepreneur() {
		return Entrepreneur::all()->first();
	}

	public function __construct() {
		$this->entrepreneur = $this->getCurrentEntrepreneur();
	}

        public function agencies(){
          return View::make('account/revoke_agency');
        }

        public function createAgencies(){
          return View::make('account/add_agency');
        }

        public function deleteAgencies($entrepreneurID,$agencyID){
          $agency = Entrepreneur::where('user_id','=',$agencyID)->first();
            return View::make('account/revoke_agency')
                          ->with('agency',$agency)
                          ->with('entrepreneurID',$entrepreneurID);
        }


        public function delete(){
          //$user = CustomerAgency::where('customer_id','=',$Input::get('customer_id'))->where('agency_id','=',$Input::get('agency_id'))->first();
          $customerID = Input::get('customer_id');
          $agencyID = Input::get('agency_id');
          $user = CustomerAgency::where('customer_id','=',$customerID)->where('agency_id','=',$agencyID)->first();
          print_r($user);
          $user->delete();
//          dd($user);
          return Redirect::action('EntrepreneurAccountController@index');

        }
}
