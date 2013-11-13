Test Plan: Test Staff View All Request
===========================================

## Purpose

To make sure that all request data persent correctly.


## XRef

uc108


## Actors

GMO Staff


## Preconditions

* A GMO staff is logged in.
* Initial database data: GMO Staff user data
* Initial database data: Entrepreneur user data
* Initial database data: Agency user data
* Initial database data: Complete request that have status 'passed' that send by Entrepreneur
* Initial database data: Conplete request that have status 'failed' that send by Entrepreneur
* Initial database data: Conplete request that have status 'pending' that send by Agency


## Test Procedure

1. Login as GMO Staff
    * Must login successfully
2. Go to view all request page for gmo staff
	* Check 3 request data (from database that Initial) present correctly
3. Click in each request id (This action will happen 3 time(number of request))
	* Request information must show with correctly information

