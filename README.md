### This is a repository for my Web Technologies Class CS-4413 at UTSA
### All links point to lab assignments instructions will be provided below for each lab..

# Lab6
    For this lab you will create an html file named "lab6.html" that links to an external JavaScript file named "lab6.js".  Within the JavaScript file, define and code an object. 
    This object should be much like the object sample in the chapter 3 lecture slides (starting with slide 36). The object should have at least 3 properties and 2 methods. 
    Both methods should produce output using either alert() or document.write(). Once you have written this code, create an instance of your object, set its properties and run its functions.


# Lab7
    For Lab #7 deploy a cloud instance that you can use for the remainder of the course. The cloud server must have a webserver, PHP, and MySQL installed on it. You may use AWS, Azure, Oracle, or any other provider that gives free access to students or lengthy free trial periods. 
    When you have launched this server, upload your content from lab #5(index.html, me.html, contact.html, and any CSS files to your server. Place the content in a folder titled "lab7."



# Lab8
For Lab #8 you will complete a set of tasks that the professor will review and assess. 

    Create a directory titled lab8 on your webserver.
    Ensure that PHP is working on your server.
    Test your PHP by uploading the "info.php" file provided by the professor to your lab8 directory. Using a browser, navigate to https://myserver.somedomain.net/lab8/info.php 
    Review the information provided by this page. If it does not work, ensure PHP is properly configured and that directory and file permissions are set correctly.
    Next, upload the index.html and ajax.php files uploaded by the professor into your lab8 folder.
    Now, write the JavaScript the lab and save it as "lab8.js". Once complete, upload it to your lab8 folder on the web server. 
    Navigate to https://myserver.somedomain.net/lab8/index.html
    Test your JavaScript via the index.html page.

    Specifications for lab8.js:

    Create a function titled getDataFromForm() that:
        Obtains the first name and last name from the form elements in index.html
        Calls runAjax and sends the two strings as arguments
    Create a function titled runAjax(fname, lname) that:
        Makes an AJAX request to "./ajax.php" using the GET method. The AJAX request should send the first and last names as a part of the request.
        If the response is a string, change the text of the paragraph element with the id "responseString".



# Lab9
For this lab you will connect PHP to MySQL using source code provided by the professor (developed in class on Tuesday 10/17). Complete the following tasks:

    Upload the provided PHP files to a directory on your web server named "lab9".
    If you have not already done so, create a user on your database server that has privileges to create schemas and tables and read/write data to them.
    Using MySQL or the terminal run/import the provided database: database_lab9.sql 
    
    Download database_lab9.sqlOpen this document with ReadSpeaker docReader (the user will need privileges to create schemas).
    Modify the login data with the show_db_contents.php PHP script to connect to your MySQL server using the provided code. 
    Run show_db_contents.php by loading it as a url in your web browser.



# Lab10
For lab #10 complete the following tasks:

    Write a PHP script to create and write to a file on the web server. The file should be appended to every time it is written to. The PHP script should be titled "save_data.php".
    "save_data.php" should be run as the result of a POST web form action. It should receive a first and last name.
    Make sure that PHP writes this file to a non-public folder. This means that PHP will save the file on the hard drive of the web server but not in the webserver's root tree (htdocs, wwwroot, etc.).
    Write a second PHP script ("show_data.php") that will open this file and read its contents into a PHP array. Use PHP and a loop to create a table that dynamically generates and displays the file contents.
    Create an HTML page with a form. Name the file "index.html". This HTML file will have a form with two textboxes and a submit button. When the submit button the page should send the data to "save_data.php" for saving.
    Upload your scripts and HTML page to your public cloud webserver and test.



# Lab12
For lab #12 complete the following tasks:

    Write a PHP script to that sets a cookie named "cs4413" when it is run. You may choose the value stored in the cookie and the expiration time frame (as long as it is longer than 1 minute).
    The script should start by checking to see if the cookie is already set.
    If it is set, tell the user this using an echo statement.
    If it is not set, set it.
    Upload your work to your cloud server.
