
var suite = require('../helpers/suite')

/**
 * To make sure that the date of birth field gets pre-filled with the
 * data from the database when editing the account, to make sure that
 * issue 17 is fixed.
 *
 * @xref    ds102
 * @actors  Entrepreneur
 * @fixture entrepreneur-1
 */
suite('Test Date of Birth Field', function(test) {

	test.login('entre1', 'entrepassword')
	test.go('/entrepreneur/edit_account',            'Go to edit account page.')

	test.assertFormValue('#edit-account-form', 'date_of_birth__date',  '11')
	test.assertFormValue('#edit-account-form', 'date_of_birth__month', '11')
	test.assertFormValue('#edit-account-form', 'date_of_birth__year',  '2530')

})

