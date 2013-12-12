Test Plan: Test Register as Customer
====================================

## Purpose

To make sure that the registration process is working correctly and that
a customer can be registered.


## XRef

uc101, ds101, ds102, uc203, ds203


## Actors

GMO Staff


## Preconditions

* Initial database data: [only-gmo-staff](../../../casper/fixtures/only-gmo-staff.yml)
* A GMO staff is logged in.


## Test Procedure

1. Login with username="staff" and password="staff"
    * Must login successfully
2. Go to the register page.
3. Click the register customer button.
    * A customer registration form must appear.
4. Check the "is company" checkbox.
5. Fill and submit the form with incomplete data from [register-customer-attempt1](../../../casper/testdata/register-customer-attempt1.yml).
    * An error box must be shown.
6. Complete the remaining/incorrect fields with the data from [register-customer-attempt2](../../../casper/testdata/register-customer-attempt2.yml).
    * A message box that the registration is complete must be shown.
    * An email message must be sent to "sompongplant@mailinator.com"
7. Click the finish button.
    * The user must be taken back to the register home page.


