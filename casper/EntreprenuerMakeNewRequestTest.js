
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

var dataToFill_inForm1_incomplete = {
	'manufactory_name' : 'Sompong Software',
	'manufactory_address1' : 'test address1',
	'manufactory_address2' : 'test address1',
	'manufactory_city' : 'Bangkok',
	'manufactory_province' : 'Bangkok',
	'manufactory_country' : 'Thailand',
	'manufactory_zip' : '12345',
	'manufactory_phone' : '0-2345-6789',
	'manufactory_fax' : '1234',
	'warehouse_name' : 'Sompong Software',
	'warehouse_address1' : 'test address1',
	'warehouse_address2' : 'test address2',
	'warehouse_city' : 'Bangkok',
	'warehouse_province' : 'Bangkok',
	'warehouse_country' : 'Thailand',
	'warehouse_zip' : '12345',
	'warehouse_phone' : '0-2345-6789',
	'warehouse_fax' : '12345',
	'purpose[]' : '[Export,Import]'
}


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
