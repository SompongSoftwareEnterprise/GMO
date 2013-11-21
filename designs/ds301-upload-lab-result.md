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

| Component Name                                                              | ID/Class                                                                    | Name                                                                        |
| ------------------------------------------------------------------------ | ---------------------------------------------------------------- |------------------------------------------------------------------ |
| DNA Extraction status                                     	   |# dnaExtractionStatus                                               |  dna-extraction-status                                                 |
| DNA Extraction Upload                                        	   |# dnaExtractionUpload                                             |  dna-extraction-upload                                               |
| DNA Extraction Download                                    	   |# dnaExtractionDownload                                        | dna-extraction-download	                         |
| Volume & Concentration Measurement status                   |# volumeAndConcentrationMeasurementStatus        | volume-and-concentration-measuremen-status	       |
| Volume & Concentration Measurement Upload                |# volumeAndConcentrationMeasurementUpload      | volume-and-concentration-measurement-upload       |
| Volume & Concentration Measurement Download           |# volumeAndConcentrationMeasurementDownload  | volume-and-concentration-measurement-download  |  
| Endrogenous Gene Analysis status                                    |# endrogenousGeneAnalysisStatus                            | endrogenous-gene-analysis-status	                         |
| Endrogenous Gene Analysis Upload                                 |# endrogenousGeneAnalysisUpload                           | endrogenous-gene-analysis-upload                          |
| Endrogenous Gene Analysis Download                            |# endrogenousGeneAnalysisDownload                      | endrogenous-gene-analysis-download	       |
| Gene Analysis status                                                          |# geneAnalysisStatus                                                 | gene-analysis-status 	                                           |
| Gene Analysis Upload                                                       |# geneAnalysisUpload  	                               | gene-analysis-upload	                                           |
| Gene Analysis Download                                                  |# geneAnalysisDownload                                          | gene-analysis-download	                                           |
