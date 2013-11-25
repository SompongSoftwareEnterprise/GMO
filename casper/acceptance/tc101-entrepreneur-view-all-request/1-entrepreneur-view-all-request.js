var suite = require('../../helpers/suite')
var yaml = require('../../helpers/yaml')

/**
 * To make sure that all certificate request data show correctly.
 *
 * @actors  Entrepreneur
 * @fixture	account/entrepreneur-5555
 * @fixture	certificate_request/request111-8010-entre5555
 * @xref    uc105
 */

suite('Test that all certificate request data show correctly.', function(test) {

	var user = yaml.fixture('entrepreneur-5555')
	var certificate = yaml.fixture('certificate_request/request111-8010-entre5555')

	test.go('/', 'Go to login page.')
	test.login(user 'entre1')

	var fixture = yaml.fixture('tc107-1-lab-staff-list-request')
	var labTask = fixture.my_lab_task.data
	var labTaskProduct = fixture.my_lab_task_product.data

	if(labTask == null)
		test.step('kuy');
	if(labTaskProduct == null)
		test.step('kuy');
	test.assertTable('table', [
		{
			'Task ID' :    labTask.id,
			'Task Name' :  labTaskProduct.product_name,
			'Due Date' :   labTaskProduct.finish,
			'Status' :     labTask.status
		}
	])

})
