

// Test description

// This Scenario test will test as customer to create new request
// and make sure that request working and appear in staff page correctly


var url = require('./url')
var login = require('./login')
var logout = require('./logout')

var dataToFill_inFrom1_correct = {
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

var dataToFill_inFrom1_wrong = {}

var dataToFill_inFrom2_correct = {}

var dataToFill_inFrom2_wrong = {}


casper.test.begin('Enterprenuer make new request', function suite(test) {

	casper.start(url('/'), function() {
		casper.test.comment("Test description");
		casper.test.comment("This Scenario test will test as customer to create new request");
		casper.test.comment("and make sure that request working and appear in staff page correctly");

		test.assertEquals(login(casper,'username','password'),true,'Logging in');

	});

	// WARP !!   warp url to create new request page
	casper.thenOpen(url('/entrepreneur/requests/new'), function() {

		test.assertExists('form[action="http://gmo.tsp.dt.in.th/entrepreneur/requests"]', 'from exists');
		casper.fill('form[action="http://gmo.tsp.dt.in.th/entrepreneur/requests"]', dataToFill_inFrom1_correct , true)

	});

	casper.waitFor(function check() {
		return casper.getCurrentUrl() === 'http://gmo.tsp.dt.in.th/entrepreneur';
	}, function then() {

	}, function timeout() {
		casper.test.fail("Time out after submit from");
	},5000);

	casper.then(function() {
		
	})

	casper.run(function() {
		test.done();
	});

});
