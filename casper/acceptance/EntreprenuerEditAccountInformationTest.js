
/**
* This Scenario test will test as customer to edit thair
* account infomation
*
* 
*/

casper.options.waitTimeout = 60000

casper.test.begin('Enterprenuer edit account infomation', function suite(test) {

	casper.start()

	casper.thenOpen(url('/'), function() {
	})

	

	casper.run(function() {
		test.done()
	})

});