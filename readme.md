# **Doctor Web Portal**

#### This is a Doctor Web Portal where Admin can register Doctors and Patients while also allocating Patients to Doctors. Doctors on logging in can view the list of patients allotted to them.

#### I have used PHP for backend, HTML and CSS for frontend and MySQL for database.

#### You can copy the project files in your local development environment, you need to have xampp installed on your pc and make sure it's up and running. Enter "localhost/filename" as url in your preferred browser to see the website.   

## The homepage offers two choices: logging in either as an admin or as a doctor.
<img src="images/home.png" width="800">

## Developed an exclusive Admin Login Panel that directly fetches administrator data from the database, ensuring secure access with a single authorized admin.
<img src="images/adminLogin.png" width="800">

## Once logged-in, admin gets the following options
<img src="images/adminLoggedIn.png" width="800">

## Implemented Doctor Registration functionality accessible solely from the Admin interface upon admin authentication.
<img src="images/registerDoctor.png" width="800">

## Incorporated Patient Registration feature within the Admin interface, allowing streamlined patient registration under the admin's supervision.
<img src="images/registerPatient.png" width="800">

## Enabled the allocation of patients to doctors, permitting each doctor to manage multiple patients through the Admin interface after successful login.
<img src="images/allotPatient.png" width="800">

## Established a Doctor Login Panel, allowing access only to registered doctors while promptly notifying invalid credentials for unauthorized attempts.
<img src="images/doctorLogin.png" width="800">

## Implemented a comprehensive display of all allocated patients, providing actionable statuses such as Treatment Completed, Processing, Pending (default), and Hold. Actions corresponding to these statuses are executed accordingly, ensuring efficient patient management.
<img src="images/allottedPatientsList.png" width="800">