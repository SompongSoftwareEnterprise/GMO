Use Case Name
-------------
View All Requests

XRef
----
uc110

High Level Design
-----------------
* User (GMO Staff) will see all current requests with some information, included Request ID, Request Plant Name, Entrepreneur, and Current Process
* User will click on head of the table to sort that column. For example User can click on ID to sort request by ID
* User will click on ID number to view that specific request information (step 5.3.2)

Low Level Design
----------------

![Screenshot](images/ds111-ViewAllrequest.png)

* Data Format
		-Request ID : Have to be only in number.
		-Importer Name, Requester Name : Have to be only in english alphabet.
		-Sent Date : Have to be in AD calendar date with format of dd/mm/yyyy.
		-Status : Have 5 stages either ‘Passed’, ‘Failed’, ‘Pending’, ‘Payment Required’, and ‘Document Required’
* Request Searching
  -Selecting ‘Search’ button will apply filter to the list according to which button and data entrepreneur has selected.
	-ID : The input must be number only.
	-Importer Name, Requester Name : The input must not have any numbers and special characters such as 1, 2, !, @, #, $, etc.
  -Searching with an invalid input will result in an error message pop-up.
* Request Viewing
	-Whenever entrepreneur selects Request ID change panel to ‘Figure 5.2.2.A’.
