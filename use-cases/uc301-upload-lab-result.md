Use Case Name
---------------
Upload Lab Result

XRef
----
uc119 , TO-BE 10-11

Level
-----
User goal

Primary Actor
-------------
Lab staff

Trigger
-------
Lab staff wishes to upload a lab result file on the system 

Preconditions
-------------
1. Lab staff already log in.
2. Lab staff has a lab-result file to be uploaded.

Postconditions
--------------
The request contain all lab result.

Basic Flow
----------
1. Lab staff enters to lab-request page.
2. Lab staff enters to the request  which perform file uploading.
3. Lab staff uploads DNA Extraction file by clicks "Upload" text next from status "pending".
4. Lab staff selects the file from directory dialog to perform uploading.
5. The system changes status "pending" to "uploaded" on DNA Extraction status.
6. The system changes status "Waiting for above sequence" to "pending" on Volume & Concentration Measurement status.
7. Lab staff uploads Volume & Concentration Measurement file by clicks "Upload" text next from status "pending".
8. Lab staff selects the file from directory dialog to perform uploading.
9. The system changes status "pending" to "uploaded" on Volume & Concentration Measurement status.
10. The system changes status "Waiting for above sequence" to "pending" on Endrogenous Gene Analysis status.
11. Lab staff uploads Endrogenous Gene Analysis file by clicks "Upload" text next from status "pending".
12. Lab staff selects the file from directory dialog to perform uploading.
13. The system changes status "pending" to "uploaded" on Endrogenous Gene Analysis status.
14. The system changes status "Waiting for above sequence" to "pending" on Gene Analysis status.
15. Lab staff uploads Gene Analysis file by clicks "Upload" text next from status "pending".
16. Lab staff selects the file from directory dialog to perform uploading.
17. The system changes status "pending" to "uploaded" on Gene Analysis status.
18. The system allows lets the Head of the Lab to submit the result (PASS or FAIL).

Alternate Flows
---------------

Frequency of Occurrence
-----------------------
Usually

Exception
---------
1. Uploading fail.
2. Type of the file is not word or PDF.
