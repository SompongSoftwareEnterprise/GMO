Test Plan: Test file uploading ( 4 files )
====================================

## Purpose
To make sure that the file uploading is working correctly

## XRef
uc301 , uc119

## Actors
Lab staff, lab head

## Preconditions
* A Lab staff already logged in.
* The database has an account for
    * a Lab Staff user
    * a Lab Head user
* The database has data for
    * an entrepreneur
    * a certificate request
    * a lab task
	
## Test Procedure
1. Enter to the lab request page.
2. Select the request.
3. Clicks "Upload" on DNA Extraction status.
	* file directory dialog must appear.
4. Select and upload a PDF file for DNA Extraction lab-result
	* DNA Extraction status change pending to uploaded.
	* Volume & Concentration Measurement status changes waiting to pending.
5. Clicks "Upload" on Volume & Concentration Measurement status.
	* file directory dialog must appear.
6. Select and upload a Word a Volume & Concentration Measurement lab-result file.
	* Volume & Concentration Measurement status changes pending tp uploaded.
	* Endrogenous Gene Analysis status changes waiting to pending.
7. Clicks "Upload" on Endrogenous Gene Analysis status.
	* file directory dialog must appear.
8. Select and upload a PDF Endrogenous Gene Analysis lab-result file.
	* Endrogenous Gene Analysis status changes pending tp uploaded.
	* Gene Analysis status changes waiting to pending.
9. Clicks "Upload" on Gene Analysis status.
	* file directory dialog must appear.
10. Select and upload a TXT Gene Analysis lab-result file.
    * System must reject the file because it's not a supported file type.
11. Select and upload a PDF Gene Analysis lab-result file.
	* Gene Analysis status changes pending to uploaded.
12. Log in as a Lab Head.
13. Select the request.
14. The result submission buttons (PASS/FAIL) must be enabled.
