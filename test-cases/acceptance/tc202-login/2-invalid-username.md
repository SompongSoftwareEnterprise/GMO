Test Plan: Test Login with Invalid Username
===========================================

## Purpose

To make sure that an error message is displayed when logging in with an
incorrect username.


## XRef

uc202, ds202


## Actors

Any User


## Preconditions

* Initial database data: [account/entrepreneur-1](../../../casper/fixtures/account/entrepreneur-1.yml)


## Test Procedure

1. Go to login page.
    * The errors box must not exist.
2. Log in using data from [login-data-invalid-user](../../../casper/testdata/login-data-invalid-user.yml)
    * The errors box must show.


