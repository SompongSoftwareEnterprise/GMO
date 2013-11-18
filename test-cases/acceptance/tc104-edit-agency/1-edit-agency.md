Test Plan: Test Add Agency
===========================================

## Purpose

To make sure that adding agency process is correct.


## XRef

uc103, uc104, ds109


## Actors

Entrepreneur


## Preconditions

* A entrepreneur is logged in.
* Initial database data: Entrepreneur user data (without authorized agencies)
* Initial database data: Agency user data



## Test Procedure

1. Login as entrepreneuru
    * Must login successfully
2. Go to AGENCY header to view all authorized agencies.
   * Check that no agency is shown.
3. Click Add Agency button
   * Direct to the Add agency page correctly
4. fill the id of desired agency, and then click search button.
   * in case of unexisted agency id, text ,"Agency Id not found" apear
   * otherwise, List of all information of desired agency correctly.
