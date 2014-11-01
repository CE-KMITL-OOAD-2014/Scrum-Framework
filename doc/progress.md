##M3: Implementation Progress & Test Plan

**ชื่อโปรเจค** : Scrum Framework

**ชื่อกลุ่ม** : Deadline-Driven-Development

**ชื่อสมาชิกในกลุ่ม**

		1. นายชานน จรัสสุทธิกุล รหัสนักศึกษา 55010280
		2. นายณัฐพงศ์ อมรบัญชรเวช รหัสนักศึกษา 55010371

###Progress 
เนื่องจากมีการประชุมกันภายในทีมและได้สร้างแผนงานใหม่ดังนี้

**สัปดาห์ที่ 2 วันที่ 20-26ต.ค**
  
  **ขั้นตอนที่ 1:** พัฒนาระบบ Login & Register (พัฒนาต่อจากสัปดาห์ที่ 1)
  ผู้รับผิดชอบ: ณัฐพงศ์ อมรบัญชรเวช
  **ความคืบหน้า:** ทำเสร็จเรียบร้อย

  **ขั้นตอนที่ 2:** สร้างความสัมพันธ์ระหว่าง User Model, Taskboard Model, Team Model
  ผู้รับผิดชอบ: ณัฐพงศ์ อมรบัญชรเวช
  **ความคืบหน้า:** ทำเสร็จเรียบร้อย
  
  **ขั้นตอนที่ 3:** พัฒนาระบบส่วนของการสร้างทีมและแสดงชื่อทีม
  ผู้รับผิดชอบ: ชานน จรัสสุทธิกุล
  **ความคืบหน้า:** ทำเสร็จเรียบร้อย

  **ขั้นตอนที่ 4:** พัฒนาระบบส่วนของการจัดการ Taskboard (สร้างและลบ)
  ผู้รับผิดชอบ: ชานน จรัสสุทธิกุล
  **ความคืบหน้า:** ทำเสร็จเรียบร้อย

  **ขั้นตอนที่ 5:** สร้างชุดทดสอบเพื่อทดสอบระบบ 
  ผู้รับผิดชอบ: ชานน จรัสสุทธิกุล, ณัฐพงศ์ อมรบัญชรเวช
  **ความคืบหน้า:** ทำเสร็จเรียบร้อย

**ปัญหาที่พบ :** การทำงานในส่วนของ Web Application นั้นจำเป็นต้องทำทีละขั้นตอน ทำให้เกิดคอขวดในการทำงานค่อนข้างสูง เวลาในการดูแลในส่วนของโครงสร้างพื้นฐานของระบบจึงมีน้อยลง

###Test

1. รายละเอียด: ทดสอบการดึงข้อมูล Board
File name: BoardTest.php
Directory: https://github.com/CE-KMITL-OOAD-2014/Scrum-Framework/blob/master/scrumframework/app/tests/BoardTest.php

2. รายละเอียด: ทดสอบการตรวจสอบการสร้าง Username ซ้ำ
   Filename: UserModelTest.php
   Directory: https://github.com/CE-KMITL-OOAD-2014/Scrum-Framework/blob/master/scrumframework/app/tests/UserModelTest.php

###Evaluation

**การทดลองที 1:** การสร้าง Taskboard
**จุดประสงค์การทดลอง:** เพื่อตรวจสอบว่า Taskboard สามารถสร้างได้
**สิ่งที่จะวัด:** มีส่วนของการสร้าง Taskboard บน User Interface และสามารถกรอกชื่อ Taskboard และกดสร้าง Taskboard ได้

**วิธีทำการทดลอง**
1. เข้าสู่แอปพลิเคชัน, กดปุ่ม sign up, กรอกรายละเอียดต่าง ๆ เพื่อเข้าเป็นสมาชิกของระบบ
2. กดปุ่ม Log in เพื่อผ่านกระบวนการยืนยันตัวตนของระบบ
3. กดปุ่ม +Board ซึ่งเป็น Dropdown list จะแสดงรายละเอียดของ Dropdown list ออกมา ให้กดปุ่ม Add new board เพื่อสร้าง Board ใหม่
4. กรอกชื่อ Board ที่ต้องการจะสร้าง จากนั้นกด Create
5. ตรวจสอบ User Interface ว่ามี Board แสดงออกมาหรือไม่ โดย Board จะประกอบด้วย 3 ส่วนหลักๆ คือ To do, In progress (Doing) และ Done โดยจะแสดง Product Backlog ทางด้านซ้ายของ Board

**สิ่งที่ใช้ในการทดลอง: **
1. อุปกรณ์ที่สามารถเข้าใช้งาน Web Browser ได้ เช่น Laptop เป็นต้น
2. URL สำหรับเข้าถึง Web Application นี้ (Scrum Framework) ในที่นี้คือ scrumframework01.cloudapp.net
3. Virtual Machine ที่ deploy scrum framework application และ run บน Microsoft Azure
4. E-Mail และ Password ที่ใช้ในการสมัคร
5. ชื่อของ Board ที่จะกรอกตอนสร้าง Board

**ผลที่ได้จากการทดลอง**

  -

**สรุปผลการทดลอง**

  -

**การทดลองที่ 2:** การแสดงผล User Interface ในส่วนของการเคลื่อนย้าย Sprint Backlog

**จุดประสงค์การทดลอง:** เพื่อตรวจสอบว่าสามารถเคลื่อนย้าย Sprint Backlog ได้ โดยสามารถลาก Sprint Backlog จาก To do ไปยัง Doing ได้

**สิ่งที่จะวัด:** ตำแหน่งของ Sprint Backlog เมื่อลาก Sprint Backlog เคลื่อนย้ายจาก To do ไปยัง Doing

**วิธีทำการทดลอง**

1. เข้าสู่แอปพลิเคชัน, กดปุ่ม sign up, กรอกรายละเอียดต่าง ๆ เพื่อเข้าเป็นสมาชิกของระบบ
2. กดปุ่ม Log in เพื่อผ่านกระบวนการยืนยันตัวตนของระบบ
3. กดปุ่ม +Board ซึ่งเป็น Dropdown list จะแสดงรายละเอียดของ Dropdown list ออกมา ให้กดปุ่ม Add new board เพื่อสร้าง Board ใหม่
4. กรอกชื่อ Board ที่ต้องการจะสร้าง จากนั้นกด Create
5. สร้าง Sprint Backlog ขึ้นมาโดยเมื่อสร้างแล้ว Sprint backlog จะอยู่ในส่วนของ To do บน Board
6. ลาก (Drag) Sprint Backlog จาก To do ไปวาง (Drop) บน Doing ของ Board
7. ตรวจสอบว่า Sprint Backlog ถูกย้ายมาส่วนของ Doing บน Board หรือไม่

**สิ่งที่ใช้ในการทดลอง**

1. อุปกรณ์ที่สามารถเข้าใช้งาน Web Browser ได้ เช่น Laptop เป็นต้น
2. URL สำหรับเข้าถึง Web Application นี้ (Scrum Framework) ในที่นี้คือ scrumframework01.cloudapp.net
3. Virtual Machine ที่ deploy scrum framework application และ run บน Microsoft Azure
4. E-Mail และ Password ที่ใช้ในการสมัคร
5. ชื่อของ Board ที่จะกรอกตอนสร้าง Board
6. รายละเอียดของ Sprint Backlog ในการสร้าง Sprint Backlog

**ผลที่ได้จากการทดลอง**

  -

**สรุปผลการทดลอง**

  -
