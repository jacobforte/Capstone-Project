# Capstone-Project

A. About this project
This application was written by Jacob, Marcus, Vina, and Zach.
It allows users to subscribe to classes and receive notifications based on certain events.
For example, when a class has fewer than 5 seats, an email is sent to people subscribed to that class and that notification.

B. Related links
The currently hosted website. This link will be broken in the near future
http://40.121.205.213/

Documentation
http://40.121.205.213/documentation

GitHub - where all of our code is.
https://github.com/jacobforte/Capstone-Project

Google Drive - where related documents and drafts are.
https://drive.google.com/drive/u/1/folders/1l0SpFqUmSPNkrlZlU97C_ytU-UZaVVmC

Trello - where all of the tasks that wen into this project are.
https://trello.com/b/nzKO6CA6/capstone-project

Lucid chart - where all of our carts and diagrams are located.
https://www.lucidchart.com/documents#docs?folder_id=182182990&browser=icon&sort=saved-desc

Marvel app - where all of our application markups are located
https://marvelapp.com/5aej573/screen/54087432

C. How to Install
C.1. Required applications
Apache
MySQL
PHP

(OPTIONAL)
Doxygen

C.2. Process
1. Copy all files to the document root. The document root location is specified in the apache configs.
2. Give Apache full permissions to all folders of the project.
3. Create a new Database through MySQL and a user that is allowed execute permissions.
4. In the MySQL command line, source all files located in the resources/SQL/TableCreateScripts folder followed by all files in the resources/SQL/StoredProcedures folder
5. Do external application stuff.
6. (OPTIONAL) If you installed Doxygen, run the following command in the document root file.
    doxygen DoxygenConfig, this will install the documentation