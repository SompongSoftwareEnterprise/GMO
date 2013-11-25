URL Routes Design
=============

Main
-------------

| HTTP Request | URL | Method |
| ------------ | --- | ------ |
| GET | / | LoginController#index |
| POST | /login | LoginController#login |

Entrepreneur
-------------

| HTTP Request | URL | Method |
| ------------ | --- | ------ |
| GET | /entrepreneur | EntrepreneurRequestsController#index |
| GET | /entrepreneur/requests/new | EntrepreneurRequestsController#newRequests |
| POST | /entrepreneur/requests/:form_id | EntrepreneurRequestsController#create |
| GET | /entrepreneur/requests/:id | EntrepreneurRequestsController#show |
| GET | /entrepreneur/invoices/:id | EntrepreneurInvoiceController#show |
| GET | /entrepreneur/account | EntrepreneurAccountController#index |
| GET | /entrepreneur/account/edit | EntrepreneurAccountController#edit |
| POST | /entrepreneur/account | EntrepreneurAccountController#update |
| GET | /entrepreneur/account/agencies | EntrepreneurAgenciesController#agencies |
| POST | /entrepreneur/account/agencies | EntrepreneurAgenciesController#createAgency |
| POST | /entrepreneur/account/agencies/:id/delete | EntrepreneurAgenciesController#deleteAgency |
| GET | /entrepreneur/dmt-requests/new | EntrepreneurDomesticRequestsController#newRequests |
| POST | /entrepreneur/dmt-requests/:form_id | EntrepreneurDomesticRequestsController#create |
| GET | /entrepreneur/dmt-requests/:id | EntrepreneurDomesticRequestsController#show |

Staff
-------------

| HTTP Request | URL | Method |
| ------------ | --- | ------ |
| GET | /staff | StaffRequestsController#index |
| GET | /staff/requests/:id | StaffRequestsController#show |
| POST | /staff/requests/:id/receipt | StaffRequestsController#createReceipt |
| GET | /staff/receipts/:id | StaffRecieptsController#show |
| GET | /staff/register | RegistrationController#index |
| GET | /staff/register/customer | RegistrationController#registerCustomer |
| GET | /staff/register/agency | RegistrationController#registerAgency |
| POST | /staff/register | RegistrationController#submitRegister |
| GET | /staff/requests/:id/labtask/new | StaffRequestsController#newLabTask |
| POST | /staff/requests/:id/labtask | StaffRequestsController#createLabTask |
| GET | /staff/requests/:id/result/new | StaffRequestsController#newResult |
| POST | /staff/requests/:id/result | StaffRequestsController#createLabTask |
| GET | /staff/results/:id | StaffResultController#show |

Lab Staff
-------------

| HTTP Request | URL | Method |
| ------------ | --- | ------ |
| GET | /lab | LabController#index |
| GET | /lab/task/:id | LabController#show |
| POST | /lab/task/:id/documents | LabController#upload |
| POST | /lab/task/:id/finish | LabController#finish |