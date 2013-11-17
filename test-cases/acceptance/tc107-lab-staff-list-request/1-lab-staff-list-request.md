Test Plan: Test Login with Invalid Username
===========================================

## Purpose

To make sure that all lab request data persent correctly.


## XRef

uc117 , ds117


## Actors

Lab Staff


## Preconditions

* Initial database data: [tc107-1-lab-staff-list-request](../../../casper/fixtures/tc107-1-lab-staff-list-request.yml)


## Test Procedure

1. Go to login page.
2. Login with username="lab" and password="lab"
    * Must login successfully
    * Request table in Lab request page must be found.


