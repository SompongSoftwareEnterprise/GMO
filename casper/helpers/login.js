

var login = { }

login.entrepreneur = function(casper, test,username,password) {

	// TODO: remove this when login functionality is implemented
	return

	casper.then(function() {
		test.assertExists('form#login-form', 'Login form must exist')
		casper.fill('form#login-form', {
			'username': username,
			'password': password
		},true)
	})

}

module.exports = login
