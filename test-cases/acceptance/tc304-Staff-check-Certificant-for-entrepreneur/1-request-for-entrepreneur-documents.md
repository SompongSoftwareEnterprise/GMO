Test Plan: Staff check Entrepreneur request form (1-2/1 & 1-1/2)
=======================================================

## Purpose

To make sure that the System got the correct forms when Gmo staff request for the forms.

## XRef

uc304

## Actors

GMO staff

## Preconditions

* GMO staff is logged in.
* Initial database data: Entrepreneur account information.
* Initial database data: Entrepreneur request data.
* Initial database data: สทช. 1-2/1, and 1-2/2 document from entrepreneur uploaded.
* Initial database data: Complete Lab สทช. 1-2/1, and 1-2/2 document that have status 'Complete'. 

## Test Procedure

1. Login as GMO staff.
    * Must login successfully
2. Click on a ID that match the same with the entrepreneur that requested.
    * Must have a requested entrepreneur in the table to click.
3. Gmo staff will now be able to view all the information and documents.
4. Click on a Create Invoice Button.
    * Must show a Create Invoive page.
    * go back to a view all the information and documents page successfully.
5. Click on a Create Recipt Button.
    * Must show a Create Recipt page.
    * go back to a view all the information and documents page successfully.
6. Click on a Create Analysis of Report Button
    * Must show a Analysis of Report page.
    * go back to a view all the information and documents page successfully.
7. Click on a Create Certificate Button.
    * Must show a Create Certificate page.
    * go back to a view all the information and documents page successfully.
8. Click on a back Button.
    * The system should go back to a previous page successfully.
