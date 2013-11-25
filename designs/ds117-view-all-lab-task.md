Use Case Name
-------------
View All Lab Task

XRef
----
uc117

High Level Design
-----------------

* Lab staff will be able to view all lab task in table
* Lab staff will be able to select to view specific request by clicking view button
* Lab staff will be able to view complete task by clicking complete task tab



Low Level Design
----------------

![Screenshot](images/ds117-viewAllLabtask.png)

* Task List Tab
	- Each tab displays a table. There are 2 tabs:
		1. __Lab Task__ - Displays lab tasks that are active.
		2. __Waiting for Approval__ - Displays lab tasks that are waiting for approval by head of lab.
* Task Table
	- Displays the unfinished lab tasks, according to the Task List Tab (above).
		- Finished lab tasks are not displayed.
	- Sort by: Task ID, Ascending
	- Columns
		1. __Task ID__: Display the task ID from the database as a link.
		   when clicked, takes the user to the View Lab Task page.
		2. __Task Name__: Display the task name from the database.
		3. __Due Date__: Display the due date in format of Date/Month/Year.
		4. __Status__: Display the status of the lab task. It can be:
			* Pending - The lab task is pending, display in yellow text.
			* (analysis statuses) display in black text. The analysis statuses can be:
				- DNA Extraction
				- Volume & Concentration Measurement
				- Endrogenous Gene Analysis
				- Gene Analysis
			* Waiting for Approval - All analysis is done and waiting for approval by head of lab. Display in yellow text.
	- When there is nothing to show
		- The table must display a single row with a single column with text: "No Data".

| Component Name              | ID/Class | Name  |
| --------------------------- | -------- | ----- |
| Lab Task tab                | #lab-task-tab               | |
| Waiting for Approval tab    | #waiting-for-approval-tab   | |
| Lab Task table              | #lab-task-table             | |
| Waiting for Approval table  | #waiting-for-approval-table | |
| No Data Row                 | .no-data                    | |











