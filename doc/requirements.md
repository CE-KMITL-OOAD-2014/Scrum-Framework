Requirements
================

## Functional requirements

1. สามารถทำการเข้าสู่ระบบได้
2. สามารถสมัครสมาชิกได้
3. สามารถจัดการทีมได้
4. สามารถดูและจัดการ Product Backlog ได้
5. สามารถดูและจัดการ Sprint Backlog ได้
6. สามารถเรียกดู Task Board ได้
7. สามารถแสดงความคิดเห็นใน ส่วนต่าง ๆ ของระบบได้
8. มีส่วนที่สามารถถูกเรียกใช้เพื่อเชื่อมต่อแอปพลิเคชันโดยสามารถดึงข้อมูล Sprint Backlog จากแอปพลิเคชันได้

## Non-Functional requirements

1. ระบบมีความทนทานต่อความผิดพลาดภายในระบบ
2. ระบบสามารถเข้าถึงได้จากทุกที่ตลอดเวลา
3. ระบบมีความปลอดภัยโดยมีการป้องกันการโจมตีผ่านทาง SQL (SQL injection), ป้องกันการโจมตีด้วยการฝั่งรหัส (Cross-Site Scripting), เข้ารหัสช่องทางการสื่อสาร (https)
4. ระบบสามารถเข้าถึงได้จากอุปกรณ์เคลื่อนที่ และคอมพิวเตอร์ตั้งโต๊ะ
5. รองรับจำนวนผู้ใช้งานได้มากกว่า 100 คน พร้อม ๆ กัน
6. ระบบสามารถใช้งานได้ง่าย
7.  ระบบสามารถรองรับการเติบโตของฐานผู้ใช้งาน


## Use case diagram

![gopherTest](http://i.imgur.com/Qy7slOH.png)

## Use case specifications

1.
2.

## Activity diagrams

### Use case : ระบบบริหารจัดการทีม (Members Management System)
![TeamManagement](http://i.imgur.com/OWaxyu0.png)

### Use case : ระบบแสดงความคิดเห็น (Comment System)
![CommentSystem](http://i.imgur.com/PutkimV.png)
