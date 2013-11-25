Test Plan : Test Entrepreneur View Request 1-1/1
================================================

## Purpose

To make sure that the status of request show correctly.

## XRef

uc107

## Actors

Entrepreneur

## Preconditions

* An Entrepreneur is logged in.
* The request 1-1/1 is created in DB.
* The request 1-1/2 is not created in DB.

## Test Procedure

1. Login as Entrepreneur.
	* Must login successfully.
2. Click on the RequestID that want to check.
3. The status of "สทช. 1-1/1" should be "Available".
4. The status of "สทช. 1-1/2" should be "Document Needed".
