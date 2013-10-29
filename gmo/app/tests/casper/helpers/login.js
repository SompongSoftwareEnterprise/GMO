

var login = { }

login.entrepreneur = function(casper, test) {

	// TODO: remove this when login functionality is implemented
	return

	casper.then(function() {
		test.assertExists('form#login-form', 'Login form must exist')
		casper.fill('form#login-form', {
			'username': 'en001',
			'password': 'fakepass'
		})
	})

}

module.exports = login
