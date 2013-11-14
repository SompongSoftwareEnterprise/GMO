+Test Plan: Test Invoice Form
 +===========================================
 +
 +## Purpose
 +
 +To make sure that GMO Staff can print invoice form.
 +
 +
 +## XRef
 +
 +-----
 +
 +
 +## Actors
 +
 +GMO Staff
 +
 +
 +## Preconditions
 +
 +* A GMO Staff has already logged in.
 +* Initial database data: GMO Staff user data
 +* Initial database data: Lab task(Ê·ª. 1-1/1  or Ê·ª. 1-1/1 and Ê·ª. 1-1/2)
 +
 +
 +## Test Procedure
 +
 +1. Login as GMO Staff
 +    * Must login successfully.
 +2. Choose Create Invoice form
 +  * First Time: Add data in Invoice database
 +  * Others: Get data from Invoice database
 +3. Choose print.
 +  * System show invoice page.
 +      -not: Error form will show