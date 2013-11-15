
var suite = require('../../helpers/suite')

/**
 * To make sure that all lab request data persent correctly.
 *
 * @actors  Lab Staff
 * @fixture tc107-1-lab-staff-list-request
 * @xref    uc117 , ds117
 */
suite('Test Login with Invalid Username', function(test) {

	test.go('/', 'Go to login page.')
	test.login('lab', 'lab')
	test.assertExists('#myTabContent',  'Request table in Lab request page must be found.')

	test.fillAndSubmit('#login-form', 'login-data-invalid-user',
		'Log in using data from :name')
	test.wait('#login-errors', 'The errors box must show.')

})
