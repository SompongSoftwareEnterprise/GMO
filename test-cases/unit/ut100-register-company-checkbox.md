Test Plan: Test Company Checkbox
================================

## Purpose

To make sure that company checkboxes work!


## XRef

ds102


## Actors

GMO Staff


## Preconditions

* Initial database data: [only-gmo-staff](../../casper/fixtures/only-gmo-staff.yml)
* GMO staff is logged in.


## Test Procedure

1. Login with username="staff" and password="staff"
    * Must login successfully
2. Go to the register page.
3. Check the "is company" checkbox:
    * Last name field must be disabled.
    * Sex radio boxes must be disabled.
    * Date of birth field must be disabled.
4. Uncheck the "is company" checkbox:
    * Last name field must be re-enabled.
    * Sex radio boxes must be re-enabled.
    * Date of birth field must be re-enabled.


