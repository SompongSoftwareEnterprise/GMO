
/**
 * To make sure that the registration process is working correctly and that
 * a customer can be registered.
 *
 * @xref     uc101, ds101, ds102, uc203, ds203
 * @actors   GMO Staff
 * @pre      A GMO staff is logged in.
 * @fixture  account/only-gmo-staff
 */

var suite = require('../../helpers/suite')

suite('Test Register as Customer', function(test) {

	test.login('staff', 'staff')
	test.go('/staff/register',                     'Go to the register page.')

	test.click('#register-customer',               'Click the register customer button.')
	test.assertExists('form#register-form',        'A customer registration form must appear.')

	test.click('#is_company_checkbox', 'Check the "is company" checkbox.')
	test.fillAndSubmit('form#register-form', 'register-customer-attempt1',
		'Fill and submit the form with incomplete data from :name.')

	test.wait('.error-box', 'An error box must be shown.')
	test.fillAndSubmit('form#register-form', 'register-customer-attempt2',
		'Complete the remaining/incorrect fields with the data from :name.')

	test.wait('.message-box', 'A message box that the registration is complete must be shown.')
	test.assertExists('#email-message[data-to="sompongplant@mailinator.com"]', 'An email message must be sent to "sompongplant@mailinator.com"')
	test.click('.message-primary-action', 'Click the finish button.')

	test.wait('#register-customer', 'The user must be taken back to the register home page.')

})

