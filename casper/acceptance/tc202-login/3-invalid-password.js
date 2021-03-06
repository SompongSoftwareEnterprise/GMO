
var suite = require('../../helpers/suite')

/**
 * To make sure that an error message is displayed when logging in with an
 * incorrect password.
 *
 * @actors  Any User
 * @fixture entrepreneur-1
 * @xref    uc203, ds202
 */
suite('Test Login with Invalid Password', function(test) {

	test.go('/',                             'Go to login page.')
	test.assertDoesntExist('#login-errors',  'The errors box must not exist.')

	test.fillAndSubmit('#login-form', 'login-data-invalid-password',
		'Log in using data from :name')
	test.wait('#login-errors', 'The errors box must show.')

})

