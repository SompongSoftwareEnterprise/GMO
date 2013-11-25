
Use Case Name
-------------
Send Email After Registration

XRef
----
uc203

High Level Design
-----------------
After the entrepreneur is registered, the system generates a username
and password, and send an email to the registered email address.
 

Low Level Design
----------------
Upon successful registration,

* The system generates a unique username and password.
	* The username is in form of "user00001".
	* The password is randomly generated with 8 characters, including:
		* Lowercase alphabet
		* Uppercase alphabet
		* Numbers
* The system generates a salt, and hash the password against the salt.
* System stores the "hashed and salt password" and the "salt" in the users table.
* System sends an email to the user with the template.







