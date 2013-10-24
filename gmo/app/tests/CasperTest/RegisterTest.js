var url = "http://gmo.tsp.dt.in.th/"

casper.test.begin('Register test as a customer', function suite(test) {
    casper.start(url, function() {


        //check that register button exists

        // test.assertExists('.btn.btn-primary.btn-lg','Check button for register'); //  <=====   Sould we have id for this element ( ask at uni)
        test.assertExists('#register','Check button for register');  //  <=====   think that we add id to it  (Fail assert)
        casper.click('.btn.btn-primary.btn-lg');

    });

    casper.then(function() {

        //TODO now register as customer and agency element have the same information
        // Should have ID ???????

        test.assertExists('#register-customer','Check button for register as Customer')
    });

    // HARD CODE !!!!!  ->  url register as customer
    casper.thenOpen('http://gmo.tsp.dt.in.th/staff/register/customer', function() {
        // Check all element in from should exists
        test.assertExists({
            type: 'xpath', 
            path: '//input[@id="is_company_checkbox" and @type="checkbox"]' 
        },'company checkbox element exists');

        test.assertExists({
            type: 'xpath', 
            path: '//input[@id="first_name" and @type="text"]' 
        },'first name textbox element exists');

        test.assertExists({
            type: 'xpath', 
            path: '//input[@id="last_name" and @type="text"]' 
        },'last name textbox element exists');

        // This 2 element not have id !!
        // Should we have id or select with name instead

        // test.assertExists({
        //     type: 'xpath',
        //     path: '//input[@id="is_male_radio" and @type="radio"]' 
        // },'Sex-male radio element exists');

        // test.assertExists({
        //     type: 'xpath', 
        //     path: '//input[@id="is_female_radio" and @type="radio"]' 
        // },'Sex-female radio element exists');

        test.assertExists({
            type: 'xpath', 
            path: '//input[@name="date_of_birth__date" and @type="number"]' 
        },'date of birth - date number element exists');

        test.assertExists({
            type: 'xpath', 
            path: '//select[@name="date_of_birth__month"]' 
        },'date of birth - month number element exists');

        test.assertExists({
            type: 'xpath', 
            path: '//input[@name="date_of_birth__year" and @type="number"]' 
        },'date of birth - year number element exists');

        test.assertExists({
            type: 'xpath', 
            path: '//input[@id="nationality" and @type="text"]' 
        },'nationality textbox element exists');

    });

    casper.run(function() {
        test.done();
    });
});