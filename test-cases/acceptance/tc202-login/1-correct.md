Test Plan: Test Login with Correct Data
=======================================

## Purpose

To make sure that an entrepreneur is logged in to the system
when a correct username and password is entered.


## XRef

uc202, ds202


## Actors

Any User


## Preconditions

* Initial database data: [entrepreneur-1](../../../casper/fixtures/entrepreneur-1.yml)


## Test Procedure

1. Go to login page.
    * The errors box must not exist.
2. Log in using data from [login-data-correct](../../../casper/testdata/login-data-correct.yml)
    * The entrepreneur home page must display.


