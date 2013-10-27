

// Test description

// This Scenario test will test as customer to create new request
// and make sure that request working and appear in staff page correctly


var url = require('./url')
var login = require('./login')
var logout = require('./logout')

var dataToFill_inFrom1_correct = {}

var dataToFill_inFrom1_wrong = {}

var dataToFill_inFrom2_correct = {}

var dataToFill_inFrom2_wrong = {}

casper.test.begin('Enterprenuer make new request', function suite(test) {

	casper.start(url('/'), function() {
		casper.test.comment("Test description");
		casper.test.comment("This Scenario test will test as customer to create new request");
		casper.test.comment("and make sure that request working and appear in staff page correctly");


		test.assertEvalEquals(function() {
			return login.login('user','pass');
		}, true);

	});

	// WARP !!   warp url to create new request page
	casper.thenOpen(url('/entrepreneur/requests/new'), function() {

		

	});

	casper.run(function() {
		test.done();
	});

});
