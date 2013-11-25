Test Plan : Test Search Not Found
=================================

## Purpose

To make sure that the process to search a request (by any option) is working correctly and the result show "No Request Found" in the case that the request is not found.

## XRef

uc201, ds201

## Actors

Entrepreneur

## Preconditions

* An Entrepreneur is logged in.

## Test Procedure

1. Login as Entrepreneur.
	* Must login successfully.
2. Click the REQUEST to view all of the request.
3. Input search keyword in the search input box.
4. Select dropdown option to be search (Any option)
5. Click the search button.
6. System present "No Request Found".
