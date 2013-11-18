
var suite = require('../../helpers/suite')
var yaml = require('../../helpers/yaml')

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

	var fixture = yaml.fixture('tc107-1-lab-staff-list-request')
	var labTask = fixture.my_lab_task.data
	var labTaskProduct = fixture.my_lab_task_product.data

	test.assertTable('table', [
		{
			'Task ID' :    labTask.id,
			'Task Name' :  labTaskProduct.product_name,
			'Due Date' :   labTaskProduct.finish,
			'Status' :     labTask.status
		}
	])

})
