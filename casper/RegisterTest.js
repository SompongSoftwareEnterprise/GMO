
var url = require('./helpers/url')
var yaml = require('./helpers/yaml')

var testdata = yaml('testdata/register.yml')

/**
 * Register test - Tests that the registration process is working and
 * an entrepreneur is registered successfully and can login.
 *
 * @fixture fixtures/clear-users.yml
 */
casper.test.begin('Register test as a customer', function suite(test) {

	casper.start(url('/staff/register'))
	
	casper.then(function() {
		casper.click('#register-customer')
	})

	// When registering as company, lastname, sex, and date of birth
	// must be disabled.
	casper.then(function() {

		test.comment('When checking "is company", some fields must be disabled')
		casper.click('#is_company_checkbox')
		test.assertExists('#last_name:disabled')
		test.assertExists('input[name=sex]:disabled')
		test.assertExists('#date_of_birth:disabled')

		test.comment('When unchecking "is company", these fields must be re-enabled')
		casper.click('#is_company_checkbox')
		test.assertDoesntExist('#last_name:disabled')
		test.assertDoesntExist('input[name=sex]:disabled')
		test.assertDoesntExist('#date_of_birth:disabled')

		test.comment('Now filling forms with few invalid data.')
		casper.click('#is_company_checkbox')
		casper.fill('form#register-form', testdata.customer_try1, true)

		test.comment('Waiting for error box')

	})

	casper.waitForSelector('.error-box')

	casper.then(function() {

		// casper.echo(casper.fetchText('.error-box li'))
		test.assertExists('.error-box', 'Error box is shown')
		test.comment('Now completing the form with valid data.')
		casper.fill('form#register-form', testdata.customer_try2, true)

		test.comment('Waiting for success message box')

	})

	casper.waitForSelector('.message-box')

	casper.then(function() {
		test.assertExists('.message-box', 'Message box is shown')
		test.comment('Register finished.')
	})

	casper.run(function() {
		test.done()
	})

})
