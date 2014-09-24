#M2: Architectural Design, UML diagrams & Implementation Plan


**ชื่อโปรเจค** : Scrum Framework
**ชื่อกลุ่ม** : Deadline-Driven-Development
**ชื่อสมาชิกในกลุ่ม**
		1. นายชานน จรัสสุทธิกุล รหัสนักศึกษา 55010280
		2.  นายณัฐพงศ์ อมรบัญชรเวช รหัสนักศึกษา 55010371

###Problem Analysis
 - Components
	 - ส่วนจัดการสิทธิ์ของสมาชิกในทีม
	 - ส่วนสำหรับเพิ่ม ลบ สมาชิกในทีม	
	 - ส่วนสำหรับเพิ่ม User Story
	 -  ส่วนสำหรับถอน User Story
	 - ส่วนจัดลำดับความสำคัญของ User Story
	 - ส่วนสำหรับเลือก User Story เข้าไปดำเนินการใน Sprint
	 - ส่วนสำหรับเพิ่ม หรือถอนงานใน Task Board
	 - ส่วนสำหรับมอบหมายงานให้สมาชิกในทีม
	 - ส่วนสำหรับกำหนดสถานะให้กับงานใน Task Board
	 - ส่วนสำหรับเพิ่มความคิดเห็น
	 - ส่วนสำหรับแก้ไขความคิดเห็น
	 - ส่วนสำหรับลบความคิดเห็น
 - Abstraction
	- กระดาน Taskboard ที่แบ่งออกเป็น 3 ส่วน คือ To do, In progress และ Done
	- รายการความต้องการของลูกค้า (Product Backlog) แสดงรายการความต้องการของลูกค้าตามลำดับความสำคัญที่กำหนดไว้
	- รายการงานย่อย (Sprint Backlog) แสดงรายละเอียดงานย่อยๆ ที่แบ่งออกมาจาก Product Backlog 
	- บันทึกแสดงความคิดเห็น (Comments) แสดงความคิดเห็น และ/หรือ อธิบายรายละเอียดงานเพิ่มเติมจาก Sprint backlog

###Application Architechture

![AppArch](http://i.imgur.com/aF1xNA1.png)


 - **ระบบบริหารจัดการทีม:** เป็นระบบที่ใช้สำหรับจัดการเกี่ยวกับทีมและสมาชิกในทีม รวมถึงการกำหนดระดับสิทธิ์และหน้าที่ให้แก่สมาชิก มี Scrum Master เป็นผู้ใช้งานระบบ โดยติดต่อกับฐานข้อมูลของทีมและสารสนเทศผู้ใช้งาน

 - **ระบบบริหารจัดการ Sprint Backlog:** เป็นระบบสำหรับจัดการกับ Sprint ซึ่งประกอบไปด้วยกระดานงาน (Task Board) ส่วนสำหรับเพิ่ม - ลบงานย่อย ส่วนสำหรับกำหนดสถานะปัจจุบันของงานย่อย และส่วนของการกำหนดงานให้กับสมาชิกของทีม สมาชิกในทีมและ Scrum Master สามารถเข้าถึงการใช้งานในส่วนนี้ได้ โดยระบบจะทำการติดต่อกับฐานข้อมูล Backlog เพื่อจัดเก็บข้อมูลและรายละเอียดของ Sprint และ Task Board

 - **ระบบแสดงความคิดเห็น**: เป็นระบบสำหรับให้สมาชิกในทีม Product Owner และ Scrum Master ทำการแสดงความคิดเห็นลงในงานย่อยของ Task Board บน Task Board ของ Sprint Backlog ได้ โดยผู้ใช้จะสามารถทำการเพิ่ม ลบ และแก้ไขความคิดเห็นได้ ระบบแสดงความคิดเห็นนี้ทำการติดต่อกับฐานข้อมูลในส่วนของความคิดเห็น

 - **ระบบบริหารจัดการ Product Backlog:** เป็นระบบสำหรับให้ Product Owner เป็นผู้บันทึกหรือลบ User Story ใน Product Backlog ได้ และสามารถทำการจัดลำดับความสำคัญ รวมทั้งเลือก User Story ที่จะดำเนินการใน Sprint ที่เลือกไว้ได้ ระบบนี้ทำการติดต่อกับฐานข้อมูลในส่วนของ Backlog

###Subsystems / Components
1. ระบบบริหารจัดการทีม (Team Management System) 
เป็นส่วนที่บริหารจัดการทีม การเพิ่มสมาชิกเข้ามาในทีม, การลบสมาชิกออกจากจากทีม และ การให้ตำแหน่งสมากชิกในทีม มีส่วนประกอบย่อย ๆ ดังนี้
  1. ส่วนจัดการสิทธิ์ของสมาชิกในทีม สิทธิของทีมแบ่งตามตำแหน่งต่างๆ คือ หัวหน้า Scrum (Scrum Master), เจ้าของผลิตภัณฑ์ซึ่งเป็นลูกค้าหรือผู้ติดต่อลูกค้า (Product Owner), สมาชิกในทีม (Team Member) 
  2. ส่วนสำหรับเพิ่มสมาชิกในทีม
  3. ส่วนสำหรับลบสมาชิกในทีม
ในส่วนนี้สมาชิกที่มีตำแหน่ง Scrum Master เป็นผู้ใช้งาน โดยจะติดต่อกับฐานข้อมูลของทีมและผู้ใช้งาน

2. ระบบจัดการ Product Backlog (Product Backlog Management System)
เป็นส่วนที่บริหารจัดการ Product Backlog โดย สามารถเพิ่ม user story, การลบ user story, การกำหนดลำดับความสำคัญของ user story, และการนำ user story ไปใส่ในแต่ละ sprint มีส่วนประกอบย่อยๆดังนี้
 1. ส่วนสำหรับเพิ่ม User Story
 2. ส่วนสำหรับถอน User Story
 3. ส่วนจัดลำดับความสำคัญของ User Story
 4. ส่วนสำหรับเลือก User Story เข้าไปดำเนินการใน Sprint
ในส่วนนี้ สมาชิกในทีมที่มีตำแหน่งเป็น Product Owner เป็นผู้ใช้งาน โดยจะติดต่อกับฐานข้อมูลจัดการ Backlog

3. ระบบจัดการ Sprint Backlog (Sprint Backlog Management System)
เป็นส่วนที่บริหารจัดการ Sprint Backlog โดยสามารถเพิ่มงาน, ลบงาน, มอบงานให้กับสมาชิกในทีม, การย้ายสถานะของงาน (มี 3 สถานะ คือ To-do In progress และ Done) และ Comment มีส่วนประกอบย่อยๆดังนี้
 1. ส่วนสำหรับเพิ่ม หรือถอนงานใน Task Board
 2. ส่วนสำหรับมอบหมายงานให้สมาชิกในทีม
 3. ส่วนสำหรับกำหนดสถานะให้กับงานใน Task Board
ในส่วนนี้มีสมาชิกของทีม และ Scrum Master เป็นผู้ใช้งาน โดยจะเป็นส่วนหลักที่ใช้ในการทำงาน และมีการติดต่อกับฐานข้อมูลจัดการ Backlog เช่นเดียวกันกับระบบจัดการ Product Backlog
4. ระบบแสดงความคิดเห็น (Comment System)
เป็นส่วนที่สามารถใส่รายละเอียดหรือให้สมาชิกในทีมแสดงความคิดเห็นต่องานใน Sprint Backlog โดยสามารถ เพิ่มความคิดเห็น, แก้ไขความคิดเห็น และ ลบความคิดเห็น มีส่วนประกอบย่อย ๆ ดังนี้
 1. ส่วนสำหรับเพิ่มความคิดเห็น
 2. ส่วนสำหรับแก้ไขความคิดเห็น
 3. ส่วนสำหรับลบความคิดเห็น
ในส่วนนี้จะมีสมาชิกในทีม และ Scrum Master เป็นผู้ใช้งาน โดยมีการติดต่อกับฐานข้อมูลความคิดเห็น

5. ฐานข้อมูลสมาชิกและทีม
ใช้เพื่อเก็บรายละเอียดของผู้ใช้งานแต่ละคน รายละเอียดของทีม หน้าที่ของสมาชิก และรายชื่อสมาชิกของทีม 

6. ฐานข้อมูล Backlog
ใช้เพื่อเก็บข้อมูลของ Project ที่ได้มีการสร้างขึ้น โดยประกอบไปด้วย Product Backlog และ Sprint Backlog ของแต่ละ Project

7. ฐานข้อมูลความคิดเห็น
ใช้เพื่อเก็บความคิดเห็นทั้งหมดจาก Sprint Backlog ที่มีการเพิ่มเข้ามาในระบบ

####Sequence diagrams

- สร้าง Sprint Backlog

![UserCreatesSprintBacklog](http://i.imgur.com/26zCj7j.png)

- สร้างโปรเจกต์

![UserCreatesProject](http://i.imgur.com/VXkT4jw.png)

- เพิ่มความคิดเห็น

![UserComments](http://i.imgur.com/gf4CZLw.png)

###Domain classes

![ClassDiagram_rev5](http://i.imgur.com/frcLbCF.png)

 **รายละเอียด Class diagram:**
 
 จาก diagram ข้างต้น User จะมี Interface User Repo ไว้เข้าถึงฐานข้อมูลโดยไม่ต้องผ่าน Service และ User สามารถสร้าง Team เพื่อไปเชื่อมต่อกับ Service ต่างๆ ดังต่อไปนี้: ProjectManagementService, TeamManagementService, UserStoryManagementService, SprintManagementService, SprintbacklogManagementService, และ CommentService ซึ่งในแต่ละ Service จะมีการเรียกใช้ Repository ของตนเองเพื่อดึงข้อมูลจากฐานข้อมูล และ แต่ละ Service จะมี object model เป็นเองตนเองด้วย เพื่ออธิบายลักษณะของ object ที่สร้างขึ้นจากการเรียกใช้ Service นั้นๆว่ามีองค์ประกอบอะไรบ้าง ตัวอย่างเช่น Team จะติดต่อกับ SprintBacklogManagementService เพื่อใช้ Service ของ SprintBacklogManagementService เช่น การสร้าง SprintBacklog และ จะมี SprintBacklog เป็น object model ซึ่งกล่าวถึงลักษณะของ SprintBacklog ว่ามี comment ต่าง ๆ ใน Sprintbacklog, ข้อความของ SprintBacklog และ มีสถานะของ Sprintbacklog เป็นต้น

###Deployment
 - ระบบนี้จะใช้ Software และ Technology ดังต่อไปนี้:
     -  Infrastructure:
        -   Ubuntu 14.04 LTS
        -   Nginx Web Server
        -   Microsoft Azure Load Balancer
        -   Microsoft Azure DNS Server
     -  Back-end
        -   PHP 5.5
        -   MongoDB
        -   Laravel - PHP framework
        -   Composer - PHP Dependency manager
     -  Front-end
        -   AngularJS
        -   Twitter Bootstrap
        -   HTML5
        -   CSS3
 - โดย Software ในส่วนของ Application หลักจะทำงานบน VM สองเครื่อง (IP:168.63.175.88, 168.63.175.57)
  และมี database เริ่มต้นเป็นจำนวน 3 instance

##Implementation Plan

![GanttChart_Infra](http://i.imgur.com/iWFZtT5.png)

![GanttChart_App](http://i.imgur.com/6P28tXG.png)

![ProductBacklog_rev3](http://i.imgur.com/iKpa6uH.png)
