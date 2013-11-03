Use Case Name
-------------
 Agency Management Page
 
XRef
----
uc109

High Level Design
-----------------

# Revork Agency

* After user(Entrepreneur) select their list of desired agency, user is able to see the information of the selected agency.
* User will select the button
    - User can revoke the selected agency by clicking the “Revoke” button.
    - User can go back to the Account information page by clicking the “Back” button.
# Add Agency

* After user(Entrepreneur) select Add” button in Account information page, user is able to fill the agency id in the text field.
* User will click the “Search” button to search for the desired agency.
* System will show the information of the desired agency.
* User will select the button
      - User can add the selected agency by clicking the “Add” button.
      - User can go back to the Account information page by clicking the “Back” button.

Low Level Design
----------------

# Revork Agency 
* If user click “Revoke” button, the system will pop up the confirmation dialog. 
* If user confirms the dialog confirmation, system will delete the specific agency from the agency list of the user.

# Add Agency

* If user click “Search” button, the system will search for agency with the specific ID.
      - in case of id not found, system will present “agency id not found” instead.
* If user clicks “Add” button after the success search, system will pop up the confirmation dialog.
      - in case of confirming the confirmation dialog, system will add the specific agency as the new agency of user.
      - in case of cancelling the confirmation dialog, confirmation dialog will automatically close and system will do nothing.
* If user clicks “Add” button before the success search, system will do nothing.

