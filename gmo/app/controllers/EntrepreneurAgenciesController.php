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

        public function createAgencies($entrepreneurID){
          $agencyID = Input::get('agency_id');
          $agency = Entrepreneur::where('user_id','=',$agencyID)->first();
          return View::make('account/add_agency')
                ->with('entrepreneurID',$entrepreneurID)
                ->with('agencyID',$agencyID)
                ->with('agency',$agency);
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
          return Redirect::action('EntrepreneurAccountController@index');

        }


        public function createAgenciesBySearch(){
          $customerID = Input::get('customer_id');
          $agencyID = Input::get('agency_id');
          $agency = Entrepreneur::where('user_id','=',$agencyID)->first();
          return View::make('account/add_agency')
                ->with('entrepreneurID',$customerID)
                ->with('agencyID',$agencyID)
                ->with('agency',$agency);
          /*
          return View::make('account/add_agency')
                ->with('agencyID',$agencyID)
                ->with('agency',$agency);
           */
        }

        public function create(){
          $agencyID = Input::get('agency_id');
          $customerID = Input::get('customer_id');
          DB::table('customer_agency')->insert(
            array('customer_id' => $customerID , 'agency_id' => $agencyID)
          );
          return Redirect::action('EntrepreneurAccountController@index');
        }

}



