Test Plan: Test Login with Invalid Username
===========================================

## Purpose

To make sure that all lab request data persent correctly.


## XRef

uc117 , ds117


## Actors

Lab Staff


## Preconditions

* Initial database data: [account/lab-account](../../../casper/fixtures/account/lab-account.yml)


## Test Procedure

1. Go to login page.
2. Login with username="lab" and password="lab"
    * Must login successfully


