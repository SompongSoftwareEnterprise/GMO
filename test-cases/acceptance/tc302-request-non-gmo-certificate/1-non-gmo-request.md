Test Plan: Request non-GMO request form (1-2/1 & 1-1/2)
=======================================================

## Purpose

To make sure that the System got the correct non-GMO Certificate Request when Entreprenuer submited the form.

## XRef

uc302

## Actors

Entreprenuer

## Preconditions

* Entreprenuer is logged in.

## Test Procedure

1. Login as Customer or Agency.
    * Must login successfully
2. Click the Make new request button.

3. Click the Form 1-2/1 button.
    * Non-GMO Certificate Request form must appear.
4. Fill Part (1-2/1) and Part (1-2/2)
    * Part (1-2/2) - Fill the plant list and if more than one plant, click Add Plant button.
        * If click Delete button, the specific plant must be deleted.
        * If there's one plant left, the Delete button must be disabled.
        
5. Submit the form with incomplete/incorrect data.
    * An error box must be shown.
    * the remaining/incorrect field is highlight.
    * the filled field must be the same.

6. Complete the remaining/incorrect fields with the data.
7. Submit the form.
    * The user must be taken back to view request page.
