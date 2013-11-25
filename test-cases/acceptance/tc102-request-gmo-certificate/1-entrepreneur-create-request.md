Test Plan : Test Create a Certificate Request 1-1/1
===================================================

## Purpose

To make sure that the process to create a certificate request (1-1/1) is working correctly and the request save to DB.

## XRef

uc106

## Actors

Entrepreneur

## Preconditions

* An Entrepreneur is logged in.

## Test Procedure

1. Login as Entrepreneur.
	* Must login successfully.
2. Click the make new request button.
	* A certificate request 1-1/1 form must appear.
3. Fill and submit an incomplete form.
	* An error box must be shown.
4. Complete the remaining/incorrect fields.
5. Submit the form.
	* Entrepreneur must be taken to view request detail page.
