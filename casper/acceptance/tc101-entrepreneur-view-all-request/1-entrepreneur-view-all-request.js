var suite = require('../../helpers/suite')
var yaml = require('../../helpers/yaml')

/**
 * To make sure that all certificate request data show correctly.
 * @fixture entrepreneur-1
 *			form-111-1
 * @actors  Entrepreneur
 * @xref    uc105
 */

suite('Test entrepreneur view all request.', function(test) {
	test.step('kuy');
	var fixture = yaml.fixture('entrepreneur-1')

	/*if (fixture == null)
		test.step('kuy')
	else
		test.step('kak')
	test.step('kak')*/

	//var certificate = yaml.fixture('form-111-1')

		
	var entrepreneur = fixture.my_entrepreneur.data
	//var certi = certificate.my_export_certificate_requests.data

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
		}]);
})


