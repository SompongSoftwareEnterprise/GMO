+Test Plan: Test Revoke Agency

+===========================================

+

+## Purpose

+

+To make sure that revoking agency process is correct.
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

+* A entrepreneur is logged in.

+* Initial database data: Entrepreneur user data (with only one authorized agency)

+* Initial database data: Agency user data

+

+

+## Test Procedure

+

+1. Login as entrepreneuru

+    * Must login successfully

+2. Go to AGENCY header to view all authorized agencies.

+  * List only one agency, the current authorized agency.

+3. Click at the Id of the agency.

+  * Direct to the revoke agency page of the selected agency correctly
+  * List of all information of selected agency must be correct.

+4. Click at the Revoke button.

+  * Direct to the entrepreneur home page correctly.
+*  List of agencies must show nothing.
+
