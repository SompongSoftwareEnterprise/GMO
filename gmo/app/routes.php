<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@homePage');

// register
Route::get('/staff/register',           'RegistrationController@index');
Route::get('/staff/register/customer', 	'RegistrationController@registerCustomer');
Route::get('/staff/register/agency',   	'RegistrationController@registerAgency');
Route::post('/staff/register',         	'RegistrationController@submitRegister');

Route::get('/entrepreneur/account',    		'EntrepreneurController@index');
// Route::get('/entrepreneur/edit_account',	'EntrepreneurController@edit_account');
Route::get('/entrepreneur/edit_account', array(
	'as' => 'entrepreneur.edit',
  'uses' => 'EntrepreneurController@editAccount'
));
Route::post('/entrepreneur/save_account', array(
	'as' => 'entrepreneur.save',
  'uses' => 'EntrepreneurController@saveAccount'
));

Route::get('/lab', 'LabController@index');
Route::get('/lab/task/:id', 'LabController@show');
Route::get('/lab/labtasks', 'LabController@index');

// entrepreneur request
Route::get('/entrepreneur', 'EntrepreneurRequestsController@index');
Route::get('/entrepreneur/requests/new', 'EntrepreneurRequestsController@newRequests');
Route::get('/entrepreneur/requests/{id}', array(
	'as' => 'entrepreneur.requests.show',
	'uses' => 'EntrepreneurRequestsController@show'
));
Route::post('/entrepreneur/requets/{form_id}', array(
	'as' => 'entrepreneur.requests.create',
	'uses' => 'EntrepreneurRequestsController@create'
));

// gmo staff requests
Route::get('/staff', 'StaffRequestsController@index');
Route::get('/staff/requests/{id}', array(
	'as' => 'staff.requests.show',
	'uses' => 'StaffRequestsController@show'
));
Route::post('/staff/requests/{id}/confirm', array(
	'as' => 'staff.requests.comfirm',
	'uses' => 'StaffRequestsController@confirm'
));
Route::post('/staff/requests/{id}/receipt', array(
	'as' => 'staff.requests.receipt',
	'uses' => 'StaffRequestsController@createReceipt'
));
