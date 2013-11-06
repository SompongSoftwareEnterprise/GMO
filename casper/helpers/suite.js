

var url = require('./url')
var yaml = require('./yaml')

function CasperAPI(casper) {
	
	var test = null
	var api = { }

	/**
	 * [Step] Navigate to the `path`.
	 */
	api.go = function(path, message) {
		casper.then(function() {
			api.step(message)
		})
		casper.thenOpen(url(path))
	}

	/**
	 * [Step] Login with specified `username` and `password`.
	 */
	api.login = function(username, password) {
		casper.thenOpen(url('/'))
		casper.then(function() {
			api.step('Login with "' + username + '" and "' + password + '"')
		})
		casper.then(function() {
			casper.fill('#login-form', {
				username: username,
				password: password
			})
			casper.click('#login-form .btn-primary')
		})
		casper.then(function() {
			test.assertDoesntExist('#login-errors', 'Must login successfully')
		})
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
	 * [Check] Check that the form has the correct value
	 */
	api.assertFormValue = function(form, name, value) {
		casper.then(function() {
			test.assertEquals(
				casper.getFormValues(form)[name],
				value,
				'The field ' + name + ' in ' + form + ' must have value ' + value
			)
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
	api.run = function(fn, name) {

		casper.test.begin('== ' + name + ' ==', function(tester) {

			test = tester
			casper.start()
			casper.options.pageSettings.loadImages = false
			fn(api)
			casper.run(function() {
				test.done()
			})

		})

	}

	return api

}

var screenshot = require('./screenshot')

casper.test.on('fail', function(failure) {

	console.log('[Capturing screenshot...]')
	screenshot.capture(casper)
	console.log('Screenshot saved at ' + screenshot.path)

	var error = casper.evaluate(function getErrorMessage() {
		function text(el) {
			if (!el) return ''
			return el.innerText.trim()
		}
		var excTitle = document.querySelector('.exc-title')
		var excMessage = document.querySelector('.exc-message')
		var file = document.querySelector('.frame-file')
		if (!excTitle) return null
		return text(excTitle) + ': ' + text(excMessage) + ' at ' +
			text(file)
			
	})

	if (error) {
		console.log('Laravel has something to say:')
		console.log(error)
	}

})

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
		var d = yaml.testdata(data)
		for (var i in d) {
			casper.echo('   | ' + i + ' | ' + d[i] + ' |')
		}
		casper.echo('')
	}
	api.wait = function(selector, message) {
		api.assertExists(selector, message)
	}
	api.run = function(fn, name) {
		casper.echo('# ' + name)
		fn(api)
	}

	return api

}


/*global casper*/
module.exports = function suite(name, fn) {
	var api = CasperAPI(casper)
	api.run(fn, name)
}
