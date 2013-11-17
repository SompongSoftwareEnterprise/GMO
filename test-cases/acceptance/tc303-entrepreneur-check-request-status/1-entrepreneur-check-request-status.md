Test Plan: Test Entrepreneur check Request status
===========================================

## Purpose

To make sure that request status information persent correctly.


## XRef

uc303


## Actors

Entrepreneur


## Preconditions

* Entrepreneur is logged in.
* Initial database data: Entrepreneur request data.
* Initial database data: Request that have status 'Approved'.
* Initial database data: Request that have status 'Pending'.
* Initial database data: Request that have status 'Declined'.


## Test Procedure

1. Successfully login as entrepreneur.
    * Must login successfully.
2. Go to view all request page for entrepreneur.
	* Check all request data (from database that initial) present correctly.
3. Click in each request id. (This action will happen (number of request) time)
	* Request information must show with correctly information.
4. In each request page,
    * Request status must show correctly information.
