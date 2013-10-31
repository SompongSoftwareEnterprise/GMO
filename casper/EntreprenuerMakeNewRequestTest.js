
/**
 * This Scenario test will test as customer to create new request
 * and make sure that request working and appear in staff page correctly
 *
 * @fixture fixtures/entrepreneur-1.yml
 */

var url = require('./helpers/url')
var login = require('./helpers/login')
var logout = require('./helpers/logout')
var screenshot = require('./helpers/screenshot')

var yaml = require('./helpers/yaml')
var dataToFill_inForm1_incomplete = yaml('testdata/certreq-1-incomplete.yml')


casper.options.waitTimeout = 60000

casper.test.begin('Enterprenuer make new request', function suite(test) {

	casper.start()

	casper.thenOpen(url('/'), function() {
	})

	login.entrepreneur(casper, test)

	// WARP !!   warp url to create new request page
	casper.thenOpen(url('/entrepreneur/requests/new'), function() {
		test.assertExists('form#new-request-form', 'Form exists');
		casper.fill('form#new-request-form', dataToFill_inForm1_incomplete, false)
		casper.click('#submit-button')
	})

	casper.waitUntilVisible('.error-box')

	casper.then(function() {
		screenshot.capture(casper)
		casper.test.comment(casper.getCurrentUrl())
		test.assertExists('.error-box', 'An error box must show.')
	})

	casper.run(function() {
		test.done()
	})

});
