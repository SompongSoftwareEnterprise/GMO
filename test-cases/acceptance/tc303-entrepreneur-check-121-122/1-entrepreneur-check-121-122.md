Test Plan: Test Entrepreneur Check 1-2/1, and 1-2/2 (สทช. 1-2/1, and สทช. 1-2/2)
===========================================

## Purpose

To make sure that all สทช. 1-2/1, and สทช. 1-2/2 document data persent correctly.


## XRef

-


## Actors

Entrepreneur


## Preconditions

* Entrepreneur is logged in.
* Initial database data: Entrepreneur request data.
* Initial database data: สทช. 1-2/1, and 1-2/2 document from entrepreneur uploaded.
* Initial database data: Complete Lab สทช. 1-2/1, and 1-2/2 document that have status 'Pending'
* Initial database data: Complete Lab สทช. 1-2/1, and 1-2/2 document that have status 'Complete'


## Test Procedure

1. Successfully login as entrepreneur
    * Must login successfully
2. Go to view all request page for entrepreneur
	* Check all request data (from database that initial) present correctly
3. Click in each request id (This action will happen (number of request) time)
	* Request information must show with correctly information
4. In each request page, Click on each สทช. 1-2/1, and 1-2/2 document link.
    * More information for each document must popup
5. In each popup information, Click on "Download" button.
    * Browser must start download document.
