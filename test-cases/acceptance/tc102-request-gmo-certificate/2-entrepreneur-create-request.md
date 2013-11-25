Test Plan : Test Create a Certificate Request 1-1/2
===================================================

## Purpose

To make sure that the process to create a certificate request (1-1/2) is working correctly and the request save to DB.

## XRef

uc106

## Actors

Entrepreneur

## Preconditions

* An Entrepreneur is logged in.
* The 1-1/1 request must be created.

## Test Procedure

1. Login as Entrepreneur.
	* Must login successfully.
2. Click the RequestID that Entrepreneur want to submit the 1-1/2 form.
3. Click the complete this document link after สทช. 1/1-2
	* A certificate request 1-1/2 form must appear.
4. Fill and submit an incomplete form.
	* An error box must be shown.
5. Complete the remaining/incorrect fields.
6. Submit the form.
	* Entrepreneur must be taken to view request detail page.
