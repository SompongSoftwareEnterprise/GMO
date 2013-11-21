Use Case Name
-------------
Upload lab-result document

XRef
----
uc118 , uc120 ,ds118 ,ds120

High Level Design
-----------------

* Lab staff will able upload a document by clicking a select button to find the directory of document and then click upload button to upload document.
	- The system presents the directory file dialog for Lab staff to selected document.
* Lab staff performs uploading, the status change relate to procudure. 
	- waiting status means this subject require the complete before subject file uploading.
	- pending status means this subject ready to perform uploading.
	- uploaded status means this subject already contain file result. 
	- Lab staff can performs uploading file again by clicks on "Upload" to change the file on each subject.
* Head lab will able perform file downloading from each subject.
	- by clicks on "download" after the status.

Low Level Design
----------------

![Screenshot](images/ds118-ViewLabTask(new).png)

* Analysis Sequence contains 4 subjects component.
	- Lab Analyzing Sequence - presents all subjects that needed for test the task.
		1. DNA Extraction
		2. Volume & Concentration Measurement
		3. Endrogenous Gene Analysis
		4. Gene Analysis
	- Experiment Document - presents the current status of subject related to file uploading.
		* Wating , display red text.
			- Wating changed to Pending when the subject before perform file uploaded.
		* Pending, display yellow text. 
			- Pending changes to Uploaded when this subject perform file uploaded. 
		* Uploaded, display green text.
			- the step is Wating -> Pending -> Uploaded
		* Upload link - appear after status text which is pending.
		* Download link - appear after Upload link.

| Component Name                                                           | ID/Class                   | Name         |
| --------------------------- | ------------------------------------------- | -------------------------- |                   |
| DNA Extraction status label                                             |#subject-status-1       |                   |
| DNA Extraction Upload link                                            |#subject-upload-1     |                   |
| DNA Extraction Download link                                       |#subject-download-1 | 	  |
| Volume & Concentration Measurement status label         |#subject-status-2        |	  |
| Volume & Concentration Measurement Upload link        |#subject-upload-2      |	  |
| Volume & Concentration Measurement Download link   |#subject-download-2  | 	  |  
| Endrogenous Gene Analysis status label                           |#subject-status-3        |	  |
| Endrogenous Gene Analysis Upload link                          |#subject-upload-3      |                |
| Endrogenous Gene Analysis Download link                     |#subject-download-3 | 	  |
| Gene Analysis status label                                                 |#subject-status4         |	  |
| Gene Analysis Upload link 	                                      |#subject-upload-4   	  | 	  |
| Gene Analysis Download link                                           |#subject-download-4 | 	  |
