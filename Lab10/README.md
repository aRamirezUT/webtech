For lab #10 complete the following tasks:

    Write a PHP script to create and write to a file on the web server. The file should be appended to every time it is written to. The PHP script should be titled "save_data.php".
    "save_data.php" should be run as the result of a POST web form action. It should receive a first and last name.
    Make sure that PHP writes this file to a non-public folder. This means that PHP will save the file on the hard drive of the web server but not in the webserver's root tree (htdocs, wwwroot, etc.).
    Write a second PHP script ("show_data.php") that will open this file and read its contents into a PHP array. Use PHP and a loop to create a table that dynamically generates and displays the file contents.
    Create an HTML page with a form. Name the file "index.html". This HTML file will have a form with two textboxes and a submit button. When the submit button the page should send the data to "save_data.php" for saving.
    Upload your scripts and HTML page to your public cloud webserver and test.

When you are done, submit your work by providing a url (i.e. https://yoursite.com/lab10/) to your lab10 folder in Canvas.

NOTE/TIP: You may need to adjust the file permissions and security settings of your web server software or web server host OS for this to work. There are thousands of tutorials on how to do this available on the web and YouTube. Budget extra time for this lab if prior sys admin labs were challenging or time consuming for you.