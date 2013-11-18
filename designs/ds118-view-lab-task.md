Use Case Name
-------------
View Lab Task

XRef
----
uc118

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
	- by clicks on "download" after status.

Low Level Design
----------------

![Screenshot](images/ds118-ViewLabTask(new).png)

* Task panel containts components about product. 
	* Product Code : - presents the code number of task.
	* Product Name: - presents the name of the task.
	* Measure : - presents weight number of the product.
	* Volume : - presents the volume number of the product.
	* Date Start : - presents the date that start analyzing. ( the format is DD/MM/YYYY )
	* Date Finish : - presents the date that finished analyzing. ( the format is DD/MM/YYYY )
	* Responsible : - presents a person(s) who in charge to analyze this task.
	* Method of extracting DNA : - presents the process name that analyzed.
* Gene of analysis contains the components about analysis info.
	* Endogenous : - presents the endogenous info. 
	* Trasgene : - presents the trasgene info.
* Endorsee - Display a name who is endorsee of this task.
* Date - Display a date that endorsee performs committing. ( the format is DD/MM/YYYY )
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

| Component Name              | ID/Class | Name  |
| --------------------------- | -------- | ----- |
| Product Code label            | #          | |
| Product Code text         | #        	  | |
| Product Name label   | #  	| |
| Product Name text           | #          | |
| Measure label           | #           | |
| Measure text         | #       	    | |
| Volume label           | #  	| |
| Volume text          | #  	| |
| Date Start label             |#                  | |
| Date Start text             |#               | |
| Date Finish label             |#                  | |
| Date Finish text           |#                  | |
| Responsible label           |#                  | |
| Responsible text        |#                  | |
| Method of extraction DNA label          |#                  | |
| Method of extraction DNA text         |#                  | |
| Gene of analysis label            |#                  | |
| Endogenous label    |#                  | |
| Endogenous text   |#                  | |
| Transgene label          |#                  | |
| Transgene text          |#                  | |
| ENDORSEE label             |#                  | |
| Date label             |#                  | |
| Analyzing Sequence label           |#                  | |
| Lab Analyzing label           |#                  | |
| Experiment label             |#                  | |
| 1. DNA Extraction label         |#                  | |
| DNA Extraction status label         |#                  | |
| 2. Volume & Concentration Measurement label         |#                  | |
| Volume & Concentration Measurement status label         |#                  | |
| 3. Endrogenous Gene Analysis label         |#                  | |
| Endrogenous Gene Analysis status label         |#                  | |
| 4. Gene Analysis label         |#                  | |
| Gene Analysis status label        |#                  | |









