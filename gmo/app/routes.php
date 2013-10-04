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
Route::get('/staff/register',          		'RegistrationController@index');
Route::get('/staff/register/customer', 		'RegistrationController@registerCustomer');
Route::get('/staff/register/agency',   		'RegistrationController@registerAgency');
Route::post('/staff/register',         		'RegistrationController@submitRegister');
Route::get('/entrepreneur/account',    		'EntrepreneurController@index');
// Route::get('/entrepreneur/edit_account',	'EntrepreneurController@edit_account');
Route::post('/entrepreneur/edit_account', array(
	'as' => 'entrepreneur.edit',
  'uses' => 'EntrepreneurController@edit_account'
  
));
