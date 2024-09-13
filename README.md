# teacher_portal

Step 1 Start xampp server and start both module mysql and apache

Step 2 Create Database in locally in xampp by name teacher_portal
RUn Command Line CREATE DATABASE teacher_portal; in console of xampp

Step 3
After this import the teacher_portal.sql this is in root directory 

Step 4 clone this project folder and goto the xampp folder there is htdocs folder in this folder create (teacher_portal) folder  upload the all files in this folder (teacher_portal)

Step 5 Then run the http://localhost/teacher_portal/ (folder name after localhost)   

Step 6 After run this url showing login page 

Step 7 user the username is khan and password is 12345

Step 8 show home page of Teacher panel you can add list and update and delete data

I use the php with pdo mysql for backend and for front used bootsrap 5 html 5 css3 and ajax, jquery
login and logout page working with session variable . Its fully dynamic and responsive with highly security, highly scalable and maintainable architecture

Directory Structure
 Folder name -> then file name
 assets->css use style sheet 
 assets->js use java script
 config->database connection 
 function->function.php file common file for get data
 function->action.php file for curd operation
 inc-> call ajax for fetch data in popup for update student data

 IN root directory
 home.php file for list student data and perform crud oprations
 index.php file for log form
 login.php for login functionality
 logout.php file session destroy and redirect index page login form


