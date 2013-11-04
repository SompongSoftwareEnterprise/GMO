
var url = require('./helpers/url')
var yaml = require('./helpers/yaml')

/**
 * To make sure that the registration process is working correctly.
 *
 * @xref     uc101, ds101, ds102
 * @actors   GMO Staff
 * @pre      GMO staff is logged in.
 * @fixture  fixtures/clear-users.yml
 */
casper.test.begin('Register test as a customer', function suite(test) {

	casper.start(url('/staff/register'))
	
	casper.then(function() {
		test.comment('Enter the registration page.')
		test.comment('Click the register customer button.')
		casper.click('#register-customer')
	})

	// When registering as company, lastname, sex, and date of birth
	// must be disabled.
	casper.then(function() {

		test.assertExists('form#register-form',             'A form must be shown.')

		test.comment('When checking the "is company" checkbox:')
		casper.click('#is_company_checkbox')
		test.assertExists('#last_name:disabled',            'Last name field must be disabled.')
		test.assertExists('input[name=sex]:disabled',       'Sex radio boxes must be disabled.')
		test.assertExists('#date_of_birth:disabled',        'Date of birth field must be disabled.')

		test.comment('When unchecking "is company" checkbox:')
		casper.click('#is_company_checkbox')
		test.assertDoesntExist('#last_name:disabled',       'Last name field must be re-enabled.')
		test.assertDoesntExist('input[name=sex]:disabled',  'Sex radio boxes must be re-enabled.')
		test.assertDoesntExist('#date_of_birth:disabled',   'Date of birth field must be re-enabled.')

		test.comment('Fill and submit the form with almost complete data from [[register_customer_attempt1]].')
		casper.click('#is_company_checkbox')
		casper.fill('form#register-form', yaml.testdata('register_customer_attempt1'), true)

	})

	casper.waitForSelector('.error-box')

	casper.then(function() {

		test.assertExists('.error-box', 'An error box must be shown.')

		test.comment('Complete the remaining/incorrect fields with the data from [[register_customer_attempt2]].')
		casper.fill('form#register-form', yaml.testdata('register_customer_attempt2'), true)

	})

	casper.waitForSelector('.message-box')

	casper.then(function() {
		test.assertExists('.message-box',
			'A message box that the registration is complete must be shown.')
		test.comment('Click the Finish button.')
		casper.click('.message-primary-action')
	})

	casper.run(function() {
		test.assertExists('#register-customer', 'The registration home page must be shown.')
		test.done()
	})

})
