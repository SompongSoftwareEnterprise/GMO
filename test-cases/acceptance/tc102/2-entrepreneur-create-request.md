Test Plan : Test Create a Certificate Request 1-1/2
===================================================

## Purpose

To make sure that the process to create a certificate request (1-1/2) is working correctly and the request save to DB.

## XRef

uc-106

## Actors

Entrepreneur

## Preconditions

* An Entrepreneur is logged in.
* The 1-1/1 request must be created.

## Test Procedure

1. Login as Entrepreneur.
	* Must login successfully.
2. Click the REQUEST to view all of the request.
3. Click the RequestID that Entrepreneur want to submit the 1-1/2 form.
4. Click the complete this document link after สทช. 1/1-2
	* A certificate request 1-1/2 form must appear.
5. Fill and submit an incomplete form.
	* An error box must be shown.
6. Complete the remaining/incorrect fields.
7. Submit the form.
	* Entrepreneur must be taken to view request detail page.