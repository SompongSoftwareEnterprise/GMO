Test Plan:  To make sure that the status of request is shown correctly.
=======================================================================

## Purpose

To make sure that all request data presneted correctly.


## XRef

uc108


## Actors

GMO staff


## Preconditions

* Initial database data: [certificate_request/request112-9010-form8010-entre5555](../../../casper/fixtures/certificate_request/request112-9010-form8010-entre5555.yml)
* Initial database data: [certificate_request/request111-8010-entre5555](../../../casper/fixtures/certificate_request/request111-8010-entre5555.yml)
* Initial database data: [account/gmo-staff-6666](../../../casper/fixtures/account/gmo-staff-6666.yml)
* Initial database data: [account/entrepreneur-5555](../../../casper/fixtures/account/entrepreneur-5555.yml)


## Test Procedure

1. Go to login page.
2. Login with username="staff" and password="staff"
    * Must login successfully
    * GMO-Staff-view-all-request page must be loaded.


