Test Plan:  To make sure that the status of request is shown correctly.
=======================================================================

## Purpose

To make sure that adding agency process is correct.


## XRef

uc103, uc104, ds109


## Actors

Entrepreneur


## Preconditions

* Initial database data: [account/agency-5556](../../../casper/fixtures/account/agency-5556.yml)
* Initial database data: [account/entrepreneur-5558](../../../casper/fixtures/account/entrepreneur-5558.yml)


## Test Procedure

1. Go to login page.
2. Login with username="entre2" and password="entrepassword"
    * Must login successfully
    * Entrepreneur-view-all-request page must be loaded.
3. Click AGENCY header
    * Table must have 0 rows.


