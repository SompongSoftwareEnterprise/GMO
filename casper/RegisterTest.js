
/**
 * To make sure that the registration process is working correctly.
 *
 * @xref     uc101, ds101, ds102
 * @actors   GMO Staff
 * @pre      GMO staff is logged in.
 * @fixture  fixtures/clear-users.yml
 */

var suite = require('./helpers/suite')
var url = require('./helpers/url')
var yaml = require('./helpers/yaml')

suite('Test Register as Customer', function(test) {

	test.go('/staff/register',                     'Go to the register page.')

	test.click('#register-customer',               'Click the register customer button')
	test.assertExists('form#register-form',        'A form must be shown.')

	test.click('#is_company_checkbox',             'Check the "is company" checkbox:')
	test.assertExists('#last_name:disabled',       'Last name field must be disabled.')
	test.assertExists('input[name=sex]:disabled',  'Sex radio boxes must be disabled.')
	test.assertExists('#date_of_birth:disabled',   'Date of birth field must be disabled.')

	test.click('#is_company_checkbox',                  'Uncheck the "is company" checkbox:')
	test.assertDoesntExist('#last_name:disabled',       'Last name field must be re-enabled.')
	test.assertDoesntExist('input[name=sex]:disabled',  'Sex radio boxes must be re-enabled.')
	test.assertDoesntExist('#date_of_birth:disabled',   'Date of birth field must be re-enabled.')

	test.click('#is_company_checkbox', 'Click the "is-company" checkbox')
	test.fillAndSubmit('form#register-form', 'register_customer_attempt1',
		'Fill and submit the form with incomplete data from :name')

	test.wait('.error-box', 'An error box must be shown.')
	test.fillAndSubmit('form#register-form', 'register_customer_attempt2',
		'Complete the remaining/incorrect fields with the data from :name')

	test.wait('.message-box', 'A message box that the registration is complete must be shown.')
	test.click('.message-primary-action', 'Click the finish button')

	test.wait('#register-customer', 'The registration home page must be shown.')

})

