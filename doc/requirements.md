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

#### **1. Use case name:** ระบบบริหารจัดการ Sprint (Sprint Backlog Management)
 + **Use case purpose:** ให้หัวหน้าทีมในการทำ Scrum (Scrum Master) สามารถที่จะเลือก Product Backlog ที่มีลำดับความสำคัญสูงมาใช้ในการกำหนดงานย่อย (Sprint Backlog) ในแต่ละรอบของการทำงาน (Sprint) ได้ และสร้าง Sprint Backlog ตามสถานะของการทำงานได้
 + **Actors:** Scrum Master, สมาชิกในทีม (Team members)
 + **Pre-conditions:** 
   1. Scrum Master ผ่านการยืนยันตัวตน (Authentication) เรียบร้อยแล้ว
   2. Scrum Master มีสิทธิ์ในการดูแลที่โครงการนั้น ๆ
      3. ต้องมี Product Backlog กำหนดไว้ล่วงหน้าอย่างน้อย 1 หัวข้อ
 + **Post-conditions:**
   1. สมาชิกในทีมมีงานที่ได้รับมอบหมาย
   2. ทีมสามารถเริ่มต้นในการทำ Sprint ได้
 + **Limitations:** ไม่สามารถเพิ่มกระดานได้นอกเหนือไปจาก To Do, In Progress, Done
 + **Assumptions:** Scrum Master ทราบว่าจะเลือก Product Backlog ใดเพื่อนำมาใช้กำหนดงานใน Sprint
 + **Primary Scenario:**
   - A. Scrum Master และสมาชิกในทีมทำการเลือก Product Backlog มาหนึ่งข้อเพื่อกำหนดงานใน Sprint ปัจจุบัน
   - B. Scrum Master และสมาชิกในทีมทำการเลือกและมอบหมายแต่ละ Sprint Backlog ให้สมาชิกในทีมแต่ละคน
   - C. Scrum Master หรือสมาชิกในทีม กำหนดสถานะของแต่ละ Sprint Backlog ได้
 + **Alternate Scenarios:**
   + **เงื่อนไขที่ 1 :** Scrum Master หรือสมาชิกในทีมต้องการแก้ไข Sprint Backlog
     - C1. Scrum Master หรือสมาชิกในทีมกดปุ่มเพื่อทำการแก้ไข
     - C2. Scrum Master หรือสมาชิกในทีม ทำการแก้ไขข้อมูล หรือเปลี่ยนสถานะใหม่
     - C3. Scrum Master หรือสมาชิกในทีม บันทึกข้อมูล Sprint Backlog สู่ระบบ
   + **เงื่อนไขที่ 2 :** Scrum Master หรือสมาชิกในทีมต้องการลบ Sprint Backlog
     - C1. Scrum Master หรือสมาชิกในทีม กดปุ่มลบ
     - C2. Scrum Master หรือสมาชิกในทีม ทำการยืนยันการลบข้อมูลจากระบบ

## Activity diagrams

#### Use case : ระบบบริหารจัดการทีม (Members Management System)
![TeamManagement](http://i.imgur.com/OWaxyu0.png)

#### Use case : ระบบแสดงความคิดเห็น (Comment System)
![CommentSystem](http://i.imgur.com/PutkimV.png)
