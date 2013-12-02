var suite = require('../../helpers/suite')
var yaml = require('../../helpers/yaml')

/**
 * To make sure that all request data presneted correctly.
 *
 * @actors  GMO staff
 * @fixture	account/entrepreneur-5555
 * @fixture	account/gmo-staff-6666
 * @fixture	certificate_request/request111-8010-entre5555
 * @fixture	certificate_request/request112-9010-form8010-entre5555
 * @xref    uc108
 */ 
suite(' To make sure that the status of request is shown correctly.', function(test) {

	//In progress

	var user = yaml.fixture('account/entrepreneur-5555')
	var certificate = yaml.fixture('certificate_request/request111-8010-entre5555')
	var info = yaml.fixture('certificate_request/request112-9010-form8010-entre5555')
	var staff = yaml.fixture('account/gmo-staff-6666')

	test.go('/', 'Go to login page.')
	test.login(staff.my_user.data.username,staff.my_user.data.password)

	test.wait("table","GMO-Staff-view-all-request page must be loaded.")


	test.assertTable('table', [
		{
			'Request ID' :    certificate.my_export_certificate_request.data.reference_id,
			//'Plant Name' :    info.my_export_certificate_request_info_form.data.common_name,
			'Plant Name' :    '-',
			'Entrepreneur' :   user.my_user.data.name,
			//'Status' :     certificate.my_export_certificate_request.data.status
			'Status' :     '>Passed'
		}
	])
	
	
	//test.clickTableLink(certificate.my_export_certificate_request.data.reference_id ,"go to the request detail page of requset id: " + certificate.my_export_certificate_request.data.reference_id)

})
