var suite = require('../../helpers/suite')
var yaml = require('../../helpers/yaml')

/**
 * To make sure that the status of request is shown correctly.
 *
 * @actors  Entrepreneur
 * @fixture	account/entrepreneur-5555
 * @fixture	certificate_request/request111-8010-entre5555
 * @xref    uc107
 */

suite(' To make sure that the status of request is shown correctly.', function(test) {

	//In progress

	var user = yaml.fixture('account/entrepreneur-5555')
	var certificate = yaml.fixture('certificate_request/request111-8010-entre5555')

	test.go('/', 'Go to login page.')
	test.login(user.my_user.data.username,user.my_user.data.password)
	test.wait("table","Entrepreneur-view-all-request page must be loaded.")

	test.clickTableLink("" + certificate.my_export_certificate_request.data.reference_id ,"go to the request detail page of requset id: " + certificate.my_export_certificate_request.data.reference_id)

	test.wait("table","Request-detail page must be load")

	test.assertTable('table', [{}])

})
