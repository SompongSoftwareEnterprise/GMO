+Test Plan: Test Entrepreneur edit account information
 +===========================================
 +
 +## Purpose
 +
 +To make sure that entrepreneur can edit their account information.
 +
 +
 +## XRef
 +
 +-----
 +
 +
 +## Actors
 +
 +Entrepreneur
 +
 +
 +## Preconditions
 +
 +* A Entrepreneur has already logged in.
 +* Initial database data: Entrepreneur user data
 +
 +
 +## Test Procedure
 +
 +1. Login as Entrepreneur
 +    * Must login successfully.
 +2. Go to edit account information page for entrepreneur
 +  * Check all major forms are auto filled.
 +3. Save account information.
 +  * Check password is correct.
 +	-not: Error form will show
 +  * Check new password and confirm password is correct.
 +      -not: Error form will show