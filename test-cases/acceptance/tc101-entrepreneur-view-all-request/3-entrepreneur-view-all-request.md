Test Plan:  To make sure that the status of request is shown correctly.
=======================================================================

## Purpose

To make sure that the status of request is shown correctly.


## XRef

uc107


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
    * Request-detail page must be load


