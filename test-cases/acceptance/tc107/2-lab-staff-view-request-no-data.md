Test Plan: Test Lab Staff View Request With No Data
===========================================

## Purpose

To make sure that system present No Data text when don't have lab request.


## XRef

-----


## Actors

Lab Staff


## Preconditions

* A Lab staff is logged in.
* Initial database data: Lab Staff user data


## Test Procedure

1. Login as Lab Staff
    * Must login successfully
2. Go to view all request page for lab staff
	* In table must show only "No Data"
3. Click in tab Waiting for Approval
	* In table must show only "No Data"

