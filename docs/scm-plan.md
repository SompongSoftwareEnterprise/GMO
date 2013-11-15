SCM Plan
========
เอกสารนี้อธิบายแผนการจัดการ Software Configuration (ให้ดูในหนังสือ TSP บท Appendix B หากไม่เข้าใจว่า SCM คืออะไร)

Configuration Identification Plan
---------------------------------
ทุกอย่างที่อยู่ใน Repository นี้จะถือว่าอยู่ในระบบ Configuration Management ซึ่งการเปลี่ยนแปลงทั้งหมดใน Repository จะต้องผ่าน Configuration Control Board โดยใช้กระบวนการตามเอกสารนี้

สิ่งที่จะอยู่ในระบบ Configuration Management ได้แก่:

* Requirements
* Design
* Test Cases
* Source Code
* Standards


### Items on Google Drive

ไฟล์บางชนิด ไม่สะดวกที่จะเก็บไว้ใน GitHub เลยเก็บไว้บน Google Drive แทน ดังนี้:

* Project Plan


Configuration Items and File Naming
-----------------------------------

| ชนิดไฟล์         | โฟลเดอร์ / ชื่อไฟล์                  |
| -------------- | -------------------------------- |
| Requirements   | use-cases / uc201-use-case-name.md |
| Design         | designs / ds201-design-name.md   |
| Unit Test Script       | casper / unit / ut000-test-case-name.js |
| Regression Test Script | casper / unit / issue11-test-case-name.js |
| Acceptance Test Script | casper / acceptance / tc111 / 1-test-case-name.js |
| Source Code    | gmo / * |
| Unit Test Case | test-cases / unit / ut000-test-case-name.md |
| Regression Test Case | test-cases / unit / issue11-test-case-name.md |
| Acceptance Test Case | test-cases / acceptance / tc111 / 1-test-case-name.js |

\* - follows the naming conventions in Laravel


### On Google Drive

| ชนิดไฟล์         | โฟลเดอร์ / ชื่อไฟล์                  |
| -------------- | -------------------------------- |
| Project Plan   | Plan/Cycle 2.2 Plan (v2, as of 2013-11-11) |


File Versioning
---------------
ไม่จำเป็นต้องใส่หมายเลขเวอร์ชั่นไว้ในชื่อไฟล์ เพราะ Git จะทำหน้าที่จัดการการเปลี่ยนแปลงไฟล์ที่ชื่อเดียวกันให้เองโดยอัตโนมัติ หากเปลี่ยนชื่อไฟล์ไปเรื่อยๆ จะทำให้ Git ไม่สามารถตรวจสอบการเปลี่ยนแปลงได้อย่างดีที่สุด

* วิธีการตรวจสอบไฟล์เวอร์ชั่นเก่าๆ ให้กดที่ปุ่ม History เว็บจะแสดงรายการการเปลี่ยนแปลงทั้งหมดที่เคยเกิดขึ้นกับไฟล์นั้น
* วิธีการตรวจสอบเจ้าของไฟล์ ให้ดูตรงรายชื่อข้างบน จะแสดงรายชื่อคนที่แก้ไฟล์ๆ นั้นทั้งหมดอยู่
* วิธีการตรวจสอบว่าส่วนไหนของไฟล์ ถูกแก้เมื่อไร โดยใคร ให้กดปุ่ม Blame หน้าเว็บจะแสดงข้อมูลแต่ละบรรทัด กำกับด้วยเวลาที่บรรทัดนั้นถูกแก้ล่าสุด และชื่อคนแก้

Storage Location
----------------
ข้อมูลทั้งหมดที่ถูก Baseline จะอยู่ใน master branch ซึ่งสามารถใช้ Git เพื่อตรวจดูวันเวลา และเข้าของของข้อมูลทั้งหมด


Configuration Control Procedure
-------------------------------
ไฟล์ทั้งหมดที่อยู่ใน "master" branch ถือว่าเป็นบรรทัดฐาน (Baseline) ห้ามเปลี่ยนแปลงโดยพลการ ขั้นตอนการเปลี่ยนแปลงเป็นไปตามนี้ (วิธีการนำมาจาก [GitHub Flow](http://scottchacon.com/2011/08/31/github-flow.html))

1. เวลาจะแก้ข้อมูลใดๆ ที่อยู่ใน Repository นี้ให้แต่ละคนสร้าง Branch ใน Repository แยกออกมา ห้ามแก้ master โดยพลการ
2. ให้ push โค้ดขึ้นมาใน Branch ที่สร้างเรื่อยๆ
3. ให้สร้าง Pull Request และใส่เนื้อหาตาม [[CCR (Pull Request) Template]]
    * หากยังแก้ไม่เสร็จ ให้ใส่คำนำหน้าชื่อไว้ด้วยว่า [WIP] เมื่อเสร็จแล้วให้เอาออก
4. เมื่อผ่านการ Review แล้ว ให้ CCB (Configuration Control Board) ทำการ Merge


Configuration Control Board
---------------------------
ผู้ที่มีอำนาจในการอนุมัติการเปลี่ยนแปลง เข้าสู่ master มีดังนี้:

* Krittin (SM)
* Kanisorn (SM)



