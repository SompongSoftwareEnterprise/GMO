

var require = patchRequire(require)
var url = require('./url')
var yaml = require('./yaml')
var screenshot = require('./screenshot')
var fs = require('fs')
var utils = require('utils')
var f = utils.format

casper.setFilter('echo.message', function alterEchoMessage(message) {
	return message.replace(/<ref id=\d+>/g, '')
})

/**
 * The test suite API.
 * @constructor
 */
function CasperAPI(casper) {
	
	var test = null
	var plan = { steps: [ ] }
	var currentStep = null
	
	/**
	 * @lends CasperAPI.prototype
	 */
	var api = { }

	var nextRefId = 1
	function refId() {
		return '<ref id=' + (nextRefId++) + '>'
	}


	var stepNumber = 0

	/**
	 * [Util] Define a step.
	 * @function
	 */
	api.step = function(message) {
		plan.steps.push(currentStep = { id: nextRefId, message: message, checks: [ ] })
		message += refId()
		casper.then(function() {
			test.comment(++stepNumber + '. ' + message)
		})
	}

	/**
	 * [Util] Define a checking criteria.
	 */
	api.check = function(message, callback) {
		currentStep.checks.push({ id: nextRefId, message: message  })
		message += refId()
		return function() {
			callback(message)
		}
	}


	/**
	 * [Step] Navigate to the `path`.
	 */
	api.go = function(path, message) {
		api.step(message)
		casper.thenOpen(url(path))
	}

	/**
	 * [Step] Login with specified `username` and `password`.
	 */
	api.login = function(username, password) {
		api.step('Login with username="' + username + '" and password="' + password + '"')
		casper.thenOpen(url('/'))
		casper.then(function() {
			casper.fill('#login-form', {
				username: username,
				password: password
			})
			casper.click('#login-form .btn-primary')
		})
		casper.then(api.check('Must login successfully', function(message) {
			test.assertDoesntExist('#login-errors', message)
		}))
	}


	/**
	 * [Check] Check that an element exists.
	 */
	api.assertExists = function(selector, message) {
		casper.then(api.check(message, function(_message) {
			test.assertExists(selector, _message)
		}))
	}

	/**
	 * [Check] Check that an element does not exist.
	 */
	api.assertDoesntExist = function(selector, message) {
		casper.then(api.check(message, function(_message) {
			test.assertDoesntExist(selector, _message)
		}))
	}

	/**
	 * [Step] Click an element and display a message.
	 */
	api.click = function(selector, message) {
		api.step(message)
		casper.then(function() {
			this.click(selector)
		})
	}

	/**
	 * [Step] Fill the form and click submit.
	 */
	api.fillAndSubmit = function(form, data, message) {
		api.step(message.replace(':name', data))
		casper.then(function() {
			this.fill(form, yaml.testdata(data), true)
		})
	}

	/**
	 * [Check] Check that the form has the correct value
	 */
	api.assertFormValue = function(form, name, value) {
		var message = 'The field ' + name + ' in ' + form + ' must have value ' + value
		casper.then(api.check(message, function(_message) {
			test.assertEquals(casper.getFormValues(form)[name], value, _message)
		}))
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

		casper.test.begin(name, function(tester) {

			test = tester
			setupTest()

			casper.start()
			casper.options.pageSettings.loadImages = false
			fn(api)

			casper.run(function() {
				test.done()
			})

		})

	}

	/*
	 * Monkey-patches CasperJS to save screenshot on each failure
	 */
	function setupTest() {

		function handleFailure() {

			console.log('[Capturing screenshot...]')
			screenshot.capture(casper)
			console.log('Screenshot saved at ' + screenshot.path)

			var error = getLaravelError()

			if (error) {
				console.log('Laravel has something to say:')
				console.log(error)
			}

		}

		override(test.currentSuite, 'addFailure', after(handleFailure))
		override(test.currentSuite, 'addError',   after(handleFailure))
		test.currentSuite.plan = plan

	}

	return api

}


function esc(text) {
	return ('' + text).replace(/"/g, '&quot;')
}

function el(tag, attributes, content) {
	return '<' + tag + Object.keys(attributes).map(function(key) {
		return ' ' + key + '="' + esc(attributes[key]) + '"'
	}).join('') + (content ? '>' + content + '</' + tag + '>' : '/>')
}

override(casper.test, 'saveResults', after(function(filepath) {
	var planPath = filepath.replace(/(\.xml|)$/, '_plan.xml')
	var xml = el('plans', { }, casper.test.suiteResults.map(function(suite) {
		return '\n' + el('plan', { name: suite.name }, suite.plan.steps.map(function(step) {
			return '\n\t' + el('step', { message: step.message, id: step.id }, step.checks.map(function(check) {
				return '\n\t\t' + el('check', { message: check.message, id: check.id })
			}).join(''))
		}).join(''))
	}).join(''))
	try {
		fs.write(planPath, xml, 'w');
		this.casper.echo(f('Test plan saved in %s', planPath), 'INFO', 80);
	} catch (e) {
		this.casper.echo(f('Unable to write results to %s: %s', planPath, e), 'ERROR', 80);
	}
}))

/**
 * Scrapes the Laravel error message from the web page.
 */
function getLaravelError() {
	return casper.evaluate(function getErrorMessage() {
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
}

/**
 * Overrides a method in an object.
 *
 * @example
 * override(someObject, 'method', function(_super) {
 *   // _super is a reference to the original function
 *   return function myFunction() {
 *     // when someObject.method is invoked, it will call myFunction instead.
 *     // you can call super like this: _super.apply(this, arguments)
 *   }
 * })
 */
function override(object, method, fn) {
	object[method] = fn(object[method])
}

/**
 * This function runs the specified function after the previous function
 * is run.
 *
 * @example
 * override(someObject, 'method', after(function myFunction() {
 *   // when someObject.method is invoked, it will call the original
 *   // function, and then myFunction is called afterwards.
 * })
 */
function after(fn) {
	return function(_super) {
		return function() {
			var result = _super.apply(this, arguments)
			fn.apply(this, arguments)
			return result
		}
	}
}

/*global casper*/
module.exports = function suite(name, fn) {
	var api = CasperAPI(casper)
	api.run(fn, name)
}

