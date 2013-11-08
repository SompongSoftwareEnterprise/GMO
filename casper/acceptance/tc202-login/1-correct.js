
var suite = require('../../helpers/suite')

/**
 * To make sure that an entrepreneur is logged in to the system
 * when a correct username and password is entered.
 *
 * @fixture entrepreneur-1
 * @actors  Any User
 * @xref    uc202, ds202
 */
suite('Test Login with Correct Data', function(test) {

	test.go('/',                             'Go to login page.')
	test.assertDoesntExist('#login-errors',  'The errors box must not exist.')

	test.fillAndSubmit('#login-form', 'login-data-correct',
		'Log in using data from :name')
	test.wait('.entrepreneur-page', 'The entrepreneur home page must display.')

})


