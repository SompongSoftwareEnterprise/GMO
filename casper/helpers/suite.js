

var url = require('./url')
var yaml = require('./yaml')

function CasperAPI(casper, test) {
	
	var api = { }

	/**
	 * [Step] Navigate to the `path`.
	 */
	api.go = function(path, message) {
		api.step(message)
		casper.thenOpen(url(path))
	}

	/**
	 * [Step] Specify a step to be performed.
	 */
	api.step = function(message) {
		test.comment(message)
	}

	/**
	 * [Check] Check that an element exists.
	 */
	api.assertExists = function(selector, message) {
		casper.then(function() {
			test.assertExists(selector, message)
		})
	}

	/**
	 * [Check] Check that an element does not exist.
	 */
	api.assertDoesntExist = function(selector, message) {
		casper.then(function() {
			test.assertDoesntExist(selector, message)
		})
	}

	/**
	 * [Step] Click an element and display a message.
	 */
	api.click = function(selector, message) {
		casper.then(function() {
			api.step(message)
			this.click(selector)
		})
	}

	/**
	 * [Step] Fill the form and click submit.
	 */
	api.fillAndSubmit = function(form, data, message) {
		casper.then(function() {
			test.comment(message.replace(':name', data))
			this.fill(form, yaml.testdata(data), true)
		})
	}

	/**
	 * [Check] Wait for an element to exist.
	 */
	api.wait = function(selector, message) {
		casper.waitForSelector(selector)
		api.assertExists(selector, message)
	}

	/**
	 * This function will be run automatically.
	 */
	api.run = function(fn) {
		casper.start()
		fn(api)
		casper.run(function() {
			test.done()
		})
	}

	return api

}

function ExportAPI() {

	var api = { }
	var stepNumber = 0

	function step(text) {
		casper.echo(++stepNumber + '. ' + text)
	}
	function check(message) {
		casper.echo('   * ' + message)
	}

	api.go = function(path) {
		step('Go to ' + path)
	}
	api.assertExists = function(selector, message) {
		check(message)
	}
	api.assertDoesntExist = function(selector, message) {
		check(message)
	}
	api.click = function(selector, message) {
		step(message)
	}
	api.fillAndSubmit = function(form, data, message) {
		step(message.replace(':name', data))
		casper.echo('')
		casper.echo('   | Field Name | Value |')
		casper.echo('   | ---------- | ----- |')
		var data = yaml.testdata(data)
		for (var i in data) {
			casper.echo('   | ' + i + ' | ' + data[i] + ' |')
		}
		casper.echo('')
	}
	api.wait = function(selector, message) {
		api.assertExists(selector, message)
	}
	api.run = function(fn) {
		fn(api)
	}

	return api

}


/*global casper*/
module.exports = function suite(name, fn) {
	
	casper.test.begin(name, function(test) {

		var api = CasperAPI(casper, test)
		api.run(fn)

	})

}
