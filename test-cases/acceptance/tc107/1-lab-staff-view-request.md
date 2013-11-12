Test Plan: Test Lab Staff View All Request
===========================================

## Purpose

To make sure that all lab request data persent correctly.


## XRef

uc117 , ds117


## Actors

Lab Staff


## Preconditions

* A Lab staff is logged in.
* Initial database data: Lab Staff user data
* Initial database data: Complete Lab request that have status 'Pending'
* Initial database data: Complete Lab request that have status 'DNA Extraction'
* Initial database data: Conplete Lab request that have status 'Volume & Concentration Measurement'
* Initial database data: Conplete Lab request that have status 'Endrogenous Gene Analysis'
* Initial database data: Conplete Lab request that have status 'Gene Analysis'
* Initial database data: Conplete Lab request that have status 'Waiting For Approval'


## Test Procedure

1. Login as Lab Staff
    * Must login successfully
2. Go to view all request page for lab staff
	* Check all request data (from database that Initial) present correctly
3. Click in each request id (This action will happen (number of request) time)
	* Request information must show with correctly information

