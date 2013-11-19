Use Case Name
-------------
Login

XRef
----
uc202

High Level Design
-----------------
There will be 4 components:

* Username field
* Password field
* Login button
* Error message panel (initally invisible)

The login button, when clicked, will check the user's credential and take the
user to appropriate home page. Otherwise, it will display the login form
again, but with error message panel visible.

Low Level Design
----------------

![Screenshot](images/ds202-login-example.png)

* __Username field__ - User enters the username.
	* Placeholder: "Username"
* __Password field__ - User enters the password.
	* Placeholder: "Password"
* __Login button__
	* When clicked,
		1. Find the user with the given username.
		2. If the user is not found,
			* Redirect back to login form, displaying an error message.
			* Abort these steps.
		3. Check the user's password against the data from the database.
		4. If the password is incorrect,
			* Redirect back to login form, displaying an error message.
			* Abort these steps.
		5. Check the user type, and redirect user to appropriate page.
* __Error message panel__
	* Display the text: "Invalid username or password."
	* Display only when the the username or password is incorrect.


| User Type | Redirect To |
| --------- | ----------- |
| Customer  | Entrepreneur Home Page |
| Agency    | Entrepreneur Home Page |
| GMO Staff | Staff's List All Requests page |
| Lab Staff | Lab Staff's List All Tasks page |



| Component Name             | ID               | Name      |
| -------------------------- | ---------------- | --------- |
| Login form                 | #login-form      |           |
| Username field             | #username        | username  |
| Password field             | #password        | password  |
| Login button               | #login-button    |           |
| Error message panel        | #login-errors    |           |













