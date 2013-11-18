
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
	test.assertTable('table', [
		{ 'Task ID' : '1', 'Task Name' : 'product_name_1', 'Due Date' : '2013-01-08', 'Status' : 'Pending' }
	])

})
