var suite = require('../../helpers/suite')
var yaml = require('../../helpers/yaml')

/**
 * To make sure that the process to create a certificate request (1-1/1) is working correctly and the request save to DB.
 *
 * @actors  Entrepreneur
 * @fixture	account/entrepreneur-5555
 * @xref    uc106
 */

suite('Test that all certificate request data show correctly.', function(test) {


	var user = yaml.fixture('account/entrepreneur-5555')
	test.go('/', 'Go to login page.')
	test.login(user.my_user.data.username,user.my_user.data.password)
	test.wait("table","Entrepreneur-view-all-request page must be loaded.")

	test.click("#make-new-request-button",'go to make-new-request page')

	test.wait('#new-request-form','new-request-form must be shown')

	test.fillAndSubmit('#new-request-form', 'create-new-request-111-invalid','fill form with the uncorrect data')

	test.wait('.panel.panel-danger.error-box','error box must be shown')

	test.fillAndSubmit('#new-request-form', 'create-new-request-111','fill form with the correct data')

	test.wait('table','request-information page must be shown.')
})
