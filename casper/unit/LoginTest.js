

var suite = require('../helpers/suite')

/**
 * To make sure that an error message is displayed when logging in with
 * incorrect username.
 *
 * @xref    ds202
 */
suite('Test Login with Correct Data', function(test) {

	test.go('/',                             'Go to login page.')
	test.assertDoesntExist('#login-errors',  'The errors box must not exist.')

	test.fillAndSubmit('#login-form', 'login_data_correct',
		'Log in using data from :name')
	test.wait('.entrepreneur-page', 'The entrepreneur home page must display.')

})

/**
 * To make sure that an error message is displayed when logging in with
 * incorrect username.
 *
 * @xref    ds202
 */
suite('Test Login with Invalid Username', function(test) {

	test.go('/',                             'Go to login page.')
	test.assertDoesntExist('#login-errors',  'The errors box must not exist.')

	test.fillAndSubmit('#login-form', 'login_data_invalid_user',
		'Log in using data from :name')
	test.wait('#login-errors', 'The errors box must show.')

})

/**
 * To make sure that an error message is displayed when logging in with
 * incorrect username.
 *
 * @xref    ds202
 */
suite('Test Login with Invalid Password', function(test) {

	test.go('/',                             'Go to login page.')
	test.assertDoesntExist('#login-errors',  'The errors box must not exist.')

	test.fillAndSubmit('#login-form', 'login_data_invalid_password',
		'Log in using data from :name')
	test.wait('#login-errors', 'The errors box must show.')

})

