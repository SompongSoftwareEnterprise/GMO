Test Plan: Request domestic non-GMO request form (1-2/1 & 1-2/2)
================================================================

## Purpose

To make sure that the System got the correct domestic non-GMO Certificate Request when Customer submited the form.

## XRef

uc302

## Actors

Customer

## Preconditions

* Customer is logged in.

## Test Procedure

1. Login as Customer.
    * Must login successfully
2. Click the Make new request button.
3. Click the Form 1-2/1 button.
    * Domestic Non-GMO Certificate Request form must appear.
4. Fill Part (1-2/1) and Part (1-2/2)
   - Fill the form with incomplete data from [domestic-nonGMO-cert-attempt1](domestic_non_gmo_cert_attempt1.yml).
   - Fill plant#1 with dataset#1 
   - When click Delete button of plant#1 must show an alert message.
   - Click add then fill plant#2 with dataset#2
   - Click Delete button of plant#1, it must be deleted without any alert message.
   - Click add then fill with dataset#3
   - Click add then fill with dataset#4
   - Delete plant#1, plant#2 must replace plant#1
   - Submit the form.
    * An error box must be shown with the remaining/incorrect fields.`
    * the filled field must be the same.
5.  - Complete the remaining/incorrect fields with the data from [register-customer-attempt2](domestic_non_gmo_cert_attempt2.yml) 
    - Submit the form.
6. Submit the form.
    * The user must be taken back to view request page.
