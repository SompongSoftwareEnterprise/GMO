Test Plan: Test Date of Birth Field
===================================

## Purpose

To make sure that the date of birth field gets pre-filled with the
data from the database when editing the account, to make sure that
issue 17 is fixed.


## XRef

ds102


## Actors

Entrepreneur


## Test Procedure

1. Login with username="entre1" and password="entrepassword"
    * Must login successfully
2. Go to edit account page.
    * The field date_of_birth__date in #edit-account-form must have value 11
    * The field date_of_birth__month in #edit-account-form must have value 11
    * The field date_of_birth__year in #edit-account-form must have value 2530


