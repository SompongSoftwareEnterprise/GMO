var suite = require('../../helpers/suite')
var yaml = require('../../helpers/yaml')

/**
 * To make sure that adding agency process is correct.
 *
 * @actors  Entrepreneur
 * @fixture	account/entrepreneur-5558
 * @fixture	account/agency-5556
 * @xref    uc103, uc104, ds109
 */

suite(' To make sure that the status of request is shown correctly.', function(test) {

	//In progress

	var user = yaml.fixture('account/entrepreneur-5558')
	var agency = yaml.fixture('account/agency-5556')

	test.go('/', 'Go to login page.')
	test.login(user.my_user.data.username,user.my_user.data.password)
	test.wait("table","Entrepreneur-view-all-request page must be loaded.")


	test.clickTableLink('AGENCY' ,"Click AGENCY header")

	test.assertTable('table', [])

	test.click('#add-agency','go to add-agency page'))



})
