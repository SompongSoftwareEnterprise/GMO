Test Plan : Test Entrepreneur View Request 1-1/1, 1-1/2
=======================================================

## Purpose

To make sure that the status of request show correctly.

## XRef

uc-107

## Actors

Entrepreneur

## Preconditions

* An Entrepreneur is logged in.
* The request 1-1/1 is created in DB.
* The request 1-1/2 is created in DB.

## Test Procedure

1. Login as Entrepreneur.
	* Must login successfully.
2. Click on REQUEST to view all of the request.
3. Click on the RequestID that want to check.
4. The status of "สทช. 1-1/1" should be "Available".
5. The status of "สทช. 1-1/2" should be "Available".