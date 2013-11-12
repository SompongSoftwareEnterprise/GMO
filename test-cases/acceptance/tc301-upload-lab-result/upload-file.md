Test Plan: Test file uploading ( 4 files )
====================================

## Purpose
To make sure that the file uploading is working correctly

## XRef
uc301 , uc119

## Actors
Lab staff

## Preconditions
* A Lab staff already logged in.
	
## Test Procedure
1. Enter to the lab request page.
2. Select the request.
3. Clicks "Upload" on DNA Extraction status.
	* file directory dialog must appear.
4. Select a DNA Extraction lab-result file.
	* file type must is word or PDF
	* System performs uploading.
	* DNA Extraction status change pending to uploaded.
	* Volume & Concentration Measurement status changes waiting to pending.
5. Clicks "Upload" on Volume & Concentration Measurement status.
	* file directory dialog must appear.
6. Select a Volume & Concentration Measurement lab-result file.
	* file type must is word or PDF
	* System performs uploading.
	* Volume & Concentration Measurement status changes pending tp uploaded.
	* Endrogenous Gene Analysis status changes waiting to pending.
7. Clicks "Upload" on Endrogenous Gene Analysis status.
	* file directory dialog must appear.
8. Select a Endrogenous Gene Analysis lab-result file.
	* file type must is word or PDF
	* System performs uploading.
	* Endrogenous Gene Analysis status changes pending tp uploaded.
	* Gene Analysis status changes waiting to pending.
9. Clicks "Upload" on Gene Analysis status.
	* file directory dialog must appear.
10. Select a Gene Analysis lab-result file.
	* file type must is word or PDF
	* System performs uploading.
	* Gene Analysis status changes pending to uploaded.
