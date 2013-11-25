var suite = require('../../helpers/suite')
var yaml = require('../../helpers/yaml')

/**
 * To make sure that all certificate request data show correctly.
 *
 * @actors  Entrepreneur
 * @fixture	account/entrepreneur-5555
 * @xref    uc105
 */

suite('Test that all certificate request data show correctly.', function(test) {

	var user = yaml.fixture('account/entrepreneur-5555')
	var certificate = yaml.fixture('certificate_request/request111-8010-entre5555')
	console.log(user.my_user)
	test.go('/', 'Go to login page.')
	test.login(user.my_user.data.username,user.my_user.data.password)
	test.wait("table","Entrepreneur-view-all-request page must be loaded.")

	console.log( user.my_entrepreneur.data.first_name + ' ' + user.my_entrepreneur.data.last_name )

	test.assertTable('table', [{}])

})
