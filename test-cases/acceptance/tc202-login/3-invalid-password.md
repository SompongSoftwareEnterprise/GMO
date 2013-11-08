Test Plan: Test Login with Invalid Password
===========================================

## Purpose

To make sure that an error message is displayed when logging in with an
incorrect password.


## XRef

uc203, ds202


## Actors

Any User


## Preconditions

* Initial database data: [entrepreneur-1](../../../casper/fixtures/entrepreneur-1.yml)


## Test Procedure

1. Go to login page.
    * The errors box must not exist.
2. Log in using data from [login-data-invalid-password](../../../casper/testdata/login-data-invalid-password.yml)
    * The errors box must show.


