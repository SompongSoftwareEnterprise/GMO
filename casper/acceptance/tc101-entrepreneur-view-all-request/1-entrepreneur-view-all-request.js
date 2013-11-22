var suite = require('../../helpers/suite')
var yaml = require('../../helpers/yaml')

/**
 * To make sure that all certificate request data show correctly.
 * @fixture account/entrepreneur-1
 * @fixture certificate_request/form-111-1
 * @actors  Entrepreneur
 * @xref    uc105
 */

suite('Test entrepreneur view all request.', function(test) {

	var fixture = yaml.fixture('account/entrepreneur-1')
	console.log(fixture)
	if (fixture == null)
		test.step('kuy')
	else
		test.step('kak')
	test.step('kak')

	//var certificate = yaml.fixture('form-111-1')

		
	//var entrepreneur = fixture.my_entrepreneur.data
	//var certi = certificate.my_export_certificate_requests.data
/*
	test.go('/','Go to login page.')
	test.assertDoesntExist('#login-errors',  'The errors box must not exist.')

	test.login('entre1','entrepassword')
	test.wait('table','requested table must be shown');
	test.assertTable('table', [{
			'Request ID' : entrepreneur.id,
			'Importer Name' : entrepreneur.first_name + entrepreneur.last_name,
			'Requester' : entrepreneur.first_name + entrepreneur.last_name,
			'Sent Date' : certi.created_at,
			'Status' : certi.status
		}]);*/
})


