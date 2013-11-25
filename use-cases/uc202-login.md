

Use Case Name
-------------
Login

XRef
----
* RR, Section 5

Level
-----
User goal

Primary Actor
-------------
Any User

Trigger
-------
The user wishes to use the system.

Preconditions
-------------
The user came to the front page of GMO website.

Postconditions
--------------
The user is logged in as appropriate role.

Basic Flow
----------
1. System presents the login page with username and password field.
2. User enters the username.
3. User enters the password.
4. User clicks the login button.
5. System verifies the provided information to make sure that it is correct.
6. System redirects the user to an appropriate home page:
	* Entrepreneur: Request list (entrepreneur).
	* GMO Staff: Request list (staff).
	* Lab Staff: Lab request homepage.
	* Administrator: Control panel.

Alternate Flows
---------------
5a. The credential is not correct (either username does not exist or password is wrong)

1. System presents the login page again, but also display the error message.
2. Continue at step 2 in the basic flow.


Frequency of Occurrence
-----------------------
Very frequent. The user must login every time he/she want to use the software.




