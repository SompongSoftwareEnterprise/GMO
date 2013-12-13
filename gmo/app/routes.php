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

Route::post('/test/seed', function() {
	App::make('DatabaseSeeder')->run();
	return 'ok';
});

Route::get('/test/message', function() {
	return MessageView::make('Something is wrong, eh?', 'HomeController@homePage', 'Go Home')
		->with('back', true);
});

Route::get('/', 'LoginController@index');
Route::post('/login', 'LoginController@login');

Route::get('/test/home', 'HomeController@homePage');

// register

Route::get('/staff/register',           'RegistrationController@index');
Route::get('/staff/register/customer', 	'RegistrationController@registerCustomer');
Route::get('/staff/register/agency',   	'RegistrationController@registerAgency');
Route::post('/staff/register',         	'RegistrationController@submitRegister');

//Report
Route::get('/staff/report',         	'StaffReportController@index');
Route::get('/staff/report/1',         	'StaffReportController@reportPlantList');
Route::get('/staff/report/2',         	'StaffReportController@reportLabRequest');
Route::get('/staff/report/3',         	'StaffReportController@reportNonGmo');
Route::get('/staff/report/4',         	'StaffReportController@reportDomestic');
Route::get('/staff/report/5',         	'StaffReportController@reportDestinationCountry');


//account
Route::get('/entrepreneur/account',    		'EntrepreneurAccountController@index');
// Route::get('/entrepreneur/edit_account',	'EntrepreneurAccountController@edit_account');
Route::get('/entrepreneur/edit_account', 'EntrepreneurAccountController@editAccount');
Route::post('/entrepreneur/save_account', 'EntrepreneurAccountController@saveAccount');

Route::get('/lab', 'LabController@index');
Route::get('/lab/task/{id}', 'LabController@show');
Route::get('/lab/task/{id}/start', 'LabController@start');
Route::get('/lab/task/result/{id}/{status}', 'LabController@result');

// entrepreneur request
Route::get('/entrepreneur', 'EntrepreneurRequestsController@index');
Route::post('/entrepreneur/search', 'EntrepreneurRequestsController@search');
// Route::get('/entrepreneur/requests/new', 'EntrepreneurRequestsController@newRequests');
Route::get('/entrepreneur/requests/new', array(
	'as' => 'entrepreneur.new',
	'uses' => 'EntrepreneurRequestsController@newRequests'
));
Route::get('/entrepreneur/requests/new/{id}', array(
	'as' => 'entrepreneur.new.info',
	'uses' => 'EntrepreneurRequestsController@newRequestsInfo'
));
Route::get('/entrepreneur/requests/{id}', array(
	'as' => 'entrepreneur.requests.show',
	'uses' => 'EntrepreneurRequestsController@show'
));
Route::post('/entrepreneur/requests', array(
	'as' => 'entrepreneur.requests.create',
	'uses' => 'EntrepreneurRequestsController@create'
));
Route::post('/entrepreneur/requests/{id}', array(
	'as' => 'entrepreneur.requests.create.info',
	'uses' => 'EntrepreneurRequestsController@createCertificateInfo'
));
Route::get('/entrepreneur/requests/invoice/{id}', array(
	'as' => 'entrepreneur.requests.invoice',
	'uses' => 'EntrepreneurRequestsController@showInvoice'
));
Route::get('/entrepreneur/requests/receipt/{id}', array(
	'as' => 'entrepreneur.requests.receipt',
	'uses' => 'EntrepreneurRequestsController@showReceipt'
));
Route::get('/entrepreneur/requests/result/{id}', array(
	'as' => 'entrepreneur.requests.result',
	'uses' => 'EntrepreneurRequestsController@showResult'
));

//domestic request
Route::get('/entrepreneur/dmt-requests/new', array(
    'as' => 'entrepreneur.dmt.new',
    'uses' => 'EntrepreneurDomesticRequestsController@newRequests'
));
//Route::get('/entrepreneur/dmt-requests/new/{id}', array(
//	'as' => 'entrepreneur.dmt.new.info',
//	'uses' => 'EntrepreneurDomesticRequestsController@newRequestsInfo'
//));
Route::get('/entrepreneur/dmt-requests/{id}', array(
	'as' => 'entrepreneur.dmt.requests.show',
	'uses' => 'EntrepreneurDomesticRequestsController@show'
));
Route::post('/entrepreneur/dmt-requests', array(
	'as' => 'entrepreneur.dmt.requests.create',
	'uses' => 'EntrepreneurDomesticRequestsController@create'
));
Route::post('/entrepreneur/dmt-requests/{id}', array(
	'as' => 'entrepreneur.dmt.requests.create.info',
	'uses' => 'EntrepreneurDomesticRequestsController@createCertificateInfo'
));
Route::get('/entrepreneur/dmt-requests/invoice/{id}', array(
	'as' => 'entrepreneur.dmt.requests.invoice',
	'uses' => 'EntrepreneurDomesticRequestsController@showInvoice'
));
Route::get('/entrepreneur/dmt-requests/receipt/{id}', array(
	'as' => 'entrepreneur.dmt.requests.receipt',
	'uses' => 'EntrepreneurDomesticRequestsController@showReceipt'
));
Route::get('/entrepreneur/dmt-requests/result/{id}', array(
	'as' => 'entrepreneur.dmt.requests.result',
	'uses' => 'EntrepreneurDomesticRequestsController@showResult'
));
    
//Entre view req
    Route::get('/entrepreneur/requests/{id}/{type}/result/new', array(
	'as' => 'entrepreneur.result.new',
	'uses' => 'EntreprenuerRequestsController@newResult'
));
Route::post('/entrepreneur/requests/{id}/{type}/result', array(
	'as' => 'entrepreneur.result.create',
	'uses' => 'EntreprenuerRequestsController@createResult'
));
    


// gmo staff requests
Route::get('/staff', 'StaffRequestsController@index');
Route::get('/staff/requests/{id}', array(
	'as' => 'staff.requests.show',
	'uses' => 'StaffRequestsController@show'
));
Route::get('/staff/requests/{id}/invoice', array(
	'as' => 'staff.requests.invoice',
	'uses' => 'StaffRequestsController@createInvoice'
));
Route::get('/staff/requests/{id}/receipt', array(
	'as' => 'staff.requests.receipt',
	'uses' => 'StaffRequestsController@createReceipt'
));
Route::get('staff/requests/{id}/labtask/new', array(
	'as' => 'staff.labtask.new',
	'uses' => 'StaffRequestsController@newLabTask'
));
Route::post('staff/requests/{id}/labtask', array(
	'as' => 'staff.labtask.create',
	'uses' => 'StaffRequestsController@createLabTask'
));
Route::get('staff/requests/{id}/{type}/result/new', array(
	'as' => 'staff.result.new',
	'uses' => 'StaffRequestsController@newResult'
));
Route::post('staff/requests/{id}/{type}/result', array(
	'as' => 'staff.result.create',
	'uses' => 'StaffRequestsController@createResult'
));
Route::get('staff/request/{id}/result/view', array(
	'as' => 'staff.result.view',
	'uses' => 'StaffRequestsController@viewResult'
));

Route::get('/test/running_number', function() {
	return 'NG' . RunningNumber::increment('default');
});

/*
Route::get('/entrepreneur/account/agencies','EntrepreneurAgenciesController@agencies');
Route::post('/entrepreneur/account/agencies','EntrepreneurAgenciesController@createAgencies');
Route::post('/entrepreneur/account/agencies/{id}/delete','EntrepreneurAgenciesController@deleteAgencies');
*/

Route::get('/entrepreneur/account/{entrepreneurID}/{agencyID}','EntrepreneurAgenciesController@deleteAgencies');
Route::get('/entrepreneur/account/{entrepreneurID}','EntrepreneurAgenciesController@createAgencies');

Route::post('/entrepreneur/account/search','EntrepreneurAgenciesController@createAgenciesBySearch');
Route::post('/entrepreneur/account/create','EntrepreneurAgenciesController@create');
Route::post('/entrepreneur/account/delete','EntrepreneurAgenciesController@delete');

//View & Upload Lab Task
Route::get('/lab/test', 'LabController@viewLabResult');
Route::post('/lab/test', 'LabController@uploadLabResult');
Route::pattern('filename', '.+');
Route::get('/lab/test/load/{filename}', 'LabController@downloadLabResult');

Route::get('/staff/requests/view/{form}/{id}', 'StaffRequestsController@view');


