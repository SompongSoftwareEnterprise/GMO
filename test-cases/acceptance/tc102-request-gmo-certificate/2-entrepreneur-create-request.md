Test Plan: To test that the process to create certificate 1-1/2 is working correctly and request is saved to the DB.
====================================================================================================================

## Purpose

To make sure that the process to create certificate 1-1/2 is working correctly and request is saved to the DB.


## XRef

uc106


## Actors

Entrepreneur


## Preconditions

* Initial database data: [certificate_request/request111-8010-entre5555](../../../casper/fixtures/certificate_request/request111-8010-entre5555.yml)
* Initial database data: [account/entrepreneur-5555](../../../casper/fixtures/account/entrepreneur-5555.yml)


## Test Procedure

1. Go to login page.
2. Login with username="entre1" and password="entrepassword"
    * Must login successfully
    * Entrepreneur-view-all-request page must be loaded.
3. go to the request detail page of requset id: 5562
4. Click this link to 1-1/2 request page
    * Create-Request-From page must be shown
5. fill 1-1/2 form with the correct data


