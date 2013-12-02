Test Plan: Test that all certificate request data show correctly.
=================================================================

## Purpose

To make sure that the process to create a certificate request (1-1/1) is working correctly and the request save to DB.


## XRef

uc106


## Actors

Entrepreneur


## Preconditions

* Initial database data: [account/entrepreneur-5555](../../../casper/fixtures/account/entrepreneur-5555.yml)


## Test Procedure

1. Go to login page.
2. Login with username="entre1" and password="entrepassword"
    * Must login successfully
    * Entrepreneur-view-all-request page must be loaded.
3. go to make-new-request page
    * new-request-form must be shown
4. fill form with the uncorrect data
    * error box must be shown
5. fill form with the correct data
    * request-information page must be shown.


