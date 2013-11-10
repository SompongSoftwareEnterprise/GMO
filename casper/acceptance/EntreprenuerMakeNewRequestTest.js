
/**
 * This Scenario test will test as customer to create new request
 * and make sure that request working and appear in staff page correctly
 *
 * @fixture entrepreneur-1
 */


 /**
 * To make sure that Entrepreneur can create new certificate request
 *
 * @xref     --
 * @actors   Entrepreneur
 * @pre      Entrepreneur is logged in.
 * @fixture  entrepreneur-1
 */

// var url = require('./helpers/url')
// var login = require('./helpers/login')
// var logout = require('./helpers/logout')
// var screenshot = require('./helpers/screenshot')

var yaml = require('../helpers/yaml')
var user = yaml.fixture('entrepreneur-1')


suite('Test Register as Customer', function(test) {

	test.go('/',                     'Go to the login page.')
	test.login(user.users.data.username,user.users.data.password,'logging in as user.users.data.username')
	test.click('#register-customer',               'Click the register customer button')
	// test.assertExists('form#register-form',        'A form must be shown.')

	// test.click('#is_company_checkbox', 'Click the "is-company" checkbox.')
	// test.fillAndSubmit('form#register-form', 'register_customer_attempt1',
	// 	'Fill and submit the form with incomplete data from :name')

	// test.wait('.error-box', 'An error box must be shown.')
	// test.fillAndSubmit('form#register-form', 'register_customer_attempt2',
	// 	'Complete the remaining/incorrect fields with the data from :name')

	// test.wait('.message-box', 'A message box that the registration is complete must be shown.')
	// test.click('.message-primary-action', 'Click the finish button')

	// test.wait('#register-customer', 'The registration home page must be shown.')

})

// casper.options.waitTimeout = 60000

// casper.test.begin('Enterprenuer make new request', function suite(test) {

// 	casper.start()

// 	casper.thenOpen(url('/'), function() {
// 	})

// 	login.entrepreneur(casper, test)

// 	// WARP !!   warp url to create new request page
// 	casper.thenOpen(url('/entrepreneur/requests/new'), function() {
// 		test.assertExists('form#new-request-form', 'Form exists');
// 		casper.fill('form#new-request-form', dataToFill_inForm1_incomplete, false)
// 		casper.click('#submit-button')
// 	})

// 	casper.waitUntilVisible('.error-box')

// 	casper.then(function() {
// 		screenshot.capture(casper)
// 		casper.test.comment(casper.getCurrentUrl())
// 		test.assertExists('.error-box', 'An error box must show.')
// 	})

// 	casper.run(function() {
// 		test.done()
// 	})

// });
