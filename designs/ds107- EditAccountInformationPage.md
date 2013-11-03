Use Case Name
-------------
 Edit Account Information Page

High Level Design
-----------------
* Entrepreneur will be able to edit their information in this page , in this page have 2 buttons save Profile and clear.
* Save button will take Entrepreneur to save Account Information Page and send to Edit Account Information Confirmation Page (5.2.5) 
* Clear button  will clear all information that Entrepreneur put in.     
* Back button will take Entrepreneur back to Account Information Page(5.2.3).      

Low Level Design 
----------------

![Screenshot](images/ds107-EditAccountInformationPage.png)

* Data Format
      - All information in 6.2.4 has to show in label tag(read only).       
      - Password information does not show.
* Confirm Button
      - Save all information into database and doing E-mail sending.
* Back Button
      - Redirect page to 6.2.4 Edit Account Information Page for changing some information.
* E-mail sending
      - All information include password will send to email.
 

