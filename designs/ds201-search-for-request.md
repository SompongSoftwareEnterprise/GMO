Use Case Name
-------------
Search for Requests

XRef
----
LAU2 , uc201

High Level Design
-----------------
- The design compose of 4 components
  - Search keyword input field
  - 'Search by..' Dropdown box
  - 'Search' button
  - Message panel (initally invisible)

- Entrepreneur will be able to filter for specific requests by 
  - Input the keyword in the input box.
  - select column to be search from the dropdown box.
  - and then press the button.
 
- Entrepreneur will be informed if their search give no result by a hidden message panel.
 

Low Level Design
----------------
- Search keyword input field
  - Receive search keyword from Entrepreneur.

- 'Search by..' Dropdown box
  - Specify the column to be search , compose of 3 items 
    - Search by Request ID
    - Search by Importer Name
    - Search by Requester

- 'Search' Button
  - Execute 'Search' request

- Message panel
  - Initially invisible
  - If no request were match with the query, become visible with message "No reqeust found"
   
| Component Name             | ID                     |
| -------------------------- | ---------------------- |
| Search keyword input field | #search-input-field    |
| 'Search by' Dropdown box   | #search-by-dropdown    |
| 'Search' button            | #search-button         |
| Message panel              | #search-message-panel  |
