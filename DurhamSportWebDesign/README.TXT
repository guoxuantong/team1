PROJECT TITLE: Durham University Sport (DUS)
PURPOSE OF PROJECT: SOFTWARE ENGINEERING FOR THE INTERNET
DATE: 22 May 2019


HOW TO START THIS PROJECT: 
Login.php or Registry.php


DATABASE：
dus_team1.sql

database.php
To run on your localhost, you may need to change db user and db password to suit your own system. Additionally you may need to change the port on which the system runs. 
$db_user = 'root';
$db_pass = '';


USER INSTRUCTIONS:
- To Login as Players:
  Login Username : Iris
  Login Password:12345

- To Login as Managers:
  Login username : zheng
  Password: 123

Github:
url: https://github.com/guoxuantong/team1


-------------------------------------------------------------------------------------

HOW TO USE OUR WEB SITE: 

///////FOR USER: //////////

- Registry
Visitors need to register first, including firstname|lastname|email|usename|password.

- Reset password
If you forget the password, users can change the password thorough the email link.

-Email Functionality
For receiving emails from the system, you need to update the url in forgot.php so that it resembes your own file system. ie
Change the folder path as necessary
$url = "http://" . $localhost . "/team1-master/DurhamSportWebDesign/php/reset.php?token=" . $token . "&email=" . $email;

- Login
After registry, users can login by username and password.

- Facility page
Both users and visitors can see the facilities, but having the booking can only after the user logs in. Click the image or booking button to enter the booking page.

- Calendar page
The calendar shows all existing bookings and classes on each day，according to the day,the week,the month. 
Different colour means different events.

The calendar shows the time which is blocked by exams, which means they are not bookable by anyone.

- Personal Profile
Users can modify their own information,including fisrtname|lastname|email|password

- Booking List
Allow user to view and cancel their all bookings ,and there is a booking button to enter the booking page.

- Booking Page
Users can check the availability of facilities before booking. Then choose the booking date, time and people number.
Then a email of booking confirmation will be sent to the user's email address.


//////FOR ADMIN:////////

- Facility management
Admin could create/add, Edit or Delete a Facility. Ability for editing the capacity for each facility.

-Booking management
Admin could edit or delete an existed booking. 

- Booking Page
Admin can also check the availability of facilities before booking. Then choose the booking date, time and people number.

-Block booking
Admin could also be able to block out a period of time and facilities as they are not bookable by anyone during the exam period.
An individual sports trainer can block book a facility if the trainer contact the admin directly to book into that class and not through the booking system.



