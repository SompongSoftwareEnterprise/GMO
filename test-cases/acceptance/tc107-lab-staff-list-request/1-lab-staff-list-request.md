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
    * Table must have 1 rows.
    * Table row #1 must have Task ID = 1
    * Table row #1 must have Task Name = product_name_1
    * Table row #1 must have Due Date = 2013-01-08
    * Table row #1 must have Status = Pending


