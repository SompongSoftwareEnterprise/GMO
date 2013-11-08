
var suite = require('../helpers/suite')

/**
 * To make sure that company checkboxes work!
 *
 * @xref     ds102
 * @actors   GMO Staff
 * @pre      GMO staff is logged in.
 * @fixture  only-gmo-staff
 */
suite('Test Company Checkbox', function(test) {

	test.login('staff', 'staff')
	test.go('/staff/register/customer',            'Go to the register page.')

	test.click('#is_company_checkbox',             'Check the "is company" checkbox:')
	test.assertExists('#last_name:disabled',       'Last name field must be disabled.')
	test.assertExists('input[name=sex]:disabled',  'Sex radio boxes must be disabled.')
	test.assertExists('#date_of_birth:disabled',   'Date of birth field must be disabled.')

	test.click('#is_company_checkbox',                  'Uncheck the "is company" checkbox:')
	test.assertDoesntExist('#last_name:disabled',       'Last name field must be re-enabled.')
	test.assertDoesntExist('input[name=sex]:disabled',  'Sex radio boxes must be re-enabled.')
	test.assertDoesntExist('#date_of_birth:disabled',   'Date of birth field must be re-enabled.')

})

