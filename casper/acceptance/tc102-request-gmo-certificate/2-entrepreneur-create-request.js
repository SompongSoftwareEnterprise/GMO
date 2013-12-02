var suite = require('../../helpers/suite')
var yaml = require('../../helpers/yaml')

/**
 * To make sure that the process to create certificate 1-1/2 is working correctly and request is saved to the DB.
 *
 * @actors  Entrepreneur
 * @fixture	account/entrepreneur-5555
 * @fixture	certificate_request/request111-8010-entre5555
 * @xref    uc106
 */

suite('To test that the process to create certificate 1-1/2 is working correctly and request is saved to the DB.', function(test) {

	//In progress

	var user = yaml.fixture('account/entrepreneur-5555')
	var certificate = yaml.fixture('certificate_request/request111-8010-entre5555')

	test.go('/', 'Go to login page.')
	test.login(user.my_user.data.username,user.my_user.data.password)
	test.wait("table","Entrepreneur-view-all-request page must be loaded.")

	test.clickTableLink(certificate.my_export_certificate_request.data.reference_id ,"go to the request detail page of requset id: " + certificate.my_export_certificate_request.data.reference_id)

	test.clickTableLink('Complete this Document','Click this link to 1-1/2 request page')

	test.wait('#new-request-form','Create-Request-From page must be shown')

	test.fillAndSubmit('#new-request-form','create-new-request-112','fill 1-1/2 form with the correct data')

	test.wait('table','View-Request-Information page must be shown')
})
